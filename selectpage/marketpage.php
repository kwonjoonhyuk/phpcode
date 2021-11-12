<?php session_start(); ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>The FOXES</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/CSS/gallery.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="header">
        <h1>The FOXES</h1>
        <?php
        if (isset($_SESSION['userid']) && isset($_SESSION['usernick'])) { ?>
            <div class="relative">
                <P>안녕하세요 <?php echo $_SESSION['usernick']; ?> 님 </P>
            </div>
        <?php } ?>
    </div>

    <div class="navbar">
        <a href="TheFoxes.php">홈 화면</a>
        <a href="teamsquad.php">레스터시티 선수단</a>
        <a href="/board/noticeboard.php">자유게시판</a>
        <a href="marketpage.php">레스터 시티 갤러리</a>

        <?php if (isset($_SESSION['userid']) && isset($_SESSION['usernick'])) { ?>
            <a href="/login_signup/mypage.php" class="right">내 정보</a>
            <a href="#" class="right">내가 쓴글</a>
            <a href="/login_signup/logout_action.php" class="right">로그아웃</a>
        <?php } else { ?>
            <a href="/login_signup/login_view.php" class="right">로그인</a>
        <?php } ?>

    </div>

    <div class="wrap">
        <div class="marketpage_title">
            <strong>갤러리</strong>
            <p>등록하고 싶은 사진이 있으면 등록해주세요</p>
            <input type="button" value="등록하러가기" onclick="location.href ='image.php'">
        </div>
        <br>
        <div class="marketmain">
            <img src="https://media.bunjang.co.kr/product/69643642_1_1495117171_w360.jpg" height="200px" alt="">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQldxlKKQ35H8askF2Tnwng_KZi7C98NO9YpYx2MkfLK1tiOH-syPo20zTsE4_dSt3pAqQ&usqp=CAU" height="200px" alt="">


        </div>
    </div>
    <br><br><br><br><br><br>
    <br><br><br><br><br><br><br>

    <div class="footer">
        <h2>레스터시티 팬들을 위한 공간입니다.</h2>
    </div>

</body>

</html>