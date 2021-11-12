<?php
include('lib.php');
$bod_num = $_GET['idx'];
session_start();
$query = "SELECT * FROM board WHERE idx = '$bod_num'";
$result = mysqli_query($connect, $query);
$data = mysqli_fetch_array($result);


if ($_SESSION['userid'] == null) {
    $cookie = setcookie('no-user', "false", time() + 86400, "/board/bod_read.php");
} else if ($_SESSION['userid'] === $data['bod_mb_id']) {
    setcookie($_SESSION['userid'] . "+" . $bod_num, $bod_num, time() + 31104000 * 100, "/board/bod_read.php");
} else if ($_SESSION['userid'] !== $data['bod_mb_id']) {
    setcookie($_SESSION['userid'] . "+" . $bod_num, $bod_num, time() + 60, "/board/bod_read.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>The FOXES</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/CSS/css.css">
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>


</head>

<body>

    <div class="header">
        <h1>The FOXES</h1>
        <?php
        if (isset($_SESSION['userid']) && isset($_SESSION['usernick'])) { ?>
            <div class="relative">
                <P>안녕하세요 <?php echo $_SESSION['usernick']; ?> 님 </P>
            </div>
        <?php } ?>
    </div>

    <div class="navbar">
        <a href="/selectpage/TheFoxes.php">홈 화면</a>
        <a href="/selectpage/teamsquad.php">레스터시티 선수단</a>
        <a href="noticeboard.php">자유게시판</a>
        <a href="/selectpage/marketpage.php">레스터 시티 갤러리</a>

        <?php if (isset($_SESSION['userid']) && isset($_SESSION['usernick'])) { ?>
            <a href="/login_signup/mypage.php" class="right">내 정보</a>
            <a href="#" class="right">내가 쓴글</a>
            <a href="/login_signup/logout_action.php" class="right">로그아웃</a>
        <?php } else { ?>
            <a href="/login_signup/login_view.php" class="right">로그인</a>
        <?php } ?>
    </div>
    <div class="board_wrap">
        <div class="board_title">
            <strong>자유게시판</strong>
        </div>
        <div class="board_view_wrap">
            <div class="board_view">
                <div class="title">
                    [<?= $data['bod_tag'] ?>] <?= $data['title'] ?>
                </div>
                <div class="info">
                    <dl>
                        <dt>번호</dt>
                        <dd><?= $data['idx'] ?></dd>
                    </dl>
                    <dl>
                        <dt>작성자</dt>
                        <dd><?= $data['bod_nick'] ?></dd>
                    </dl>
                    <dl>
                        <dt>작성 일자</dt>
                        <dd><?= $data['regdate'] ?></dd>
                    </dl>
                    <?php if (empty($_COOKIE[$_SESSION['userid'] . "+" . $bod_num] == $bod_num) && !empty($_SESSION['usernick'])) { ?>
                    <?php
                        $hit_count = $data['hit_count'];
                        $sql = "UPDATE board SET hit_count = '$hit_count' + 1 WHERE idx = '$bod_num'";
                        $result = mysqli_query($connect, $sql);
                    } else {
                    } ?>

                    <dl>
                        <dt>조회</dt>
                        <dd><?= $data['hit_count'] ?></dd>
                    </dl>

                </div>
                <div class="content">
                    <?= $data['content'] ?>
                    <br><br><br>

                    <?php
                    include('lib.php');
                    $sql = "SELECT image_name,num FROM images WHERE no_image = $bod_num ";
                    $result = mysqli_query($connect, $sql);
                    $row = mysqli_num_rows($result);

                    if ($row > 0) {
                        while ($images = mysqli_fetch_array($result)) { ?>
                            <img style=" height:200px; width: 200px; margin-left:20px " src="uploads/<?= $images['image_name'] ?>">
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
            <br>
        </div>
        <!--비로그인 부분 댓글 부분-->

        <?php

        include('lib.php');

        $sql = "SELECT * FROM reply WHERE reply_bod_num = '$bod_num'";
        $rep_query = mysqli_query($connect, $sql);


        if (!isset($_SESSION['userid']) && !isset($_SESSION['userid'])) { ?>
            <!--비로그인 부분 댓글 부분 목록-->
            <?php while ($rep_data = mysqli_fetch_array($rep_query)) { ?>
                <div class="reply_view" style="margin-top: 8px;">
                    <div style="font-size: 14px; padding: 10px 0 15px 0; border-bottom:solid 1px gray;" class="dap_lo">
                        <div><b><?= $rep_data['reply_nick'] ?></b></div>
                        <div style="margin-top: 5px;"><?= nl2br($rep_data['reply_content']) ?></div>
                        <div class="rep_date" style="margin-top: 5px; font-size: 10px; "><?= $rep_data['reply_date'] ?></div>
                    </div>
                </div>

            <?php } ?>

            <h1>댓글을 작성 하시려면 로그인 해주세요</h1>

            <!--로그인 부분 댓글 부분-->
        <?php } else { ?>
            <h1>
                <댓글목록>
            </h1>
            <?php while ($rep_data = mysqli_fetch_array($rep_query)) {

                if ($rep_data['reply_id'] == $_SESSION['userid']) { ?>
                    <!--로그인 부분 댓글 부분 목록에서 로그인한 아이디와 댓글 아이디가 같은 부분-->

                    <div class="reply_view" style="margin-top: 8px;">
                        <div style="font-size: 14px; padding: 10px 0 15px 0; border-bottom:solid 1px gray;" class="dap_lo">
                            <div><b><?= $rep_data['reply_nick'] ?></b></div>
                            <div style="margin-top: 5px;"><?= nl2br($rep_data['reply_content']) ?></div>
                            <div class="rep_date" style="margin-top: 5px; font-size: 10px; "><?= $rep_data['reply_date'] ?></div>
                            <div class="del_mod_rep" style="margin-top: 8px;">
                                <script type="text/javascript">
                                    function open_field(el) {
                                        console.log("fi" + el);
                                        document.getElementById("fi" + el).style.display = 'block';

                                    }

                                    function close_field(el) {
                                        document.getElementById("fi" + el).style.display = 'none';
                                    }

                                    function delete_reply(el) {
                                        if (confirm('삭제하시겠습니까?')) {
                                            location.href = "delete_reply.php?re_idx=" + el;
                                        } else {

                                        }
                                    }
                                </script>

                                <table width="705" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td height="30">
                                            <button onclick="open_field('<?= $rep_data['re_idx'] ?>');">수정</button>
                                            <button onclick="delete_reply('<?= $rep_data['re_idx'] ?>');">삭제</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="5"></td>
                                    </tr>
                                    <tr id="fi<?= $rep_data['re_idx'] ?>" style="display:none">
                                        <td class="pdd">
                                            <form name="reply" type="hidden" method="post" action="reply_modify_Server.php?re_idx=<?= $rep_data['re_idx'] ?>">
                                                <input type="hidden" name="rep_no" value="<?= $rep_data['re_idx'] ?>">
                                                <input type="hidden" name="rep_bod_no" value="<?= $bod_num ?>">
                                                <textarea name="re_contents" cols="90" rows="4"><?= $rep_data['reply_content'] ?></textarea>
                                                <input type="submit" value="수정하기">
                                            </form>
                                            <br>
                                            <button onclick="close_field('<?= $rep_data['re_idx'] ?>');">수정창 닫기</button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <!--로그인 부분 댓글 부분 목록에서 로그인한 아이디와 댓글 아이디가 다른 부분-->
                    <div class="reply_view" style="margin-top: 8px;">
                        <div style="font-size: 14px; padding: 10px 0 15px 0; border-bottom:solid 1px gray;" class="dap_lo">
                            <div><b><?= $rep_data['reply_nick'] ?></b></div>
                            <div style="margin-top: 5px;"><?= nl2br($rep_data['reply_content']) ?></div>
                            <div class="rep_date" style="margin-top: 5px; font-size: 10px; "><?= $rep_data['reply_date'] ?></div>
                        </div>
                    </div>

                <?php } ?>
            <?php } ?>
            <br><br>
            <div class="dap_ins">
                <!-- <h2>댓글 작성</h2> -->
                <form action="replyOk_Sever.php?idx=<?= $bod_num ?>" method="POST">
                    <div style="margin-top: 10px; display:block">
                        <textarea placeholder="댓글을 남겨보세요" name="reply_content" class="reply_content" id="re_content" style="width: 700px; height:56px;" required></textarea>
                        <button id="rep_bt" class="re_bt" style="position: absolute; width:100px; height:56px; font-size:16px; margin-left:10px;">등록</button>
                    </div>

                </form>
            </div>
    </div>

<?php } ?>


<div class="bt_wrap">
    <?php if ($_SESSION['userid'] === $data['bod_mb_id']) { ?>
        <a href="/board/noticeboard.php" class="on">목록 </a>
        <a href="/board/bod_modify.php?idx=<?= $data['idx'] ?>">수정</a>
        <a href="/board/del_bod.php?idx=<?= $data['idx'] ?>" onclick="return confirm('정말 삭제하시겠습니까?');">삭제</a>
    <?php } else { ?>
        <script type="text/javascript">
            function f_link() {
                history.back();
            }
        </script>
        <a href="javascript:f_link();" class="on">목록 </a>
    <?php } ?>
</div>

<br><br><br><br><br><br><br><br><br><br><br><br>
</div>
<div class="footer">
    <h2>레스터시티 팬들을 위한 공간입니다.</h2>
</div>

</body>


</html>