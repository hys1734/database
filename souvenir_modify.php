<?php
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host,$dbid,$dbpass,$dbname);

$city_id = $_POST['city_id'];
$souvenir_id = $_POST['souvenir_id'];
$souvenir_type = $_POST['souvenir_type'];
$souvenir_name = $_POST['souvenir_name'];


$ret = mysqli_query($conn, "update souvenir set souvenir_name = '$souvenir_name', souvenir_type = '$souvenir_type', city_id = $city_id where souvenir_id = $souvenir_id");

if(!$ret)
{
    msg('Query Error : '.mysqli_error($conn));
}
else
{
    s_msg ('성공적으로 수정 되었습니다');
    echo "<meta http-equiv='refresh' content='0;url=Souvenir.php'>";
}

?>

