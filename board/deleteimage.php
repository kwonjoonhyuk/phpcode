<?php

include('lib.php');

$no = $_GET['num'];
$num = $_GET['idx'];

$query_2 = "SELECT image_name FROM images where num = $no";

$name = mysqli_query($connect,$query_2);
$result = mysqli_fetch_array($name);
$getname = $result['image_name'];

     unlink("uploads/$getname");

$no = mysqli_real_escape_string($connect , $no);
$query = "delete from images where num = '$no'";

$result = mysqli_query($connect,$query);


if($result){
     header("location:bod_modify.php?idx=$num");
     exit();
}

?>

