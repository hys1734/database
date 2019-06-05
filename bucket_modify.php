<?php
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host,$dbid,$dbpass,$dbname);

$spot_id = $_POST['spot_id'];
$bucket_id = $_POST['bucket_id'];
$content = $_POST['content'];
$bucket_name = $_POST['bucket_name'];
$recommand = $_POST['recommand'];

$ret = mysqli_query($conn, "update bucketlist set bucket_name = '$bucket_name', content = '$content', recommand = '$recommand', spot_id = $spot_id where bucket_id = $bucket_id");

if(!$ret)
{
    msg('Query Error : '.mysqli_error($conn));
}
else
{
    s_msg ('성공적으로 수정 되었습니다');
    echo "<meta http-equiv='refresh' content='0;url=Bucket.php'>";
}

?>

