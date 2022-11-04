<?php
$action="registration";
if(isset($_GET['act']))
{
    $action=$_GET['act'];
}
switch ($action) {
    case 'registration':
        include 'View/registration.php';
        break;
    
    case 'registration_action':
    
        if($_SERVER['REQUEST_METHOD']=='POST')//if($_POST['nop'])
        {
            $tenkh=$_POST['txtName'];
            $diachi=$_POST['txtAddress'];
            $sodt=$_POST['txtNumberPhone'];
            $username=$_POST['txtLogin'];
            $email=$_POST['txtEmail'];
            $password=$_POST['txtPass'];
            $cypt=md5($password);
            $ur=new User();
            $ur->InsertUser($tenkh, $username, $cypt, $email, $diachi, $sodt);
            echo '<script>alert("Đăng ký thành công");</script>';
            
        }
        include 'View/registration.php';
        break;
}
?>