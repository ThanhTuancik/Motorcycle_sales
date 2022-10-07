<?php
// include('config.php');
//Kết nối 
// $CON = mysqli_connect($SERVER, $USER, $PASS, $DB);
//Kiểm tra kết nối
// if (!$CON) {
//     die('Kết nối thất bại!, vui lòng kiểm tra kết nối.');
// }


// ---------------------------------------------------------------
?>
<?php
header("Content-type: text/html; charset=utf-8");
require_once ('config.php');
// Kết nối sql và lưu data vào table
// insert,delete,update
function execute($SQL)
{
    $CON = mysqli_connect(SERVER, USER, PASS, DB);
    mysqli_set_charset($CON, 'UTF8');
    mysqli_query($CON, $SQL);
    mysqli_close($CON);
}

// Để hiện thị khi select
function executeResult($SQL)
{
$CON = mysqli_connect(SERVER, USER, PASS, DB);
    mysqli_set_charset($CON, 'UTF8');
    $RESULT = mysqli_query($CON, $SQL);
    $DATA = [];

    while ($ROW = mysqli_fetch_array($RESULT, 1)) {

        $DATA[] = $ROW;
    }

    mysqli_close($CON);
    return $DATA;
}
