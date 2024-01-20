<?php
    require 'session-admin.inc.php';

?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cart</title>
    <!-- icon -->
    <link rel="icon" href="../asset/icon/tokaku_logo.svg">
    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="../../css/admin/style.css">
    <!-- Javascript -->
    <script defer type="text/javascript" src="../../js/theme.js"></script>
    <script defer type="text/javascript" src="../../js/page.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
        <?php
                require 'sidebar-admin.inc.php';
            ?>
            <main class="col justify-content-center">
                <?php
                    require  'header-admin.inc.php';
                ?>
            <!-- <nav class="d-none d-md-flex flex-column bg-body-tertiary col-auto justify-content-between min-vh-100 p-xl-2 p-1"
                id="sidebar">
                <div class="pt-2">
                    <div class="d-flex justify-content-center align-items-center mb-3">
                        <i class="bi bi-exclude logo"></i>
                        <span class="d-none fs-5 ms-2 mobile" id="logo">
                            Kuis besar
                        </span>
                    </div>
                    <ul class="nav nav-pills flex-column justify-content-center align-items-center" id="sidebar1">
                        <li class="nav-item py-2 py-sm-0">
                            <a href="dashboard.php" class="nav-link">
                                <i class="bi bi-house"></i>
                                <span class="d-none fs-6 ms-2 mobile" id="dashboard">
                                    Dashboard
                                </span>
                            </a>
                        </li>
                        <li class="nav-item py-2 py-sm-0 align-items-center dropend" id="dropend">
                            <a class="nav-link active">
                                <i class="bi bi-table"></i>
                                <span class="d-none fs-6 ms-2 collapsed mobile" id="transactions"
                                    data-bs-toggle="collapse" data-bs-target="#dashboard-collapse"
                                    aria-expanded="false">
                                    Transactions
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item active" href="#"><small>Transactions</small>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="transaction-details.php">
                                        <small>Transactions details</small>
                                    </a>
                                </li>
                            </ul>
                            <div class="collapse" id="dashboard-collapse">
                                <ul class="btn-toggle-nav list-unstyled align-items-center">
                                    <li class="py-2 ms-3 ">
                                        <a href="#" class="active">
                                            <i class="bi bi-card-text"></i>
                                            <small>Transactions</small>
                                        </a>
                                    </li>
                                    <li class="py-2 ms-3">
                                        <a href="transaction-details.php">
                                            <i class="bi bi-card-list"></i>
                                            <small>Transactions details</small>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item py-2 py-sm-0">
                            <a href="products.php" class="nav-link">
                                <i class="bi bi-grid"></i>
                                <span class="d-none fs-6 ms-2 mobile" id="products">
                                    Products
                                </span>
                            </a>
                        </li>
                        <li class="nav-item py-2 py-sm-0">
                            <a href="users.php" class="nav-link">
                                <i class="bi bi-person-circle"></i>
                                <span class="d-none fs-6 ms-2 mobile" id="users">
                                    Users
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="pb-2">
                    <div class="nav flex-column justify-content-center align-items-center" id="sidebar2">
                        <div class="nav-item py-2 py-sm-0">
                            <a class="nav-link" href="logout.php">
                                <i class="bi bi-box-arrow-left"></i>
                                <span class="d-none fs-6 ms-2 mobile" id="logout">
                                    Log out
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </nav> -->
            <div class="col justify-content-center p-0">
                <!-- <nav class="navbar navbar-expand-lg bg-body-tertiary justify-content-between px-md-4 px-3">
                    <div class="navbar-brand">
                        <span><i class="bi bi-list cursor" id="icon-toggle"></i></span>
                    </div>
                    <div>
                        <ul class="nav align-items-center">
                            <li class="nav-item mx-2">
                                <a class="">
                                    <i class="bi cursor" id="themeToggle"></i>
                                </a>
                            </li>
                            <li class="nav-item mx-2">
                                <a href="#" class="">
                                    <i class="bi bi-bell"></i>
                                </a>
                            </li>
                            <li class="nav-item dropdown mx-2">
                                <a href="#" class="" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="https://github.com/mdo.png" alt="" width="35" height="35"
                                        class="rounded-circle">
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end text-small shadow">
                                    <li>
                                        <div class="d-flex align-items-center px-3">
                                            <div class="">
                                                <img class="rounded-circle" src="https://github.com/mdo.png" width="35"
                                                    height="35" alt="Image Description">
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <p class="mb-0 fw-bold"><small>
                                                        <?php 
                                                            $getUsername = "SELECT username FROM admin WHERE admin_id = '$admin_id'";
                                                            $username = mysqli_query($conn, $getUsername);
                                                            $row = mysqli_fetch_assoc($username);

                                                            echo"<strong>". $row['username'] . "</strong>";
                                                        ?>
                                                    </small></p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#"><small>Profile</small>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <small>Settings</small>
                                        </a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="logout.php"><small>Sign out</small></a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav> -->
                <main class="p-3">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="container">
                            <form method="GET">
                                <div class="input-group my-2">
                                    <input type="text" class="form-control form-control-sm" id="myInput" name="search"
                                        placeholder="Search by user_id" aria-label="Search" aria-describedby="searchph">
                                    <button class="input-group-text btn btn-secondary rounded-end-1" type="submit"
                                        id="searchph">
                                        <i class="bi bi-search"></i>
                                    </button>
                                </div>
                            </form>
                            <div class="table-responsive">
                                <table class="table table-hover table-striped" id="myTable">
                                    <thead>
                                        <tr>
                                            <th scope="col">Cart ID</th>
                                            <th scope="col">User ID</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Product Price</th>
                                            <th scope="col">Created At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $items_per_page = 10;
                                            $search_value = '';
                                            $sql = "SELECT c.cart_id, c.user_id, u.username, p.product_id, p.product_name, c.quantity, p.product_price, c.created_at FROM cart c 
                                                    JOIN users u ON c.user_id = u.user_id
                                                    JOIN products p ON c.product_id = p.product_id;";
                                            $result = mysqli_query($conn, $sql);
                                            $rows = mysqli_num_rows($result);

                                            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                                            $offset = ($current_page - 1) * $items_per_page;
                                            
                                            if (isset($_GET['search'])) {
                                                $search_value = $_GET['search'];
                                                if (!empty($_GET['search'])) {
                                                    $sql = "SELECT c.cart_id, c.user_id, u.username, p.product_id, p.product_name, c.quantity, p.product_price, c.created_at FROM cart c 
                                                    JOIN users u ON c.user_id = u.user_id
                                                    JOIN products p ON c.product_id = p.product_id WHERE c.user_id like '%$search_value%' ORDER BY c.cart_id DESC LIMIT $offset, $items_per_page";
                                                    $result = mysqli_query($conn, $sql);
                                                    $sql = "SELECT c.cart_id, c.user_id, u.username, p.product_id, p.product_name, c.quantity, p.product_price, c.created_at FROM cart c 
                                                    JOIN users u ON c.user_id = u.user_id
                                                    JOIN products p ON c.product_id = p.product_id WHERE c.user_id like '%$search_value%' ORDER BY c.cart_id DESC";
                                                    $result_total = mysqli_query($conn, $sql);
                                                    $rows = mysqli_num_rows($result_total);
                                                }else{
                                                    $sql = "SELECT c.cart_id, c.user_id, u.username, p.product_id, p.product_name, c.quantity, p.product_price, c.created_at FROM cart c 
                                                    JOIN users u ON c.user_id = u.user_id
                                                    JOIN products p ON c.product_id = p.product_id ORDER BY c.cart_id DESC LIMIT $offset, $items_per_page";
                                                    $result = mysqli_query($conn, $sql);
                                                }
                                            }else{
                                                $sql = "SELECT c.cart_id, c.user_id, u.username, p.product_id, p.product_name, c.quantity, p.product_price, c.created_at FROM cart c 
                                                JOIN users u ON c.user_id = u.user_id
                                                JOIN products p ON c.product_id = p.product_id
                                                ORDER BY c.cart_id DESC;";
                                                $result = mysqli_query($conn, $sql);
                                            }
                                            
                                            $total_page=ceil($rows/$items_per_page);
                                            $previous = $current_page - 1;
                                            $next = $current_page + 1;

                                            if (mysqli_num_rows($result) > 0) {
                                                $c = $offset + 1;
                                                while($row = mysqli_fetch_assoc($result)) {
                                                    $formattedDate = date('d-m-Y', strtotime($row['created_at']));
                                                    echo "<tr>";
                                                    $c++;
                                                    echo "<td>" . $row['cart_id'] . "</td>";
                                                    echo "<td>" . $row['user_id'] . "</td>";
                                                    echo "<td>" . $row['username'] . "</td>";
                                                    echo "<td>" . $row['product_name'] . "</td>";
                                                    echo "<td>" . $row['quantity'] . "</td>";
                                                    echo "<td>" . $row['product_price'] . "</td>";
                                                    echo "<td>" . $formattedDate . "</td>";
                                                    echo "<tr>";
                                                }
                                            } else {
                                            echo "<tr>";
                                            echo "<td colspan='7' class='text-center'>" . "0 results" . "</td>";
                                            echo "<tr>";
                                            }

                                            mysqli_close($conn);

                                        ?>
                                    </tbody>
                                </table>
                            </div>

                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item">
                                        <a class="page-link"
                                            <?php if($current_page > 1){ echo "href='products.php?search=$search_value&?page=1'"; } ?>>
                                            <span aria-hidden="true">&laquo First</span>
                                        </a>
                                    </li>
                                    <?php 
                                        for($x=1;$x<=$total_page;$x++){
                                            ?>
                                    <li class="page-item">
                                        <a class="page-link"
                                            <?php echo "href='?search=$search_value&page=$x'"?>><?php echo $x; ?>
                                        </a>
                                    </li>
                                    <?php
                                        }
                                    ?>
                                    <li class="page-item">
                                        <a class="page-link"
                                            <?php if($current_page < $total_page) { echo "href='products.php?search=$search_value&page=$total_page'"; } ?>>
                                            <span aria-hidden="true">Last &raquo</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                            <form action="transactions-add.php" method="POST">
                                <button class="btn btn-primary btn-sm" type="submit">Checkout</button>
                            </form>
                        </div>
                    </div>
                </main>
            </div>
        </div>
</body>

</html>