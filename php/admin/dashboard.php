<?php
    require 'session-admin.inc.php';

?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard</title>

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
    <script defer src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap bg-secondary-subtle">
            <?php
                include_once 'sidebar-admin.inc.php';
            ?>
            <main class="col justify-content-center">
                <?php
                    include_once 'header-admin.inc.php';
                ?>
                <article class="container-fluid align-items-center">
                    <section class="d-flex flex-column justify-content-center align-items-center">
                        <div class="container-fluid flex-grow-1 mt-3">
                            <!-- <div class="row">
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
                                                    <img src="../../asset/img/illustrations/man-with-laptop-light.png"
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
                                                        <span class="fw-semibold d-block mb-1 text-uppercase">Active
                                                            User</span>
                                                        <div class="flex-shrink-0">
                                                            <span class="dashboard-icon dashboard-icon-warning">
                                                                <i class="bi bi-person icon"></i>
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
                                                    <span class="fw-semibold d-block mb-1 text-uppercase">Active
                                                        User</span>
                                                    <h3 class="card-title mb-2">10</h3>
                                                    <small class="text-success fw-semibold">
                                                        <i class="bx bx-up-arrow-alt"></i>
                                                        +2
                                                    </small>
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
                                        <div class="col-lg-6 col-md-12 col-6 mb-4">
                                            <div class="card shadow">
                                                <div class="card-body">
                                                    <div
                                                        class="card-title d-flex align-items-start justify-content-between">
                                                        <span class="fw-semibold d-block mb-1 text-uppercase">Active
                                                            User</span>
                                                        <div class="flex-shrink-0">
                                                            <span class="dashboard-icon dashboard-icon-warning">
                                                                <i class="bi bi-person icon"></i>
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
                                                    <span class="fw-semibold d-block mb-1 text-uppercase">Active
                                                        User</span>
                                                    <h3 class="card-title mb-2">10</h3>
                                                    <small class="text-success fw-semibold">
                                                        <i class="bx bx-up-arrow-alt"></i>
                                                        +2
                                                    </small>
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
                            </div> -->
                            <div class="row">

                                <!-- Earnings (Monthly) Card Example -->
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class=" font-weight-bold text-primary text-uppercase mb-1">
                                                        Earnings (Monthly)</div>
                                                    <div class="h5 mb-0 font-weight-bold">$40,000</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="bi bi-calendar fs-5 text-secondary"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Earnings (Monthly) Card Example -->
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-success shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class=" font-weight-bold text-success text-uppercase mb-1">
                                                        Earnings (Annual)</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Earnings (Monthly) Card Example -->
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-info shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class=" font-weight-bold text-info text-uppercase mb-1">
                                                        Tasks
                                                    </div>
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col-auto">
                                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="progress progress-sm mr-2">
                                                                <div class="progress-bar bg-info" role="progressbar"
                                                                    style="width: 50%" aria-valuenow="50"
                                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Pending Requests Card Example -->
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-warning shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class=" font-weight-bold text-warning text-uppercase mb-1">
                                                        Pending Requests</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-comments fa-2x text-gray-300"></i>
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
                    <img src="../../asset/img/icon/tokaku_logo.svg" alt="TOKAKU" width="32" height="32" />
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