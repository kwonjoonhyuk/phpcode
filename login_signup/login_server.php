<?php
include('db.php'); 

$idSaveCheck  = trim($_POST['idSaveCheck']);
if (isset($_POST['user_id']) && isset($_POST['password'])) {

    //보안을 더욱 강화(시큐어 코딩, 보안코딩)
    $user_id =  mysqli_real_escape_string($con, $_POST['user_id']);
    $user_password =  mysqli_real_escape_string($con, $_POST['password']);


    //에러를 체크
    if (empty($user_id)) {
        header("location: register_view.php?error= 아이디가 비어있습니다.");
        exit();
    } else if (empty($user_password)) {
        header("location: register_view.php?error= 비밀번호가 비어있습니다.");
        exit();
    } else {

        // 로그인 시키는 코딩

        $sql = "select * from member where mb_id ='$user_id'";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) === 1) {
            //로그인을 시켜

            // 1. 해당 열을 가져왔다.
            // 2. 가져올때 배열의 형태로 가져오는 구나 
            // 3. print_r 배열을 출력해주는 함수구나
            // 4. echo 는 쪼개서 가져올 수 있구나


            $row = mysqli_fetch_assoc($result); //fetch 가져오다
            $hash = $row['mb_password'];

            if (password_verify($user_password, $hash)) {

                session_start();
                $_SESSION['userid'] = $user_id;
                $sql1 = "SELECT mb_nick FROM member WHERE mb_id ='$user_id'"; //비번이 일치하면 그 아이디값이 입력되어있는 줄에서 mb_nick의 칼럼에 담겨있는 데이터를 가져옴
                $result_1 = mysqli_query($con, $sql1); // 위의 sql1의 쿼리문실행
                $nick = mysqli_fetch_array($result_1); //실행값을 배열로 $nick 값에 담는다.
                $nickname = $nick['mb_nick']; //배열값에서 mb_nick 값을 받아온다.
                $_SESSION['usernick'] = $nickname;
                if(isset($_SESSION['userid'])){

                    if ($idSaveCheck == "on") {
                        setcookie('userid', $user_id, time() + (86400 * 30), '/');
                    } else {
                        setcookie('userid', $user_id, time() - (86400 * 30), '/');
                        unset($_COOKIE['userid']);
                    }

                    header("location: /selectpage/TheFoxes.php");  // 로그인 되면 이동한다.
                    exit();
                }else{
                    echo "세션 failed";
                }
            } else {
                header("location: login_view.php?error= 비밀번호가 틀렸습니다.");
                exit();
            }
        } else {
            header("location: login_view.php?error= 아이디가 잘못 입력되었습니다.");
            exit();
        }
    }
} else {
    header("location: register_view.php?error= 알 수 없는 오류가 발생하였습니다.");
    exit();
}


//$_ 언더바를 붙이게 되면 전역변수가 되게된다.
?>