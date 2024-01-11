<?php
    require 'session-users.inc.php';
?>

<!DOCTYPE html>
<html lang="en" data-bs-target="dark">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Product Details</title>
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

<body class="background">
    <?php 
      include_once 'header.inc.php';
      
      $product_id = $_GET['product_id'];
      $sql = "SELECT * FROM products WHERE product_id = $product_id";
      $result = mysqli_query($conn, $sql);
      $rows = mysqli_num_rows($result);


    ?>

    <main class="container p-3">
        <article class="rounded-3">
            <section class="pb-3">

                <?php
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
                                            <span>Rp' . number_format($row['product_price'], 2, ',', '.') . '</span>
                                        </div>
                                        <p class="lead">
                                        ' . $row["product_description"] . '
                                        </p>
                                        <div class="d-flex">
                                            <form action="cart-add.php?product_id=' . $product_id .  '"method="POST">' . 
                                                // <input class="form-control form-control-sm text-center me-3" id="inputQuantity" min="1"
                                                //     type="number" value="1" style="max-width: 5rem" />
                                                '<button type="submit" class="btn btn-outline-secondary flex-shrink-0" type="button" location>
                                                    <i class="bi-cart me-1"></i>
                                                    Add to cart
                                                </button>

                                            </form>
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

    <?php 
    include_once 'offcanvas.inc.php';
    ?>

    <?php 
    include_once 'footer.inc.php';
    ?>
</body>

</html>