<?php
session_start(); 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/admin.css" />
    <title>Admin-Thêm khách hàng</title>

</head>

<body>
    <?php 
        require_once("connection.php");

        $sqlCategory = "SELECT * FROM PRODUCT_TYPE";

        $category = mysqli_query($conn, $sqlCategory)

    ?>

    <header>
        <h1>Quản lý khách hàng</h1>
    </header>
    <section class="admin-content">
        <div class="admin-left admin-content-left">
            <ul>
                <li>
                    <a href="#">User</a>
                    <ul>
                        <li class="li-item"><a href="customer_add.php">Thêm user</a></li>
                        <li class="li-item">
                            <a href="customer_list.php">Danh sách user</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">Sản phẩm</a>
                    <ul>
                        <li class="li-item">
                            <a href="../Product/product_add.php">Thêm sản phẩm</a>
                        </li>
                        <li class="li-item">
                            <a href="../Product/product_list.php">Danh sách sản phẩm</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="admin-right admin-content-right">
            <div class="admin-content-right-product_add">
                <?php 
                if(isset($_SESSION['status']))
                {
                    echo $_SESSION['status'];
                    unset($_SESSION['status']);
                }
                ?>
                <br />
                <?php
                // $nameError = $emailError = $passError = $phoneError = "";
                ?>
                <h2>Thêm khách hàng</h2>
                <br />
                <?php
    //input databse to form
    // connect database
    require_once("connection.php");
    
    $nameError = $emailError = $passError = $phoneError = "";
    
    if (isset($_POST['btn-add-product'])) {

        $dbName = $_POST['Name'];
        $dbEmail = $_POST['Email'];
        $dbPass = $_POST['Password'];
        $dbPhone = $_POST['Phone'];

        if(empty($_POST['Name'])){
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
?>
                <form action="Customer_add.php" method="post" enctype="multipart/form-data">
                    <label for="">Nhập tên khách hàng <span style="color: red">*</span></label>
                    <div class="input-error">
                        <input type="text" name="Name" class="input" />
                        <p id="error" class="error"><?php echo $nameError;?></p>
                    </div>
                    <label for="">Email<span style="color: red">*</span></label>
                    <div class="input-error">
                        <input type="text" name="Email" class="input" />
                        <p id="error" class="error"><?php echo $emailError;?></p>
                    </div>
                    <!-- <input type="number" min="1" max="4" name="Type" required /> -->
                    <label for="">Password<span style="color: red">*</span></label>
                    <div class="input-error">
                        <input type="text" name="Password" class="input" />
                        <p id="error" class="error"><?php echo $passError;?></p>
                    </div>
                    <label for="">Số điện thoại <span style="color: red">*</span></label>
                    <div class="input-error">
                        <input type="text" name="Phone" class="input" />
                        <p id="error" class="error"><?php echo $phoneError;?></p>
                    </div>
                    <button type="submit" enctype="multipart/form-data" name="btn-add-product">
                        Thêm
                    </button>
                </form>
            </div>
        </div>
    </section>
    <script src="select.js"></script>
</body>

</html>