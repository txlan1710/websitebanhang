<?php
session_start();
?>

<?php
    $emailErr = $passErr = $checkErr = "" ;
    require_once("connection.php");
    if (isset($_POST['btn-login'])) {

    //input databse to form
        $dbEmail  = $_POST['email'];
        $dbPass = $_POST['password'];
        if($_POST['email'] == null){
            $emailErr = "Vui lòng nhập email";
        }else {
            $emailErr = '';
        }
        if($_POST['password'] == null) {
            $passErr = "Vui lòng nhập password";
        }else {
            $passErr = '';
        }
        
        if($dbEmail != null && $dbPass != null){
          
            $loginsql = "SELECT * FROM ADMINS WHERE AD_EMAIL = '$dbEmail' and AD_PASSWORD = '$dbPass'";
            $query = mysqli_query($conn, $loginsql);
            if(mysqli_num_rows($query) == 0) {
                $checkErr = "email và password không hợp lệ vui lòng kiểm tra lại";
            }else {
                // $checkErr = "Thành công";
                header("location:Customer_list.php");
                $_SESSION['email'] = $dbEmail;
                $_SESSION['status'] = "Đăng nhập thành công";
              }
          }
    }
    ?>

<!DOCTYPE html>
<html>

<head>
    <title>Đăng nhập Admin</title>
    <link rel="stylesheet" type="text/css" href="../../css/loginAdmin.css" />
</head>

<body>
    <div class="login">
        <h2>Đăng nhập</h2>
        <form action="Admin_login.php" method="post">
            <label for="username">Email:<span style="color: red">*</span></label>
            <input type="text" id="username" name="email" placeholder="Nhập email" />
            <p id="errorEmail_Login" class="error"><?php echo $emailErr;?></p>
            <label for="password">Mật khẩu:<span style="color: red">*</span></label>
            <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" />
            <p id="errorPass_Login" class="error"><?php echo $passErr;?></p>
            <p id="errorPass_Login" class="error"><?php echo $checkErr;?></p>
            <input type="submit" value="Đăng nhập" name="btn-login" />
        </form>
    </div>
</body>

</html>