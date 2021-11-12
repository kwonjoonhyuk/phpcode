<?php

     include('lib.php');

     $idx = $_GET['idx'];

     $idx = mysqli_real_escape_string($connect , $idx);

     $query = "DELETE FROM board WHERE idx = '$idx'";

     mysqli_query($connect,$query);

     $query_2 = "SELECT image_name FROM images where no_image = $idx";

     $name = mysqli_query($connect,$query_2);

     $sql = "DELETE FROM reply WHERE reply_bod_num ='$idx'";

     $query_1 = mysqli_query($connect,$sql);

     

     while ($result = mysqli_fetch_array($name)){
          $getname = $result['image_name'];
          unlink("uploads/$getname");
          print_r($getname);
     }


     $query_1 = "delete from images where no_image = '$idx'";

     mysqli_query($connect,$query_1);





?>
<script>
     location.href = 'noticeboard.php';
</script>