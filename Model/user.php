<?php
class User
{
    var $makh = 0;
    var $tenkh = null;
    var $username = null;
    var $email = null;
    var $matkhau = null;
    var $diachi = null;
    var $sodienthoai = null;
    public function __construct()
    {
    }
    public function InsertUser($tenkh, $username, $matkhau, $email, $diachi, $sodienthoai)
    {
        $db = new connect();
        $query = "insert into khachhang(makh,tenkh,username,matkhau,email,diachi,sodienthoai)
            values(Null,:tenkh,:username,:matkhau,:email,:diachi,:sodienthoai)";
        $stm = $db->execP($query); //Sử dụng prepare
        //Gán giá trị hoặc thuộc tính bindValue hoặc bindParam
        $stm->bindValue(':tenkh', $tenkh);
        $stm->bindValue(':username', $username);
        $stm->bindValue(':matkhau', $matkhau);
        $stm->bindValue(':email', $email);
        $stm->bindValue(':diachi', $diachi);
        $stm->bindValue(':sodienthoai', $sodienthoai);
        //bindParam sẽ nhận giá trị thông qua 1 tham số để mà tham chiếu 
        //Muốn prepare được thì execute
        $stm->execute();
    }
    public function getListUser($username, $password)
    {
        $db = new connect();
        $select = "select * from khachhang where username='$username' and matkhau='$password'";
        $result = $db->getList($select);
        $set = $result->fetch();
        return $set;
    }
    //phuong thuc dem cac binh luan
    public function dembinhluan($id)
    {
        $db = new connect();
        $select = "select count(mabl) from binhluan where mahh=$id";
        $result = $db->getInstance($select);
        return $result[0];
    }
    function insertBinhluan($mahh, $makh, $noidung)
    {
        $db = new connect();
        $date = new DateTime("now");
        $ngay = $date->format("Y-m-d");
        $select = "insert into binhluan(mabl,mahh,makh,ngaybl,noidung) values (NULL,$mahh,$makh,'$ngay','$noidung')";
        $result = $db->exec($select);
    }
    function hienthibinhluan($mahh)
    {
        $db = new connect();
        $select = "select a.tenkh,b.noidung from khachhang a inner join binhluan b on a.makh=b.makh 
            where b.mahh=$mahh";
        $result = $db->getList($select);
        return $result;
    }
}
