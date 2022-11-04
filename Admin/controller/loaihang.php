<?php
$action="loaihang";
    if(isset($_GET['act']))
    {
        $action=$_GET['act'];
    }

    switch($action)
    {
        case "loaihang":
            include "view/import.php";
            break;
        case "import_loaihang":
            if(isset($_POST['submit']))
            {
                //Bước 1 lấy 1 file từ server về, mà file up lên nó lưu trong $_FILES
                $file=$_FILES["file"]["tmp_name"];
                //Khi lấy về thì phải xóa những signature
                file_put_contents($file,str_replace("\xEF\xBB\xBF","",file_get_contents($file)));
                //Bước 2 mở file ra fopen r,w
                $file_open=fopen($file,"r");
                // Bước 3: đọc nội dung của file
                $hh=new HangHoa();
                while(($csv=fgetcsv($file_open,1000,','))!==false) {
                    //$csv=[null,dép quay kẹp, 6]
                    $mahh=$csv[0];
                    $tenhh=$csv[1];
                    $idmenu=$csv[2];
                    $hh->insertLoaiHang($mahh,$tenhh,$idmenu);
                }
                echo '<script> alert("Import thành công")</script>';
                break;

            }
    }
?>