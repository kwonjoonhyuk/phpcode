<?php session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>The FOXES</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/CSS/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        function getCookie(name) {
            var cookie = document.cookie;
            if (document.cookie != "") {
                var cookie_array = cookie.split("; ");
                console.log(cookie_array)
                for (var index in cookie_array) {
                    var cookie_name = cookie_array[index].split("=");
                    console.log(cookie_name);
                    if (cookie_name[0] == "popupYN") {
                        console.log(cookie_name[1]);
                        return cookie_name[1];
                    }
                }
            }
            return;
        }

        function openPopup(url) {
            var cookieCheck = getCookie("popupYN");
            if (cookieCheck != "N") window.open(url, '', 'width=450,height=520,left=0,top=0')
        }
    </script>
</head>

<body onload="javascript:openPopup('popup.html')">


    <div class="header">
        <h1>The FOXES
        </h1>
        <?php
        if (isset($_SESSION['userid']) && isset($_SESSION['usernick'])) { ?>
            <div class="relative">
                <P>안녕하세요 <?php echo $_SESSION['usernick']; ?> 님 </P>
            </div>
        <?php } ?>
    </div>


    <div class="navbar">
        <a href="/selectpage/TheFoxes.php">홈 화면</a>
        <a href="teamsquad.php">레스터시티 선수단</a>
        <a href="/board/noticeboard.php">자유게시판</a>
        <a href="marketpage.php">레스터 시티 갤러리</a>
        <?php if (isset($_SESSION['userid']) && isset($_SESSION['usernick'])) { ?>
            <a href="/login_signup/mypage.php" class="right">내 정보</a>
            <a href="mywrite.php" class="right">내가 쓴글</a>
            <a href="/login_signup/logout_action.php" class="right">로그아웃</a>
        <?php } else { ?>
            <a href="/login_signup/login_view.php" class="right">로그인</a>
        <?php } ?>

    </div>

    <div class="row">
        <div class="side">
            <h2>레스터 시티 홈구장</h2>
            <h5>킹파워 스타디움</h5>
            <div class="stadium" style="height:200px;"></div>
            <p>위치 : 잉글랜드 레스터 <br>
                개장 : 2002년 <br> 좌석 수 : 32,261석 </p>
            <hr>
            <h3>레스터시티 경기 일정</h3>
            <div class="match_schedule">
                <img src="이미지/레스터 경기일정.PNG" height="350px" width="100%">
            </div>
            <br>
        </div>
        <div class="main">
            <h2>레스터시티 맨유에 4:2로 대승</h2>
            <h5>2021.10.17</h5>
            <div class="newsimg">
                <img src="https://pbs.twimg.com/media/FB1dn80XEAcIKIR?format=jpg&name=4096x4096" height="200px" width="50%">
            </div>
            <p>120년 만에 맨유 상대로 3연승을 거두는 레스터시티</p>
            <p>한국시간 10월 16일 23:00 킹파워 스타디움에서 열린 맨유와의 경기에서 4:2로 승리후 손을 번쩍 들어올리는 슈마이켈 골키퍼..</p>
            <br>
            <h2>Youri Tielemans MOTM!!</h2>
            <h5>2021.10.17</h5>
            <div class="MOTM">
                <img src="https://pbs.twimg.com/media/FB1Y1iQXEAcSyPr?format=jpg&name=large" height="200px">
            </div>
            <p>MAN OF THE MATCH에 선정된 유리 틸레만스</p>
            <p>10월 16일에 열린 경기에서 1골을 기록한 유리 틸레만스는 맨 오브 더 매치에 선정되었다.</p>
        </div>
    </div>

    <div class="footer">
        <h2>레스터시티 팬들을 위한 공간입니다.</h2>
    </div>

</body>

</html>