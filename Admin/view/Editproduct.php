<?php
   if(isset($_GET['act'])){
     if($_GET['act']=="insert")
     {
         $ac=1;
     }
     else if($_GET['act']=="update")
     {
       $ac=2;
     }
     else
     $ac=0;
   }
?>
   
        <hr>
        <div class="container">
     <h1 style="color: red;"></h1>     
<div class="row col-md-4 col-md-offset-4  edit_product" >
<?php 
   if($ac==1)
   {
     echo '<h2 style="color: red;"><b>Thêm Sản Phẩm</b></h2>';
   }
   else if($ac==2)
   {
    echo '<h2 style="color: red;"><b>Update sản phẩm</b></h2>';
   }
   else 
   echo '<h2 style="color: red;"><b>Không có sản phẩm</b></h2>';
?>
  <?php
      if(isset($_GET['id']))
      {
        $mahh=$_GET['id'];
        $hh=new HangHoa();
        $result=$hh->getHanghoaID($mahh);
        $tenhh=$result['tenhh'];
        $dongia=$result['dongia'];
        $giamgia=$result['giamgia'];
        $hinh=$result['hinh'];
        $maloai=$result['maloai'];
        $loaihang=$result['loaihang'];
        $mota=$result['mota'];
        $soluongton=$result['soluongton'];
        $mausac=$result['mausac'];
        $size=$result['size'];
        $hh=new HangHoa();
      $result=$hh->update_hanghoa($mahh,$tenhh,$dongia,$hinh,$size,$mausac,$mota,$loaihang,$maloai,$giamgia,$soluongton);
      }
      ?>
      <?php 
     if($ac==1)
     {
       echo '<form action="index.php?action=sanpham&act=insert_action" method="post" enctype="multipart/form-data">';
     }
     else if($ac==2)
     {
       echo '<form action="index.php?action=sanpham&act=update_action&id=<?php echo $mahh;?>" method="post" enctype="multipart/form-data">';
     }
  ?>
  
    <table class="table" style="border: 0px;">
      <tr>
        <td>Mã hàng</td>
        <td> <input type="text" name="mahh" value="<?php if(isset($mahh)) echo $mahh ?>" id="" required="" placeholder="Mã hàng" readonly><br></td>
      </tr>
      <tr>
        <td>Tên hàng</td>
        <td><input type="text" name="tenhh" value="<?php if(isset($tenhh)) echo $tenhh ?>" id="" required="" placeholder="Tên hàng" maxlength="100px"><br></td>
      </tr>
      <tr>
        <td>Đơn giá</td>
        <td><input type="text" name="dongia" value="<?php if(isset($dongia)) echo $dongia ?>" id="" required="" placeholder="Đơn giá"><br></td>
      </tr>
      <tr>
        <td>Hình ảnh</td>
        <td>
         
            <label><img width="50px" height="50px" src="content/image/<?php if(isset($hinh)) echo $hinh?>"></label>
            Chọn file để upload:
            <input type="file" name="image" value="" id="" required="" placeholder="Hình ảnh"><br>
         
        </td>
      </tr>
      <tr>
        <td>Size</td>
        <td>
            <input type="text" name="size" value="<?php if(isset($size)) echo $size?>" id="" required="" placeholder="Size"><br>
        </td>
      </tr>
      <tr>
          <td>Màu sắc</td>
        <td>
            <input type="text" name="mausac" value="<?php if(isset($mausac)) echo $mausac?>" id="" required="" placeholder="Màu sắc"><br>
        </td>
      </tr>
      <tr>
        <td>Mô tả</td>
        <td><input type="text" name="mota" value="<?php if(isset($mota)) echo $mota?>" id="" required="" placeholder="Mô tả"><br>
        </td>
      </tr>
      <tr>
        <td>Loại hàng</td>
        <td><input type="text" name="loaihang" value="" id="" required="" placeholder="Loại hàng"><br>
        </td>
      </tr>
      <tr>
        <td>Mã loại</td>
        <td>
        <select name="maloai" class="form-control" style="width:150px;">
            <?php 
            $selectloai=-1;
            if(isset($maloai)&&$maloai!=-1)
            {
              $selectloai=$maloai; 
            }
            $hh=new hanghoa();
            $result=$hh->getListmaloai(); 
            while($set=$result->fetch()):
            ?>
            <option value="<?php echo $set['maloai'] ?>" <?php if($selectloai==$set['maloai']) echo 'selected' ?>><?php echo $set['tenloai'] ?></option>
            <?php endwhile?>
          </select><br>
        </td>
      </tr>
      <tr>
        <td>Giảm giá</td>
        <td><input type="number" name="giamgia" value="<?php if(isset($giamgia)) echo $giamgia?>" id="" required="" placeholder="Giảm giá"><br>
        </td>
      </tr>
      <tr>
        <td>Số lượng tồn</td>
        <td><input type="number" name="soluongton" value="<?php if(isset($soluongton)) echo $soluongton?>" id="" required="" placeholder="Số lượng tồn"><br>
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <input type="submit" value="submit" name="submit">         
        </td>
      </tr>

    </table>
  </form>
</div>
        </div>
        <!-- footer -->
