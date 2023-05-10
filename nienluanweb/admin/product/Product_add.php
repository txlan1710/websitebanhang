<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../customer/css/admin.css" />
    <title>Admin-Thêm sản phẩm </title>
</head>

<body>
    <?php 
        require_once("../customer/connection.php");

        $sqlCategory = "SELECT * FROM PRODUCT_TYPE";

        $category = mysqli_query($conn, $sqlCategory)
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
                        <li class="li-item"><a href="../customer/Customer_add.php">Thêm user</a></li>
                        <li class="li-item"><a href="../customer/Customer_list.php">Danh sách user</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Sản phẩm</a>
                    <ul>
                        <li class="li-item"><a href="Product_add.php">Thêm sản phẩm</a></li>
                        <li class="li-item"><a href="Product_list.php">Danh sách sản phẩm</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="admin-right admin-content-right">
            <div class="admin-content-right-product_add">
                <?php if(isset($_SESSION['status']))
                { ?>
                <div style="color: green;"> <?php echo $_SESSION['status']; ?></div>

                <?php 
                    unset($_SESSION['status']);
                }
                ?>
                <br>
                <h2>Thêm sản phẩm</h2> <br>
                <form action="Product_add_p.php" method="post" enctype="multipart/form-data">
                    <label for="">Nhập sản phẩm <span style="color: red">*</span></label>
                    <input type="text" name="Name" required />
                    <label for="">Loại sản phẩm <span style="color: red">*</span></label>
                    <select name="Type" id="type-input" required>
                        <option value="">----Tên danh mục----</option>
                        <?php foreach($category as $key => $value){ ?>
                        <option value="<?php echo $value['PT_ID']?>"> <?php echo $value['PT_NAME'] ?></option>
                        <?php } ?>
                    </select>
                    <!-- <input type="number" min="1" max="4" name="Type" required /> -->
                    <label for="">Giá sản phẩm <span style="color: red">*</span></label>
                    <input type="text" name="price" required />
                    <label for="">Mô tả sản phẩm <span style="color: red">*</span></label>
                    <textarea name="description" id="" cols="30" rows="10"></textarea>
                    <label for="">Chọn ảnh sản phẩm <span style="color: red">*</span></label>
                    <input type="file" name="image" id="" />
                    <button type="submit" enctype="multipart/form-data" name="btn-add-product">Thêm</button>
                </form>
            </div>
        </div>
    </section>
    <script src="select.js"></script>
</body>

</html>