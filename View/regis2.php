<!-- 
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/registration.css"> -->
        <br><br>
<hr>
<div class="container">
    <div class="center">
        <div class="center_title">
            <p>
                Your Information
            </p>
        </div>
        <div class="center_form">
            <!-- Kiem tra du lieu nhap vao form -->
            <?php
            //khai bao bien
            $address = $name = $email = $phone = $password = $user = "";
            $nameERR = $addressERR = $emailERR = $phoneERR = $passwordERR = $userERR = "";
            // kiem tra
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST["txtName"])) {
                    $nameERR = "ko duoc rong";
                } else { // co nha thi kiem tra nhap dung hay sai
                    $name = test_input($_POST["txtName"]);
                    if (!preg_match("/^[a-zA-Z]*$/", $name)) {
                        $nameERR = "Ten nhap sai";
                    }
                }
                if (empty($_POST["txtAddress"])) {
                    $addressERR = "ko duoc rong";
                } else { // co nha thi kiem tra nhap dung hay sai
                    $address = test_input($_POST["txtAddress"]);
                    if (!preg_match("/^[a-zA-Z]*$/", $address)) {
                        $addressERR = "Ten nhap sai";
                    }
                }
                if (empty($_POST["txtEmail"])) {
                    $emailERR = "ko duoc rong";
                } else { // co nha thi kiem tra nhap dung hay sai
                    $email = test_input($_POST["txtEmail"]);
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $emailERR = "email nhap sai";
                    }
                }
                if (empty($_POST["txtNumberPhone"])) {
                    $phoneERR = "ko duoc rong";
                } else { // co nha thi kiem tra nhap dung hay sai
                    $phone = test_input($_POST["txtNumberPhone"]);
                    if (!preg_match("/^[0]{1}[\d]{9,10}$/", $phone)) {
                        $phoneERR = "Dien thoai nhap sai";
                    }
                }
                if (empty($_POST["txtPass"])) {
                    $passwordERR = "ko duoc rong";
                } else { // co nha thi kiem tra nhap dung hay sai
                    $password = test_input($_POST["txtPass"]);
                    if (!preg_match("/^[A-Z]([\w\.@#!$%^*()]+){6,}$/", $password)) {
                        $passwordERR = "Password nhap sai";
                    }
                }
                if (empty($_POST["txtLogin"])) {
                    $userERR = "ko duoc rong";
                } else { // co nha thi kiem tra nhap dung hay sai
                    $user = test_input($_POST["txtLogin"]);
                    if (!preg_match("/^[a-zA-Z]*$/", $user)) {
                        $userERR = "Ten dang nhap sai";
                    }
                }
            }
            function test_input($data)
            {
                $data = trim($data);
                $data = stripcslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post" target="_self">
                <input type="text" name="txtName" value="" id="" required="" placeholder="Tên của bạn">
                <span class="error">*<?php if(isset($nameERR)) echo $nameERR; ?></span><br>
                <input type="text" name="txtAddress" value="" id="" required="" placeholder="Địa chỉ">
                <span class="error">*<?php if(isset($addressERR)) echo $addressERR; ?></span><br>
                <input type="text" name="txtNumberPhone" value="" id="" required="" placeholder="Số điện thoại">
                <span class="error">*<?php if(isset($phoneERR)) echo $phoneERR; ?></span><br>
                <input type="email" name="txtEmail" value="" id="" required="" placeholder="Email">
                <span class="error">*<?php if(isset($emailERR)) echo $emailERR; ?></span><br>
                <input type="text" name="txtLogin" value="" id="" required="" placeholder="Tên đăng nhập">
                <span class="error">*<?php if(isset($userERR)) echo $userERR; ?></span><br>
                <input type="password" name="txtPass" value="" id="" required="" placeholder="Password">
                <span class="error">*<?php if(isset($passwordERR)) echo $passwordERR; ?></span><br><br>
                <button type="submit" class="login" name="submit"><a href="index.php?action=registration&act=registration_action">Đăng ký</a></button>
            </form>


        </div>
    </div>
</div>
<!-- footer -->