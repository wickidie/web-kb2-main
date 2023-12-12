<?php
    session_start();
    include_once 'db-connect.inc.php';
    $user_id = $_SESSION['user_id'];
    if (isset($user_id)&& !empty($user_id)) {
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
    <title>Home</title>
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
                            <a href="#" class="nav-link active">
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
                                                <p class="mb-0 fw-bold"><small>
                                                        <?php 
                                                            $getUsername = "SELECT username FROM users WHERE user_id = '$user_id'";
                                                            $username = mysqli_query($conn, $getUsername);
                                                            $row = mysqli_fetch_assoc($username);

                                                            echo"<strong>". $row['username'] . "</strong>";
                                                        ?>
                                                    </small></p>
                                                <small class="card-text text-body">
                                                    <?php 
                                                            $getEmail = "SELECT email FROM users WHERE user_id = '$user_id'";
                                                            $email = mysqli_query($conn, $getEmail);
                                                            $row = mysqli_fetch_assoc($email);

                                                            echo"<strong>". $row['email'] . "</strong>";
                                                        ?>
                                                </small>
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
                                    <!-- <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="logout.php"><small>Sign out</small></a></li> -->
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
                <main class="container-fluid p-3 align-items-center h-75">
                    <div class="h-100">
                        <div class="d-flex flex-column h-100">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" onclick="history.back()">Page?</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Details</li>
                                </ol>
                            </nav>

                            <div class="container justify-content-center align-items-center">
                                <div class="card mb-3" style="max-width: 1200px;">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="../asset/prod01.jpg" class="img-fluid rounded-start" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">

                                                <div class="d-flex justify-content-between align-items-between">
                                                    <div class="col-6 col-md-5">
                                                        <h2 class="card-title"><strong>Product Name</strong>
                                                            <span><small class="fs-5">$price</small></span>
                                                        </h2>
                                                        <span class="card-subtitle">category</span>
                                                    </div>
                                                    <div class="col-6 col-md-3 text-end">
                                                        <button class="btn btn-outline-secondary">Edit</button>
                                                    </div>
                                                </div>

                                                <p class="card-text mt-3">Lorem ipsum dolor sit amet consectetur
                                                    adipisicing
                                                    elit. Vel, explicabo? Repellendus amet fugit ipsa labore, quo
                                                    mollitia laudantium quam nostrum iste unde totam illo quidem est,
                                                    cumque eos numquam quasi ex recusandae. Earum, repudiandae? Cumque
                                                    architecto voluptatem, deserunt quam dolores dolorum vel sit
                                                    laboriosam numquam molestiae, suscipit consequatur illum deleniti.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container justify-content-center align-items-center">
                                <div class="card mb-3" style="max-width: 1200px;">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="../asset/prod01.jpg" class="img-fluid rounded-start" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between align-items-between">
                                                    <div class="col-6 col-md-3">
                                                        <h2>User Details</h2>
                                                    </div>
                                                    <div class="col-6 col-md-3 text-end">
                                                        <button class="btn btn-outline-secondary">Edit</button>
                                                    </div>
                                                </div>
                                                <ul class="row row-cols-2 g-2 g-lg-3 list-unstyled mt-3">
                                                    <li class="col">
                                                        <h4 class="card-text">Fullname:</h4>
                                                    </li>
                                                    <li class="col">
                                                        <h4 class="card-text">Email:</h4>
                                                    </li>
                                                    <li class="col">
                                                        <h4 class="card-text">Username:</h4>
                                                    </li>
                                                    <li class="col">
                                                        <h4 class="card-title">Number:</h4>
                                                    </li>
                                                    <li class="col">
                                                        <h4 class="card-text">Adresses:</h4>
                                                    </li>
                                                </ul>
                                                <!-- <hr> -->
                                                <!-- <ul class="row row-cols-2 g-2 g-lg-3 list-unstyled">
                                                    <li class="col">
                                                        <span class="card-text">Status:</span>
                                                    </li>
                                                    <li class="col">
                                                        <p class="card-text">Role:</p>
                                                    </li>
                                                </ul> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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