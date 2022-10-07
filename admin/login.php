<?php
session_start();
?>
<?php
require_once ('../include/connect.php');
if(!empty($_POST))
{
    $txtUtxtUsername = '';
    $txtPassword = '';
    if(isset($_POST['txtUsername']) && isset($_POST['txtPassword']))
    {   
        $txtUsername = $_POST['txtUsername'];
        $txtPassword = $_POST['txtPassword'];
    }
    
    if(!empty($txtUsername) && !empty($txtPassword))
    {
        $CON = mysqli_connect(SERVER, USER, PASS, DB);
        $SQL = 'SELECT * FROM taikhoan WHERE Username = "' . $txtUsername . '" AND Password = "'.$txtPassword.'" ';
	$query = mysqli_query($CON,$SQL);
	$num_rows = mysqli_num_rows($query);
	if ($num_rows==0) 
        {
            header('Location: login.php');
            $_SESSION['dangnhap'] = 'Có lẽ bạn đã nhập sai gì rồi !';
        }else{
            $_SESSION['USER'] = $txtUsername;
            unset($_SESSION['dangnhap']);
            header('Location: admin.php');
        die();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <div class="login-box">
        <h1>Login</h1>
        <form action="" method="post" enctype="multipart/form-data" name="form1">
            <div class="textbox">
                <i class="fa fa-user" aria-hidden="true"></i>
                <input type="text" placeholder="Username" id="txtUsername" name="txtUsername">
            </div>

            <div class="textbox">
                <i class="fa fa-lock"></i>
                <input type="password" placeholder="Password" id="txtPassword" name="txtPassword">
            </div>
            <input class="btn" type="submit" id="SignIn" name="SignIn" value="Sign In">
            <div class="loi">
                <span style="color:#F30;font-style:italic"><?php if (isset($loidn)) echo $loidn; ?>
            </div>
        </form>
    </div>

</body>

</html>