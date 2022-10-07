<?php session_start(); ?>

<?php
// include('../include/connect.php');
require_once('../include/connect.php');
if ($_SESSION['USER'] == '') {
    header('Location: login.php');
}
if (isset($_POST['btn-delete'])) {
    $Id = $_POST['Id'];

    $SQL = 'DELETE FROM giaodien WHERE Id = "' . $Id . '"';
    execute($SQL);
    header("Location: giaodien.php");
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
                <div class="title-content">GIAO DIỆN</div>
            </div>
            <div class="menu-content">
                <a class="parent" href="admin.php">HOME</a>
                <span class="img">></span>
                <span>QUẢN LÝ GIAO DIỆN</span>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="img">
                        <i class='bx bxs-receipt'></i>
                    </div>
                    <div class="dulieu">
                        <span>Danh sách hình ảnh hiển thị</span>
                    </div>
                    <div class="btn-add"><a href="themgiaodien.php">Thêm mới</a></div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table>
                            <tr class="title">
                                <td>STT</td>
                                <td>Hình ảnh</td>
                                <td>Tác vụ</td>
                            </tr>

                            <?php
                            $SQL = 'SELECT * FROM giaodien';
                            $categoryList = executeResult($SQL);
                            $count = 1;
                            foreach ($categoryList as $item) {
                                echo '<tr>
                                    <td>' . $count . '</td>
                                    <td><img class="banner" src="' . $item['Img'] . '"  alt="Không tải được ảnh"></td>
                                    <td>
                                        <form method="post">
                                            <input value="' . $item['Id'] . '" type="hidden" name="Id" id="Id">
                                            
                                            <a href="update_hang.php?TenHang=' . $item['Id'] . '">
                     
                                            <div class="frame">
                                        <button id="btn-delete" name="btn-delete" class="custom-btn btn-7 huy"><span>xóa</span></button>
                                        </div>
                                        </form>
                                    </td>
                                </tr>';
                                $count++;
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