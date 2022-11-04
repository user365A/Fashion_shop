<?php
 class hanghoa{
     public function __construct()
     {
         
     }
     function getallHanghoa(){
         $db=new connect();
         $select="select * from hanghoa";
         $result=$db->getList($select);
         return $result;
     }
     function getListmaloai(){
        $db=new connect();
        $select="select maloai,tenloai from loai";
        $result=$db->getList($select);
        return $result;
     }
     function inserthanghoa($tenhh,$dongia,$hinh,$size,$mausac,$mota,$loaihang,$maloai,$giamgia,$soluongton){
        $db=new connect();
        $query="insert into hanghoa(mahh,tenhh,dongia,hinh,size,mausac,mota,loaihang,maloai,giamgia,soluongton)
        values(NULL,'$tenhh',$dongia,'$hinh','$size','$mausac','$mota','$loaihang',$maloai,$giamgia,$soluongton)";
        $db->exec($query);
     }
     function getHanghoaID($id)
     {
         $db=new connect();
         $select="select * from hanghoa where mahh=$id";
         $result=$db->getInstance($select);
         return $result;
     }
     function update_hanghoa($id,$tenhh,$dongia,$hinh,$size,$mausac,$mota,$loaihang,$maloai,$giamgia,$soluongton){
         $db=new connect();
         $query="update hanghoa set tenhh='$tenhh',dongia=$dongia,giamgia=$giamgia,hinh='$hinh', loaihang='$loaihang' ,maloai=$maloai,mota='$mota',soluongton=$soluongton,mausac='$mausac', size='$size' where mahh=$id";
         $db->exec($query);
     }
     function delete_hanghoa($id){
         $db=new connect();
         $query="delete from hanghoa where mahh=$id";
         $db->exec($query);
     }

     function insertLoaiHang($id,$tenloai,$idmenu){
         $db=new connect();
         $query="insert into loai(maloai,tenloai,idmenu) values (
             $id,'$tenloai',$idmenu)";
         $db->exec($query);
     }
     function getListHangHoa_thongke()
    {
        $db = new connect();
        $select = "SELECT a.mahh,a.tenhh,sum(soluongmua) as soluongban from hanghoa a INNER join cthoadon b on a.mahh=b.mahh GROUP by a.mahh,a.tenhh";
        $result = $db->getList($select);
        return $result;
    }
    function delete_cthoadon($mahh)
    {
        $db=new connect();
        $query="delete from cthoadon where mahh=$mahh";
        $db->exec($query); 
    }
 }
?>