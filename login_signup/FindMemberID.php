<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>아이디 찾기</title>
</head>

<body>
    <center>
        <form action="FindMemberID_Sever.php" method="post">
            <h2>아이디 찾기</h2>

            <?php if (isset($_GET['error'])) { ?>
                <p><?php echo $_GET['error']; ?></p>
            <?php } ?>

            <?php if (isset($_GET['success'])) { ?>
                <p><?php echo $_GET['success']; ?></p>
            <?php } ?>

            <label>이름 : </label>
            <input type="text" autocomplete="new-password" placeholder="이름" name="find_user_name" required>
            <br><br>

            <label>이메일 입력 :</label>
            <input type="email" placeholder="E-mail" name="find_mb_email" required>
            <br><br>

            <button type="submit" name="save_btn">아이디찾기</button>
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
            <a href="FindMemberPW.php">비밀번호 찾으러 가기</a>
        </form>
    </center>
</body>

</html>