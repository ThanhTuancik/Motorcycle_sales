<?php session_start(); ?>

<?php
// include('../include/connect.php');
require_once('../include/connect.php');
if ($_SESSION['USER'] == '') {
    header('Location: login.php');
}
$MaXe = '';
        // Kiểm tra MaXe
        $KT = 'SELECT MaXe FROM xe';
        $categoryList = executeResult($KT);
        foreach ($categoryList as $item) {
            $MaXe = $item['MaXe'];
            $TachChuoi = explode('X', $MaXe);
            $chuoiso = $TachChuoi[1];
            for ($Count = 1; $Count <= $chuoiso;) {
                if ($Count = $chuoiso) {
                    $Count++;
                    $MaXe = 'X' . $Count;
                }
            }
        }
        if ($MaXe == '') {
            $MaXe = 'X1';
        }
if (isset($_POST['them'])) {
    $TenHang = $_POST['TenHang'];
    $target_dir = '../image/Sanpham/';
    $target_file = $_FILES['Hinh']['name'];
    $allowtypes    = array('jpg', 'png', 'jpeg');

    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

    $check = getimagesize($_FILES["Hinh"]["tmp_name"]);
    if ($check !== false) {
        $allowUpload = true;
    } else {
        $allowUpload = false;
    }
    if (!in_array($imageFileType, $allowtypes)) {
        $allowUpload = false;
    }
    if ($allowUpload) {
        $Hinh = $target_dir . $target_file;
        move_uploaded_file($_FILES['Hinh']['tmp_name'], $target_dir . $target_file);
        $MaLoai = $_POST['MaLoai'];
        
        $TenXe = $_POST['TenXe'];
        $Gia = $_POST['Gia'];
        if (isset($_POST['HienThi'])) {
            $HienThi = "1";
        } else {
            $HienThi = "0";
        }

        $KhoiLuong = $_POST['KhoiLuong'];
        $ChieuDai = $_POST['ChieuDai'];
        $ChieuRong = $_POST['ChieuRong'];
        $ChieuCao = $_POST['ChieuCao'];
        $KhoangCachTrucBanh = $_POST['KhoangCachTrucBanh'];
        $DoCaoYen = $_POST['DoCaoYen'];
        $KhoangSangGamXe = $_POST['KhoangSangGamXe'];
        $DungTichBinhXang = $_POST['DungTichBinhXang'];
        $LopTruoc = $_POST['LopTruoc'];
        $LopSau = $_POST['LopSau'];
        $PhuocTruoc = $_POST['PhuocTruoc'];
        $PhuocSau = $_POST['PhuocSau'];
        $LoaiDongCo = $_POST['LoaiDongCo'];
        $CongSuatToiDa = $_POST['CongSuatToiDa'];
        $DungTichNhot = $_POST['DungTichNhot'];
        $TieuThu = $_POST['TieuThu'];
        $LoaiChuyenDong = $_POST['LoaiChuyenDong'];
        $HeThongKhoiDong = $_POST['HeThongKhoiDong'];
        $Momen = $_POST['Momen'];
        $DungTichXyLanh = $_POST['DungTichXyLanh'];
        $DungTichPitTong = $_POST['DungTichPitTong'];
        $HanhTrinhPitTong = $_POST['HanhTrinhPitTong'];
        $TiSoNen = $_POST['TiSoNen'];
        $SQL_ADD_XE = 'INSERT INTO xe VALUES ("' . $MaXe . '","' . $TenXe . '",' . $Gia . ',"' . $target_dir . $target_file . '","' . $TenHang . '","' . $MaLoai . '","0");';
        execute($SQL_ADD_XE);
        $SQL_ADD_CHITIETXE = 'INSERT INTO chitietxe VALUES ("' . $MaXe . '","' . $KhoiLuong . '","' . $ChieuDai . '","' . $ChieuRong . '","' . $ChieuCao . '","' . $KhoangCachTrucBanh . '","' . $DoCaoYen . '","' . $KhoangSangGamXe . '","' . $DungTichBinhXang . '","' . $LopTruoc . '","' . $LopSau . '","' . $PhuocTruoc . '","' . $PhuocSau . '","' . $LoaiDongCo . '","' . $CongSuatToiDa . '","' . $DungTichNhot . '","' . $TieuThu . '","' . $LoaiChuyenDong . '","' . $HeThongKhoiDong . '","' . $Momen . '","' . $DungTichXyLanh . '","' . $DungTichPitTong . '","' . $HanhTrinhPitTong . '","' . $TiSoNen . '");';
        execute($SQL_ADD_CHITIETXE);
        header('Location: sanpham.php?TenHang=' . $TenHang . '');
        die();
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <?php
    require_once('./style.php');
    ?>

</head>

<body>
    <!-- Phần sidebar -->
    <?php
    require_once('./sidebar.php');
    ?>
    <!-- Phần nội dung -->
    <section class="layout-content" style="overflow: auto;">
        <div class="content">
            <div class="header">
                <i class='bx bx-menu'></i>
                <div class="title-content">THÊM SẢN PHẨM</div>
            </div>
            <div class="menu-content">
                <a class="parent" href="admin.php">HOME</a>
                <span class="img">></span>
                <span>THÊM SẢN PHẨM</span>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="img">
                        <i class='bx bxs-receipt'></i>
                    </div>
                    <div class="dulieu">
                        <span>Thêm sản phẩm</span>
                    </div>
                </div>
                <div class="card-body">

                    <form class="row g-3" method="post" enctype="multipart/form-data">

                        <div class="col-md-4">
                            <label class="form-label">Tên Hãng</label>
                            <select name="TenHang" class="form-select">
                                <?php
                                // lấy dữ liệu hãng ra
                                $SQL = 'SELECT * FROM hang';
                                $categoryList = executeResult($SQL);
                                foreach ($categoryList as $item) {
                                    echo '<option selected="selected" value="' . $item['TenHang'] . '"> ' . $item['TenHang'] . ' </option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Mã xe</label>
                            <input type="text" class="form-control" name="MaXe" value="<?php if(isset($MaXe)) echo $MaXe;?>" disabled>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Mã loại</label>
                            <select name="MaLoai" class="form-select">
                                <?php
                                // lấy dữ liệu hãng ra
                                $SQL = 'SELECT * FROM loaixe';
                                $categoryList = executeResult($SQL);
                                foreach ($categoryList as $item) {
                                    echo '<option selected="selected" value="' . $item['MaLoai'] . '"> ' . $item['TenLoai'] . ' </option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="formFile" class="form-label">Hình ảnh</label>
                            <input class="form-control" type="file" id="Hinh" name="Hinh">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Tên xe</label>
                            <input type="text" class="form-control" name="TenXe">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Giá bán</label>
                            <input type="text" class="form-control" name="Gia">
                        </div>

                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="HienThi" name="HienThi">
                                <label class="form-check-label form-label" for="gridCheck">
                                    Hiển thị
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Khối lượng</label>
                            <input type="text" class="form-control" name="KhoiLuong">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Chiều dài</label>
                            <input type="text" class="form-control" name="ChieuDai">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Chiều rộng</label>
                            <input type="text" class="form-control" name="ChieuRong">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Chiều cao</label>
                            <input type="text" class="form-control" name="ChieuCao">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Khoảng cách trục bánh</label>
                            <input type="text" class="form-control" name="KhoangCachTrucBanh">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Độ cao yên</label>
                            <input type="text" class="form-control" name="DoCaoYen">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Khoảng sáng gầm xe</label>
                            <input type="text" class="form-control" name="KhoangSangGamXe">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Dung tích bình xăng</label>
                            <input type="text" class="form-control" name="DungTichBinhXang">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Lốp trước</label>
                            <input type="text" class="form-control" name="LopTruoc">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Lốp sau</label>
                            <input type="text" class="form-control" name="LopSau">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Phuộc trước</label>
                            <input type="text" class="form-control" name="PhuocTruoc">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Phuộc sau</label>
                            <input type="text" class="form-control" name="PhuocSau">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Loại động cơ</label>
                            <input type="text" class="form-control" name="LoaiDongCo">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Công suất tối đa</label>
                            <input type="text" class="form-control" name="CongSuatToiDa">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Dung tích nhớt</label>
                            <input type="text" class="form-control" name="DungTichNhot">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Mức tiêu thụ nhiên liệu</label>
                            <input type="text" class="form-control" name="TieuThu">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Loại chuyển động</label>
                            <input type="text" class="form-control" name="LoaiChuyenDong">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Hệ thống khởi động</label>
                            <input type="text" class="form-control" name="HeThongKhoiDong">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Momen</label>
                            <input type="text" class="form-control" name="Momen">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Dung tích xy-lanh</label>
                            <input type="text" class="form-control" name="DungTichXyLanh">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Dung tích pit-tong</label>
                            <input type="text" class="form-control" name="DungTichPitTong">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Hành trình pit-tong</label>
                            <input type="text" class="form-control" name="HanhTrinhPitTong">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Tỉ số nén</label>
                            <input type="text" class="form-control" name="TiSoNen">
                        </div>
                        <input class="btn btn-primary btn-lg" type="submit" id="them" name="them" value="Thêm">
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="./js/a.js"></script>

</body>

</html>