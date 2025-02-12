<?php
function register_styles()
{
   $version = wp_get_theme()->get('version');
   wp_enqueue_style('style', get_template_directory_uri() . "/style.css", array('bootstrap-css'), $version, 'all');
   wp_enqueue_style('header-css', get_template_directory_uri() . '/assets/css/header.css', array(), '1.0', 'all');
   wp_enqueue_style('footer-css', get_template_directory_uri() . '/assets/css/footer.css', array(), '1.0', 'all');
   wp_enqueue_style('home-page-css', get_template_directory_uri() . '/assets/css/home-page.css', array(), '1.0', 'all');
   wp_enqueue_style('product-category-css', get_template_directory_uri() . '/assets/css/product-category.css', array(), '1.0', 'all');
   wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css', array(), '5.3.3', 'all');
   wp_enqueue_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css', array(), '6.7.2', 'all');
   wp_enqueue_style('owl-carousel-css', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css');
   wp_enqueue_style('jquery-ui-css', '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css');
}

add_action('wp_enqueue_scripts', 'register_styles');

function register_scripts()
{
   wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.7.1.slim.min.js', array(), '3.7.1', true);
   wp_enqueue_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js', array(), '2.9.2', true);
   wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js', array(), '5.3.3', true);
   wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0', true);
   wp_enqueue_script('owl-carousel-js', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', array('jquery'), '', true);
   wp_enqueue_script('jquery-ui-slider');
}

add_action('wp_enqueue_scripts', 'register_scripts');

if (!defined('MY_UPLOADS_URL')) {
   define('MY_UPLOADS_URL', 'https://beplephan.com/wp-content/uploads/');
}

function register_my_menus()
{
   register_nav_menus(
      array(
         'header-menu' => __('Header Menu'),
      )
   );
}

add_action('after_setup_theme', 'register_my_menus');

// function add_icon_to_menu_items($items, $args) {
//     if ('header-menu' === $args->theme_location) {
//         foreach ($items as $item) {
//             $icon = get_post_meta($item->ID, 'menu_icon', true);
//             if ($icon) {
//                 $item->title = '<i class="fa ' . esc_attr($icon) . '"></i> ' . $item->title;
//             }
//         }
//     }
//     return $items;
// }
// add_filter('wp_nav_menu_objects', 'add_icon_to_menu_items', 10, 2);

function add_ajax_search_to_menu($items, $args)
{
   if ($args->theme_location == 'header-menu') {
      $position = 2;
      $items_array = explode('</li>', $items);
      array_splice($items_array, $position, 0, '<li id="search-item" class="menu-item search-item">' . do_shortcode('[wpdreams_ajaxsearchlite]') . '</li>');
      $items = implode('</li>', $items_array);
   }
   return $items;
}

add_filter('wp_nav_menu_items', 'add_ajax_search_to_menu', 10, 2);

function add_image_to_menu($items, $args)
{
   if ($args->theme_location == 'header-menu') {
      $position = 0;
      $items_array = explode('</li>', $items);
      array_splice($items_array, $position, 0, '<li class="menu-item image-item d-block d-md-none"> <img src="' . esc_url('https://beplephan.com/images/logo-beplephan-mb.svg') . '" alt="Menu Image" /></li>');
      $items = implode('</li>', $items_array);
   }
   return $items;
}

add_filter('wp_nav_menu_items', 'add_image_to_menu', 10, 2);


function add_acf_image_to_menu($items, $args)
{
   if ($args->theme_location == 'header-menu') {
      $image_url = get_template_directory_uri() . '/assets/images/logo-beplephan.png';
      if ($image_url) {
         $image_html = '<li class="menu-item image-item d-none d-md-block" style="width: 131px"><img src="' . esc_url($image_url) . '" alt="Menu Image" /></li>';
         $items = $image_html . $items;
      }
   }

   return $items;
}

add_filter('wp_nav_menu_items', 'add_acf_image_to_menu', 10, 2);

function owl_carousel_products_shortcode($atts)
{
   $atts = shortcode_atts(
      array(
         'category' => '',
         'limit' => 10,
      ),
      $atts,
      'owl_carousel_products'
   );

   $category_name = $atts['category'];
   $limit = $atts['limit'];

   $term = get_term_by('name', $category_name, 'product_cat');
   if ($term) {
      $category_id = $term->term_id;

      $args = array(
         'post_type' => 'product',
         'posts_per_page' => $limit,
         'tax_query' => array(
            array(
               'taxonomy' => 'product_cat',
               'field' => 'id',
               'terms' => $category_id,
               'operator' => 'IN',
            ),
         ),
      );

      $query = new WP_Query($args);

      if ($query->have_posts()) {
         $output = '<div class="slide_product owl-carousel owl-theme">';

         while ($query->have_posts()) {
            $query->the_post();
            global $product;
            $output .= '<div class="item">';
            $output .= '<a href="' . get_permalink() . '">';
            $thumbnail_url = get_the_post_thumbnail_url();
            if ($thumbnail_url) {
               $output .= '<img src="' . esc_url($thumbnail_url) . '" alt="' . esc_attr(get_the_title()) . '">';
            }
            $output .= '<h3>' . get_the_title() . '</h3>';
            $output .= '<span class="price">' . $product->get_price_html() . '</span>';
            $output .= '</a>';
            $output .= '</div>';
         }

         $output .= '</div>';

         wp_reset_postdata();

         return $output;
      } else {
         return 'Không có sản phẩm trong danh mục này.';
      }
   } else {
      return 'Danh mục không tồn tại.';
   }
}

add_shortcode('owl_carousel_products', 'owl_carousel_products_shortcode');

function owl_carousel_posts_shortcode($atts)
{
   $atts = shortcode_atts(
      array(
         'limit' => 10,
      ),
      $atts,
      'owl_carousel_products'
   );

   $limit = $atts['limit'];

   $args = array(
      'post_type' => 'post',
      'posts_per_page' => $limit,
      'post_status' => 'publish',
      'author' => 292,
   );

   $query = new WP_Query($args);

   if ($query->have_posts()) {
      $output = '<div class="slide_product owl-carousel owl-theme">';

      while ($query->have_posts()) {
         $query->the_post();

         $title = get_the_title();
         $content = get_the_content();

         $output .= '<div class="item">';
         $output .= '<a href="' . get_permalink() . '">';
         $output .= '<div style="height: 200px"><img src="' . get_the_post_thumbnail_url() . '" alt="' . $title . '"></div>';
         $output .= '<div style="-webkit-line-clamp: 2;-webkit-box-orient: vertical;display: -webkit-box;overflow: hidden;font-size: 16px;font-weight: 600;height: 48px;">' . $title . '</div>';
         $output .= '<p>' . wp_trim_words($content, 18) . '...</p>';
         $output .= '</a>';
         $output .= '</div>';
      }

      $output .= '</div>';

      wp_reset_postdata();

      return $output;
   } else {
      return 'Không có bài viết của tác giả này.';
   }
}

add_shortcode('owl_carousel_posts', 'owl_carousel_posts_shortcode');


function display_products_by_category_shortcode($atts)
{
   $atts = shortcode_atts(
      array(
         'category' => '',
         'limit' => -1,
      ),
      $atts,
      'products_by_category'
   );
   $category = sanitize_text_field($atts['category']);
   $limit = intval($atts['limit']);
   $args = array(
      'post_type' => 'product',
      'posts_per_page' => $limit,
      'tax_query' => array(
         array(
            'taxonomy' => 'product_cat',
            'field' => 'slug',
            'terms' => $category,
         ),
      ),
   );

   $query = new WP_Query($args);

   if ($query->have_posts()) {
      ob_start();
      echo '<div class="slide_product owl-carousel owl-theme">';
      while ($query->have_posts()) {
         $query->the_post();

         global $product;
         // $average_rating = $product->get_average_rating();
         // $rating_count = $product->get_rating_count();

         echo '<div class="item">';
         echo '<div class="product_item">';
         echo '<a href="' . get_the_permalink() . '">';
         echo '<div class="product_thumbnail d-flex justify-content-center"><div class="product_thumbnail-detail w-75" style="margin-top: 40px">' . woocommerce_get_product_thumbnail() . '</div></div>';
         echo '<div class="product-title">' . get_the_title() . '</div>';
         echo '<span class="price">' . $product->get_price_html() . '</span>';
         echo '</a>';
         // echo '<div class="product-rating">';
         // echo '<div class="star-rating" title="' . $average_rating . ' sao">';
         // echo '<span style="width:' . ($average_rating / 5) * 100 . '%"></span>';
         // echo '</div>';
         // echo '</div>';
         echo '<div class="product__price--percent" style="background: url(' . get_template_directory_uri() . '/assets/images/icon-giam-gia.png) 50% no-repeat; background-size: cover;"><p class="product__price--percent-detail">Giảm&nbsp;17%</p></div>';
         echo '<div class="installment-information"><div class="installment-information-detail">Trả góp 17%</div></div>';
         echo '</div>';
         echo '</div>';
      }
      echo '</div>';

      wp_reset_postdata();

      return ob_get_clean();
   } else {
      return '<p>Không có sản phẩm nào trong danh mục này.</p>';
   }
}

add_shortcode('products_by_category', 'display_products_by_category_shortcode');

function get_breadcrumb_from_url()
{
   $current_url = $_SERVER['REQUEST_URI'];
   $path_parts = explode('/', trim(parse_url($current_url, PHP_URL_PATH), '/'));

   $last_slug = end($path_parts);
   $term = get_term_by('slug', $last_slug, 'product_cat');

   if (!$term || is_wp_error($term)) {
      return "Không tìm thấy danh mục!";
   }

   $breadcrumb = array();
   while ($term && !is_wp_error($term)) {
      array_unshift($breadcrumb, $term->name);
      $term = ($term->parent) ? get_term($term->parent, 'product_cat') : null;
   }

   return implode(' <i class="fa-solid fa-angle-right" style="margin: 0 10px"></i> ', $breadcrumb);
}

?>
