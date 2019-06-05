<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수
?>
<div class="container">
    <?
    $conn = dbconnect($host, $dbid, $dbpass, $dbname);
    $query = "select * from tourspot natural join bucketlist";
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
            <th>Bucketlist 이름</th>
            <th>content</th>
            <th>관광지 이름</th>
            <th>추가한 날짜</th>
            <th>기능</th>
        </tr>
        </thead>
        <tbody>
        <?
        $row_index = 1;
        while ($row = mysqli_fetch_array($res)) {
            echo "<tr>";
            echo "<td>{$row_index}</td>";
            echo "<td><a href='bucket_view.php?bucket_id={$row['bucket_id']}'>{$row['bucket_name']}</a></td>";
            echo "<td>{$row['spot_name']}</td>";
            echo "<td>{$row['content']}</td>";
            echo "<td>{$row['added_date']}</td>";
            echo "<td width='17%'>
                <a href='bucket_form.php?bucket_id={$row['bucket_id']}'><button class='button primary small'>수정</button></a>
                 <button onclick='javascript:deleteConfirm({$row['bucket_id']})' class='button danger small'>삭제</button>
                </td>";
            echo "</tr>";
            $row_index++;
        }
        ?>
        </tbody>
    </table>
    <script>
        function deleteConfirm(bucket_id) {
            if (confirm("정말 삭제하시겠습니까?") == true){    //확인
                window.location = "bucket_delete.php?bucket_id=" + bucket_id;
            }else{   //취소
                return;
            }
        }
    </script>
</div>
<? include("footer.php") ?>
