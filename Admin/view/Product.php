
        <hr>
        <div class="container">
            
<div  class="col-md-4 coltext-center-md-offset-4"><h3 ><b>DANH SÁCH HÀNG HÓA</b></h3>
<div class="row col-12 text-center">
<a href="index.php?action=sanpham&act=insert" class=""><button class="btn btn-primary" ><h4>Thêm sản phẩm</h4></button></a>
</div>
<hr style="width:100%;text-align:left;margin-left:0">
</div>
    <div class="table_product">
        <table style="width: 100%;" >
        <?php
          $hh=new hanghoa();
          $res=$hh->getallHanghoa();
          while($set=$res->fetch()):

        ?>
            <tr>
              <th>Mã hàng hóa</th>
              <th>Tên hàng hóa</th>
              <th>Đơn giá</th>
              <th>Hình ảnh</th>
              <th>Size</th>
              <th>Màu sắc</th>
              <th>Mô tả</th>
              <th>Loại hàng</th>
              <th>Mã loại</th>
              <th>Giảm giá</th>
              <th>Số lượng tồn</th>
              <th>Cập Nhật</th>
              <th>Xóa</th>
            </tr>
            <tr>
              <td><?php echo $set['mahh'] ?></td>
              <td><?php echo $set['tenhh'] ?></td>
              <td><?php echo $set['dongia'] ?></td>
              <td><img src="content/image/<?php echo $set['hinh']?>" alt="" width="100px"></td>
              <td><?php echo $set['size'] ?></td>
              <td><?php echo $set['mausac'] ?></td>
              <td><?php echo $set['mota'] ?></td>
              <td><?php echo $set['loaihang'] ?></td>
              <td><?php echo $set['maloai'] ?></td>
              <td><?php echo $set['giamgia'] ?></td>
              <td><?php echo $set['soluongton'] ?></td>
              <td><a href="index.php?action=sanpham&act=update&id=<?php echo $set['mahh'] ?>">Cập nhật</a></td>
              <td><a href="index.php?action=sanpham&act=delete&id=<?php echo $set['mahh'] ?>">Xóa</a></td>
            </tr> 
            <?php
             endwhile;
            ?>         
        </table>
    </div>
  
        <!-- footer -->
    