<?php
    session_start();
    //input databse to form
    $dbName = $_POST['Name'];
    $dbEmail = $_POST['Email'];
    $dbPass = $_POST['Password'];
    $dbPhone = $_POST['Phone'];

    // connect database
    require_once("connection.php");
    
    $nameError = $emailError = $passError = $phoneError = "";
    
    if (isset($_POST['btn-add-product'])) {

        if(empty($dbName)){
            $nameError = "Tên không được để trống";
        }

        if(empty($dbPass)){
            $passError = "Mật khẩu không được để trống";
        }

        if(empty($dbPhone)){
            $phoneError = "Số điện thoại không được để trống";
        }

        if(empty($dbEmail)){
            $emailError = "Email không được để trống";
        }

        if(empty($nameError) && empty($passError) && empty($phoneError) && empty($emailError)) {
            
            $addCustomer = "INSERT INTO `CUSTOMERS` (`C_NAME`,`C_EMAIL`,`C_PASSWORD`, `C_PHONE`) VALUES ('$dbName','$dbEmail','$dbPass','$dbPhone')";
        
            if(mysqli_query($conn, $addCustomer)){
            $_SESSION['status'] = "Thêm khách hàng thành công!";
            header('location:customer_list.php');
            }
        }
    }
    // Đóng kết nối
    mysqli_close($conn);
?>