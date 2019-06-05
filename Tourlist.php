<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수
?>
<div class="container">
    <?
    $conn = dbconnect($host, $dbid, $dbpass, $dbname);
    $query = "select * from city natural join tourspot";
    if (array_key_exists("search_keyword", $_POST)) {  // array_key_exists() : Checks if the specified key exists in the array
        $search_keyword = $_POST["search_keyword"];
        $query =  $query . " where city_name like '%$search_keyword%' or spot_name like '%$search_keyword%'";
    
    }
    $res = mysqli_query($conn, $query);
    if (!$res) {
         die('Query Error : ' . mysqli_error());
    }
    ?>

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>No.</th>
            <th>도시이름</th>
            <th>관광지이름</th>
            <th>관광지유형</th>
            <th>유네스코 등록갯수</th>
            <th>기능</th>
        </tr>
        </thead>
        <tbody>
        <?
        $row_index = 1;
        while ($row = mysqli_fetch_array($res)) {
            echo "<tr>";
            echo "<td>{$row_index}</td>";
            echo "<td>{$row['city_name']}</td>";
            echo "<td><a href='Travel_view.php?spot_id={$row['spot_id']}'>{$row['spot_name']}</a></td>";
            echo "<td>{$row['spot_type']}</td>";
            echo "<td>{$row['unesco']}</td>";
            echo "<td width='17%'>
                <a href='Travel_form.php?spot_id={$row['spot_id']}'><button class='button primary small'>수정</button></a>
                 <button onclick='javascript:deleteConfirm({$row['spot_id']})' class='button danger small'>삭제</button>
                </td>";
            echo "</tr>";
            $row_index++;
        }
        ?>
        </tbody>
    </table>
    <script>
        function deleteConfirm(spot_id) {
            if (confirm("정말 삭제하시겠습니까?") == true){    //확인
                window.location = "Travel_delete.php?spot_id=" + spot_id;
            }else{   //취소
                return;
            }
        }
    </script>
</div>
<? include("footer.php") ?>
