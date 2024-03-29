<?php
    require 'session-admin.inc.php';

    $search_value = $_GET['search'] ?? null;
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Transactions</title>
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
                include_once 'sidebar-admin.inc.php';
            ?>
            <main class="col justify-content-center">
                <?php
                    include_once 'header-admin.inc.php';
                ?>
                <article class="p-3">
                    <section class="d-flex justify-content-center align-items-center">
                        <div class="container-fluid">
                            <!-- <span aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Transactions</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Transactions</li>
                                </ol>
                            </span> -->
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
                                                    <th scope="col">Payment</th>
                                                    <th scope="col">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                            $items_per_page = 10;
                                            $sql = "SELECT t.transaction_id, t.transaction_date, t.transaction_total, t.status, t.user_id, u.username, u.address, payment FROM transactions t JOIN users u ON t.user_id = u.user_id ORDER BY t.transaction_id DESC";
                                            $result = mysqli_query($conn, $sql);
                                            $rows = mysqli_num_rows($result);
                                            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                                            $offset = ($current_page - 1) * $items_per_page;
                                            
                                            if (isset($_GET['search'])) {
                                                if (!empty($_GET['search'])) {
                                                    $sql = "SELECT t.transaction_id, t.transaction_date, t.transaction_total, t.status, t.user_id, u.username, u.address, payment FROM transactions t JOIN users u ON t.user_id = u.user_id where transaction_date like '%$search_value%' ORDER BY t.transaction_id DESC  LIMIT $offset, $items_per_page";
                                                    $result = mysqli_query($conn, $sql);
                                                    $sql = "SELECT * FROM transactions where transaction_date like '%$search_value%' ORDER BY transaction_id DESC";
                                                    $result_total = mysqli_query($conn, $sql);
                                                    $rows = mysqli_num_rows($result_total);
                                                }else{
                                                    $sql = "SELECT t.transaction_id, t.transaction_date, t.transaction_total, t.status, t.user_id, u.username, u.address, payment FROM transactions t JOIN users u ON t.user_id = u.user_id ORDER BY t.transaction_id DESC LIMIT $offset, $items_per_page";
                                                    $result = mysqli_query($conn, $sql);
                                                }
                                            }else{
                                                $sql = "SELECT t.transaction_id, t.transaction_date, t.transaction_total, t.status, t.user_id, u.username, u.address, payment FROM transactions t JOIN users u ON t.user_id = u.user_id  
                                                ORDER BY t.transaction_id DESC
                                                LIMIT $offset, $items_per_page";
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
                                                    if (empty($row['payment'])) {
                                                        echo "<a href='https://wa.me/6281993669316?text=Hello sir, the username (" . $row['username'] . ") hasn`t pay their (IDR " . number_format($row['transaction_total'], 2, ',', '.') . ") bill yet. Please raid their house on this location (" . $row['address'] . "). Good luck and Be carefull o7.' class='btn btn-danger btn-sm'>Call Debt Collector</button>";
                                                    }else{
                                                        echo "<a href='payment.php?transaction_id=" . $row['transaction_id'] . "' class='btn btn-primary btn-sm'>Payment</button>";
                                                    }
                                                    echo "</td>";
                                                    echo "<td>";
                                                    echo "
                                                    <form action='transaction-update-status.php' method=post>
                                                    <select name='status'>
                                                    <option value='Status'>" . $row['status'] . "</option>
                                                    <option value='Valid'>Valid</option>
                                                    <option value='Invalid'>Invalid</option>
                                                    <option value='Pending'>Pending</option>
                                                    <option value='Delivering'>Delivering</option>
                                                    <option value='Received'>Received</option>
                                                    </select>";
                                                    echo "<input type='hidden' name='transaction_id' value='" . $row['transaction_id'] . "'/>
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
    </div>
    <?php
        include_once 'offcanvas-admin.inc.php';
    ?>
</body>
<!-- Payment modal -->
<div class="modal modal-fade" id="PaymentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="margin-top: 0px;">
        <div class="modal-content">
            <div class="modal-body" id="exampleModalLabel">
                <img src="../../asset/img/payment/Pepe_Business_flip.png" alt="">
            </div>
            <button id="close" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close" type="submit"></button>
        </div>
    </div>
</div>
<script>
// Get the modal
var modal = document.getElementById("PaymentModal");

// Get the button that opens the modal
var btn = document.getElementById("PaymentButton");

// Get the <span> element that closes the modal
var span = document.getElementById("close");

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</html>