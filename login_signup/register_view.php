<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입</title>
</head>

<body>
    <center>
        <form action="register_server.php" method="post">
            <h2>회원가입</h2>

            <?php if (isset($_GET['error'])) { ?>
                <p><?php echo $_GET['error']; ?></p>
            <?php } ?>

            <?php if (isset($_GET['success'])) { ?>
                <p><?php echo $_GET['success']; ?></p>
            <?php } ?>

            <label>아이디 : </label>
            <input type="text" placeholder="아이디입력" name="user_id" required>
            <br><br>

            <label>이름 : </label>
            <input type="text" autocomplete="new-password" placeholder="이름" name="user_name" required>
            <br><br>

            <label>닉네임 : </label>
            <input type="text" autocomplete="new-password" placeholder="닉네임" name="user_nick" required>
            <br><br>

            <label>이메일 입력 :</label>
            <input type="email" placeholder="E-mail" name="mb_email" required>
            <br><br>

            <label>비밀번호 : </label>
            <input type="password" autocomplete="new-password" placeholder="비밀번호" name="password" required>
            <br><br>

            <label>비밀번호 확인 : </label>
            <input type="password" placeholder="비밀번호 다시입력" name="re_password" required>
            <br><br>

            <button type="submit" name="save_btn">가입하기</button>
            <br><br>
            <a href="login_view.php">이미회원이신가요? (로그인 페이지)</a>
        </form>
    </center>
</body>

</html>


<!--php 언어는 서버와 통신하는 언어이다.-->