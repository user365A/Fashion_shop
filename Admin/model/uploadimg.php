<?php
     function uploadimg(){
        $target_dir="../Admin/content/image/";
        //b2 lay ten file luu tren server
        $target_file=$target_dir.basename($_FILES['image']['name']);
        //b3 lay phan mo rong cua hinh ra va doi dang chu in hoa hoac thuong
        $imagefiletype=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        //b4 kiem tra khi nguoi dung nhan nut submit c dc upload len server k
        $uploadimg=1;
        if(isset($_POST['submit'])){
            $check=getimagesize($_FILES['image']['tmp_name']);
            if($check!=false){
             $uploadimg=1;
            }
            else {
                echo "Hinh khong duoc upload";
                $uploadimg=0;
            }
        }
        //kiem tra file da ton tai hay chua
        if(file_exists($target_file))
        {
            echo "file nay da ton tai ";
            $uploadimg=0;
        }
        // co vuot qua 500kb khong
        if($_FILES["image"]['size']>500000){
            echo "hinh vuot dung luong cho phep ";
            $uploadimg=0;
        }
        if($imagefiletype!="jpg"&&$imagefiletype!="png"&&$imagefiletype!="gif"){
         echo "hinh khong dung dinh dang ";
         $uploadimg=0;
     }
     //b5
     if($uploadimg==0){
         echo "Loi qua trinh upload";
     }
     else
     {
         if(move_uploaded_file($_FILES['image']['tmp_name'],$target_file))
         {
             
             echo "";
         }
         else
         echo "Fail";
     }
     }
?>