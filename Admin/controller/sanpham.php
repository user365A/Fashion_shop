<?php 
     $action="sanpham";
     if(isset($_GET['act']))
     {
         $action=$_GET['act'];
     }
     switch ($action) {
         case 'sanpham':
             include "view/Product.php";
             break;
         case 'insert':
            include "view/Editproduct.php";
            break;
        case 'insert_action':
            if(isset($_POST['submit']))
            {
                $mahh=$_POST['mahh'];
                $tenhh=$_POST['tenhh'];
                $dongia=$_POST['dongia'];
                $giamgia=$_POST['giamgia'];
                $hinh=$_FILES['image']['name'];
                $maloai=$_POST['maloai'];
                $loaihang=$_POST['loaihang'];
                $mota=$_POST['mota'];
                $soluongton=$_POST['soluongton'];
                $mausac=$_POST['mausac'];
                $size=$_POST['size'];
            }
            $hh=new hanghoa();
            $hh->inserthanghoa($tenhh,$dongia,$hinh,$size,$mausac,$mota,$loaihang,$maloai,$giamgia,$soluongton);
            if(isset($hh)){
                uploadimg();
                echo "<script>alert('Them thanh cong!!!')</script>";
            }
            include "view/Product.php";
            break;
            case 'update':
                include "view/Editproduct.php";
                break; 
            case 'update_action':
               
                if(isset($_POST['submit']))
                {
                    $id=$_POST['mahh'];
                    $tenhh=$_POST['tenhh'];
                    $dongia=$_POST['dongia'];
                    $hinh=$_FILES['image']['name'];
                    $giamgia=$_POST['giamgia'];
                    $mausac=$_POST['mausac'];
                    $size=$_POST['size'];
                    $loaihang=$_POST['loaihang'];
                    $maloai=$_POST['maloai'];
                    $mota=$_POST['mota'];
                    $soluongton=$_POST['soluongton'];
                    
                    
                }
                $hh=new hanghoa();
                $hh->update_hanghoa($id,$tenhh,$dongia,$hinh,$size,$mausac,$mota,$loaihang,$maloai,$giamgia,$soluongton);
                if(isset($hh)){
                    uploadimg();
                    echo "<script>alert('Update successful !!!')</script>";
                }
                include "view/Product.php";
                break;
            case 'delete':
                if(isset($_GET['id']))
                {
                    $mahh=$_GET['id'];
                    $hh=new hanghoa();
                    $hh->delete_cthoadon($mahh);
                    $hh->delete_hanghoa($mahh);
                    
                    echo "<script>alert('Delete successful !!!')</script>";
                }
                include "view/Product.php";
                break;
               
     }