<?php
include('lib.php');
session_start();
$nickname = $_SESSION['usernick']; // 로그인 중인 닉네임 받아오기
$userid = $_SESSION['userid']; // 로그인 중인 유저 아이디 받아오기
$title = $_POST['title']; //제목 받아오기 
$content = $_POST['content']; //내용 부분 
$regdate = date('Y-m-d H:i:s'); //현재시간
$option = $_POST['write_category']; //말머리 선택부분 받아오기 
print_r($option);

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

$nickname = mysqli_real_escape_string($connect, $nickname);
$title = mysqli_real_escape_string($connect, $title);
$content = mysqli_real_escape_string($connect, $content);
$regdate = mysqli_real_escape_string($connect, $regdate);
$option = mysqli_real_escape_string($connect, $option);

$mysql = "INSERT INTO board(bod_nick, title , content , regdate , bod_tag ,bod_mb_id,hit_count ) VALUES ('$nickname','$title','$content','$regdate','$option','$userid','0')"; //입력한 부분 db에 저장
$result = mysqli_query($connect, $mysql); //쿼리문 실행
$mysql_2 = "SELECT idx FROM board WHERE regdate = '$regdate'";  //쓴글의 작성 일자를 바로 받아와서 게시판 번호 받아오는 부분
$result_1 = mysqli_query($connect, $mysql_2); //게시판 번호 받아오는 부분 쿼리문 실행
$array = mysqli_fetch_array($result_1);  // 배열로 받아서
$num = $array['0']; //게시판번호 $num에 넣기


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
            $img_upload_path = 'uploads/' . $new_img_name;


            //데이터베이스에 이미지 삽입
            $sql = "INSERT INTO images (image_name,no_image) VALUES ('$new_img_name',$num)";
            $stmt = $connect->prepare($sql);
            $stmt->execute();

            move_uploaded_file($tmp_name, $img_upload_path);
            
        } else {
            //에러 메세지
            $em = "이 유형의 파일을 업로드 할 수 없습니다.";

            //image.php 로 리다이렉션 하고 에러 메시지를 보여줘 

            header("Location:write.php?error=$em");
        }
    } else {
        $em = "이 유형의 파일을 업로드 할 수 없습니다.";

        //image.php 로 리다이렉션 하고 에러 메시지를 보여줘 

        header("Location:write.php?error=$em");
    }





}

if($result&$result_1){
    header('location: noticeboard.php');
    exit();
}else{
    header('location: write_server.php');
    echo "글쓰기에 실패했습니다.";
    exit();
}




?>