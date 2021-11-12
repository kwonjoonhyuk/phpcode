<?php

session_start();
include('db.php');
$find_pw_id = $_POST['find_mb_id'];
$find_pw_name = $_POST['find_mb_name'];
$find_pw_email = $_POST['find_mb_email'];

$sql = "SELECT * FROM member WHERE mb_id = '$find_pw_id'";
$query = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($query);



if (empty($row)) { ?>
    <script>
        alert('아이디를 다시 확인해주세요');
        location.replace("FindMemberPW.php");
    </script>
<?php } else if ($row['mb_name'] != $find_pw_name) { ?>
    <script>
        alert('이름이 일치하지 않습니다.');
        location.replace("FindMemberPW.php");
    </script>
<?php } else if ($row['mb_name'] == $find_pw_name && $row['mb_email'] != $find_pw_email) { ?>
    <script>
        alert('이메일 주소가 일치하지 않습니다.');
        location.replace("FindMemberPW.php");
    </script>
<?php } else{

    $_SESSION['userid'] = $find_pw_id;
    $_SESSION['user_email'] = $find_pw_email;

    header("location:repassword.php");
    exit();



 } ?>