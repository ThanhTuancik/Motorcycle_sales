<?php session_start(); ?>

<?php
// include('../include/connect.php');
require_once('../include/connect.php');
if ($_SESSION['USER'] == '') {
    header('Location: login.php');
}
if (isset($_POST['btn-update'])) {
    $TenHang = $_POST['TenHang'];
    header('Location: update_hang.php?TenHang=' . $TenHang . '');
}
if (isset($_POST['btn-delete'])) {
    $TenHang = $_POST['TenHang'];

    $SQL = 'DELETE FROM hang WHERE TenHang = "' . $TenHang . '"';
    execute($SQL);
    header("Location: hang.php");
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
    
    <section class="layout-content">
        <div class="content">
            <div class="header">
                <i class='bx bx-menu'></i>
                <div class="title-content">HÃNG XE</div>
            </div>
            <div class="menu-content">
                <a class="parent" href="admin.php">HOME</a>
                <span class="img">></span>
                <span>QUẢN LÝ HÃNG XE</span>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="img">
                    <i class='bx bxs-receipt'></i>
                    </div>
                    <div class="dulieu">
                        <span>Dữ liệu hãng</span>
                    </div>
                    <div class="btn-add"><a href="themhang.php">Thêm mới</a></div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table>
                            <tr class="title">
                                <td>Tên Hãng</td>
                                <td>Logo</td>
                                <td>Chức năng</td>
                            </tr>

                            <?php
                            $SQL = 'SELECT * FROM hang';
                            $categoryList = executeResult($SQL);
                            foreach ($categoryList as $item) {
                                $TenHang = $item['TenHang'];
                                echo '<tr>
                                    <td>' . $item['TenHang'] . '</td>
                                    <td><img src="' . $item['Logo'] . '" height="100" width-max="100" alt="Không tải được ảnh"></td>
                                    <td>
                                        <form method="post">
                                            <input value="' . $item['TenHang'] . '" type="hidden" name="TenHang" id="TenHang">
                                            <div class="frame">
                                        <button id="btn-update" name="btn-update" class="custom-btn btn-7 xn">
                                        <span>
                                        
                                           Cập nhật
                                        
                                        </span>
                                        </button>
                                        
                                        </div>
                                            <div class="frame">
                                        <button id="btn-delete" name="btn-delete" class="custom-btn btn-7 huy"><span>xóa</span></button>
                                        </div>
                                        </form>
                                    </td>
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