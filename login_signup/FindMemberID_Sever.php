<?php

include('db.php');

$name = $_POST['find_user_name'];
$email = $_POST['find_mb_email'];

$sql = " SELECT * FROM member WHERE mb_name = '$name'";
$query = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($query);

if (empty($row)) { ?>
    <script>
        alert('계정이 없는 이름입니다.');
        location.replace("FindMemberID.php");
    </script>
    <?php } else {
    if ($row['mb_email'] != $email) { ?>
        <script>
            alert('이메일 주소가 다릅니다.');
            location.replace("FindMemberID.php");
        </script>
    <?php } else { ?>
        <script>
            alert('<?=$name?>님의 아이디는 <?=$row['mb_id']?> 입니다.');
            location.replace("FindMemberID.php");
        </script>
    <?php } ?>


<?php }?>