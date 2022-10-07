<?php session_start(); ?>


<?php
// include('../include/connect.php');
require_once('./include/connect.php');
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Sản phẩm</title>
    <!-- JS only -->
    
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="./CSS/index.css" />
    <link rel="stylesheet" href="./CSS/bootstrap.min.css.css" />
    <link rel="stylesheet" href="./CSS/common.css" />
    <link rel="stylesheet" href="./CSS/font-awesome.min.css" />
    <link rel="stylesheet" href="./CSS/slick-theme.min.css" />
    <link rel="stylesheet" href="./CSS/slick.min.css" />
    <link rel="stylesheet" href="./CSS/san_pham.css" />


</head>

<body>
    <form action="" method="post">
        <?php
        // include('../include/connect.php');
        require_once('./header.php');
        ?>
        <!-- content -->
        <div class="container-fluid">
            <div class="banner_custom">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators" data-quantity-indicator="20">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class=""></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1" class=""></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2" class=""></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="3" class=""></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="4" class=""></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="5" class=""></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="6" class=""></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="7" class=""></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="8" class=""></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="9" class=""></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="10" class=""></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="11" class=""></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="12" class=""></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="13" class=""></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="14" class=""></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="15" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="16" class=""></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="17" class=""></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="18" class=""></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="19" class=""></li>
                    </ol>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev" style="left: 294px;">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next" style="right: 299px;">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                    <div class="carousel-inner">
                        <div class="carousel-item">
                            <img class="d-block" src="https://cdn.honda.com.vn/motorbikes/May2022/L3b54cTddCQUatsGE8wv.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block" src="https://cdn.honda.com.vn/motorbikes/January2022/1gqK2Cbiran7dyE83NMK.png" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block" src="https://cdn.honda.com.vn/motorbikes/May2022/J9a8xOS3etcc9W3tU50c.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block" src="https://cdn.honda.com.vn/motorbikes/March2022/Iig92U3YFFD8HPkjOVob.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block" src="https://cdn.honda.com.vn/motorbikes/November2020/Ws81dN8Qvux1lm7zLkMh.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block" src="https://cdn.honda.com.vn/motorbikes/December2020/L4uCWy7TWoR5pHYzDQQa.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block" src="https://cdn.honda.com.vn/motorbikes/December2020/R9uwPmSfsaNC6GE70rzg.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block" src="https://cdn.honda.com.vn/motorbikes/December2021/HRoSXCmUDgeC0mvNem98.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block" src="https://cdn.honda.com.vn/motorbikes/December2021/Ue6E4YrHK5T9W4azzY2g.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block" src="https://cdn.honda.com.vn/motorbikes/December2021/ELAzjUmkQRG0SyOYxUU0.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block" src="https://cdn.honda.com.vn/motorbikes/August2021/0iWnMT7utbGIadCX6CS0.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block" src="https://cdn.honda.com.vn/motorbikes/October2021/DBSFFeIyA2rDz3ymUWDL.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block" src="https://cdn.honda.com.vn/motorbikes/September2021/Rlj7LYHRNRuGyG9L8uDQ.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block" src="https://cdn.honda.com.vn/motorbikes/May2021/8JywJwsXOBbsPSmWnoVR.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block" src="https://cdn.honda.com.vn/motorbikes/February2021/05XV52cyzKEv8jJyihVi.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item active">
                            <img class="d-block" src="https://cdn.honda.com.vn/motorbikes/March2021/prxtYB15pw0jQvoQBbJQ.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block" src="https://cdn.honda.com.vn/motorbikes/March2021/ASV1zrrSvV9nvFZpUQPW.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block" src="https://cdn.honda.com.vn/motorbikes/November2020/5zg71nkmbdJNLOSaoyoY.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block" src="https://cdn.honda.com.vn/motorbikes/September2020/NjaapyVxtPdb5YHxbCQb.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block" src="https://cdn.honda.com.vn/motorbikes/August2020/T0IMBNB1kz8bv6GHlfLX.png" alt="Second slide">
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="container fix-ctn">

            <div class="breadscrumb">
                <a class="parent" href="/">Trang chủ</a>
                <span class="img">❯</span>
                <a class="parent" href="/xe-may/san-pham">Honda</a>
                <span class="img">❯</span>
                <a class="current">Danh sách sản phẩm</a>
            </div>

            <p class="row product-TxtTile col-sm-12 col-lg-12 col-md-12 col-lg-1">Lựa Chọn<br> Phong Cách Riêng Của Bạn </p>

            <div class="row  option d-none d-md-block">

                <input class="hide-product btn-outline-filter btn-option mr-4 btn-category btn-active" type="submit" name="all" id="all" value="TẤT CẢ"></input>
                <?php
                $SQL = 'SELECT * FROM loaixe';
                $categoryList = executeResult($SQL);
                foreach ($categoryList as $item) {
                    $tenloai = mb_strtoupper($item['TenLoai']);
                    echo ' <input value="' . $item['MaLoai'] . '" type="hidden" name="MaLoai" id="MaLoai">
                 <input class="hide-product btn-outline-filter btn-option mr-4 btn-category" type="submit" name="TenLoai" id="TenLoai"  value="' . $tenloai . '"></input>';
                }
                ?>

            </div>

            <div class="homepage-product-head-right-mobile-v2">
                <div class="hp-mobile-select-text">
                    <p>TẤT CẢ</p>
                    <div class="hp-mobile-select-item"><i class="fa fa-angle-down"></i></div>
                </div>
                <div class="hp-mobile-select-menu">

                    <p class="select-menu-item active" type="submit" name="all" id="all">TẤT CẢ</p>
                    <?php

                    $SQL = 'SELECT * FROM loaixe';
                    $categoryList = executeResult($SQL);
                    foreach ($categoryList as $item) {
                        $tenloai = mb_strtoupper($item['TenLoai']);
                        echo ' <input value="' . $item['MaLoai'] . '" type="hidden" name="MaLoai" id="MaLoai">
                                <p class="select-menu-item" type="submit" name="TenLoai" id="TenLoai" >' . $tenloai . '</p>';
                    }
                    ?>

                </div>
            </div>

            <div id="product-container" class="row product-list">
                <?php
                 $TenHang = $_GET['TenHang'];
                $TenLoai = '';
                if (isset($_POST['all'])) {
                    $SQL = 'SELECT * FROM xe WHERE TenHang = "'.$TenHang.'" AND HienThi = "1"';
                }
                if (isset($_POST['TenLoai'])) {
                        $TenLoai = $_POST['TenLoai'];
                        $SQL = 'SELECT xe.MaXe, xe.TenHang, Hinh, TenXe, Gia, HienThi FROM xe
                        INNER JOIN loaixe ON xe.MaLoai = loaixe.MaLoai 
                        WHERE TenLoai = "' . $TenLoai . '" AND TenHang = "'.$TenHang.'" AND HienThi = "1"';               
                } else{
                    $SQL = 'SELECT * FROM xe WHERE TenHang = "'.$TenHang.'" AND HienThi = "1"';
                }
                $categoryList = executeResult($SQL);
                foreach ($categoryList as $item) {
                    $Gia =  number_format($item['Gia'], 0, ",", ".");
                    echo '<div class="homepage-product-slide-tab col-12 col-xl-3 col-lg-4 col-md-6 show" data-sid="396" data-category="2">
              <div class="homepage-product-slide-tab-top">
                  <div class="img-product">
                      <div class="image-motor-product">
                          <img src="./image/' . $item['Hinh'] . '">
                      </div>
                  </div>
                  
              </div>
              <div class="name-price-motor w-100">
                  <p class="homepage-product-slide-tab-name w-100">' . $item['TenXe'] . '</p>
                  <p class="homepage-product-slide-tab-price w-100 homepage-txt-price">Từ
                  ' . $Gia . ' VNĐ
                  </p>
              </div>
              <a  href="./chitietxe.php?MaXe='.$item['MaXe'].'">
                  <div class="homepage-product-slide-tab-detail d-flex align-items-center justify-content-center" style="cursor: pointer; bottom: 150px; opacity: 0;">
                      Xem chi tiết
                  </div>
                  <div class="overlay-circle-hover">

                  </div>
              </a>
          </div>';
                }
                ?>

            </div>
            <p class="empty-list ">Hiện tại chưa có sản phẩm bạn tìm kiếm</p>
        </div>
        <!-- footer -->
        <?php
        require_once('./foodter.php');
        ?>
    </form>
</body>

</html>