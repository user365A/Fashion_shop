<!-- <link rel="stylesheet" href="../css/style.css"> -->

<script type="text/javascript">
    function takeTK(a) {
        document.getElementById("size").value = a;

    }
</script>
<header class="header_app">
    <div class="logo">
        <a href="index.php"><img src="https://pubcdn.ivymoda.com/images/logo.png" alt=""></a>
    </div>
    <div class="menu">

        <?php
        $hh = new Hanghoa();
        $result = $hh->getlist_menu();
        while ($set = $result->fetch()) :
        ?>
            <div class="header_menu-text">
                <li><span class="header_menu-text-title-all"> <a href="index.php?action=home&act=cartegory&loaihang=<?php echo $set['name'] ?>">
                            <?php
                            switch ($set['name']) {
                                case "nu":
                                    echo "Nữ";
                                    break;
                                case "nam":
                                    echo "Nam";
                                    break;
                                case "treem":
                                    echo "Trẻ em";
                                    break;
                                case "khuyenmai":
                                    echo "Khuyến mãi";
                                    break;
                            }
                            ?>
                        </a></span>
                    <ul class="sub-menu">
                        <li class="sub-menu-item"><a href=""><span class="header_menu-text-title">Hàng mới
                                    về</span>
                            </a></li>
                        <?php
                        $a = null;
                        if ($set['name'] == "nu") {
                            $a = 1;
                        } else if ($set['name'] == "nam") {
                            $a = 2;
                        } else if ($set['name'] == "treem") {
                            $a = 3;
                        } else if ($set['name'] == "khuyenmai") {
                            $a = 4;
                        }
                        $res = $hh->getlist_tenloai($a);
                        while ($s = $res->fetch()) :
                        ?>
                            <li class="sub-menu-item"><a href="index.php?action=home&act=cartegory&tenloai=<?php echo $s['tenloai'] ?>"><span class="header_menu-text-title"><?php echo $s['tenloai'] ?></span></a>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                </li>
            </div>
        <?php endwhile; ?>
        <div class="header_menu-text">
            <li><span class="header_menu-text-title-all"> <a href="">Khẩu Trang</a></span>

            </li>
        </div>

        <div class="header_menu-text">
            <li><span class="header_menu-text-title-all"> <a href="">Bộ sưu tập</a></span>
                <ul class="sub-menu">
                    <li class="sub-menu-item"><a href=""><span class="header_menu-text-title">Hàng mới về</span>
                        </a></li>
                    <li class="sub-menu-item"><a href=""><span class="header_menu-text-title">Áo</span></a>
                        <ul>
                            <a href="">

                                <li class="sub-menu-item-list "><span class="header_menu-text-title">Áo thun</span>
                                </li>
                            </a>
                            <a href="">
                                <li class="sub-menu-item-list "><span class="header_menu-text-title">Áo sơ
                                        mi</span></li>
                            </a><a href="">
                                <li class="sub-menu-item-list "><span class="header_menu-text-title">Áo dài</span>
                                </li>
                            </a>
                        </ul>
                    </li>
                    <li class="sub-menu-item"><a href=""><span class="header_menu-text-title">Chân váy</span></a>
                    </li>
                    <li class="sub-menu-item"><a href=""><span class="header_menu-text-title">Giày</span></a></li>
                    <li class="sub-menu-item"><a href=""><span class="header_menu-text-title">Túi</span></a></li>
                </ul>
            </li>
        </div>

        <div class="header_menu-text">
            <li><span class="header_menu-text-title-all"> <a href="">Thông tin</a></span>

            </li>
        </div>

    </div>
    <div class="other">
        <li>
            <form action="index.php?action=home&act=timkiem" method="POST">
                <div class="header_search header-other_search-list">
                    <input placeholder="Tìm kiếm" type="text" name="timkiem" id="header_find-text" title="Tìm kiếm">
                    <a type="" href=""><i class="fa fa-search header-other_search "></i> </a>
                </div>
            </form>
        </li>
        <li>
            <div class="header-other_search-list">
                <a href="index.php?action=login"><i class="fas fa-sign-in-alt header-other_search-icon"></i></a>
            </div>
        </li>
        <?php
        if (isset($_SESSION['makh']) && isset($_SESSION['tenkh'])) {
        ?>
            <li>
                <div class="header-other_search-list">
                    <a href="index.php?action=login&act=logout"><i class="fas fa-sign-out-alt header-other_search-icon"></i></a>
                </div>
            </li>
        <?php
        }
        ?>
        <li>
            <div class="header-other_search-list">
                <a href="index.php?action=registration"><i class="fa fa-user header-other_search-icon" aria-hidden="true"></i></a>
            </div>
        </li>
        <li>
            <?php
            $count_cart = 0;
            if (isset($_SESSION['cart'])) {
                $count_cart = count($_SESSION['cart']);
            }
            ?>
            <div class="header-other_search-list">
                <a href="index.php?action=giohang"><i class="fa fa-shopping-bag header-other_search-icon"></i> <span style="color: red; margin-top: 20px; margin-left: 0px;">(<?php echo $count_cart; ?>)</span></a>

            </div>
        </li>

    </div>
</header>
<script src="../javascript/main.js"></script>