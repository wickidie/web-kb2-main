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
    <title>Products</title>
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
      include_once 'header.inc.php';
    ?>

    <main class="container p-3 mb-auto">
      <article class="rounded-3">
        <!-- <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-chevron p-3">
            <li class="breadcrumb-item">
              <a class="link-body-emphasis" href="landing_page.html">
                <i class="bi bi-house-door-fill" width="16" height="16"></i>
                <span class="visually-hidden">Home</span>
              </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Products</li>
          </ol>
        </nav> -->
        <section class="container">
        <form method="GET" class="w-100">
            <div class="input-group my-2">
                <input type="text" class="form-control form-control-sm" id="myInput"
                    name="search" placeholder="Search for user" aria-label="Search"
                    aria-describedby="searchph" <?php echo "value = $search_value" ?>>
                <button class="input-group-text btn btn-outline-secondary rounded-end-1"
                    type="submit" id="searchph">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </form>
          <div class="row justify-content-center align-items-center">
            <?php
              $items_per_page = 4;
              $sql = "SELECT * FROM products";
              $result = mysqli_query($conn, $sql);
              $rows = mysqli_num_rows($result);

              $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
              $offset = ($current_page - 1) * $items_per_page;
              
              if (isset($_GET['search'])) {
                  if (!empty($_GET['search'])) {
                      $sql = "SELECT * FROM products WHERE product_name like '%$search_value%' LIMIT $offset, $items_per_page";
                      $result = mysqli_query($conn, $sql);
                      $sql = "SELECT * FROM products WHERE product_name like '%$search_value%'";
                      $result_total = mysqli_query($conn, $sql);
                      $rows = mysqli_num_rows($result_total);
                  }else{
                      $sql = "SELECT * FROM products WHERE 1 LIMIT $offset, $items_per_page";
                      $result = mysqli_query($conn, $sql);
                  }
              }else{
                  $sql = "SELECT * FROM products WHERE 1 LIMIT $offset, $items_per_page";
                  $result = mysqli_query($conn, $sql);
              }
              
              $total_page = ceil($rows/$items_per_page);
              $previous = $current_page - 1;
              $next = $current_page + 1;

              if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                  echo "<div class='col-6 col-md-4 col-xl-3 p-2'>
                          <div class='card'>
                          <!-- <div class='badge bg-dark text-white position-absolute' style='top: 0.5rem; right: 0.5rem'>Sale</div> -->
                            <figure class='card-img m-0'>
                              <img src='../../asset/img/product/" . $row["product_img"] . "' alt='product01' class='figure-img img-fluid rounded-2' />
                            </figure>
                            <div class='card-body text-center'>
                              <div class='card-title'>
                                <h4 class='card-title fw-semibold'>" . $row["product_name"] . "</h4>
                              </div>
                              <div class='card-text'>
                                <small>
                                  Rp" . number_format($row['product_price'], 2, ',', '.') . "
                                </small>
                              </div>
                            </div>
                            <div class='d-flex border-top'>
                              <small class='w-50 text-center border-end py-2'>
                                <a class='btn btn-sm text-center' href='products-detail.php?product_id=" . $row["product_id"] . "'><i class='bi bi-eye me-0 me-md-2'></i><span class='d-none d-md-inline-block'>View details</span></a>
                              </small>
                              <form action='cart-add.php?product_id=" . $row["product_id"] . "'method='POST' class=''>
                                <button type='submit' class=''>
                                  <small class='w-50 text-center py-2'>
                                    Add to cart
                                  </small>
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
                            <a class="page-link" <?php echo "href='?search=$search_value&page=$x'"?>><?php echo $x; ?>
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
        <div class="offcanvas offcanvas-start w-50" tabindex="-1" id="offcanvasExample"
            aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header pt-4">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel">
                    <div class="d-flex ms-2 justify-content-center align-items-center">
                        <img src="../../asset/img/icon/tokaku_logo.svg" alt="TOKAKU" width="32" height="32" />
                        <span class="fs-4 ms-2 align-bottom"> Tokaku </span>
                    </div>
            </div>
    </main>

    <?php 
    include_once 'offcanvas.inc.php';
    ?>

    <?php 
    include_once 'footer.inc.php';
    ?>
</body>

</html>