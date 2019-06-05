<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host, $dbid, $dbpass, $dbname);

if (array_key_exists("spot_id", $_GET)) {
    $spot_id = $_GET["spot_id"];
    $query = "select * from city natural join tourspot natural join info where spot_id = $spot_id";
    $res = mysqli_query($conn, $query);
    $tourspot = mysqli_fetch_assoc($res);
    if (!$tourspot) {
        msg("여행지가 존재하지 않습니다.");
    }
}
?>
    <div class="container fullwidth">

        <h3>관광지 정보 자세히 보기</h3>
	

        <p>
            <label for="spot_id">관광지 코드</label>
            <input readonly type="text" id="spot_id" name="spot_id" value="<?= $tourspot['spot_id'] ?>"/>
        </p>
        <p>
            <label for="spot_name">관광지 이름</label>
            <input readonly type="text" id="spot_name" name="spot_name" value="<?= $tourspot['spot_name'] ?>"/>
        </p>
        <p>
            <label for="city_name">도시 이름</label>
            <input readonly type="text" id="city_name" name="city_name" value="<?= $tourspot['city_name'] ?>"/>
        </p>
		<p>
            <label for="country_name">나라 이름</label>
            <input readonly type="text" id="country_name" name="country_name" value="<?= $tourspot['country_name'] ?>"/>
        </p>
        <p>
            <label for="unesco">유네스코 갯수</label>
            <input readonly type="text" id="unesco" name="unesco" value="<?= $tourspot['unesco'] ?>"/>
        </p>
        <p>
            <label for="spot_type">여행지 유형</label>
            <input readonly type="text" id="spot_type" name="spot_type" value="<?= $tourspot['spot_type'] ?>"/>
        </p>
         <p>
            <label for="time_difference">시차</label>
            <input readonly type="text" id="time_difference" name="time_difference" value="<?= $tourspot['time_difference'] ?>"/>
        </p>
         <p>
            <label for="religion">종교</label>
            <input readonly type="text" id="religion" name="religion" value="<?= $tourspot['religion'] ?>"/>
        </p>
         <p>
            <label for="food">음식 유형</label>
            <input readonly type="text" id="food" name="food" value="<?= $tourspot['food'] ?>"/>
        </p>
    </div>
    
<? include("footer.php") ?>