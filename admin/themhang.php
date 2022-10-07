<?php session_start(); ?>

<?php
if ($_SESSION['USER'] == '') {
    header('Location: login.php');
}
?>

<?php

// include('../include/connect.php');
require_once('../include/connect.php');

if (!empty($_POST)) {
    if(isset($_POST['them'])){
        $target_dir = '../image/Hang/Logo/';
        $target_file = $_FILES['txtHinh']['name'];
        $allowtypes    = array('jpg', 'png', 'jpeg');

        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

        $check = getimagesize($_FILES["txtHinh"]["tmp_name"]);
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
        move_uploaded_file($_FILES['txtHinh']['tmp_name'],$target_dir.$target_file);	
        $txtTenHang = $_POST['txtTenHang'];
    
        
        $SQL = 'INSERT INTO hang (TenHang,Logo) 
                 VALUES ("' . $txtTenHang . '","' .$target_dir.$target_file. '")';
        execute($SQL); 
        header('Location: hang.php');
        die();
        
    } 
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
    <section class="layout-content">
        <div class="content">
            <div class="header">
                <i class='bx bx-menu'></i>
                <div class="title-content">THÊM HÃNG</div>
            </div>
            <div class="menu-content">
                <a class="parent" href="admin.php">HOME</a>
                <span class="img">></span>
                <span>THÊM HÃNG</span>
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
                    <form class="row g-3" method="post" enctype="multipart/form-data">
                        <div class="col-md-3">
                            <label class="form-label">Tên hãng</label>
                            <input type="text" class="form-control" id="txtTenHang" name="txtTenHang">
                        </div>
                        <div class="col-md-9">
                            <label for="formFile" class="form-label">Hình ảnh</label>
                            <input class="form-control" type="file" id="formFile" name="txtHinh">
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