<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host, $dbid, $dbpass, $dbname);

if (array_key_exists("bucket_id", $_GET)) {
    $bucket_id = $_GET["bucket_id"];
    $query = "select * from bucketlist natural join tourspot where bucket_id = $bucket_id";
    $res = mysqli_query($conn, $query);
    $bucketlist = mysqli_fetch_assoc($res);
    if (!$bucketlist) {
        msg("bucketlist가 존재하지 않습니다.");
    }
}
?>
    <div class="container fullwidth">

        <h3>bucketlist 정보 자세히 보기</h3>
	

        <p>
            <label for="bucket_id">bucket 코드</label>
            <input readonly type="text" id="bucket_id" name="bucket_id" value="<?= $bucketlist['bucket_id'] ?>"/>
        </p>

        <p>
            <label for="bucket_name">bucketlist 이름</label>
            <input readonly type="text" id="bucket_name" name="bucket_name" value="<?= $bucketlist['bucket_name'] ?>"/>
        </p>
	
        <p>
            <label for="spot_name">관광지 이름</label>
            <input readonly type="text" id="spot_name" name="spot_name" value="<?= $bucketlist['spot_name'] ?>"/>
        </p>
	
		<p>
            <label for="content">Content</label>
            <input readonly type="text" id="content" name="content" value="<?= $bucketlist['content'] ?>"/>
        </p>
	
        <p>
            <label for="recommand">추천이유</label>
            <textarea readonly id="recommand" name="recommand" rows="10"><?= $bucketlist['recommand'] ?></textarea>
        </p>
	
        <p>
            <label for="spot_type">여행지 유형</label>
            <input readonly type="text" id="spot_type" name="spot_type" value="<?= $bucketlist['spot_type'] ?>"/>
        </p>
    </div>
    
<? include("footer.php") ?>