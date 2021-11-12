<?php session_start(); ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>The FOXES</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/CSS/mywrite.css">

    <style>

        .tab_menu ul {
            display: flex;
            height: 60px;
            border-bottom: 1px solid #5da62b;
        }
        .tab_menu ul li {
            flex:1;
        }
        .tab_menu ul li:first-child a {
            border-left: 1px solid #ddd;
        }
        .tab_menu ul li a {
            display: block;
            height: 59px;
            border: 1px solid #ddd;
            border-left: none;
            border-bottom: none;
            font-size: 14px;
            color: #505050;
            text-align: center;
            line-height: 59px;
            text-decoration: none;
        }
        .tab_menu ul li a.on {
            position: relative;
            height: 58px;
            border-color: #5da62b;
            border-top-width: 2px;
            line-height: 57px;
            border-bottom: 1px solid #fff;
        }
        .tab_menu ul li a.on::before {
            content: "";
            position: absolute;
            left: -1px;
            top: -2px;
            width: 1px;
            height: 100%;
            background: #5da62b;
            border-top: 2px solid #5da62b;

        }

    </style>
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


    <!-- 아래쪽 텝메뉴 레이아웃 시작-->
    <nav class="tab_menu" style="padding: 30px; margin:0; list-style: none;">
        <ul>
            <li><a href="#">브랜드</a></li>
            <li><a href="#" class="on">브랜드</a></li>
            <li><a href="#" >브랜드</a></li>
        </ul>

    </nav>







    <div class="footer">
        <h2>레스터시티 팬들을 위한 공간입니다.</h2>
    </div>

</body>

</html>