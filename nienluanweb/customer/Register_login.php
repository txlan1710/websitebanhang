<?php
session_start();
?>

<?php
    require_once '../admin/customer/connection.php';
    $nameErr = $emailErr = $phoneErr = $passErr ="";
    if (isset($_POST['btn-register'])) {

    //input databse to form
        $dbname = $_POST['Name'];
        $dbemail = $_POST['Email'];
        $dbphone = $_POST['phone'];
        $dbpass = $_POST['pass'];
        // connect database
        if(empty($dbname)){
            $nameErr = "Vui lòng nhập tên đi bà ơi";
        }
        if (empty($dbemail)) {
            $emailErr = "Vui lòng nhập email";
        }

        if (empty($dbphone)) {
            $phoneErr = "Vui lòng nhập số điện thoại";
        }

        if (empty($dbpass) ) {
            $passErr = "Vui lòng nhập mật khẩu";
        }
        
        if( empty($nameErr)  && empty($emailErr) && empty($phoneErr)  && empty($passErr) ) {
            $addsql = "INSERT INTO `CUSTOMERS` (`C_NAME`, `C_EMAIL`, `C_PASSWORD`, `C_PHONE`) VALUES
        ('$dbname', '$dbemail', '$dbpass', '$dbphone')";
            $query = mysqli_query($conn, $addsql);
            if($query) {
                header('location: trangchu.php');
            }
    }
    }
    ?>

<?php
    $emailErr_L = $passErr_L = $checkErr_L = "" ;
    if (isset($_POST['btn-login'])) {

    //input databse to form
        $db_lEmail  = $_POST['Email_login'];
        $db_lPass = $_POST['Pass_login'];
        if($_POST['Email_login'] == null){
            $emailErr_L = "Vui lòng nhập email";
        }else {
            $emailErr_L = '';
        }
        if($_POST['Pass_login'] == null) {
            $passErr_L = "Vui lòng nhập password";
        }else {
            $passErr_L = '';
        }
        
        if($db_lEmail != null && $db_lPass != null){
            
        
            $loginsql = "SELECT * FROM CUSTOMERS WHERE C_EMAIL = '$db_lEmail' and C_PASSWORD = '$db_lPass'";
            $query = mysqli_query($conn, $loginsql);
            if(mysqli_num_rows($query) == 0) {
                $checkErr_L = "email và password không hợp lệ vui lòng kiểm tra lại";
            }else {
                $checkErr_L = "Thành công";
                $_SESSION['username'] = $username;
                header("location:Home.php");
        }
        }
    }
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Double Slider Login / Registration Form</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/Register.css" />
    <link rel="shortcut icon" href="#" type="image/x-icon" />
</head>

<body>
    <div class="container" id="container">
        <div class="form-container register-container">
            <form action="Register_login.php" name="register" method="post">
                <h1>Đăng ký</h1>
                <input id="inputName" name="Name" type="text" placeholder="Tên đăng ký" />
                <p id="errorName" class="error"><?php echo $nameErr;?></p>
                <input id="inputEmail" name="Email" type="email" placeholder="Email" />
                <p id="errorName" class="error"><?php echo $emailErr;?></p>
                <input id="inputPhone" name="phone" type="number" placeholder="Số điện thoại" />
                <p id="errorPhone" class="error"><?php echo $phoneErr;?></span></p>
                <input id="inputPass" name="pass" type="password" placeholder="Mật khẩu" />
                <p id="errorPass" class="error"><?php echo $passErr;?></span></p>
                <button type="submit" name="btn-register">Đăng ký</button>
            </form>
        </div>
        <div class="form-container login-container">
            <form action="Register_login.php" name="login" method="post">
                <h1>Đăng nhập</h1>
                <input id="inputEmail_login" type="email" placeholder="Email" name="Email_login" />
                <p id="errorEmail_Login" class="error"><?php echo $emailErr_L;?></p>
                <input id="inputPass_Login" type="password" placeholder="Password" name="Pass_login" />
                <p id="errorPass_Login" class="error"><?php echo $passErr_L;?></p>
                <div class="content">
                    <div class="checkbox">
                        <input type="checkbox" name="checkbox" id="checkbox" />
                        <label>Nhớ mật khẩu</label>
                    </div>
                    <div class="pass-link">
                        <a href="#">Quên tài khoản</a>
                    </div>
                </div>
                <p id="errorPass_Login" class="error"><?php echo $checkErr_L;?></p>
                <button id="btnDangnhap" name="btn-login" type="submit">Đăng nhập</button>
            </form>
        </div>
        <div class=" overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1 class="title">
                        Xin chào <br />
                        bạn
                    </h1>
                    <p>Nếu bạn đã có tài khoản, hãy đăng nhập ở đây.</p>
                    <button class="ghost" id="login">
                        Đăng nhập
                        <i class="lni lni-arrow-left login"></i>
                    </button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1 class="title">
                        Xin chào <br />
                        bạn
                    </h1>
                    <p>Nếu bạn chưa có một tài khoản hãy nhấn vào đây</p>
                    <button class="ghost" id="register">
                        Đăng ký
                        <i class="lni lni-arrow-right register"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script src="../filejs/script.js"></script>
    <!-- <script src="../filejs/kiemtra.js"></script> -->
</body>

</html>