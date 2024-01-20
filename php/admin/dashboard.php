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
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous">
    </script>
    <script defer src="../../js/chart/area.js"></script>
    <script defer src="../../js/chart/bar.js"></script>
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
                            <div class="row">
<<<<<<< HEAD

                                <div class="col-lg-8 mb-4 order-0">
                                    <div class="card shadow">
                                        <div class="d-flex align-items-end row">
                                            <div class="col-sm-7">
                                                <div class="card-body">
                                                    <h5 class="card-title text-primary">Total Sales! 🎉</h5>
                                                    <?php
                                                        $sql = "SELECT sold FROM products";
                                                        $result = mysqli_query($conn, $sql);
                                                        $itemSold = 0;

                                                        if (mysqli_num_rows($result) > 0) {
                                                            while($row = mysqli_fetch_assoc($result)) {
                                                                $itemSold += $row['sold'];
                                                            } 
                                                        }
                                                        echo "<p class='mb-4'>We Sold <span class='fw-bold'>" . $itemSold . "</span> items until now.</p>"
                                                    ?>

                                                    <!-- <a href="javascript:;" class="btn btn-sm btn-outline-primary">View
                                                        Badges</a> -->
=======
                                <!-- Earnings (Monthly) Card Example -->
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class=" fw-bold text-primary text-uppercase mb-1">
                                                        Products sold</div>
                                                    <div class="h5 mb-0 fw-bold">40 <small>products</small></div>
>>>>>>> ac493c8b9aaf33ef7678ccc9e57afd0f694d6b5e
                                                </div>
                                                <div class="col-auto">
                                                    <i class="bi bi-cart-check text-secondary fs-1"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

<<<<<<< HEAD

                                <div class="col-lg-4 col-md-4 order-1">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12 col-6 mb-4">
                                            <div class="card shadow">
                                                <div class="card-body">
                                                    <div
                                                        class="card-title d-flex align-items-start justify-content-between">
                                                        <div class="flex-shrink-0">
                                                            <span class="dashboard-icon dashboard-icon-success">
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
                                                    <span class="fw-semibold d-block mb-1">Total Users</span>
                                                    <?php
                                                        $sql = "SELECT * FROM users";
                                                        $result = mysqli_query($conn, $sql);
                                                        $rows = mysqli_num_rows($result);
                                                        echo "<h3 class='card-title mb-2'>" . $rows . " users</h3>";
                                                    ?>
                                                    <!-- <small class="text-success fw-semibold"><i
                                                            class="bx bx-up-arrow-alt"></i> +72.80%</small> -->
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
=======
                                <!-- Earnings (Monthly) Card Example -->
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class=" fw-bold text-success text-uppercase mb-1">
                                                        Active Users</div>
                                                    <div class="h5 mb-0 fw-bold ">10
                                                        <small>users</small>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="bi bi-person text-secondary fs-1"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Earnings (Monthly) Card Example -->
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="fw-bold text-info text-uppercase mb-1">
                                                        Earning
                                                    </div>
                                                    <div class="h5 mb-0 fw-bold">$40,000 </div>
                                                    <!-- <div class="row no-gutters align-items-center">
                                                        <div class="col-auto">
                                                            <div class="h5 mb-0 mr-3 fw-bold">50%
>>>>>>> ac493c8b9aaf33ef7678ccc9e57afd0f694d6b5e
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="progress progress-sm mr-2">
                                                                <div class="progress-bar bg-info" role="progressbar"
                                                                    style="width: 50%" aria-valuenow="50"
                                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                </div>
                                                <div class="col-auto">
                                                    <i class="bi bi-cash fs-1 text-secondary"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Pending Requests Card Example -->
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class=" fw-bold text-warning text-uppercase mb-1">
                                                        Pending Transactions</div>
                                                    <div class="h5 mb-0 fw-bold ">2
                                                        <small>transaction</small>
                                                    </div>
<<<<<<< HEAD
                                                    <span class="d-block mb-1">Products</span>
                                                    <?php
                                                        $sql = "SELECT purchase FROM users";
                                                        $result = mysqli_query($conn, $sql);
                                                        $rows = mysqli_num_rows($result);
                                                        echo "<h3 class='card-title mb-2'>" . $rows . " products</h3>";
                                                    ?>
                                                    <!-- <small class="text-success fw-semibold"><i
                                                            class="bx bx-up-arrow-alt"></i> +72.80%</small> -->
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
                                                    <span class="d-block mb-1">Top Buyers</span>
                                                    <?php
                                                        $sql = "SELECT * FROM users";
                                                        $result = mysqli_query($conn, $sql);
                                                        $topBuyers = 0;
                                                        $topBuyersName = 0;

                                                        if (mysqli_num_rows($result) > 0) {
                                                            while($row = mysqli_fetch_assoc($result)) {
                                                                if ($topBuyers < $row['purchase']) {
                                                                    $topBuyers = $row['purchase'];
                                                                    $topBuyersName = $row['username'];
                                                                }
                                                            } 
                                                        }

                                                        echo "<h3 class='card-title mb-2'>" . $topBuyersName . "</h3>";
                                                    ?>
                                                    <!-- <small class="text-success fw-semibold"><i
                                                            class="bx bx-up-arrow-alt"></i> +72.80%</small> -->
=======
                                                </div>
                                                <div class="col-auto">
                                                    <i class="bi bi-envelope-exclamation text-secondary fs-1 "></i>
>>>>>>> ac493c8b9aaf33ef7678ccc9e57afd0f694d6b5e
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <i class="bi bi-graph-up me-1"></i>
                                            Product sold
                                        </div>
                                        <div class="card-body"><canvas id="myAreaChart" width="100%"
                                                height="40"></canvas></div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <i class="bi bi-bar-chart me-1"></i>
                                            Top Selling Product
                                        </div>
                                        <div class="card-body"><canvas id="myBarChart" width="100%"
                                                height="40"></canvas></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="d-flex flex-column justify-content-center align-items-center">
                        <div class="container-fluid">
                            <div class="row pb-4">
                                <div class="col-xl-6">
                                    <div class="card shadow">
                                        <div class="card-header">
                                            <i class="bi bi-bag-check me-1"></i>
                                            Best Seller
                                        </div>
                                        <div class="card-body pb-0">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="col-12 col-md-12">
                                                    <form method="GET">
                                                        <div class="input-group my-2">
                                                            <input type="text" class="form-control form-control-sm"
                                                                id="myInput" name="search" placeholder="Search"
                                                                aria-label="Search" aria-describedby="searchph" />
                                                            <button
                                                                class="input-group-text btn btn-secondary rounded-end-1"
                                                                type="submit" id="searchph">
                                                                <i class="bi bi-search"></i>
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- <div class="col-3 col-xs-1 col-sm-2 col-md-1">
                        <a href="products-form.php" class="btn btn-secondary">Export</a>
                      </div> -->
                                            </div>
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class="table-responsive">
                                                <table id="example" class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Position</th>
                                                            <th>Office</th>
                                                            <th>Age</th>
                                                            <th>Start date</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Herrod Chandler</td>
                                                            <td>Sales Assistant</td>
                                                            <td>San Francisco</td>
                                                            <td>59</td>
                                                            <td>2012-08-06</td>
                                                            <td>$137,500</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Hermione Butler</td>
                                                            <td>Regional Director</td>
                                                            <td>London</td>
                                                            <td>47</td>
                                                            <td>2011-03-21</td>
                                                            <td>$356,250</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Lael Greer</td>
                                                            <td>Systems Administrator</td>
                                                            <td>London</td>
                                                            <td>21</td>
                                                            <td>2009-02-27</td>
                                                            <td>$103,500</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Jonas Alexander</td>
                                                            <td>Developer</td>
                                                            <td>San Francisco</td>
                                                            <td>30</td>
                                                            <td>2010-07-14</td>
                                                            <td>$86,500</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Shad Decker</td>
                                                            <td>Regional Director</td>
                                                            <td>Edinburgh</td>
                                                            <td>51</td>
                                                            <td>2008-11-13</td>
                                                            <td>$183,000</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Michael Bruce</td>
                                                            <td>Javascript Developer</td>
                                                            <td>Singapore</td>
                                                            <td>29</td>
                                                            <td>2011-06-27</td>
                                                            <td>$183,000</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Donna Snider</td>
                                                            <td>Customer Support</td>
                                                            <td>New York</td>
                                                            <td>27</td>
                                                            <td>2011-01-25</td>
                                                            <td>$112,000</td>
                                                        </tr>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Position</th>
                                                            <th>Office</th>
                                                            <th>Age</th>
                                                            <th>Start date</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="card shadow">
                                        <div class="card-header">
                                            <i class="bi bi-person-lines-fill me-1"></i>
                                            Top buyers
                                        </div>
                                        <div class="card-body pb-0">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="col-12 col-md-12">
                                                    <form method="GET">
                                                        <div class="input-group my-2">
                                                            <input type="text" class="form-control form-control-sm"
                                                                id="myInput" name="search" placeholder="Search"
                                                                aria-label="Search" aria-describedby="searchph" />
                                                            <button
                                                                class="input-group-text btn btn-secondary rounded-end-1"
                                                                type="submit" id="searchph">
                                                                <i class="bi bi-search"></i>
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- <div class="col-3 col-xs-1 col-sm-2 col-md-1">
                        <a href="products-form.php" class="btn btn-secondary">Export</a>
                      </div> -->
                                            </div>
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class="table-responsive">
                                                <table id="example" class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Position</th>
                                                            <th>Office</th>
                                                            <th>Age</th>
                                                            <th>Start date</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Herrod Chandler</td>
                                                            <td>Sales Assistant</td>
                                                            <td>San Francisco</td>
                                                            <td>59</td>
                                                            <td>2012-08-06</td>
                                                            <td>$137,500</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Hermione Butler</td>
                                                            <td>Regional Director</td>
                                                            <td>London</td>
                                                            <td>47</td>
                                                            <td>2011-03-21</td>
                                                            <td>$356,250</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Lael Greer</td>
                                                            <td>Systems Administrator</td>
                                                            <td>London</td>
                                                            <td>21</td>
                                                            <td>2009-02-27</td>
                                                            <td>$103,500</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Jonas Alexander</td>
                                                            <td>Developer</td>
                                                            <td>San Francisco</td>
                                                            <td>30</td>
                                                            <td>2010-07-14</td>
                                                            <td>$86,500</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Shad Decker</td>
                                                            <td>Regional Director</td>
                                                            <td>Edinburgh</td>
                                                            <td>51</td>
                                                            <td>2008-11-13</td>
                                                            <td>$183,000</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Michael Bruce</td>
                                                            <td>Javascript Developer</td>
                                                            <td>Singapore</td>
                                                            <td>29</td>
                                                            <td>2011-06-27</td>
                                                            <td>$183,000</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Donna Snider</td>
                                                            <td>Customer Support</td>
                                                            <td>New York</td>
                                                            <td>27</td>
                                                            <td>2011-01-25</td>
                                                            <td>$112,000</td>
                                                        </tr>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Position</th>
                                                            <th>Office</th>
                                                            <th>Age</th>
                                                            <th>Start date</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card shadow">
                                <div class="card-header">
                                    <i class="bi bi-table me-1"></i>
                                    Tabel alternatif kalau ga mau pakai yg tabel kiri kanan
                                </div>
                                <div class="card-body pb-0">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="col-12 col-md-12">
                                            <form method="GET">
                                                <div class="input-group my-2">
                                                    <input type="text" class="form-control form-control-sm" id="myInput"
                                                        name="search" placeholder="Search" aria-label="Search"
                                                        aria-describedby="searchph" />
                                                    <button class="input-group-text btn btn-secondary rounded-end-1"
                                                        type="submit" id="searchph">
                                                        <i class="bi bi-search"></i>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- <div class="col-3 col-xs-1 col-sm-2 col-md-1">
                        <a href="products-form.php" class="btn btn-secondary">Export</a>
                      </div> -->
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Position</th>
                                                    <th>Office</th>
                                                    <th>Age</th>
                                                    <th>Start date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Herrod Chandler</td>
                                                    <td>Sales Assistant</td>
                                                    <td>San Francisco</td>
                                                    <td>59</td>
                                                    <td>2012-08-06</td>
                                                    <td>$137,500</td>
                                                </tr>
                                                <tr>
                                                    <td>Hermione Butler</td>
                                                    <td>Regional Director</td>
                                                    <td>London</td>
                                                    <td>47</td>
                                                    <td>2011-03-21</td>
                                                    <td>$356,250</td>
                                                </tr>
                                                <tr>
                                                    <td>Lael Greer</td>
                                                    <td>Systems Administrator</td>
                                                    <td>London</td>
                                                    <td>21</td>
                                                    <td>2009-02-27</td>
                                                    <td>$103,500</td>
                                                </tr>
                                                <tr>
                                                    <td>Jonas Alexander</td>
                                                    <td>Developer</td>
                                                    <td>San Francisco</td>
                                                    <td>30</td>
                                                    <td>2010-07-14</td>
                                                    <td>$86,500</td>
                                                </tr>
                                                <tr>
                                                    <td>Shad Decker</td>
                                                    <td>Regional Director</td>
                                                    <td>Edinburgh</td>
                                                    <td>51</td>
                                                    <td>2008-11-13</td>
                                                    <td>$183,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Michael Bruce</td>
                                                    <td>Javascript Developer</td>
                                                    <td>Singapore</td>
                                                    <td>29</td>
                                                    <td>2011-06-27</td>
                                                    <td>$183,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Donna Snider</td>
                                                    <td>Customer Support</td>
                                                    <td>New York</td>
                                                    <td>27</td>
                                                    <td>2011-01-25</td>
                                                    <td>$112,000</td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Position</th>
                                                    <th>Office</th>
                                                    <th>Age</th>
                                                    <th>Start date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </article>

            </main>
        </div>
    </div>
    <?php
        include_once 'offcanvas-admin.inc.php';
    ?>
</body>

</html>