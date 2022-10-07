<?php session_start(); ?>

<?php
include('../include/connect.php');
if ($_SESSION['USER'] == '') {
    header('Location: login.php');
}

if (!empty($_POST)) {
    if (isset($_POST['update'])) {
    $TenHang = $_GET['TenHang'];
    $MaLoai = $_POST['MaLoai'];
    $MaXe = $_GET['MaXe'];
    $TenXe = $_POST['TenXe'];
    // Kiểm tra hình
  $target_dir = '../image/Sanpham/';
  $target_file = $_FILES['Hinh']['name'];
    // Kiểm tra có dữ liệu trong $target_file không
  if ($target_file == '')
  {
    $MaXe = $_GET['MaXe'];
            $SQL_layhinh = 'SELECT Hinh FROM xe WHERE MaXe = "'.$MaXe.'"';
            $layhinh = executeResult($SQL_layhinh);
            foreach ($layhinh as $h) {
                $Hinh = $h['Hinh'];
            }
  }else{
       
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
            $Hinh = $target_dir.$target_file;
            move_uploaded_file($_FILES['Hinh']['tmp_name'], $target_dir . $target_file);  
        }
  }
  
        
    
    
     
    $Gia = $_POST['Gia'];
    if(isset($_POST['HienThi'])){
        $HienThi = "1";
    }else{
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

    $SQL_UPDATE_xe = 'UPDATE xe SET
             TenXe = "'.$TenXe.'", Gia = "'.$Gia.'", MaLoai = "'.$MaLoai.'", Hinh = "'.$Hinh.'" ,
             HienThi = "'.$HienThi.'"
            WHERE MaXe = "'.$MaXe.'"';
    execute($SQL_UPDATE_xe);
    $SQL_UPDATE_chitietxe = 'UPDATE chitietxe
                            SET KhoiLuong = "'.$KhoiLuong.'", ChieuDai = "'.$ChieuDai.'", 
                                ChieuRong = "'.$ChieuRong.'", ChieuCao = "'.$ChieuCao.'", 
                                KhoangCachTrucBanh = "'.$KhoangCachTrucBanh.'", DoCaoYen = "'.$DoCaoYen.'", 
                                DungTichBinhXang = "'.$DungTichBinhXang.'", LopTruoc = "'.$LopTruoc.'", 
                                KhoangSangGamXe = "'.$KhoangSangGamXe.'", 
                                LopSau = "'.$LopSau.'", PhuocTruoc = "'.$PhuocTruoc.'", 
                                PhuocSau = "'.$PhuocSau.'", LoaiDongCo = "'.$LoaiDongCo.'", 
                                CongSuatToiDa = "'.$CongSuatToiDa.'", DungTichNhot = "'.$DungTichNhot.'",
                                TieuThu = "'.$TieuThu.'", LoaiChuyenDong = "'.$LoaiChuyenDong.'", 
                                HeThongKhoiDong = "'.$HeThongKhoiDong.'", Momen = "'.$Momen.'", 
                                DungTichXyLanh = "'.$DungTichXyLanh.'", DungTichPitTong = "'.$DungTichPitTong.'", 
                                HanhTrinhPitTong = "'.$HanhTrinhPitTong.'", TiSoNen = "'.$TiSoNen.'"
                            WHERE MaXe = "'.$MaXe.'"';
    execute($SQL_UPDATE_chitietxe);
    header('Location: sanpham.php?TenHang='.$TenHang.'');
    die();
}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update Sản Phẩm</title>
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
                <div class="title-content">CẬP NHẬT SẢN PHẨM</div>
            </div>
            <div class="menu-content">
                <a class="parent" href="admin.php">HOME</a>
                <span class="img">></span>
                <span>CẬP NHẬT SẢN PHẨM</span>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="img">
                    <i class='bx bxs-receipt'></i>
                    </div>
                    <div class="dulieu">
                        <span>THÔNG TIN SẢN PHẨM</span>
                    </div>
                </div>
                <div class="card-body">
                <?php
                $TenHang = $_GET['TenHang'];
                $MaXe = $_GET['MaXe'];
                $SQL = 'SELECT xe.MaXe, KhoiLuong, ChieuDai, ChieuRong, ChieuCao, KhoangCachTrucBanh, 
                            DoCaoYen, KhoangSangGamXe, DungTichBinhXang, LopTruoc, LopSau, PhuocTruoc, 
                            PhuocSau, LoaiDongCo, CongSuatToiDa, DungTichNhot, TieuThu, LoaiChuyenDong, 
                            HeThongKhoiDong, Momen, DungTichXyLanh, DungTichPitTong, HanhTrinhPitTong, 
                            TiSoNen, xe.Hinh, xe.TenXe, xe.Gia, xe.TenHang, xe.HienThi
                                    FROM chitietxe
                                    INNER JOIN xe
                                    ON chitietxe.MaXe = xe.MaXe
                                    WHERE xe.TenHang = "' . $TenHang . '" AND chitietxe.MaXe = "' . $MaXe . '"';
                $categoryList = executeResult($SQL);
                foreach ($categoryList as $item) {
                    echo '<form class="row g-3" method="post" enctype="multipart/form-data">
                    <div class="col-md-4">
                        <label class="form-label">Tên Hãng</label>
                        
                        <input type="text" disabled class="form-control" id="TenHang" name="TenHang" value="'.$TenHang.'">
                        
                       
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Mã xe</label>
                        <input type="text" disabled class="form-control" id="MaXe" name="MaXe" value="'.$MaXe.'">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Mã loại</label>
                        <select id="MaLoai" name="MaLoai" class="form-select">';
                            $MaLoai = $_GET['MaLoai'];
                            // lấy dữ liệu loại xe ra
                            $SQL_loaixe = 'SELECT * FROM loaixe ';
                            $CategoryList = executeResult($SQL_loaixe);
                            foreach ($CategoryList as $i) {
                                if($i['MaLoai'] == $MaLoai){
                                    echo '<option selected="selected" value="' . $i['MaLoai'] . '"> ' . $i['TenLoai'] . ' </option>';
                                }else{
                                    echo '<option value="' . $i['MaLoai'] . '"> ' . $i['TenLoai'] . ' </option>';
                                }
                                    
                            }
                            
                            echo ' </select>
                    </div>
                    
                    <div class="col-md-6">
                        <label for="formFile" class="form-label">Hình ảnh</label>
                        <input class="form-control" type="file" id="Hinh" name="Hinh" value="'.$item['Hinh'].'">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Tên xe</label>
                        <input type="text" class="form-control" id="TenXe" name="TenXe" value="'.$item['TenXe'].'">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Giá bán</label>
                        <input type="text" class="form-control" id="Gia" name="Gia" value="'.$item['Gia'].'">
                    </div>';
                    if($item['HienThi'] == 1){
                        echo'<div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" checked="checked" id="HienThi" name="HienThi" >
                            <label class="form-check-label form-label" for="gridCheck">
                                Hiển thị
                            </label>
                        </div>
                    </div>';
                    }else{
                        echo'<div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="HienThi" name="HienThi">
                            <label class="form-check-label form-label" for="gridCheck">
                                Hiển thị
                            </label>
                        </div>
                    </div>';
                    }
                    
                        echo '
                    <div class="col-md-6">
                        <label class="form-label">Khối lượng</label>
                        <input type="text" class="form-control" id="KhoiLuong" name="KhoiLuong" value="'.$item['KhoiLuong'].'">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Chiều dài</label>
                        <input type="text" class="form-control" id="ChieuDai" name="ChieuDai" value="'.$item['ChieuDai'].'">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Chiều rộng</label>
                        <input type="text" class="form-control" id="ChieuRong" name="ChieuRong" value="'.$item['ChieuRong'].'">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Chiều cao</label>
                        <input type="text" class="form-control" id="ChieuCao" name="ChieuCao" value="'.$item['ChieuCao'].'">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Khoảng cách trục bánh</label>
                        <input type="text" class="form-control" id="KhoangCachTrucBanh" name="KhoangCachTrucBanh" value="'.$item['KhoangCachTrucBanh'].'">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Độ cao yên</label>
                        <input type="text" class="form-control" id="DoCaoYen" name="DoCaoYen" value="'.$item['DoCaoYen'].'">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Khoảng sáng gầm xe</label>
                        <input type="text" class="form-control" id="KhoangSangGamXe" name="KhoangSangGamXe" value="'.$item['KhoangSangGamXe'].'">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Dung tích bình xăng</label>
                        <input type="text" class="form-control" id="DungTichBinhXang" name="DungTichBinhXang" value="'.$item['DungTichBinhXang'].'">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Lốp trước</label>
                        <input type="text" class="form-control" id="LopTruoc" name="LopTruoc" value="'.$item['LopTruoc'].'">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Lốp sau</label>
                        <input type="text" class="form-control" id="LopSau" name="LopSau" value="'.$item['LopSau'].'">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Phuộc trước</label>
                        <input type="text" class="form-control" id="PhuocTruoc" name="PhuocTruoc" value="'.$item['PhuocTruoc'].'">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Phuộc sau</label>
                        <input type="text" class="form-control" id="PhuocSau" name="PhuocSau" value="'.$item['PhuocSau'].'">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Loại động cơ</label>
                        <input type="text" class="form-control" id="LoaiDongCo" name="LoaiDongCo" value="'.$item['LoaiDongCo'].'">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Công suất tối đa</label>
                        <input type="text" class="form-control" id="CongSuatToiDa" name="CongSuatToiDa" value="'.$item['CongSuatToiDa'].'">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Dung tích nhớt</label>
                        <input type="text" class="form-control" id="DungTichNhot" name="DungTichNhot" value="'.$item['DungTichNhot'].'">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Mức tiêu thụ nhiên liệu</label>
                        <input type="text" class="form-control" id="TieuThu" name="TieuThu" value="'.$item['TieuThu'].'">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Loại chuyển động</label>
                        <input type="text" class="form-control" id="LoaiChuyenDong" name="LoaiChuyenDong" value="'.$item['LoaiChuyenDong'].'">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Hệ thống khởi động</label>
                        <input type="text" class="form-control" id="HeThongKhoiDong" name="HeThongKhoiDong" value="'.$item['HeThongKhoiDong'].'">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Momen</label>
                        <input type="text" class="form-control" id="Momen" name="Momen" value="'.$item['Momen'].'">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Dung tích xy-lanh</label>
                        <input type="text" class="form-control" id="DungTichXyLanh" name="DungTichXyLanh"" value="'.$item['DungTichXyLanh'].'">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Dung tích pit-tong</label>
                        <input type="text" class="form-control" id="DungTichPitTong" name="DungTichPitTong" value="'.$item['DungTichPitTong'].'">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Hành trình pit-tong</label>
                        <input type="text" class="form-control" id="HanhTrinhPitTong" name="HanhTrinhPitTong" value="'.$item['HanhTrinhPitTong'].'">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Tỉ số nén</label>
                        <input type="text" class="form-control" id="TiSoNen" name="TiSoNen" value="'.$item['TiSoNen'].'">
                    </div>
                    <input type="submit" class="btn btn-primary btn-lg" name="update" id="update" value="Cập Nhật"></input>
                    
                </form>';
                }
                ?>
                    
                </div>
            </div>
        </div>
    </section>
    <script src="./js/a.js"></script>

</body>

</html>