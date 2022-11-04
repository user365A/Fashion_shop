<?php 

$action="giohang";
// neu 
if(!isset($_SESSION['cart']))
{
  $_SESSION['cart']=array();

}
if(isset($_GET['act'])){
    $action=$_GET['act'];
}
switch ($action) {
    case 'giohang':
        include 'View/cart.php';
        break;
    
    case 'add_cart' :
        if($_SERVER['REQUEST_METHOD']=='POST')
    {
      $mahh=$_POST['mahh'];
      $mausac=$_POST['mymausac'];
      $soluong=$_POST['soluong'];
      $size=$_POST['size'];
      add_item($mahh,$soluong,$mausac,$size);
      echo '<meta http-equiv="refresh" content="0;url=index.php?action=giohang"/>';
    }
    break;
    case 'delete_item' :
      if(isset($_GET['id']))
      {
        $key=$_GET['id'];
        unset($_SESSION['cart'][$key]);
        echo '<meta http-equiv="refresh" content="0;url=index.php?action=giohang"/>';
      }
    break;
    case 'update_cart' :
      //can chnh sua so luong
      $soluongnew=$_POST['newqty'];
      foreach($soluongnew as $key=>$qty)
      {
        if($_SESSION['cart'][$key]['qty']!=$qty)
        {
          update_item($key,$qty);
        }
      }
      echo '<meta http-equiv="refresh" content="0;url=index.php?action=giohang"/>';
      
    break;   

}

?>