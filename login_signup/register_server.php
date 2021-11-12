<?php

include('db.php');

if (isset($_POST['user_id']) && isset($_POST['user_nick']) && isset($_POST['password']) && isset($_POST['re_password']) && isset($_POST['mb_email'])&& isset($_POST['user_name'])) {

    $regdate = date('Y-m-d H:i:s'); //현재시간

    //보안을 더욱 강화(시큐어 코딩, 보안코딩)
    $user_id =  mysqli_real_escape_string($con, $_POST['user_id']);
    $user_name =  mysqli_real_escape_string($con, $_POST['user_name']);
    $user_nick =  mysqli_real_escape_string($con, $_POST['user_nick']);
    $user_email =  mysqli_real_escape_string($con, $_POST['mb_email']);
    $user_password =  mysqli_real_escape_string($con, $_POST['password']);
    $user_re_password =  mysqli_real_escape_string($con, $_POST['re_password']);
    $user_regdate =  mysqli_real_escape_string($con, $regdate);




    //에러를 체크
     if ($user_password !== $user_re_password) {
        header("location: register_view.php?error= 비밀번호가 일치하지 않습니다.");
        exit();
    } else {

        //암호화 
        //    $md5 = md5($user_password); // 양방향 암호 복호화가 가능 다시 거꾸로 푸는것이 가능하다 
        //    echo $md5;

        //    echo '<br>';
        //    echo '<br>';  

        $hash = password_hash($user_re_password, PASSWORD_DEFAULT);  //단방향 암호 보안이 강하다.
        echo $hash;

        // 아이디 또는 닉네임 , 또는 아이디와 동시에 닉네임 중복체크 
        $sql_same = "SELECT * FROM member where mb_id = '$user_id'";   //멤버 테이블에서 중복아이디 검사
        $sql_same_2 = "SELECT * FROM member_id where store_mb_id = '$user_id'"; //멤버 아이디 테이블에서 중복아이디 검사
        $sql_same_1 = "SELECT * FROM member where mb_nick = '$user_nick' "; //멤버 테이블에서 중복 닉네임 검사
        $sql_same_3 = "SELECT * FROM member WHERE mb_email = '$user_email'";
        $order =  mysqli_query($con, $sql_same); //두개의 인자값을 받을수 있다 .(db접속 , 명령을 수행해!!)
        $order_2 = mysqli_query($con,$sql_same_2);
        $order_1 =  mysqli_query($con, $sql_same_1);
        $order_3 =  mysqli_query($con, $sql_same_3);

        if (mysqli_num_rows($order) > 0 && mysqli_num_rows($order_2) >0) {  //가로들의 개수를 세어준다.
            header("location: register_view.php?error= 이미 사용 중이거나 탈퇴한 회원의 아이디 입니다.");
            exit();
        } else if (mysqli_num_rows($order_1) > 0) {
            header("location: register_view.php?error= 이미 사용 중인 닉네임이 있습니다.");
            exit();
        } else if(mysqli_num_rows($order_3) > 0){
            header("location: register_view.php?error= 이미 사용 중인 이메일이 있습니다.");
            exit();
        }else {
            //에러가 없다면 insert into 삽입 시켜줘

            $sql_save = "INSERT INTO member(mb_id  ,mb_nick , mb_password ,mb_email , mb_regdate , mb_name) values('$user_id', '$user_nick' , '$hash','$user_email','$user_regdate','$user_name')";
            $result = mysqli_query($con, $sql_save);
            $sql_save_1 = "INSERT INTO member_id(store_mb_id ,store_date, delete_mb_id) VALUES ('$user_id','$user_regdate','NO')";
            $result_1 = mysqli_query($con, $sql_save_1);

            if ($result && $result_1) {
                header("location: login_view.php?success= 성공적으로 가입 되었습니다.");
                exit();
            } else {
                header("location: register_view.php?error= 가입에 실패하였습니다.");
                exit();
            }
        }
    }
} else {
    header("location: register_view.php?error= 알 수 없는 오류가 발생하였습니다.");
    exit();
}


//$_ 언더바를 붙이게 되면 전역변수가 되게된다.
