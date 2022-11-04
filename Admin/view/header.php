<?php
if(isset($_SESSION['maso'])&&isset($_SESSION['tennv'])):
?>
<div class="container">
    <div class="header">
        <div class="header_logo">
            <a href="">
                <img src="https://pubcdn.ivymoda.com/images/logo.png" alt="">
            </a>
        </div>
        <div class="header_menu">
            <!-- test -->
            <nav class="navbar navbar-expand-sm  navbar-light">
                <!-- Brand -->
                <!-- Links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Trang Chủ</a>
                    </li>

                    <!-- Quản trị Doanh Mục -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Quản Trị Doanh Mục
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="index.php?action=loaihang">Loại Sản Phẩm</a>
                            <a class="dropdown-item" href="index.php?action=sanpham">Sản Phẩm</a>
                            <a class="dropdown-item" href="#">Loại menu</a>
                        </div>
                    </li>
                    <!-- Thống kê -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Thống Kê
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="index.php?action=thongke">Sản Phẩm bán được nhiều Nhất</a>
                            <a class="dropdown-item" href="#">Sản Phẩm chưa được giao</a>
                            <a class="dropdown-item" href="#">Sản phẩm bán ít nhất</a>
                            <a class="dropdown-item" href="">Thống kê</a>
                        </div>
                    </li>
                    <!-- Báo cáo -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Báo Cáo
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Tháng</a>
                            <a class="dropdown-item" href="#">Quý</a>
                            <a class="dropdown-item" href="#">Năm</a>
                        </div>
                    </li>
                    <!-- Báo cáo Tồn kho -->
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tồn Kho</a>
                    </li>
                    <li class="nav-item">

                        <a class="nav-link" href="index.php?action=registration"><i class="fa fa-user"></i></a>
                    </li>
                    <li class="nav-item">
                    <?php
                        if(isset($_SESSION['maso'])&&isset($_SESSION['tennv'])):
                    ?>
                        <a class="nav-link" href="index.php?action=login&act=logout"><i class="fas fa-sign-out-alt "></i></a>
                    <?php
                    endif;
                    ?>    
                    </li>
                </ul>
            </nav>
        </div>

    </div>
</div>
<?php endif; ?>