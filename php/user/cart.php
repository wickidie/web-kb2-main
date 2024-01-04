<?php
    // require 'session-users.inc.php';
    include_once 'db-connect.inc.php';
    include_once 'web-kb2.inc.php';
    $user_id = 1;

?>

<!DOCTYPE html>
<html lang="en" data-bs-target="dark">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cart</title>
    <!-- icon -->
    <link rel="icon" href="../../asset/img/logo/tokaku_logo.svg" type="image/x-icon" />
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

    <main class="container p-3">
        <article class="rounded-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-chevron p-3">
                    <li class="breadcrumb-item">
                        <a class="link-body-emphasis" href="landing_page.html">
                            <i class="bi bi-house-door-fill" width="16" height="16"></i>
                            <span class="visually-hidden">Home</span>
                        </a>
                    </li>
                    <!-- <li class="breadcrumb-item active">
              <a class="link-body-emphasis fw-semibold text-decoration-none" href="#">Cart</a>
            </li> -->
                    <li class="breadcrumb-item active" aria-current="page">Cart</li>
                </ol>
            </nav>

            <section class="container">
                <div>
                    <p class="fs-2 fw-bold">Shopping cart <small class="fw-light">(1)</small></p>
                </div>
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-transparent">
                        <ul class="row justify-content-between align-items-center list-unstyled m-0">
                            <li class="col text-center"><span>Product</span></li>
                            <li class="col d-none d-md-inline-block"><span class="visually-hidden">product name</span>
                            </li>
                            <li class="col d-none d-sm-inline-block text-center text-md-start"><span>QTT</span></li>
                            <li class="col text-center text-md-start"><span>Total</span></li>
                            <li class="col d-none d-xl-inline-block"><span class="visually-hidden">action</span></li>
                        </ul>
                    </div>

                    <?php

              $items_per_page = 10;
              // $search_value = '';
              $sql = "SELECT c.cart_id, c.user_id, u.username, p.product_id, p.product_name, c.quantity, p.product_price, c.created_at FROM cart c 
                      JOIN users u ON c.user_id = u.user_id
                      JOIN products p ON c.product_id = p.product_id
                      -- ORDER BY c.cart_id
                      WHERE c.user_id = $user_id;";
              $result = mysqli_query($conn, $sql);
              $rows = mysqli_num_rows($result);

              $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
              $offset = ($current_page - 1) * $items_per_page;

              // if (isset($_GET['search'])) {
              //     $search_value = $_GET['search'];
              //     if (!empty($_GET['search'])) {
              //         $sql = "SELECT * FROM cart where cart_id like '%$search_value%' LIMIT $offset, $items_per_page";
              //         $result = mysqli_query($conn, $sql);
              //         $sql = "SELECT * FROM cart where cart_id like '%$search_value%'";
              //         $result_total = mysqli_query($conn, $sql);
              //         $rows = mysqli_num_rows($result_total);
              //     }else{
              //         $sql = "SELECT * FROM cart WHERE 1 LIMIT $offset, $items_per_page";
              //         $result = mysqli_query($conn, $sql);
              //     }
              // }else{
                $sql = "SELECT c.cart_id, c.user_id, u.username, p.product_id, p.product_name, c.quantity, p.product_price, c.created_at FROM cart c 
                JOIN users u ON c.user_id = u.user_id
                JOIN products p ON c.product_id = p.product_id
                -- ORDER BY c.cart_id
                WHERE c.user_id = $user_id LIMIT $offset, $items_per_page";
                $result = mysqli_query($conn, $sql);
              // }

              $total_page=ceil($rows/$items_per_page);
              $previous = $current_page - 1;
              $next = $current_page + 1;

              $total = 0;

              if (mysqli_num_rows($result) > 0) {
                $c = $offset + 1;
                while ($row = mysqli_fetch_assoc($result)) {

                  echo "<div class='card-body'>";
                  echo "<ul class='row justify-content-between list-unstyled m-0'>";
                  echo "<li class='col-auto order-1 text-center p-0 me-3'><img src='../../asset/img/product/prod01.jpg' alt='product01' class='img-fluid rounded-start' height='100px' width='100px' /></li>";
                  echo "<li class='col order-2 text-start text-wrap p-0'>";

                  echo "<p class='mt-3'>" . $row['product_name'] . "</p>";
                  echo "<small>IDR " . number_format($row['product_price'], 2, ',', '.') . "</small>";
                  echo "</li>";
                  echo "<li class='col order-4 order-sm-3 text-start text-md-end text-xl-center'>";
                  echo "<form class='' action='cart-update.php' method='post'>";
                  echo     "<input type='number' class='form-control-sm mt-3' id='quantity' name='quantity' placeholder='Quantity' aria-label='Search' aria-describedby='searchph' value='" . $row['quantity'] . "' min='1' />";
                  echo "</form>";
                  echo  "</li>";
                  echo  "<li class='col order-3 order-sm-4 text-center'>";
                  echo    "<p class='col mt-3'><span>" . number_format((countTotalPerItem($row['product_price'], $row['quantity'])), 2, ',', '.') . "</span></p>";
                  $total += ($row['product_price'] * $row['quantity']);
                  echo  "</li>";
                  echo  "<li class='col order-5 text-center d-none d-xl-inline-block'>";
                  echo    "<a type='button' class='mt-3' href='cart-delete.php?cart_id=" . $row['cart_id'] . "'><i class='bi bi-trash'></i></a>";
                  echo  "</li>";
                  echo "</ul>";
                  echo "<div class=''>";
                  echo  "<a type='button' class='btn btn-danger w-100 d-inline-block d-xl-none mt-3'> Remove <i class='bi bi-trash'></i></a>";
                  echo "</div>";
                  echo  "</div>";
                  echo "<hr />";
                }
              }

            ?>

                    <!-- <div class="card-body">
              <ul class="row justify-content-between list-unstyled m-0">
                <li class="col-auto order-1 text-center p-0 me-3"><img src="../../asset/img/product/prod01.jpg" alt="product01" class="img-fluid rounded-start" height="100px" width="100px" /></li>
                <li class="col order-2 text-start text-wrap p-0">
                  <p class="mt-3">Product 2</p>
                  <small>Rp15.000</small>
                </li>
                <li class="col order-4 order-sm-3 text-start text-md-end text-xl-center">
                  <form class="" action="post">
                    <input type="number" class="form-control-sm mt-3" id="quantity" name="quantity" placeholder="Quantity" aria-label="Search" aria-describedby="searchph" value="1" />
                  </form>
                </li>
                <li class="col order-3 order-sm-4 text-center">
                  <p class="col mt-3"><span>Rp15000</span></p>
                </li>
                <li class="col order-5 text-center d-none d-xl-inline-block">
                  <a type="button" class="mt-3"><i class="bi bi-trash"></i></a>
                </li>
              </ul>
              <div class="">
                <a type="button" class="btn btn-danger w-100 d-inline-block d-xl-none mt-3"> Remove <i class="bi bi-trash"></i></a>
              </div>
            </div>
            <hr /> -->

                    <!-- <div class="card-body">
              <ul class="row justify-content-between list-unstyled m-0">
                <li class="col-auto order-1 text-center p-0 me-3"><img src="../../asset/img/product/prod01.jpg" alt="product01" class="img-fluid rounded-start" height="100px" width="100px" /></li>
                <li class="col order-2 text-start text-wrap p-0">
                  <p class="mt-3">Product 3</p>
                  <small>Rp15.000</small>
                </li>
                <li class="col order-4 order-sm-3 text-start text-md-end text-xl-center">
                  <form class="" action="post">
                    <input type="number" class="form-control-sm mt-3" id="quantity" name="quantity" placeholder="Quantity" aria-label="Search" aria-describedby="searchph" value="1" />
                  </form>
                </li>
                <li class="col order-3 order-sm-4 text-center">
                  <p class="col mt-3"><span>Rp15000</span></p>
                </li>
                <li class="col order-5 text-center d-none d-xl-inline-block">
                  <a type="button" class="mt-3"><i class="bi bi-trash"></i></a>
                </li>
              </ul>
              <div class="">
                <a type="button" class="btn btn-danger w-100 d-inline-block d-xl-none mt-3"> Remove <i class="bi bi-trash"></i></a>
              </div>
            </div> -->

                    <div class="card-footer text-center bg-transparent">
                        <ul class="row justify-content-between align-items-center list-unstyled m-0">
                            <li class="col">
                                <h4>Subtotal</h4>
                            </li>
                            <li class="col">
                                <h5>
                                    <?php
                    echo $total;
                    ?>
                                </h5>
                            </li>
                        </ul>
                        <a href="#" class="btn btn-primary w-100"> Checkout</a>
                    </div>
                </div>

                <!-- <div class="card shadow">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover table-striped text-center" id="myTable">
                  <thead>
                    <tr>
                      <th class="col-1" scope="col">Product</th>
                      <th></th>
                      <th class="col-1" scope="col">Quantity</th>
                      <th class="col-1" scope="col">Total</th>
                      <th class="col-1"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <img src="../../asset/img/product/prod01.jpg" alt="product01" class="figure-img img-fluid rounded-2" height="200px" width="200px" />
                      </td>
                      <td class="text-start">
                        <h5>product01</h5>
                        <small>Rp20.000</small>
                      </td>
                      <td>
                        <form action="post">
                          <input type="number" class="form-control-sm" id="quantity" name="quantity" placeholder="Quantity" aria-label="Search" aria-describedby="searchph" value="1" />
                        </form>
                      </td>
                      <td>$</td>
                      <td>
                        <i class="bi bi-trash"></i>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div> -->
            </section>
        </article>
    </main>

    <!-- offcanvas menu -->
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
            <div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="landing_page.html" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="products.html" class="nav-link">Products</a>
                    </li>
                    <li class="nav-item">
                        <a href="about.html" class="nav-link">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Contact us</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <?php 
    include_once 'footer.inc.php';
    ?>
</body>

</html>