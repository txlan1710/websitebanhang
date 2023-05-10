<?php
session_start(); 
?>

<?php

if (!isset($_SESSION['email'])) {
	header('Location: Admin_login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/admin.css" />
    <link rel="stylesheet" href="https://icono-49d6.kxcdn.com/icono.min.css">
    <title>Admin-Danh sách khách hàng</title>
    <style>
    .empty-key-search {
        font-size: 15px;
        color: red;
        margin-left: 910px;

    }

    .main-container-search {
        display: flex;
        justify-content: space-between;
    }

    ion-icon {
        font-size: 2rem;
        color: black;
        /* margin-top: 2px;
            margin-left: -2px;
            margin-right: 5px; */
        padding: 2px;
        margin-bottom: -5px;
        margin-right: 10px;

    }

    .input-search {
        border: none;
        background-color: white;
        font-size: 15px;
        margin-bottom: 20px;
    }

    table {
        border-collapse: collapse;
        width: 98%;

    }

    th {
        height: 50%;
    }

    thead {
        font-size: 17px;
    }

    tbody p {
        font-weight: 400;
        font-size: 17px;
    }

    table,
    td,
    th {
        border: solid 1px black;
        padding: 10px;
        justify-content: center;
        text-align: center;
    }

    .btn-search {
        background: transparent;
        border: none;
        padding: 3px;
        font-size: 15px;
        font-weight: 500;
        margin-right: 10px;
    }
    </style>
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
            <div class="main-container">
                <div class="main-container-search">
                    <?php 
                if(isset($_SESSION['status']))
                {
                    ?>
                    <div class="alert alert-success" role="alert" style="color:green;">
                        <?php  echo $_SESSION['status']; ?>
                    </div>
                    <?php 
                    unset($_SESSION['status']);
                }
                ?>

                    <br>
                    <h2>Danh mục khách hàng</h2>
                    <div class="" input-search-icon>
                        <form method="post" action="customer_list.php">
                            <input type="text" name="input-search" class="input-search"
                                placeholder="Bạn muốn tìm kiếm gì?" />
                            <button class="btn-search" name="btn-search-input" type="summit">
                                Search
                            </button>
                        </form>
                    </div>
                </div>
                <div class="table-product-admin">
                    <table>
                        <thead>
                            <tr>
                                <th class="thead stt">STT</th>
                                <th class="thead name">Tên khách hàng</th>
                                <th class="thead category-product">Email</th>
                                <th class="thead price">Password</th>
                                <th class="thead price">Số điện thoại</th>
                                <th class="thead btn-add-del"> Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require_once ('connection.php');
                            if(isset($_POST['btn-search-input']) || !empty($_POST['btn-search-input'])) {
                                $key = $_POST['input-search'];
                                if(empty($key)){
                                    ?>
                            <div class="empty-key-search">Vui lòng nhập dữ liệu vào ô tìm kiếm trống<div>
                                    <?php   
                                }
                                $sql = "SELECT * FROM `CUSTOMERS` WHERE C_NAME LIKE '%$key%' or C_EMAIL LIKE '%$key%' OR C_PHONE LIKE '%$key%'";

                            }else{
                                $sql = "SELECT * FROM `CUSTOMERS`";
                            }
                            $query = mysqli_query($conn,$sql);
                            while($row=mysqli_fetch_array($query)){
                            ?>
                                    <tr class="input-tbody-tr">
                                        <td><span><?php echo $row['C_ID']; ?></span></td>
                                        <td><span><?php echo $row['C_NAME']; ?></span></td>
                                        <td><span><?php echo $row['C_EMAIL']; ?></span></td>
                                        <td><span><?php echo $row['C_PASSWORD']; ?></span></td>
                                        <td><span><?php echo $row['C_PHONE']; ?></span></td>
                                        <th class="tbody btn-add-del">
                                            <a href="Customer_show.php?id=<?php echo $row['C_ID']; ?>"
                                                class="edit_admin"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-edit">
                                                    <path
                                                        d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                    </path>
                                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                    </path>
                                                </svg>
                                            </a>
                                            <a href="Customer_delete.php?id=<?php echo $row['C_ID']; ?>"
                                                class="delete_admin"
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
                                    <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>