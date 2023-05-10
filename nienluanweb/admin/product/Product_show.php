<?php
    //input databse to form
    $dbid = $_GET['id'];

    // connect database
    require_once("../customer/connection.php");

    $sqlEdit = "SELECT * FROM `PRODUCT` WHERE P_ID='$dbid';";
    
    $result = mysqli_query($conn, $sqlEdit);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../customer/css/admin.css" />
    <title>Adminthem</title>
</head>

<body>
    <?php
        $sqlCategory = "SELECT * FROM PRODUCT_TYPE";

        $sqlType = "SELECT * FROM PRODUCT AS P, PRODUCT_TYPE AS PT  WHERE P.PT_ID = PT.PT_ID AND P.P_ID = $dbid";
        
        $category = mysqli_query($conn, $sqlCategory);
        
        $Type = mysqli_query($conn, $sqlType);
    ?>
    <header>
        <h1>Quản lý sản phẩm</h1>
    </header>
    <section class="admin-content">
        <div class="admin-left admin-content-left">
            <ul>
                <li>
                    <a href="#">User</a>
                    <ul>
                        <li class="li-item"><a href="../Customers/customer_add.php">Thêm user</a></li>
                        <li class="li-item"><a href="../Customers/customer_list.php">Danh sách user</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Sản phẩm</a>
                    <ul>
                        <li class="li-item"><a href="product_add.php">Thêm sản phẩm</a></li>
                        <li class="li-item"><a href="product_list.php">Danh sách sản phẩm</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="admin-right admin-content-right">
            <div class="admin-content-right-product_add">
                <h2>Cập nhật sản phẩm</h2> <br>
                <?php while($row = mysqli_fetch_array($result)){?>
                <form action="Product_update.php?id=<?php echo $row['P_ID']; ?>" method="post"
                    enctype="multipart/form-data">
                    <label for="">Nhập sản phẩm <span style="color: red">*</span></label>
                    <input type="text" name="Name" value="<?php echo $row['P_NAME']; ?>" required />
                    <label for="">Loại sản phẩm <span style="color: red">*</span></label>
                    <select name="Type" id="type-input" required>
                        <?php foreach($Type as $key => $value){ ?>
                        <option value="<?php echo $value['PT_ID']?>"><?php echo $value['PT_NAME'] ?></option>
                        <?php } ?>
                        <?php foreach($category as $key => $value){ ?>
                        <option value="<?php echo $value['PT_ID']?>"> <?php echo $value['PT_NAME'] ?></option>
                        <?php } ?>
                    </select>
                    <!-- <input type="number" min="1" max="4" name="Type" required /> -->
                    <!-- <input type="number" min="1" max="4" name="Type" required /> -->
                    <label for="">Giá sản phẩm <span style="color: red">*</span></label>
                    <input type="text" name="price" value="<?php echo $row['P_PRICE']; ?>" required />
                    <label for="">Mô tả sản phẩm <span style="color: red">*</span></label>
                    <textarea name="description" id="" cols="30"
                        rows="10"><?php echo $row['P_DESCRIPTION']; ?></textarea>
                    <label for="">Chọn ảnh sản phẩm <span style="color: red">*</span></label>
                    <input type="file" name="image" id="" />
                    <button type="submit" enctype="multipart/form-data" name="btn-edit-product">Cập nhật </button>
                    <?php 
                }
                ?>
                </form>
            </div>
        </div>
    </section>
    <style>
    /*table, th, td{
    border: 1px solid gray;
}
#user-info{
    border: 1px solid gray;
    width: 700px;
    margin: 0 auto;
    padding: 25px;
}
#user-info table{
    margin: 10px auto 0 auto;
    text-align: center;
}
#user-info h1{
    text-align: center;
}*/

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        color: black;
        outline: none;
    }

    h1 {
        color: white;
    }

    a {
        text-decoration: none;
    }

    ul {
        list-style: none;
    }

    header {
        height: 100px;
        width: 100vw;
        border-bottom: 2px solid black;
        text-align: center;
        padding: 25px;
        background-color: black;
    }

    .admin-content {
        border-top: 1px solid white;
        display: flex;
    }

    .admin-left {
        background-color: black;
        width: 20%;
        height: 100vh;
        padding: 30px 0 0 12px;
    }

    .admin-left>ul>li>a {
        font-weight: bold;
    }

    .admin-left ul li {
        margin: 6px 0;
    }

    .admin-left .li-item:hover a {
        color: rgb(84, 167, 167);
        transition: 0.3s;
    }

    .admin-left ul ul {
        margin-left: 20px;
    }

    .admin-left ul li a {
        color: white;
        font-size: 17px;
    }

    .admin-right {
        width: 80%;
        padding: 30px 0 0 12px;
    }

    .admin-right-sanpham input {
        height: 30px;
        width: 200px;
        padding-left: 12px;
        margin-top: 10px;
    }

    .admin-right-sanpham button {
        display: block;
        margin-top: 10px;
        height: 30px;
        width: 100px;
        cursor: pointer;
        background-color: lightcoral;
        border: none;
        color: black;
        transition: all 0.3s ease;
    }

    .admin-right-sanpham button:hover {
        background-color: transparent;
        border: 1px solid lightcoral;
        color: lightcoral;
    }

    /*--------------------product*/
    .admin-content-right-product_add input,
    select {
        width: 200px;
        height: 30px;
        display: block;
        margin: 6px 0 12px;
        padding-left: 12px;
    }

    .main-container h2 {
        margin-bottom: 20px;
    }

    .admin-content-right-product_add textarea {
        display: block;
        height: 200px;
        width: 500px;
        margin-bottom: 12px;
        padding: 12px;
    }

    .admin-content-right-product_add button {
        display: block;
        margin-top: 10px;
        height: 30px;
        width: 100px;
        cursor: pointer;
        background-color: lightcoral;
        border: none;
        color: black;
        transition: all 0.3s ease;
    }

    .admin-content-right-product_add button:hover {
        background-color: transparent;
        border: 1px solid lightcoral;
        color: lightcoral;
    }
    </style>
    <script src="select.js"></script>
</body>

</html>