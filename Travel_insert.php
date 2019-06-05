<?php
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host,$dbid,$dbpass,$dbname);

$spot_id = $_POST['spot_id'];
$city_id = $_POST['city_id'];
$unesco = $_POST['unesco'];
$spot_name = $_POST['spot_name'];
$spot_type = $_POST['spot_type'];


$ret = mysqli_query($conn, "insert into tourspot (city_id, unesco, spot_name, spot_type) values('$city_id', '$unesco', '$spot_name', '$spot_type')");
if(!$ret)
{
	echo mysqli_error($conn);
    msg('Query Error : '.mysqli_error($conn));
}
else
{
    s_msg ('성공적으로 입력 되었습니다');
    echo "<meta http-equiv='refresh' content='0;url=Tourlist.php'>";
}

?>

