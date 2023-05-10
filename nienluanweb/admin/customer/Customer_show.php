<?php

    //input databse to form
    $dbid = $_GET['id'];

    // connect database
    require_once("connection.php");

    $sqlEdit = "SELECT * FROM `CUSTOMERS` WHERE C_ID='$dbid';";
    
    $result = mysqli_query($conn, $sqlEdit);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/admin.css" />
    <title>Admin-Sửa khách hàng</title>
</head>

<body>
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
                        <li class="li-item"><a href="customer_list.php">Danh sách user</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Sản phẩm</a>
                    <ul>
                        <li class="li-item"><a href="../Product/product_add.php">Thêm sản phẩm</a></li>
                        <li class="li-item"><a href="../Product/product_list.php">Danh sách sản phẩm</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="admin-right admin-content-right">
            <div class="admin-content-right-product_add">
                <h2>Sửa thông tin khách hàng</h2> <br>

                <?php while($row = mysqli_fetch_array($result)){?>
                <form action="Customer_update.php?id=<?php echo $row['C_ID']; ?>" method="post"
                    enctype="multipart/form-data">
                    <form action="Customer_update.php?id=<?php echo $row['C_ID']; ?>" method="post"
                        enctype="multipart/form-data">
                        <label for="">Nhập tên khách hàng <span style="color: red">*</span></label>
                        <input type="text" name="Name" value="<?=$row['C_NAME']; ?>" required />
                        <label for="">Email<span style="color: red">*</span></label>
                        <input type="text" name="Email" value="<?php echo $row['C_EMAIL']; ?>" required />
                        <!-- <input type="number" min="1" max="4" name="Type" required /> -->
                        <label for="">Password<span style="color: red">*</span></label>
                        <input type="text" name="Password" value="<?php echo $row['C_PASSWORD']; ?>" required />
                        <label for="">Số điện thoại <span style="color: red">*</span></label>
                        <input type="text" name="Phone" value="<?php echo $row['C_PHONE']; ?>" required />
                        <button type="submit" enctype="multipart/form-data" name="btn-edit-customer">Cập nhật </button>
                    </form>
                    <?php 
                }
                ?>
            </div>
        </div>
    </section>
    <script src="select.js"></script>
</body>

</html>