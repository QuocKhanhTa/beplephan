<?php
defined('ABSPATH') || exit;

get_header('');

$current_cat = get_queried_object();

$args_max = array(
   'post_type' => 'product',
   'posts_per_page' => 1,
   'orderby' => 'meta_value_num',
   'meta_key' => '_price',
   'order' => 'DESC',
   'tax_query' => array(
      array(
         'taxonomy' => 'product_cat',
         'field' => 'id',
         'terms' => $current_cat->term_id,
         'operator' => 'IN',
      ),
   ),
);
$max_query = new WP_Query($args_max);
$max_price_value = 0;
if ($max_query->have_posts()) {
   $max_query->the_post();
   $product_max = wc_get_product(get_the_ID());
   if ($product_max) {
      $max_price_value = floatval($product_max->get_price());
   }
   wp_reset_postdata();
}

if ($max_price_value <= 0) {
   $max_price_value = 10000000;
}

$rounded_max_price = ceil($max_price_value / 10000) * 10000;

$min_price = isset($_GET['min_price']) ? intval($_GET['min_price']) : 0;
$max_price = isset($_GET['max_price']) ? intval($_GET['max_price']) : $rounded_max_price;

// Tạo meta_query nếu có lọc theo giá
$meta_query = array();
if (isset($_GET['min_price']) || isset($_GET['max_price'])) {
   $min_price = isset($_GET['min_price']) ? intval($_GET['min_price']) : 0;
   $max_price = isset($_GET['max_price']) ? intval($_GET['max_price']) : 10000000;
   $meta_query[] = array(
      'key' => '_price',
      'value' => array($min_price, $max_price),
      'compare' => 'BETWEEN',
      'type' => 'NUMERIC'
   );
}

$sort = isset($_GET['sort']) ? sanitize_text_field($_GET['sort']) : '';

$args = array(
   'post_type' => 'product',
   'posts_per_page' => -1,
   'tax_query' => array(
      array(
         'taxonomy' => 'product_cat',
         'field' => 'id',
         'terms' => $current_cat->term_id,
         'operator' => 'IN',
      ),
   ),
   'meta_query' => $meta_query,
);

if (!empty($sort) && in_array($sort, array('asc', 'desc'))) {
   $args['meta_key'] = '_price';
   $args['orderby'] = 'meta_value_num';
   $args['order'] = strtoupper($sort);
}
// Thực hiện truy vấn
$query = new WP_Query($args);

//$all_attributes = array();
//
//if ($query->have_posts()) {
//   while ($query->have_posts()) {
//      $query->the_post();
//      $product = wc_get_product(get_the_ID());
//      if (!$product) {
//         continue;
//      }
//
//      // Lấy danh mục chính của sản phẩm
//      $categories = wp_get_post_terms($product->get_id(), 'product_cat');
//      $primary_category_slug = '';
//
//      if (!is_wp_error($categories) && !empty($categories)) {
//         // Lấy slug danh mục đầu tiên
//         $primary_category_slug = $categories[0]->slug;
//      }
//
//      // Lấy các thuộc tính của sản phẩm
//      $attributes = $product->get_attributes();
//
//      if (!empty($attributes) && is_array($attributes)) {
//         foreach ($attributes as $attribute) {
//            $attribute_name = $attribute->get_name();
//            $attribute_label = wc_attribute_label($attribute_name);
//
//            $options = array();
//            if ($attribute->is_taxonomy()) {
//               // Nếu thuộc tính là taxonomy, lấy các term name của sản phẩm
//               $terms = wp_get_post_terms($product->get_id(), $attribute_name);
//               if (!is_wp_error($terms) && !empty($terms)) {
//                  foreach ($terms as $term) {
//                     // Lấy đường dẫn của term
//                     $term_link = get_term_link($term);
//
//                     // Lấy ID hình ảnh được lưu ở meta 'thumbnail_id'
//                     $thumbnail_id = get_term_meta($term->term_id, 'thumbnail_id', true);
//                     // Nếu có ID, lấy URL của ảnh; nếu không, có thể đặt giá trị mặc định (ví dụ: rỗng hoặc ảnh mặc định)
//                     $brand_image_url = $thumbnail_id ? wp_get_attachment_url($thumbnail_id) : '';
//
//                     // Hiển thị thông tin
//                     echo '<div class="brand-term">';
//                     echo '<a href="' . esc_url($term_link) . '">';
//                     if ($brand_image_url) {
//                        echo '<img src="' . esc_url($brand_image_url) . '" alt="' . esc_attr($term->name) . '">';
//                     } else {
//                        echo '<!-- Không có hình ảnh -->';
//                     }
//                     echo '<span>' . esc_html($term->name) . '</span>';
//                     echo '</a>';
//                     echo '</div>';
//                  }
//               }
//            } else {
//               // Nếu thuộc tính không phải taxonomy (custom attribute)
//               $options = $attribute->get_options();
//            }
//
//            if (!isset($all_attributes[$attribute_name])) {
//               $all_attributes[$attribute_name] = array(
//                  'label' => $attribute_label,
//                  'values' => $options,
//               );
//            } else {
//               $all_attributes[$attribute_name]['values'] = array_unique(array_merge($all_attributes[$attribute_name]['values'], $options));
//            }
//         }
//      }
//   }
//   wp_reset_postdata();
//}
//
//// Hiển thị kết quả để kiểm tra
//echo '<pre>';
//print_r($all_attributes);
//echo '</pre>';

$product_data_array = array();
if ($query->have_posts()) :
   while ($query->have_posts()) : $query->the_post();
      $product = wc_get_product(get_the_ID());
      if (!$product) continue;
      // Tính % giảm giá: nếu sản phẩm có giá sale (sale_price) và giá gốc (regular_price)
      $regular_price = floatval($product->get_regular_price());
      $sale_price = floatval($product->get_sale_price());
      $discount_percentage = 0;
      if ($sale_price && $regular_price && $regular_price > $sale_price) {
         $discount_percentage = round((($regular_price - $sale_price) / $regular_price) * 100);
      }

      $product_data_array[] = array(
         'id' => $product->get_id(),
         'title' => $product->get_name(),
         'price' => $product->get_price(),
         'sale_price' => $product->get_sale_price(),
         'regular_price' => $product->get_regular_price(),
         'discount_percentage' => $discount_percentage,
         'thumbnail' => get_the_post_thumbnail_url($product->get_id(), 'medium'),
         'permalink' => get_permalink(),
      );
   endwhile;
   wp_reset_postdata();
endif;

if ($sort == 'discount_desc') {
   usort($product_data_array, function ($a, $b) {
      return $b['discount_percentage'] - $a['discount_percentage'];
   });
} elseif ($sort == 'discount_asc') {
   usort($product_data_array, function ($a, $b) {
      return $a['discount_percentage'] - $b['discount_percentage'];
   });
}

$child_categories = get_terms([
   'taxonomy' => 'product_cat',
   'hide_empty' => false,
   'parent' => $current_cat->term_id,
]);
?>
    <div class="body-page">
        <div class="bannerTopHead">
            <div class="block-breadcrumbs h-100 container">
               <?php
               echo '<p class="breadcrumbs-detail d-flex align-items-center h-100" style="font-size: 12px;">
                    <i class="fa-solid fa-house" style="color: rgb(215, 0, 24); margin-right: 10px"></i>
                    <a href="/">Trang chủ</a> 
                    <i class="fa-solid fa-angle-right" style="margin: 0 10px"></i> ' . get_breadcrumb_from_url() .
                  '</p>';
               ?>
            </div>
        </div>
        <div class="product-category-page container">
            <div class="block-filter-sort mt-2">
                <div class="filter-sort__title">Chọn theo tiêu chí</div>
                <div class="filter-module-container">
                    <div class="" id="filterModule">
                        <div class="filter-sort__list d-flex flex-wrap">
                            <div class="position-relative">
                                <div id="btn-price-filter">
                                    <div style="padding-right: 5px"><i class="fa-solid fa-money-bill"></i></div>
                                    <span>Giá</span>
                                </div>
                                <div id="price-filter-container" class="list-filter-child">
                                   <?php
                                   $min_price = isset($_GET['min_price']) ? intval($_GET['min_price']) : 0;
                                   $max_price = isset($_GET['max_price']) ? intval($_GET['max_price']) : $rounded_max_price;
                                   ?>
                                    <div id="price-filter" class="price-filter-detail mb-4">
                                        <form id="price-filter-form" class="price-filter-form" method="GET">
                                           <?php
                                           foreach ($_GET as $key => $value) {
                                              if (in_array($key, ['min_price', 'max_price'])) continue;
                                              if (is_array($value)) {
                                                 foreach ($value as $v) {
                                                    echo '<input type="hidden" name="' . esc_attr($key) . '[]" value="' . esc_attr($v) . '">';
                                                 }
                                              } else {
                                                 echo '<input type="hidden" name="' . esc_attr($key) . '" value="' . esc_attr($value) . '">';
                                              }
                                           }
                                           ?>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div id="min-price-display"></div>
                                                <div id="max-price-display"></div>
                                            </div>
                                            <div id="price-slider" style="margin: 10px 0;"></div>
                                            <input type="hidden" name="min_price" id="min_price"
                                                   value="<?php echo esc_attr($min_price); ?>">
                                            <input type="hidden" name="max_price" id="max_price"
                                                   value="<?php echo esc_attr($max_price); ?>">
                                            <div class="show btn-filter-group d-flex justify-content-between"
                                                 style="margin-top: 10px;">
                                                <div id="btn-close-price-popup"
                                                     class="button button__filter-children-close is-small is-danger is-light">
                                                    Đóng
                                                </div>
                                                <button type="submit"
                                                        class="button button__filter-children-submit is-small is-danger submit">
                                                    Xem kết quả
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="filter-sort__title">Sắp xếp theo</div>
                <div class="filter-sort__list-filter d-flex">
                    <a class="btn-filter button__sort d-flex align-items-center <?php if (isset($_GET['sort']) && $_GET['sort'] == 'desc') echo 'active'; ?>"
                       href="<?php echo esc_url(add_query_arg('sort', 'desc')); ?>">
                        <div class="icon d-flex align-items-center">
                            <i class="fa fa-sort-amount-desc" aria-hidden="true"></i>
                        </div>
                        Giá Cao - Thấp
                    </a>

                    <a class="btn-filter button__sort d-flex align-items-center <?php if (isset($_GET['sort']) && $_GET['sort'] == 'asc') echo 'active'; ?>"
                       href="<?php echo esc_url(add_query_arg('sort', 'asc')); ?>">
                        <div class="icon d-flex align-items-center">
                            <i class="fa fa-sort-amount-asc" aria-hidden="true"></i>
                        </div>
                        Giá Thấp - Cao
                    </a>

                    <a class="btn-filter button__sort d-flex align-items-center <?php if (isset($_GET['sort']) && $_GET['sort'] == 'discount_desc') echo 'active'; ?>"
                       href="<?php echo esc_url(add_query_arg('sort', 'discount_desc')); ?>">
                        <div class="icon d-flex align-items-center">
                            <i class="fa fa-percent" aria-hidden="true"></i>
                        </div>
                        Khuyến Mãi Hot
                    </a>
                </div>
            </div>
           <?php if (!empty($product_data_array)) : ?>
            <div id="product-list" class="product-list row">
               <?php
               $i = 0;
               foreach ($product_data_array as $product_data) :
                  $i++;
                  $extra_class = ($i > 20) ? ' hidden' : '';
                  ?>
                   <div class="product-item col-lg-3 col-md-4 col-sm-6 col-xs-6<?php echo esc_attr($extra_class); ?>">
                       <div class="item">
                           <div class="item-detail">
                               <a href="<?php echo esc_url($product_data['permalink']); ?>">
                                   <div class="product_thumbnail d-flex justify-content-center">
                                       <div class="product_thumbnail-detail w-75">
                                          <?php if (!empty($product_data['thumbnail'])) : ?>
                                              <img src="<?php echo esc_url($product_data['thumbnail']); ?>"
                                                   alt="<?php echo esc_attr($product_data['title']); ?>">
                                          <?php endif; ?>
                                       </div>
                                   </div>
                                   <div class="title"><?php echo esc_html($product_data['title']); ?></div>
                                   <div class="price d-flex align-items-center">
                                      <?php if (!empty($product_data['sale_price'])) : ?>
                                          <p class="sale-price"><?php echo wc_price($product_data['sale_price']); ?></p>
                                      <?php endif; ?>
                                       <p class="regular-price"><?php echo wc_price($product_data['regular_price']); ?></p>
                                   </div>
                               </a>
                               <div class="product__price--percent"
                                    style="background: url('<?php echo get_template_directory_uri(); ?>/assets/images/icon-giam-gia.png') 50% no-repeat; background-size: cover;">
                                   <p class="product__price--percent-detail">
                                      <?php
                                      echo 'Giảm ' . (isset($product_data['discount_percentage']) ? $product_data['discount_percentage'] : 0) . '%';
                                      ?>
                                   </p>
                               </div>
                               <div class="installment-information">
                                   <div class="installment-information-detail">Trả góp 17%</div>
                               </div>
                           </div>
                       </div>
                   </div>
               <?php
               endforeach;
               echo '</div>';
               ?>

                <div id="load-more">
                    <div>Xem thêm</div>
                </div>
               <?php
               else :
                  wc_get_template('loop/no-products-found.php');
               endif;
               wp_reset_postdata();
               ?>
            </div>
        </div>
    </div>


    <script>
        jQuery(document).ready(function ($) {
            function updateLoadMoreText() {
                var hiddenCount = $('.product-item.hidden').length;
                if (hiddenCount > 0) {
                    $('#load-more div').html("Xem thêm " + hiddenCount + " sản phẩm <i style='padding-left: 10px' class='fa-solid fa-angle-down'></i>");
                } else {
                    $('#load-more').fadeOut('slow');
                }
            }

            // Nếu số lượng sản phẩm ẩn nhỏ hơn 20 ngay khi load trang thì ẩn nút load-more
            if ($('.product-item.hidden').length < 20) {
                $('#load-more').hide();
            } else {
                updateLoadMoreText();
            }

            // Khi click vào nút "Xem thêm"
            $('#load-more').on('click', function () {
                // Hiển thị 20 sản phẩm ẩn đầu tiên
                var $hiddenItems = $('.product-item.hidden').slice(0, 20);
                $hiddenItems.removeClass('hidden');

                // Cập nhật lại text của nút "Xem thêm"
                updateLoadMoreText();
            });


            const defaultMin = <?php echo $min_price; ?>;
            const defaultMax = <?php echo $max_price; ?>;
            const sliderMax = <?php echo $rounded_max_price; ?>;

            $("#price-slider").slider({
                range: true,
                step: 10000,
                min: 0,
                max: sliderMax,
                values: [defaultMin, defaultMax],
                slide: function (event, ui) {
                    $("#min-price-display").text(ui.values[0].toLocaleString());
                    $("#max-price-display").text(ui.values[1].toLocaleString());
                    $("#min_price").val(ui.values[0]);
                    $("#max_price").val(ui.values[1]);
                },
                change: function (event, ui) {
                }
            });

            $("#min-price-display").text($("#price-slider").slider("values", 0).toLocaleString());
            $("#max-price-display").text($("#price-slider").slider("values", 1).toLocaleString());

            const buttons = document.querySelectorAll("#btn-price-filter, #btn-close-price-popup");
            const priceFilterContainer = document.getElementById("price-filter-container");

            if (buttons.length > 0 && priceFilterContainer) {
                buttons.forEach(button => {
                    button.addEventListener("click", function (event) {
                        event.stopPropagation();
                        document.getElementById("btn-price-filter").classList.toggle("active");
                        priceFilterContainer.classList.toggle("active");
                    });
                });

                document.addEventListener("click", function (event) {
                    if (!priceFilterContainer.contains(event.target) && !Array.from(buttons).includes(event.target)) {
                        priceFilterContainer.classList.remove("active");
                        document.getElementById("btn-price-filter").classList.remove("active");
                    }
                });
            }
        });
    </script>

<?php
get_footer();
?>