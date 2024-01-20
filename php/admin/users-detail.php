<?php
    require 'session-admin.inc.php';
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Users Detail</title>
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
        <div class="row flex-nowrap">
            <?php
                include_once 'sidebar-admin.inc.php';
            ?>
            <main class="col justify-content-center">
                <?php
                    include_once 'header-admin.inc.php';
                ?>
                <main class="container-fluid p-3 align-items-center h-75">
                    <div class="h-100">
                        <div class="d-flex flex-column h-100">
                            <div class="container justify-content-center align-items-center">
                                <?php
                                        include_once 'db-connect.inc.php';
                                        
                                        $user_id= $_GET['user_id'];

                                        $sql = "SELECT * FROM users WHERE user_id = '$user_id'";            
                                        $result = mysqli_query($conn, $sql);
                                        $row = mysqli_fetch_assoc($result);
                                        
                                        echo"<div class='card mb-3' style='max-width: 1200px;'>
                                        <div class='row g-0'>
                                            <div class='col-md-12'>
                                                <div class='card-body'>
                                                    <div class='d-flex justify-content-between align-items-between'>
                                                        <div class='col-6 col-md-3'>
                                                            <h2>User Details</h2>
                                                        </div>
                                                        <div class='col-6 col-md-3 text-end'>
                                                            <a href='users-update-form.php?user_id=". $row['user_id'] . " ' class='btn btn-outline-secondary'>Edit</a>
                                                        </div>
                                                    </div>
                                                    <div class='p-3'>
                                                    <ul class='row row-cols-2 g-3 g-lg-4 list-unstyled mt-3'>
                                                        <li class='col'>
                                                            <h4 class='card-text'>Username: <small class='fw-normal'> ". $row['username'] . "</small></h4>
                                                        </li>
                                                        <li class='col'>
                                                            <h4 class='card-text'>Email: <small class='fw-normal'> ". $row['email'] . "</small></h4>
                                                        </li>
                                                        <li class='col'>
                                                            <h4 class='card-text'>Fullname: <small class='fw-normal'> ". $row['first_name'] . " ". $row['last_name'] . "</small></h4>
                                                        </li>
                                                            <h4 class='card-title'>Number: <small class='fw-normal'> ". $row['phone_number'] . "</small></h4>
                                                        </li>
                                                        <li class='col'>
                                                            <h4 class='card-text'>Adresses: <small class='fw-normal'> ". $row['address'] . "</small></h4>
                                                        </li>
                                                    </ul>
                                                    </div>
                                                    <!-- <hr> -->
                                                    <!-- <ul class='row row-cols-2 g-2 g-lg-3 list-unstyled'>
                                                        <li class='col'>
                                                            <span class='card-text'>Status:</span>
                                                        </li>
                                                        <li class='col'>
                                                            <p class='card-text'>Role:</p>
                                                        </li>
                                                    </ul> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>"
                                 ?>

                            </div>
                        </div>
                    </div>
        </div>
    </div>
    </main>
    </div>
    </div>
    <?php
        include_once 'offcanvas-admin.inc.php';
    ?>
    <script type="text/javascript" src="../js/sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>