<?php
    require 'session-users.inc.php';
?>

<!DOCTYPE html>
<html lang="en" data-bs-target="dark">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cart</title>
    <!-- icon -->
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

    <main class="container p-3">
        <article class="rounded-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-chevron p-3">
                    <li class="breadcrumb-item">
                        <a class="link-body-emphasis" href="landing-page.php">
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
                    <p class="fs-2 fw-bold">Shopping cart <small class="fw-light"></small></p>
                </div>


                <form action="checkout.php" method="post">
                    <div class="card shadow-lg border-0">

                        <div class="card-header bg-transparent">
                            <ul class="row justify-content-between align-items-center list-unstyled m-0">
                                <!-- <li class="col text-center"><span>product_id</span></li> -->
                                <li class="col text-center"><span>Product</span></li>
                                <!-- <li class="col d-none d-md-inline-block"><span class="">Product Name</span></li> -->
                                <li class="col d-none d-sm-inline-block text-center text-md-start"><span>Quantity</span></li>
                                <li class="col text-center text-md-start"><span>SubTotal</span></li>
                                <!-- <li class="col d-none d-xl-inline-block"><span class="">Action</span> -->
                                </li>
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

                $sql = "SELECT c.cart_id, c.user_id, u.username, p.product_id, p.product_name, p.product_img, c.quantity, p.product_price, c.created_at 
                  FROM cart c 
                  JOIN users u ON c.user_id = u.user_id
                  JOIN products p ON c.product_id = p.product_id
                  WHERE c.user_id = $user_id 
                  ORDER BY c.cart_id
                  LIMIT $offset, $items_per_page";
                $result = mysqli_query($conn, $sql);
  
                $total_page=ceil($rows/$items_per_page);
                $previous = $current_page - 1;
                $next = $current_page + 1;
  
                $total = 0;
                $c = 1;
                if (mysqli_num_rows($result) > 0) {
                  $c += 1;
                  echo     "<input type='hidden' class='form-control-sm mt-3' name='quantity_count' placeholder='Quantity' aria-label='Search' aria-describedby='searchph' value='" . $c . "' min='1' />";
                  while ($row = mysqli_fetch_assoc($result)) {
  
                    echo "<div class='card-body'>";
                    echo "<ul class='row justify-content-between list-unstyled m-0'>";
                    echo "<li class='col-auto order-1 text-center p-0 me-3'><p>" . $row['cart_id'] . "</p></li>";
                    echo "<li class='col-auto order-1 text-center p-0 me-3'><img src='../../asset/img/product/" . $row['product_img'] . "' alt='" . $row['product_img'] . "' class='img-fluid rounded-start' height='100px' width='100px' /></li>";
                    echo "<li class='col order-2 text-start text-wrap p-0'>";
  
                    echo "<p class='mt-3'>" . $row['product_name'] . "</p>";
                    echo "<small>IDR " . number_format($row['product_price'], 2, ',', '.') . "<input class='price' id='price' type=hidden value='" . $row['product_price'] . "'></small>";
                    echo "</li>";
                    echo "<li class='col order-4 order-sm-3 text-start text-md-end text-xl-center'>";
                    echo  "<input type='number' class='quantity form-control-sm mt-3' id='quantity' onchange='updateSubTotal()' name='quantity[]' placeholder='Quantity' aria-label='Search' aria-describedby='searchph' value='" . $row['quantity'] . "' min='1' />";
                    echo  "</li>";
                    echo  "<li class='col order-3 order-sm-4 text-center'>";
                    echo    "<p class='col mt-3'><span class='sub_total'></span></p>";
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

                        <div class="card-footer text-center bg-transparent">
                            <ul class="row justify-content-between align-items-center list-unstyled m-0">
                                <li class="col">
                                    <h4 class='total'>Total</h4>
                                </li>
                                <li class="col">
                                    <h5 class='total' id="total"></h5>
                                </li>
                            </ul>
                            <button type="submit" class="btn btn-primary w-100"> Checkout</button>
                        </div>
                    </div>
                </form>
            </section>
        </article>
    </main>

    <?php 
    include_once 'offcanvas.inc.php';
    ?>

    <?php 
    include_once 'footer.inc.php';
    ?>

    <script>
    let currency = new Intl.NumberFormat('en-US', {style: 'currency',currency: 'IDR',});
    var price = document.getElementsByClassName('price');
    var quantity = document.getElementsByClassName('quantity');
    var sub_total = document.getElementsByClassName('sub_total');
    var total = document.getElementById('total');
    var sum = 0;

    console.log(price);
    console.log(quantity);
    console.log(sub_total);
    console.log(total);

    function updateSubTotal() {
        sum = 0;
        for (i = 0; i < price.length; i++) {
            sub_total[i].innerText = currency.format((price[i].value) * (quantity[i].value));
            sum = sum + (price[i].value) * (quantity[i].value);
            console.log(sub_total[i])
        }
        total.innerText = currency.format(sum);
    }

    updateSubTotal();
    </script>
  </body>
</html>
