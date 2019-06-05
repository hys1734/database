<!DOCTYPE html>
<html lang='ko'>
<head>
    <title>Yes-tour</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<form action="Tourlist.php" method="post">
    <div class='navbar fixed'>
        <div class='container'>
            <a class='pull-left title' href="index.php">Wonderful Travel</a>
            <ul class='pull-right'> 
                <li>
                    <input type="text" name="search_keyword" placeholder="여행지 검색">
                </li>
            </ul><br>
			</div>
            	<li><a href='Tourlist.php'>여행지 목록</a></li>
            	<li><a href='Souvenir.php'>Souvinir 목록</a></li>
            	<li><a href='Bucket.php'>Bucketlist 보기</a></li>
             	<li><a href='register.php'>등록하기</a></li>
           
			</table>
	</div>
    </div>
    
    <script>
	function hideAndSeek2() {
			var x = document.getElementById('confirm');
			if(x.style.display === 'none') {
				x.style.display = 'block';
			} else {
				x.style.display = 'none';
			}
		}
</script>

</form>