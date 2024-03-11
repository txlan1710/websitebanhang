<?php
session_start();
//tiến hành kiểm tra là người dùng đã đăng nhập hay chưa
//nếu chưa, chuyển hướng người dùng ra lại trang đăng nhập
if (!isset($_SESSION['customer_id'])) {
	header('Location: register_login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../admin/customer/css/admin.css" />
    <link rel="shortcut icon" type="image/png" href="Hinhanh/favicon.ico" />
    <title>Trang Chủ</title>
</head>

<body>
    <header>
        <div class="header-main-left">
            <img src="Ao/favicon.ico" alt="img-log" />
        </div>
        <div class="header-main-right">
            <li class="search">
                <form method="post" action="Home.php">
                    <input type="text" class="input-search" placeholder="Bạn muốn tìm kiếm gì?" name='input-search-c' />
                    <button type='submit' name='btn-search'>
                        Search
                    </button>
                </form>
            </li>
            <li class="cart">
                <a href="cart.php">
                    <ion-icon name="cart-outline"></ion-icon>
                </a>
                </l <li class="acc">
                <a>
                    <img src="https://file.hstatic.net/1000351433/file/user_bfb942d5edb24fc895104e6524135e07.png"
                        weight="30" height="30" />
                </a>
            </li>
        </div>
    </header>
    <!-- title space -->
    <?php 
        $sql_menu = "SELECT * FROM PRODUCT_TYPE";

        require_once("../admin/customer/connection.php");
        
        $quyery = mysqli_query($conn, $sql_menu);

    ?>
    <div class="navigation">
        <ul class="menu-list">
            <li><a href="Home.php">TRANG CHỦ</a></li>
            <?php 
            while($row = mysqli_fetch_array($quyery)){
            ?>
            <li><a href="Home.php?id=<?php echo $row['PT_ID']; ?>"
                    <?php echo $row['PT_NAME']; ?>"><?php echo $row['PT_NAME']; ?></a>
            </li>
            <?php 
            }
            ?>
        </ul>
    </div>
    <main class="wrapper">
        <?php
            
            if(empty($_GET['id'])){
                $sql = "SELECT * FROM PRODUCT AS P, PRODUCT_TYPE AS PT where  P.PT_ID = PT.PT_ID";
                // header('location:index.php');

            }if(!empty($_GET['id'])){
                $dbid = $_GET['id'];
                $sql = "SELECT * FROM PRODUCT AS P, PRODUCT_TYPE AS PT  WHERE P.PT_ID = PT.PT_ID AND PT.PT_ID = $dbid";
            }

            if(isset($_POST['btn-search']) || !empty($_POST['btn-search'])) {
                        $key = $_POST['input-search-c'];
                    if(empty($key)){
                    ?>
        <span class="empty-key-search">Vui lòng nhập dữ liệu vào ô tìm kiếm trống<span>
                <?php
            }
                        $sql = "SELECT * FROM PRODUCT AS P, PRODUCT_TYPE AS PT  WHERE P.PT_ID = PT.PT_ID AND P.P_NAME LIKE '%$key%'";
                    }
            $query = mysqli_query($conn, $sql);

            
        ?>
                <div class="headline">
                    <h3>Sản phẩm</h3>
                </div>
                <ul class="products">
                    <?php 
            while($row = mysqli_fetch_array($query)){
            ?>
                    <li>
                        <div>
                            <a href="#" class="product-thump">
                                <img src="../upload/<?php echo $row['NAME_IMAGE']?>">
                            </a>
                            <!-- mua ngay -->
                            <div class="product-info">
                                <a href="" class="product-cat"><?php echo $row['PT_NAME']; ?></a>
                                <a href="Product.php?id=<?php echo $row['P_ID']; ?>"
                                    class="product-name"><?php echo $row['P_NAME']; ?></a>
                                <div class="price-btn-buy">
                                    <p class="price"><?php echo $row['P_PRICE']; ?>VND</p>
                                    <a href="Product.php?id=<?php echo $row['P_ID']; ?>" class="buy-now">Mua hàng</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php
            }
            ?>
                </ul>
                <!-- <p id="errorPass_Login" class="error"><?php echo $empty?></p> -->
    </main>
    <!-- footer -->
    <footer>
        <div class="footer-item">
            <div class="img-footer">
                <img class="logo" src="Ao//favicon.ico" alt="" />
            </div>
            <div class="social-footer">
                <div class="footer-content">
                    <ul>
                        <li>© 2023 <b>BADLUCKY</b> sofficial Store all right reserved.</li>
                        <li><b>HOTLINE:</b> 0941027800</li>
                </div>
            </div>
        </div>
    </footer>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Roboto", "HelveticaNeue", "Helvetica Neue", sans-serif;

    }

    li {
        list-style: none;
    }

    header {
        display: flex;
        justify-content: space-between;
        background-color: #000000;
    }

    .header-main-right {
        display: flex;
        margin-top: 1rem;
        margin-right: 1.5rem;
        margin-bottom: 1rem;
    }

    .header-main-right>li {
        padding: 0 12px;
        text-transform: uppercase;
    }

    ion-icon {
        font-size: 2rem;
        color: #fff;
        margin-top: 2px;
        margin-left: -2px;
        margin-right: -2px;
    }

    .header-main-left img {
        weight: 55px;
        height: 55px;
        margin-top: 10px;
        margin-left: 10px;
    }

    .input-search {
        border: none;
        background-color: #000000;
        color: #fff;
    }

    /*Navigation*/
    .menu-list {
        display: flex;
        background: #000000;
        text-align: center;
        justify-content: center;
    }

    .menu-list li a {
        text-decoration: none;
        color: #fff;
    }

    .menu-list>li {
        padding: 0 4%;
        margin-top: 1rem;
        margin-bottom: 1rem;
    }

    /*content*/
    h1 {
        margin-left: auto;
        margin-right: auto;
        width: 400px;
    }

    /* wrapper */
    body {
        font-size: 14px;
        line-height: 1. 15;
    }

    .headline {
        text-align: center;
        margin: 40px;
    }

    .headline h3 {
        font-size: 18px;
        padding: 10px 20px;
        border: 1px solid #000000;
        text-transform: uppercase;
        display: inline-block;
        /*xem lai*/
    }

    .wrapper {
        max-width: 1170px;
        margin: 0 auto;
    }

    .products {
        display: flex;
        flex-wrap: wrap;
        /* xuống hàng */
        justify-content: space-between;
    }

    .products li {
        flex-basis: 25%;
        padding-left: 15px;
        padding-right: 15px;
        margin-bottom: 30px;
    }

    .products li img {
        max-width: 100%;
        height: auto;
    }

    .buy-now {
        text-transform: uppercase;
        text-decoration: none;
        text-align: center;
        display: block;
        background-color: #000000;
        padding: 5px;
        color: #fff;
        font-weight: 600;
        margin-left: 20px;
    }

    .price {
        padding: 2px 0;
        font-weight: 600;
        font-size: 17px;
        margin-top: 5px;
    }

    .price-btn-buy {
        display: flex;
        margin: 5px 0;
        padding: 5px 0;
    }

    .product-info {
        padding: 15px 0;
    }

    .product-info a {
        display: block;
        text-decoration: none;
    }

    .product-cat {
        font-size: 13px;
        text-transform: uppercase;
        padding: 3px 0;
    }

    .product-name {
        padding: 3px 0px;
        font-size: 14px;
    }



    /* footer */

    footer {
        height: auto;
        width: 100vw;
        padding-top: 200px;
    }

    .footer-item {
        padding: .5rem 2rem;
        background: dimgrey;
        display: flex;

    }

    .footer-item .img-footer {
        align-items: center;
        display: flex;
    }

    .footer-item img {
        width: 100%;
    }

    .footer-item .social-footer {
        display: flex;
        align-items: center;
        width: 100%;
        justify-content: flex-end;
    }

    .footer-item .social-footer li a {
        color: #000000;
        font-size: 2rem;
    }

    .footer-item .social-footer li:last-child {
        margin-left: .5rem;
    }

    /* footer */
    .footer-item {
        padding: .5rem 2rem;
        background: #000000;
        display: flex;

    }

    .HOTLINE {
        display: block;
    }

    .footer-item .img-footer {
        align-items: center;
        display: flex;
    }

    .footer-item .img-footer img {
        width: 100%;
    }

    .footer-item .social-footer {
        display: flex;
        align-items: center;
        width: 100%;
        justify-content: flex-end;
    }

    .footer-item .social-footer li a {
        color: #000000;
        font-size: 2rem;
    }

    .footer-item .social-footer li:last-child {
        margin-left: .5rem;
    }

    .logo {
        weight: 55px;
        height: 55px;
        margin-top: 10px;
        margin-left: 10px;
    }

    .footer-content {
        color: #fff;
        font-size: 16px;
        font-weight: 300;
        line-height: 23px;
    }
    </style>
</body>

</html>