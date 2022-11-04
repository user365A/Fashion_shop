<?php 
$action="login";
if(isset($_GET['act']))
{
    $action=$_GET['act'];
}
switch ($action) {
    case 'login':
        include 'view/Login_Admin.php';
        break;
    case 'login_action':
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $username=$_POST['txtusername'];
            $password=$_POST['txtpassword'];
            $mahoa=md5($password);
            $ur=new admin();
            $log=$ur->getListAdmin($username,$mahoa);
            if($log==true)
            {
                $_SESSION['maso']=$log['maso'];
                $_SESSION['tennv']=$log['tennv'];
                $_SESSION['tendangnhap']=$log['tendangnhap'];
                $_SESSION['matkhau']=$log['matkhau'];
                echo '<script> alert("Đăng nhập thành công");</script>';
                echo '<meta http-equiv="refresh" content="0;url=index.php?action=sanpham"/>';
            }
            else{
                echo '<script> alert(" Đăng nhập không thành công");</script>';
                include 'view/Login_Admin.php';
            }
        }
        break;
    case  'logout' :
        if(isset($_SESSION['maso'])&&isset($_SESSION['tennv']))
        {
        session_destroy();
        }
        echo '<meta http-equiv="refresh" content="0;url=index.php?action=login"/>';
        break;
}
?>