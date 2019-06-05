<?php
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host,$dbid,$dbpass,$dbname);

$spot_id = $_POST['spot_id'];
$bucket_id = $_POST['bucket_id'];
$content = $_POST['content'];
$bucket_name = $_POST['bucket_name'];
$recommand = $_POST['recommand'];

/* bucket_name = '$bucket_name', content = '$content', recommand = '$recommand', spot_id = $spot_id*/
$ret = mysqli_query($conn, "insert into bucketlist (spot_id, content, bucket_name, recommand, added_date) values('$spot_id', '$content', '$bucket_name', '$recommand', now())");
if(!$ret)
{
	echo mysqli_error($conn);
    msg('Query Error : '.mysqli_error($conn));
}
else
{
    s_msg ('성공적으로 입력 되었습니다');
    echo "<meta http-equiv='refresh' content='0;url=Bucket.php'>";
}

?>

