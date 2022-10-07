<?php
include "./PHPMailer/src/PHPMailer.php";
include "./PHPMailer/src/Exception.php";
include "./PHPMailer/src/OAuth.php";
include "./PHPMailer/src/POP3.php";
include "./PHPMailer/src/SMTP.php";
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$mail = new PHPMailer(true);
// print_r($mail);

try {
  //Server settings
  $mail->SMTPDebug = 0;                                 // Enable verbose debug output
  $mail->isSMTP();                                      // Set mailer to use SMTP
  $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
  $mail->SMTPAuth = true;                               // Enable SMTP authentication
  $mail->Username = 'thanhtuan2k1ptt@gmail.com';                 // SMTP username
  $mail->Password = 'tnrwcadlsjjcuyco';                           // SMTP password
  $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
  $mail->Port = 587;                                    // TCP port to connect to

  //Recipients
  $mail->setFrom('thanhtuan2k1ptt@gmail.com', 'Xe may Hoang Viet');
   
  require_once('./include/connect.php');
  $MaKhachHang = $_GET['MaKhachHang'];
  $SQL = 'SELECT  xe.TenXe, TenKhachHang, NgayDK, SDT, Email, xe.Gia
                                     FROM donhang
                                     INNER JOIN khachhang
                                     ON donhang.MaKhachHang = khachhang.MaKhachHang
                                     INNER JOIN xe 
                                     ON donhang.MaXe = xe.MaXe
                                     WHERE khachhang.MaKhachHang = "'.$MaKhachHang.'"';
                            $categoryList = executeResult($SQL);
                            foreach ($categoryList as $item) {
                              $Email = $item['Email'];
                              // $MaKhachHang = $item['MaKhachHang'];
                              $TenKhachHang = $item['TenKhachHang'];
                              $TenXe = $item['TenXe'];
                              $Ngaydk = $item['NgayDK'];
                                    $date= date_create("$Ngaydk");
                                    $NgayDK = date_format($date,"d/m/Y");
                                    $Gia =  number_format($item['Gia'], 0, ",", ".");
                            }
  $mail->addAddress($Email, $TenKhachHang);     // Add a recipient
  // $mail->addAddress('ellen@example.com');               // Name is optional
  // $mail->addReplyTo('info@example.com', 'Information');
  // $mail->addCC('cc@example.com');
  // $mail->addBCC('bcc@example.com');

  //Attachments
  // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
  // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

  //Content 
  $mail->isHTML(true);                                  // Set email format to HTML
  $mail->Subject = 'Xac nhan dang ky mua xe';
  $mail->Body    = '<span style="font-size: 16px;">
                    Kính chào quý khách <span style="font-weight:bold">'.$TenKhachHang.'!</span><br><br>
  
                    Ngày <span style="font-weight:bold">'.$NgayDK.'</span>. Quý khách đã đăng ký mua xe 
                    <span style="font-weight:bold">'.$TenXe.'</span> với giá 
                    <span style="font-weight:bold">'.$Gia.' VNĐ</span>. Nhân viên tư vấn sẽ  liên lạc với quý 
                    khách trong thời gian sớm nhất.<br>
                    Trân trọng cảm ơn và rất hân hạnh được phục vụ quý khách.<br>
                    </span>
  ';
  // $mail->AltBody = 'Đây là nội dung khi gửi plain text không sử dụng định dạng html';

  $mail->send();
  // echo 'gửi mail thành công';
  header('Location: index.php');
} catch (Exception $e) {
  echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
