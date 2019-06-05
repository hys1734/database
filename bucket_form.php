<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host, $dbid, $dbpass, $dbname);
$mode = "입력";
$action = "bucket_insert.php";

if (array_key_exists("bucket_id", $_GET)) {
    $bucket_id = $_GET["bucket_id"];
    $query =  "select * from bucketlist natural join tourspot where bucket_id = $bucket_id";
    $res = mysqli_query($conn, $query);
    $bucket = mysqli_fetch_array($res);
    if(!$bucket) {
        msg("여행지 존재 X");
    }
    $mode = "수정";
    $action = "bucket_modify.php";
}

$tourspot = array();

$query = "select * from tourspot";
$res = mysqli_query($conn, $query);
while($row = mysqli_fetch_array($res)) {
    $tourspot[$row['spot_id']] = $row['spot_name'];
}

?>
    <div class="container">
        <form name="bucket_form" action="<?=$action?>" method="post" class="fullwidth">
            <input type="hidden" name="bucket_id" value="<?=$bucket['bucket_id']?>"/>
            <h3>bucketlist <?=$mode?></h3>
          
            <p>
                <label for="bucket_name">bucketlist 명</label>
                <input type="text" placeholder="bucketlist명 입력" id="bucket_name" name="bucket_name" value="<?=$bucket['bucket_name']?>"/>
            </p>
            <p>
                <label for="spot_id">여행지 이름</label>
                <select name="spot_id" id="spot_id">
                    <option value="-1">선택해 주십시오.</option>
                    <?
                        foreach($tourspot as $id => $name) {
                            if($id == $bucket['spot_id']){
                                echo "<option value='{$id}' selected>{$name}</option>";
                            } else {
                                echo "<option value='{$id}'>{$name}</option>";
                            }
                        }
                    ?>
                    </select>
            </p>
            <p>
                <label for="content">content</label>
                <input type="text" placeholder="content 입력" id="content" name="content" value="<?=$bucket['content']?>" />
            </p>
            <p>
                <label for="recommand">추천이유</label>
                <textarea placeholder="추천이유 입력" id="recommand" name="recommand" rows="10"><?=$bucket['recommand']?></textarea>
            </p>

            <p align="center"><button class="button primary large" onclick="javascript:return validate();"><?=$mode?></button></p>

            <script>
                function validate() {
                    if(document.getElementById("bucket_name").value == "-1") {
                        alert ("bucketlist를 입력해주세요"); return false;
                    }
                    else if(document.getElementById("spot_name").value == "") {
                        alert ("여행지를 입력해 주십시오"); return false;
                    }
                    else if(document.getElementById("content").value == "") {
                        alert ("contents을 입력해 주십시오"); return false;
                    }
                    else if(document.getElementById("recommand").value == "") {
                        alert ("추천이유를 입력해주세요"); return false;
                    }
                    return true;
                }
            </script>

        </form>
    </div>
<? include("footer.php") ?>