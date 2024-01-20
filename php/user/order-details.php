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
    <title>Order Detail</title>
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
        <article class="card rounded-3">
            <section class="card-body">
                <form method="GET" class="w-100">
                    <div class="input-group my-2">
                        <input type="text" class="form-control form-control-sm" id="myInput" name="search"
                            placeholder="Search for transaction_detail_id" aria-label="Search"
                            aria-describedby="searchph" <?php echo "value = $search_value" ?>>
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
                                    <th scope="col">Transaction Id</th>
                                    <th scope="col">Transaction Detail Id</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Product Price</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
              $items_per_page = 10;
              $sql = "SELECT td.transaction_detail_id, td.transaction_id, td.product_id, p.product_name, td.quantity, td.product_price FROM transaction_details td 
                      JOIN products p ON td.product_id = p.product_id";
              $result = mysqli_query($conn, $sql);
              $rows = mysqli_num_rows($result);

              $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
              $offset = ($current_page - 1) * $items_per_page;
              
              if (isset($_GET['search'])) {
                  if (!empty($_GET['search'])) {
                      $sql = "SELECT td.transaction_detail_id, td.transaction_id, td.product_id, p.product_name, td.quantity, td.product_price FROM transaction_details td 
                      INNER JOIN products p ON td.product_id = p.product_id 
                      INNER JOIN transactions t ON td.transaction_id = t.transaction_id
                      WHERE transaction_detail_id like '%$search_value%' AND user_id = $user_id ORDER BY transaction_id DESC LIMIT $offset, $items_per_page";
                      $result = mysqli_query($conn, $sql);
                      $sql = "SELECT td.transaction_detail_id, td.transaction_id, td.product_id, p.product_name, td.quantity, td.product_price FROM transaction_details td 
                      INNER JOIN products p ON td.product_id = p.product_id 
                      INNER JOIN transactions t ON td.transaction_id = t.transaction_id
                      WHERE transaction_detail_id like '%$search_value%' AND user_id = $user_id ORDER BY transaction_id DESC";
                      $result_total = mysqli_query($conn, $sql);
                      $rows = mysqli_num_rows($result_total);
                  }else{
                      $sql = "SELECT td.transaction_detail_id, td.transaction_id, td.product_id, p.product_name, td.quantity, td.product_price FROM transaction_details td 
                      INNER JOIN products p ON td.product_id = p.product_id 
                      INNER JOIN transactions t ON td.transaction_id = t.transaction_id
                      WHERE transaction_detail_id like '%$search_value%' AND user_id = $user_id ORDER BY transaction_id DESC LIMIT $offset, $items_per_page";
                      $result = mysqli_query($conn, $sql);
                  }
              }else{
                  $sql = "SELECT td.transaction_detail_id, td.transaction_id, td.product_id, p.product_name, td.quantity, td.product_price FROM transaction_details td 
                  INNER JOIN products p ON td.product_id = p.product_id 
                INNER JOIN transactions t ON td.transaction_id = t.transaction_id
                WHERE transaction_detail_id like '%$search_value%' AND user_id = $user_id ORDER BY transaction_id DESC LIMIT $offset, $items_per_page";
                  $result = mysqli_query($conn, $sql);
              }
              
              $total_page = ceil($rows/$items_per_page);
              $previous = $current_page - 1;
              $next = $current_page + 1;

              if (mysqli_num_rows($result) > 0) {
                  while($row = mysqli_fetch_assoc($result)) {
                      echo "<tr>";
                      echo "<td>" . $row['transaction_id'] . "</td>";
                      echo "<td>" . $row['transaction_detail_id'] . "</td>";
                      echo "<td>" . $row['product_name'] . "</td>";
                      echo "<td>" . number_format($row['quantity'], 0, ',', '.') . "</td>";
                      echo "<td>IDR " . number_format($row['product_price'], 2, ',', '.') . "</td>";
                      echo "<td>IDR " . number_format($row['quantity'] * $row['product_price'], 2, ',', '.') . "</td>";
                      echo "<tr>";
                  }
              } else {
                  echo "<tr>";
                  echo "<td colspan='7' class='text-center'>" . "0 results" . "</td>";
                  echo "<tr>";
              }

            ?>
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