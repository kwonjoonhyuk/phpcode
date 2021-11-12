<?php session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>The FOXES</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/CSS/css.css">
    <style>
        table.table2 {
            border-collapse: separate;
            border-spacing: 1px;
            text-align: left;
            line-height: 1.5;
            border-top: 1px solid #ccc;
            margin: 20px 10px;
        }

        table.table2 tr {
            width: 50px;
            padding: 10px;
            font-weight: bold;
            vertical-align: top;
            border-bottom: 1px solid #ccc;
        }

        table.table2 td {
            width: 100px;
            padding: 10px;
            vertical-align: top;
            border-bottom: 1px solid #ccc;
        }

        .table2 td .file {
            width: 200px;
        }

        .gallery {
            position: relative;
            display: inline-block;
            border: 1px red solid;
            font-size: 0;
        }

        .gallery img {
            width: 200px;
            height: 200px;
        }

        .gallery .close {
            position: absolute;
            top: 2px;
            right: 2px;
            z-index: 100;
            background-color: #FFF;
            padding: 5px 2px 2px;
            color: #000;
            font-weight: bold;
            cursor: pointer;
            opacity: .2;
            text-align: center;
            font-size: 22px;
            line-height: 10px;
            border-radius: 50%;
        }

        .gallery:hover .close {
            opacity: 1;
        }

        .gallery h1 {
            color: red;
        }
    </style>
</head>

<body>
    <?php
    include('lib.php');
    $bod_modify_num = $_GET['idx'];
    $query = "SELECT title , content ,bod_tag ,bod_mb_id FROM board WHERE idx = '$bod_modify_num'";
    $result = $connect->query($query);
    $row = mysqli_fetch_assoc($result);

    $title = $row['title'];
    $content = $row['content'];
    $userid = $row['bod_mb_id'];
    $tag = $row['bod_tag'];
    if (!isset($_SESSION['userid']) && !isset($_SESSION['usernick'])) { ?>
        <script>
            alert("접근 권한이 없습니다.");
            history.back();
        </script>
    <?php } else if ($_SESSION['userid'] == $userid && isset($_SESSION['usernick'])) { ?>
        <div class="header">
            <h1>The FOXES</h1>
            <div class="relative">
                <P>안녕하세요 <?php echo $_SESSION['usernick']; ?> 님 </P>
            </div>
        </div>

        <div class="navbar">
            <a href="/selectpage/TheFoxes.php">홈 화면</a>
            <a href="/selectpage/teamsquad.php">레스터시티 선수단</a>
            <a href="noticeboard.php">자유게시판</a>
            <a href="/selectpage/marketpage.php">레스터 시티 갤러리</a>


            <a href="/login_signup/mypage.php" class="right">내 정보</a>
            <a href="#" class="right">내가 쓴글</a>
            <a href="/login_signup/logout_action.php" class="right">로그아웃</a>
        </div>
        <form method="post" action="modify_action.php?idx=<?= $bod_modify_num ?>" enctype="multipart/form-data">
            <table style="padding-top:50px" align=center width=auto border=0 cellpadding=2>
                <tr>
                    <td style="height:40; float:center;">
                        <p style="font-size:25px; text-align:center; color:black; margin-top:15px; margin-bottom:15px"><b>자유게시판 글 작성하기</b></p>
                    </td>
                </tr>
                <tr>
                    <td bgcolor=white>
                        <table class="table2">
                            <tr>
                                <td>제목</td>
                                <td><input type="text" name="title" value="<?= $title ?>" size=70></td>
                            </tr>
                            <tr>
                                <td>말머리선택</td>
                                <?php if ($tag == '자유') { ?>
                                    <td><select name="write_category" required>
                                            <option value="" selected disabled hidden>선택해주세요.</option>
                                            <option selected value="free">자유</option>
                                            <option value="player">선수</option>
                                            <option value="interview">인터뷰</option>
                                            <option value="daily_life">일상</option>
                                            <option value="review">후기</option>
                                            <option value="question">질문</option>
                                        </select></td>
                                <?php } else if ($tag == '선수') { ?>
                                    <td><select name="write_category" required>
                                            <option value="" selected disabled hidden>선택해주세요.</option>
                                            <option value="free">자유</option>
                                            <option selected value="player">선수</option>
                                            <option value="interview">인터뷰</option>
                                            <option value="daily_life">일상</option>
                                            <option value="review">후기</option>
                                            <option value="question">질문</option>
                                        </select></td>
                                <?php } else if ($tag == '인터뷰') { ?>
                                    <td><select name="write_category" required>
                                            <option value="" selected disabled hidden>선택해주세요.</option>
                                            <option value="free">자유</option>
                                            <option value="player">선수</option>
                                            <option selected value="interview">인터뷰</option>
                                            <option value="daily_life">일상</option>
                                            <option value="review">후기</option>
                                            <option value="question">질문</option>
                                        </select></td>
                                <?php } else if ($tag == '일상') { ?>
                                    <td><select name="write_category" required>
                                            <option value="" selected disabled hidden>선택해주세요.</option>
                                            <option value="free">자유</option>
                                            <option value="player">선수</option>
                                            <option value="interview">인터뷰</option>
                                            <option selected value="daily_life">일상</option>
                                            <option value="review">후기</option>
                                            <option value="question">질문</option>
                                        </select></td>
                                <?php } else if ($tag == '후기') { ?>
                                    <td><select name="write_category" required>
                                            <option value="" selected disabled hidden>선택해주세요.</option>
                                            <option value="free">자유</option>
                                            <option value="player">선수</option>
                                            <option value="interview">인터뷰</option>
                                            <option value="daily_life">일상</option>
                                            <option selected value="review">후기</option>
                                            <option value="question">질문</option>
                                        </select></td>
                                <?php } else if ($tag == '질문') { ?>
                                    <td><select name="write_category" required>
                                            <option value="" selected disabled hidden>선택해주세요.</option>
                                            <option value="free">자유</option>
                                            <option value="player">선수</option>
                                            <option value="interview">인터뷰</option>
                                            <option value="daily_life">일상</option>
                                            <option value="review">후기</option>
                                            <option selected value="question">질문</option>
                                        </select></td>
                                <?php } ?>
                            </tr>

                            <tr>
                                <td class="file">이미지추가</td>
                                <td><input type="file" accept=".jpeg , .jpg , .png" name="images[]" multiple></input></td>
                            </tr>

                            <tr>
                                <td>내용</td>
                                <td><textarea name="content" cols=75 rows=15><?= $content ?> </textarea></td>
                            </tr>
                            <tr>
                                <td>첨부된 이미지</td>
                                <td>
                                    <?php
                                    include('lib.php');

                                    $sql = "SELECT image_name,num FROM images WHERE no_image = $bod_modify_num ";
                                    $result = mysqli_query($connect, $sql);
                                    $row = mysqli_num_rows($result);

                                    if ($row > 0) {
                                        while ($images = mysqli_fetch_array($result)) { ?>
                                            <div class="gallery">
                                                <a class="close" href="deleteimage.php?num=<?= $images['num'] ?>&idx=<?= $bod_modify_num ?>">&times;</a>
                                                <img src="uploads/<?= $images['image_name'] ?>" data-id="<?= $images['num'] ?>">
                                            </div>
                                        <?php } ?>
                                    <?php } ?>
                                </td>
                            </tr>
                        </table>

                        <center>
                            <input style="height:26px; width:80px; font-size:16px;" type="submit" value="수정완료">
                            <script type="text/javascript">
                                function f_link() {
                                    location.href = "bod_read.php?idx=<?= $bod_modify_num ?>";
                                }
                            </script>
                            <button style="height:26px; width:80px; font-size:16px;" onclick="f_link(); return false;">취소하기</button>
                        </center>
                    </td>
                </tr>
            </table>
        </form>

        <br><br><br><br>


        <div class="footer">
            <h2>레스터시티 팬들을 위한 공간입니다.</h2>
        </div>
    <?php } else { ?>
        <script>
            alert("접근 권한이 없습니다.");
            history.back();
        </script>

    <?php } ?>

</body>

</html>