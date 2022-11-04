<?php
$action="registration";
if(isset($_GET['act']))
{
    $action=$_GET['act'];
}
switch ($action) {
    case 'registration':
        include 'view/registration.php';
        break;
    
    case 'registration_action':
    
        if($_SERVER['REQUEST_METHOD']=='POST')//if($_POST['nop'])
        {
            $tennv=$_POST['txtName'];
            $diachi=$_POST['txtAddress'];
            $sodt=$_POST['txtNumberPhone'];
            $username=$_POST['txtLogin'];
            $email=$_POST['txtEmail'];
            $password=$_POST['txtPass'];
            $mk=md5($password);
            $ur=new admin();
            $ur->InsertAdmin($tennv,$username,$mk,$email,$diachi,$sodt);
            echo '<script>alert("Đăng ký thành công");</script>';
        }
        include 'view/Login_Admin.php';
        break;
}
?>