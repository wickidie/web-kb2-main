<?php
    session_start();
    include_once 'db-connect.inc.php';
    $user_id = $_SESSION['user_id'];
    if (isset($user_id) && !empty($user_id)) {
    } else {
        echo "              
        <script type='text/javascript'>
        alert('You must login first');
        location='login-form.php';
        </script>";
    }

    $search_value = $_GET['search'] ?? null;
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Transactions</title>
    <link rel="icon" href="../asset/icon/tokaku_logo.svg" type="image/x-icon" />

    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,400;0,500;0,600;0,700;1,300&family=Kalnia:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />

    <!-- CSS -->
    <link rel="stylesheet" href="../css/style.css" />

    <!-- Javascript -->
    <script defer type="text/javascript" src="../js/theme.js"></script>
    <script defer type="text/javascript" src="../js/page.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap bg-secondary-subtle">
            <aside
                class="d-none d-xl-flex flex-column col-auto bg-light-subtle justify-content-between min-vh-100 sidebar"
                id="sidebar">
                <div class="p-1 pt-3">
                    <div class="d-flex py-1 px-2 align-items-center">
                        <img src="../asset/icon/tokaku_logo.svg" alt="TOKAKU" width="32" height="32" />
                        <span class="fs-4 ms-2 align-bottom logo"> Tokaku </span>
                    </div>
                    <ul class="nav nav-pills flex-column justify-content-center mt-3">
                        <li class="nav-item py-3 py-sm-0">
                            <a href="dashboard.php" class="nav-link">
                                <i class="bi bi-house"></i>
                                <span class="fs-6 ms-2"> Dashboard </span>
                            </a>
                        </li>
                        <li class="nav-item py-3 py-sm-0 align-items-center">
                            <a href="#" class="nav-link animate collapsed active" id="transactions"
                                data-bs-toggle="collapse" data-bs-target="#transaction-collapse">
                                <i class="bi bi-table"></i>
                                <span class="fs-6 ms-2"> Transactions </span>
                            </a>
                            <div class="collapse" id="transaction-collapse">
                                <ul class="btn-toggle-nav list-unstyled">
                                    <li class="">
                                        <a href="#" class="nav-link active">
                                            <i class="bi bi-dot icon"></i>
                                            <span>Transactions</span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="transaction-details.php" class="nav-link">
                                            <i class="bi bi-dot icon"></i>
                                            <span>Transaction Details</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item py-3 py-sm-0 align-items-center">
                            <a href="#" class="nav-link animate collapsed" id="products" data-bs-toggle="collapse"
                                data-bs-target="#product-collapse">
                                <i class="bi bi-grid"></i>
                                <span class="fs-6 ms-2"> Products </span>
                            </a>
                            <div class="collapse" id="product-collapse">
                                <ul class="btn-toggle-nav list-unstyled align-items-center">
                                    <li class="">
                                        <a href="products.php" class="nav-link">
                                            <i class="bi bi-dot icon"></i>
                                            <span>Products</span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="categories.php" class="nav-link">
                                            <i class="bi bi-dot icon"></i>
                                            <span>Categories</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item py-3 py-sm-0">
                            <a href="users.php" class="nav-link">
                                <i class="bi bi-person-circle"></i>
                                <span class="fs-6 ms-2"> Users </span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="pb-2">
                    <div class="nav flex-column justify-content-center" id="sidebar2">
                        <div class="nav-item py-3 py-sm-0">
                            <a class="nav-link" href="logout.php">
                                <i class="bi bi-box-arrow-left"></i>
                                <span class="fs-6 ms-2"> Log out </span>
                            </a>
                        </div>
                    </div>
                </div>
            </aside>
            <main class="col justify-content-center">
                <header class="container pt-3">
                    <nav class="navbar navbar-expand-lg bg-light-subtle justify-content-between px-md-3 px-2 rounded-3">
                        <div>
                            <span class="d-xl-none navbar-brand ms-2 pe-auto" type="button" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                                <i class="bi bi-list" id="icon-toggle"></i>
                            </span>
                        </div>
                        <div>
                            <ul class="nav align-items-center">
                                <li class="nav-item mx-2">
                                    <a href="#" class="pe-auto">
                                        <i class="bi bi-moon-stars" id="themeToggle"></i>
                                    </a>
                                </li>
                                <!-- <li class="nav-item mx-2">
                                    <a href="#" class="pe-auto">
                                        <i class="bi bi-bell"></i>
                                    </a>
                                </li> -->
                                <li class="nav-item dropdown mx-2">
                                    <a href="#" class="" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="https://github.com/mdo.png" alt="" width="35" height="35"
                                            class="rounded-circle" />
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end text-small shadow">
                                        <li>
                                            <div class="d-flex align-items-center px-3">
                                                <div class="">
                                                    <img class="rounded-circle" src="https://github.com/mdo.png"
                                                        width="35" height="35" alt="Image Description" />
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <p class="mb-0 fw-bold">
                                                        <small>
                                                            <?php 
                                                            $getUsername = "SELECT username FROM users WHERE user_id = '$user_id'";
                                                            $username = mysqli_query($conn, $getUsername);
                                                            $row = mysqli_fetch_assoc($username);

                                                            echo"<strong>". $row['username'] . "</strong>";
                                                            ?>
                                                        </small>
                                                    </p>
                                                    <p class="card-text text-body">

                                                        <?php 
                                                            $getEmail = "SELECT email FROM users WHERE user_id = '$user_id'";
                                                            $email = mysqli_query($conn, $getEmail);
                                                            $row = mysqli_fetch_assoc($email);

                                                            echo"<small>". $row['email'] . "</small>";
                                                        ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider" />
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#"><small>Profile</small> </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <small>Settings</small>
                                            </a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider" />
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="logout.php"><small>Sign out</small></a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </header>
                <article class="p-3">
                    <section class="d-flex justify-content-center align-items-center">
                        <div class="container-fluid">
                            <span aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Transactions</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Transactions</li>
                                </ol>
                            </span>
                            <div class="card shadow mt-2">
                                <div class="card-header py-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <form method="GET" class="w-100">
                                            <div class="input-group my-2">
                                                <input type="text" class="form-control form-control-sm" id="myInput"
                                                    name="search" placeholder="Search by date" aria-label="Search"
                                                    aria-describedby="searchph" <?php echo "value = $search_value" ?>>
                                                <button class="input-group-text btn btn-outline-secondary rounded-end-1"
                                                    type="submit" id="searchph">
                                                    <i class="bi bi-search"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-striped" id="myTable">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Transaction ID</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Transaction Total</th>
                                                    <th scope="col">Username</th>
                                                    <th scope="col">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                            $items_per_page = 10;
                                            $sql = "SELECT t.transaction_id, t.transaction_date, t.transaction_total, t.status, t.user_id, u.username FROM transactions t JOIN users u ON t.user_id = u.user_id";
                                            $result = mysqli_query($conn, $sql);
                                            $rows = mysqli_num_rows($result);
                                            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                                            $offset = ($current_page - 1) * $items_per_page;
                                            
                                            if (isset($_GET['search'])) {
                                                if (!empty($_GET['search'])) {
                                                    $sql = "SELECT t.transaction_id, t.transaction_date, t.transaction_total, t.status, t.user_id, u.username FROM transactions t JOIN users u ON t.user_id = u.user_id where transaction_date like '%$search_value%' LIMIT $offset, $items_per_page";
                                                    $result = mysqli_query($conn, $sql);
                                                    $sql = "SELECT * FROM transactions where transaction_date like '%$search_value%'";
                                                    $result_total = mysqli_query($conn, $sql);
                                                    $rows = mysqli_num_rows($result_total);
                                                }else{
                                                    $sql = "SELECT t.transaction_id, t.transaction_date, t.transaction_total, t.status, t.user_id, u.username FROM transactions t JOIN users u ON t.user_id = u.user_id WHERE 1 LIMIT $offset, $items_per_page";
                                                    $result = mysqli_query($conn, $sql);
                                                }
                                            }else{
                                                $sql = "SELECT t.transaction_id, t.transaction_date, t.transaction_total, t.status, t.user_id, u.username FROM transactions t JOIN users u ON t.user_id = u.user_id WHERE 1 LIMIT $offset, $items_per_page";
                                                $result = mysqli_query($conn, $sql);
                                            }
                                            
                                            $total_page = ceil($rows/$items_per_page);
                                            $previous = $current_page - 1;
                                            $next = $current_page + 1;

                                            if (mysqli_num_rows($result) > 0) {
                                                $c = $offset + 1;
                                                while($row = mysqli_fetch_assoc($result)) {
                                                    $formattedDate = date('d-m-Y', strtotime($row['transaction_date']));
                                                    echo "<tr>";
                                                    $c++;
                                                    echo "<td>" . $row['transaction_id'] . "</td>";
                                                    echo "<td>" . $formattedDate . "</td>";
                                                    echo "<td>IDR " . number_format($row['transaction_total'], 2, ',', '.') . "</td>";
                                                    echo "<td>" . $row['username'] . "</td>";
                                                    echo "<td>";
                                                    echo "
                                                    <form action='transaction-update-status.php' method=post>
                                                    <select name='status'>
                                                        <option value='Status'>" . $row['status'] . "</option>
                                                        <option value='Pending'>Pending</option>
                                                        <option value='Paid'>Paid</option>
                                                        <option value='Delivery'>Delivery</option>
                                                        <option value='Delivered'>Delivered</option>
                                                    </select>
                                                    <input type='hidden' name='transaction_id' value='" . $row['transaction_id'] . "'/>
                                                    <button class='btn btn-primary btn-sm' type='submit'>Update status</button>
                                                    </form>";
                                                    echo "</td>";
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
                                                    <?php if($current_page < $total_page) { echo "href='products.php??search=$search_value&page=$total_page'"; } ?>>
                                                    <span aria-hidden="true">Last &raquo</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </section>
                </article>
            </main>
        </div>

        <div class="offcanvas offcanvas-start w-50" tabindex="-1" id="offcanvasExample"
            aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header pt-4">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel">
                    <div class="d-flex ms-2 justify-content-center align-items-center">
                        <img src="../asset/icon/tokaku_logo.svg" alt="TOKAKU" width="32" height="32" />
                        <span class="fs-4 ms-2 align-bottom"> Tokaku </span>
                    </div>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="nav flex-column justify-content-center">
                    <li class="nav-item py-2 py-sm-0">
                        <a href="#" class="nav-link">
                            <i class="bi bi-house"></i>
                            <span class="fs-6 ms-2"> Dashboard </span>
                        </a>
                    </li>
                    <li class="nav-item py-2 py-sm-0 align-items-center">
                        <a href="#" class="nav-link">
                            <i class="bi bi-table"></i>
                            <span class="fs-6 ms-2 collapsed" id="transactions" data-bs-toggle="collapse"
                                data-bs-target="#dashboard-collapse"> Transactions </span>
                        </a>
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
                        <a href="products.php" class="nav-link">
                            <i class="bi bi-grid"></i>
                            <span class="fs-6 ms-2"> Products </span>
                        </a>
                    </li>
                    <li class="nav-item py-2 py-sm-0">
                        <a href="users.php" class="nav-link">
                            <i class="bi bi-person-circle"></i>
                            <span class="fs-6 ms-2"> Users </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>

</html>