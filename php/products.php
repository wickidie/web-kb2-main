<?php
    session_start();
    include_once 'db-connect.inc.php';

    $user_id = $_SESSION['user_id'];
    // $username = $_SESSION['username'];
    if (isset($user_id) && !empty($user_id)) {

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
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <nav class="d-none d-md-flex flex-column bg-body-tertiary col-auto justify-content-between min-vh-100 p-xl-2 p-1"
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
                            <a href="#" class="nav-link">
                                <i class="bi bi-table"></i>
                                <span class="d-none fs-6 ms-2 collapsed mobile" id="transactions"
                                    data-bs-toggle="collapse" data-bs-target="#dashboard-collapse"
                                    aria-expanded="false">
                                    Transactions
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="transactions.php"><small>Transactions</small>
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
                                    <li class="py-2 ms-3">
                                        <a href="transactions.php">
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
                            <a href="products.php" class="nav-link active">
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

                <hr>
                <div class="px-xl-2 p-1">
                    <div class="dropup">
                        <a href="#"
                            class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle show"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/mdo.png" alt="" width="32" height="32"
                                class="rounded-circle me-2">
                            <span class="d-none d-sm-inline">
                                <?php 

                                    $getUsername = "SELECT username FROM users WHERE user_id = '$user_id'";
                                    $username = mysqli_query($conn, $getUsername);
                                    $row = mysqli_fetch_assoc($username);

                                    echo"<strong>". $row['username'] . "</strong>";
                                ?>
                            </span>
                        </a>
                        <ul class="dropdown-menu text-small shadow">
                            <!-- <li><a class="dropdown-item" href="#">New project...</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="#">Profile</a></li> -->
                            <!-- <li>
                                <hr class="dropdown-divider">
                            </li> -->
                            <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="col justify-content-center p-0">
                <nav class="navbar navbar-expand-lg bg-body-tertiary justify-content-between px-md-4 px-3">
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
                                                <p class="mb-0 fw-bold"><small>Mark Williams</small></p>
                                                <small class="card-text text-body">mark@site.com</small>
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
                </nav>
                <main class="p-3">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="container">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-6 col-md-2">
                                    <a href="products-form.php" class="btn btn-secondary">Add product</a>
                                </div>
                                <div class="col-6 col-md-2">
                                    <form method="GET">
                                        <div class="input-group my-2">
                                            <input type="text" class="form-control form-control-sm" id="myInput"
                                                name="search" placeholder="Search for user" aria-label="Search"
                                                aria-describedby="searchph">
                                            <span class="input-group-text btn btn-secondary rounded-end-1"
                                                id="searchph">
                                                <i class="bi bi-search"></i>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover table-striped" id="myTable">
                                    <thead>
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
                                    <tbody>
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
                                        echo "<td>" . $row['product_name'] . "</td>";
                                        echo "<td>" . $row['product_description'] . "</td>";
                                        echo "<td>" . $row['product_price'] . "</td>";
                                        // echo "<td>" . "<img src='https://www.w3schools.com/w3css/" . $row['product_img'] . "' class=' rounded' width='30px' height='30px'". "</td>";
                                        // echo "<td>" . $row['product_img'] . "</td>";
                                        // echo "<td>" . "<img src='https://github.com/wickidie/web-kb2-main/blob/imgProd/asset/" . $row['product_img'] . "' class='rounded' wdith='30px' height='30px'</td>";
                                        // echo "<td>" . "<img src='https://github.com/wickidie/web-kb2-main/blob/imgProd/asset/prod01.jpg' class='rounded' wdith='30px' height='30px'</td>";
                                        echo "<td>" . "<img src='https://raw.githubusercontent.com/wickidie/web-kb2-main/master/asset/" . $row['product_img'] . "' class=' rounded' width='30px' height='30px'". "</td>";
                                        echo "<td>" . $row['product_category'] . "</td>";
                                        echo "<td> 
                                        <a href='products-detail.php?product_id=" . $row["product_id"] . "'>
                                        <i class='bi bi-file-earmark-person-fill'></i></a> &nbsp;
                                        <form action='transactions-add.php?product_id=" . $row["product_id"] . "'method='POST'>
                                            <button type='submit'> 
                                                <a href=''>
                                                    <i class='bi bi-cart'></i>
                                                </a>
                                            </button>
                                            <input type='number' class='form-control-sm' id='quantity' name='quantity' placeholder='Quantity' aria-label='Search' aria-describedby='searchph'>
                                        </form>
                                        <a href='products-update-form.php?product_id=" . $row["product_id"] . "'>
                                        <i class='bi bi-pencil-square'></i></a> &nbsp;
                                        <a href='products-delete.php?product_id=" . $row['product_id'] . "'>
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
                                    </tbody>
                                </table>
                            </div>
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
                </main>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../js/sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>