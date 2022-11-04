<?php 
$action="login";
if(isset($_GET['act']))
{
    $action=$_GET['act'];
}
switch ($action) {
    case 'login':
        include 'View/login.php';
        break;
    case 'login_action':
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $username=$_POST['txtusername'];
            $password=$_POST['txtpassword'];
            $mahoa=md5($password);
            $ur=new User();
            $log=$ur->getListUser($username,$mahoa);
            if($log==true)
            {
                $_SESSION['makh']=$log['makh'];
                $_SESSION['tenkh']=$log['tenkh'];
                $_SESSION['username']=$log['username'];
                $_SESSION['matkhau']=$log['matkhau'];
                $_SESSION['email']=$log['email'];
                $_SESSION['diachi']=$log['diachi'];
                $_SESSION['sodienthoai']=$log['sodienthoai'];
                echo '<script> alert("Đăng nhập thành công");</script>';
                echo '<meta http-equiv="refresh" content="0;url=index.php?action=home"/>';
            }
            else{
                echo '<script> alert(" Đăng nhập không thành công");</script>';
                include 'View/login.php';
            }
        }
        break;
        case  'logout' :
        if(isset($_SESSION['makh'])&&isset($_SESSION['tenkh']))
        {
      unset( $_SESSION['makh']);
      unset( $_SESSION['tenkh']);
      unset( $_SESSION['username']);
      unset( $_SESSION['matkhau']);
      unset( $_SESSION['email']);
      unset( $_SESSION['diachi']);
      unset( $_SESSION['sodienthoai']);
      
        }
        echo '<meta http-equiv="refresh" content="0;url=index.php?action=home"/>';
        break;
}