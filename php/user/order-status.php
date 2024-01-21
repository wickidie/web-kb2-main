<?php
    require 'session-users.inc.php';

    $search_value = $_GET['search'] ?? null;
    $sql = "SELECT * FROM product_category";
    $result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en" data-bs-target="dark">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Order Status</title>
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
    <link rel="stylesheet" href="../../css/user/style.css" />
    <!-- Javascript -->
    <script defer type="text/javascript" src="../../js/theme.js"></script>
    <script defer type="text/javascript" src="../../js/page.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</head>

<body class="bg-img background">
    <?php 
    include_once 'header.inc.php';
    ?>

    <main class="container p-3 mb-auto">
        <article class="rounded-3">
            <section class="container">
                <form method="GET" class="w-100">
                    <div class="input-group my-2">
                        <input type="text" class="form-control form-control-sm" id="myInput" name="search"
                            placeholder="Search for transaction_id" aria-label="Search" aria-describedby="searchph"
                            <?php echo "value = $search_value" ?>>
                        <button class="input-group-text btn btn-outline-secondary rounded-end-1" type="submit"
                            id="searchph">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>
                <div class="row justify-content-center align-items-center">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col">Transaction ID</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Transaction Total</th>
                                    <!-- <th scope="col">Username</th> -->
                                    <th scope="col">Time Left</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Payment</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
              $user_id = $_SESSION['user_id'];
              $items_per_page = 10;
              $sql = "SELECT t.transaction_id, t.transaction_date, t.transaction_total, t.status, t.user_id, u.username, t.payment FROM transactions t JOIN users u ON t.user_id = u.user_id WHERE t.user_id = $user_id";
              $result = mysqli_query($conn, $sql);
              $rows = mysqli_num_rows($result);
              $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
              $offset = ($current_page - 1) * $items_per_page;
              
              if (isset($_GET['search'])) {
                  if (!empty($_GET['search'])) {
                      $sql = "SELECT t.transaction_id, t.transaction_date, t.transaction_total, t.status, t.user_id, u.username, t.payment FROM transactions t JOIN users u ON t.user_id = u.user_id where transaction_date like '%$search_value%' AND t.user_id = $user_id ORDER BY transaction_id DESC LIMIT $offset, $items_per_page";
                      $result = mysqli_query($conn, $sql);
                      $sql = "SELECT t.transaction_id, t.transaction_date, t.transaction_total, t.status, t.user_id, u.username, t.payment FROM transactions t JOIN users u ON t.user_id = u.user_id where transaction_date like '%$search_value%' AND t.user_id = $user_id ORDER BY transaction_id DESC LIMIT $offset, $items_per_page";
                      $result_total = mysqli_query($conn, $sql);
                      $rows = mysqli_num_rows($result_total);
                  }else{
                      $sql = "SELECT t.transaction_id, t.transaction_date, t.transaction_total, t.status, t.user_id, u.username, t.payment FROM transactions t JOIN users u ON t.user_id = u.user_id WHERE t.user_id = $user_id ORDER BY transaction_id DESC LIMIT $offset, $items_per_page";
                      $result = mysqli_query($conn, $sql);
                  }
              }else{
                  $sql = "SELECT t.transaction_id, t.transaction_date, t.transaction_total, t.status, t.user_id, u.username, t.payment FROM transactions t JOIN users u ON t.user_id = u.user_id WHERE t.user_id = $user_id ORDER BY transaction_id DESC LIMIT $offset, $items_per_page";
                  $result = mysqli_query($conn, $sql);
              }
              
              $total_page = ceil($rows/$items_per_page);
              $previous = $current_page - 1;
              $next = $current_page + 1;

              if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                  $formattedDate = date('d-m-Y', strtotime($row['transaction_date']));
                    $id =  $row['transaction_id'];
                    $time = $row['transaction_date'];
                    $timeVal = "SELECT TIMEDIFF(CURRENT_TIMESTAMP, '$time') AS time_diff";
                    $res = mysqli_query($conn, $timeVal);
                    $a = "";
                    while($x = mysqli_fetch_assoc($res)) {
                        $a = $x['time_diff'];
                        if ((int)substr($a, 0, 2) >= 48) {
                            $updateStatus = "UPDATE `transactions` SET `status`='Invalid' WHERE transaction_id = $id";
                            mysqli_query($conn, $updateStatus);
                        }
                    };

                    echo "<tr>";
                    echo "<td>" . $row['transaction_id'] . "</td>";
                    echo "<td>" . $formattedDate . "</td>";
                    echo "<td>IDR " . number_format($row['transaction_total'], 2, ',', '.') . "</td>";
                    // echo "<td>" . $row['username'] . "</td>";
                    if ($row['status'] == 'Pending' || $row['status'] == 'Invalid') {
                        echo "<td>" . $a . "/48:00:00</td>";
                    }else{
                        echo "<td>None</td>";

                    }
                    echo "<td>";
                    if ($row['status'] == 'Pending' || $row['status'] == 'Invalid') {
                        echo '
                        <form action="transactions-delete.php?transaction_id=' . $row['transaction_id'] . '" method="POST">'
                        . $row['status'] . 
                        '<button type="submit" class="btn btn-danger btn-sm ms-3"><i class="bi bi-x-lg"></i></button>
                        </form></div>';
                    }else{
                        echo '<div class="3">
                        <form action="invoice.php" method="POST">'
                        . $row['status'] .
                        '<input class="form-control form-control-sm d-none" name="transaction_id" id="transaction_id" value="' . $row['transaction_id'] . '">
                        <button type="submit" class="btn btn-success"><i class="bi bi-printer   "></i></button>
                        </form>
                        </div>';
                    }
                    echo "</td>";
                    echo "<td>";
                    if (empty($row['payment'])) {
                        echo '<form action="payment-add.php?transaction_id=' . $row['transaction_id'] . '" method="POST" enctype="multipart/form-data">';
                        echo '<div class="row mb-3">';
                        echo '<div class="col-auto"><input class="form-control form-control-sm" id="image" type="file" name="image" placeholder="Upload media" required></div>';
                        echo '<div class="col-auto"><button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-upload"></i></button></div>';
                        echo '</div>';
                        echo '</form>';
                    }else{
                        if ($row['status'] != 'Invalid' && $row['status'] != 'Pending') {
                            echo '<div class="row mb-3">
                            <a href="payment.php?transaction_id=' . $row['transaction_id'] . '" class="btn btn-primary btn-sm">' . $row['payment'] . '</button>';
                            if ($row['status'] == 'Delivering') {
                                echo "<a href='order-received.php?transaction_id=" . $row['transaction_id'] . "&status=Received" . "' class='btn btn-warning btn-sm mt-3'>I Received My Order</button>";
                            }
                            echo '</div>';
                        }else{
                            // echo '<div class="row mb-3">
                            // <form action="payment-update.php?transaction_id=' . $row['transaction_id'] . '" method="POST" enctype="multipart/form-data">
                            // <div class="col mb-3">
                            // <input class="form-control form-control-sm" id="image" type="file" name="image" placeholder="Upload media" required>
                            // <button type="submit" class="btn btn-warning">Update</button></div></form>
                            // <form action="payment-delete.php?transaction_id=' . $row['transaction_id'] . '" method="POST">
                            // <div class="col mb-3">
                            // <button type="submit" class="btn btn-danger">Delete</button>
                            // </div></form>';
                            echo '
                            <div class="mb-2"><a href="payment.php?transaction_id=' . $row["transaction_id"] . '" class="btn btn-primary btn-sm"><span class="text-wrap">' . $row["payment"] . '</span></a></div>
                            <div class="row">
                            <div class="col-auto">
                                <form action="payment-update.php?transaction_id=' . $row['transaction_id'] . '" method="POST" enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <div class="col"><input class="form-control form-control-sm" id="image" type="file" name="image" placeholder="Upload media" required /></div>
                                    <div class="col-auto"><button type="submit" class="btn btn-warning btn-sm"><i class="bi bi-arrow-clockwise"></i></button></div>
                                </div>
                                </form>
                            </div>
                            <div class="col-auto">
                                <form action="payment-delete.php?transaction_id=' . $row['transaction_id'] . '" method="POST">
                                <div class="">
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                </div>
                                </form>
                            </div>
                            </div>';
                        }
                    }
                    echo "</td>";
                    echo "<tr>";
                } 
            } else {
                echo "<tr>";
                echo "<td colspan='7' class='text-center'>" . "0 results" . "</td>";
                echo "<tr>";
            }

            ?>
                                </form>
                            </tbody>
                        </table>
                    </div>
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center m-0">
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
            </section>
        </article>
    </main>

    <?php 
    include_once 'offcanvas.inc.php';
    ?>

    <?php 
    include_once 'footer.inc.php';
    ?>
</body>

</html>