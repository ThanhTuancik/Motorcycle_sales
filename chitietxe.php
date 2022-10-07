<?php session_start(); ?>


<?php
// include('../include/connect.php');
require_once('./include/connect.php');
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Chi tiết sản phẩm</title>
    <!-- JS only -->
   

    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- <link rel="stylesheet" href="./CSS/index.css" /> -->
    <link rel="stylesheet" href="./CSS/bootstrap.min.css.css" />
    <link rel="stylesheet" href="./CSS/common.css" />
    <link rel="stylesheet" href="./CSS/font-awesome.min.css" />
    <link rel="stylesheet" href="./CSS/slick-theme.min.css" />
    <link rel="stylesheet" href="./CSS/slick.min.css" />
    <link rel="stylesheet" href="./CSS/feel-the-performance/app.css" />
    <link rel="stylesheet" href="./CSS/promotion.css" />

    <link rel="stylesheet" href="./CSS/e.css" />




</head>

<body>

    <?php
    // include('../include/connect.php');
    require_once('./header.php');
    ?>

    <!-- banner -->
    <div id="motor-banner" class="container-fluid">
        <img src="https://cdn.honda.com.vn/motorbikes/December2021/HRoSXCmUDgeC0mvNem98.jpg" alt="">
    </div>
    <!-- content -->
    <div id="motor-detail" class="container">
        <div class="row d-none d-lg-block motor-breadscrumb" style="">
            <a class="breadscrumb-parent" href="/">Trang chủ</a>
            <span class="breadscrumb-arrow">❯</span>
            <a class="breadscrumb-parent" href="/xe-may/san-pham">Sản phẩm</a>
            <span class="breadscrumb-arrow">❯</span>
            <a class="breadscrumb-parent" href="/xe-may/san-pham">Honda</a>
            <span class="breadscrumb-arrow">❯</span>
            <a class="breadscrumb-current">
                <?php
                $MaXe = $_GET['MaXe'];
                $SQL = "SELECT TenXe FROM xe WHERE MaXe = '$MaXe'";
                $categoryList = executeResult($SQL);
                foreach ($categoryList as $item) {
                    echo $item['TenXe'];
                }
                ?>
            </a>
        </div>
        <?php
        $MaXe = $_GET['MaXe'];
        $SQL = "SELECT MaXe,TenXe, Gia, Hinh FROM xe WHERE MaXe = '$MaXe'";
        $categoryList = executeResult($SQL);
        foreach ($categoryList as $item) {
            $Gia =  number_format($item['Gia'], 0, ",", ".");
            echo '
                    <div class="row overview">
            <div class="col-12 col-lg-7 overview-left">
                <div class="characteristics-image">
                    <img src="./image/' . $item['Hinh'] . '" Width="400px" alt="">
                </div>
                <h3 class="d-block d-lg-none">' . $item['TenXe'] . '</h3>
                <h4 class="d-block d-lg-none">Giá từ: ' . $Gia . ' VNĐ</h4>

            </div>
            <div class="col-12 col-lg-5 overview-right">
                <h3 class="d-none d-lg-block">' . $item['TenXe'] . '</h3>
                <h4 class="d-none d-lg-block">Giá từ: ' . $Gia . ' VNĐ</h4>
                <div class="frame">
                    <a href="./modal.php?MaXe='.$item['MaXe'].'">
                    <button id="btn-open" class="custom-btn btn-7"><span>Mua Ngay</span></button>
                    </a>
                </div>
                <div class="overview-detail">

                    <p class="text-justify">Cuộc đời là một cuộc phiêu lưu tràn đầy những điều bất ngờ và mỗi người đều có một vạch đích của riêng mình. Hãy tự tin tạo những cú kích để vút xa và tạo dấu ấn riêng biệt cùng Honda WINNER X mới.<br>Đánh dấu sự chuyển mình mạnh mẽ hướng tới hình ảnh một mẫu siêu xe thể thao cỡ nhỏ hàng đầu tại Việt Nam cùng những trang bị hiện đại và tối tân, WINNER X mới sẵn sàng cùng các tay lái bứt tốc trên mọi hành trình khám phá.</p>

                </div>
            </div>
        </div>
                    ';
        }
        ?>





        <div class="row title">Thông số kĩ thuật</div>
        <?php
        $MaXe = $_GET['MaXe'];
        $SQL = "SELECT * FROM chitietxe WHERE MaXe = '$MaXe'";
        $categoryList = executeResult($SQL);
        foreach ($categoryList as $item) {
            echo '<div class="row justify-content-center detail-item specification">
            <div class="col-12 spec-inner">
                <div class="row spec-item">
                    <div class="col-12 col-lg-5 spec-item-label">Khối lượng bản thân</div>
                    <div class="col-12 col-lg-7 spec-item-value">
                        <p>'.$item['KhoiLuong'].'</p>
                    </div>
                </div>
                <div class="row spec-item">
                    <div class="col-12 col-lg-5 spec-item-label">Dài x Rộng x Cao</div>
                    <div class="col-12 col-lg-7 spec-item-value">
                        <p>'.$item['ChieuDai'].' x '.$item['ChieuRong'].' x '.$item['ChieuCao'].' mm</p>
                    </div>
                </div>
                <div class="row justify-content-center spec-item">
                    <div class="col-12 col-lg-5 spec-item-label">Khoảng cách trục bánh xe</div>
                    <div class="col-12 col-lg-7 spec-item-value">
                        <p>'.$item['KhoangCachTrucBanh'].'</p>
                    </div>
                </div>
                <div class="row spec-item">
                    <div class="col-12 col-lg-5 spec-item-label">Độ cao yên</div>
                    <div class="col-12 col-lg-7 spec-item-value">
                        <p>'.$item['DoCaoYen'].'</p>
                    </div>
                </div>
                <div class="row spec-item">
                    <div class="col-12 col-lg-5 spec-item-label">Khoảng sáng gầm xe</div>
                    <div class="col-12 col-lg-7 spec-item-value">
                        <p>'.$item['KhoangSangGamXe'].'</p>
                    </div>
                </div>
                <div class="row spec-item">
                    <div class="col-12 col-lg-5 spec-item-label">Dung tích bình xăng</div>
                    <div class="col-12 col-lg-7 spec-item-value">
                        <p>'.$item['DungTichBinhXang'].'</p>
                    </div>
                </div>
                <div class="row spec-item">
                    <div class="col-12 col-lg-5 spec-item-label">Kích cỡ lớp trước/ sau</div>
                    <div class="col-12 col-lg-7 spec-item-value">
                        <p>"Trước: '.$item['LopTruoc'].'<br>Sau: '.$item['LopSau'].'"</p>
                    </div>
                </div>
                <div class="row spec-item">
                    <div class="col-12 col-lg-5 spec-item-label">Phuộc trước</div>
                    <div class="col-12 col-lg-7 spec-item-value">
                        <p>'.$item['PhuocTruoc'].'</p>
                    </div>
                </div>
                <div class="row spec-item">
                    <div class="col-12 col-lg-5 spec-item-label">Phuộc sau</div>
                    <div class="col-12 col-lg-7 spec-item-value">
                        <p>'.$item['PhuocSau'].'</p>
                    </div>
                </div>
                <div class="row spec-item">
                    <div class="col-12 col-lg-5 spec-item-label">Loại động cơ</div>
                    <div class="col-12 col-lg-7 spec-item-value">
                        <p>'.$item['LoaiDongCo'].'</p>
                    </div>
                </div>
                <div class="row spec-item">
                    <div class="col-12 col-lg-5 spec-item-label">Công suất tối đa</div>
                    <div class="col-12 col-lg-7 spec-item-value">
                        <p>'.$item['CongSuatToiDa'].'</p>
                    </div>
                </div>
                <div class="row spec-item">
                    <div class="col-12 col-lg-5 spec-item-label">Dung tích nhớt máy</div>
                    <div class="col-12 col-lg-7 spec-item-value">
                        <p>"'.$item['DungTichNhot'].'"</p>
                    </div>
                </div>
                <div class="row spec-item">
                    <div class="col-12 col-lg-5 spec-item-label">Mức tiêu thụ nhiên liệu</div>
                    <div class="col-12 col-lg-7 spec-item-value">
                        <p>'.$item['TieuThu'].'</p>
                    </div>
                </div>
                <div class="row spec-item">
                    <div class="col-12 col-lg-5 spec-item-label">Loại truyền động</div>
                    <div class="col-12 col-lg-7 spec-item-value">
                        <p>'.$item['LoaiChuyenDong'].'</p>
                    </div>
                </div>
                <div class="row spec-item">
                    <div class="col-12 col-lg-5 spec-item-label">Hệ thống khởi động</div>
                    <div class="col-12 col-lg-7 spec-item-value">
                        <p>'.$item['HeThongKhoiDong'].'</p>
                    </div>
                </div>
                <div class="row spec-item">
                    <div class="col-12 col-lg-5 spec-item-label">Moment cực đại</div>
                    <div class="col-12 col-lg-7 spec-item-value">
                        <p>'.$item['Momen'].'</p>
                    </div>
                </div>
                <div class="row spec-item">
                    <div class="col-12 col-lg-5 spec-item-label">Dung tích xy-lanh</div>
                    <div class="col-12 col-lg-7 spec-item-value">
                        <p>'.$item['DungTichXyLanh'].'</p>
                    </div>
                </div>
                <div class="row spec-item">
                    <div class="col-12 col-lg-5 spec-item-label">Đường kính x Hành trình pít tông</div>
                    <div class="col-12 col-lg-7 spec-item-value">
                        <p>'.$item['DungTichPitTong'].' x '.$item['HanhTrinhPitTong'].'</p>
                    </div>
                </div>
                <div class="row spec-item">
                    <div class="col-12 col-lg-5 spec-item-label">Tỷ số nén</div>
                    <div class="col-12 col-lg-7 spec-item-value">
                        <p>'.$item['TiSoNen'].'</p>
                    </div>
                </div>
            </div>
        </div>';
        }
        ?>
        


    </div>

    <!-- footer -->
    <?php
    require_once('./foodter.php');
    ?>
</body>

</html>