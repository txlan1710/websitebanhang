<?php
    //input databse to form
    $dbid = $_GET['id'];

    // connect database
    require_once("../customer/connection.php");

    
    $delproduct = "DELETE FROM PRODUCT WHERE P_ID='$dbid'";
    
    if(mysqli_query($conn, $delproduct)){
        
        header('location:Product_list.php');
    }
?>