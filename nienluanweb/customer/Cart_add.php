<?php
    session_start();
    //input databse to form
    $dbid = $_POST['id_product'];
    $dbSize = $_POST['size'];
    $dbQuantity =$_POST['quantity'];
    $customer_id = $_SESSION['customer_id'];

    // connect database
    require_once("../admin/customer/connection.php");
  
    $sqlShow = "SELECT * FROM RECEIPT_DETAIL AS R,PRODUCT AS P WHERE R.P_ID=P.P_ID AND R.P_ID=$dbid AND R.SIZE='$dbSize'";
        
    $queryShow = mysqli_query($conn, $sqlShow);  
    if (isset($_POST['btn-addCart'])) {
        if(mysqli_num_rows($queryShow)>0){
            $_SESSION['status'] = "Sản phẩm đã tồn tại trong giỏ hàng";
            header('location:cart.php');
        }else{
            $addproduct = "INSERT INTO RECEIPT_DETAIL (P_ID, C_ID, quantity, SIZE) VALUES ($dbid, $customer_id,  $dbQuantity, '$dbSize')";
            
            $query = mysqli_query($conn, $addproduct);
            if($query){
                $_SESSION['status'] = "Thêm sản phẩm thành công!";
                header('location:cart.php');
            }
        }
    }
?>