<!-- code PHP -->
<?php 
include 'Model/connect.php';
include 'Model/hanghoa.php';
include 'Model/user.php';
include 'Model/giohang.php';
include 'Model/hoadon.php';
include 'Model/page.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script> -->
    <!--LIEN KRT ICON TRONG W3SCHOOL-->
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" href="./css/style.css">
    
    <title>Fashion Shop</title> 
</head>
<body>
    <!-- co PHP -->
    <!-- header -->
    <?php
        include "View/header.php";
        
      ?>
      <!-- hiên thi noi dung -->
      
                <?php
                $ctrl="home";
                if(isset($_GET['action']))
                {
                    $ctrl=$_GET['action'];
                }
                include 'Controller/'.$ctrl.'.php';
                ?>
       
    <!-- hiên thị footer -->
    <?php
        include "View/footer.php";
      ?>

</body>
</html>