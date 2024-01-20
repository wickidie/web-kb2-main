<?php
    require 'session-users.inc.php';
?>

<!DOCTYPE html>
<html lang="en" data-bs-target="dark">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Invoice</title>
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
            <section class="container">
                <div>
                    <p class="fs-2 fw-bold">Invoice<small class="fw-light"></small></p>
                </div>


                <form action="" method="post">
                    <div class="card shadow-lg border-0">

                        <div class="card-header bg-transparent">
                            <ul class="row justify-content-between align-items-center list-unstyled m-0">
                                <!-- <li class="col text-center"><span>product_id</span></li> -->
                                <li class="col text-center"><span>Product</span></li>
                                <li class="col text-center"><span></span></li>
                                <li class="col text-center"><span></span></li>
                                <!-- <li class="col d-none d-md-inline-block"><span class="">Product Name</span></li> -->
                                <li class="col d-none d-sm-inline-block text-center text-md-start"><span>Quantity</span></li>
                                <li class="col text-center"><span></span></li>
                                <li class="col text-center text-md-start"><span>SubTotal</span></li>
                                </li>
                            </ul>
                        </div>

                        <?php
                            $transaction_id = $_POST['transaction_id'];

                $sql = "SELECT * FROM transaction_details td
                JOIN products p ON td.product_id = p.product_id
                WHERE transaction_id = $transaction_id";
                $result = mysqli_query($conn, $sql);
  
                $c = 1;
                if (mysqli_num_rows($result) > 0) {
                  $c += 1;
                  echo "<input type='hidden' class='form-control-sm mt-3' name='quantity_count' placeholder='Quantity' aria-label='Search' aria-describedby='searchph' value='" . $c . "' min='1' />";
                  while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='card-body'>";
                    echo "<ul class='row justify-content-between list-unstyled m-0'>";
                    echo "<li class='col-auto order-1 text-center p-0 me-3'><p>" . $row['transaction_detail_id'] . "</p></li>";
                    echo "<li class='col-auto order-1 text-center p-0 me-3'><img src='../../asset/img/product/" . $row['product_img'] . "' alt='" . $row['product_img'] . "' class='img-fluid rounded-start' height='100px' width='100px' /></li>";
                    echo "<li class='col order-2 text-start text-wrap p-0'>";
                    echo "<p class='mt-3'>" . $row['product_name'] . "</p>";
                    echo "<small>Rp " . number_format($row['product_price'], 2, ',', '.') . "<input class='price' id='price' type=hidden value='" . $row['product_price'] . "'></small>";
                    echo "</li>";
                    echo "<li class='col order-4 order-sm-3 text-start text-md-end text-xl-center'>";
                    echo  "<input type='hidden' class='quantity' id='quantity' name='quantity[]' onchange='updateSubTotal()' value='" . $row['quantity'] . "'>" . $row['quantity'] . "</input>";
                    echo  "</li>";
                    echo  "<li class='col order-3 order-sm-4 text-center'>";
                    echo    "<p class='col mt-3'><span class='sub_total' id='sub_total'>Rp" . number_format($row['product_price'], 2, ',', '.') . "</span></p>";
                    echo  "</li>";
                    echo "</ul>";
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
                            <button type="submit" class="btn btn-primary w-100" onclick="window.print()"> Print Invoice</button>
                            <?php
                                $transaction_id = $_POST['transaction_id'];
                                $sql = "SELECT * FROM transactions t
                                JOIN users u ON t.user_id = u.user_id
                                WHERE transaction_id = $transaction_id";
                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "Transaction ID : " . $row['transaction_id'] . "<br>";
                                        echo "Transaction Date : " . $row['transaction_date'] . "<br>";
                                        echo "Username : " . $row['username'] . "<br>";
                                        echo "User ID : " . $row['user_id'] . "<br>";
                                    }
                                  }
                            ?>
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
        }
        total.innerText = currency.format(sum);
    }

    updateSubTotal();
    </script>
</body>

</html>