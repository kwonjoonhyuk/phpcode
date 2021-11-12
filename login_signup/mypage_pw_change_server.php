<?php

session_start();
include('db.php');
$id = $_SESSION['userid'];
$user_pw = $_POST['mypage_change_pw'];
$new_pw = $_POST['mypage_new_pw'];
$new_pw_re = $_POST['mypage_new_pw_re'];

$sql = "SELECT * FROM member WHERE mb_id = '$id'";
$query = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($query);
$hash = $row['mb_password'];

if (password_verify($user_pw, $hash)) {

    $user_password =  mysqli_real_escape_string($con, $new_pw);
    $user_re_password =  mysqli_real_escape_string($con, $new_pw_re);

    if ($user_password != $user_re_password) { ?>
        <script>
            alert('새 비밀번호가 일치하지 않습니다.');
            location.replace("mypage_pw_chage.php");
        </script>
    <?php } else if (($user_password == $user_re_password) && ($user_re_password == $user_pw)) { ?>
        <script>
            alert("현재 사용하는 비밀번호와 바꾸려는 비밀번호가 일치합니다 다른 비밀번호를 입력해주세요");
            location.replace("mypage_pw_chage.php");
        </script>
    <?php } else {
        $hash = password_hash($user_re_password, PASSWORD_DEFAULT);

        $sql = "UPDATE member SET mb_password ='$hash' WHERE mb_id = '$id'";
        $query_1 = mysqli_query($con, $sql);

    }?>
    <script>
        alert("비밀번호가 변경되었습니다.");
        location.replace("mypage_pw_chage.php");
    </script>
<?php } else { ?>
    <script>
        alert("현재 비밀번호가 다릅니다.");
        location.replace("mypage_pw_chage.php");
    </script>

<?php } ?>






