<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>내 정보</title>
    <link rel="stylesheet" href="/CSS/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <?php
    include('db.php');
    $userid = $_SESSION['userid'];
    $sql = "SELECT * FROM member WHERE mb_id = '$userid'";
    $query = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($query);

    ?>
    <?php if (!isset($_SESSION['userid']) && !isset($_SESSION['usernick'])) { ?>
        <script>
            alert("로그인이 필요합니다.");
            location.replace("/selectpage/TheFoxes.php");
        </script>
    <?php } else if (isset($_SESSION['userid'])) { ?>

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
            <a href="/selectpage/TheFoxes.php">홈 화면</a>
            <a href="/selectpage/teamsquad.php">레스터시티 선수단</a>
            <a href="/board/noticeboard.php">자유게시판</a>
            <a href="/selectpage/marketpage.php">레스터 시티 갤러리</a>

            <?php if (isset($_SESSION['userid']) && isset($_SESSION['usernick'])) { ?>
                <a href="/login_signup/mypage.php" class="right">내 정보</a>
                <a href="#" class="right">내가 쓴글</a>
                <a href="/login_signup/logout_action.php" class="right">로그아웃</a>
            <?php } else { ?>
                <a href="/login_signup/login_view.php" class="right">로그인</a>
            <?php } ?>
        </div>

        <center>
            <form action="mypage_server.php" method="post">
                <h2 style="margin-top: 20;">내정보</h2>

                <label>아이디: <?= $_SESSION['userid'] ?></label>
                <br><br>

                <label>이름 : <?= $row['mb_name'] ?></label>
                <br><br>

                <label>현재 비밀번호 : </label>
                <input type="password" placeholder="현재 비밀번호" name="mypage_pw" required>
                <br><br>

                <label>닉네임 : </label>
                <input type="text" value=<?= $row['mb_nick']  ?> name="mypage_nick">
                <br><br>

                <label>이메일 : </label>
                <input type="email" value=<?= $row['mb_email'] ?> name="mypage_email">
                <br><br>

                <button type="submit" name="save_btn">저장하기</button>

                <script type="text/javascript">
                    function f_link() {
                        location.href = "mypage_pw_chage.php";
                    }
                </script>
                <button onclick="f_link(); return false;">비밀번호변경</button>

            </form>
        </center>

    <?php } else { ?>
        <script>
            alert("로그인이 필요합니다.");
            location.replace("/selectpage/TheFoxes.php");
        </script>
    <?php } ?>


</body>

</html>