<!DOCTYPE html>
<html lang="en" data-bs-target="dark">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cart</title>
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
    <link rel="stylesheet" href="../../css/user/product.css" />
    <!-- Javascript -->
    <script defer type="text/javascript" src="../../js/theme.js"></script>
    <script defer type="text/javascript" src="../../js/page.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</head>

<body class="background">
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
                    <li class="breadcrumb-item active">
                        <a class="link-body-emphasis fw-semibold text-decoration-none" href="#">Product</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Product name</li>
                </ol>
            </nav>
            <section class="pb-3">

            <?php
                $product_id = $_GET['product_id'];

                $sql = "SELECT * FROM products WHERE product_id = $product_id";
                $result = mysqli_query($conn, $sql);
                $rows = mysqli_num_rows($result);
                
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="container px-4 px-lg-5 my-5">
                                <div class="row gx-4 gx-lg-5 align-items-center">
                                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0"
                                            src="../../asset/img/product/' . $row["product_img"] . '" alt="..." /></div>
                                    <div class="col-md-6">
                                        <h1 class="display-5 fw-bolder">' . $row["product_name"] . '</h1>
                                        <div class="fs-5 mb-5">
                                            <span>$' . $row["product_price"] . '</span>
                                        </div>
                                        <p class="lead">
                                        ' . $row["product_description"] . '
                                        </p>
                                        <div class="d-flex">
                                            <input class="form-control form-control-sm text-center me-3" id="inputQuantity"
                                                type="number" value="1" style="max-width: 5rem" />
                                            <button class="btn btn-outline-secondary flex-shrink-0" type="button">
                                                <i class="bi-cart me-1"></i>
                                                Add to cart
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                    }
                } else {
                    echo "<tr>";
                    echo "<td colspan='7' class='text-center'>" . "0 results" . "</td>";
                    echo "<tr>";
                }
            ?>
                
            </section>
            </article>
    </main>

    <!-- offcanvas menu -->
    <div class="offcanvas offcanvas-start w-50" tabindex="-1" id="offcanvasExample"
        aria-labelledby="offcanvasExampleLabel">
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
                </ul>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <div class="row align-items-center g-0 border-top py-2">
                <!-- Desc -->
                <div class="col-md-6 col-12 text-center text-md-start">
                    <span>©
                        <span id="copyright">
                            <script>
                            document.getElementById("copyright").appendChild(document.createTextNode(new Date()
                                .getFullYear()));
                            </script>
                        </span>Tokaku. All Rights Reserved.</span>
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
</body>

</html>