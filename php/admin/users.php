<?php
    require 'session-admin.inc.php';

    $search_value = $_GET['search'] ?? null;
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Users</title>
    <link rel="icon" href="../../asset/img/icon/tokaku_logo.svg" type="image/x-icon" />

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
    <link rel="stylesheet" href="../../css/admin/style.css" />

    <!-- Javascript -->
    <script defer type="text/javascript" src="../../js/theme.js"></script>
    <script defer type="text/javascript" src="../../js/page.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap bg-secondary-subtle">
            <?php
                require 'sidebar-admin.inc.php';
            ?>
            <main class="col justify-content-center">
                <?php
                    require  'header-admin.inc.php';
                ?>
                <article class="p-3">
                    <section class="d-flex justify-content-center align-items-center">
                        <div class="container-fluid">
                            <div class="card shadow mt-2">
                                <div class="card-header py-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <form method="GET" class="w-100">
                                            <div class="input-group my-2">
                                                <input type="text" class="form-control form-control-sm" id="myInput"
                                                    name="search" placeholder="Search for user" aria-label="Search"
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
                                                    <th scope="col">User ID</th>
                                                    <th scope="col">Username</th>
                                                    <th scope="col">Password</th>
                                                    <th scope="col">Full Name</th>
                                                    <th scope="col">Address</th>
                                                    <th scope="col">Phone Number</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $items_per_page = 10;
                                                    $sql = "SELECT user_id, username, password, email, first_name, last_name, address, phone_number FROM users";
                                                    $result = mysqli_query($conn, $sql);
                                                    $rows = mysqli_num_rows($result);

                                                    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                                                    $offset = ($current_page - 1) * $items_per_page;
                                                    
                                                    if (isset($_GET['search'])) {
                                                        if (!empty($_GET['search'])) {
                                                            $sql = "SELECT * FROM users where username like '%$search_value%' LIMIT $offset, $items_per_page";
                                                            $result = mysqli_query($conn, $sql);
                                                            $sql = "SELECT * FROM users where username like '%$search_value%'";
                                                            $result_total = mysqli_query($conn, $sql);
                                                            $rows = mysqli_num_rows($result_total);
                                                        }else{
                                                            $sql = "SELECT user_id, username, password, email, first_name, last_name, address, phone_number FROM users WHERE 1 LIMIT $offset, $items_per_page";
                                                            $result = mysqli_query($conn, $sql);
                                                        }
                                                    }else{
                                                        $sql = "SELECT user_id, username, password, email, first_name, last_name, address, phone_number FROM users WHERE 1 LIMIT $offset, $items_per_page";
                                                        $result = mysqli_query($conn, $sql);
                                                    }
                                                    
                                                    $total_page=ceil($rows/$items_per_page);
                                                    $previous = $current_page - 1;
                                                    $next = $current_page + 1;

                                                    if (mysqli_num_rows($result) > 0) {
                                                        $c = $offset + 1;
                                                        while($row = mysqli_fetch_assoc($result)) {
                                                            echo "<tr>";
                                                            $c++;
                                                            echo "<td>" . $row['user_id'] . "</td>";
                                                            echo "<td>" . $row['username'] . "</td>";
                                                            echo "<td>" . $row['password'] . "</td>";
                                                            echo "<td>" . $row['first_name'] . " " . $row['last_name'] . "</td>";
                                                            echo "<td>" . $row['address'] . "</td>";
                                                            echo "<td>" . $row['phone_number'] . "</td>";
                                                            echo "<td> 
                                                            <a href='users-detail.php?user_id=" . $row["user_id"] . "'>
                                                            <i class='bi bi-file-earmark-person-fill'></i></a> &nbsp;
                                                            <a href='users-update-form.php?user_id=" . $row["user_id"] . "'>
                                                            <i class='bi bi-pencil-square'></i></a> &nbsp;
                                                            <a href='users-delete.php?user_id=" . $row['user_id'] . "'>
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
                                    <nav aria-label="Page navigation">
                                        <ul class="pagination justify-content-center m-0">
                                            <li class="page-item">
                                                <a class="page-link"
                                                    <?php if($current_page > 1){ echo "href='users.php?search=$search_value&?page=1'"; } ?>>
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
                                                    <?php if($current_page < $total_page) { echo "href='users.php??search=$search_value&page=$total_page'"; } ?>>
                                                    <span aria-hidden="true">&raquo</span>
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