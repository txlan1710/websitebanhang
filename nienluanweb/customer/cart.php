<?php
    session_start();
    $customer_id = $_SESSION['customer_id'];
    require_once("../admin/customer/connection.php");


    // show product
    

        $sqlShow = "SELECT * FROM RECEIPT_DETAIL AS R LEFT JOIN PRODUCT AS P ON R.P_ID=P.P_ID AND C_ID=$customer_id ";
        
        $query = mysqli_query($conn, $sqlShow);

        //  insert product 
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/cart.css" />
    <title>Cart</title>
</head>

<body>
    <?php 
                if(isset($_SESSION['status']))
                {
                    ?>
    <script>
    alert("<?php  echo $_SESSION['status']; ?>");
    </script>
    <?php 
                    unset($_SESSION['status']);
                }
                ?>
    <div id="main-body">
        <header>
            <div class="header-main-left">
                <img class="logo" src="Ao/favicon.ico" alt="img-log" />
            </div>
            <div class="header-main-right">
                <li class="search">
                    <input type="text" class="input-search" placeholder="Bạn muốn tìm kiếm gì?" />
                    <a href="#">
                        <ion-icon name="search-outline"></ion-icon>
                    </a>
                </li>
                <li class="cart">
                    <a href="cart.php">
                        <ion-icon name="cart-outline"></ion-icon>
                    </a>
                </li>
                <li class="acc">
                    <a>
                        <img src="https://file.hstatic.net/1000351433/file/user_bfb942d5edb24fc895104e6524135e07.png"
                            weight="30" height="30" />
                    </a>
                </li>
            </div>
        </header>
        <!-- menu-navigation -->
        <?php 
            $sql_menu = "SELECT * FROM PRODUCT_TYPE";
            
            $quyery = mysqli_query($conn, $sql_menu);
        ?>

        <div class="navigation">
            <ul class="menu-list">
                <li><a href="Home.php">TRANG CHỦ</a></li>
                <?php 
                while($row = mysqli_fetch_array($quyery)){
                ?>
                <li><a href="home.php?id=<?php echo $row['PT_ID']; ?>"><?php echo $row['PT_NAME']; ?></a>
                </li>
                <?php 
                }
                ?>
                <!-- <li><a href="#">BEST SELLER</a></li>
                <li><a href="#">TẤT CẢ SẢN PHẨM</a></li>
                <li><a href="#">ÁO THUN</a></li>
                <li><a href="#">ÁO HOODIE</a></li>
                <li><a href="#" title="ÁO SƠMI">ÁO SƠMI</a></li>
                <li><a href="#" title="QUẦN">QUẦN</a></li>
                <li><a href="#" title="PHỤ KIỆN">PHỤ KIỆN</a></li> -->
            </ul>
        </div>

        <main class="product-main">
            <div class="container">
                <div class="header-page-cart">
                    <h1>Giỏ hàng</h1>
                    <p><a href="Home.php" class="comeback">Tiếp tục mua hàng</a></p>
                </div>
                <div class="row-wrapbox-content-cart">
                    <div class="row-content-page">
                        <form class="cart-form-page">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="image-cart tb-title">Sản Phẩm</th>
                                        <th class="price tb-title">Giá</th>
                                        <th class="line-qty tb-title">Số lượng</th>
                                        <th class="remove tb-title">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    while($row = mysqli_fetch_array($query)){
                                    ?>
                                    <tr>
                                        <th class=" image">
                                            <div class="line-item-infor">
                                                <div class="product-image">
                                                    <img class="product-image-cart"
                                                        src="../upload/<?php echo $row['NAME_IMAGE']?>">
                                                </div>
                                                <div class="product-detail">
                                                    <h2><?php echo $row['P_NAME']; ?></h2>
                                                    <p><span class="variant-title"><?php echo $row['SIZE']; ?></span>
                                                    </p>
                                                </div>
                                            </div>
                                        </th>
                                        <th class="price">
                                            <p><span class="pri"><?php echo $row['P_PRICE']; ?></span></p>
                                        </th>
                                        <th class="line-qty">
                                            <div class="quantity">
                                                <p><span class="quas"><?php echo $row['QUANTITY']; ?></span></p>
                                            </div>
                                        </th>
                                        <th class="remove">
                                            <a href="Cart_delete.php?id=<?php echo $row['P_ID'];?>" class="delete_admin"
                                                onclick="return confirm('bạn có muốn xóa không'); "><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-x-square">
                                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                                    <line x1="9" y1="9" x2="15" y2="15"></line>
                                                    <line x1="15" y1="9" x2="9" y2="15"></line>
                                                </svg></a>
                                        </th>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </form>
                    </div>
                    <div class="sidebarCart-sticky">
                        <div class="sum-order">
                            <h4>Tổng hóa đơn</h4>
                            <div class="summary-total">
                                <span>
                                    <?php 

                                    require_once("../admin/customer/connection.php");
                                    $sqlSum = "SELECT SUM(P_PRICE) FROM RECEIPT_DETAIL AS R LEFT JOIN PRODUCT AS P ON R.P_ID=P.P_ID";
                                    $query = mysqli_query($conn, $sqlSum);
                                    if($query){
                                        $row = mysqli_fetch_array($query);
                                        $total = $row[0];
                                    echo "$total";
                                    }
                                    ?>
                                </span>
                            </div>
                            <div class="summay-button">
                                <a class="btnCart-checkout" href="#">Thanh toán</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- footer -->
        <footer>
            <div class="footer-item">
                <div class="img-footer">
                    <img class="logo" src="Ao/favicon.ico" alt="" />
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
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>