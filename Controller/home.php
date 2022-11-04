<?php

$action = "home";
if (isset($_GET['act'])) {
  $action = $_GET['act'];
}
switch ($action) {
  case 'home':
    include 'View/home.php';
    break;
  case 'cartegory':
    include 'View/cartegory.php';
    break;
  case 'detail':
    include 'View/product_details.php';
    break;
  case 'timkiem':
    include 'View/cartegory.php';
    break;
  case 'binhluan':
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if($_POST['comment']!="")
      {
      $mahh = $_POST['txtmahh'];
      $noidung = $_POST['comment'];
      $makh = $_SESSION['makh'];
      $u = new User();
      $u->insertBinhluan($mahh, $makh, $noidung);
      }
      include 'View/product_details.php';
    }
    break;
  case 'sapxep':
      include 'View/cartegory.php';  
    break;
}
