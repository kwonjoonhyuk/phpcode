<?php

include('lib.php');
$re_idx = $_GET['re_idx'];
$re_content = $_POST['re_contents'];
$regdate = date('Y-m-d H:i:s'); //íėŽėę°

$sql = "UPDATE reply SET reply_content ='$re_content', reply_date = '$regdate' WHERE re_idx ='$re_idx'";
$query = mysqli_query($connect,$sql);

if($query){?>
<script>
    history.back();
</script>

<?php }?>