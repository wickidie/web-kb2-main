<?php
    require 'session-admin.inc.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Products Sold</title>

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
        <article class="card rounded-3" id="productsSold">
            <section class="card-body">
                <div class="card-header">
                    <div class="row d-flex justify-content-between align-items-baseline">
                        <div class="col">
                        <img src="../../asset/img/icon/tokaku_logo.svg" alt="TOKAKU" width="32" height="32" />
                        <a href="landing-page.php" class="fs-4 ms-2 align-bottom logo"> Tokaku </a>
                        </div>
                        <div class="col-xl-3">
                            <p class="fs-2 fw-bold"><strong>Total Earnings</strong></p>
                        </div>

                    </div>
                </div>

                <div class="table-responsive">
                                        <table class="table table-hover table-striped" id="myTable">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" scope="col">Product Name</th>
                                                    <th class="" scope="col">Product Price</th>
                                                    <th class="" scope="col">Sold</th>
                                                    <th class="" scope="col">SubTotal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                            $items_per_page = 10;
                                            $sql = "SELECT td.product_id, p.product_name, td.product_price, td.quantity, p.sold FROM transaction_details td JOIN products p ON td.product_id = p.product_id";
                                            $result = mysqli_query($conn, $sql);
                                            $rows = mysqli_num_rows($result);

                                            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                                            $offset = ($current_page - 1) * $items_per_page;
                                            
                                            if (isset($_GET['search'])) {
                                                $search_value = $_GET['search'];
                                                if (!empty($_GET['search'])) {
                                                    $sql = "SELECT td.product_id, p.product_name, td.product_price, td.quantity, p.sold FROM transaction_details td JOIN products p ON td.product_id = p.product_id where product_name like '%$search_value%' ORDER BY product_id DESC LIMIT $offset, $items_per_page";
                                                    $result = mysqli_query($conn, $sql);
                                                    $sql = "SELECT td.product_id, p.product_name, td.product_price, td.quantity, p.sold FROM transaction_details td JOIN products p ON td.product_id = p.product_id where product_name like '%$search_value%' ORDER BY product_id DESC";
                                                    $result_total = mysqli_query($conn, $sql);
                                                    $rows = mysqli_num_rows($result_total);
                                                }else{
                                                    $sql = "SELECT td.product_id, p.product_name, td.product_price, td.quantity, p.sold FROM transaction_details td JOIN products p ON td.product_id = p.product_id WHERE 1 ORDER BY product_id DESC LIMIT $offset, $items_per_page";
                                                    $result = mysqli_query($conn, $sql);
                                                }
                                            }else{
                                                $sql = "SELECT td.product_id, p.product_name, td.product_price, td.quantity, p.sold FROM transaction_details td JOIN products p ON td.product_id = p.product_id WHERE 1 ORDER BY product_id DESC LIMIT $offset, $items_per_page";
                                                $result = mysqli_query($conn, $sql);
                                            }
                                            
                                            $total_page = ceil($rows/$items_per_page);
                                            $previous = $current_page - 1;
                                            $next = $current_page + 1;
                                            $total = 0;

                                            if (mysqli_num_rows($result) > 0) {
                                                $c = $offset + 1;
                                                while($row = mysqli_fetch_assoc($result)) {
                                                    echo "<tr>";
                                                    $c++;
                                                    echo "<td class='text-center'>" . $row['product_name'] . "</td>";
                                                    echo "<td>IDR " .  number_format($row['product_price'], 2, ',', '.') . "</td>";
                                                    echo "<td>" . $row['sold'] . "</td>";
                                                    echo "<td>Rp" . number_format($row['product_price'] * $row['quantity'], 2, ',', '.') . "</td>";
                                                    $total += $row['product_price'] * $row['quantity'];
                                                    echo "<tr>";
                                                }
                                                echo "<td colspan='3' class='text-center text-uppercase'><b>Total Earnings<b></td>";
                                                echo "<td>Rp" . number_format($total, 2, ',', '.') . "</td>";
                                            } else {
                                            echo "<tr>";
                                            echo "<td colspan='7' class='text-center'>" . "0 results" . "</td>";
                                            echo "<tr>";
                                            }

                                            mysqli_close($conn);

                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
            </section>
        </article>
        <div class="col-auto text-center mt-3">
            <button class="btn" id="downloadPdf"><a class="btn btn-secondary shadow text-capitalize" ><i
            class="bi bi-file-earmark-pdf text-danger"></i>&nbspExport</a></button>
        </div>
    <script>
        document
        .getElementById("downloadPdf")
        .addEventListener("click", function () {
            const invoiceElement = document.getElementById("productsSold");
            const options = {
            margin: 1,
            filename: "earnings_"  + (date.getMonth()+1) + "_" + date.getFullYear() + '.pdf',
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