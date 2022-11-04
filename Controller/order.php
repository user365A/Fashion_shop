<?php
$action="order";
if(isset($_GET['act']))
{
    $action=$_GET['act'];
}
switch ($action) {
    case 'order':
        include "View/payment.php";
        break;
    
    case 'order_detail':
    $hd=new HoaDon();
    $sohdid=$hd->insertOrder($_SESSION['makh']);
    $_SESSION['sohd']=$sohdid;
    $tongtien=0;
    foreach($_SESSION['cart'] as $key=>$item)
    {
        $hd->insertchitiethoadon($sohdid,$item['mahh'],$item['qty'],$item['mau'],$item['size'],$item['total']);
        $hd->update_soluongton($item['mahh'],$item['qty']);
        $tongtien+=$item['total'];
    }
    $hd->updateOrderTotal($sohdid,$tongtien);

    echo '<meta http-equiv="refresh" content="0;url=index.php?action=order"/>';
    break;
}


?>