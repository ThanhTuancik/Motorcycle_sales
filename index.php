<?php
// include('../include/connect.php');
require_once('./include/connect.php');

?>
<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>Trang Chủ</title>
  <!-- JS only -->
  
  <!-- CSS only -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <link rel="stylesheet" href="./CSS/bOotstrap.min.css.css.css" />
  <link rel="stylesheet" href="./CSS/style.css" />
  <link rel="stylesheet" href="./CSS/common.css" />
  <link rel="stylesheet" href="./CSS/font-awesome.min.css" />
  <link rel="stylesheet" href="./CSS/slick-theme.min.css" />
  <link rel="stylesheet" href="./CSS/slick.min.css" />

  <!-- Swiper CSS  -->
  <link rel="stylesheet" href="./CSS/swiper-bundle.min.css">

</head>

<body>

  <?php
  // include('../include/connect.php');
  require_once('./header.php');
  ?>
  <!-- content -->
  <div class="container-fluid" id="container-fluid-id" style="opacity: 1;">
    <div class="banner_custom">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators" data-quantity-indicator="5">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1" class=""></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2" class=""></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="3" class=""></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="4" class=""></li>
        </ol>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev" style="left: 554px;">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next" style="right: 559px;">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block" src="https://cdn.honda.com.vn/home-banner/May2022/iRuMt6hX44A4tuHLTQcS.jpg" alt="0 slide">
          </div>
          <div class="carousel-item">
            <img class="d-block" src="https://cdn.honda.com.vn/home-banner/May2022/iRuMt6hX44A4tuHLTQcS.jpg" alt="1 slide">
          </div>
          <div class="carousel-item">
            <img class="d-block" src="https://cdn.honda.com.vn/home-banner/February2022/0vXnfQb2WyPltmR7kbT6.png" alt="2 slide">
          </div>
          <div class="carousel-item">
            <img class="d-block" src="https://cdn.honda.com.vn/home-banner/December2021/qE97uq0sZA5LKNKiu6q5.jpg" alt="3 slide">
          </div>
          <div class="carousel-item">
            <img class="d-block" src="https://cdn.honda.com.vn/home-banner/December2021/CtIEH2v2ste902803zfA.png" alt="4 slide">
          </div>
        </div>
      </div>
    </div>
    <!-- <div class="container"> -->
    <div class="container homepage-product container-fix-ipad">
      <div class="d-flex justify-content-center">
        <div class="homepage-product-head">
          <div class="div-group1">
            <div class="col-line"></div>
            <h3 class="homepage-product-head-title">Sản phẩm</h3>
          </div>
          <div class="homepage-product-head-right">
            <p style="cursor: pointer; color: rgb(204, 0, 0); border-color: rgb(204, 0, 0);" id="homepage-button-xe-may">HONDA</p>
            <p style="cursor: pointer; color: rgb(112, 112, 112); border-color: rgb(112, 112, 112);" id="homepage-button-o-to">YAMAHA</p>
          </div>
          <div class="homepage-product-head-right-mobile-v2">
            <div class="hp-mobile-select-text">
              <p>HÃNG</p>
              <div class="hp-mobile-select-item"><i class="fa fa-angle-down" style="transform: rotate(0deg);"></i></div>
            </div>
            <div class="hp-mobile-select-menu" style="height: 0px;">
              <?php
              // lấy dữ liệu hãng ra
              $SQL = 'SELECT * FROM hang';
              $categoryList = executeResult($SQL);
              $index = 1;
              foreach ($categoryList as $item) {
                echo '<p href="sanpham.php?TenHang=' . $item['TenHang'] . '" style="cursor: pointer;" id="" class="active">' . $item['TenHang'] . '</p>';
              }
              ?>
              <!-- <p style="cursor: pointer;" id="hp-mobile-select-xe-may" class="active">HONDA</p>
              <p style="cursor: pointer;" id="hp-mobile-select-oto">YAMAHA</p> -->
            </div>
          </div>
        </div>
      </div>
      <!-- slide product -->
      <!-- ---------------------------------  -->
      <div class="slide-container swiper">
        <div class="slide-content">
          <div class="card-wrapper swiper-wrapper">
            <?php
            $SQL = 'SELECT * FROM xe WHERE HienThi = "1"';
            $categoryList = executeResult($SQL);
            foreach ($categoryList as $item) {
              $Gia =  number_format($item['Gia'], 0, ",", ".");
              echo '
                  <div class="card swiper-slide">
                    <a style="text-decoration: none" href="./chitietxe.php?MaXe=' . $item['MaXe'] . '" >
                      <div class="image-content">
                          <div class="card-image">
                              <img src="../DoAn/image/' . $item['Hinh'] . '" alt="" class="card-img">
                          </div>
                      </div>
                      <div class="card-content">
                          <div class="name">' . $item['TenXe'] . '</div>
                          <div class="price">Từ ' . $Gia . ' VNĐ</div>
                      </div>
                    </a>
              </div>
              ';
            }
            ?>
          </div>
        </div>
        <div class="swiper-button-next swiper-navBtn"></div>
        <div class="swiper-button-prev swiper-navBtn"></div>
        <!-- <div class="swiper-pagination"></div> -->
      </div>
      <!-- ------------------------------ -->

      <!-- ---------homepage-operation------------------------- -->

      <div class="container homepage-news container-fix-ipad">
        <div class="d-flex justify-content-center">
          <div class="homepage-operation-head">
            <div class="div-group1">
              <div class="col-line"></div>
              <h3 class="homepage-product-head-title">Tin tức nổi bật</h3>
            </div>
          </div>
        </div>
        <div class="d-flex justify-content-center">
          <div class="homepage-operation-head row">
            <div class="homepage-new-left pl-0 col-xl-6 col-lg-6 col-12 pr-0 pr-lg-3">
              <a href="">
                <div class="homepage-new-container" id="homepage-new-container-1">
                  <div class="homepage-new-child-img-container">
                    <img src="https://cdn.honda.com.vn/news-motorbike/January2022/OAofiOjhN5QM2dvMlnal.jpg" class="homepage-new-child-img">
                  </div>
                  <p class="homepage-new-publish">22/01/2022</p>
                  <p class="homepage-new-child-img-text big">Honda Việt Nam giới thiệu phiên bản mới mẫu xe phân khối lớn Gold Wing và Rebel 500</p>
                  <p class="homepage-new-read-more">Xem thêm</p>
                </div>
              </a>
            </div>
            <div class="col-xl-6 col-lg-6 col-12 pr-0">
              <div class="homepage-new-right row ">
                <div class="homepage-news-multi-left pl-0 col-md-6 col-lg-6 col-xl-6">
                  <a href="">
                    <div class="homepage-new-container" id="homepage-new-container-2">
                      <div class="homepage-new-child-img-container-child">
                        <img src="https://cdn.honda.com.vn/news-motorbike/December2021/fRCeI9b1DG89M6KTUBgW.png" class="homepage-new-child-img">
                      </div>
                      <p class="homepage-new-publish">29/12/2021</p>
                      <p class="homepage-new-child-img-text small">Honda Việt Nam phối hợp với Bưu Điện Việt Nam triển khai thí điểm dự án sử dụng xe điện giao hàng</p>
                      <p class="homepage-new-read-more">Xem thêm</p>
                    </div>
                  </a>
                </div>
                <div class="homepage-news-multi-right homepage-news-multi-right-top pr-0 col-md-6 col-lg-6 col-xl-6">
                  <a href="">
                    <div class="homepage-new-container" id="homepage-new-container-3">
                      <div class="homepage-new-child-img-container-child">
                        <img src="https://cdn.honda.com.vn/news-motorbike/December2021/YDsRIyF8SBXU4X4HqPOx.jpg" class="homepage-new-child-img">
                      </div>
                      <p class="homepage-new-publish">23/12/2021</p>
                      <p class="homepage-new-child-img-text small">Honda Việt Nam giới thiệu WINNER X thế hệ mới 2022 -BỨT TỐC, LÊN NGÔI-</p>
                      <p class="homepage-new-read-more">Xem thêm</p>
                    </div>
                  </a>
                </div>
                <div class="homepage-news-multi-left homepage-news-multi-right-bottom homepage-news-multi-bottom pl-0 col-xl-6 col-md-6">
                  <a href="">
                    <div class="homepage-new-container" id="homepage-new-container-4">
                      <div class="homepage-new-child-img-container-child">
                        <img src="https://cdn.honda.com.vn/news-motorbike/December2021/YJki5S3Z76hfKi97U2tW.jpg" class="homepage-new-child-img">
                      </div>
                      <p class="homepage-new-publish">18/12/2021</p>
                      <p class="homepage-new-child-img-text small">Honda Việt Nam giới thiệu loạt phiên bản mới mẫu xe phân khối lớn CB1000R, CB650R và CBR650R</p>
                      <p class="homepage-new-read-more">Xem thêm</p>
                    </div>
                  </a>
                </div>
                <div class="homepage-news-multi-right homepage-news-multi-right-bottom homepage-news-multi-bottom pr-0 col-xl-6 col-md-6">
                  <a href="">
                    <div class="homepage-new-container" id="homepage-new-container-4">
                      <div class="homepage-new-child-img-container-child">
                        <img src="https://cdn.honda.com.vn/news-motorbike/December2021/JyIIfRolikjRPVlka0kO.jpg" class="homepage-new-child-img">
                      </div>
                      <p class="homepage-new-publish">13/12/2021</p>
                      <p class="homepage-new-child-img-text small">Honda Việt Nam giới thiệu phiên bản hoàn toàn mới LEAD 125cc - Lướt thanh lịch, “LEAD” cuộc sống -</p>
                      <p class="homepage-new-read-more">Xem thêm</p>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- </div> -->
    </div>

    <!-- footer -->
    <?php
    require_once('./foodter.php');
    ?>
    <!-- Swiper JS  -->
<script src="./js/swiper-bundle.min.js"></script>
<!-- JavaScript  -->
<script src="./js/script.js"></script>
</body>


</html>