

    <!-- /// -->
    <!-- <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/payment.css"> -->
<!-- Kiem tra dang nhap chua -->
<?php
if(!isset($_SESSION['makh'])||count($_SESSION['cart'])==0)
{
  echo '<script>alert("Ban chua dang nhap")</script>';
   echo '<meta http-equiv="refresh" content="0;url=index.php?action=login"/>';
}
else{

?> 
    <div class="container-fluid">
        <!--cartegory--------------------------------------------------------------------------->
        <section class="payment">
        <?php
        $hd=new HoaDon();
        if(isset($_SESSION['sohd']))
        {
          $result=$hd->getOrder($_SESSION['sohd']);
        }
      ?>
            <p class="payment_title">Thông Tin Hóa Đơn Của Bạn</p>
            <div class="payment_app">
                <div class="payment_left">
                    <p class="payment_left-title">Thông tin của bạn</p>
                    <table style="width: 100%;">
                        <tbody>
                            <tr class="line_table">
                                <td>
                                    Ngày đặt:        
                                </td>
                                <td>
                                <?php echo $result[4]; ?>
                                </td>    
                            </tr>
                            <tr class="line_table">
                                <td>
                                    Họ và Tên:           
                                </td>
                                <td>
                                    <?php echo $result[1]; ?>
                                </td>  
                            </tr>
                            <tr class="line_table">
                                <td>
                                    Địa chỉ:            
                                </td>
                                <td>
                                <?php echo $result[2]; ?>
                                </td>    
                            </tr>
                            <tr class="line_table">
                                <td>
                                    Số điện thoại:            
                                </td>
                                <td>
                                <?php echo $result[3]; ?>
                                </td>    
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
               
                <div class="payment_right">
                 <table style="width: 100%;">
                     <tr class="line_table">
                         <th class="payment_right-list">Tên sản phẩm</th>
                         <th class="payment_right-list">Số lượng</th>
                         <th class="payment_right-list">Thành tiền</th>
                     </tr>
                     <?php 
               $results=$hd->getOrderDetail($_SESSION['sohd']);
               // do trả về nhiều hàng hóa, nên dùng while
               while($set=$results->fetch()):
                    ?>
                     <tr>
                         <td><?php  echo $set['tenhh']?></td>
                         <td><?php  echo $set['soluongmua']?></td>
                         <td><?php  echo $set['soluongmua']*($set['dongia']-$set['giamgia'])?></td>
                    </tr>
                <?php
                 endwhile;
                ?>
                 </table>
                 <table style="width: 100%;">
                    <tbody>
                        <tr class="line_table">
                            <td class="payment_right-list-bottom">
                               Tổng tiền hàng:           
                            </td>
                            
                            <td class="paymet_right-item">
                         <b><span style="color: red;"><?php echo get_tongtien() ?><sub>đ</sub></span></b>
                            </td>  
                        </tr>
                    </tbody>
                </table>
                </div>
                
            </div>
        </section>
        <section id="Slider"></section>
        <!--footer------------------------------------------------------------------------------>
    </div>
<?php 
  }
?>   
    <script src="../javascript/main.js">
    </script>
