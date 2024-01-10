<?php
    require 'session-admin.inc.php';
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payment</title>
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
                                        
                                        $transaction_id= $_GET['transaction_id'];

                                        $sql = "SELECT * FROM transactions WHERE transaction_id = '$transaction_id'";            
                                        $result = mysqli_query($conn, $sql);
                                        $row = mysqli_fetch_assoc($result);
                                        
                                        echo"<div class='card mb-3 align-items-center' style='max-width: 1200px;'>
                                        <div class='row g-0'>
                                            <div class='col-md-12'>
                                                <div class='card-body'>
                                                    <img src='../../asset/img/payment/" . $row['status'] . "' alt=''>
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
    <script type="text/javascript" src="../js/sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>