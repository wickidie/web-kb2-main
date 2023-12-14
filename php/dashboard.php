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
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard</title>
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
                            <a href="#" class="nav-link active">
                                <i class="bi bi-house"></i>
                                <span class="fs-6 ms-2"> Dashboard </span>
                            </a>
                        </li>
                        <li class="nav-item py-3 py-sm-0 align-items-center">
                            <a href="#" class="nav-link animate collapsed" id="transactions" data-bs-toggle="collapse"
                                data-bs-target="#transaction-collapse">
                                <i class="bi bi-table"></i>
                                <span class="fs-6 ms-2"> Transactions </span>
                            </a>
                            <div class="collapse" id="transaction-collapse">
                                <ul class="btn-toggle-nav list-unstyled">
                                    <li class="">
                                        <a href="transactions.php" class="nav-link">
                                            <i class="bi bi-dot icon"></i>
                                            <span>Transactions</span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="transaction-details.php" class="nav-link">
                                            <i class="bi bi-dot icon"></i>
                                            <span>Transactions Details</span>
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
                <article class="container-fluid align-items-center">
                    <section class="d-flex flex-column justify-content-center align-items-center">
                        <div class="container flex-grow-1 mt-3">
                            <div class="row">
                                <div class="col-lg-8 mb-4 order-0">
                                    <div class="card shadow">
                                        <div class="d-flex align-items-end row">
                                            <div class="col-sm-7">
                                                <div class="card-body">
                                                    <h5 class="card-title text-primary">Congratulations User! 🎉</h5>
                                                    <p class="mb-4">You have done <span class="fw-bold">72%</span> more
                                                        sales today. Check your new badge in your profile.</p>

                                                    <a href="javascript:;" class="btn btn-sm btn-outline-primary">View
                                                        Badges</a>
                                                </div>
                                            </div>
                                            <div class="col-sm-5 text-center text-sm-left">
                                                <div class="card-body pb-0 px-0 px-md-4">
                                                    <img src="../asset/illustrations/man-with-laptop-light.png"
                                                        height="140" alt="View Badge User"
                                                        data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                                        data-app-light-img="illustrations/man-with-laptop-light.png" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 order-1">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12 col-6 mb-4">
                                            <div class="card shadow">
                                                <div class="card-body">
                                                    <div
                                                        class="card-title d-flex align-items-start justify-content-between">
                                                        <div class="flex-shrink-0">
                                                            <span class="dashboard-icon dashboard-icon-success">
                                                                <i class="bi bi-clock icon"></i>
                                                            </span>
                                                        </div>
                                                        <div class="dropdown">
                                                            <span type="button" id="cardOpt3" data-bs-toggle="dropdown"
                                                                aria-haspopup="true" aria-expanded="true">
                                                                <i class="bi bi-three-dots-vertical icon"></i>
                                                            </span>
                                                            <div class="dropdown-menu dropdown-menu-end"
                                                                aria-labelledby="cardOpt3">
                                                                <a class="dropdown-item" href="javascript:void(0);">View
                                                                    More</a>
                                                                <a class="dropdown-item"
                                                                    href="javascript:void(0);">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <span class="fw-semibold d-block mb-1">Profit</span>
                                                    <h3 class="card-title mb-2">$12,628</h3>
                                                    <small class="text-success fw-semibold"><i
                                                            class="bx bx-up-arrow-alt"></i> +72.80%</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-6 mb-4">
                                            <div class="card shadow">
                                                <div class="card-body">
                                                    <div
                                                        class="card-title d-flex align-items-start justify-content-between">
                                                        <div class="avatar flex-shrink-0">
                                                            <span class="dashboard-icon dashboard-icon-cyan">
                                                                <i class="bi bi-wallet icon"></i>
                                                            </span>
                                                        </div>
                                                        <div class="dropdown">
                                                            <span type="button" id="cardOpt3" data-bs-toggle="dropdown"
                                                                aria-haspopup="true" aria-expanded="false">
                                                                <i class="bi bi-three-dots-vertical"></i>
                                                            </span>
                                                            <div class="dropdown-menu dropdown-menu-end"
                                                                aria-labelledby="cardOpt3">
                                                                <a class="dropdown-item" href="javascript:void(0);">View
                                                                    More</a>
                                                                <a class="dropdown-item"
                                                                    href="javascript:void(0);">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <span class="d-block mb-1">Sales</span>
                                                    <h3 class="card-title mb-2">$12,628</h3>
                                                    <small class="text-success fw-semibold"><i
                                                            class="bx bx-up-arrow-alt"></i> +72.80%</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </article>
                <footer></footer>
            </main>
        </div>
    </div>
    <!-- offcanvas -->
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
</body>

</html>