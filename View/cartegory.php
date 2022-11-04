<!-- // -->
<!-- <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/cartegory.css"> -->
<?php
   
   if(isset($_GET['loaihang'])||isset($_GET['tenloai'])){

   $hh=new HangHoa();
   if(isset($_GET['loaihang']))
   {
    $results=$hh->getListHangHoa($_GET['loaihang']);
   }
   else if(isset($_GET['tenloai']))
   {
    $results=$hh->getListHangHoa_tenloai($_GET['tenloai']); 
   }
   $count=$results->rowCount();//14
   //Quy định mỗi trang là bao nhiêu sản phẩm
   $limit=8;
   $p=new Page();
   $current_page=isset($_GET['page'])?$_GET['page']:1;
   $page=$p->findPage($count,$limit);
   $start=$p->findStart($limit);
}
   
?>
<div class="container-fluid">
    <!--cartegory--------------------------------------------------------------------------->
    <section class="cartegory ">
        <div class="cartegory_container">
            <div class="cartegory_top row">
                <p><a href="">Trang chủ</a></p><span>&#8594;</span>
                <p><a href="">Nữ</a></p><span>&#8594;</span>
                <p><a href="">Hàng nữ mới về</a></p>
            </div>
        </div>
        <div class="cartegory_container cartegory_container-left-all">
            <div class="row">
                <div class="cartegory_container-left">
                    <ul>
                        <li class="cartegory_left-item "><a class="cartegory_left-item-title" href="">Nữ</a>
                            <ul class="cartegory_left-item-list">
                                <li><a href="">Hàng nữ mới về</a></li>
                                <li><a href="">COLLECTION</a></li>
                                <li><a href="">ESSENTIAL SWEATSUIT</a></li>
                                <li><a href="">LIKE A GODDESS</a></li>
                            </ul>
                        </li>
                        <li class="cartegory_left-item "><a class="cartegory_left-item-title" href="">Nam</a>
                            <ul class="cartegory_left-item-list">
                                <li><a href="">Hàng nam mới về</a></li>
                                <li><a href="">NEW POLO FOR MEN</a></li>
                                <li><a href="">ESSENTIAL SWEATSUIT</a></li>
                                <li><a href="">SAFE ZONE</a></li>
                            </ul>
                        </li>
                        <li class="cartegory_left-item"><a class="cartegory_left-item-title" href="">Trẻ em</a>
                            <ul class="cartegory_left-item-list">
                                <li><a href="">Hàng nam mới về</a></li>
                                <li><a href="">NEW POLO FOR MEN</a></li>
                                <li><a href="">ESSENTIAL SWEATSUIT</a></li>
                                <li><a href="">SAFE ZONE</a></li>
                            </ul>
                        </li>
                        <li class="cartegory_left-item"><a class="cartegory_left-item-title" href="">Bộ sưu tập</a>
                            <ul class="cartegory_left-item-list">
                                <li><a href="">Hàng nam mới về</a></li>
                                <li><a href="">NEW POLO FOR MEN</a></li>
                                <li><a href="">ESSENTIAL SWEATSUIT</a></li>
                                <li><a href="">SAFE ZONE</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <?php
                    $ac="";
                    if (isset($_GET['loaihang'])) //khuyenmai
                    {
                        
                        if ($_GET['loaihang'] == "nu") {
                            $ac = "Nữ";
                        } else if ($_GET['loaihang'] == "nam") {
                            $ac = "Nam";
                        } else if ($_GET['loaihang'] == "treem") {
                            $ac = "Trẻ Em";
                        }else if ($_GET['loaihang'] == "khuyenmai") {
                        $ac = "Khuyến Mãi";
                    }
                    }
                    ?>
                <div class="cartegory_container-right row">
                    <div class="cartegory_container-right-top-item">
                        <?php if($ac=='Khuyến Mãi')
                              echo '<p>Sản phẩm '.$ac.'</p>';
                              else
                              echo '<p>Hàng '.$ac.' Mới Về</p>'
                        ?>
                    </div>
                    <div class="cartegory_container-right-top-item">
                        <button><span>Bộ lọc</span><i class="fas fa-sort-down"></i></button>

                    </div>
                    <div class="cartegory_container-right-top-item">
                        <?php
                            if(isset($_GET['loaihang']))
                            {
                        ?>
                        <a style="color: red;font-size:small" href="index.php?action=home&act=sapxep&kieusx=desc&loaihang=<?php echo $_GET['loaihang'] ?>"><option  value="DESC">Giá cao đến thấp</option></a>  
                        <a style="color: red;font-size:small" href="index.php?action=home&act=sapxep&kieusx=asc&loaihang=<?php echo $_GET['loaihang'] ?>"><option  value="ASC">Giá thấp đến cao</option></a>
                        <?php 
                            }
                        ?>
                    </div>
                    
                    <div class="cartegory_container-right-list row">
                    <?php
                    
                        if(isset($_GET['loaihang'])||isset($_GET['tenloai']))
                    {
                         $hh=new Hanghoa();
                         if(isset($_GET['kieusx'])&&isset($_GET['loaihang']))
                         {
                             if($_GET['kieusx']=='desc')
                             {
                                $result=$hh->sapxepgiam($start,$limit,$_GET['loaihang']);
                             }
                             else{
                                $result=$hh->sapxeptang($start,$limit,$_GET['loaihang']);
                             }
                         }
                         else if($_GET['act'] == "timkiem")
                         {
                            if(isset($_POST['timkiem'])){
                                $tentk=$_POST['timkiem'];
                                $results = $hh->Timkiem($tentk);
                            }
                         }
                         else if(isset($_GET['loaihang']))
                         {

                         $result=$hh->getListHanghoaPage($start,$limit,$_GET['loaihang']);
                         }
                         else if(isset($_GET['tenloai']))
                         {
                            $result=$hh->getListHanghoaPage_tenloai($start,$limit,$_GET['tenloai']);  
                         }

                         while($set=$result->fetch()):
                    ?>
                        <div class="cartegory_container-right-item">
                            <img src="<?php echo 'Admin/content/image/' . $set['hinh']; ?>" alt="">
                            <h2 class="cartegory_container-item-title"><a href="index.php?action=home&act=detail&id=<?php echo $set['mahh']; ?>"><?php echo $set['tenhh']?></a></h2>
                            <?php
                             if($set['giamgia']==0):
                            ?>
                            <p class="cartegory_container-item-price"><?php echo  number_format($set['dongia']); ?><sub>đ</sub></p>
                            <?php 
                            else:
                            ?>
                            <p class="cartegory_container-item-price-sale"><del><?php echo  number_format($set['dongia']); ?></del><sub>đ</sub></p>
                            <p class="cartegory_container-item-price">Giảm còn:<?php echo  number_format($set['dongia']-$set['giamgia']); ?><sub>đ</sub></p>
                            <?php
                            endif;
                            ?>
                        </div>
                    <?php
                        endwhile;
                    ?>
                    </div>
                    <?php } ?>
                    <?php 
                    if(isset($_GET['loaihang']))
                    {
                        $loaihang=$_GET['loaihang'];
                    }
                    
                    ?>
                    <div class="cartegory-right-botton row">
                        <div class="cartegory-right-botton-item">
                            <span class="cartegory-right-botton-item-title">Hiển thị <a href=""><b>2</b></a> | <a href=""><b>4 </b></a>sản phẩm</span>
                        </div>
                        <div class="cartegory-right-botton_list">
                            
                            <?php
                                if(isset($current_page)&&isset($page))
                            {
                                if($current_page>1&& $page>1)
                                {
                            ?>     
                            <li class="cartegory-right-botton_list-item"><a href="index.php?action=home&act=cartegory&loaihang=<?php echo $loaihang; ?>&page=<?php echo ($current_page-1) ?>">&#171;</a></li>   
                            <?php
                                }    
                            ?>
                            <?php
                                for($i=1;$i<=3;$i++){
                            ?>
                            <li class="cartegory-right-botton_list-item"><a href="index.php?action=home&act=cartegory&loaihang=<?php echo $loaihang; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                            <?php
                                }
                            ?>
                            <?php
                                if($current_page<$page&&$page>1)
                                {
                            ?>     
                            <li class="cartegory-right-botton_list-item"><a href="index.php?action=home&act=cartegory&loaihang=<?php echo $loaihang; ?>&page=<?php echo ($current_page+1) ?>">&#187;</a></li>   
                            <?php
                                }    
                            ?>
                            <li class="cartegory-right-botton_list-item"><a href="index.php?action=home&act=cartegory&loaihang=<?php echo $loaihang; ?>&page=<?php echo $page ?>">Trang cuối</a>
                            
                            </li>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </section>
    <section id="Slider"></section>
    <!--footer------------------------------------------------------------------------------>
</div>
<script src="../javascript/main.js">
</script>