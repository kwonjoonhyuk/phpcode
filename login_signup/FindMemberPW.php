<?php
session_start();
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>비밀번호 찾기</title>
</head>

<body>
    <center>
        <form action="/login_signup/FindMemberPW_Sever.php" method="post">
            <h2>비밀번호 찾기</h2>

            <?php if (isset($_GET['error'])) { ?>
                <p><?php echo $_GET['error']; ?></p>
            <?php } ?>

            <?php if (isset($_GET['success'])) { ?>
                <p><?php echo $_GET['success']; ?></p>
            <?php } ?>

            <label>아이디 : </label>
            <input type="text" autocomplete="new-password" placeholder="아이디" name="find_mb_id" required>
            <br><br>

            <label>이름 :</label>
            <input type="text" placeholder="이름" name="find_mb_name" required>
            <br><br>

            <label>이메일 :</label>
            <input type="email" placeholder="E-mail" name="find_mb_email" required>
            <br><br>

            <button type="submit" name="save_btn">확인</button>
            <script type="text/javascript">
                function f_link() {
                    location.href = "login_view.php";
                }
            </script>
            <button  onclick="f_link(); return false;">취소하기</button>
        </form>
            <br><br>
            <a href="login_view.php">로그인 페이지로 돌아가기</a>
            <br><br>
            <a href="FindMemberID.php">아이디 찾으러 가기</a>
        </form>
    </center>
</body>

</html>