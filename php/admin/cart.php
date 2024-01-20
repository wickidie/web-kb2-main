<?php
    require 'session-admin.inc.php';

    $search_value = $_GET['search'] ?? null;
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
            <div class="col justify-content-center p-0">
                <main class="p-3">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="container">
                            <form method="GET">
                                <div class="input-group my-2">
                                    <input type="text" class="form-control form-control-sm" id="myInput" name="search"
                                        placeholder="Search by user_id" aria-label="Search" aria-describedby="searchph" <?php echo "value = $search_value" ?>>
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
                            <!-- <form action="transactions-add.php" method="POST">
                                <button class="btn btn-primary btn-sm" type="submit">Checkout</button>
                            </form> -->
                        </div>
                    </main>
                </div>
        </div>
        <?php
        include_once 'offcanvas-admin.inc.php';
    ?>
</body>

</html>