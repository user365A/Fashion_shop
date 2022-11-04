<!-- // -->
<!-- <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/cartegory.css">
    <link rel="stylesheet" href="../css/product_details.css"> -->
<!-- code javascript -->

<div class="container-fluid">
    <!-- produc details -->
    <section class="cartegory">
        <div class="cartegory_container">
            <div class="cartegory_top row">
                <p><a href="">Trang chủ</a></p><span>&#8594;</span>
                <p><a href="">Nữ</a></p><span>&#8594;</span>
                <p><a href="">Hàng nữ mới về</a></p>
            </div>
        </div>
        <?php
        if (isset($_GET['id'])) {
            $mahh = $_GET['id'];
            $hh = new Hanghoa();
            $sp = $hh->chitiethanghoa($mahh);
            $maloai = $sp['maloai'];
        }
        ?>
        <form action="index.php?action=giohang&act=add_cart" method="post">
            <div class="product_details row">

                <div class="product_lert">
                    <img src="<?php echo 'Admin/content/image/' . $sp['hinh']; ?>" alt="">
                </div>

                <div class="product_right">
                    <input type="hidden" name="mahh" value="<?php echo $mahh; ?>"/>
                    <p class="product_title" style="color: red;"><?php echo $sp['tenhh'] ?></p>
                    <p class="product_price"><?php echo number_format($sp['dongia']-$sp['giamgia']) ?><sub>đ</sub></p>
                    <div class="product_select">
                        <p class="select_title">Màu sắc :</p>
                        <select name="mymausac" id="" class="select_color" style="width:200px;">
                            <!-- <option value="">Màu sắc</option> -->
                            <?php
                            $mau = $hh->getColor($maloai);
                            while ($color = $mau->fetch()) {
                            ?>
                                <option value="<?php echo $color['mausac']; ?>" class="select_item"><?php echo $color['mausac']; ?></option>
                            <?php
                            }
                            ?>


                        </select>
                    </div>
                    <div class="product_details-size">
                        
                    <p class="select_title">Size :</p>
                        <select name="size" id="" class="select_color" style="width:200px;">
                            <!-- <option value="">Màu sắc</option> -->
                            <?php
                            $s = $hh->getSize($maloai);
                            while ($color = $s->fetch()) {
                            ?>
                                <option value="<?php echo $color['size']; ?>" class="select_item"><?php echo $color['size']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <p class="product_detailsValue">
                        <span class="product_detailsValue-title">Số lượng</span>
                       
                        <input type="number" id="soluong" name="soluong" min="1" max="100" value="1" size="10" />
                    </p>
                    <?php 
                       if($sp['soluongton']>0):
                    ?>
                    <button type="submit" class="product_button">
                        <i class="fa fa-shopping-basket product_button-icon"></i><span class="product_button-title">Mua
                            hàng</span>
                    </button>
                    <?php
                     else :
                    ?>
                       <h4 style="color: green;">Mặt hàng hiện đã hết</h4>
                    <?php
                    endif;
                    ?>
                    <ul class="phone_chat">
                        <div class="phone_chat-list">
                            <li class="phone_chat-item"><i class="fas fa-phone-volume"></i><a href=""> Hotline</a></li>

                            <li class="phone_chat-item"><i class="fas fa-comments"></i><a href="">Chat</a></li>

                            <li class="phone_chat-item"><i class="far fa-envelope"></i><a href="">Mail</a></li>

                        </div>
                    </ul>

                    <div class="product_details-code-qr">
                        <a href="">
                            <img src="https://pubcdn.ivymoda.com/images/qrcode2.png" alt="">
                        </a>
                    </div>
                    <hr>
                    <p class="content_details">
                        Chi tiết sản phẩm:
                    </p>
                    <hr id="line">
                    <p class="content_details-product">
                        <span class="content_details-product-title">
                            <?php echo $sp['mota']; ?>
                        </span>
                    </p>

                </div>
            </div>
        </form>
    </section>
    <section >
        <?php
        if (isset($_SESSION['makh'])) :
        ?>  
            <div class="mt-4 ml-5" >
                <?php
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $dt = new User;
                }
                ?>
                <p>Nhập bình luận:</p>
                <form action="index.php?action=home&act=binhluan&id=<?php echo $id; ?>" method="post">
                    <input type="hidden" name="txtmahh" value="<?php echo $id; ?>" />
                    <textarea class="input-field" type="text" name="comment" rows="2" cols="70" id="comment"></textarea><br>
                    <input type="submit" class="btn btn-primary"  value="Bình Luận" />
                </form>
                <br>
                <p>Các bình luận :</p>
                <?php
                $result = $dt->hienthibinhluan($id);
                while ($set = $result->fetch()) :
                ?>
                    <div class="comment_list">
                        <?php echo $set['noidung']; ?>
                    </div>
                    <div class="">
                        <?php echo $set['tenkh'] ?>
                    </div>
                <?php
                endwhile;
                ?>
            </div>
        <?php
        endif;
        ?>
    </section>
    <section id="Slider"></section>
    <!--footer------------------------------------------------------------------------------>

</div>