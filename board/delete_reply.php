<?php

include('lib.php');
$re_idx = $_GET['re_idx'];

$sql_1 = "SELECT * FROM reply WHERE re_idx ='$re_idx'";
$query_1 = mysqli_query($connect, $sql_1);
$row = mysqli_fetch_assoc($query_1);
$bod_num = $row['reply_bod_num'];


$sql = "DELETE FROM reply WHERE re_idx ='$re_idx'";
$query = mysqli_query($connect, $sql);


?>
<script>
      history.back();
</script>