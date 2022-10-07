<?php session_start(); ?>

<?php
// include('../include/connect.php');
require_once('../include/connect.php');

if ($_SESSION['USER'] == '') {
    header('Location: login.php');
}
if(isset($_POST['btn-xuly'])){
    $MaDonHang = $_POST['MaDonHang'];
    $SQL = 'UPDATE donhang SET  TrangThai = "1" WHERE MaDonHang = "' . $MaDonHang . '"';
    execute($SQL);
    header('Location: donhang.php');
    die();
}
if(isset($_POST['btn-xoa'])){
    $MaKhachHang = $_POST['MaKhachHang'];
    $SQL = 'DELETE FROM khachhang WHERE MaKhachHang = "' . $MaKhachHang . '"';
    execute($SQL);
    header('Location: donhang.php');
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
                <div class="title-content">ĐƠN HÀNG</div>
            </div>
            <div class="menu-content">
                <a class="parent" href="admin.php">HOME</a>
                <span class="img">></span>
                <span>QUẢN LÝ ĐƠN HÀNG</span>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="img">
                    <i class='bx bxs-receipt'></i>
                    </div>
                    <div class="dulieu">
                        <span>Dữ liệu đơn hàng</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table>
                            <tr class="title">
                                <td>Mã đơn hàng</td>
                                <td>Tên sản phẩm</td>
                                <td>Tên khách hàng</td>
                                <td>Ngày đăng ký</td>
                                <td>Địa chỉ</td>
                                <td>Số điện thoại</td>
                                <td>Email</td>
                                <td>Ghi chú</td>
                                <td>Trạng thái</td>
                                <td>Chức năng</td>
                            </tr>
                            <?php
                            $SQL = 'SELECT MaDonHang, xe.TenXe, TenKhachHang, NgayDK, DiaChi, SDT, Email, GhiChu, TrangThai, khachhang.MaKhachHang
                                     FROM donhang
                                     INNER JOIN khachhang
                                     ON donhang.MaKhachHang = khachhang.MaKhachHang
                                     INNER JOIN xe 
                                     ON donhang.MaXe = xe.MaXe';
                            $categoryList = executeResult($SQL);
                            foreach ($categoryList as $item) {

                                if ($item['TrangThai'] == 1) {
                                    $TrangThai = '<span style="font-weight: bold; color: green;">Đã xử lý</span>';
                                    $Ngaydk = $item['NgayDK'];
                                    $date= date_create("$Ngaydk");
                                    $NgayDK = date_format($date,"d/m/Y");
                                    echo '<tr>
                                            <td>' . $item['MaDonHang'] . '</td>
                                            <td>' . $item['TenXe'] . '</td>
                                            <td>' . $item['TenKhachHang'] . '</td>
                                            <td>' . $NgayDK . '</td>
                                            <td>' . $item['DiaChi'] . '</td>
                                            <td>' . $item['SDT'] . '</td>
                                            <td>' . $item['Email'] . '</td>
                                            <td>' . $item['GhiChu'] . '</td>
                                            <td>' . $TrangThai . '</td>
                                            <td>
                                            <form method="post">
                                            <input value="' . $item['MaDonHang'] . '" class="form-control" id="MaDonHang" name="MaDonHang" type="hidden"/>
                                            <input value="' . $item['MaKhachHang'] . '" class="form-control" id="MaKhachHang" name="MaKhachHang" type="hidden"/>
                                                <div class="frame">
                                        <button id="btn-xoa" name="btn-xoa" class="custom-btn btn-7 huy"><span>xóa</span></button>
                                    </div>
                                                </form>
                                            </td>
                                    </tr>';
                                } else {
                                    $TrangThai = '<span style="font-weight: bold; color: red;">Chưa xử lý</span>';
                                    $Ngaydk = $item['NgayDK'];
                                    $date= date_create("$Ngaydk");
                                    $NgayDK = date_format($date,"d/m/Y");
                                    echo '<tr>
                                            <td>' . $item['MaDonHang'] . '</td>
                                            <td>' . $item['TenXe'] . '</td>
                                            <td>' . $item['TenKhachHang'] . '</td>
                                            <td>' . $NgayDK . '</td>
                                            <td>' . $item['DiaChi'] . '</td>
                                            <td>' . $item['SDT'] . '</td>
                                            <td>' . $item['Email'] . '</td>
                                            <td>' . $item['GhiChu'] . '</td>
                                            <td>' . $TrangThai . '</td>
                                            <td>
                                            <form method="post">
                                            <input value="' . $item['MaDonHang'] . '" class="form-control" id="MaDonHang" name="MaDonHang" type="hidden"/>
                                            <input value="' . $item['MaKhachHang'] . '" class="form-control" id="MaKhachHang" name="MaKhachHang" type="hidden"/>
                                                <div class="frame">
                                        <button id="btn-xuly" name="btn-xuly" class="custom-btn btn-7 xn"><span>Xử lý</span></button>
                                    </div>
                                    <div class="frame">
                                        <button id="btn-xoa" name="btn-xoa" class="custom-btn btn-7 huy"><span>xóa</span></button>
                                    </div>
                                                </form>
                                            </td>
                                    </tr>';
                                }
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