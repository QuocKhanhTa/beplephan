<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bếp Lê Phan</title>
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/logo-beplephan-mb.png"
          type="image/png">
   <?php
   wp_head();
   ?>
</head>
<body>
<header class="header w-100 position-fixed" style="z-index: 1001; top: 0" id="header">
    <div class="first-title d-flex flex-wrap justify-content-center">
        <div class="text-center">Vui Tết 'ANt' Quà Ngập Tràn - Săn Voucher ngay!</div>
    </div>
    <div class="second-title owl-carousel align-items-center">
        <div class="text-center">Thu cũ Giá ngon - Lên đời tiết kiệm</div>
        <div class="text-center">Giao nhanh-miễn phí</div>
        <div class="text-center">Sản phẩm Chính hãng - Xuất VAT đầy đủ</div>
        <div class="text-center">Tải App Smember- Tích điểm & nhận ưu đãi</div>
    </div>
    <div class="header-menu">
        <div class="container">
            <nav>
               <?php
               wp_nav_menu(array(
                  'theme_location' => 'header-menu',
                  'container' => 'nav',
                  'container_class' => 'header-nav',
               ));
               ?>
            </nav>
        </div>
        <div class="section-categories position-fixed" id="section-categories-header">
            <div class="main-menu-container">
                <div class="mega-menu-wrap">
                    <div class="menu-container w-100">
                        <ul class="menu">
                            <li class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <a><img src="<?php echo MY_UPLOADS_URL; ?>may-hut-mui-new.svg" alt=""/> </a>
                                    <div><a href="">Bếp từ</a>, <a href="">Bếp gas</a>, <a href="">Máy hút mùi</a></div>
                                </div>
                                <div><i class="fa-solid fa-chevron-right"></i></div>
                                <div class="megadrop row">
                                    <div class="col">
                                        <div style="font-weight: 600">BẾP TỪ</div>
                                        <ul>
                                            <li><a href="#">Bếp từ Miele</a></li>
                                            <li><a href="#">Bếp từ Bosch</a></li>
                                            <li><a href="#">Bếp từ Smeg</a></li>
                                            <li><a href="#">Bếp từ Elica</a></li>
                                            <li><a href="#">Bếp từ Siemens</a></li>
                                            <li><a href="#">Bếp từ AEG</a></li>
                                            <li><a href="#">Bếp từ Steba</a></li>
                                            <li><a href="#">Bếp từ WMF</a></li>
                                            <li><a href="#">Bếp từ kèm hút mùi</a></li>
                                        </ul>
                                    </div>
                                    <div class="col">
                                        <div style="font-weight: 600">BẾP GAS</div>
                                        <ul>
                                            <li><a href="#">Bếp gas Bosch</a></li>
                                            <li><a href="#">Bếp gas Elica</a></li>
                                            <li><a href="#">Bếp gas Smeg</a></li>
                                            <li><a href="#">Bếp gas kèm hút mùi</a></li>
                                        </ul>
                                    </div>
                                    <div class="col">
                                        <div style="font-weight: 600">MÁY HÚT MÙI</div>
                                        <ul>
                                            <li><a href="#">Máy hút mùi Miele</a></li>
                                            <li><a href="#">Máy hút mùi Bosch</a></li>
                                            <li><a href="#">Máy hút mùi Elica</a></li>
                                            <li><a href="#">Máy hút mùi Smeg</a></li>
                                            <li><a href="#">Máy hút mùi Siemens</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <a><img src="<?php echo MY_UPLOADS_URL; ?>mayruabat.svg"
                                            alt=""/> </a>
                                    <div><a href="">Máy rửa bát</a>, <a href="">Máy giặt</a>, <a href="">Máy
                                            sấy</a></div>
                                </div>
                                <div><i class="fa-solid fa-chevron-right"></i></div>
                                <div class="megadrop row">
                                    <div class="col">
                                        <div style="font-weight: 600">MÁY RỬA BÁT</div>
                                        <ul>
                                            <li><a href="#">Máy rửa bát Miele</a></li>
                                            <li><a href="#">Máy rửa bát Bosch</a></li>
                                            <li><a href="#">Máy rửa bát Smeg</a></li>
                                            <li><a href="#">Máy rửa bát Siemens</a></li>
                                            <li><a href="#">Chất tẩy rửa Finish</a></li>
                                            <li><a href="#">Chất tẩy rửa Miele</a></li>
                                        </ul>
                                    </div>
                                    <div class="col">
                                        <div style="font-weight: 600">MÁY GIẶT</div>
                                        <ul>
                                            <li><a href="#">Máy giặt Miele</a></li>
                                            <li><a href="#">Máy giặt Bosch</a></li>
                                            <li><a href="#">Máy giặt hấp sấy LG</a></li>
                                        </ul>
                                    </div>
                                    <div class="col">
                                        <div style="font-weight: 600">MÁY SẤY</div>
                                        <ul>
                                            <li><a href="#">Máy sấy Miele</a></li>
                                            <li><a href="#">Máy sấy Bosch</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <a><img src="<?php echo MY_UPLOADS_URL; ?>2022/04/lo-nuong-1.svg"
                                            alt=""/> </a>
                                    <div><a href="">Lò nướng</a>, <a href="">Lò vi sóng</a>, <a href="">Lò
                                            hấp</a></div>
                                </div>
                                <div><i class="fa-solid fa-chevron-right"></i></div>
                                <div class="megadrop row">
                                    <div class="col">
                                        <div style="font-weight: 600">LÒ NƯỚNG</div>
                                        <ul>
                                            <li><a href="#">Lò nướng Miele</a></li>
                                            <li><a href="#">Lò nướng Bosch</a></li>
                                            <li><a href="#">Lò nướng Siemens</a></li>
                                            <li><a href="#">Lò nướng Smeg</a></li>
                                            <li><a href="#">Lò nướng Caso</a></li>
                                            <li><a href="#">Lò nướng kết hợp vi sóng</a></li>
                                            <li><a href="#">Lò nướng kết hợp lò hấp</a></li>
                                        </ul>
                                    </div>
                                    <div class="col">
                                        <div style="font-weight: 600">LÒ VI SÓNG</div>
                                        <ul>
                                            <li><a href="#">Lò vi sóng Miele</a></li>
                                            <li><a href="#">Lò vi sóng Bosch</a></li>
                                            <li><a href="#">Lò vi sóng Siemens</a></li>
                                            <li><a href="#">Lò vi sóng Smeg</a></li>
                                            <li><a href="#">Lò vi sóng Caso</a></li>
                                        </ul>
                                    </div>
                                    <div class="col">
                                        <div style="font-weight: 600">LÒ HẤP</div>
                                        <ul>
                                            <li><a href="#">Lò hấp Miele</a></li>
                                            <li><a href="#">Lò hấp Bosch</a></li>
                                            <li><a href="#">Lò hấp Siemens</a></li>
                                            <li><a href="#">Lò hấp Smeg</a></li>
                                            <li><a href="#">Lò hấp kết hợp lò nướng</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <a><img src="<?php echo MY_UPLOADS_URL; ?>2022/04/tu-lanh-1.svg"
                                            alt=""/> </a>
                                    <div><a href="">Tủ lạnh</a>, <a href="">Tủ rượu vang</a>, <a href="">Tủ Cigar</a>
                                    </div>
                                </div>
                                <div><i class="fa-solid fa-chevron-right"></i></div>
                                <div class="megadrop row">
                                    <div class="col">
                                        <div style="font-weight: 600">TỦ LẠNH</div>
                                        <ul>
                                            <li><a href="#">Tủ lạnh Miele</a></li>
                                            <li><a href="#">Tủ lạnh Bosch</a></li>
                                            <li><a href="#">Tủ lạnh Siemens</a></li>
                                            <li><a href="#">Tủ lạnh Hafele</a></li>
                                            <li><a href="#">Tủ lạnh Liebherr</a></li>
                                            <li><a href="#">Tủ lạnh Smeg</a></li>
                                        </ul>
                                    </div>
                                    <div class="col">
                                        <div style="font-weight: 600">TỦ ĐÔNG/ TỦ MÁT</div>
                                        <ul>
                                            <li><a style="font-weight: 600">TỦ ĐÔNG</a></li>
                                            <li><a href="#">Tủ đông Miele</a></li>
                                            <li><a href="#">Tủ đông Liebherr</a></li>
                                            <li><a href="#">Tủ đông Bosch</a></li>
                                            <li><a href="#">Tủ đông Siemens</a></li>
                                            <li><a style="font-weight: 600">TỦ MÁT</a></li>
                                            <li><a href="">Tủ mát Miele</a></li>
                                            <li><a href="#">Tủ mát Liebherr</a></li>
                                            <li><a href="#">Tủ mát Bosch</a></li>
                                            <li><a href="#">Tủ mát Siemens</a></li>
                                        </ul>
                                    </div>
                                    <div class="col">
                                        <div style="font-weight: 600">TỦ RƯỢU VANG/ TỦ CIGAR</div>
                                        <ul>
                                            <li><a style="font-weight: 600">TỦ RƯỢU VANG</a></li>
                                            <li><a href="#">Tủ rượu vang Miele</a></li>
                                            <li><a href="#">Tủ rượu vang Liebherr</a></li>
                                            <li><a href="#">Tủ rượu vang Bosch</a></li>
                                            <li><a href="#">Tủ rượu vang Elica</a></li>
                                            <li><a href="#">Tủ rượu vang Caso</a></li>
                                            <li><a href="#">Tủ rượu vang Hafele</a></li>
                                            <li><a href="#">Tủ rượu vang Malloca</a></li>
                                            <li><a style="font-weight: 600">TỦ CIGAR</a></li>
                                            <li><a href="#">Tủ cigar Liebherr</a></li>
                                            <li><a href="#">Tủ cigar Caso</a></li>
                                            <li><a href="#">Tủ cigar Eurocave</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <a><img src="<?php echo MY_UPLOADS_URL; ?>2022/04/may-loc-nuoc.svg" alt=""/> </a>
                                    <div><a href="">Lọc nước </a>, <a href="">Lọc không khí</a>, <a href="">Hút ẩm</a>
                                    </div>
                                </div>
                                <div><i class="fa-solid fa-chevron-right"></i></div>
                                <div class="megadrop row">
                                    <div class="col">
                                        <div style="font-weight: 600">MÁY LỌC NƯỚC</div>
                                        <ul>
                                            <li><a href="#">Máy lọc nước Unilever Pureit</a></li>
                                            <li><a href="#">Máy lọc nước Mitsubishi Cleansui</a></li>
                                            <li><a href="#">Máy lọc nước Wells</a></li>
                                            <li><a href="#">Máy lọc nước A.O. Smith</a></li>
                                            <li><a href="#">Máy lọc nước Geyser</a></li>
                                        </ul>
                                    </div>
                                    <div class="col">
                                        <div style="font-weight: 600">MÁY LỌC KHÔNG KHÍ</div>
                                        <ul>
                                            <li><a href="#">Máy lọc không khí Philips</a></li>
                                            <li><a href="#">Máy lọc không khí LG</a></li>
                                            <li><a href="#">Máy lọc không khí Wood’s</a></li>
                                            <li><a href="#">Máy lọc không khí Wells</a></li>
                                            <li><a href="#">Máy lọc không khí bù ẩm</a></li>
                                        </ul>
                                    </div>
                                    <div class="col">
                                        <div style="font-weight: 600">MÁY HÚT ẨM</div>
                                        <ul>
                                            <li><a href="#">Máy hút ẩm Wood’s</a></li>
                                            <li><a href="#">Máy hút ẩm Stadler Form</a></li>
                                            <li><a href="#">Máy hút ẩm Comfee</a></li>
                                            <li><a href="#">Máy hút ẩm Medion</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <a><img src="<?php echo MY_UPLOADS_URL; ?>may-hut-bui.svg"
                                            alt=""/> </a>
                                    <div><a href="">Máy hút bụi</a>, <a href="">Quạt điện</a>, <a href="">Nồi cơm
                                            điện</a></div>
                                </div>
                                <div><i class="fa-solid fa-chevron-right"></i></div>
                                <div class="megadrop row">
                                    <div class="col">
                                        <div style="font-weight: 600">MÁY HÚT BỤI</div>
                                        <ul>
                                            <li><a href="#">Máy hút bụi Bosch</a></li>
                                            <li><a href="#">Máy hút bụi Dyson</a></li>
                                            <li><a href="#">Máy hút bụi Philips</a></li>
                                            <li><a href="#">Máy hút bụi Rowenta</a></li>
                                        </ul>
                                    </div>
                                    <div class="col">
                                        <div style="font-weight: 600">QUẠT ĐIỆN</div>
                                        <ul>
                                            <li><a href="#">Quạt điện Rowenta</a></li>
                                            <li><a href="#">Quạt điện Dyson</a></li>
                                            <li><a href="#">Quạt điện Brandson</a></li>
                                            <li><a href="#">Quạt điện Unold</a></li>
                                        </ul>
                                    </div>
                                    <div class="col">
                                        <div style="font-weight: 600">NỒI CƠM ĐIỆN</div>
                                        <ul>
                                            <li><a href="#">Nồi cơm điện Cuckoo</a></li>
                                            <li><a href="#">Nồi cơm điện Tefal</a></li>
                                            <li><a href="#">Nồi cơm điện wmf</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <a><img src="<?php echo MY_UPLOADS_URL; ?>2022/04/may-pha-cafe-1.svg"
                                            alt=""/> </a>
                                    <div><a href="">Máy pha cafe</a>, <a href="">Máy ép trái cây</a></div>
                                </div>
                                <div><i class="fa-solid fa-chevron-right"></i></div>
                                <div class="megadrop row">
                                    <div class="col">
                                        <div style="font-weight: 600">MÁY PHA CAFE</div>
                                        <ul>
                                            <li><a href="#">Máy pha cafe Miele</a></li>
                                            <li><a href="#">Máy pha cafe Smeg</a></li>
                                            <li><a href="#">Máy pha cafe Breville</a></li>
                                            <li><a href="#">Máy pha cafe Delonghi</a></li>
                                            <li><a href="#">Máy pha cafe Philips</a></li>
                                            <li><a href="#">Máy pha cafe Bosch</a></li>
                                            <li><a href="#">Máy pha cafe Siemens</a></li>
                                            <li><a href="#">Máy pha cafe Melitta</a></li>
                                        </ul>
                                    </div>
                                    <div class="col">
                                        <div style="font-weight: 600">MÁY ÉP TRÁI CÂY</div>
                                        <ul>
                                            <li><a href="#">Máy ép chậm Hurom</a></li>
                                            <li><a href="#">Máy ép chậm Smeg</a></li>
                                            <li><a href="#">Máy ép chậm Bosch</a></li>
                                            <li><a href="#">Máy ép chậm Philips</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <a><img src="<?php echo MY_UPLOADS_URL; ?>2023/02/am-dun-sieu-toc.svg"
                                            alt=""/> </a>
                                    <div><a href="">Ấm đun siêu tốc</a>, <a href="">Bình thủy điện</a></div>
                                </div>
                                <div><i class="fa-solid fa-chevron-right"></i></div>
                                <div class="megadrop row">
                                    <div class="col">
                                        <div style="font-weight: 600">ẤM ĐUN SIÊU TỐC</div>
                                        <ul>
                                            <li><a href="#">Ấm đun siêu tốc Smeg</a></li>
                                            <li><a href="#">Ấm đun siêu tốc WMF</a></li>
                                            <li><a href="#">Ấm đun siêu tốc Bosch</a></li>
                                        </ul>
                                    </div>
                                    <div class="col">
                                        <div style="font-weight: 600">BÌNH THỦY ĐIỆN</div>
                                        <ul>
                                            <li><a href="#">Bình thủy điện Caso</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <a><img src="<?php echo MY_UPLOADS_URL; ?>2024/05/noi-chien-khong-dau.svg"
                                            alt=""/> </a>
                                    <div><a href="">Nồi chiên không dầu</a>, <a href="">Ngập dầu</a></div>
                                </div>
                                <div><i class="fa-solid fa-chevron-right"></i></div>
                                <div class="megadrop row">
                                    <div class="col">
                                        <div style="font-weight: 600">NỒI CHIÊN KHÔNG DẦU</div>
                                        <ul>
                                            <li><a href="#">Nồi chiên không dầu Philips</a></li>
                                            <li><a href="#">Nồi chiên không dầu Tefal</a></li>
                                        </ul>
                                    </div>
                                    <div class="col">
                                        <div style="font-weight: 600">NGẬP DẦU</div>
                                        <ul>
                                            <li><a href="#">Nồi chiên ngập dầu Tefal</a></li>
                                            <li><a href="#">Nồi chiên ngập dầu Silvercrest</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <a><img src="<?php echo MY_UPLOADS_URL; ?>2022/04/noi-chien-khong-dau-1.svg"
                                            alt=""/> </a>
                                    <div><a href="">Nồi nấu bếp từ</a>, <a href="">Chảo từ</a>, <a
                                                href="">Ấm
                                            đun</a></div>
                                </div>
                                <div><i class="fa-solid fa-chevron-right"></i></div>
                                <div class="megadrop row">
                                    <div class="col">
                                        <div style="font-weight: 600">NỒI NẤU BẾP TỪ</div>
                                        <ul>
                                            <li><a href="#">Nồi Ruffoni</a></li>
                                            <li><a href="#">Nồi Fissler</a></li>
                                            <li><a href="#">Nồi WMF</a></li>
                                            <li><a href="#">Nồi Silit</a></li>
                                            <li><a href="#">Nồi gang Staub</a></li>
                                            <li><a href="#">Nồi gang Lodge</a></li>
                                        </ul>
                                    </div>
                                    <div class="col">
                                        <div style="font-weight: 600">CHẢO NẤU BẾP TỪ</div>
                                        <ul>
                                            <li><a href="#">Chảo Woll</a></li>
                                            <li><a href="#">Chảo Tefal</a></li>
                                            <li><a href="#">Chảo WMF</a></li>
                                            <li><a href="#">Chảo Silit</a></li>
                                            <li><a href="#">Chảo Fissler</a></li>
                                            <li><a href="#">Chảo Durachefs</a></li>
                                            <li><a href="#">Chảo gang Staub</a></li>
                                            <li><a href="#">Chảo gang Lodge</a></li>
                                        </ul>
                                    </div>
                                    <div class="col">
                                        <div style="font-weight: 600">ẤM ĐUN BẾP TỪ</div>
                                        <ul>
                                            <li><a href="#">Ấm đun nước WMF</a></li>
                                            <li><a href="#">Ấm đun nước Riess</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <a><img src="<?php echo MY_UPLOADS_URL; ?>2024/05/electric-appliances.svg"
                                            alt=""/> </a>
                                    <div><a href="">Điện gia dụng</a>, <a href="">Nhà thông minh</a></div>
                                </div>
                                <div><i class="fa-solid fa-chevron-right"></i></div>
                                <div class="megadrop row">
                                    <div class="col">
                                        <div style="font-weight: 600">ĐIỆN GIA DỤNG #1</div>
                                        <ul>
                                            <li><a href="#">Ấm đun siêu tốc</a></li>
                                            <li><a href="#">Bàn ủi – Bàn là</a></li>
                                            <li><a href="#">Bếp nướng điện</a></li>
                                            <li><a href="#">Bình thủy điện</a></li>
                                            <li><a href="#">Đèn học chống cận</a></li>
                                            <li><a href="#">Nồi chiên không dầu</a></li>
                                            <li><a href="#">Nồi chiên ngập dầu</a></li>
                                            <li><a href="#">Nồi cơm điện</a></li>
                                            <li><a href="#">Nồi hấp điện</a></li>
                                            <li><a href="#">Quạt điện</a></li>
                                            <li><a href="#">Máy hút bụi</a></li>
                                            <li><a href="#">Máy sấy bát đĩa</a></li>
                                        </ul>
                                    </div>
                                    <div class="col">
                                        <div style="font-weight: 600">ĐIỆN GIA DỤNG #2</div>
                                        <ul>
                                            <li><a href="#">Máy hút chân không</a></li>
                                            <li><a href="#">Máy tạo ẩm – Hút ẩm</a></li>
                                            <li><a href="#">Máy khoan</a></li>
                                            <li><a href="#">Máy lau kính</a></li>
                                        </ul>
                                    </div>
                                    <div class="col">
                                        <div style="font-weight: 600">NHÀ THÔNG MINH</div>
                                        <ul>
                                            <li><a href="#">Khóa điện tử Philips</a></li>
                                            <li><a href="#">Khóa điện tử Hafele</a></li>
                                            <li><a href="#">Khóa điện tử Hyundai</a></li>
                                            <li><a href="#">Khóa điện tử Kassler</a></li>
                                            <li><a href="#">Khóa điện tử Bosch</a></li>
                                            <li><a style="font-weight: 600;">KÉT SẮT ĐIỆN TỬ</a></li>
                                            <li><a href="#">Két sắt điện tử Philips</a></li>
                                            <li><a style="font-weight: 600;">ROBOT HÚT BỤI</a></li>
                                            <li><a href="#">Robot hút bụi Ecovacs</a></li>
                                            <li><a href="#">Robot hút bụi Roborock</a></li>
                                            <li><a href="#">Robot hút bụi Neato</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <a><img src="<?php echo MY_UPLOADS_URL; ?>2023/03/dispensing-machines.svg"
                                            alt=""/> </a>
                                    <div><a href="">Máy chế biến</a>, <a href="">Đồ dùng nhà bếp</a></div>
                                </div>
                                <div><i class="fa-solid fa-chevron-right"></i></div>
                                <div class="megadrop row">
                                    <div class="col">
                                        <div style="font-weight: 600">MÁY CHẾ BIẾN THỰC PHẨM</div>
                                        <ul>
                                            <li><a href="#">Máy làm sữa hạt</a></li>
                                            <li><a href="#">Máy xay sinh tố</a></li>
                                            <li><a href="#">Máy làm bánh mì</a></li>
                                            <li><a href="#">Máy nướng bánh mì</a></li>
                                            <li><a href="#">Máy làm bún mì</a></li>
                                            <li><a href="#">Máy nấu chậm</a></li>
                                            <li><a href="#">Máy vắt cam</a></li>
                                            <li><a href="#">Máy xay thịt</a></li>
                                            <li><a href="#">Máy trộn bột</a></li>
                                            <li><a href="#">Máy làm sạch thực phẩm</a></li>
                                            <li><a href="#">Máy làm kem, làm đá</a></li>
                                        </ul>
                                    </div>
                                    <div class="col">
                                        <div style="font-weight: 600">ĐỒ DÙNG NHÀ BẾP, PHÒNG ĂN</div>
                                        <ul>
                                            <li><a href="#">Ấm đun nước</a></li>
                                            <li><a href="#">Chảo bếp từ</a></li>
                                            <li><a href="#">Nồi nấu bếp từ</a></li>
                                            <li><a href="#">Nồi áp suất</a></li>
                                            <li><a href="#">Đồ gốm Staub</a></li>
                                            <li><a href="#">Dao, kéo</a></li>
                                            <li><a href="#">Đồ dùng phòng ăn</a></li>
                                            <li><a href="#">Đồ dùng pha lê</a></li>
                                            <li><a href="#">Đồ dùng thủy tinh</a></li>
                                            <li><a href="#">Chất tẩy rửa, khử mùi</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <a><img src="<?php echo MY_UPLOADS_URL; ?>2022/04/suc-khoe-sac-dep-1.svg"
                                            alt=""/> </a>
                                    <div><a href="">Sức khỏe</a>, <a href="">Thiết bị vệ sinh</a></div>
                                </div>
                                <div><i class="fa-solid fa-chevron-right"></i></div>
                                <div class="megadrop row">
                                    <div class="col">
                                        <div style="font-weight: 600">SỨC KHỎE & SẮC ĐẸP</div>
                                        <ul>
                                            <li><a href="#">Chăn điện</a></li>
                                            <li><a href="#">Bàn chải điện</a></li>
                                            <li><a href="#">Máy cạo râu</a></li>
                                            <li><a href="#">Máy đo huyết áp</a></li>
                                            <li><a href="#">Máy massage </a></li>
                                            <li><a href="#">Máy sấy tóc</a></li>
                                            <li><a href="#">Nhiệt kế điện tử</a></li>
                                            <li><a href="#">Máy tăm nước</a></li>
                                            <li><a href="#">Tông đơ cắt tóc</a></li>
                                        </ul>
                                    </div>
                                    <div class="col">
                                        <div style="font-weight: 600">THIẾT BỊ VỆ SINH</div>
                                        <ul>
                                            <li><a href="#">Vòi sen tắm</a></li>
                                            <li><a href="#">Chậu rửa chén bát</a></li>
                                            <li><a href="#">Vòi rửa chén bát</a></li>
                                            <li><a href="#">Bồn cầu vệ sinh</a></li>
                                            <li><a href="#">Vòi xịt bồn cầu</a></li>
                                            <li><a href="#">Chậu rửa mặt Lavabo</a></li>
                                            <li><a href="#">Vòi rửa mặt Lavabo</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-overlay">
        </div>
    </div>
</header>
