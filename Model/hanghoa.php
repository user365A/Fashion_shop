<?php
class Hanghoa{
    // Cac thuoc tinh
    var $mahh=null;
    var $tenhh=null;
    var $dongia=0;
    var $hinh="img/";
    var $size=null;
    var $mausac=null;
    var $mota="";
    var $loaihang=null;
    var $maloai=0;
    var $giamgia=0;
    var $soluongton=null;
    public function __construct()
    {
        
    }
    function getListSanpham($loaihang){
        $db=new connect();
        $select="SELECT * FROM hanghoa WHERE loaihang='$loaihang' ORDER by mahh DESC limit 8 ";
        $result=$db->getList($select);
        return $result;
    }
    function getListHangHoa($loaihang)
  {
    $db=new connect();
    $select="select * from hanghoa where loaihang='$loaihang'";
    // yếu cầu bên lớp connect thực thi và trả về nhiều row
    $result=$db->getList($select);
    return $result;

  }
    // phuong thuc tra ve thong tin chi tiet cua san pham
    function chitiethanghoa($id){
    
        $db=new connect();
        $select="select * from hanghoa where mahh=$id";
        $result=$db->getInstance($select);
        return $result;
      }
    //phuong thuc lay kich co cua san pham
    function getSize($maloai){
        $db=new connect();
        $select="select distinct size from hanghoa where maloai=$maloai order by size";
        $result=$db->getList($select);
        return $result;
    }
    // phuong thuc lay mau sac cua san pham
    function getColor($maloai){
        $db=new connect();
        $select="select distinct mausac from hanghoa where maloai=$maloai";
        $result=$db->getList($select);
        return $result;
    }
    // phuong thuc phan trang cho san pham
    function getListHanghoaPage($start,$limit,$loaihang){
        $db=new connect();
        $select="select * from hanghoa where loaihang='$loaihang' ORDER by mahh DESC limit ".$start.",".$limit."";
        $result=$db->getList($select);
        return $result;
       }
    function getListHanghoaPage_tenloai($start,$limit,$tenloai){
        $db=new connect();
        $select="select a.mahh, a.tenhh, a.dongia, a.hinh, a.size, a.mausac, a.mota, a.loaihang, a.maloai, a.giamgia, a.soluongton from hanghoa a inner join loai b on a.maloai=b.maloai where b.tenloai='$tenloai' ORDER by mahh DESC limit ".$start.",".$limit."";
        $result=$db->getList($select);
        return $result;
    }
    // ham tim kiem san pham
    function Timkiem($name){
        $db=new connect();
        $select="select * from hanghoa where tenhh like :tenhh";
        $stm=$db->execP($select);
        $stm->bindValue(':tenhh',"%".$name."%");
        $stm->execute();
        return $stm;
       }
       function sapxepgiam($start,$limit,$loaihang)
       {
         $db=new connect();
         $select="select * from hanghoa where loaihang='$loaihang' order by dongia DESC limit ".$start.",".$limit."";
         // yếu cầu bên lớp connect thực thi và trả về nhiều row
         $result=$db->getList($select);
         return $result;
     
       }
       function sapxeptang($start,$limit,$loaihang)
       {
         $db=new connect();
         $select="select * from hanghoa where loaihang='$loaihang' order by dongia ASC limit ".$start.",".$limit."";
         // yếu cầu bên lớp connect thực thi và trả về nhiều row
         $result=$db->getList($select);
         return $result;
       }
       function getlist_menu()
         {
          $db=new connect();
          $select="select * from menu ";
          $result=$db->getList($select);
          return $result;
         }
         function getlist_tenloai($idmenu)
         {
          $db=new connect();
          $select="select a.tenloai,b.name from loai a inner join menu b on a.idmenu=b.idmenu where a.idmenu=$idmenu";
          $result=$db->getList($select);
          return $result;
         }
         function getListHangHoa_tenloai($tenloai)
         {
           $db=new connect();
           $select="select a.mahh, a.tenhh, a.dongia, a.hinh, a.size, a.mausac, a.mota, a.loaihang, a.maloai, a.giamgia, a.soluongton from hanghoa a inner join loai b on a.maloai=b.maloai where b.tenloai='$tenloai'";
           $result=$db->getList($select);
           return $result;
         }
}
