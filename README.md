<?php
session_start();
?>
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
    header('Location: admin.php');
    die();
}
if(isset($_POST['btn-xoa'])){
    $MaKhachHang = $_POST['MaKhachHang'];
    $SQL = 'DELETE FROM khachhang WHERE MaKhachHang = "' . $MaKhachHang . '"';
    execute($SQL);
    header('Location: admin.php');
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
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
    <section class="layout-content">
        <div class="content">
            <div class="header">
                <i class='bx bx-menu'></i>
                <div class="title-content">ADMIN </div>
            </div>
            <div class="menu-content">
                <!-- Content Row -->
                <div class="row">

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="card donhang">
                        <div class="card-body">
                            <div class="col-left">
                                <div class="text">Đơn hàng</div>
                                <?php
                                    $Count = 0;
                                    $SQL = 'SELECT * FROM donhang';
                                    $categoryList = executeResult($SQL);
                                    foreach ($categoryList as $item) {
                                        $Count++;
                                    }
                                    echo '<div class="number">'.$Count.'</div>';
                                ?>
                                
                            </div>
                            <div class="logo">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card khachhang">
                        <div class="card-body">
                            <div class="col-left">
                                <div class="text">Khách hàng</div>
                                <?php
                                    $Count = 0;
                                    $SQL = 'SELECT * FROM khachhang';
                                    $categoryList = executeResult($SQL);
                                    foreach ($categoryList as $item) {
                                        $Count++;
                                    }
                                    echo '<div class="number">'.$Count.'</div>';
                                ?>
                            </div>
                            <div class="logo">
                                <i class="fas fa-solid fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card sanpham">
                        <div class="card-body">
                            <div class="col-left">
                                <div class="text">Sản phẩm</div>
                                <?php
                                    $Count = 0;
                                    $SQL = 'SELECT * FROM xe';
                                    $categoryList = executeResult($SQL);
                                    foreach ($categoryList as $item) {
                                        $Count++;
                                    }
                                    echo '<div class="number">'.$Count.'</div>';
                                ?>
                            </div>
                            <div class="logo">
                                <i class="fas fa-motorcycle fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card user">
                        <div class="card-body">
                            <div class="col-left">
                                <div class="text">Tài khoản</div>
                                <?php
                                    $Count = 0;
                                    $SQL = 'SELECT * FROM taikhoan';
                                    $categoryList = executeResult($SQL);
                                    foreach ($categoryList as $item) {
                                        $Count++;
                                    }
                                    echo '<div class="number">'.$Count.'</div>';
                                ?>
                            </div>
                            <div class="logo">
                                <i class="fas fa-user-gear fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h2>Danh sách đơn hàng chưa xử lý</h2>
            <div class="card-body">
                <div class="table-responsive">
                <form method="post">
                    <table>
                        <tr class="title">
                            <td>STT</td>
                            <td>Tên khách hàng</td>
                            <td>Ngày đăng ký</td>
                            <td>Tên xe</td>
                            <td>Giá</td>
                            <td>Email</td>
                            <td>Số điện thoại</td>
                            <td>Ghi chú</td>
                            <td>Chức năng</td>
                        </tr>
                        <?php
                        $STT = 1;
                        $SQL = 'SELECT MaDonHang, xe.TenXe, Gia, TenKhachHang, NgayDK, DiaChi, SDT, Email, GhiChu, TrangThai, khachhang.MaKhachHang
                                FROM donhang
                                INNER JOIN khachhang
                                ON donhang.MaKhachHang = khachhang.MaKhachHang
                                INNER JOIN xe 
                                ON donhang.MaXe = xe.MaXe';
                        $categoryList = executeResult($SQL);
                        foreach ($categoryList as $item) {
                            if ($item['TrangThai'] == 0) {
                                $Ngaydk = $item['NgayDK'];
                                $date= date_create("$Ngaydk");
                                $NgayDK = date_format($date,"d/m/Y");
                                $Gia =  number_format($item['Gia'], 0, ",", ".");
                                echo '<tr>
                                <td>'.$STT.'</td>
                                <td>'.$item['TenKhachHang'].'</td>
                                <td>'.$NgayDK.'</td>
                                <td>'.$item['TenXe'].'</td>
                                <td>'.$Gia.' VNĐ</td>
                                <td>'.$item['Email'].'</td>
                                <td>'.$item['SDT'].'</td>
                                <td>'.$item['GhiChu'].'</td>
                                <td>
                                    <form method="post">
                                        <!-- <input class="btn-update xl" name="update" id="update" value="Xử lý"></input>
                                        <input type="submit" class="btn-xoa xl" name="xoa" id="xoa" value="Xóa"></input> -->
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
                            $STT++;
                        }
                        ?>
                        
                    </table>
                </form>
                </div>
            </div>

    </section>
    <script src="./js/a.js"></script>
</body>

</html>
