<?php
    session_start();
    include_once 'db-connect.inc.php';
    $username = $_SESSION['username'];
    if (isset($username) && !empty($username)) {
    } else {
        echo "              
        <script type='text/javascript'>
        alert('You must login first');
        location='login-form.php';
        </script>";
    }
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Products</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="d-flex flex-column bg-body-tertiary col-auto min-vh-100 justify-content-center p-3">
                <div class="pt-3 mb-auto">
                    <div class="d-flex text-decoration-none justify-content-center align-items-center">
                        <span class="fs-4 d-sm-inline">
                            <svg id="logo-72" width="42" height="34" viewBox="0 0 53 44" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M23.2997 0L52.0461 28.6301V44H38.6311V34.1553L17.7522 13.3607L13.415 13.3607L13.415 44H0L0 0L23.2997 0ZM38.6311 15.2694V0L52.0461 0V15.2694L38.6311 15.2694Z"
                                    class="ccustom" fill="currentColor"></path>
                            </svg>
                        </span>
                    </div>
                    <hr>
                    <ul
                        class="nav nav-pills flex-column justify-content-center align-items-sm-stretch align-items-center">
                        <li class="nav-item py-2 py-sm-0">
                            <a href="home.php" class="nav-link">
                                <i class="bi bi-house"></i>
                                <span class="d-none fs-5 ms-2 d-sm-inline">
                                    Home
                                </span>
                            </a>
                        </li>
                        <li class="nav-item py-2 py-sm-0">
                            <a href="#" class="nav-link">
                                <i class="bi bi-speedometer2"></i>
                                <span class="d-none fs-5 ms-2 d-sm-inline">
                                    Dashboard
                                </span>
                            </a>
                        </li>
                        <li class="nav-item py-2 py-sm-0">
                            <a href="transactions.php" class="nav-link">
                                <i class="bi bi-table"></i>
                                <span class="d-none fs-5 ms-2 d-sm-inline">
                                    Transactions
                                </span>
                            </a>
                        </li>
                        <li class="nav-item py-2 py-sm-0">
                            <a href="products.php" class="nav-link active" aria-current="page">
                                <i class="bi bi-grid"></i>
                                <span class="d-none fs-5 ms-2 d-sm-inline">
                                    Products
                                </span>
                            </a>
                        </li>
                        <li class="nav-item py-2 py-sm-0">
                            <a href="users.php" class="nav-link">
                                <i class="bi bi-person-circle"></i>
                                <span class="d-none fs-5 ms-2 d-sm-inline">
                                    Users
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
                <hr>
                <div class="px-xl-2 p-1">
                    <div class="dropup">
                        <a href="#"
                            class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/mdo.png" alt="" width="32" height="32"
                                class="rounded-circle me-2">
                            <span class="d-none d-sm-inline">
                                <?php 
                                echo"<strong>$username</strong>";
                                ?>
                            </span>
                        </a>
                        <ul class="dropdown-menu text-small shadow">
                            <li><a class="dropdown-item" href="#">New project...</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-auto col-md-8 col-lg-9 col-xl-10 min-vh-100 justify-content-center p-3">
                <div class="container">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-2">
                            <a href="product-form.php" class="btn btn-secondary">Add product</a>
                        </div>
                        <div class="col-2">
                            <form method="GET">
                                <div class="input-group my-2">
                                    <input type="text" class="form-control form-control-sm" id="myInput" name="search"
                                        placeholder="Search for user" aria-label="Search" aria-describedby="searchph">
                                    <span class="input-group-text btn btn-secondary rounded-end-1" id="searchph">
                                        <i class="bi bi-search"></i>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <table class="table table-hover table-striped" id="myTable">
                        <thead">
                            <tr>
                                <th scope="col">Product ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Price</th>
                                <th scope="col">Image</th>
                                <th scope="col">Category</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <?php
                                $items_per_page = 10;
                                $search_value = '';
                                $sql = "SELECT product_id, product_name, product_description, product_price, product_img, product_category FROM products";
                                $result = mysqli_query($conn, $sql);
                                $rows = mysqli_num_rows($result);

                                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                                $offset = ($current_page - 1) * $items_per_page;
                                
                                if (isset($_GET['search'])) {
                                    $search_value = $_GET['search'];
                                    if (!empty($_GET['search'])) {
                                        $sql = "SELECT * FROM products where product_name like '%$search_value%' LIMIT $offset, $items_per_page";
                                        $result = mysqli_query($conn, $sql);
                                        $sql = "SELECT * FROM products where product_name like '%$search_value%'";
                                        $result_total = mysqli_query($conn, $sql);
                                        $rows = mysqli_num_rows($result_total);
                                    }else{
                                        // echo "Empty ";
                                        $sql = "SELECT product_id, product_name, product_description, product_price, product_img, product_category FROM products WHERE 1 LIMIT $offset, $items_per_page";
                                        $result = mysqli_query($conn, $sql);
                                    }
                                }else{
                                    // echo "Start ";
                                    $sql = "SELECT product_id, product_name, product_description, product_price, product_img, product_category FROM products WHERE 1 LIMIT $offset, $items_per_page";
                                    $result = mysqli_query($conn, $sql);
                                }
                                
                                $total_page=ceil($rows/$items_per_page);
                                // echo "Search for : $search_value <br>";
                                // echo "Showing : $total_page pages <br>";
                                // echo "With total : $rows result<br>";
                                
                                $previous = $current_page - 1;
                                $next = $current_page + 1;
                                // $sql = "SELECT user_id, username, password, email, first_name, last_name, address, phone_number FROM users LIMIT $offset, $items_per_page";
                                // $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    $c = $offset + 1;
                                    while($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        $c++;
                                        echo "<td>" . $row['product_id'] . "</td>";
                                        // echo "<td>" . "<img src='https://www.w3schools.com/w3css/" . $row['avatar'] . "' class=' rounded' width='30px' height='30px'". "</td>";
                                        echo "<td>" . $row['product_name'] . "</td>";
                                        echo "<td>" . $row['product_description'] . "</td>";
                                        echo "<td>" . $row['product_price'] . "</td>";
                                        echo "<td>" . $row['product_img'] . "</td>";
                                        echo "<td>" . $row['product_category'] . "</td>";
                                        echo "<td> 
                                        <a href='product-detail.php?product_name=" . $row["product_name"] . "'>
                                        <i class='bi bi-file-earmark-person-fill'></i></a> &nbsp;
                                        <a href='productEdit-form.php?product_name=" . $row["product_name"] . "'>
                                        <i class='bi bi-pencil-square'></i></a> &nbsp;
                                        <a href='product-delete.php?product_name=" . $row['product_name'] . "'>
                                        <i class='bi bi-trash-fill'></i></a></td>";
                                        echo "<tr>";
                                    }
                                } else {
                                echo "<tr>";
                                echo "<td colspan='7' class='text-center'>" . "0 results" . "</td>";
                                echo "<tr>";
                                }

                                mysqli_close($conn);

                                ?>
                    </table>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a class="page-link"
                                    <?php if($current_page > 1){ echo "href='products.php?search=$search_value&?page=1'"; } ?>>
                                    <span aria-hidden="true">&laquo</span>
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
                                    <?php if($current_page < $total_page) { echo "href='products.php??search=$search_value&page=$total_page'"; } ?>>
                                    <span aria-hidden="true">&raquo</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>