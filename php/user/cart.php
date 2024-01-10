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
    <link rel="icon" href="../../asset/img/logo/tokaku_logo.svg" type="image/x-icon" />
    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,400;0,500;0,600;0,700;1,300&family=Kalnia:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" href="../../css/user/style.css" />
    <!-- Javascript -->
    <script defer type="text/javascript" src="../../js/theme.js"></script>
    <script defer type="text/javascript" src="../../js/page.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
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
            <p class="fs-2 fw-bold">Shopping cart <small class="fw-light"></small></p>
          </div>

          
          <form action="checkout.php" method="post">
              <div class="card shadow-lg border-0">

              <div class="card-header bg-transparent">
                <ul class="row justify-content-between align-items-center list-unstyled m-0">
                  <li class="col text-center"><span>Product</span></li>
                  <li class="col d-none d-md-inline-block"><span class="visually-hidden">Product Name</span></li>
                  <li class="col d-none d-sm-inline-block text-center text-md-start"><span>QTY</span></li>
                  <li class="col text-center text-md-start"><span>SubTotal</span></li>
                  <li class="col d-none d-xl-inline-block"><span class="visually-hidden">Action</span></li>
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
                  $sql = "SELECT c.cart_id, c.user_id, u.username, p.product_id, p.product_name, p.product_img, c.quantity, p.product_price, c.created_at FROM cart c 
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
                $c = 1;
                if (mysqli_num_rows($result) > 0) {
                  $c += 1;
                  echo     "<input type='hidden' class='quantity form-control-sm mt-3' id='quantity' onchange='updateSubTotal()' name='quantity_count' placeholder='Quantity' aria-label='Search' aria-describedby='searchph' value='" . $c . "' min='1' />";
                  while ($row = mysqli_fetch_assoc($result)) {
  
                    echo "<div class='card-body'>";
                    echo "<ul class='row justify-content-between list-unstyled m-0'>";
                    echo "<li class='col-auto order-1 text-center p-0 me-3'><img src='../../asset/img/product/" . $row['product_img'] . "' alt='" . $row['product_img'] . "' class='img-fluid rounded-start' height='100px' width='100px' /></li>";
                    echo "<li class='col order-2 text-start text-wrap p-0'>";
  
                    echo "<p class='mt-3'>" . $row['product_name'] . "</p>";
                    echo "<small>IDR " . number_format($row['product_price'], 2, ',', '.') . "<input class='price' id='price' type=hidden value='" . $row['product_price'] . "'></small>";
                    echo "</li>";
                    echo "<li class='col order-4 order-sm-3 text-start text-md-end text-xl-center'>";
                    echo  "<input type='number' class='quantity form-control-sm mt-3' id='quantity' onchange='updateSubTotal()' name='quantity[]' placeholder='Quantity' aria-label='Search' aria-describedby='searchph' value='" . $row['quantity'] . "' min='1' />";
                    echo  "</li>";
                    echo  "<li class='col order-3 order-sm-4 text-center'>";
                    echo    "<p class='col mt-3'><span class='sub_total' id='sub_total'>IDR " . number_format($row['product_price'], 2, ',', '.') . "</span></p>";
                    // $total += ($row['product_price'] * $row['quantity']);
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
                <!-- CHECKOUT BTN -->
                <button type="submit" class="btn btn-primary w-100"> Checkout</button>
  
              </div>
            </div>
            </form>

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
    <div class="offcanvas offcanvas-start w-50" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
      <div class="offcanvas-header pt-4">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">
          <div class="d-flex ms-2 justify-content-center align-items-center">
            <img src="../../asset/img/logo/tokaku_logo.svg" alt="TOKAKU" width="32" height="32" />
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

    <footer class="footer">
      <div class="container">
        <div class="row align-items-center g-0 border-top py-2">
          <!-- Desc -->
          <div class="col-md-6 col-12 text-center text-md-start">
            <span
              >©
              <span id="copyright">
                <script>
                  document.getElementById("copyright").appendChild(document.createTextNode(new Date().getFullYear()));
                </script> </span
              >Tokaku. All Rights Reserved.</span
            >
          </div>
          <!-- Links -->
          <div class="col-12 col-md-6">
            <nav class="nav nav-footer justify-content-center justify-content-md-end">
              <a class="nav-link" href="#">Privacy</a>
              <a class="nav-link" href="#">Terms </a>
              <a class="nav-link" href="#">Feedback</a>
              <a class="nav-link" href="#">Support</a>
            </nav>
          </div>
        </div>
      </div>
    </footer>

    <script>  
      var price = document.getElementsByClassName('price');
      var quantity = document.getElementsByClassName('quantity');
      var sub_total = document.getElementsByClassName('sub_total');
      var total = document.getElementById('total');
      var sum = 0;

      // console.log(price);
      // console.log(quantity);
      // console.log(sub_total);
      // console.log(total);

      function updateSubTotal() {
        sum = 0;
        for (i = 0; i < price.length; i++) {
          sub_total[i].innerText = (price[i].value) * (quantity[i].value);
          sum = sum + (price[i].value) * (quantity[i].value);
          console.log(sum)
        }
        total.innerText = sum;
      }

      updateSubTotal();

    </script>

    <div>
      <div class="flake-wrapper" style="width: 40px; left: 63%; height: 40px; transform: scale(0.66); animation: falling 14s linear infinite">
        <svg width="129.108px" height="140.597px" viewBox="0 0 129.108 140.597" enable-background="new 0 0 129.108 140.597" xml:space="preserve" version="1.1" class="flake">
          <path
            fill="#00FFFF"
            d="M106.491,83.706l17.706,10.222l-4.067,7.046l-17.88-10.324l4.693,17.494l-7.814,2.096l-6.121-22.916l-0.604-2.402L71,72.519v25.01l1.569,1.627l16.848,16.906l-5.688,5.727L71,108.984V129h-8v-20.221l-12.917,12.807l-5.837-5.727l16.849-16.775L63,97.325V72.519L41.371,84.922l-0.79,2.402l-6.14,22.916l-7.823-2.096l4.688-17.494l-17.882,10.324l-4.068-7.046l17.705-10.222L9.566,79.018l2.096-7.823l23.095,6.188l2.223,0.596l21.66-12.505L37.157,53.071l-2.402,0.644l-22.916,6.14l-2.096-7.823l17.495-4.688L9.358,37.019l4.07-7.046l17.71,10.222l-4.678-17.494l7.842-2.096L40.525,43.7l0.669,2.223L63,58.428V33.622l-1.868-1.758L44.247,15.088l5.8-5.727L63,22.168V2h8v19.963L83.748,9.156l5.668,5.727L72.549,31.79L71,33.418v25.01l21.581-12.505l0.517-2.223l6.188-23.095l7.823,2.096l-4.688,17.494l17.705-10.222l4.068,7.046l-17.882,10.324l17.494,4.688l-2.096,7.823l-22.916-6.14l-2.402-0.644L74.911,65.473L96.57,77.979l2.223-0.596l23.095-6.188l2.096,7.823L106.491,83.706z"></path>
        </svg>
      </div>
      <div class="flake-wrapper" style="width: 40px; left: 66%; height: 40px; transform: scale(0.49); animation: falling 13s linear infinite">
        <svg width="129.108px" height="140.597px" viewBox="0 0 129.108 140.597" enable-background="new 0 0 129.108 140.597" xml:space="preserve" version="1.1" class="flake">
          <path
            fill="#00FFFF"
            d="M106.491,83.706l17.706,10.222l-4.067,7.046l-17.88-10.324l4.693,17.494l-7.814,2.096l-6.121-22.916l-0.604-2.402L71,72.519v25.01l1.569,1.627l16.848,16.906l-5.688,5.727L71,108.984V129h-8v-20.221l-12.917,12.807l-5.837-5.727l16.849-16.775L63,97.325V72.519L41.371,84.922l-0.79,2.402l-6.14,22.916l-7.823-2.096l4.688-17.494l-17.882,10.324l-4.068-7.046l17.705-10.222L9.566,79.018l2.096-7.823l23.095,6.188l2.223,0.596l21.66-12.505L37.157,53.071l-2.402,0.644l-22.916,6.14l-2.096-7.823l17.495-4.688L9.358,37.019l4.07-7.046l17.71,10.222l-4.678-17.494l7.842-2.096L40.525,43.7l0.669,2.223L63,58.428V33.622l-1.868-1.758L44.247,15.088l5.8-5.727L63,22.168V2h8v19.963L83.748,9.156l5.668,5.727L72.549,31.79L71,33.418v25.01l21.581-12.505l0.517-2.223l6.188-23.095l7.823,2.096l-4.688,17.494l17.705-10.222l4.068,7.046l-17.882,10.324l17.494,4.688l-2.096,7.823l-22.916-6.14l-2.402-0.644L74.911,65.473L96.57,77.979l2.223-0.596l23.095-6.188l2.096,7.823L106.491,83.706z"></path>
        </svg>
      </div>
      <div class="flake-wrapper" style="width: 40px; left: 21%; height: 40px; transform: scale(0.28); animation: falling 13s linear infinite">
        <svg width="129.108px" height="140.597px" viewBox="0 0 129.108 140.597" enable-background="new 0 0 129.108 140.597" xml:space="preserve" version="1.1" class="flake">
          <path
            fill="#00FFFF"
            d="M106.491,83.706l17.706,10.222l-4.067,7.046l-17.88-10.324l4.693,17.494l-7.814,2.096l-6.121-22.916l-0.604-2.402L71,72.519v25.01l1.569,1.627l16.848,16.906l-5.688,5.727L71,108.984V129h-8v-20.221l-12.917,12.807l-5.837-5.727l16.849-16.775L63,97.325V72.519L41.371,84.922l-0.79,2.402l-6.14,22.916l-7.823-2.096l4.688-17.494l-17.882,10.324l-4.068-7.046l17.705-10.222L9.566,79.018l2.096-7.823l23.095,6.188l2.223,0.596l21.66-12.505L37.157,53.071l-2.402,0.644l-22.916,6.14l-2.096-7.823l17.495-4.688L9.358,37.019l4.07-7.046l17.71,10.222l-4.678-17.494l7.842-2.096L40.525,43.7l0.669,2.223L63,58.428V33.622l-1.868-1.758L44.247,15.088l5.8-5.727L63,22.168V2h8v19.963L83.748,9.156l5.668,5.727L72.549,31.79L71,33.418v25.01l21.581-12.505l0.517-2.223l6.188-23.095l7.823,2.096l-4.688,17.494l17.705-10.222l4.068,7.046l-17.882,10.324l17.494,4.688l-2.096,7.823l-22.916-6.14l-2.402-0.644L74.911,65.473L96.57,77.979l2.223-0.596l23.095-6.188l2.096,7.823L106.491,83.706z"></path>
        </svg>
      </div>
      <div class="flake-wrapper" style="width: 40px; left: 5%; height: 40px; transform: scale(0.61); animation: falling 14s linear infinite">
        <svg width="129.108px" height="140.597px" viewBox="0 0 129.108 140.597" enable-background="new 0 0 129.108 140.597" xml:space="preserve" version="1.1" class="flake">
          <path
            fill="#00FFFF"
            d="M106.491,83.706l17.706,10.222l-4.067,7.046l-17.88-10.324l4.693,17.494l-7.814,2.096l-6.121-22.916l-0.604-2.402L71,72.519v25.01l1.569,1.627l16.848,16.906l-5.688,5.727L71,108.984V129h-8v-20.221l-12.917,12.807l-5.837-5.727l16.849-16.775L63,97.325V72.519L41.371,84.922l-0.79,2.402l-6.14,22.916l-7.823-2.096l4.688-17.494l-17.882,10.324l-4.068-7.046l17.705-10.222L9.566,79.018l2.096-7.823l23.095,6.188l2.223,0.596l21.66-12.505L37.157,53.071l-2.402,0.644l-22.916,6.14l-2.096-7.823l17.495-4.688L9.358,37.019l4.07-7.046l17.71,10.222l-4.678-17.494l7.842-2.096L40.525,43.7l0.669,2.223L63,58.428V33.622l-1.868-1.758L44.247,15.088l5.8-5.727L63,22.168V2h8v19.963L83.748,9.156l5.668,5.727L72.549,31.79L71,33.418v25.01l21.581-12.505l0.517-2.223l6.188-23.095l7.823,2.096l-4.688,17.494l17.705-10.222l4.068,7.046l-17.882,10.324l17.494,4.688l-2.096,7.823l-22.916-6.14l-2.402-0.644L74.911,65.473L96.57,77.979l2.223-0.596l23.095-6.188l2.096,7.823L106.491,83.706z"></path>
        </svg>
      </div>
      <div class="flake-wrapper" style="width: 40px; left: 79%; height: 40px; transform: scale(0.46); animation: falling 13s linear infinite">
        <svg width="129.108px" height="140.597px" viewBox="0 0 129.108 140.597" enable-background="new 0 0 129.108 140.597" xml:space="preserve" version="1.1" class="flake">
          <path
            fill="#00FFFF"
            d="M106.491,83.706l17.706,10.222l-4.067,7.046l-17.88-10.324l4.693,17.494l-7.814,2.096l-6.121-22.916l-0.604-2.402L71,72.519v25.01l1.569,1.627l16.848,16.906l-5.688,5.727L71,108.984V129h-8v-20.221l-12.917,12.807l-5.837-5.727l16.849-16.775L63,97.325V72.519L41.371,84.922l-0.79,2.402l-6.14,22.916l-7.823-2.096l4.688-17.494l-17.882,10.324l-4.068-7.046l17.705-10.222L9.566,79.018l2.096-7.823l23.095,6.188l2.223,0.596l21.66-12.505L37.157,53.071l-2.402,0.644l-22.916,6.14l-2.096-7.823l17.495-4.688L9.358,37.019l4.07-7.046l17.71,10.222l-4.678-17.494l7.842-2.096L40.525,43.7l0.669,2.223L63,58.428V33.622l-1.868-1.758L44.247,15.088l5.8-5.727L63,22.168V2h8v19.963L83.748,9.156l5.668,5.727L72.549,31.79L71,33.418v25.01l21.581-12.505l0.517-2.223l6.188-23.095l7.823,2.096l-4.688,17.494l17.705-10.222l4.068,7.046l-17.882,10.324l17.494,4.688l-2.096,7.823l-22.916-6.14l-2.402-0.644L74.911,65.473L96.57,77.979l2.223-0.596l23.095-6.188l2.096,7.823L106.491,83.706z"></path>
        </svg>
      </div>
      <div class="flake-wrapper" style="width: 40px; left: 21%; height: 40px; transform: scale(0.56); animation: falling 13s linear infinite">
        <svg width="129.108px" height="140.597px" viewBox="0 0 129.108 140.597" enable-background="new 0 0 129.108 140.597" xml:space="preserve" version="1.1" class="flake">
          <path
            fill="#00FFFF"
            d="M106.491,83.706l17.706,10.222l-4.067,7.046l-17.88-10.324l4.693,17.494l-7.814,2.096l-6.121-22.916l-0.604-2.402L71,72.519v25.01l1.569,1.627l16.848,16.906l-5.688,5.727L71,108.984V129h-8v-20.221l-12.917,12.807l-5.837-5.727l16.849-16.775L63,97.325V72.519L41.371,84.922l-0.79,2.402l-6.14,22.916l-7.823-2.096l4.688-17.494l-17.882,10.324l-4.068-7.046l17.705-10.222L9.566,79.018l2.096-7.823l23.095,6.188l2.223,0.596l21.66-12.505L37.157,53.071l-2.402,0.644l-22.916,6.14l-2.096-7.823l17.495-4.688L9.358,37.019l4.07-7.046l17.71,10.222l-4.678-17.494l7.842-2.096L40.525,43.7l0.669,2.223L63,58.428V33.622l-1.868-1.758L44.247,15.088l5.8-5.727L63,22.168V2h8v19.963L83.748,9.156l5.668,5.727L72.549,31.79L71,33.418v25.01l21.581-12.505l0.517-2.223l6.188-23.095l7.823,2.096l-4.688,17.494l17.705-10.222l4.068,7.046l-17.882,10.324l17.494,4.688l-2.096,7.823l-22.916-6.14l-2.402-0.644L74.911,65.473L96.57,77.979l2.223-0.596l23.095-6.188l2.096,7.823L106.491,83.706z"></path>
        </svg>
      </div>
      <div class="flake-wrapper" style="width: 40px; left: 85%; height: 40px; transform: scale(0.66); animation: falling 12s linear infinite">
        <svg width="129.108px" height="140.597px" viewBox="0 0 129.108 140.597" enable-background="new 0 0 129.108 140.597" xml:space="preserve" version="1.1" class="flake">
          <path
            fill="#00FFFF"
            d="M106.491,83.706l17.706,10.222l-4.067,7.046l-17.88-10.324l4.693,17.494l-7.814,2.096l-6.121-22.916l-0.604-2.402L71,72.519v25.01l1.569,1.627l16.848,16.906l-5.688,5.727L71,108.984V129h-8v-20.221l-12.917,12.807l-5.837-5.727l16.849-16.775L63,97.325V72.519L41.371,84.922l-0.79,2.402l-6.14,22.916l-7.823-2.096l4.688-17.494l-17.882,10.324l-4.068-7.046l17.705-10.222L9.566,79.018l2.096-7.823l23.095,6.188l2.223,0.596l21.66-12.505L37.157,53.071l-2.402,0.644l-22.916,6.14l-2.096-7.823l17.495-4.688L9.358,37.019l4.07-7.046l17.71,10.222l-4.678-17.494l7.842-2.096L40.525,43.7l0.669,2.223L63,58.428V33.622l-1.868-1.758L44.247,15.088l5.8-5.727L63,22.168V2h8v19.963L83.748,9.156l5.668,5.727L72.549,31.79L71,33.418v25.01l21.581-12.505l0.517-2.223l6.188-23.095l7.823,2.096l-4.688,17.494l17.705-10.222l4.068,7.046l-17.882,10.324l17.494,4.688l-2.096,7.823l-22.916-6.14l-2.402-0.644L74.911,65.473L96.57,77.979l2.223-0.596l23.095-6.188l2.096,7.823L106.491,83.706z"></path>
        </svg>
      </div>
      <div class="flake-wrapper" style="width: 40px; left: 88%; height: 40px; transform: scale(0.3); animation: falling 14s linear infinite">
        <svg width="129.108px" height="140.597px" viewBox="0 0 129.108 140.597" enable-background="new 0 0 129.108 140.597" xml:space="preserve" version="1.1" class="flake">
          <path
            fill="#00FFFF"
            d="M106.491,83.706l17.706,10.222l-4.067,7.046l-17.88-10.324l4.693,17.494l-7.814,2.096l-6.121-22.916l-0.604-2.402L71,72.519v25.01l1.569,1.627l16.848,16.906l-5.688,5.727L71,108.984V129h-8v-20.221l-12.917,12.807l-5.837-5.727l16.849-16.775L63,97.325V72.519L41.371,84.922l-0.79,2.402l-6.14,22.916l-7.823-2.096l4.688-17.494l-17.882,10.324l-4.068-7.046l17.705-10.222L9.566,79.018l2.096-7.823l23.095,6.188l2.223,0.596l21.66-12.505L37.157,53.071l-2.402,0.644l-22.916,6.14l-2.096-7.823l17.495-4.688L9.358,37.019l4.07-7.046l17.71,10.222l-4.678-17.494l7.842-2.096L40.525,43.7l0.669,2.223L63,58.428V33.622l-1.868-1.758L44.247,15.088l5.8-5.727L63,22.168V2h8v19.963L83.748,9.156l5.668,5.727L72.549,31.79L71,33.418v25.01l21.581-12.505l0.517-2.223l6.188-23.095l7.823,2.096l-4.688,17.494l17.705-10.222l4.068,7.046l-17.882,10.324l17.494,4.688l-2.096,7.823l-22.916-6.14l-2.402-0.644L74.911,65.473L96.57,77.979l2.223-0.596l23.095-6.188l2.096,7.823L106.491,83.706z"></path>
        </svg>
      </div>
      <div class="flake-wrapper" style="width: 40px; left: 48%; height: 40px; transform: scale(0.85); animation: falling 12s linear infinite">
        <svg width="129.108px" height="140.597px" viewBox="0 0 129.108 140.597" enable-background="new 0 0 129.108 140.597" xml:space="preserve" version="1.1" class="flake">
          <path
            fill="#00FFFF"
            d="M106.491,83.706l17.706,10.222l-4.067,7.046l-17.88-10.324l4.693,17.494l-7.814,2.096l-6.121-22.916l-0.604-2.402L71,72.519v25.01l1.569,1.627l16.848,16.906l-5.688,5.727L71,108.984V129h-8v-20.221l-12.917,12.807l-5.837-5.727l16.849-16.775L63,97.325V72.519L41.371,84.922l-0.79,2.402l-6.14,22.916l-7.823-2.096l4.688-17.494l-17.882,10.324l-4.068-7.046l17.705-10.222L9.566,79.018l2.096-7.823l23.095,6.188l2.223,0.596l21.66-12.505L37.157,53.071l-2.402,0.644l-22.916,6.14l-2.096-7.823l17.495-4.688L9.358,37.019l4.07-7.046l17.71,10.222l-4.678-17.494l7.842-2.096L40.525,43.7l0.669,2.223L63,58.428V33.622l-1.868-1.758L44.247,15.088l5.8-5.727L63,22.168V2h8v19.963L83.748,9.156l5.668,5.727L72.549,31.79L71,33.418v25.01l21.581-12.505l0.517-2.223l6.188-23.095l7.823,2.096l-4.688,17.494l17.705-10.222l4.068,7.046l-17.882,10.324l17.494,4.688l-2.096,7.823l-22.916-6.14l-2.402-0.644L74.911,65.473L96.57,77.979l2.223-0.596l23.095-6.188l2.096,7.823L106.491,83.706z"></path>
        </svg>
      </div>
      <div class="flake-wrapper" style="width: 40px; left: 31%; height: 40px; transform: scale(0.9); animation: falling 13s linear infinite">
        <svg width="129.108px" height="140.597px" viewBox="0 0 129.108 140.597" enable-background="new 0 0 129.108 140.597" xml:space="preserve" version="1.1" class="flake">
          <path
            fill="#00FFFF"
            d="M106.491,83.706l17.706,10.222l-4.067,7.046l-17.88-10.324l4.693,17.494l-7.814,2.096l-6.121-22.916l-0.604-2.402L71,72.519v25.01l1.569,1.627l16.848,16.906l-5.688,5.727L71,108.984V129h-8v-20.221l-12.917,12.807l-5.837-5.727l16.849-16.775L63,97.325V72.519L41.371,84.922l-0.79,2.402l-6.14,22.916l-7.823-2.096l4.688-17.494l-17.882,10.324l-4.068-7.046l17.705-10.222L9.566,79.018l2.096-7.823l23.095,6.188l2.223,0.596l21.66-12.505L37.157,53.071l-2.402,0.644l-22.916,6.14l-2.096-7.823l17.495-4.688L9.358,37.019l4.07-7.046l17.71,10.222l-4.678-17.494l7.842-2.096L40.525,43.7l0.669,2.223L63,58.428V33.622l-1.868-1.758L44.247,15.088l5.8-5.727L63,22.168V2h8v19.963L83.748,9.156l5.668,5.727L72.549,31.79L71,33.418v25.01l21.581-12.505l0.517-2.223l6.188-23.095l7.823,2.096l-4.688,17.494l17.705-10.222l4.068,7.046l-17.882,10.324l17.494,4.688l-2.096,7.823l-22.916-6.14l-2.402-0.644L74.911,65.473L96.57,77.979l2.223-0.596l23.095-6.188l2.096,7.823L106.491,83.706z"></path>
        </svg>
      </div>
      <div class="flake-wrapper" style="width: 40px; left: 64%; height: 40px; transform: scale(0.32); animation: falling 11s linear infinite">
        <svg width="129.108px" height="140.597px" viewBox="0 0 129.108 140.597" enable-background="new 0 0 129.108 140.597" xml:space="preserve" version="1.1" class="flake">
          <path
            fill="#00FFFF"
            d="M106.491,83.706l17.706,10.222l-4.067,7.046l-17.88-10.324l4.693,17.494l-7.814,2.096l-6.121-22.916l-0.604-2.402L71,72.519v25.01l1.569,1.627l16.848,16.906l-5.688,5.727L71,108.984V129h-8v-20.221l-12.917,12.807l-5.837-5.727l16.849-16.775L63,97.325V72.519L41.371,84.922l-0.79,2.402l-6.14,22.916l-7.823-2.096l4.688-17.494l-17.882,10.324l-4.068-7.046l17.705-10.222L9.566,79.018l2.096-7.823l23.095,6.188l2.223,0.596l21.66-12.505L37.157,53.071l-2.402,0.644l-22.916,6.14l-2.096-7.823l17.495-4.688L9.358,37.019l4.07-7.046l17.71,10.222l-4.678-17.494l7.842-2.096L40.525,43.7l0.669,2.223L63,58.428V33.622l-1.868-1.758L44.247,15.088l5.8-5.727L63,22.168V2h8v19.963L83.748,9.156l5.668,5.727L72.549,31.79L71,33.418v25.01l21.581-12.505l0.517-2.223l6.188-23.095l7.823,2.096l-4.688,17.494l17.705-10.222l4.068,7.046l-17.882,10.324l17.494,4.688l-2.096,7.823l-22.916-6.14l-2.402-0.644L74.911,65.473L96.57,77.979l2.223-0.596l23.095-6.188l2.096,7.823L106.491,83.706z"></path>
        </svg>
      </div>
      <div class="flake-wrapper" style="width: 40px; left: 13%; height: 40px; transform: scale(0.09); animation: falling 10s linear infinite">
        <svg width="129.108px" height="140.597px" viewBox="0 0 129.108 140.597" enable-background="new 0 0 129.108 140.597" xml:space="preserve" version="1.1" class="flake">
          <path
            fill="#00FFFF"
            d="M106.491,83.706l17.706,10.222l-4.067,7.046l-17.88-10.324l4.693,17.494l-7.814,2.096l-6.121-22.916l-0.604-2.402L71,72.519v25.01l1.569,1.627l16.848,16.906l-5.688,5.727L71,108.984V129h-8v-20.221l-12.917,12.807l-5.837-5.727l16.849-16.775L63,97.325V72.519L41.371,84.922l-0.79,2.402l-6.14,22.916l-7.823-2.096l4.688-17.494l-17.882,10.324l-4.068-7.046l17.705-10.222L9.566,79.018l2.096-7.823l23.095,6.188l2.223,0.596l21.66-12.505L37.157,53.071l-2.402,0.644l-22.916,6.14l-2.096-7.823l17.495-4.688L9.358,37.019l4.07-7.046l17.71,10.222l-4.678-17.494l7.842-2.096L40.525,43.7l0.669,2.223L63,58.428V33.622l-1.868-1.758L44.247,15.088l5.8-5.727L63,22.168V2h8v19.963L83.748,9.156l5.668,5.727L72.549,31.79L71,33.418v25.01l21.581-12.505l0.517-2.223l6.188-23.095l7.823,2.096l-4.688,17.494l17.705-10.222l4.068,7.046l-17.882,10.324l17.494,4.688l-2.096,7.823l-22.916-6.14l-2.402-0.644L74.911,65.473L96.57,77.979l2.223-0.596l23.095-6.188l2.096,7.823L106.491,83.706z"></path>
        </svg>
      </div>
      <div class="flake-wrapper" style="width: 40px; left: 11%; height: 40px; transform: scale(0.03); animation: falling 10s linear infinite">
        <svg width="129.108px" height="140.597px" viewBox="0 0 129.108 140.597" enable-background="new 0 0 129.108 140.597" xml:space="preserve" version="1.1" class="flake">
          <path
            fill="#00FFFF"
            d="M106.491,83.706l17.706,10.222l-4.067,7.046l-17.88-10.324l4.693,17.494l-7.814,2.096l-6.121-22.916l-0.604-2.402L71,72.519v25.01l1.569,1.627l16.848,16.906l-5.688,5.727L71,108.984V129h-8v-20.221l-12.917,12.807l-5.837-5.727l16.849-16.775L63,97.325V72.519L41.371,84.922l-0.79,2.402l-6.14,22.916l-7.823-2.096l4.688-17.494l-17.882,10.324l-4.068-7.046l17.705-10.222L9.566,79.018l2.096-7.823l23.095,6.188l2.223,0.596l21.66-12.505L37.157,53.071l-2.402,0.644l-22.916,6.14l-2.096-7.823l17.495-4.688L9.358,37.019l4.07-7.046l17.71,10.222l-4.678-17.494l7.842-2.096L40.525,43.7l0.669,2.223L63,58.428V33.622l-1.868-1.758L44.247,15.088l5.8-5.727L63,22.168V2h8v19.963L83.748,9.156l5.668,5.727L72.549,31.79L71,33.418v25.01l21.581-12.505l0.517-2.223l6.188-23.095l7.823,2.096l-4.688,17.494l17.705-10.222l4.068,7.046l-17.882,10.324l17.494,4.688l-2.096,7.823l-22.916-6.14l-2.402-0.644L74.911,65.473L96.57,77.979l2.223-0.596l23.095-6.188l2.096,7.823L106.491,83.706z"></path>
        </svg>
      </div>
      <div class="flake-wrapper" style="width: 40px; left: 70%; height: 40px; transform: scale(0.07); animation: falling 14s linear infinite">
        <svg width="129.108px" height="140.597px" viewBox="0 0 129.108 140.597" enable-background="new 0 0 129.108 140.597" xml:space="preserve" version="1.1" class="flake">
          <path
            fill="#00FFFF"
            d="M106.491,83.706l17.706,10.222l-4.067,7.046l-17.88-10.324l4.693,17.494l-7.814,2.096l-6.121-22.916l-0.604-2.402L71,72.519v25.01l1.569,1.627l16.848,16.906l-5.688,5.727L71,108.984V129h-8v-20.221l-12.917,12.807l-5.837-5.727l16.849-16.775L63,97.325V72.519L41.371,84.922l-0.79,2.402l-6.14,22.916l-7.823-2.096l4.688-17.494l-17.882,10.324l-4.068-7.046l17.705-10.222L9.566,79.018l2.096-7.823l23.095,6.188l2.223,0.596l21.66-12.505L37.157,53.071l-2.402,0.644l-22.916,6.14l-2.096-7.823l17.495-4.688L9.358,37.019l4.07-7.046l17.71,10.222l-4.678-17.494l7.842-2.096L40.525,43.7l0.669,2.223L63,58.428V33.622l-1.868-1.758L44.247,15.088l5.8-5.727L63,22.168V2h8v19.963L83.748,9.156l5.668,5.727L72.549,31.79L71,33.418v25.01l21.581-12.505l0.517-2.223l6.188-23.095l7.823,2.096l-4.688,17.494l17.705-10.222l4.068,7.046l-17.882,10.324l17.494,4.688l-2.096,7.823l-22.916-6.14l-2.402-0.644L74.911,65.473L96.57,77.979l2.223-0.596l23.095-6.188l2.096,7.823L106.491,83.706z"></path>
        </svg>
      </div>
      <div class="flake-wrapper" style="width: 40px; left: 44%; height: 40px; transform: scale(0.85); animation: falling 10s linear infinite">
        <svg width="129.108px" height="140.597px" viewBox="0 0 129.108 140.597" enable-background="new 0 0 129.108 140.597" xml:space="preserve" version="1.1" class="flake">
          <path
            fill="#00FFFF"
            d="M106.491,83.706l17.706,10.222l-4.067,7.046l-17.88-10.324l4.693,17.494l-7.814,2.096l-6.121-22.916l-0.604-2.402L71,72.519v25.01l1.569,1.627l16.848,16.906l-5.688,5.727L71,108.984V129h-8v-20.221l-12.917,12.807l-5.837-5.727l16.849-16.775L63,97.325V72.519L41.371,84.922l-0.79,2.402l-6.14,22.916l-7.823-2.096l4.688-17.494l-17.882,10.324l-4.068-7.046l17.705-10.222L9.566,79.018l2.096-7.823l23.095,6.188l2.223,0.596l21.66-12.505L37.157,53.071l-2.402,0.644l-22.916,6.14l-2.096-7.823l17.495-4.688L9.358,37.019l4.07-7.046l17.71,10.222l-4.678-17.494l7.842-2.096L40.525,43.7l0.669,2.223L63,58.428V33.622l-1.868-1.758L44.247,15.088l5.8-5.727L63,22.168V2h8v19.963L83.748,9.156l5.668,5.727L72.549,31.79L71,33.418v25.01l21.581-12.505l0.517-2.223l6.188-23.095l7.823,2.096l-4.688,17.494l17.705-10.222l4.068,7.046l-17.882,10.324l17.494,4.688l-2.096,7.823l-22.916-6.14l-2.402-0.644L74.911,65.473L96.57,77.979l2.223-0.596l23.095-6.188l2.096,7.823L106.491,83.706z"></path>
        </svg>
      </div>
      <div class="flake-wrapper" style="width: 40px; left: 12%; height: 40px; transform: scale(0.93); animation: falling 8s linear infinite">
        <svg width="129.108px" height="140.597px" viewBox="0 0 129.108 140.597" enable-background="new 0 0 129.108 140.597" xml:space="preserve" version="1.1" class="flake">
          <path
            fill="#00FFFF"
            d="M106.491,83.706l17.706,10.222l-4.067,7.046l-17.88-10.324l4.693,17.494l-7.814,2.096l-6.121-22.916l-0.604-2.402L71,72.519v25.01l1.569,1.627l16.848,16.906l-5.688,5.727L71,108.984V129h-8v-20.221l-12.917,12.807l-5.837-5.727l16.849-16.775L63,97.325V72.519L41.371,84.922l-0.79,2.402l-6.14,22.916l-7.823-2.096l4.688-17.494l-17.882,10.324l-4.068-7.046l17.705-10.222L9.566,79.018l2.096-7.823l23.095,6.188l2.223,0.596l21.66-12.505L37.157,53.071l-2.402,0.644l-22.916,6.14l-2.096-7.823l17.495-4.688L9.358,37.019l4.07-7.046l17.71,10.222l-4.678-17.494l7.842-2.096L40.525,43.7l0.669,2.223L63,58.428V33.622l-1.868-1.758L44.247,15.088l5.8-5.727L63,22.168V2h8v19.963L83.748,9.156l5.668,5.727L72.549,31.79L71,33.418v25.01l21.581-12.505l0.517-2.223l6.188-23.095l7.823,2.096l-4.688,17.494l17.705-10.222l4.068,7.046l-17.882,10.324l17.494,4.688l-2.096,7.823l-22.916-6.14l-2.402-0.644L74.911,65.473L96.57,77.979l2.223-0.596l23.095-6.188l2.096,7.823L106.491,83.706z"></path>
        </svg>
      </div>
      <div class="flake-wrapper" style="width: 40px; left: 68%; height: 40px; transform: scale(0.6); animation: falling 7s linear infinite">
        <svg width="129.108px" height="140.597px" viewBox="0 0 129.108 140.597" enable-background="new 0 0 129.108 140.597" xml:space="preserve" version="1.1" class="flake">
          <path
            fill="#00FFFF"
            d="M106.491,83.706l17.706,10.222l-4.067,7.046l-17.88-10.324l4.693,17.494l-7.814,2.096l-6.121-22.916l-0.604-2.402L71,72.519v25.01l1.569,1.627l16.848,16.906l-5.688,5.727L71,108.984V129h-8v-20.221l-12.917,12.807l-5.837-5.727l16.849-16.775L63,97.325V72.519L41.371,84.922l-0.79,2.402l-6.14,22.916l-7.823-2.096l4.688-17.494l-17.882,10.324l-4.068-7.046l17.705-10.222L9.566,79.018l2.096-7.823l23.095,6.188l2.223,0.596l21.66-12.505L37.157,53.071l-2.402,0.644l-22.916,6.14l-2.096-7.823l17.495-4.688L9.358,37.019l4.07-7.046l17.71,10.222l-4.678-17.494l7.842-2.096L40.525,43.7l0.669,2.223L63,58.428V33.622l-1.868-1.758L44.247,15.088l5.8-5.727L63,22.168V2h8v19.963L83.748,9.156l5.668,5.727L72.549,31.79L71,33.418v25.01l21.581-12.505l0.517-2.223l6.188-23.095l7.823,2.096l-4.688,17.494l17.705-10.222l4.068,7.046l-17.882,10.324l17.494,4.688l-2.096,7.823l-22.916-6.14l-2.402-0.644L74.911,65.473L96.57,77.979l2.223-0.596l23.095-6.188l2.096,7.823L106.491,83.706z"></path>
        </svg>
      </div>
      <div class="flake-wrapper" style="width: 40px; left: 46%; height: 40px; transform: scale(0.05); animation: falling 10s linear infinite">
        <svg width="129.108px" height="140.597px" viewBox="0 0 129.108 140.597" enable-background="new 0 0 129.108 140.597" xml:space="preserve" version="1.1" class="flake">
          <path
            fill="#00FFFF"
            d="M106.491,83.706l17.706,10.222l-4.067,7.046l-17.88-10.324l4.693,17.494l-7.814,2.096l-6.121-22.916l-0.604-2.402L71,72.519v25.01l1.569,1.627l16.848,16.906l-5.688,5.727L71,108.984V129h-8v-20.221l-12.917,12.807l-5.837-5.727l16.849-16.775L63,97.325V72.519L41.371,84.922l-0.79,2.402l-6.14,22.916l-7.823-2.096l4.688-17.494l-17.882,10.324l-4.068-7.046l17.705-10.222L9.566,79.018l2.096-7.823l23.095,6.188l2.223,0.596l21.66-12.505L37.157,53.071l-2.402,0.644l-22.916,6.14l-2.096-7.823l17.495-4.688L9.358,37.019l4.07-7.046l17.71,10.222l-4.678-17.494l7.842-2.096L40.525,43.7l0.669,2.223L63,58.428V33.622l-1.868-1.758L44.247,15.088l5.8-5.727L63,22.168V2h8v19.963L83.748,9.156l5.668,5.727L72.549,31.79L71,33.418v25.01l21.581-12.505l0.517-2.223l6.188-23.095l7.823,2.096l-4.688,17.494l17.705-10.222l4.068,7.046l-17.882,10.324l17.494,4.688l-2.096,7.823l-22.916-6.14l-2.402-0.644L74.911,65.473L96.57,77.979l2.223-0.596l23.095-6.188l2.096,7.823L106.491,83.706z"></path>
        </svg>
      </div>
      <div class="flake-wrapper" style="width: 40px; left: 31%; height: 40px; transform: scale(0.66); animation: falling 7s linear infinite">
        <svg width="129.108px" height="140.597px" viewBox="0 0 129.108 140.597" enable-background="new 0 0 129.108 140.597" xml:space="preserve" version="1.1" class="flake">
          <path
            fill="#00FFFF"
            d="M106.491,83.706l17.706,10.222l-4.067,7.046l-17.88-10.324l4.693,17.494l-7.814,2.096l-6.121-22.916l-0.604-2.402L71,72.519v25.01l1.569,1.627l16.848,16.906l-5.688,5.727L71,108.984V129h-8v-20.221l-12.917,12.807l-5.837-5.727l16.849-16.775L63,97.325V72.519L41.371,84.922l-0.79,2.402l-6.14,22.916l-7.823-2.096l4.688-17.494l-17.882,10.324l-4.068-7.046l17.705-10.222L9.566,79.018l2.096-7.823l23.095,6.188l2.223,0.596l21.66-12.505L37.157,53.071l-2.402,0.644l-22.916,6.14l-2.096-7.823l17.495-4.688L9.358,37.019l4.07-7.046l17.71,10.222l-4.678-17.494l7.842-2.096L40.525,43.7l0.669,2.223L63,58.428V33.622l-1.868-1.758L44.247,15.088l5.8-5.727L63,22.168V2h8v19.963L83.748,9.156l5.668,5.727L72.549,31.79L71,33.418v25.01l21.581-12.505l0.517-2.223l6.188-23.095l7.823,2.096l-4.688,17.494l17.705-10.222l4.068,7.046l-17.882,10.324l17.494,4.688l-2.096,7.823l-22.916-6.14l-2.402-0.644L74.911,65.473L96.57,77.979l2.223-0.596l23.095-6.188l2.096,7.823L106.491,83.706z"></path>
        </svg>
      </div>
      <div class="flake-wrapper" style="width: 40px; left: 12%; height: 40px; transform: scale(0.15); animation: falling 8s linear infinite">
        <svg width="129.108px" height="140.597px" viewBox="0 0 129.108 140.597" enable-background="new 0 0 129.108 140.597" xml:space="preserve" version="1.1" class="flake">
          <path
            fill="#00FFFF"
            d="M106.491,83.706l17.706,10.222l-4.067,7.046l-17.88-10.324l4.693,17.494l-7.814,2.096l-6.121-22.916l-0.604-2.402L71,72.519v25.01l1.569,1.627l16.848,16.906l-5.688,5.727L71,108.984V129h-8v-20.221l-12.917,12.807l-5.837-5.727l16.849-16.775L63,97.325V72.519L41.371,84.922l-0.79,2.402l-6.14,22.916l-7.823-2.096l4.688-17.494l-17.882,10.324l-4.068-7.046l17.705-10.222L9.566,79.018l2.096-7.823l23.095,6.188l2.223,0.596l21.66-12.505L37.157,53.071l-2.402,0.644l-22.916,6.14l-2.096-7.823l17.495-4.688L9.358,37.019l4.07-7.046l17.71,10.222l-4.678-17.494l7.842-2.096L40.525,43.7l0.669,2.223L63,58.428V33.622l-1.868-1.758L44.247,15.088l5.8-5.727L63,22.168V2h8v19.963L83.748,9.156l5.668,5.727L72.549,31.79L71,33.418v25.01l21.581-12.505l0.517-2.223l6.188-23.095l7.823,2.096l-4.688,17.494l17.705-10.222l4.068,7.046l-17.882,10.324l17.494,4.688l-2.096,7.823l-22.916-6.14l-2.402-0.644L74.911,65.473L96.57,77.979l2.223-0.596l23.095-6.188l2.096,7.823L106.491,83.706z"></path>
        </svg>
      </div>
      <div class="flake-wrapper" style="width: 40px; left: 55%; height: 40px; transform: scale(0.16); animation: falling 8s linear infinite">
        <svg width="129.108px" height="140.597px" viewBox="0 0 129.108 140.597" enable-background="new 0 0 129.108 140.597" xml:space="preserve" version="1.1" class="flake">
          <path
            fill="#00FFFF"
            d="M106.491,83.706l17.706,10.222l-4.067,7.046l-17.88-10.324l4.693,17.494l-7.814,2.096l-6.121-22.916l-0.604-2.402L71,72.519v25.01l1.569,1.627l16.848,16.906l-5.688,5.727L71,108.984V129h-8v-20.221l-12.917,12.807l-5.837-5.727l16.849-16.775L63,97.325V72.519L41.371,84.922l-0.79,2.402l-6.14,22.916l-7.823-2.096l4.688-17.494l-17.882,10.324l-4.068-7.046l17.705-10.222L9.566,79.018l2.096-7.823l23.095,6.188l2.223,0.596l21.66-12.505L37.157,53.071l-2.402,0.644l-22.916,6.14l-2.096-7.823l17.495-4.688L9.358,37.019l4.07-7.046l17.71,10.222l-4.678-17.494l7.842-2.096L40.525,43.7l0.669,2.223L63,58.428V33.622l-1.868-1.758L44.247,15.088l5.8-5.727L63,22.168V2h8v19.963L83.748,9.156l5.668,5.727L72.549,31.79L71,33.418v25.01l21.581-12.505l0.517-2.223l6.188-23.095l7.823,2.096l-4.688,17.494l17.705-10.222l4.068,7.046l-17.882,10.324l17.494,4.688l-2.096,7.823l-22.916-6.14l-2.402-0.644L74.911,65.473L96.57,77.979l2.223-0.596l23.095-6.188l2.096,7.823L106.491,83.706z"></path>
        </svg>
      </div>
      <div class="flake-wrapper" style="width: 40px; left: 44%; height: 40px; transform: scale(0.99); animation: falling 14s linear infinite">
        <svg width="129.108px" height="140.597px" viewBox="0 0 129.108 140.597" enable-background="new 0 0 129.108 140.597" xml:space="preserve" version="1.1" class="flake">
          <path
            fill="#00FFFF"
            d="M106.491,83.706l17.706,10.222l-4.067,7.046l-17.88-10.324l4.693,17.494l-7.814,2.096l-6.121-22.916l-0.604-2.402L71,72.519v25.01l1.569,1.627l16.848,16.906l-5.688,5.727L71,108.984V129h-8v-20.221l-12.917,12.807l-5.837-5.727l16.849-16.775L63,97.325V72.519L41.371,84.922l-0.79,2.402l-6.14,22.916l-7.823-2.096l4.688-17.494l-17.882,10.324l-4.068-7.046l17.705-10.222L9.566,79.018l2.096-7.823l23.095,6.188l2.223,0.596l21.66-12.505L37.157,53.071l-2.402,0.644l-22.916,6.14l-2.096-7.823l17.495-4.688L9.358,37.019l4.07-7.046l17.71,10.222l-4.678-17.494l7.842-2.096L40.525,43.7l0.669,2.223L63,58.428V33.622l-1.868-1.758L44.247,15.088l5.8-5.727L63,22.168V2h8v19.963L83.748,9.156l5.668,5.727L72.549,31.79L71,33.418v25.01l21.581-12.505l0.517-2.223l6.188-23.095l7.823,2.096l-4.688,17.494l17.705-10.222l4.068,7.046l-17.882,10.324l17.494,4.688l-2.096,7.823l-22.916-6.14l-2.402-0.644L74.911,65.473L96.57,77.979l2.223-0.596l23.095-6.188l2.096,7.823L106.491,83.706z"></path>
        </svg>
      </div>
      <div class="flake-wrapper" style="width: 40px; left: 84%; height: 40px; transform: scale(0.61); animation: falling 8s linear infinite">
        <svg width="129.108px" height="140.597px" viewBox="0 0 129.108 140.597" enable-background="new 0 0 129.108 140.597" xml:space="preserve" version="1.1" class="flake">
          <path
            fill="#00FFFF"
            d="M106.491,83.706l17.706,10.222l-4.067,7.046l-17.88-10.324l4.693,17.494l-7.814,2.096l-6.121-22.916l-0.604-2.402L71,72.519v25.01l1.569,1.627l16.848,16.906l-5.688,5.727L71,108.984V129h-8v-20.221l-12.917,12.807l-5.837-5.727l16.849-16.775L63,97.325V72.519L41.371,84.922l-0.79,2.402l-6.14,22.916l-7.823-2.096l4.688-17.494l-17.882,10.324l-4.068-7.046l17.705-10.222L9.566,79.018l2.096-7.823l23.095,6.188l2.223,0.596l21.66-12.505L37.157,53.071l-2.402,0.644l-22.916,6.14l-2.096-7.823l17.495-4.688L9.358,37.019l4.07-7.046l17.71,10.222l-4.678-17.494l7.842-2.096L40.525,43.7l0.669,2.223L63,58.428V33.622l-1.868-1.758L44.247,15.088l5.8-5.727L63,22.168V2h8v19.963L83.748,9.156l5.668,5.727L72.549,31.79L71,33.418v25.01l21.581-12.505l0.517-2.223l6.188-23.095l7.823,2.096l-4.688,17.494l17.705-10.222l4.068,7.046l-17.882,10.324l17.494,4.688l-2.096,7.823l-22.916-6.14l-2.402-0.644L74.911,65.473L96.57,77.979l2.223-0.596l23.095-6.188l2.096,7.823L106.491,83.706z"></path>
        </svg>
      </div>
      <div class="flake-wrapper" style="width: 40px; left: 29%; height: 40px; transform: scale(0.19); animation: falling 11s linear infinite">
        <svg width="129.108px" height="140.597px" viewBox="0 0 129.108 140.597" enable-background="new 0 0 129.108 140.597" xml:space="preserve" version="1.1" class="flake">
          <path
            fill="#00FFFF"
            d="M106.491,83.706l17.706,10.222l-4.067,7.046l-17.88-10.324l4.693,17.494l-7.814,2.096l-6.121-22.916l-0.604-2.402L71,72.519v25.01l1.569,1.627l16.848,16.906l-5.688,5.727L71,108.984V129h-8v-20.221l-12.917,12.807l-5.837-5.727l16.849-16.775L63,97.325V72.519L41.371,84.922l-0.79,2.402l-6.14,22.916l-7.823-2.096l4.688-17.494l-17.882,10.324l-4.068-7.046l17.705-10.222L9.566,79.018l2.096-7.823l23.095,6.188l2.223,0.596l21.66-12.505L37.157,53.071l-2.402,0.644l-22.916,6.14l-2.096-7.823l17.495-4.688L9.358,37.019l4.07-7.046l17.71,10.222l-4.678-17.494l7.842-2.096L40.525,43.7l0.669,2.223L63,58.428V33.622l-1.868-1.758L44.247,15.088l5.8-5.727L63,22.168V2h8v19.963L83.748,9.156l5.668,5.727L72.549,31.79L71,33.418v25.01l21.581-12.505l0.517-2.223l6.188-23.095l7.823,2.096l-4.688,17.494l17.705-10.222l4.068,7.046l-17.882,10.324l17.494,4.688l-2.096,7.823l-22.916-6.14l-2.402-0.644L74.911,65.473L96.57,77.979l2.223-0.596l23.095-6.188l2.096,7.823L106.491,83.706z"></path>
        </svg>
      </div>
      <div class="flake-wrapper" style="width: 40px; left: 63%; height: 40px; transform: scale(0.86); animation: falling 5s linear infinite">
        <svg width="129.108px" height="140.597px" viewBox="0 0 129.108 140.597" enable-background="new 0 0 129.108 140.597" xml:space="preserve" version="1.1" class="flake">
          <path
            fill="#00FFFF"
            d="M106.491,83.706l17.706,10.222l-4.067,7.046l-17.88-10.324l4.693,17.494l-7.814,2.096l-6.121-22.916l-0.604-2.402L71,72.519v25.01l1.569,1.627l16.848,16.906l-5.688,5.727L71,108.984V129h-8v-20.221l-12.917,12.807l-5.837-5.727l16.849-16.775L63,97.325V72.519L41.371,84.922l-0.79,2.402l-6.14,22.916l-7.823-2.096l4.688-17.494l-17.882,10.324l-4.068-7.046l17.705-10.222L9.566,79.018l2.096-7.823l23.095,6.188l2.223,0.596l21.66-12.505L37.157,53.071l-2.402,0.644l-22.916,6.14l-2.096-7.823l17.495-4.688L9.358,37.019l4.07-7.046l17.71,10.222l-4.678-17.494l7.842-2.096L40.525,43.7l0.669,2.223L63,58.428V33.622l-1.868-1.758L44.247,15.088l5.8-5.727L63,22.168V2h8v19.963L83.748,9.156l5.668,5.727L72.549,31.79L71,33.418v25.01l21.581-12.505l0.517-2.223l6.188-23.095l7.823,2.096l-4.688,17.494l17.705-10.222l4.068,7.046l-17.882,10.324l17.494,4.688l-2.096,7.823l-22.916-6.14l-2.402-0.644L74.911,65.473L96.57,77.979l2.223-0.596l23.095-6.188l2.096,7.823L106.491,83.706z"></path>
        </svg>
      </div>
      <div class="flake-wrapper" style="width: 40px; left: 46%; height: 40px; transform: scale(0.22); animation: falling 14s linear infinite">
        <svg width="129.108px" height="140.597px" viewBox="0 0 129.108 140.597" enable-background="new 0 0 129.108 140.597" xml:space="preserve" version="1.1" class="flake">
          <path
            fill="#00FFFF"
            d="M106.491,83.706l17.706,10.222l-4.067,7.046l-17.88-10.324l4.693,17.494l-7.814,2.096l-6.121-22.916l-0.604-2.402L71,72.519v25.01l1.569,1.627l16.848,16.906l-5.688,5.727L71,108.984V129h-8v-20.221l-12.917,12.807l-5.837-5.727l16.849-16.775L63,97.325V72.519L41.371,84.922l-0.79,2.402l-6.14,22.916l-7.823-2.096l4.688-17.494l-17.882,10.324l-4.068-7.046l17.705-10.222L9.566,79.018l2.096-7.823l23.095,6.188l2.223,0.596l21.66-12.505L37.157,53.071l-2.402,0.644l-22.916,6.14l-2.096-7.823l17.495-4.688L9.358,37.019l4.07-7.046l17.71,10.222l-4.678-17.494l7.842-2.096L40.525,43.7l0.669,2.223L63,58.428V33.622l-1.868-1.758L44.247,15.088l5.8-5.727L63,22.168V2h8v19.963L83.748,9.156l5.668,5.727L72.549,31.79L71,33.418v25.01l21.581-12.505l0.517-2.223l6.188-23.095l7.823,2.096l-4.688,17.494l17.705-10.222l4.068,7.046l-17.882,10.324l17.494,4.688l-2.096,7.823l-22.916-6.14l-2.402-0.644L74.911,65.473L96.57,77.979l2.223-0.596l23.095-6.188l2.096,7.823L106.491,83.706z"></path>
        </svg>
      </div>
      <div class="flake-wrapper" style="width: 40px; left: 57%; height: 40px; transform: scale(0.39); animation: falling 5s linear infinite">
        <svg width="129.108px" height="140.597px" viewBox="0 0 129.108 140.597" enable-background="new 0 0 129.108 140.597" xml:space="preserve" version="1.1" class="flake">
          <path
            fill="#00FFFF"
            d="M106.491,83.706l17.706,10.222l-4.067,7.046l-17.88-10.324l4.693,17.494l-7.814,2.096l-6.121-22.916l-0.604-2.402L71,72.519v25.01l1.569,1.627l16.848,16.906l-5.688,5.727L71,108.984V129h-8v-20.221l-12.917,12.807l-5.837-5.727l16.849-16.775L63,97.325V72.519L41.371,84.922l-0.79,2.402l-6.14,22.916l-7.823-2.096l4.688-17.494l-17.882,10.324l-4.068-7.046l17.705-10.222L9.566,79.018l2.096-7.823l23.095,6.188l2.223,0.596l21.66-12.505L37.157,53.071l-2.402,0.644l-22.916,6.14l-2.096-7.823l17.495-4.688L9.358,37.019l4.07-7.046l17.71,10.222l-4.678-17.494l7.842-2.096L40.525,43.7l0.669,2.223L63,58.428V33.622l-1.868-1.758L44.247,15.088l5.8-5.727L63,22.168V2h8v19.963L83.748,9.156l5.668,5.727L72.549,31.79L71,33.418v25.01l21.581-12.505l0.517-2.223l6.188-23.095l7.823,2.096l-4.688,17.494l17.705-10.222l4.068,7.046l-17.882,10.324l17.494,4.688l-2.096,7.823l-22.916-6.14l-2.402-0.644L74.911,65.473L96.57,77.979l2.223-0.596l23.095-6.188l2.096,7.823L106.491,83.706z"></path>
        </svg>
      </div>
      <div class="flake-wrapper" style="width: 40px; left: 72%; height: 40px; transform: scale(0.12); animation: falling 10s linear infinite">
        <svg width="129.108px" height="140.597px" viewBox="0 0 129.108 140.597" enable-background="new 0 0 129.108 140.597" xml:space="preserve" version="1.1" class="flake">
          <path
            fill="#00FFFF"
            d="M106.491,83.706l17.706,10.222l-4.067,7.046l-17.88-10.324l4.693,17.494l-7.814,2.096l-6.121-22.916l-0.604-2.402L71,72.519v25.01l1.569,1.627l16.848,16.906l-5.688,5.727L71,108.984V129h-8v-20.221l-12.917,12.807l-5.837-5.727l16.849-16.775L63,97.325V72.519L41.371,84.922l-0.79,2.402l-6.14,22.916l-7.823-2.096l4.688-17.494l-17.882,10.324l-4.068-7.046l17.705-10.222L9.566,79.018l2.096-7.823l23.095,6.188l2.223,0.596l21.66-12.505L37.157,53.071l-2.402,0.644l-22.916,6.14l-2.096-7.823l17.495-4.688L9.358,37.019l4.07-7.046l17.71,10.222l-4.678-17.494l7.842-2.096L40.525,43.7l0.669,2.223L63,58.428V33.622l-1.868-1.758L44.247,15.088l5.8-5.727L63,22.168V2h8v19.963L83.748,9.156l5.668,5.727L72.549,31.79L71,33.418v25.01l21.581-12.505l0.517-2.223l6.188-23.095l7.823,2.096l-4.688,17.494l17.705-10.222l4.068,7.046l-17.882,10.324l17.494,4.688l-2.096,7.823l-22.916-6.14l-2.402-0.644L74.911,65.473L96.57,77.979l2.223-0.596l23.095-6.188l2.096,7.823L106.491,83.706z"></path>
        </svg>
      </div>
      <div class="flake-wrapper" style="width: 40px; left: 60%; height: 40px; transform: scale(0.62); animation: falling 9s linear infinite">
        <svg width="129.108px" height="140.597px" viewBox="0 0 129.108 140.597" enable-background="new 0 0 129.108 140.597" xml:space="preserve" version="1.1" class="flake">
          <path
            fill="#00FFFF"
            d="M106.491,83.706l17.706,10.222l-4.067,7.046l-17.88-10.324l4.693,17.494l-7.814,2.096l-6.121-22.916l-0.604-2.402L71,72.519v25.01l1.569,1.627l16.848,16.906l-5.688,5.727L71,108.984V129h-8v-20.221l-12.917,12.807l-5.837-5.727l16.849-16.775L63,97.325V72.519L41.371,84.922l-0.79,2.402l-6.14,22.916l-7.823-2.096l4.688-17.494l-17.882,10.324l-4.068-7.046l17.705-10.222L9.566,79.018l2.096-7.823l23.095,6.188l2.223,0.596l21.66-12.505L37.157,53.071l-2.402,0.644l-22.916,6.14l-2.096-7.823l17.495-4.688L9.358,37.019l4.07-7.046l17.71,10.222l-4.678-17.494l7.842-2.096L40.525,43.7l0.669,2.223L63,58.428V33.622l-1.868-1.758L44.247,15.088l5.8-5.727L63,22.168V2h8v19.963L83.748,9.156l5.668,5.727L72.549,31.79L71,33.418v25.01l21.581-12.505l0.517-2.223l6.188-23.095l7.823,2.096l-4.688,17.494l17.705-10.222l4.068,7.046l-17.882,10.324l17.494,4.688l-2.096,7.823l-22.916-6.14l-2.402-0.644L74.911,65.473L96.57,77.979l2.223-0.596l23.095-6.188l2.096,7.823L106.491,83.706z"></path>
        </svg>
      </div>
      <div class="flake-wrapper" style="width: 40px; left: 28%; height: 40px; transform: scale(0.37); animation: falling 8s linear infinite">
        <svg width="129.108px" height="140.597px" viewBox="0 0 129.108 140.597" enable-background="new 0 0 129.108 140.597" xml:space="preserve" version="1.1" class="flake">
          <path
            fill="#00FFFF"
            d="M106.491,83.706l17.706,10.222l-4.067,7.046l-17.88-10.324l4.693,17.494l-7.814,2.096l-6.121-22.916l-0.604-2.402L71,72.519v25.01l1.569,1.627l16.848,16.906l-5.688,5.727L71,108.984V129h-8v-20.221l-12.917,12.807l-5.837-5.727l16.849-16.775L63,97.325V72.519L41.371,84.922l-0.79,2.402l-6.14,22.916l-7.823-2.096l4.688-17.494l-17.882,10.324l-4.068-7.046l17.705-10.222L9.566,79.018l2.096-7.823l23.095,6.188l2.223,0.596l21.66-12.505L37.157,53.071l-2.402,0.644l-22.916,6.14l-2.096-7.823l17.495-4.688L9.358,37.019l4.07-7.046l17.71,10.222l-4.678-17.494l7.842-2.096L40.525,43.7l0.669,2.223L63,58.428V33.622l-1.868-1.758L44.247,15.088l5.8-5.727L63,22.168V2h8v19.963L83.748,9.156l5.668,5.727L72.549,31.79L71,33.418v25.01l21.581-12.505l0.517-2.223l6.188-23.095l7.823,2.096l-4.688,17.494l17.705-10.222l4.068,7.046l-17.882,10.324l17.494,4.688l-2.096,7.823l-22.916-6.14l-2.402-0.644L74.911,65.473L96.57,77.979l2.223-0.596l23.095-6.188l2.096,7.823L106.491,83.706z"></path>
        </svg>
      </div>
      <div class="flake-wrapper" style="width: 40px; left: 11%; height: 40px; transform: scale(0.76); animation: falling 7s linear infinite">
        <svg width="129.108px" height="140.597px" viewBox="0 0 129.108 140.597" enable-background="new 0 0 129.108 140.597" xml:space="preserve" version="1.1" class="flake">
          <path
            fill="#00FFFF"
            d="M106.491,83.706l17.706,10.222l-4.067,7.046l-17.88-10.324l4.693,17.494l-7.814,2.096l-6.121-22.916l-0.604-2.402L71,72.519v25.01l1.569,1.627l16.848,16.906l-5.688,5.727L71,108.984V129h-8v-20.221l-12.917,12.807l-5.837-5.727l16.849-16.775L63,97.325V72.519L41.371,84.922l-0.79,2.402l-6.14,22.916l-7.823-2.096l4.688-17.494l-17.882,10.324l-4.068-7.046l17.705-10.222L9.566,79.018l2.096-7.823l23.095,6.188l2.223,0.596l21.66-12.505L37.157,53.071l-2.402,0.644l-22.916,6.14l-2.096-7.823l17.495-4.688L9.358,37.019l4.07-7.046l17.71,10.222l-4.678-17.494l7.842-2.096L40.525,43.7l0.669,2.223L63,58.428V33.622l-1.868-1.758L44.247,15.088l5.8-5.727L63,22.168V2h8v19.963L83.748,9.156l5.668,5.727L72.549,31.79L71,33.418v25.01l21.581-12.505l0.517-2.223l6.188-23.095l7.823,2.096l-4.688,17.494l17.705-10.222l4.068,7.046l-17.882,10.324l17.494,4.688l-2.096,7.823l-22.916-6.14l-2.402-0.644L74.911,65.473L96.57,77.979l2.223-0.596l23.095-6.188l2.096,7.823L106.491,83.706z"></path>
        </svg>
      </div>
      <div class="flake-wrapper" style="width: 40px; left: 50%; height: 40px; transform: scale(0.55); animation: falling 6s linear infinite">
        <svg width="129.108px" height="140.597px" viewBox="0 0 129.108 140.597" enable-background="new 0 0 129.108 140.597" xml:space="preserve" version="1.1" class="flake">
          <path
            fill="#00FFFF"
            d="M106.491,83.706l17.706,10.222l-4.067,7.046l-17.88-10.324l4.693,17.494l-7.814,2.096l-6.121-22.916l-0.604-2.402L71,72.519v25.01l1.569,1.627l16.848,16.906l-5.688,5.727L71,108.984V129h-8v-20.221l-12.917,12.807l-5.837-5.727l16.849-16.775L63,97.325V72.519L41.371,84.922l-0.79,2.402l-6.14,22.916l-7.823-2.096l4.688-17.494l-17.882,10.324l-4.068-7.046l17.705-10.222L9.566,79.018l2.096-7.823l23.095,6.188l2.223,0.596l21.66-12.505L37.157,53.071l-2.402,0.644l-22.916,6.14l-2.096-7.823l17.495-4.688L9.358,37.019l4.07-7.046l17.71,10.222l-4.678-17.494l7.842-2.096L40.525,43.7l0.669,2.223L63,58.428V33.622l-1.868-1.758L44.247,15.088l5.8-5.727L63,22.168V2h8v19.963L83.748,9.156l5.668,5.727L72.549,31.79L71,33.418v25.01l21.581-12.505l0.517-2.223l6.188-23.095l7.823,2.096l-4.688,17.494l17.705-10.222l4.068,7.046l-17.882,10.324l17.494,4.688l-2.096,7.823l-22.916-6.14l-2.402-0.644L74.911,65.473L96.57,77.979l2.223-0.596l23.095-6.188l2.096,7.823L106.491,83.706z"></path>
        </svg>
      </div>
      <div class="flake-wrapper" style="width: 40px; left: 71%; height: 40px; transform: scale(0.81); animation: falling 11s linear infinite">
        <svg width="129.108px" height="140.597px" viewBox="0 0 129.108 140.597" enable-background="new 0 0 129.108 140.597" xml:space="preserve" version="1.1" class="flake">
          <path
            fill="#00FFFF"
            d="M106.491,83.706l17.706,10.222l-4.067,7.046l-17.88-10.324l4.693,17.494l-7.814,2.096l-6.121-22.916l-0.604-2.402L71,72.519v25.01l1.569,1.627l16.848,16.906l-5.688,5.727L71,108.984V129h-8v-20.221l-12.917,12.807l-5.837-5.727l16.849-16.775L63,97.325V72.519L41.371,84.922l-0.79,2.402l-6.14,22.916l-7.823-2.096l4.688-17.494l-17.882,10.324l-4.068-7.046l17.705-10.222L9.566,79.018l2.096-7.823l23.095,6.188l2.223,0.596l21.66-12.505L37.157,53.071l-2.402,0.644l-22.916,6.14l-2.096-7.823l17.495-4.688L9.358,37.019l4.07-7.046l17.71,10.222l-4.678-17.494l7.842-2.096L40.525,43.7l0.669,2.223L63,58.428V33.622l-1.868-1.758L44.247,15.088l5.8-5.727L63,22.168V2h8v19.963L83.748,9.156l5.668,5.727L72.549,31.79L71,33.418v25.01l21.581-12.505l0.517-2.223l6.188-23.095l7.823,2.096l-4.688,17.494l17.705-10.222l4.068,7.046l-17.882,10.324l17.494,4.688l-2.096,7.823l-22.916-6.14l-2.402-0.644L74.911,65.473L96.57,77.979l2.223-0.596l23.095-6.188l2.096,7.823L106.491,83.706z"></path>
        </svg>
      </div>
      <div class="flake-wrapper" style="width: 40px; left: 87%; height: 40px; transform: scale(0.68); animation: falling 12s linear infinite">
        <svg width="129.108px" height="140.597px" viewBox="0 0 129.108 140.597" enable-background="new 0 0 129.108 140.597" xml:space="preserve" version="1.1" class="flake">
          <path
            fill="#00FFFF"
            d="M106.491,83.706l17.706,10.222l-4.067,7.046l-17.88-10.324l4.693,17.494l-7.814,2.096l-6.121-22.916l-0.604-2.402L71,72.519v25.01l1.569,1.627l16.848,16.906l-5.688,5.727L71,108.984V129h-8v-20.221l-12.917,12.807l-5.837-5.727l16.849-16.775L63,97.325V72.519L41.371,84.922l-0.79,2.402l-6.14,22.916l-7.823-2.096l4.688-17.494l-17.882,10.324l-4.068-7.046l17.705-10.222L9.566,79.018l2.096-7.823l23.095,6.188l2.223,0.596l21.66-12.505L37.157,53.071l-2.402,0.644l-22.916,6.14l-2.096-7.823l17.495-4.688L9.358,37.019l4.07-7.046l17.71,10.222l-4.678-17.494l7.842-2.096L40.525,43.7l0.669,2.223L63,58.428V33.622l-1.868-1.758L44.247,15.088l5.8-5.727L63,22.168V2h8v19.963L83.748,9.156l5.668,5.727L72.549,31.79L71,33.418v25.01l21.581-12.505l0.517-2.223l6.188-23.095l7.823,2.096l-4.688,17.494l17.705-10.222l4.068,7.046l-17.882,10.324l17.494,4.688l-2.096,7.823l-22.916-6.14l-2.402-0.644L74.911,65.473L96.57,77.979l2.223-0.596l23.095-6.188l2.096,7.823L106.491,83.706z"></path>
        </svg>
      </div>
      <div class="flake-wrapper" style="width: 40px; left: 30%; height: 40px; transform: scale(0.66); animation: falling 11s linear infinite">
        <svg width="129.108px" height="140.597px" viewBox="0 0 129.108 140.597" enable-background="new 0 0 129.108 140.597" xml:space="preserve" version="1.1" class="flake">
          <path
            fill="#00FFFF"
            d="M106.491,83.706l17.706,10.222l-4.067,7.046l-17.88-10.324l4.693,17.494l-7.814,2.096l-6.121-22.916l-0.604-2.402L71,72.519v25.01l1.569,1.627l16.848,16.906l-5.688,5.727L71,108.984V129h-8v-20.221l-12.917,12.807l-5.837-5.727l16.849-16.775L63,97.325V72.519L41.371,84.922l-0.79,2.402l-6.14,22.916l-7.823-2.096l4.688-17.494l-17.882,10.324l-4.068-7.046l17.705-10.222L9.566,79.018l2.096-7.823l23.095,6.188l2.223,0.596l21.66-12.505L37.157,53.071l-2.402,0.644l-22.916,6.14l-2.096-7.823l17.495-4.688L9.358,37.019l4.07-7.046l17.71,10.222l-4.678-17.494l7.842-2.096L40.525,43.7l0.669,2.223L63,58.428V33.622l-1.868-1.758L44.247,15.088l5.8-5.727L63,22.168V2h8v19.963L83.748,9.156l5.668,5.727L72.549,31.79L71,33.418v25.01l21.581-12.505l0.517-2.223l6.188-23.095l7.823,2.096l-4.688,17.494l17.705-10.222l4.068,7.046l-17.882,10.324l17.494,4.688l-2.096,7.823l-22.916-6.14l-2.402-0.644L74.911,65.473L96.57,77.979l2.223-0.596l23.095-6.188l2.096,7.823L106.491,83.706z"></path>
        </svg>
      </div>
      <div class="flake-wrapper" style="width: 40px; left: 66%; height: 40px; transform: scale(0.85); animation: falling 7s linear infinite">
        <svg width="129.108px" height="140.597px" viewBox="0 0 129.108 140.597" enable-background="new 0 0 129.108 140.597" xml:space="preserve" version="1.1" class="flake">
          <path
            fill="#00FFFF"
            d="M106.491,83.706l17.706,10.222l-4.067,7.046l-17.88-10.324l4.693,17.494l-7.814,2.096l-6.121-22.916l-0.604-2.402L71,72.519v25.01l1.569,1.627l16.848,16.906l-5.688,5.727L71,108.984V129h-8v-20.221l-12.917,12.807l-5.837-5.727l16.849-16.775L63,97.325V72.519L41.371,84.922l-0.79,2.402l-6.14,22.916l-7.823-2.096l4.688-17.494l-17.882,10.324l-4.068-7.046l17.705-10.222L9.566,79.018l2.096-7.823l23.095,6.188l2.223,0.596l21.66-12.505L37.157,53.071l-2.402,0.644l-22.916,6.14l-2.096-7.823l17.495-4.688L9.358,37.019l4.07-7.046l17.71,10.222l-4.678-17.494l7.842-2.096L40.525,43.7l0.669,2.223L63,58.428V33.622l-1.868-1.758L44.247,15.088l5.8-5.727L63,22.168V2h8v19.963L83.748,9.156l5.668,5.727L72.549,31.79L71,33.418v25.01l21.581-12.505l0.517-2.223l6.188-23.095l7.823,2.096l-4.688,17.494l17.705-10.222l4.068,7.046l-17.882,10.324l17.494,4.688l-2.096,7.823l-22.916-6.14l-2.402-0.644L74.911,65.473L96.57,77.979l2.223-0.596l23.095-6.188l2.096,7.823L106.491,83.706z"></path>
        </svg>
      </div>
      <div class="flake-wrapper" style="width: 40px; left: 22%; height: 40px; transform: scale(0.6); animation: falling 13s linear infinite">
        <svg width="129.108px" height="140.597px" viewBox="0 0 129.108 140.597" enable-background="new 0 0 129.108 140.597" xml:space="preserve" version="1.1" class="flake">
          <path
            fill="#00FFFF"
            d="M106.491,83.706l17.706,10.222l-4.067,7.046l-17.88-10.324l4.693,17.494l-7.814,2.096l-6.121-22.916l-0.604-2.402L71,72.519v25.01l1.569,1.627l16.848,16.906l-5.688,5.727L71,108.984V129h-8v-20.221l-12.917,12.807l-5.837-5.727l16.849-16.775L63,97.325V72.519L41.371,84.922l-0.79,2.402l-6.14,22.916l-7.823-2.096l4.688-17.494l-17.882,10.324l-4.068-7.046l17.705-10.222L9.566,79.018l2.096-7.823l23.095,6.188l2.223,0.596l21.66-12.505L37.157,53.071l-2.402,0.644l-22.916,6.14l-2.096-7.823l17.495-4.688L9.358,37.019l4.07-7.046l17.71,10.222l-4.678-17.494l7.842-2.096L40.525,43.7l0.669,2.223L63,58.428V33.622l-1.868-1.758L44.247,15.088l5.8-5.727L63,22.168V2h8v19.963L83.748,9.156l5.668,5.727L72.549,31.79L71,33.418v25.01l21.581-12.505l0.517-2.223l6.188-23.095l7.823,2.096l-4.688,17.494l17.705-10.222l4.068,7.046l-17.882,10.324l17.494,4.688l-2.096,7.823l-22.916-6.14l-2.402-0.644L74.911,65.473L96.57,77.979l2.223-0.596l23.095-6.188l2.096,7.823L106.491,83.706z"></path>
        </svg>
      </div>
      <div class="flake-wrapper" style="width: 40px; left: 34%; height: 40px; transform: scale(0.34); animation: falling 5s linear infinite">
        <svg width="129.108px" height="140.597px" viewBox="0 0 129.108 140.597" enable-background="new 0 0 129.108 140.597" xml:space="preserve" version="1.1" class="flake">
          <path
            fill="#00FFFF"
            d="M106.491,83.706l17.706,10.222l-4.067,7.046l-17.88-10.324l4.693,17.494l-7.814,2.096l-6.121-22.916l-0.604-2.402L71,72.519v25.01l1.569,1.627l16.848,16.906l-5.688,5.727L71,108.984V129h-8v-20.221l-12.917,12.807l-5.837-5.727l16.849-16.775L63,97.325V72.519L41.371,84.922l-0.79,2.402l-6.14,22.916l-7.823-2.096l4.688-17.494l-17.882,10.324l-4.068-7.046l17.705-10.222L9.566,79.018l2.096-7.823l23.095,6.188l2.223,0.596l21.66-12.505L37.157,53.071l-2.402,0.644l-22.916,6.14l-2.096-7.823l17.495-4.688L9.358,37.019l4.07-7.046l17.71,10.222l-4.678-17.494l7.842-2.096L40.525,43.7l0.669,2.223L63,58.428V33.622l-1.868-1.758L44.247,15.088l5.8-5.727L63,22.168V2h8v19.963L83.748,9.156l5.668,5.727L72.549,31.79L71,33.418v25.01l21.581-12.505l0.517-2.223l6.188-23.095l7.823,2.096l-4.688,17.494l17.705-10.222l4.068,7.046l-17.882,10.324l17.494,4.688l-2.096,7.823l-22.916-6.14l-2.402-0.644L74.911,65.473L96.57,77.979l2.223-0.596l23.095-6.188l2.096,7.823L106.491,83.706z"></path>
        </svg>
      </div>
      <div class="flake-wrapper" style="width: 40px; left: 59%; height: 40px; transform: scale(0.7); animation: falling 13s linear infinite">
        <svg width="129.108px" height="140.597px" viewBox="0 0 129.108 140.597" enable-background="new 0 0 129.108 140.597" xml:space="preserve" version="1.1" class="flake">
          <path
            fill="#00FFFF"
            d="M106.491,83.706l17.706,10.222l-4.067,7.046l-17.88-10.324l4.693,17.494l-7.814,2.096l-6.121-22.916l-0.604-2.402L71,72.519v25.01l1.569,1.627l16.848,16.906l-5.688,5.727L71,108.984V129h-8v-20.221l-12.917,12.807l-5.837-5.727l16.849-16.775L63,97.325V72.519L41.371,84.922l-0.79,2.402l-6.14,22.916l-7.823-2.096l4.688-17.494l-17.882,10.324l-4.068-7.046l17.705-10.222L9.566,79.018l2.096-7.823l23.095,6.188l2.223,0.596l21.66-12.505L37.157,53.071l-2.402,0.644l-22.916,6.14l-2.096-7.823l17.495-4.688L9.358,37.019l4.07-7.046l17.71,10.222l-4.678-17.494l7.842-2.096L40.525,43.7l0.669,2.223L63,58.428V33.622l-1.868-1.758L44.247,15.088l5.8-5.727L63,22.168V2h8v19.963L83.748,9.156l5.668,5.727L72.549,31.79L71,33.418v25.01l21.581-12.505l0.517-2.223l6.188-23.095l7.823,2.096l-4.688,17.494l17.705-10.222l4.068,7.046l-17.882,10.324l17.494,4.688l-2.096,7.823l-22.916-6.14l-2.402-0.644L74.911,65.473L96.57,77.979l2.223-0.596l23.095-6.188l2.096,7.823L106.491,83.706z"></path>
        </svg>
      </div>
      <div class="flake-wrapper" style="width: 40px; left: 43%; height: 40px; transform: scale(0.66); animation: falling 12s linear infinite">
        <svg width="129.108px" height="140.597px" viewBox="0 0 129.108 140.597" enable-background="new 0 0 129.108 140.597" xml:space="preserve" version="1.1" class="flake">
          <path
            fill="#00FFFF"
            d="M106.491,83.706l17.706,10.222l-4.067,7.046l-17.88-10.324l4.693,17.494l-7.814,2.096l-6.121-22.916l-0.604-2.402L71,72.519v25.01l1.569,1.627l16.848,16.906l-5.688,5.727L71,108.984V129h-8v-20.221l-12.917,12.807l-5.837-5.727l16.849-16.775L63,97.325V72.519L41.371,84.922l-0.79,2.402l-6.14,22.916l-7.823-2.096l4.688-17.494l-17.882,10.324l-4.068-7.046l17.705-10.222L9.566,79.018l2.096-7.823l23.095,6.188l2.223,0.596l21.66-12.505L37.157,53.071l-2.402,0.644l-22.916,6.14l-2.096-7.823l17.495-4.688L9.358,37.019l4.07-7.046l17.71,10.222l-4.678-17.494l7.842-2.096L40.525,43.7l0.669,2.223L63,58.428V33.622l-1.868-1.758L44.247,15.088l5.8-5.727L63,22.168V2h8v19.963L83.748,9.156l5.668,5.727L72.549,31.79L71,33.418v25.01l21.581-12.505l0.517-2.223l6.188-23.095l7.823,2.096l-4.688,17.494l17.705-10.222l4.068,7.046l-17.882,10.324l17.494,4.688l-2.096,7.823l-22.916-6.14l-2.402-0.644L74.911,65.473L96.57,77.979l2.223-0.596l23.095-6.188l2.096,7.823L106.491,83.706z"></path>
        </svg>
      </div>
      <div class="flake-wrapper" style="width: 40px; left: 78%; height: 40px; transform: scale(0.69); animation: falling 9s linear infinite">
        <svg width="129.108px" height="140.597px" viewBox="0 0 129.108 140.597" enable-background="new 0 0 129.108 140.597" xml:space="preserve" version="1.1" class="flake">
          <path
            fill="#00FFFF"
            d="M106.491,83.706l17.706,10.222l-4.067,7.046l-17.88-10.324l4.693,17.494l-7.814,2.096l-6.121-22.916l-0.604-2.402L71,72.519v25.01l1.569,1.627l16.848,16.906l-5.688,5.727L71,108.984V129h-8v-20.221l-12.917,12.807l-5.837-5.727l16.849-16.775L63,97.325V72.519L41.371,84.922l-0.79,2.402l-6.14,22.916l-7.823-2.096l4.688-17.494l-17.882,10.324l-4.068-7.046l17.705-10.222L9.566,79.018l2.096-7.823l23.095,6.188l2.223,0.596l21.66-12.505L37.157,53.071l-2.402,0.644l-22.916,6.14l-2.096-7.823l17.495-4.688L9.358,37.019l4.07-7.046l17.71,10.222l-4.678-17.494l7.842-2.096L40.525,43.7l0.669,2.223L63,58.428V33.622l-1.868-1.758L44.247,15.088l5.8-5.727L63,22.168V2h8v19.963L83.748,9.156l5.668,5.727L72.549,31.79L71,33.418v25.01l21.581-12.505l0.517-2.223l6.188-23.095l7.823,2.096l-4.688,17.494l17.705-10.222l4.068,7.046l-17.882,10.324l17.494,4.688l-2.096,7.823l-22.916-6.14l-2.402-0.644L74.911,65.473L96.57,77.979l2.223-0.596l23.095-6.188l2.096,7.823L106.491,83.706z"></path>
        </svg>
      </div>
      <div class="flake-wrapper" style="width: 40px; left: 61%; height: 40px; transform: scale(0.17); animation: falling 6s linear infinite">
        <svg width="129.108px" height="140.597px" viewBox="0 0 129.108 140.597" enable-background="new 0 0 129.108 140.597" xml:space="preserve" version="1.1" class="flake">
          <path
            fill="#00FFFF"
            d="M106.491,83.706l17.706,10.222l-4.067,7.046l-17.88-10.324l4.693,17.494l-7.814,2.096l-6.121-22.916l-0.604-2.402L71,72.519v25.01l1.569,1.627l16.848,16.906l-5.688,5.727L71,108.984V129h-8v-20.221l-12.917,12.807l-5.837-5.727l16.849-16.775L63,97.325V72.519L41.371,84.922l-0.79,2.402l-6.14,22.916l-7.823-2.096l4.688-17.494l-17.882,10.324l-4.068-7.046l17.705-10.222L9.566,79.018l2.096-7.823l23.095,6.188l2.223,0.596l21.66-12.505L37.157,53.071l-2.402,0.644l-22.916,6.14l-2.096-7.823l17.495-4.688L9.358,37.019l4.07-7.046l17.71,10.222l-4.678-17.494l7.842-2.096L40.525,43.7l0.669,2.223L63,58.428V33.622l-1.868-1.758L44.247,15.088l5.8-5.727L63,22.168V2h8v19.963L83.748,9.156l5.668,5.727L72.549,31.79L71,33.418v25.01l21.581-12.505l0.517-2.223l6.188-23.095l7.823,2.096l-4.688,17.494l17.705-10.222l4.068,7.046l-17.882,10.324l17.494,4.688l-2.096,7.823l-22.916-6.14l-2.402-0.644L74.911,65.473L96.57,77.979l2.223-0.596l23.095-6.188l2.096,7.823L106.491,83.706z"></path>
        </svg>
      </div>
      <div class="flake-wrapper" style="width: 40px; left: 79%; height: 40px; transform: scale(0.16); animation: falling 10s linear infinite">
        <svg width="129.108px" height="140.597px" viewBox="0 0 129.108 140.597" enable-background="new 0 0 129.108 140.597" xml:space="preserve" version="1.1" class="flake">
          <path
            fill="#00FFFF"
            d="M106.491,83.706l17.706,10.222l-4.067,7.046l-17.88-10.324l4.693,17.494l-7.814,2.096l-6.121-22.916l-0.604-2.402L71,72.519v25.01l1.569,1.627l16.848,16.906l-5.688,5.727L71,108.984V129h-8v-20.221l-12.917,12.807l-5.837-5.727l16.849-16.775L63,97.325V72.519L41.371,84.922l-0.79,2.402l-6.14,22.916l-7.823-2.096l4.688-17.494l-17.882,10.324l-4.068-7.046l17.705-10.222L9.566,79.018l2.096-7.823l23.095,6.188l2.223,0.596l21.66-12.505L37.157,53.071l-2.402,0.644l-22.916,6.14l-2.096-7.823l17.495-4.688L9.358,37.019l4.07-7.046l17.71,10.222l-4.678-17.494l7.842-2.096L40.525,43.7l0.669,2.223L63,58.428V33.622l-1.868-1.758L44.247,15.088l5.8-5.727L63,22.168V2h8v19.963L83.748,9.156l5.668,5.727L72.549,31.79L71,33.418v25.01l21.581-12.505l0.517-2.223l6.188-23.095l7.823,2.096l-4.688,17.494l17.705-10.222l4.068,7.046l-17.882,10.324l17.494,4.688l-2.096,7.823l-22.916-6.14l-2.402-0.644L74.911,65.473L96.57,77.979l2.223-0.596l23.095-6.188l2.096,7.823L106.491,83.706z"></path>
        </svg>
      </div>
      <div class="flake-wrapper" style="width: 40px; left: 38%; height: 40px; transform: scale(0.08); animation: falling 6s linear infinite">
        <svg width="129.108px" height="140.597px" viewBox="0 0 129.108 140.597" enable-background="new 0 0 129.108 140.597" xml:space="preserve" version="1.1" class="flake">
          <path
            fill="#00FFFF"
            d="M106.491,83.706l17.706,10.222l-4.067,7.046l-17.88-10.324l4.693,17.494l-7.814,2.096l-6.121-22.916l-0.604-2.402L71,72.519v25.01l1.569,1.627l16.848,16.906l-5.688,5.727L71,108.984V129h-8v-20.221l-12.917,12.807l-5.837-5.727l16.849-16.775L63,97.325V72.519L41.371,84.922l-0.79,2.402l-6.14,22.916l-7.823-2.096l4.688-17.494l-17.882,10.324l-4.068-7.046l17.705-10.222L9.566,79.018l2.096-7.823l23.095,6.188l2.223,0.596l21.66-12.505L37.157,53.071l-2.402,0.644l-22.916,6.14l-2.096-7.823l17.495-4.688L9.358,37.019l4.07-7.046l17.71,10.222l-4.678-17.494l7.842-2.096L40.525,43.7l0.669,2.223L63,58.428V33.622l-1.868-1.758L44.247,15.088l5.8-5.727L63,22.168V2h8v19.963L83.748,9.156l5.668,5.727L72.549,31.79L71,33.418v25.01l21.581-12.505l0.517-2.223l6.188-23.095l7.823,2.096l-4.688,17.494l17.705-10.222l4.068,7.046l-17.882,10.324l17.494,4.688l-2.096,7.823l-22.916-6.14l-2.402-0.644L74.911,65.473L96.57,77.979l2.223-0.596l23.095-6.188l2.096,7.823L106.491,83.706z"></path>
        </svg>
      </div>
      <div class="flake-wrapper" style="width: 40px; left: 78%; height: 40px; transform: scale(0.95); animation: falling 9s linear infinite">
        <svg width="129.108px" height="140.597px" viewBox="0 0 129.108 140.597" enable-background="new 0 0 129.108 140.597" xml:space="preserve" version="1.1" class="flake">
          <path
            fill="#00FFFF"
            d="M106.491,83.706l17.706,10.222l-4.067,7.046l-17.88-10.324l4.693,17.494l-7.814,2.096l-6.121-22.916l-0.604-2.402L71,72.519v25.01l1.569,1.627l16.848,16.906l-5.688,5.727L71,108.984V129h-8v-20.221l-12.917,12.807l-5.837-5.727l16.849-16.775L63,97.325V72.519L41.371,84.922l-0.79,2.402l-6.14,22.916l-7.823-2.096l4.688-17.494l-17.882,10.324l-4.068-7.046l17.705-10.222L9.566,79.018l2.096-7.823l23.095,6.188l2.223,0.596l21.66-12.505L37.157,53.071l-2.402,0.644l-22.916,6.14l-2.096-7.823l17.495-4.688L9.358,37.019l4.07-7.046l17.71,10.222l-4.678-17.494l7.842-2.096L40.525,43.7l0.669,2.223L63,58.428V33.622l-1.868-1.758L44.247,15.088l5.8-5.727L63,22.168V2h8v19.963L83.748,9.156l5.668,5.727L72.549,31.79L71,33.418v25.01l21.581-12.505l0.517-2.223l6.188-23.095l7.823,2.096l-4.688,17.494l17.705-10.222l4.068,7.046l-17.882,10.324l17.494,4.688l-2.096,7.823l-22.916-6.14l-2.402-0.644L74.911,65.473L96.57,77.979l2.223-0.596l23.095-6.188l2.096,7.823L106.491,83.706z"></path>
        </svg>
      </div>
      <div class="flake-wrapper" style="width: 40px; left: 4%; height: 40px; transform: scale(0.21); animation: falling 14s linear infinite">
        <svg width="129.108px" height="140.597px" viewBox="0 0 129.108 140.597" enable-background="new 0 0 129.108 140.597" xml:space="preserve" version="1.1" class="flake">
          <path
            fill="#00FFFF"
            d="M106.491,83.706l17.706,10.222l-4.067,7.046l-17.88-10.324l4.693,17.494l-7.814,2.096l-6.121-22.916l-0.604-2.402L71,72.519v25.01l1.569,1.627l16.848,16.906l-5.688,5.727L71,108.984V129h-8v-20.221l-12.917,12.807l-5.837-5.727l16.849-16.775L63,97.325V72.519L41.371,84.922l-0.79,2.402l-6.14,22.916l-7.823-2.096l4.688-17.494l-17.882,10.324l-4.068-7.046l17.705-10.222L9.566,79.018l2.096-7.823l23.095,6.188l2.223,0.596l21.66-12.505L37.157,53.071l-2.402,0.644l-22.916,6.14l-2.096-7.823l17.495-4.688L9.358,37.019l4.07-7.046l17.71,10.222l-4.678-17.494l7.842-2.096L40.525,43.7l0.669,2.223L63,58.428V33.622l-1.868-1.758L44.247,15.088l5.8-5.727L63,22.168V2h8v19.963L83.748,9.156l5.668,5.727L72.549,31.79L71,33.418v25.01l21.581-12.505l0.517-2.223l6.188-23.095l7.823,2.096l-4.688,17.494l17.705-10.222l4.068,7.046l-17.882,10.324l17.494,4.688l-2.096,7.823l-22.916-6.14l-2.402-0.644L74.911,65.473L96.57,77.979l2.223-0.596l23.095-6.188l2.096,7.823L106.491,83.706z"></path>
        </svg>
      </div>
    </div>
  </body>
</html>
