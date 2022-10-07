<?php session_start(); ?>

<?php
if ($_SESSION['USER'] == '') {
    header('Location: login.php');
}
?>

<?php
// include('../include/connect.php');
require_once('../include/connect.php');

if (isset($_POST['btn-update'])) {
    $MaXe = $_POST['MaXe'];
    $TenHang = $_POST['TenHang'];
    $MaLoai = $_POST['MaLoai'];
    header('Location: update_sp.php?MaXe=' . $MaXe . '&TenHang='.$TenHang.'&MaLoai='.$MaLoai.'');
}

if (isset($_POST['btn-delete'])) {
    $MaXe = $_POST['MaXe'];
    $TenHang = $_POST['TenHang'];
    // Xóa thông tin bảng chitietxe
    $SQL_DELETE_CHITIETXE = 'DELETE FROM chitietxe WHERE MaXe = "' . $MaXe . '"';
    execute($SQL_DELETE_CHITIETXE);
    // Xóa thông tin bảng xe
    $SQL_DELETE_XE = 'DELETE FROM xe WHERE MaXe = "' . $MaXe . '"';
    execute($SQL_DELETE_XE);
    header('Location: sanpham.php?TenHang=' . $TenHang . '');
    die();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin</title>
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
                <div class="title-content">SẢN PHẨM <?php $TenHang = $_GET['TenHang'];
                                                    echo '' . $TenHang . ''; ?></div>
            </div>
            <div class="menu-content">
                <a class="parent" href="admin.php">HOME</a>
                <span class="img">></span>
                <span>SẢN PHẨM <?php $TenHang = $_GET['TenHang'];
                                echo '' . $TenHang . ''; ?></span>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="img">
                    <i class='bx bxs-receipt'></i>
                    </div>
                    <div class="dulieu">
                        <span>Dữ liệu sản phẩm</span>
                    </div>
                    <div class="btn-add"><a href="themsp.php">Thêm mới</a></div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table>
                            <tr class="title">
                                <td>Chức năng</td>
                                <td>Hiển Thị</td>
                                <td>Hình</td>
                                <td>Mã Xe</td>
                                <td>Tên xe</td>
                                <td>Giá</td>
                                <td>Khối lượng</td>
                                <td>Chiều dài</td>
                                <td>chiều rộng</td>
                                <td>Chiều cao</td>
                                <td>Khoảng cách trục bánh</td>
                                <td>Độ cao yên</td>
                                <td>Khoảng sáng gầm xe</td>
                                <td>Dung tích bình xăng</td>
                                <td>Lốp trước</td>
                                <td>Lốp sau</td>
                                <td>Phuộc trước</td>
                                <td>Phuộc sau</td>
                                <td>Loại động cơ</td>
                                <td>Công suất tối đa</td>
                                <td>Dung tích nhớt</td>
                                <td>Tiêu thụ</td>
                                <td>Loại chuyển động</td>
                                <td>Hệ thống khởi động</td>
                                <td>Momen</td>
                                <td>Dung tích xy-lanh</td>
                                <td>Dung tích Pit-tông</td>
                                <td>Hành trình Pit-tông</td>
                                <td>Tỉ số nén</td>
                            </tr>

                            <?php
                            $TenHang = $_GET['TenHang'];
                            // lấy dữ liệu hãng ra
                            $SQL = 'SELECT xe.MaLoai, chitietxe.MaXe, KhoiLuong, ChieuDai, ChieuRong, 
                            ChieuCao, KhoangCachTrucBanh, 
                            DoCaoYen, KhoangSangGamXe, DungTichBinhXang, LopTruoc, LopSau, PhuocTruoc, 
                            PhuocSau, LoaiDongCo, CongSuatToiDa, DungTichNhot, TieuThu, LoaiChuyenDong, 
                            HeThongKhoiDong, Momen, DungTichXyLanh, DungTichPitTong, HanhTrinhPitTong, 
                            TiSoNen, xe.Hinh, xe.TenXe, xe.Gia, xe.TenHang, xe.HienThi
                                    FROM chitietxe
                                    INNER JOIN xe
                                    ON chitietxe.MaXe = xe.MaXe
                                    INNER JOIN loaixe
                                    ON xe.MaLoai = loaixe.MaLoai
                                    WHERE xe.TenHang = "' . $TenHang . '"';
                            $categoryList = executeResult($SQL);
                            foreach ($categoryList as $item) {
                                if($item['HienThi'] == 1){
                                    $HienThi = '<span style="font-weight: bold; color: green;">Đang hiển thị</span>';
                                }else{
                                    $HienThi = '<span style="font-weight: bold; color: red;">Không hiển thị</span>';
                                }
                                echo '<tr>
                                <td>
                                    <form method="post">
                                        <input value="' . $item['MaXe'] . '" type="hidden" name="MaXe" id="MaXe">
                                        <input value="' . $item['MaLoai'] . '" type="hidden" name="MaLoai" id="MaLoai">
                                        <input value="' . $item['TenHang'] . '" type="hidden" name="TenHang" id="TenHang"> 
                                        
                                        <div class="frame">
                                        <a href="update_sp.php?MaXe=' . $item['MaXe'] . '&TenHang=' . $item['TenHang'] . '">
                                        <button id="btn-update" name="btn-update" class="custom-btn btn-7 xn">
                                        <span>
                                           Cập nhật
                                        </span>
                                        </button>
                                        </a>
                                        </div>
                                        <div class="frame">
                                        <button id="btn-delete" name="btn-delete" class="custom-btn btn-7 huy"><span>xóa</span></button>
                                        </div>
                                    </form>
                                </td>
                                <td>' . $HienThi . '</td>
                                <td><img class="anhsp" src="' . $item['Hinh'] . '"></td>
                                <td>' . $item['MaXe'] . '</td>
                                <td>' . $item['TenXe'] . '</td>
                                <td>' . $item['Gia'] . '</td>
                                <td>' . $item['KhoiLuong'] . '</td>
                                <td>' . $item['ChieuDai'] . '</td>
                                <td>' . $item['ChieuRong'] . '</td>
                                <td>' . $item['ChieuCao'] . '</td>
                                <td>' . $item['KhoangCachTrucBanh'] . '</td>
                                <td>' . $item['DoCaoYen'] . '</td>
                                <td>' . $item['KhoangSangGamXe'] . '</td>
                                <td>' . $item['DungTichBinhXang'] . '</td>
                                <td>' . $item['LopTruoc'] . '</td>
                                <td>' . $item['LopSau'] . '</td>
                                <td>' . $item['PhuocTruoc'] . '</td>
                                <td>' . $item['PhuocSau'] . '</td>
                                <td>' . $item['LoaiDongCo'] . '</td>
                                <td>' . $item['CongSuatToiDa'] . '</td>
                                <td>' . $item['DungTichNhot'] . '</td>
                                <td>' . $item['TieuThu'] . '</td>
                                <td>' . $item['LoaiChuyenDong'] . '</td>
                                <td>' . $item['HeThongKhoiDong'] . '</td>
                                <td>' . $item['Momen'] . '</td>
                                <td>' . $item['DungTichXyLanh'] . '</td>
                                <td>' . $item['DungTichPitTong'] . '</td>
                                <td>' . $item['HanhTrinhPitTong'] . '</td>
                                <td>' . $item['TiSoNen'] . '</td>
                            </tr>';
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="./js/a.js"></script>
</body>

</html>