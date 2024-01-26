<?php
  session_start();
  include_once 'db-connect.inc.php';
  include_once 'web-kb2.inc.php';
  $user_id = $_SESSION['user_id'] ?? null;
?>


<!DOCTYPE html>
<html lang="en" data-bs-target="dark">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Landing Page</title>
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

<body class="">

<?php
    $username = "Guest";
    $email = "please login";

    if ($user_id !== null) {

      $sql = "SELECT * FROM users WHERE user_id = '$user_id'";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      $username = $row['username'];
      $email = $row['email'];

    }


    echo '<header class="container-fluid p-3">
    <nav class="navbar navbar-expand-lg bg-transparant justify-content-between px-md-3 px-2 rounded-3">
      <!-- <div>
        <span class="d-xl-none navbar-brand ms-2 pe-auto" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
          <i class="bi bi-list" id="icon-toggle"></i>
        </span>
      </div> -->
      <div class="d-md-none">
        <span class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
          <i class="bi bi-list"></i>
        </span>
      </div>
      <div class="d-flex py-1 px-2 align-items-center">
        <img src="../../asset/img/icon/tokaku_logo.svg" alt="TOKAKU" width="32" height="32" />
        <span class="fs-4 ms-2 align-bottom logo d-none d-md-inline-block"> Tokaku </span>
      </div>
      <div class="d-none d-md-inline-block">
        <ul class="nav align-items-center">
          <li class="nav-item">
            <a href="landing-page.php" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="products.php" class="nav-link">Products</a>
          </li>
          <li class="nav-item">
            <a href="about.php" class="nav-link">About</a>
          </li>
        </ul>
      </div>
      <div>
        <ul class="nav align-items-center">
          <li class="nav-item">
            <a href="products.php" class="nav-link pe-auto" data-bs-toggle="modal" data-bs-target="#searchModal">
              <i class="bi bi-search"></i>
            </a>
          </li>
          <li class="nav-item dropdown mx-2 d-none d-md-inline-block">
            <a href="#" class="pe-auto" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-person"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end text-small shadow">
              <li>
                <div class="d-flex align-items-center px-3">
                  <div class="">
                    <img class="rounded-circle" src="https://github.com/mdo.png" width="35" height="35" alt="Image Description" />
                  </div>
                  <div class="flex-grow-1 ms-3">
                    <p class="mb-0 fw-bold"><small>' .  $username  . '</small></p>
                    <small class="card-text text-body">' . $email  . '</small>
                  </div>
                </div>
              </li>
              <li>
                <hr class="dropdown-divider" />
              </li>
              <li>
                <a class="dropdown-item" href="profile.php?user_id='. $user_id.'"><small>Profile</small></a>
              </li>
              <li>
                <a class="dropdown-item" href="#" id="themeToggle"><small>Change Theme</small></a>
              </li>
              <li>
              <a class="dropdown-item" href="order-status.php"><small>Order Status</small> </a>
                <a class="dropdown-item" href="order-details.php"><small>Order Details</small> </a>
              </li>
              <!-- <li>
                <a class="dropdown-item" href="#">
                  <small>Settings</small>
                </a>
              </li> -->
              <li>
                <hr class="dropdown-divider" />
              </li>
              <li>';
              if ($user_id !== null) {
                  echo '<a class="dropdown-item" href="logout.php"><small>Sign out</small></a>';
                } else {
                  echo $user_id;
                  echo '<a class="dropdown-item" href="login-form.php"><small>Log In</small></a>';
              }
              echo '</li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="cart.php" class="nav-link pe-auto">
              <i class="bi bi-cart"></i>
            </a>
          </li>
        </ul>
        <!-- search modal -->
        <div class="modal modal-fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" style="margin-top: 0px">
            <div class="modal-content">
              <div class="modal-body" id="exampleModalLabel">
                <form class="d-flex form-floating align-items-center" role="search" style="height: 3rem">
                  <input class="form-control me-2" type="search" id="search" placeholder="Search" aria-label="Search" />
                  <a href="#">
                    <i class="bi bi-search"></i>
                  </a>
                  <label for="search">Search</label>
                  <button class="btn btn-close" data-bs-dismiss="modal" aria-label="Close" type="submit"></button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </header>';
?>
    <main class="container-fluid p-3">
        <article class="rounded-3">
            <!-- carousel -->
            <section class="container-fluid px-5">
                <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" aria-label="Slide 1"
                            class="active" aria-current="true"></button>
                        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"
                            class=""></button>
                        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"
                            class=""></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <!-- https://picsum.photos/id/250/1850/890 -->
                            <img src="../../asset/img/product/Vinta_backpack_carousel.jpg" alt="" class="img-fluid" />
                        </div>
                        <div class="carousel-item">
                            <!-- https://picsum.photos/id/454/1850/890 -->
                            <img src="../../asset/img/product/F250GT_carousel.jpg" alt="" class="img-fluid" />
                        </div>
                        <div class="carousel-item">
                            <!-- https://picsum.photos/id/531/1850/890 -->
                            <img src="../../asset/img/product/Z750_carousel.jpg" alt="" class="img-fluid" />
                        </div>
                        <!-- <div class="carousel-item">
                <img src="../../asset/img/product/2000.jpeg" alt="" class="img-fluid rounded-4" />
                <div class="container">
                  <div class="carousel-caption text-end">
                    <h1>One more for good measure.</h1>
                    <p>Some representative placeholder content for the third slide of this carousel.</p>
                    <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
                  </div>
                </div>
              </div> -->
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </section>

            <!-- fav item -->
            <section class="container p-5">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <div class="col col-equal-height-e col-lg-3 p-1">
                        <h1>Check Out <br />Latest Product</h1>
                        <div>
                            <a class="btn btn-lg btn-warning" href="products.php">View All</a>
                        </div>
                    </div>
                    <?php
              $items_per_page = 3;
              $sql = "SELECT * FROM products";
              $result = mysqli_query($conn, $sql);
              $rows = mysqli_num_rows($result);

              $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
              $offset = ($current_page - 1) * $items_per_page;
              
                $sql = "SELECT * FROM products WHERE 1 ORDER BY product_id DESC LIMIT $offset, $items_per_page";
                $result = mysqli_query($conn, $sql);
              
              $total_page = ceil($rows/$items_per_page);
              $previous = $current_page - 1;
              $next = $current_page + 1;

              if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                  echo "<div class='col-6 col-md-4 col-xl-3 p-2'>
                          <div class='card'>
                            <div class='badge bg-dark text-white position-absolute' style='top: 0.5rem; right: 0.5rem'>New</div>
                            <figure class='card-img m-0'>
                              <img src='../../asset/img/product/" . $row["product_img"] . "' alt='".$row["product_img"]."' class='figure-img img-fluid rounded-2 rounded-bottom-0' />
                            </figure>
                            <div class='card-body text-center'>
                              <div class='card-title'>
                                <h4 class='card-title fw-semibold'>" . $row["product_name"] . "</h4>
                              </div>
                              <div class='card-text'>
                                <small>
                                  IDR " . number_format($row['product_price'], 2, ',', '.') . "
                                </small>
                              </div>
                            </div>
                            <div class='d-flex border-top'>
                              <small class='w-50 text-center border-end py-2'>
                                <a class='btn btn-sm btn-info text-center' href='products-detail.php?product_id=" . $row["product_id"] . "'><i class='bi bi-eye me-0 me-md-2'></i><span class='d-none d-md-inline-block'>View details</span></a>
                              </small>
                              <small class='w-50 text-center py-2'>
                              <form action='cart-add.php?product_id=" . $row["product_id"] . "'method='POST'>
                                <button class='btn btn-sm btn-success text-center ' type='submit'>                                
                                  <i class='bi bi-cart me-0 me-md-2'></i>
                                  <span class='d-none d-md-inline-block'>Add to cart</span>
                                </button>
                              </form>
                              </small>
                            </div>
                          </div>
                        </div>";
                } 
            } else {
                echo "<tr>";
                echo "<td colspan='7' class='text-center'>" . "0 results" . "</td>";
                echo "<tr>";
            }

            ?>
                </div>
            </section>

            <!-- best seller  -->
            <section class="container p-5">
                <div class="text-center">
                    <h1>Best Seller</h1>
                </div>
                <div class="album py-3">
                    <div class="container">
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                            <!-- product1 -->
                            <?php
                                $items_per_page = 4;
                                $sql = "SELECT * FROM products";
                                $result = mysqli_query($conn, $sql);
                                $rows = mysqli_num_rows($result);

                                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                                $offset = ($current_page - 1) * $items_per_page;

                                $sql = "SELECT * FROM products WHERE 1 ORDER BY sold DESC LIMIT $offset, $items_per_page";
                                $result = mysqli_query($conn, $sql);
                                
                                $total_page = ceil($rows/$items_per_page);
                                $previous = $current_page - 1;
                                $next = $current_page + 1;

                                if (mysqli_num_rows($result) > 0) {
                                    while($row = mysqli_fetch_assoc($result)) {
                                    echo "<div class='col-6 col-md-4 col-xl-3 p-2'>
                                            <div class='card'>
                                                <div class='badge bg-dark text-white position-absolute' style='top: 0.5rem; right: 0.5rem'>Best Seller</div>
                                                <figure class='card-img m-0'>
                                                <img src='../../asset/img/product/" . $row["product_img"] . "' alt='product01' class='figure-img img-fluid rounded-2' />
                                                </figure>
                                                <div class='card-body text-center'>
                                                <div class='card-title'>
                                                    <h4 class='card-title fw-semibold'>" . $row["product_name"] . "</h4>
                                                </div>
                                                <div class='card-text'>
                                                    <small>
                                                    IDR " . number_format($row['product_price'], 2, ',', '.') . "
                                                    </small>
                                                </div>
                                                </div>
                                                <div class='d-flex border-top'>
                                                <small class='w-50 text-center border-end py-2'>
                                                    <a class='btn btn-sm btn-info text-center' href='products-detail.php?product_id=" . $row["product_id"] . "'><i class='bi bi-eye me-0 me-md-2'></i><span class='d-none d-md-inline-block'>View details</span></a>
                                                </small>
                                                <small class='w-50 text-center py-2'>
                                                <form action='cart-add.php?product_id=" . $row["product_id"] . "'method='POST'>
                                                    <button class='btn btn-sm btn-success text-center ' type='submit'>                                
                                                    <i class='bi bi-cart me-0 me-md-2'></i>
                                                    <span class='d-none d-md-inline-block'>Add to cart</span>
                                                    </button>
                                                </form>
                                                </small>
                                                </div>
                                            </div>
                                            </div>";
                                    } 
                                } else {
                                    echo "<tr>";
                                    echo "<td colspan='7' class='text-center'>" . "0 results" . "</td>";
                                    echo "<tr>";
                                }

                                ?>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <a href="products.php" class="btn btn-warning w-50" type="submit">View All</a>
                </div>
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