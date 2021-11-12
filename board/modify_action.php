<?php
 include('lib.php');
 $mod_idx = $_GET['idx'];
 $title = $_POST['title'];
 $content = $_POST['content'];
 $option = $_POST['write_category'];

 if ($option =='free') {
    $option = '자유';
} else if ($option == 'player') {
    $option = '선수';
} else if ($option == 'interview') {
    $option = '인터뷰';
} else if ($option == 'daily_life') {
    $option = '일상';
} else if ($option == 'review') {
    $option = '후기';
} else if ($option == 'question') {
    $option = '질문';
}

if($mod_idx){
    $query = "UPDATE board SET title = '$title', content = '$content' , bod_tag ='$option' WHERE idx ='$mod_idx'";  //수정 부분 
    $result_1 = mysqli_query($connect,$query);

    $images = $_FILES['images'];
    $num_of_imgs = count($images['name']);

    for ($i = 0; $i < $num_of_imgs; $i++) {

        // 이미지정보를 가져와서 var 디렉토리에 저장하는 부분
        $image_name = $images['name'][$i];
        $tmp_name = $images['tmp_name'][$i];
        $error = $images['error'][$i];

        //업로드 하는동안 오류가 발생하는 부분

        if ($error === 0) {

            // var 디렉토리에 이미지 저장소 확장자 가져오기 
            $img_ex = pathinfo($image_name, PATHINFO_EXTENSION);
            // echo $img_ex. "<br>";

            // 이미지 확장자를 소문자로 변환하고 그대로 var 디렉토리에 저장
            $img_ex_lc = strtolower($img_ex);

            //이미지 확장을 업로드할수 있는 저장소를 만드는 배열 생성
            $allowed_exs = array('jpg', 'jpeg', 'png');

            //이미지 확장자가 $allowed_exs 배열에 있는 확인하는 부분
            if (in_array($img_ex_lc, $allowed_exs)) {

                //임의의 문자열로 이미지 이름 바꾸기
                $new_img_name = uniqid('IMG-', true) . '.' . $img_ex_lc;


                //루트 디렉토리에 업로드 경로 생성
                $img_upload_path = 'uploads/'.$new_img_name;


                //데이터베이스에 이미지 삽입
                $sql = "INSERT INTO images (image_name,no_image) VALUES ('$new_img_name',$mod_idx)";
                $stmt = $connect->prepare($sql);
                $stmt->execute();

                move_uploaded_file($tmp_name, $img_upload_path);
            } else {
                $em = "이 유형의 파일을 업로드 할 수 없습니다.";

                //image.php 로 리다이렉션 하고 에러 메시지를 보여줘 

                header("Location:modify_action.php?idx=$mod_idx");
            }
        } else {
            $em = "이 유형의 파일을 업로드 할 수 없습니다.";

            //image.php 로 리다이렉션 하고 에러 메시지를 보여줘 

            header("Location:modify_action.php?idx=$mod_idx");
        }
    }

    if($result_1){
        header("location:bod_read.php?idx=$mod_idx");
    }

}


?>