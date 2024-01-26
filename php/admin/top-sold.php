<?php
    require 'session-admin.inc.php';

    $month = $_GET['month'];
    $status = $_GET['status'];

    if (isset($month) && isset($month)) {
        if ($month == '' && $status == '') {
            $sql = "SELECT p.product_name, c.category_name, p.product_price, td.quantity FROM transaction_details td
            JOIN products p ON td.product_id = p.product_id
            JOIN transactions t ON td.transaction_id = t.transaction_id
            JOIN product_category c ON p.category_id = c.category_id
            ORDER BY td.quantity DESC";
        }else{
            if ($status == '') {
                $sql = "SELECT p.product_name, c.category_name, p.product_price, td.quantity FROM transaction_details td
                JOIN products p ON td.product_id = p.product_id
                JOIN transactions t ON td.transaction_id = t.transaction_id
                JOIN product_category c ON p.category_id = c.category_id
                WHERE MONTH(t.transaction_date) = $month
                ORDER BY td.quantity DESC
                LIMIT 3";
            }else if ($month == '') {
                $sql = "SELECT p.product_name, c.category_name, p.product_price, td.quantity FROM transaction_details td
                JOIN products p ON td.product_id = p.product_id
                JOIN transactions t ON td.transaction_id = t.transaction_id
                JOIN product_category c ON p.category_id = c.category_id
                WHERE status = '$status'
                ORDER BY td.quantity DESC
                LIMIT 3";
            }else{
                $sql = "SELECT p.product_name, c.category_name, p.product_price, td.quantity FROM transaction_details td
                JOIN products p ON td.product_id = p.product_id
                JOIN transactions t ON td.transaction_id = t.transaction_id
                JOIN product_category c ON p.category_id = c.category_id
                WHERE MONTH(t.transaction_date) = $month 
                AND status = '$status'
                ORDER BY td.quantity DESC
                LIMIT 3";
            }
        }
    }else{
        $sql = "SELECT p.product_name, c.category_name, p.product_price, td.quantity FROM transaction_details td
        JOIN products p ON td.product_id = p.product_id
        JOIN transactions t ON td.transaction_id = t.transaction_id
        JOIN product_category c ON p.category_id = c.category_id
        ORDER BY td.quantity DESC";
    }
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_num_rows($result);

    if ($month == '') {
        $month = "All";
    }
    if ($status == '') {
        $status = "All";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Top Sold</title>

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
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous">
        </script>
    <script defer src="../../js/chart/area.js"></script>
    <script defer src="../../js/chart/bar.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <!-- html2pdf -->
    <script src="print.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>


    <style>
        @media print{
            .buttonPrint {
                display: none;
            }
        }
    </style>
</head>
<body>

<main class="container p-3" >
        <article class="card rounded-3" id="topSold">
            <section class="card-body">
                <div class="card-header">
                    <div class="row d-flex justify-content-between align-items-baseline">
                        <div class="col">
                        <img src="../../asset/img/icon/tokaku_logo.svg" alt="TOKAKU" width="32" height="32" />
                        <a href="landing-page.php" class="fs-4 ms-2 align-bottom logo"> Tokaku </a>
                        </div>
                        <div class="col-xl-3">
                            <p class="fs-3 fw-bold"><strong>Monthly Best Seller</strong></p>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <form action="top-sold.php" method="GET">
                    <label for="month">Month</label>
                        <select id="month" name="month">
                            <option value="<?php if ($month == 'All') {
                                echo "";
                            }else{
                                echo $month;
                            } 
                            ?>"><?php echo $month; ?></option>
                            <option value="">All</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                    </select> 
                    <!-- <label for="status">Status</label>
                        <select id="status" name="status">
                        <option value='<?php if ($status == 'All') {
                                echo "";
                            }else{
                                echo $status;
                            } 
                            ?>'><?php echo $status; ?></option>
                        <option value=''>All</option>
                        <option value='Valid'>Valid</option>
                        <option value='Invalid'>Invalid</option>
                        <option value='Pending'>Pending</option>
                        <option value='Delivering'>Delivering</option>
                        <option value='Received'>Received</option>
                    </select>  -->
                    <!-- <label for="year">Year</label>
                        <select id="year" name="year">
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                    </select>  -->
                    <button type="submit">Query</button>
                                        <table class="table table-hover table-striped" id="myTable">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Product Name</th>
                                                    <th scope="col">Product Category</th>
                                                    <th scope="col">Product Price</th>
                                                    <th scope="col">Sold</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
   

                                            if (mysqli_num_rows($result) > 0) {
                                                while($row = mysqli_fetch_assoc($result)) {
                                                    echo "<tr>";
                                                    echo "<td>" . $row['product_name'] . "</td>";
                                                    echo "<td>" . $row['category_name'] . "</td>";
                                                    echo "<td>IDR " . number_format($row['product_price'], 2, ',', '.') . "</td>";
                                                    echo "<td>" . $row['quantity'] . "</td>";
                                                    echo "<input type='hidden' class='quantity' value='" . $row['quantity'] . "'>";
                                                    echo "<tr>";
                                                }
                                                echo "<td colspan='3' class='total text-center text-uppercase'><b>Total Sold By Month<b></td>";
                                                echo "<td class='total' id='total'></td>";
                                            } else {
                                            echo "<tr>";
                                            echo "<td colspan='7' class='text-center'>" . "0 results" . "</td>";
                                            echo "<tr>";
                                            }

                                            mysqli_close($conn);

                                            ?>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
            </section>
        </article>
        <div class="col-auto text-center mt-3">
            <button class="btn" id="downloadPdf"><a class="btn btn-secondary shadow text-capitalize" ><i
            class="bi bi-file-earmark-pdf text-danger"></i>&nbspExport</a></button>
        </div>
    <script>
        var quantity = document.getElementsByClassName('quantity');
        var total = document.getElementById('total');
        var sum = 0;

        console.log(quantity);
        console.log(total);

        sum = 0;
        for (i = 0; i < quantity.length; i++) {
            var temp = Number(quantity[i].value)
            sum = sum + temp;
            console.log(sum)
        }
        total.innerText = sum;
        console.log(total);

        document
        .getElementById("downloadPdf")
        .addEventListener("click", function () {
            const invoiceElement = document.getElementById("topSold");
            const options = {
            margin: 1,
            filename: "best_seller_"  + (date.getMonth()+1) + "_" + date.getFullYear() + '.pdf',
            image: { type: "jpeg", quality: 0.98 },
            html2canvas: { scale: 2 },
            jsPDF: { unit: "in", format: "letter", orientation: "portrait" },
            };

            // Then call html2pdf with the element and options
            html2pdf().from(invoiceElement).set(options).save();
        });
    </script>
    </body>
</html>