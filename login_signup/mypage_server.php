<?php
session_start();
include('db.php');
$id = $_SESSION['userid'];

$pw = $_POST['mypage_pw'];
$nick = $_POST['mypage_nick'];
$email = $_POST['mypage_email'];

$sql = "SELECT * FROM member WHERE mb_id = '$id'";
$query = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($query);
$userpw = $row['mb_password'];

$pw_1 =  mysqli_real_escape_string($con, $pw);

if (password_verify($pw_1, $userpw)) {

    if (empty($nick) || empty($email)) { ?>

        <script>
            alert("닉네임 또는 이메일은 비워둘수 없습니다.");
            location.replace("mypage.php");
        </script>

    <?php } else {

        $sql_update = "UPDATE member SET mb_nick = '$nick', mb_email= '$email' WHERE mb_id ='$id'";
        $query = mysqli_query($con, $sql_update);

        $_SESSION['usernick'] = $nick;
    } ?>
    <script>
        alert("변경되었습니다.");
        location.replace("mypage.php");
    </script>

<?php } else { ?>

    <script>
        alert("비밀번호가 틀렸습니다.");
        location.replace("mypage.php");
    </script>


<?php } ?>