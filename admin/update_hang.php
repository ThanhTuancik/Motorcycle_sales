<?php session_start(); ?>

<?php
// include('../include/connect.php');
require_once('../include/connect.php');

if ($_SESSION['USER'] == '') {
    header('Location: login.php');
}

if (!empty($_POST)) {
    //$Logo = '';

//     if (isset($_POST['Logo'])) {
//         $TenHang = $_POST['TenHang'];
//         $Logo = $_POST['Logo'];
//     }

//     if (!empty($Logo)) {

        // $SQL = 'UPDATE hang SET  Logo = "' . $Logo . '" WHERE TenHang = "' . $TenHang . '"';
        // execute($SQL);
        // header('Location: hang.php');
        // die();
        
// }
if(isset($_POST['update'])){
    $target_dir = '../image/Hang/Logo/';
        $target_file = $_FILES['Logo']['name'];
        $allowtypes    = array('jpg', 'png', 'jpeg');

        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

        $check = getimagesize($_FILES["Logo"]["tmp_name"]);
        if($check !== false)
        {
            $allowUpload = true; 
        }
        else
        {
            $allowUpload = false;
        }
        if (!in_array($imageFileType,$allowtypes ))
        {
            $allowUpload = false;
        }
        if ($allowUpload){
        move_uploaded_file($_FILES['Logo']['tmp_name'],$target_dir.$target_file);	
        $TenHang = $_POST['TenHang'];
    
        
        $SQL = 'UPDATE hang SET  Logo = "' . $target_dir.$target_file . '" WHERE TenHang = "' . $TenHang . '"';
        execute($SQL);
        $kq = execute($SQL);
        if($kq){
            echo '<script>alert("Cập nhật thành công")</script>';
            header('Location: hang.php');
        }else{
        echo '<script>alert("Cập nhật thất bại")</script>'.mysqli_error($CON);
        }  
        
        die();
    }
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Cập Nhật Hãng</title>
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
    <section class="layout-content">
        <div class="content">
            <div class="header">
                <i class='bx bx-menu'></i>
                <div class="title-content">CẬP NHẬT HÃNG</div>
            </div>
            <a class="parent" href="admin.php">HOME</a>
            <span class="img">></span>
            <span>CẬP NHẬT HÃNG</span>
        </div>
        <div class="card">
            <div class="card-header">
                <div class="img">
                    <i class='bx bxs-receipt'></i>
                </div>
                <div class="dulieu">
                    <span>Thông tin hãng</span>
                </div>
            </div>
            <div class="card-body">
                <?php
                $TenHang = $_GET['TenHang'];
                // lấy dữ liệu hãng ra
                $SQL = "SELECT * FROM hang WHERE TenHang = '$TenHang'";
                $categoryList = executeResult($SQL);
                foreach ($categoryList as $item) {
                    echo '
                        <form class="row g-3" method="post" enctype="multipart/form-data">
                            <div class="col-md-3">
                                <label class="form-label">Tên hãng</label>
                                <input value="' . $item['TenHang'] . '" class="form-control" id="TenHang" name="TenHang" type="hidden"/>
                                <input value="' . $item['TenHang'] . '" type="text"/ disabled class="form-control" name="TenHang" id="TenHang">
                            </div>
                            <div class="col-md-9">
                                <label for="formFile" class="form-label">Hình ảnh</label>
                                <input class="form-control" type="file" id="Logo" name="Logo" value="' . $item['Logo'] . '">
                            </div>
                            
                            <input type="submit" class="btn btn-primary btn-lg" name="update" id="update" value="Cập Nhật"></input>
                        </form>
                        ';
                }
                ?>
                <!-- value="' . $item['Logo'] . '" -->
            </div>
        </div>
    </section>
    <script src="./js/a.js"></script>

</body>

</html>