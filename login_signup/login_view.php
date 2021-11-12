<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인</title>
</head>

<body>
    <?php 
    if(isset($_SESSION['userid'])&&isset($_SESSION['usernick'])){?>
    <script>
            alert("이미 로그인 중입니다.");
            history.back();
        </script>
   <?php }else{?>

    <center>
        <form action="login_server.php" method="post" autocomplete="off">
            <h2>로그인</h2>

            <?php if (isset($_GET['error'])) { ?>
                <p><?php echo $_GET['error']; ?></p>
            <?php } ?>

            <?php if (isset($_GET['success'])) { ?>
                <p><?php echo $_GET['success']; ?></p>
            <?php } ?>

            <?php
            #쿠키에서 로그인정보 불러오기#
            if (isset($_COOKIE['userid'])) {
                $userId = $_COOKIE['userid'];
                $idSaveCheck = "checked";
            }
            ?>

            <label>아이디입력</label>
            <input type="text" placeholder="아이디입력" value="<?= $userId ?>" autocomplete="off" name="user_id" required>
            <br><br>

            <label>비밀번호입력</label>
            <input type="password" autocomplete="off" placeholder="비밀번호" name="password" required>
            <br><br>

            <input type="checkbox" name="idSaveCheck" value="on" <?= $idSaveCheck ?>>아이디 기억하기
            <br><br>

            <button type="submit" name="login_btn">로그인</button>
            <br><br>
            <a href="register_view.php">아직 회원이 아니신가요? (회원가입페이지)</a>
            <br><br>
            <a href="FindMemberID.php">아이디나 비밀번호가 기억나지 않으신가요?? (아이디 혹은 비밀번호 찾으러 가기)</a>
            <br><br>
            <a href="/selectpage/TheFoxes.php">메인 페이지로가기</a>
        </form>
    </center>
</body>
<?php }?>
</html>


<!--php 언어는 서버와 통신하는 언어이다.-->