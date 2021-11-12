<?php session_start(); ?>

<!DOCTYPE html >
<html lang="en">

<head>
    <title>The FOXES</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    </style>
    <link rel="stylesheet" href="/CSS/css.css">
</head>

<body>

<?php if (!isset($_SESSION['userid']) && !isset($_SESSION['usernick'])) { ?>
        <script>
            alert("로그인이 필요합니다.");
            history.back();
        </script>
    <?php } else if (isset($_SESSION['userid'])) { ?>
    <div class="header">
        <h1>The FOXES</h1>
        <?php
        if (isset($_SESSION['userid'])&& isset($_SESSION['usernick'])) { ?>
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

        <?php if (isset($_SESSION['userid'])&& isset($_SESSION['usernick'])) { ?>
            <a href="/login_signup/mypage.php" class="right">내 정보</a>
            <a href="#" class="right">내가 쓴글</a>
            <a href="/login_signup/logout_action.php" class="right">로그아웃</a>
        <?php } else { ?>
            <a href="/login_signup/login_view.php" class="right">로그인</a>
        <?php } ?>
    </div>
    <form method="post" action="write_server.php" enctype="multipart/form-data">
        <!-- method : POST!!! (GET X) -->
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
                            <td>작성자</td>
                            <?php if (isset($_SESSION['userid'])&& isset($_SESSION['usernick'])) { ?>
                                <td><?= $_SESSION['usernick'] ?></td>
                        </tr>
                        <tr>
                            <td>말머리선택</td>
                            <td><select name="write_category" required>
                            <option value="" selected disabled hidden >선택해주세요.</option>
                                    <option value="free">자유</option>
                                    <option value="player">선수</option>
                                    <option value="interview">인터뷰</option>
                                    <option value="daily_life">일상</option>
                                    <option value="review">후기</option>
                                    <option value="question">질문</option>

                                </select></td>
                        </tr>

                        <tr>
                            <td>제목</td>
                            <td><input type="text" name="title" size=70 required></td>
                        </tr>
                        <tr>
                            <td class="file">이미지선택</td>
                            <td><input type="file" accept=".jpeg , .jpg , .png" name="images[]" multiple></input></td>
                        </tr>
                        <tr>
                            <td>내용</td>
                            <td><textarea name="content" cols=75 rows=15 required></textarea></td>
                        </tr>
                    </table>

                    <center>
                        <input style="height:26px; width:47px; font-size:16px;" type="submit" value="작성">
                        <script type="text/javascript">
                            function f_link() {
                                location.href = "noticeboard.php";
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
    <?php } ?>
    <?php } ?>
</body>

</html>