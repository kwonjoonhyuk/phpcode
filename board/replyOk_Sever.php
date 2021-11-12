<?php
session_start();
include('lib.php');
$bod_num = $_GET['idx'];
$userid = $_SESSION['userid'];
$usernick = $_SESSION['usernick'];
$reply_content = $_POST['reply_content'];
$regdate = date('Y-m-d H:i:s'); //현재시간
$regdate = mysqli_real_escape_string($connect, $regdate);

$sql = "INSERT INTO reply(reply_id , reply_nick , reply_date , reply_bod_num, reply_content) VALUES ('$userid','$usernick','$regdate','$bod_num','$reply_content')";
$query = mysqli_query($connect, $sql);

if ($query) { ?>

        <script>
                history.back();
        </script>

<?php } ?>