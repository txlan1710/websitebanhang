<?php
    //input databse to form
    $dbid = $_GET['id'];
    // connect database
    require_once("../admin/customer/connection.php");
    
    $delproduct = "DELETE FROM RECEIPT_DETAIL WHERE P_ID='$dbid'";
    
    if(mysqli_query($conn, $delproduct)){
        echo "hi";
        header('location:cart.php');
    }
?>