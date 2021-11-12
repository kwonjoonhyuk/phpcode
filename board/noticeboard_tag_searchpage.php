<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>The FOXES</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/CSS/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body>
    <?php
    include('lib.php');


    //페이징 처리 시작 부분
    if (isset($_GET["page"])) {
        $page = $_GET["page"];  //1,2,3,4,5
    } else {
        $page = 1;
    }

    $bod_tag = $_GET['bod_tag'];

    $category = $_GET['category'];
    $search = $_GET['search'];

    if ($category == 'title') {
        $catname = '제목';
    } else if ($category == 'bod_nick') {
        $catname = '작성자';
    } else if ($category == 'content') {
        $catname = '내용';
    } ?>

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
            <p>자유롭게 어떤 글이라도 올릴수 있는 게시판입니다.</p>
        </div>
        <div class="container">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><?=$bod_tag?>
                    <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="noticeboard_tag_searchpage.php?category=<?= $category ?>&bod_tag=자유&search=<?= $search ?>">자유</a></li>
                    <li><a href="noticeboard_tag_searchpage.php?category=<?= $category ?>&bod_tag=선수&search=<?= $search ?>">선수</a></li>
                    <li><a href="noticeboard_tag_searchpage.php?category=<?= $category ?>&bod_tag=인터뷰&search=<?= $search ?>">인터뷰</a></li>
                    <li><a href="noticeboard_tag_searchpage.php?category=<?= $category ?>&bod_tag=일상&search=<?= $search ?>">일상</a></li>
                    <li><a href="noticeboard_tag_searchpage.php?category=<?= $category ?>&bod_tag=후기&search=<?= $search ?>">후기</a></li>
                    <li><a href="noticeboard_tag_searchpage.php?category=<?= $category ?>&bod_tag=질문&search=<?= $search ?>">질문</a></li>
                </ul>
            </div>
        </div>
        <br>
        <div class="board_list_wrap">
            <div class="board_list">
                <div class="top">
                    <div class="num">번호</div>
                    <div class="title">제목</div>
                    <div class="writer">작성자</div>
                    <div class="date">작성일</div>
                    <div class="count">조회수</div>
                </div>


                <!-- 게시판 글 목록 나타내는 부분 시작 -->
                <?php


                $sql = "SELECT * FROM board WHERE bod_tag = '$bod_tag' AND $category LIKE '%$search%' ORDER BY idx DESC ";
                $result_1 = mysqli_query($connect, $sql);
                $total_records = mysqli_num_rows($result_1);

                $list = 5;
                $block_count = 5;
                $block_num = ceil($page / $block_count);  //소수점을 '올림'해서 정수로 만드는 함수 ceil
                $block_start = (($block_num - 1) * $block_count) + 1;  //블록의 시작 번호 1, 6, 11 ....
                $block_end = $block_start + $block_count - 1; //블록의 마지막 번호 5, 10 , 15 .....

                $total_page = ceil($total_records / $list);
                if ($block_end > $total_page) {
                    $block_end = $total_page;
                }

                $total_block = ceil($total_page / $block_count);
                $page_start = ($page - 1) * $list;





                $query = " SELECT * FROM board WHERE bod_tag = '$bod_tag' AND $category LIKE '%$search%' order by idx DESC LIMIT $page_start , $list ";
                $result = mysqli_query($connect, $query);
                if ($result) {
                    while ($data = mysqli_fetch_array($result)) { ?>
                        <div>
                            <div class="num"><?= $data['idx'] ?></div>
                            <div class="title"><a href="/board/bod_read.php?idx=<?= $data['idx'] ?>" style="color: black;">[<?= $data['bod_tag'] ?>]<?= $data['title'] ?></a></div>
                            <div class="writer"><?= $data['bod_nick'] ?></div>
                            <div class="date"><?= substr($data['regdate'], 0, 10) ?></div>
                            <div class="count"><?= $data['hit_count'] ?></div>
                        </div>
                    <?php } ?>
                <?php } else {
                    echo "오류가 발생하였습니다.";
                }
                ?>
            </div>

            <div id="page_num" style="text-align: center; margin-top:15px;">
                <?php


                if ($page <= 1) {
                    //빈값 
                } else {
                    $pre = $page - 1; ?>
                    <a href="noticeboard_tagpage.php?bod_tag=<?= $bod_tag ?>&page=<?= $pre ?>" style="font-size:20px; text-decoration:none;"> ◀ 이전 &nbsp;&nbsp; </a>
                    <?php }
                for ($i = $block_start; $i <= $block_end; $i++) {
                    if ($page == $i) { ?>
                        <b style="font-size: 20px;">&nbsp; <?= $i ?> </b>
                    <?php } else { ?>
                        <a href="noticeboard_tagpage.php?bod_tag=<?= $bod_tag ?>&page=<?= $i ?>" style="font-size: 20px; text-decoration:none;">&nbsp; <?= $i ?> </a>
                    <?php }
                }

                if ($page >= $total_page) {
                    // 빈값
                } else {
                    $next = $page + 1; ?>
                    <a href="noticeboard_tagpage.php?bod_tag=<?= $bod_tag ?>&page=<?= $next ?>" style="font-size: 20px; text-decoration:none;"> &nbsp;&nbsp; 다음 ▶</a>

                <?php }
                if ($page >= $total_page) {
                    //빈 값 
                } else { ?>
                    <a href="noticeboard_tagpage.php?bod_tag=<?= $bod_tag ?>&page=<?= $total_page ?>" style="font-size: 20px; text-decoration:none;">&nbsp;&nbsp; 마지막</a>
                <?php } ?>

            </div>

            <?php if (isset($_SESSION['userid']) && isset($_SESSION['usernick'])) { ?>
                <div class="bt_wrap">
                    <a href="/board/bod_write.php" class="on">글쓰기 </a>
                </div>
            <?php } else if (!isset($_SESSION['userid']) && !isset($_SESSION['usernick'])) { ?>
                <div class="bt_wrap">
                    <script type="text/javascript">
                        function f_link() {
                            alert('글쓰기는 로그인이 필요합니다.');
                        }
                    </script>
                    <a href="javascript:f_link();" class="on">글쓰기 </a>
                </div>
            <?php } ?>


            <!--검색부분 시작 -->
            <div class="board_searchpage" style="font-size: 14px;">
                <form method="GET" action="noticeboard_search_page.php">
                    <select name="category">
                        <option value="bod_nick">작성자</option>
                        <option value="content">내용</option>
                        <option value="title">제목</option>
                    </select>
                    <input type="text" name="search" placeholder="검색어를 입력하세요">
                    <input type="submit" class="btn_search" value="검색"></input>
                </form>
            </div>
        </div>

    </div>

    <div class="footer">
        <h2>레스터시티 팬들을 위한 공간입니다.</h2>
    </div>

</body>

</html>