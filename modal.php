<?php session_start(); ?>

<?php
// include('../include/connect.php');
require_once('./include/connect.php');

if (isset($_POST['btn-buy'])) {
    $MaKhachHang = '';
    $TenKhachHang = $_POST['TenKhachHang'];
    $DiaChi = $_POST['DiaChi'];
    $SDT = $_POST['SDT'];
    $Email = $_POST['Email'];
    $GhiChu = $_POST['GhiChu'];
    $MaXe = $_GET['MaXe'];
    $TenXe = $_POST['TenXe'];
    $NgayDK = date("Y-m-d");
    $TrangThai = 0;
    // Kiểm tra MaKhachHang
    $KT = 'SELECT MaKhachHang FROM khachhang';
    $categoryList = executeResult($KT);
    foreach ($categoryList as $item) {
        $MaKhachHang = $item['MaKhachHang'];
        $TachChuoi = explode('KH', $MaKhachHang);
        $chuoiso = $TachChuoi[1];
        for ($Count = 1; $Count <= $chuoiso;) {
            if ($Count = $chuoiso) {
                $Count++;
                $MaKhachHang = 'KH' . $Count;
            }
        }
    }
    if ($MaKhachHang == '') {
        $MaKhachHang = 'KH1';
    }

    $SQL_ADD_khachhang = 'INSERT INTO khachhang VALUES ("' . $MaKhachHang . '", "' . $TenKhachHang . '", "' . $DiaChi . '", "' . $SDT . '", "' . $Email . '")';
    execute($SQL_ADD_khachhang);
    $SQL_ADD_donhang = 'INSERT INTO donhang VALUES (NULL, "' . $TenXe . '", "' . $NgayDK . '", "' . $GhiChu . '", "' . $MaXe . '", "' . $MaKhachHang . '", "'.$TrangThai.'")';
    execute($SQL_ADD_donhang);
    echo '<script>alert("Đăng ký thành công.\nCảm ơn bạn đã sử dụng dịch vụ của chúng tôi.\nNhân viên tư vấn sẽ liên hệ với bạn trong thời gian sớm nhất.")</script>';
    header('Location:sendemail.php?MaKhachHang='.$MaKhachHang.'');
    die();
    
    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký</title>
    <style>
        @import url("https://rsms.me/inter/inter.css");

        :root {
            --color-light: white;
            --color-dark: #212121;
            --color-signal: #fab700;
            --color-background: var(--color-light);
            --color-text: var(--color-dark);
            --color-accent: var(--color-signal);
            --size-bezel: .5rem;
            --size-radius: 4px;
            line-height: 1.4;
            font-family: "Inter", sans-serif;
            font-size: calc(.6rem + .4vw);
            color: var(--color-text);
            background: var(--color-background);
            font-weight: 300;
            padding: 0 calc(var(--size-bezel) * 3);
        }

        * {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            box-sizing: border-box;
        }

        #btn-open {
            padding: 10px;
            cursor: pointer;
            justify-content: center;
            margin-left: 50%;
            margin-top: 20%;
            align-items: center;
        }

        #modal-container {
            padding-top: 30px;
            height: 100vh;
            background: rgba(0, 0, 0, 0.5);
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            /* opacity: 0;
            pointer-events: none; */

        }

        /* #modal-container.show {
            opacity: 1;
            pointer-events: all;
        } */

        .modal {
            background: #fff;
            max-width: 550px;
            position: relative;
            left: 50%;
            transform: translateX(-50%);
            border-radius: var(--size-radius);
            border: 3px solid var(--color-shadow, currentColor);
            box-shadow: 0.5rem 0.5rem 0 var(--color-shadow, currentColor);
        }

        /* header */
        .modal-header {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 15px 0 10px 0;
            background: rgb(193, 41, 41);
            border-bottom: 3px solid;
            /* color: #fab700; */
        }


        /* body */
        .modal-body {
            display: flex;
            padding: 30px 20px 20px 40px;
        }

        .modal-body .col-left {
            width: 30%;

        }

        .modal-body .col-right {
            width: 70%;

        }

        .modal-body .col-right input {
            width: 90%;
        }

        .hoten,
        .sdt,
        .email {
            height: 40px;
        }

        p input {
            height: 30px;
        }

        p input,
        textarea {
            margin-bottom: 10px;
            border: 2px solid;
            border-radius: 3px;
        }

        .address {
            height: 70px;
        }

        .note {
            height: 100px;
        }

        /* footer */
        .modal-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 15% 0 15%;
            /* border-top: 2px solid; */
        }
    </style>

    <style>
        /* button */
        button {
            margin: 20px;
        }

        .custom-btn {
            width: 130px;
            height: 40px;
            color: #fff;
            border-radius: 5px;
            padding: 10px 25px;
            font-family: 'Lato', sans-serif;
            font-weight: 500;
            background: transparent;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            display: inline-block;
            box-shadow: inset 2px 2px 2px 0px rgba(255, 255, 255, .5),
                7px 7px 20px 0px rgba(0, 0, 0, .1),
                4px 4px 5px 0px rgba(0, 0, 0, .1);
            outline: none;
        }

        /* button mua */

        .btn-7 {
            line-height: 42px;
            padding: 0;
            border: none;
            font-weight: bold;
        }

        .btn-7.huy {
            background: rgb(204, 0, 0);
        }

        .btn-7.xn {
            background: rgb(19, 133, 92);
        }

        .btn-7 span {
            position: relative;
            display: block;
            width: 100%;
            height: 100%;
        }

        .btn-7:before,
        .btn-7:after {
            position: absolute;
            content: "";
            right: 0;
            bottom: 0;
            box-shadow:
                -7px -7px 20px 0px rgba(255, 255, 255, .9),
                -4px -4px 5px 0px rgba(255, 255, 255, .9),
                7px 7px 20px 0px rgba(0, 0, 0, .2),
                4px 4px 5px 0px rgba(0, 0, 0, .3);
            transition: all 0.3s ease;
        }

        .btn-7.xn:before,
        .btn-7.xn:after {
            background: rgb(19, 133, 92);
        }

        .btn-7.huy:before,
        .btn-7.huy:after {
            background: rgb(204, 0, 0);
        }

        .btn-7:before {
            height: 0%;
            width: 2px;
        }

        .btn-7:after {
            width: 0%;
            height: 2px;
        }

        .btn-7.xn:hover {
            color: rgb(19, 133, 92);
            background: transparent;
        }

        .btn-7.huy:hover {
            color: rgb(204, 0, 0);
            background: transparent;
        }

        .btn-7:hover:before {
            height: 100%;
        }

        .btn-7:hover:after {
            width: 100%;
        }

        .btn-7 span:before,
        .btn-7 span:after {
            position: absolute;
            content: "";
            left: 0;
            top: 0;

            box-shadow:
                -7px -7px 20px 0px rgba(255, 255, 255, .9),
                -4px -4px 5px 0px rgba(255, 255, 255, .9),
                7px 7px 20px 0px rgba(0, 0, 0, .2),
                4px 4px 5px 0px rgba(0, 0, 0, .3);
            transition: all 0.3s ease;
        }

        .btn-7.xn span:before,
        .btn-7.xn span:after {
            background: rgb(19, 133, 92);
        }

        .btn-7.huy span:before,
        .btn-7.huy span:after {
            background: rgb(204, 0, 0);
        }

        .btn-7 span:before {
            width: 2px;
            height: 0%;
        }

        .btn-7 span:after {
            height: 2px;
            width: 0%;
        }

        .btn-7 span:hover:before {
            height: 100%;
        }

        .btn-7 span:hover:after {
            width: 100%;
        }
    </style>

</head>

<body>
    <form method="post">

        <div class="wrapper">

            <button id="btn-open">click</button>
            <div id="modal-container">
                <div class="modal">
                    <div class="modal-header">
                        <h1>ĐĂNG KÝ MUA XE</h1>
                    </div>
                    <div class="modal-body">
                        <div class="col-left">
                            <h4 class="hoten" >Họ Tên:</h4>
                            <h4 class="address" >Địa chỉ:</h4>
                            <h4 class="sdt" >Số điện thoại:</h4>
                            <h4 class="email" >Email:</h4>
                            <h4 class="note" >Ghi chú:</h4>
                        </div>
                        <div class="col-right">
                            <?php
                            $MaXe = $_GET['MaXe'];
                            $SQL = 'SELECT TenXe FROM xe WHERE MaXe = "'.$MaXe.'"';
                            $categoryList = executeResult($SQL);
                            foreach ($categoryList as $item) {
                                echo '<input type="hidden" name="TenXe" value="' . $item['TenXe'] . '">'; 
                            }
                            ?>
                            <p><input type="text" name="TenKhachHang"></p>
                            <p class="address"><textarea name="DiaChi" id="" cols="43" rows="3"></textarea></p>
                            <p><input type="text" name="SDT"></p>
                            <p><input type="text" name="Email"></p>
                            <p class="note"><textarea name="GhiChu" id="" cols="43" rows="7"></textarea></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="frame">   
                                                 
                                <button  id="btn-buy" name="btn-buy" class="custom-btn btn-7 xn"><span>Xác nhận</span></button>       
                                <!-- onclick="alert('Đăng ký thành công.\nCảm ơn bạn đã sử dụng dịch vụ của chúng tôi.\nNhân viên tư vấn sẽ liên hệ với bạn trong thời gian sớm nhất.');window.history.go(-2); return false;"            -->
                        </div>
                        <div class="frame">
                                <button onclick="window.history.go(-1); return false;" id="btn-close" name="btn-close" class="custom-btn btn-7 huy"><span>Hủy</span></button>                       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script>
        //const btn_open = document.getElementById('btn-open');
        //const btn_buy = document.getElementById('btn-buy');
        const btn_close = document.getElementById('btn-close');
        const modal_container = document.getElementById('modal-container');
        // btn_open.addEventListener('click', () => {
        //     modal_container.classList.add('show');
        // });
        btn_close.addEventListener('click', () => {
            modal_container.classList.remove('show');
        });
        // btn_buy.addEventListener('click', () => {
        //     alert('Đăng ký thành công.\nCảm ơn bạn đã sử dụng dịch vụ của chúng tôi.\nNhân viên tư vấn sẽ liên hệ với bạn trong thời gian sớm nhất.');
        //     modal_container.classList.remove('show');
        // });
    </script>

</body>

</html>