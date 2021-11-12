<?php session_start();?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>The FOXES</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/CSS/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

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
        <a href="TheFoxes.php">홈 화면</a>
        <a href="teamsquad.php">레스터시티 선수단</a>
        <a href="/board/noticeboard.php">자유게시판</a>
        <a href="marketpage.php">레스터 시티 갤러리</a>

        <?php if(isset($_SESSION['userid'])&& isset($_SESSION['usernick'])){?>
        <a href="/login_signup/mypage.php" class="right">내 정보</a>
        <a href="#" class="right">내가 쓴글</a>
        <a href="/login_signup/logout_action.php" class="right">로그아웃</a>

        <?php } else{?>
            <a href="/login_signup/login_view.php" class="right">로그인</a>
        <?php }?>
    </div>

    <div class="main">
        <h1>레스터 시티 선수단 소개</h1>
        <table>
            <tr>
                <td><img alt="" src="https://w.namu.la/s/80729018e187028462c0138ff657d1c3a5fc8510f2a03494453a5f187c44fdf07f3102095b5fa684ff05a440d144a81a37202d246124ee503a721631936ea399c89f82c96338a29d7620b451c1e9f54493ea51326ab8ac99401a9cbc6f7eecc9ba1d227f6a0a73f21d10fc57bd1951bc" />
                    <p>등번호 1번<br> 카스페르 슈마이켈 <br>Kasper Schmeichel<br><img src="https://w.namu.la/s/4885b5411be86a660a037cda4d83de2a5580f53f50227c263bfed28f82b9b070d5be757fab19d64a67a76f960727e7f126ff2b39ba6caa305e74d16dd865fe3613cbd375d11cdac0dcf67d39515fadd910a80b3d5de7a8e34924fe7ce5c0048b" title="덴마크" height="18px"> GK <br>1986.11.05 <br>2011~2023</p>
                </td>
                <td><img alt="" src="https://w.namu.la/s/19826d071cfb09e6523ac575345313095062caefb35497aea57b10b791587f122d39f28ad079c2388e4eab13732a3f2f643af2f804fa8c785eefa23bda18ae8ed6610adc4f6d037388965b65d0663bccaa5ecc2d153e03c594a909fd3d898baaf50e383606531d9a66f6ba8f6c80b528" />
                    <p>등번호 2번<br> 제임스 저스틴 <br>James Justin<br><img src="https://w.namu.la/s/2af6a7c6bcc58977af744bf916820dc2051ed49f12306bbe9c10388c0bd363e723995aa7cedb030b8a10a3a2451fe2e60df1de976ceddfc1ce30068e01cb0cfa657c4416046fb055e5f637f1be3721a4f43560ad9636f6803b1543a83f23337f" title="잉글랜드" height="18px"> DF<br>1998.02.23 <br>2019~2024</p>
                </td>
                <td><img alt="" src="https://w.namu.la/s/403ee8100f9946e6a1d87aeb88aa9f69af9c808d91671d34cfc8cd36e97e73ce3eef3dd5f4a8f0c1e85ce53407630a946e9b3f0cc09259234a900760de145acd3aa3e9eb37aeea19d76d1a5b1feb525867532793b1eaa96a104e280a043529c992ad4834e7b3b541230d4f2a3395211d" />
                    <p>등번호 4번<br> 찰라르 쇠윈쥐<br>Çağlar Söyüncü <br><img src="https://w.namu.la/s/4c1664dd9b819207ce827ecbdc216fdbf41da1eb1e0741ee3d384b2bb96b5130eee95e45f11f81dc36d83850a07d5919a87a2586e5e012da012a7aa96792debf13de062045779ce70cb9690e498f87b10c5b1396d999a67bd77b991a1989185b" title="터키" height="18px"> DF <br>1996.05.23 <br>2018~2023</p>
                </td>
                <td><img alt="" src="https://w.namu.la/s/e98ca4bc4fa2533e9de995b1d48473580f0ca1539745a1252ef4492c646b21003031c78abc44dd64fede8f089f3ace9e8f76e15890963e3abe996f5abda160054dded9ffec52fdb2f1649dc34055ab3a01252c284260b060141326899c7de18f757474b55f091c865d16c294c9fe7011" />
                    <p>등번호 3번<br>웨슬리 포파나<br>Wesley Fofana<br><img src="https://w.namu.la/s/ec6906ad7483307eef6a9efba228fe1be249d34b54538f7a51047922871a3893fdd83670be2aeea39bf713719284cdda45f8d451a00f9731fb76fb7273b794018b4b0c575bf6d881987c490a23afa7b6549e32347c32c6a885dddb67378123f8" title="프랑스" height="18px"> DF <br>2000.12.17 <br>2020~2025</p>
                </td>
                <td><img alt="" src="https://w.namu.la/s/d77ea40cadd675e4f28f1eea6eb68fad77d2f32ef20d4dc1232ce9142de65907e84485b3039a3871a0d39c68be4a8adfb4201a2f49764b3917ed56fe3e475ea076b27d17dd270541336edb6e7fcf434834e4932ba0e2aa56fe0745a234d66ff585c7bd908715c54c0078a9bcd1efe2ce" />
                    <p>등번호 5번<br>라이언 버틀란드<br>Ryan Bertrand<br><img src="https://w.namu.la/s/2af6a7c6bcc58977af744bf916820dc2051ed49f12306bbe9c10388c0bd363e723995aa7cedb030b8a10a3a2451fe2e60df1de976ceddfc1ce30068e01cb0cfa657c4416046fb055e5f637f1be3721a4f43560ad9636f6803b1543a83f23337f" title="잉글랜드" height="18px"> DF <br>1989.08.05 <br>2021~2023</p>
                </td>
                <td><img alt="" src="https://w.namu.la/s/123206ffafd1d3ba1010a106baba99cc2716eb2223183cb3da1e11801962a9fe403996af6c82bb3b578647b19ef98865be75741d49a8d3b4b380d9b539913758bf8ab604b6f7e8dc55e842d641b275a246fa2b21e8368c2aa4c3f3524f78d98590d87ceae76e40669a53babcef356bba" />
                    <p>등번호 6번<br>조니 에반스<br>Jonny Evans<br><img src="https://w.namu.la/s/8b89d313cac28c61a4b1d381084919e30fa3df91583ff44d7acf084031fa55f88bb667519104e45bb7b8ba18cf22d31f7e70df2c38a2acddeb495b8e8bc84261fb6901ac83015b47be9e68f3e2fc2729b09517627c5b6baf0a0703b53022b04e" title="북아일랜드" height="18px"> DF <br>1988.01.03 <br>2018~2023</p>
                </td>
            <tr>
        </table>
    </div>
    <div class="main">
        <table>
            <tr>
                <td><img alt="" src="https://w.namu.la/s/253d44fd4acb8f5b299333d892fdb5fd21707ffdcfda6f567ea63d643212f33b5371dc6cfd6707058164683c75c5ea7b750843564e392049547946b7cf0855e0724bcc244a486b9e28cff101deaa5e8b120269eb8306122228848ce0f145d39fe77ce4d7002c4bb4ade402ff24ca8222" />
                    <p>등번호 7번<br> 하비 반스 <br>Harvey Barnes<br><img src="https://w.namu.la/s/2af6a7c6bcc58977af744bf916820dc2051ed49f12306bbe9c10388c0bd363e723995aa7cedb030b8a10a3a2451fe2e60df1de976ceddfc1ce30068e01cb0cfa657c4416046fb055e5f637f1be3721a4f43560ad9636f6803b1543a83f23337f" title="잉글랜드" height="18px"> MF <br>1997.12.09 <br>2017~2025</p>
                </td>
                <td><img alt="" src="https://w.namu.la/s/c8c2a7a89d7966aa28238c08fdc78f0f0f9135a69fb0bf4d4ed0fb483b53783c3f4df309d4c6013eca2959d1e9040482b909915dabb490c52a77c0a1c40828bf2fcb72b516944ec2aebed13781fe1b74f9694a277478be3a804174e493b0841e81aa2eedaebf33b9785729d09227e427" />
                    <p>등번호 8번<br>유리 틸레만스 <br>James Justin<br><img src="https://w.namu.la/s/d12f664815639acfc113856223b8b14aa387be99b392729394e49de1515617bd6b34a641162653c0a2bcfe4a3df1cc37b8c8c20ce04f62fa440f03547f86d1d15d0dfe8b463f631d500e7e10435a7af50289712e5efe5a8f793c8ead7d16ffe4" title="벨기에" height="18px"> MF<br>1997.05.07 <br>2019~2023</p>
                </td>
                <td><img alt="" src="https://w.namu.la/s/e6ec716534a373eed319c5d0262189f82350c96302ced79ef2c0f0cda3f0f9418b8c8218ee522af7507a515a24720f0a69e46b20d679767a03dcd66b593a1c2cb077af7dbeab40066e7f0afb79c0c4a9dd00aef343db3f35951e761d5e485003c231abe7019f479782c135eaf1c6d569" />
                    <p>등번호 9번<br>제이미 바디<br>Jamie Vardy<br><img src="https://w.namu.la/s/2af6a7c6bcc58977af744bf916820dc2051ed49f12306bbe9c10388c0bd363e723995aa7cedb030b8a10a3a2451fe2e60df1de976ceddfc1ce30068e01cb0cfa657c4416046fb055e5f637f1be3721a4f43560ad9636f6803b1543a83f23337f" title="잉글랜드" height="18px"> FW<br>1987.01.11 <br>2012~2023</p>
                </td>
                <td><img alt="" src="https://w.namu.la/s/4abedcb13c14a0dff214720ffc65fc0f032399a7c1d436dd826d27adb3ae1607cf5db0787e1853bd13d8c4564076d8fb79b71b057a6299dbd9e65adde8f56bd9260f182efabd1c557f499aa1673e64cb2ba3ede042cd92c7c81173fb662f9c85bb115f95872d59bb110a96f18ea4eba8" />
                    <p>등번호 10번<br>제임스 메디슨<br>James Maddison<br><img src="https://w.namu.la/s/2af6a7c6bcc58977af744bf916820dc2051ed49f12306bbe9c10388c0bd363e723995aa7cedb030b8a10a3a2451fe2e60df1de976ceddfc1ce30068e01cb0cfa657c4416046fb055e5f637f1be3721a4f43560ad9636f6803b1543a83f23337f" title="잉글랜드" height="18px"> MF<br>1996.11.23 <br>2018~2024</p>
                </td>
                <td><img alt="" src="https://w.namu.la/s/145830bcde7784b75db12073aa2f36c530423d2c27817a564b10b6ac7c3402d1183b244dccdb646f811e2714f2fdfab8579f48fe25bc95ad1dc9b000617a76e74b57ecbf218071bee59fdf74065957498d9003610f167d7d3abfa96e307c3d7acd3010bb1893befb8769d87132c6e3d7" />
                    <p>등번호 11번<br>마크 올브라이턴<br>Marc Albrighton<br><img src="https://w.namu.la/s/2af6a7c6bcc58977af744bf916820dc2051ed49f12306bbe9c10388c0bd363e723995aa7cedb030b8a10a3a2451fe2e60df1de976ceddfc1ce30068e01cb0cfa657c4416046fb055e5f637f1be3721a4f43560ad9636f6803b1543a83f23337f" title="잉글랜드" height="18px"> MF<br>1989.11.18 <br>2014~2022</p>
                </td>
                <td><img alt="" src="https://w.namu.la/s/a3e9c0979b56cf562f7c4969324eb6bc02af40ab92e9c149f49a44fa8badca1251fe6da5b8ab843dce1c384075d80ccecbb5dbc636b13efb53ea22d47dad4db769cd5f53636ef48dec4a6df0de72e0579c1af0200f8a853f33ff7c930437a3e218aa76bbdc8b53f7a36b9b7aa4e358e7" />
                    <p>등번호 12번<br>대니 워드<br>Danny Ward<br><img src="https://w.namu.la/s/ed4d780406d0e94b87990cff41ecbd242e276e9281f14b6bded137eab1b22e1d9c6706ef03d352d0e524b571d605a787a07b6315c6b284a8914f0d763d66508befb9d52f4959fb8b5e2a6701021f8a19c716a90bbd935adffabe32b7293bd342" title="웨일즈" height="18px"> GK<br>1993.06.22 <br>2018~2025</p>
                </td>
            <tr>
        </table>
    </div>
    <div class="main">
        <table>
            <tr>
                <td><img alt="" src="https://w.namu.la/s/4ef113202bec58e7e47f4eb4d16081c970e4cf03356fbb891c73112081cced48b523570673e7cc7ebf41095fa372a82f017e6f603d1ad009535d92533938b864b5b1936424a5bd8e246c8ce639dfb771a44eeb79a8b160c2058ab0963f653ac3a6920fb363c3855203b1d30cc2b25e26" />
                    <p>등번호 14번<br> 켈레치 이헤나초 <br>Kelechi Ịheanachọ<br><img src="https://w.namu.la/s/3f61e326dc859a97ddc6a2eec57be67d535954980fc9de88166abfa7408901cf9a7066695828968deebfce9b4014be98662b8ab33dd29a88c45bc56b6ab6d0a6f24b538d1fb17d46ff9b27c15e46109e2976324f7819f959d9633b378a61db34" title="나이지리아" height="18px"> FW <br>1996.10.03 <br>2017~2024</p>
                </td>
                <td><img alt="" src="https://w.namu.la/s/835e2516f9cde6be025d68c5ff6da287ad046af8564105d1427559ecffe437c84cea839f6bf6b71055ace76444127aa95fde129d296d2523caafbab5a6f583eac4297d898ffcc7f1577c5d16a4ca0211eb3fe558bb6e8a810f21068de70d7ad6de5aff1464140859151d878ec20ead1b" />
                    <p>등번호 17번<br>아요세 페레스 <br>Ayoze Pérez<br><img src="https://w.namu.la/s/ab121b02650df9f8e901078331f4db12acf2468958ab521d3ef99e37307302a310e64bfa0703163ff1284e73d2ce5fa80c2198c3d62381685ed62bc67ecbf8dc66e677f242ef70255e7b47c4c6f1f97b41274bb65a48e30e85d87a225ec64750" title="스페인" height="18px"> FW<br>1993.07.23 <br>2019~2023</p>
                </td>
                <td><img alt="" src="https://w.namu.la/s/60c219b2cbe3747298a82be6cbfe16ed3bf101fd2a4a4f369b6e9efcb2a5c28d55e7c24575a74c505e26965c6b88e10dac5196d055ae63f7ef109eedd1764f43b1331cb1af41c0da9adcf1048a3749c115414eb17a7079213eae96e739903c7be5597560ca6e7af53841a9c62a274a23" />
                    <p>등번호 18번<br>다니엘 아마티<br>Daniel Amartey<br><img src="https://w.namu.la/s/f9a88d724e05a586a14297108343ebadc26147a3517caa69ae8276e69457dcb50ac72b089446da540947bb1b3ee972062e6e61b85009d0559daae5e7ddf8b7157bbad0d278b8612ed8e297ec3ed66dda8976981bf90e2e024e9498ba409809b8" title="가나" height="18px"> DF<br>1994.12.21 <br>2016~2022</p>
                </td>
                <td><img alt="" src="https://w.namu.la/s/4e4312154b9e9cfa6ef1f65d8587d4e16d726ef8b24f073b9b6e62abdb73e2ae0625860807b34973bea7b58c3da7913e8536f89126955e1d5ef01270be991d5b7522894c7ebff1141957a7a97f16ce870bfc9cf2a5b2c35edba0cf1f23018d7c506f0128357c94a32a2550fd03c69056" />
                    <p>등번호 20번<br>함자 차우두리<br>Hamza Choudhury<br><img src="https://w.namu.la/s/2af6a7c6bcc58977af744bf916820dc2051ed49f12306bbe9c10388c0bd363e723995aa7cedb030b8a10a3a2451fe2e60df1de976ceddfc1ce30068e01cb0cfa657c4416046fb055e5f637f1be3721a4f43560ad9636f6803b1543a83f23337f" title="잉글랜드" height="18px"> MF<br>1997.10.01 <br>2018~2023</p>
                </td>
                <td><img alt="" src="https://w.namu.la/s/6341b82a814c3fbdf8397a66208b3129dd0edb92f78b3ce47869c6897b7e8cab79deaeb46cbf3e76fcf5b7ad3ed5f089a5e8be9abab51e4d316aa9e5243b435daf3b408857c7809caa0b65136c94dad7be0845d40d3e0105bb59209f4045ac56f89c88dbd7ae50deb6c944565f3ceec9" />
                    <p>등번호 21번<br>히카르두 페레이라<br>Ricardo Pereira<br><img src="https://w.namu.la/s/36a229902c6d643775fc896b70f5845730fac08013ad4e6c555449fed5f96be12c862d04c1ea4e6b6b2b88829c1f90e11c828cc70adfbcaf085e00337d14028f3a2a73ee2c4ddaa673e9acea8a3242fdbdcab275e880bd8b9d2381a5153f4e27" title="포르투갈" height="18px"> DF<br>1993.10.0+ <br>2018~2023</p>
                </td>
                <td><img alt="" src="https://w.namu.la/s/ff0d0233d5afb586dc20cbc87464953398733a72d680da4858750f114a56e63e3e2c9a077cedc77791bc4893d541572e442ce31540c6e3a71d3e20eae835d5aba554678422df6d7b30e91dde3dd4c4d750277a9a14d9613f998ffad280134ca41615ac63553e4d712924956bc9663d98" />
                    <p>등번호 22번<br>키어넌 듀스버리홀<br>Kiernan Dewsbury-Hall<br><img src="https://w.namu.la/s/2af6a7c6bcc58977af744bf916820dc2051ed49f12306bbe9c10388c0bd363e723995aa7cedb030b8a10a3a2451fe2e60df1de976ceddfc1ce30068e01cb0cfa657c4416046fb055e5f637f1be3721a4f43560ad9636f6803b1543a83f23337f" title="잉글랜드" height="18px"> MF<br>1998.09.06 <br>2017~2024</p>
                </td>
            <tr>
        </table>
    </div>
    <div class="main">
        <table>
            <tr>
                <td><img alt="" src="https://w.namu.la/s/0abbee5d1f01b187b788fea75b599725d7fb35c4c3747027e2a2b072ad1d45d80338c6bf974d532afb04daa956efd48ba0f947dd98bace7109f2adfd30914969949b57f8d0b06a6a157c45e5a6fe7ef5d949cff388b762f93faca301e638c05ae57e171b6e9119076bcdcdadeab77682" />
                    <p>등번호 23번<br> 야니크 베스테르고르<br>JannikVestergaard<br><img src="https://w.namu.la/s/4885b5411be86a660a037cda4d83de2a5580f53f50227c263bfed28f82b9b070d5be757fab19d64a67a76f960727e7f126ff2b39ba6caa305e74d16dd865fe3613cbd375d11cdac0dcf67d39515fadd910a80b3d5de7a8e34924fe7ce5c0048b" title="덴마크" height="18px">DF <br>1992.08.03 <br>2021~2024</p>
                </td>
                <td><img alt="" src="https://w.namu.la/s/9ae7bfa3136aecb468829794d8be2f55147f37f881ec82675402315e866d058570513d2dcf735e281303146c30c98374e889368b7b1ce2abebb4db8d6549d6d4b2f41e9cdd20fb5c9dcc4ee2b29a7b29f5644db2d175d7b0b0d425a7e69457a93e74ce08aea5161c75f7db6748d44129" />
                    <p>등번호 24번<br>낭팔리스 멘디 <br>Nampalys Mendy<br><img src="https://w.namu.la/s/4c4bd27f80f4c4750f54eee6d418d65fa772998c849c6dab2a39a3e800b755db0fd097f236c660dd184513c9b671cd07d45dc3b44eca1f78ad5ba9aa30054d2499a5ca1da328706626c6b31217fc25970ae97ba138f13a54a5706c575812b445" title="가나" height="18px"> MF<br>1992.06.23 <br>2016~2023</p>
                </td>
                <td><img alt="" src="https://w.namu.la/s/e8d342df1f72e0bd834797489cf6765ce5a96a22d726d3f0fda47b1e5f1a3c69c3ecce8d2feefa61c74b6ff87eecbead33649e5eb611f392d116bb4e99efb4d31364c7aaf10ccbb0a27e8ce5f2b344603a65ccaec2607ef1d00e3f845d4a514ee1306ae7d2232d500aa14ad39203fa26" />
                    <p>등번호 25번<br>윌프레드 은디디<br>Wilfred Ndidi <br><img src="https://w.namu.la/s/3f61e326dc859a97ddc6a2eec57be67d535954980fc9de88166abfa7408901cf9a7066695828968deebfce9b4014be98662b8ab33dd29a88c45bc56b6ab6d0a6f24b538d1fb17d46ff9b27c15e46109e2976324f7819f959d9633b378a61db34" title="나이지리아" height="18px"> MF<br>1996.12.16 <br>2017~2024</p>
                </td>
                <td><img alt="" src="https://w.namu.la/s/2f0e26f1c92bd47c1682ec0a96217064845487f4ca8b90fe31d1f3c891fa47f9d7b856b229a5bdb28f53811f80b5159a9e44d1736fe312e61268b85e7685f7128a8657d88b497d1dda9660d93b8c56b98d63b3610b9e025274565bca245e98eeca3715e32300e42b79b9534c9047b8d4" />
                    <p>등번호 27번<br>티모시 카스타뉴<br>Timothy Castagne<br><img src="https://w.namu.la/s/d12f664815639acfc113856223b8b14aa387be99b392729394e49de1515617bd6b34a641162653c0a2bcfe4a3df1cc37b8c8c20ce04f62fa440f03547f86d1d15d0dfe8b463f631d500e7e10435a7af50289712e5efe5a8f793c8ead7d16ffe4" title="벨기에" height="18px"> DF<br>1995.12.05 <br>2020~2025</p>
                </td>
                <td><img alt="" src="https://w.namu.la/s/494c78a5bc28b982ffd9fc005585e842b557e9eb9d2469e323728982a7744bb2ec22d95ea49792b9d4e6bad7249157b876152e5e9236d5a69d86f91f155d665583fd49aee2afb632899808eddc7139b10fd0fd8997addff311328bc4615d2a087e5a7642bf44f1b9cdfcc49cc55a197e" />
                    <p>등번호 29번<br>팻슨 다카<br>Patson Daka<br><img src="https://w.namu.la/s/d993905ca3b5d5aaa506d3c88fe92fe41c790851d32575eab808f07c6aff8bc16ba3e7061c133c6c52bf6533eff678cb8842d9f41f7e98924efc5d035f847f3167a4ca598802bc0211850a79ff9e821cde3867c4a9ea846dfae00c3c7816fd0d" title="잠비아" height="18px"> FW<br>1998.10.09 <br>2021~2026</p>
                </td>
                <td><img alt="" src="https://w.namu.la/s/5faa3009103e9aaf6666b4ee4828bbe4075415e5671bb1a47b4d7c13f0056296bb055aa2db41ced47baab97b4e8ce623f7498482bb4775e520631eeefda369c5844e30dfe61f71a2c5c82fcb9ca415e20a658ad4e98cdadaf72724ea44bb7cbc369e14abeb1d9233d5e6ff9dde39d4b7" />
                    <p>등번호 33번<br>루크 토마스<br>Luke Thomas<br><img src="https://w.namu.la/s/2af6a7c6bcc58977af744bf916820dc2051ed49f12306bbe9c10388c0bd363e723995aa7cedb030b8a10a3a2451fe2e60df1de976ceddfc1ce30068e01cb0cfa657c4416046fb055e5f637f1be3721a4f43560ad9636f6803b1543a83f23337f" title="잉글랜드" height="18px"> DF<br>2001.06.10 <br>2020~2024</p>
                </td>
            <tr>
        </table>
    </div>
    <div class="main">
        <table>
            <tr>
                <td><img alt="" src="https://w.namu.la/s/d6d034567b9cb68fbed673de06afc0320986cbd2735d8101c8ce209b5be5c76cb12f45ceb09029bbe9599df6d813485edce94387e7f6be92d51a91731a3d6bb873c8261a6b234bf9f0aeabd730bb9dae5ab6380e73505c9017bafc5fa9c0dc08b2289614bb80db6a128f01bbfdeed50b" />
                    <p>등번호 34번<br> 필리프 벤코비치 <br>Filip Benković<br><img src="https://w.namu.la/s/84c609ad85f248edc14f9dfd055f991b55cf27f0210d3b5a30fb6c2926b2f8c90216bbbf2e666d39bf8da767143eb88b557f7c83dcfb68e24d01d08cb8833b12a0e82fe74259da4587d1025ca0fcddbb521523accba9bd38440d29b6c5b05e34" title="크로아티아" height="18px"> DF <br>1997.01.13 <br>2018~2023</p>
                </td>
                <td><img alt="" src="https://w.namu.la/s/e6acae9754c832904b3146247c1599e93525c2a4acbed17c1e69f3a12f80d73345804205cdb568ba96e1454db4d51f30d048cbda5a3efa990d294eeaf49c95d267639c7b82d9ee9a0b10b38c3e9a3778dbcc076cc195cad8ff3f7b85690e1060c5d92ac94815832cf3cd0afbc9c8ff3f" />
                    <p>등번호 35번<br>엘딘 야쿠포비치<br>Eldin Jakupović<br><img src="https://w.namu.la/s/6566066c757c1158cb77bcc6c19fa9a440aed351fdab3108cd4c13b4604eedda64bd9f4e508500acdb5bb957131193821d827dc7608ce28f77c090b57f4692fe37337dbba252596fb121dab578361e362678cba6297be488bc13d484585dec15" title="스위스" height="18px"> GK<br>1984.10.02 <br>2017~2021</p>
                </td>
                <td><img alt="" src="https://w.namu.la/s/7ba826bf654f1cb2580b6b8a843a3360ab29874a91b0288da656f96a5253dcdd6067ddd610de49bc978768c668817b172fbcebf60b6b7e0f25a81b556011d2489e5207fe153897728a33478e1af3465a392e62f7f067a4a8ed59f4ab30956fb29f108a54db2cd2ce3d3e9471f8aa0d02" />
                    <p>등번호 37번<br>아데몰라 루크먼<br>Ademola Lookman <br><img src="https://w.namu.la/s/2af6a7c6bcc58977af744bf916820dc2051ed49f12306bbe9c10388c0bd363e723995aa7cedb030b8a10a3a2451fe2e60df1de976ceddfc1ce30068e01cb0cfa657c4416046fb055e5f637f1be3721a4f43560ad9636f6803b1543a83f23337f" title="잉글랜드" height="18px"> FW<br>1997.10.20 <br>2021~2022</p>
                </td>
                <td><img alt="" src="https://w.namu.la/s/a3630ec49aa6664569b08792452ffb444379150afdef0b69d0a73bb5e114fa12f5f9f9dd4a2f608931f3eaf2fa0ed6e33c132c851249aa1a672684109f32de973547d4f756eb5f2f718589a5da2bda985bf330a08eb1998c5eabe6fd069666b6edcdea905596513adc4fac4ceaab743e" />
                    <p>등번호 42번<br>부바카리 수마레<br>Boubakary Soumaré<br><img src="https://w.namu.la/s/ec6906ad7483307eef6a9efba228fe1be249d34b54538f7a51047922871a3893fdd83670be2aeea39bf713719284cdda45f8d451a00f9731fb76fb7273b794018b4b0c575bf6d881987c490a23afa7b6549e32347c32c6a885dddb67378123f8" title="프랑스" height="18px"> MF<br>1999.02.27 <br>2021~2026</p>
                </td>
                <td><img alt="" src="https://w.namu.la/s/aa9d6ab9dec36856fc2c15cbd82fe25da4f62a1a6dfc554bd67e087059f10b943b2ca88006c60a692487e71979597c0ec57333b4f4940b0880764f547da4b3e8424e4c40cf74648bad93aa354caf2da2a36b4c6be44ca4b676c91b2f1b17a65825f44fac4e07d91ac7ecd09f0a499505" />
                    <p>등번호 45번<br>벤 넬슨<br>Ben Nelson<br><img src="https://w.namu.la/s/2af6a7c6bcc58977af744bf916820dc2051ed49f12306bbe9c10388c0bd363e723995aa7cedb030b8a10a3a2451fe2e60df1de976ceddfc1ce30068e01cb0cfa657c4416046fb055e5f637f1be3721a4f43560ad9636f6803b1543a83f23337f" title="스코틀랜드" height="18px"> DF<br>2004.03.18 <br>2020~?</p>
                </td>
                <td><img alt="" src="https://w.namu.la/s/f310a59af32708676ce6cd89146e932dc95e6acfe6532e287d86847976d4164ae01e671bf811ce1932a2353f7aa373efe6c2e197191944f150eb1893a5020948842cab0bb2e7d35083253d652d924859874659bf9e3437af53e37910faccfba3e654701ed7ebc2f09f180b4b2811980d" />
                    <p>등번호 26번<br>데니스 프라트<br>Dennis Praet<br><img src="https://w.namu.la/s/d12f664815639acfc113856223b8b14aa387be99b392729394e49de1515617bd6b34a641162653c0a2bcfe4a3df1cc37b8c8c20ce04f62fa440f03547f86d1d15d0dfe8b463f631d500e7e10435a7af50289712e5efe5a8f793c8ead7d16ffe4" title="벨기에" height="18px"> GK<br>1994.05.14<br>2019~2024 <br>토리노 FC 임대<br>2022.06.30 복귀</p>
                </td>
            <tr>
        </table>
    </div>


    <div class="footer">
        <h2>레스터시티 팬들을 위한 공간입니다.</h2>
    </div>

</body>

</html>