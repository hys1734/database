<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host, $dbid, $dbpass, $dbname);
$mode = "입력";
$action = "Travel_insert.php";

if (array_key_exists("spot_id", $_GET)) {
    $spot_id = $_GET["spot_id"];
    $query =  "select * from tourspot where spot_id = $spot_id";
    $res = mysqli_query($conn, $query);
    $spot = mysqli_fetch_array($res);
    if(!$spot) {
        msg("여행지 존재 X");
    }
    $mode = "수정";
    $action = "Travel_modify.php";
}

$city = array();

$query = "select * from city";
$res = mysqli_query($conn, $query);
while($row = mysqli_fetch_array($res)) {
    $city[$row['city_id']] = $row['city_name'];
}
?>
    <div class="container">
        <form name="Travel_form" action="<?=$action?>" method="post" class="fullwidth">
            <input type="hidden" name="spot_id" value="<?=$spot['spot_id']?>"/>
            <h3>여행지 <?=$mode?></h3>
            <p>
                <label for="city_id">CITY</label>
                <select name="city_id" id="city_id">
                    <option value="-1">선택해 주십시오.</option>
                    <?
                        foreach($city as $id => $name) {
                            if($id == $spot['city_id']){
                                echo "<option value='{$id}' selected>{$name}</option>";
                            } else {
                                echo "<option value='{$id}'>{$name}</option>";
                            }
                        }
                    ?>
                    </select>
            </p>
            <p>
                <label for="spot_name">여행지명</label>
                <input type="text" placeholder="여행지명 입력" id="spot_name" name="spot_name" value="<?=$spot['spot_name']?>"/>
            </p>
            <p>
                <label for="spot_type">여행지 Type</label>
                <input type="text" placeholder="Type 입력" id="spot_type" name="spot_type" value="<?=$spot['spot_type']?>"/>
            </p>
            <p>
                <label for="unesco">UNESCO 문화유산 갯수</label>
                <input type="number" placeholder="정수로 입력" id="unesco" name="unesco" value="<?=$spot['unesco']?>" />
            </p>

            <p align="center"><button class="button primary large" onclick="javascript:return validate();"><?=$mode?></button></p>

            <script>
                function validate() {
                    if(document.getElementById("city_id").value == "-1") {
                        alert ("도시를 선택해 주십시오"); return false;
                    }
                    else if(document.getElementById("spot_name").value == "") {
                        alert ("여행지를 입력해 주십시오"); return false;
                    }
                    else if(document.getElementById("spot_type").value == "") {
                        alert ("여행지 타입을 입력해 주십시오"); return false;
                    }
                    else if(document.getElementById("unesco").value == "") {
                        alert ("유네스코 유산여부를 입력해 주십시오(0개도 입력요망)"); return false;
                    }
                    return true;
                }
            </script>

        </form>
    </div>
<? include("footer.php") ?>