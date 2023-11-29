<?php
    session_start();
    include_once 'db-connect.inc.php';
    $username = $_SESSION['username'];
    if (isset($username)&& !empty($username)) {
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
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="d-flex flex-column bg-body-tertiary col-auto min-vh-100 justify-content-center p-xl-3 p-1">
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
                            <a href="#" class="nav-link  active" aria-current="page">
                                <i class="bi bi-house"></i>
                                <span class="d-none fs-5 ms-2 d-sm-inline">
                                    Home
                                </span>
                            </a>
                        </li>
                        <li class="nav-item py-2 py-sm-0 disabled">
                            <a href="#" class="nav-link">
                                <i class="bi bi-speedometer2"></i>
                                <span class="d-none fs-5 ms-2 d-sm-inline">
                                    Dashboard
                                </span>
                            </a>
                        </li>
                        <li class="nav-item py-2 py-sm-0 disabled">
                            <a href="transactions.php" class="nav-link">
                                <i class="bi bi-table"></i>
                                <span class="d-none fs-5 ms-2 d-sm-inline">
                                    Transactions
                                </span>
                            </a>
                        </li>
                        <li class="nav-item py-2 py-sm-0 disabled">
                            <a href="products.php" class="nav-link">
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
                <div class="px-xl-2 p-1 ">
                    <div class="dropup">
                        <a href="#"
                            class="d-flex justify-content-center justify-content-sm-start align-items-center link-body-emphasis text-decoration-none dropdown-toggle"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="../img/kingsman.jpg" alt="ntnlmg" width="32" height="32"
                                class="rounded-circle me-1 me-sm-2">
                            <span class="d-none d-sm-inline"><strong>User</strong></span>
                        </a>
                        <ul class="dropdown-menu text-small shadow">
                            <li><a class="dropdown-item" href="#">New project...</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="user-logout.php">Sign out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-auto min-vh-100 justify-content-center p-3">
                <div class="container">
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>