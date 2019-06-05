<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host, $dbid, $dbpass, $dbname);
$mode = "입력";
$action = "souvenir_insert.php";

if (array_key_exists("souvenir_id", $_GET)) {
    $souvenir_id = $_GET["souvenir_id"];
    $query =  "select * from souvenir where souvenir_id = $souvenir_id";
    $res = mysqli_query($conn, $query);
    $souvenir = mysqli_fetch_array($res);
    if(!$souvenir) {
        msg("기념품 존재 X");
    }
    $mode = "수정";
    $action = "souvenir_modify.php";
}

$city = array();

$query = "select * from city";
$res = mysqli_query($conn, $query);
while($row = mysqli_fetch_array($res)) {
    $city[$row['city_id']] = $row['city_name'];
}

?>
    <div class="container">
        <form name="souvenir_form" action="<?=$action?>" method="post" class="fullwidth">
            <input type="hidden" name="souvenir_id" value="<?=$souvenir['souvenir_id']?>"/>
            <h3>기념품 <?=$mode?></h3>
            <p>
                <label for="city_id">CITY</label>
                <select name="city_id" id="city_id">
                    <option value="-1">선택해 주십시오.</option>
                    <?
                        foreach($city as $id => $name) {
                            if($id == $souvenir['city_id']){
                                echo "<option value='{$id}' selected>{$name}</option>";
                            } else {
                                echo "<option value='{$id}'>{$name}</option>";
                            }
                        }
                    ?>
                     <!--<option value='1'>JEJU</option><option value='2'>LA</option><option value='3'>LONDON</option>
                    <option value='4'>PARIS</option><option value='5'>ROMA</option><option value='6'>KYOTO</option>
                    <option value='7'>E.T.C</option>-->
                    </select>
            </p>
            <p>
                <label for="souvenir_name">기념품 이름</label>
                <input type="text" placeholder="여행지명 입력" id="souvenir_name" name="souvenir_name" value="<?=$souvenir['souvenir_name']?>"/>
            </p>
            <p>
                <label for="souvenir_type">기념품 Type</label>
                <input type="text" placeholder="Type 입력" id="souvenir_type" name="souvenir_type" value="<?=$souvenir['souvenir_type']?>"/>
            </p>
           
            <p align="center"><button class="button primary large" onclick="javascript:return validate();"><?=$mode?></button></p>

            <script>
                function validate() {
                    if(document.getElementById("city_id").value == "-1") {
                        alert ("도시를 선택해 주십시오"); return false;
                    }
                    else if(document.getElementById("souvenir_name").value == "") {
                        alert ("기념품을 입력해 주십시오"); return false;
                    }
                    else if(document.getElementById("souvenir_type").value == "") {
                        alert ("기념품 타입을 입력해 주십시오"); return false;
                    }
                    return true;
                }
            </script>

        </form>
    </div>
<? include("footer.php") ?>