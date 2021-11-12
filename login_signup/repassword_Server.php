<?php
session_start();
include('db.php');
$new_pw = $_POST['new_pw'];
$new_re_pw =  $_POST['new_re_pw'];
$userid = $_SESSION['userid'];
$sql = "SELECT * FROM member WHERE mb_id ='$userid'";
$query = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($query);
$pw =  $row['mb_password'];

if ($new_pw != $new_re_pw) { ?>
    <script>
        alert('비밀번호가 일치하지 않습니다.');
        location.replace("repassword.php");
    </script>

    <?php  } else {
    $user_password =  mysqli_real_escape_string($con, $new_pw);
    $user_re_password =  mysqli_real_escape_string($con, $new_re_pw);

    if (password_verify($user_re_password,$pw)) { ?>
        <script>
            alert('기존 비밀번호와 같습니다. 다른 비밀번호를 입력해주세요');
            location.replace("repassword.php");
        </script>
<?php } else { 
    $hash = password_hash($user_re_password, PASSWORD_DEFAULT);

    $sql = "UPDATE member SET mb_password ='$hash' WHERE mb_id = '$userid'";
    $query_1 = mysqli_query($con,$sql);
 } ?>
   <script>
        alert('비밀번호가 변경되었습니다.');
        location.replace("FindMemberPW.php");
    </script>

   
<?php } ?>