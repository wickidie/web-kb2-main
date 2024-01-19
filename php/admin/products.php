<?php
    require 'session-admin.inc.php';

    $search_value = $_GET['search'] ?? null;
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <link rel="stylesheet" href="../../css/admin/style.css" />

    <!-- Javascript -->
    <script defer type="text/javascript" src="../../js/theme.js"></script>
    <script defer type="text/javascript" src="../../js/page.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap bg-secondary-subtle">
            <?php
                include_once 'sidebar-admin.inc.php';
            ?>
            <main class="col justify-content-center">
                <?php
                    include_once 'header-admin.inc.php';
                ?>
                <article class="p-3">
                    <section class="d-flex justify-content-center align-items-center">
                        <div class="container-fluid">
                            <div class="card shadow mt-2">
                                <div class="card-header py-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="">
                                            <a href="products-form.php" class="btn btn-sm btn-outline-secondary">
                                                <i class="bi bi-plus-lg icon"></i>
                                                <span class="d-none d-md-inline-block">Add product</span>
                                            </a>
                                        </div>
                                        <form method="GET">
                                            <div class="input-group my-2">
                                                <input type="text" class="form-control form-control-sm" id="myInput"
                                                    name="search" placeholder="Search" aria-label="Search"
                                                    aria-describedby="searchph" <?php echo "value = $search_value" ?>>
                                                <button class="input-group-text btn btn-outline-secondary rounded-end-1"
                                                    type="submit" id="searchph">
                                                    <i class="bi bi-search"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-striped" id="myTable">
                                            <thead>
                                                <tr>
                                                    <th style="width: 2rem;" scope="col">#</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Image</th>
                                                    <th scope="col">Description</th>
                                                    <th style="width: 15%" scope="col">Price</th>
                                                    <th scope="col">Category</th>
                                                    <th scope="col">Sold</th>
                                                    <th style="width: 10%;" scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                            $items_per_page = 10;
                                            $sql = "SELECT product_id, product_name, product_description, product_price, product_img, c.category_name FROM products p JOIN product_category c ON p.category_id = c.category_id";
                                            $result = mysqli_query($conn, $sql);
                                            $rows = mysqli_num_rows($result);

                                            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                                            $offset = ($current_page - 1) * $items_per_page;
                                            
                                            if (isset($_GET['search'])) {
                                                $search_value = $_GET['search'];
                                                if (!empty($_GET['search'])) {
                                                    $sql = "SELECT product_id, product_name, product_description, product_price, product_img, sold, c.category_name FROM products p JOIN product_category c ON p.category_id = c.category_id where product_name lORDER BY product_id ASC ike '%$search_value%' LIMIT $offset, $items_per_page";
                                                    $result = mysqli_query($conn, $sql);
                                                    $sql = "SELECT product_id, product_name, product_description, product_price, product_img, sold, c.category_name FROM products p JOIN product_category c ON p.category_id = c.category_id where product_name ORDER BY product_id ASC like '%$search_value%'";
                                                    $result_total = mysqli_query($conn, $sql);
                                                    $rows = mysqli_num_rows($result_total);
                                                }else{
                                                    $sql = "SELECT product_id, product_name, product_description, product_price, product_img, sold, c.category_name FROM products p JOIN product_category c ON p.category_id = c.category_id WHERE 1 ORDER BY product_id ASC LIMIT $offset, $items_per_page";
                                                    $result = mysqli_query($conn, $sql);
                                                }
                                            }else{
                                                $sql = "SELECT product_id, product_name, product_description, product_price, product_img, sold, c.category_name FROM products p JOIN product_category c ON p.category_id = c.category_id WHERE 1 ORDER BY product_id ASC LIMIT $offset, $items_per_page";
                                                $result = mysqli_query($conn, $sql);
                                            }
                                            
                                            $total_page = ceil($rows/$items_per_page);
                                            $previous = $current_page - 1;
                                            $next = $current_page + 1;

                                            if (mysqli_num_rows($result) > 0) {
                                                $c = $offset + 1;
                                                while($row = mysqli_fetch_assoc($result)) {
                                                    echo "<tr>";
                                                    $c++;
                                                    echo "<td style='width: 2rem;'>" . $row['product_id'] . "</td>";
                                                    echo "<td>" . $row['product_name'] . "</td>";
                                                    echo "<td>" . "<img src='../../asset/img/product/" . $row['product_img'] . "' class=' rounded' width='80px' height='80px'". "</td>";
                                                    echo "<td>" . $row['product_description'] . "</td>";
                                                    echo "<td>IDR " . number_format($row['product_price'], 2, ',', '.') . "</td>";
                                                    echo "<td>" . $row['category_name'] . "</td>";
                                                    echo "<td>" . $row['sold'] . "</td>";
                                                    echo "<td> 
                                                    <a href='products-detail.php?product_id=" . $row["product_id"] . "'>
                                                    <i class='bi bi-file-earmark-person-fill'></i></a> &nbsp;
                                                    <a href='products-update-form.php?product_id=" . $row["product_id"] . "'>
                                                    <i class='bi bi-pencil-square'></i></a> &nbsp;
                                                    <a href='products-delete.php?product_id=" . $row['product_id'] . "'>
                                                    <i class='bi bi-trash-fill'></i></a>
                                                    <!--<form action='cart-add.php?product_id=" . $row["product_id"] . "'method='POST'>
                                                        <input type='number' class='form-control-sm' id='quantity' name='quantity' placeholder='Quantity' aria-label='Search' aria-describedby='searchph'>
                                                        <button type='submit'> 
                                                            <i class='bi bi-cart'></i>
                                                        </button>
                                                    </form>--></td>";
                                                    echo "<tr>";
                                                }
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
                                                <a class="page-link"
                                                    <?php echo "href='?search=$search_value&page=$x'"?>><?php echo $x; ?>
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
                                </div>
                            </div>
                        </div>
                    </section>
                </article>
            </main>
        </div>
        <?php
            include_once 'android-sidebar-admin.inc.php';
        ?>
    </div>
</body>

</html>