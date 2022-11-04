<!-- // -->
<!-- <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/cart.css"> -->
<div class="container-fluid">
    <!--cart--------------------------------------------------------------------------->
    <?php

    ?>

    <section class="cartegory">

        <div class="container">
            <?php
            if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) :
                echo '<script> alert("Giỏ hàng của bạn chưa có món hàng nào");</script>';

            ?>
                <!-- truong hop khong sp -->
                <div class="product_noproduct">
                    <div class="product_cart-empty">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <h5 class="product_empty">Bạn chưa chọn sản phẩm</h5>
                    <h5 class="product_back"><a href="index.php?action=home">
                            << Quay lại trang chủ ?</a>
                    </h5>
                </div>
            <?php
            else :
            ?>
                <!-- truong hop co san pham -->
                <div class="product row">
                    <div class="product_detail">
                        <form action="index.php?action=giohang&act=update_cart" method="post">
                            <table>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Đơn giá</th>
                                    <th>Màu</th>
                                    <th>Size</th>
                                    <th>SL</th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                                <?php
                                $i = 0;
                                foreach ($_SESSION['cart'] as $key => $item) :
                                    $i++;
                                ?>
                                    <tr>
                                        <td><img src="Admin/content/image/<?php echo $item['hinh']; ?>" alt=""></td>
                                        <td><?php echo $item['name'] ?></td>
                                        <td><?php echo number_format($item['cost'] - $item['giamgia']); ?></td>
                                        <td><?php echo $item['mau'] ?></td>
                                        <td><?php echo $item['size'] ?></td>
                                        <td><input type="number" style="width: 40px;" name="newqty[<?php echo $item['mahh'] ?>]" value="<?php echo $item['qty']; ?>"></td>
                                        <td><button type="submit" class=""><i class="fas fa-pen"></i></button></td>
                                        <td><a href="index.php?action=giohang&act=delete_item&id=<?php echo $item['mahh']; ?>"><button type="button" id="button_remove" value=""><i class="fas fa-times"></i></button></a></td>

                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </form>
                    </div>
                    <div class="product_address">
                        <p class="product_address-title">Tổng tiền giỏ hàng</p>
                        <table style="width: 100%;">
                            <tbody>
                                <tr>
                                    <td>
                                        Tổng sản phẩm
                                    </td>
                                    <td>
                                        <?php
                                        $dem = 0;
                                        if (isset($_SESSION['cart'])) {
                                            $dem = count($_SESSION['cart']);
                                        }
                                        ?>
                                        <?php echo $dem; ?>
                                    </td>
                                </tr>
                                <tr class="line_table">
                                    <td>
                                        Thành tiền
                                    </td>
                                    <td>
                                        <?php
                                        foreach ($_SESSION['cart'] as $key => $items) :
                                        ?>
                                            <?php echo $items['total'] . "<br>" ?>
                                        <?php endforeach; ?>
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                        <table style="width: 100%;">
                            <tbody>
                                <tr>
                                    <td>
                                        Tổng hóa đơn
                                    </td>
                                    <td>
                                        <?php echo get_tongtien() . " VND"; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <?php
                        if (isset($_SESSION['makh'])) {
                        ?>
                            <div class="product_payment">

                                <p class="product_address-payment">Bạn sẽ thanh toán ở đây</p>
                                <a class="" href="index.php?action=order&act=order_detail" id="button_payment"><i class="fas fa-dollar-sign"></i>Thanh toán</a>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            <?php
            endif;
            ?>
        </div>


    </section>
    <section id="Slider"></section>
    <!--footer------------------------------------------------------------------------------>
</div>
<script src="../javascript/main.js">
</script>