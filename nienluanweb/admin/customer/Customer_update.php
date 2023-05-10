<?php
session_start(); 
?>

<?php
session_start();
    require_once("connection.php");

    $dbid = $_GET['id'];


    if(isset($_POST['btn-edit-customer'])){

        $dbName = $_POST['Name'];
        $dbEmail = $_POST['Email'];
        $dbPassword = $_POST['Password'];
        $dbPhone = $_POST['Phone'];
        
        $sqlEdit = "UPDATE CUSTOMERS SET C_NAME = '$dbName', C_EMAIL = '$dbEmail', C_PASSWORD = '$dbPassword', C_PHONE = '$dbPhone' WHERE C_ID = $dbid";

        if(mysqli_query($conn, $sqlEdit)) {
            $_SESSION['status'] = "Cập nhật thành công!";
            header('location:customer_list.php');
            }
        }
?>