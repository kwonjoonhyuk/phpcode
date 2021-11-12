<?php session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>비밀번호 재설정 페이지</title>
</head>

<body >
    <?php if (isset($_SESSION['userid']) && isset($_SESSION['user_email'])) { ?>

        <form method="POST" action="/login_signup/repassword_Server.php">
            <center>
                <h1>비밀번호 재설정</h1>

                <label>새 비밀번호 : </label>
                <input type="password" autocomplete="new-password" placeholder="새 비밀번호" name="new_pw">
                <br><br>

                <label>새 비밀번호 확인 :</label>
                <input type="password" placeholder="새 비밀번호 확인" name="new_re_pw">
                <br><br>

                <input type="submit" value="재설정 완료">

                <script type="text/javascript">
                                function f_link() {
                                    location.href = "FindMemberPW.php";
                                }
                            </script>
                <button onclick="f_link(); return false;">취소</button>

            </center>
        </form>

    <?php } else { ?>
        <script>
            alert("접근 권한이 없습니다.");
            history.back();
        </script>
    <?php } ?>
</body>

</html>