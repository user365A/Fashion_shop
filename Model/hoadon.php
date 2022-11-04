<?php
class HoaDon{
    //thuoc tinh
    public function __construct()
    {
        
    }
    public function insertOrder($makh){
      $date=new DateTime("now");
      $ngay=$date->format("y-m-d");
      $db=new connect();
      $query="insert into hoadon(masohd,makh,ngaydat,tongtien) values(null,$makh,'$ngay',0)";
      $db->exec($query);
      $select="select masohd from hoadon order by masohd desc limit 1";
      $result=$db->getInstance($select);
      return $result[0];
    }
    public function insertchitiethoadon($masohd,$mahh,$soluong,$mausac,$size,$thanhtien){
        $db=new connect();
        $query="insert into cthoadon(masohd,mahh,soluongmua,mausac,size,thanhtien)
        values($masohd,$mahh,$soluong,'$mausac','$size',$thanhtien)";
        $db->exec($query);
    }
    function updateOrderTotal($masohd,$total)
    {
        $db=new connect();
        $query="update hoadon set tongtien=$total where masohd=$masohd";
        $db->exec($query);
    }
    function getOrder($sohdid){
        $db=new connect();
        $select="select b.masohd, a.tenkh,a.diachi,a.sodienthoai,b.ngaydat from khachhang a 
        inner join hoadon b on a.makh=b.makh where masohd=$sohdid";
        $result=$db->getInstance($select);
        return $result;
    }
    function getOrderDetail($sohdid)
    {
    $db=new connect();
    $select="select a.tenhh,a.dongia,b.mausac,b.size,b.soluongmua,b.thanhtien,a.hinh,a.mota,a.giamgia from hanghoa a inner join cthoadon b on a.mahh=b.mahh where  masohd=$sohdid";
    $result=$db->getList($select);
    return $result;
    }
    function update_soluongton($mahh,$soluong)
    {
        $db=new connect();
        $query="update hanghoa set soluongton=soluongton-$soluong where mahh=$mahh";
        $db->exec($query);
    }
}