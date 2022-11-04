<?php
  class admin {
     var $maso=null;
     var $tennv=null;
     var $tendangnhap=null;
     var $matkhau=null;
     var $email=null;
     var $diachi=null;
     var $sdt=null;
     public function __construct()
     {
         
     }

     public function InsertAdmin($tennv,$tendangnhap,$matkhau,$email,$diachi,$sdt)
        {
          $db = new connect();
          $query = "insert into admin(maso,tennv,tendangnhap,matkhau,email,diachi,sdt)
              values(Null,:tennv,:tendangnhap,:matkhau,:email,:diachi,:sdt)";
          $stm = $db->execP($query);
          $stm->bindValue(':tennv', $tennv);
          $stm->bindValue(':tendangnhap', $tendangnhap);
          $stm->bindValue(':matkhau', $matkhau);
          $stm->bindValue(':email', $email);
          $stm->bindValue(':diachi', $diachi);
          $stm->bindValue(':sdt', $sdt);
          $stm->execute();
        }
    public function getListAdmin($username,$password){
            $db= new connect();
            $select="select * from admin where tendangnhap='$username' and matkhau='$password'";
            $result=$db->getList($select);
            $set=$result->fetch();
            return $set;
    }
    function getEmail($email)
        {
            $db=new connect();
            $select="select email,matkhau from khachhang1 where email='$email'";
            $result=$db->getInstance($select);
            return $result;
        }
    function getPassEmail($email,$pass) {
        $db=new connect();
        $select="select email,matkhau from khachhang1 where md5(email)='$email' and md5(matkhau)='$pass'";
        $result=$db->getInstance($select);
        return $result;
    }

    function updateEmail($emailold,$passnew)
    {
        $db=new connect();
        $query="update khachhang1 set matkhau='$passnew' where email='$emailold'";
        // echo $select;
       $db->exec($query);
    }
  }
