<?php include ("header.php"); ?>

   <div id="video" class="background-video"></div>
    </script>
    <style>
        .background-video {
            background-position: top center;
            background-repeat: no-repeat;
            bottom: 0;
            left: 0;
            overflow: hidden;
            position: fixed;
            right: 0;
            top: 0;
        }
        .navbar {
            z-index:999;
        }
        h1, p {
            padding: 0px 30px 0px 30px;
            text-align:center;
        }
        h1 {
            font-weight:800;
        }
        .container {
            position: relative;
            background: rgba(255, 255, 255, .9);
        }
        .ref {
            font-weight:200;
            font-size:0.5em;
        }
    </style>
    <br><br><br><br><br><br><br><br>
    <div class='container'>
    			<li><a href='Travel_form.php'>여행지 목록</a></li>
            	<li><a href='souvenir_form.php'>Souvinir 목록</a></li>
            	<li><a href='bucket_form.php'>Bucketlist 보기</a></li>
        <p align="center"><img src="images/cancun.jpg" width="100%"></p>
       
    </div>
<?php include ("footer.php"); ?>