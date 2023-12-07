<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Snippet - BBBootstrap</title>
    <style>
    @font-face {
        font-family: Arial !important;
        font-display: swap !important;
    }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
    ::-webkit-scrollbar {
        width: 8px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #888;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #555;
    }

    @import url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap");

    :root {
        --header-height: 3rem;
        --nav-width: 68px;
        --first-color: #4723D9;
        --first-color-light: #AFA5D9;
        --white-color: #F7F6FB;
        --body-font: 'Nunito', sans-serif;
        --normal-font-size: 1rem;
        --z-fixed: 100
    }

    *,
    ::before,
    ::after {
        box-sizing: border-box
    }

    body {
        position: relative;
        margin: var(--header-height) 0 0 0;
        padding: 0 1rem;
        font-family: var(--body-font);
        font-size: var(--normal-font-size);
        transition: .5s
    }

    a {
        text-decoration: none
    }

    .header {
        width: 100%;
        height: var(--header-height);
        position: fixed;
        top: 0;
        left: 0;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 1rem;
        background-color: var(--white-color);
        z-index: var(--z-fixed);
        transition: .5s
    }

    .header_toggle {
        color: var(--first-color);
        font-size: 1.5rem;
        cursor: pointer
    }

    .header_img {
        width: 35px;
        height: 35px;
        display: flex;
        justify-content: center;
        border-radius: 50%;
        overflow: hidden
    }

    .header_img img {
        width: 40px
    }

    .l-navbar {
        position: fixed;
        top: 0;
        left: -30%;
        width: var(--nav-width);
        height: 100vh;
        background-color: var(--first-color);
        padding: .5rem 1rem 0 0;
        transition: .5s;
        z-index: var(--z-fixed)
    }

    .nav {
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        overflow: hidden
    }

    .nav_logo,
    .nav_link {
        display: grid;
        grid-template-columns: max-content max-content;
        align-items: center;
        column-gap: 1rem;
        padding: .5rem 0 .5rem 1.5rem
    }

    .nav_logo {
        margin-bottom: 2rem
    }

    .nav_logo-icon {
        font-size: 1.25rem;
        color: var(--white-color)
    }

    .nav_logo-name {
        color: var(--white-color);
        font-weight: 700
    }

    .nav_link {
        position: relative;
        color: var(--first-color-light);
        margin-bottom: 1.5rem;
        transition: .3s
    }

    .nav_link:hover {
        color: var(--white-color)
    }

    .nav_icon {
        font-size: 1.25rem
    }

    .show {
        left: 0
    }

    .body-pd {
        padding-left: calc(var(--nav-width) + 1rem)
    }

    .active {
        color: var(--white-color)
    }

    .active::before {
        content: '';
        position: absolute;
        left: 0;
        width: 2px;
        height: 32px;
        background-color: var(--white-color)
    }

    .height-100 {
        height: 100vh;
    }

    @media screen and (min-width: 768px) {
        body {
            margin: calc(var(--header-height) + 1rem) 0 0 0;
            padding-left: calc(var(--nav-width) + 2rem)
        }

        .header {
            height: calc(var(--header-height) + 1rem);
            padding: 0 2rem 0 calc(var(--nav-width) + 2rem)
        }

        .header_img {
            width: 40px;
            height: 40px
        }

        .header_img img {
            width: 45px
        }

        .l-navbar {
            left: 0;
            padding: 1rem 1rem 0 0
        }

        .show {
            width: calc(var(--nav-width) + 156px)
        }

        .body-pd {
            padding-left: calc(var(--nav-width) + 188px)
        }
    }
    </style>
</head>

<body classname="snippet-body" id="body-pd">

    <header class="header" id="header">
        <div class="header_toggle"> <i class="bx bx-menu" id="header-toggle"></i> </div>
        <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="#" class="nav_logo"> <i class="bx bx-layer nav_logo-icon"></i> <span
                        class="nav_logo-name">BBBootstrap</span> </a>
                <div class="nav_list">
                    <a href="test.php" class="nav_link active">
                        <i class="bx bx-grid-alt nav_icon"></i>
                        <span class="nav_name">Dashboard</span>
                    </a>
                    <a href="#" class="nav_link">
                        <i class="bx bx-user nav_icon"></i>
                        <span class="nav_name">Users</span>
                    </a>
                    <a href="#" class="nav_link">
                        <i class="bx bx-message-square-detail nav_icon"></i>
                        <span class="nav_name">Messages</span>
                    </a>
                    <a href="#" class="nav_link">
                        <i class="bx bx-bookmark nav_icon"></i>
                        <span class="nav_name">Bookmark</span> </a>
                    <a href="#" class="nav_link">
                        <i class="bx bx-folder nav_icon"></i>
                        <span class="nav_name">Files</span> </a>
                    <a href="#" class="nav_link">
                        <i class="bx bx-bar-chart-alt-2 nav_icon"></i>
                        <span class="nav_name">Stats</span> </a>
                </div>
            </div>
            <a href="#" class="nav_link">
                <i class="bx bx-log-out nav_icon"></i>
                <span class="nav_name">SignOut</span>
            </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="height bg-light">
        <div class="col-2">
            <a href="product-form.php" class="btn btn-secondary">Add product</a>
        </div>
        <div class="col-2">
            <form method="GET">
                <div class="input-group my-2">
                    <input type="text" class="form-control form-control-sm" id="myInput" name="search"
                        placeholder="Search for user" aria-label="Search" aria-describedby="searchph">
                    <span class="input-group-text btn btn-secondary rounded-end-1" id="searchph">
                        <i class="bi bi-search"></i>
                    </span>
                </div>
            </form>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-hover table-striped" id="myTable">
            <thead">
                <tr>
                    <th scope="col">Product ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Image</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                                $items_per_page = 10;
                                $search_value = '';
                                $sql = "SELECT product_id, product_name, product_description, product_price, product_img, product_category FROM products";
                                $result = mysqli_query($conn, $sql);
                                $rows = mysqli_num_rows($result);

                                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                                $offset = ($current_page - 1) * $items_per_page;
                                
                                if (isset($_GET['search'])) {
                                    $search_value = $_GET['search'];
                                    if (!empty($_GET['search'])) {
                                        $sql = "SELECT * FROM products where product_name like '%$search_value%' LIMIT $offset, $items_per_page";
                                        $result = mysqli_query($conn, $sql);
                                        $sql = "SELECT * FROM products where product_name like '%$search_value%'";
                                        $result_total = mysqli_query($conn, $sql);
                                        $rows = mysqli_num_rows($result_total);
                                    }else{
                                        // echo "Empty ";
                                        $sql = "SELECT product_id, product_name, product_description, product_price, product_img, product_category FROM products WHERE 1 LIMIT $offset, $items_per_page";
                                        $result = mysqli_query($conn, $sql);
                                    }
                                }else{
                                    // echo "Start ";
                                    $sql = "SELECT product_id, product_name, product_description, product_price, product_img, product_category FROM products WHERE 1 LIMIT $offset, $items_per_page";
                                    $result = mysqli_query($conn, $sql);
                                }
                                
                                $total_page=ceil($rows/$items_per_page);
                                // echo "Search for : $search_value <br>";
                                // echo "Showing : $total_page pages <br>";
                                // echo "With total : $rows result<br>";
                                
                                $previous = $current_page - 1;
                                $next = $current_page + 1;
                                // $sql = "SELECT user_id, username, password, email, first_name, last_name, address, phone_number FROM users LIMIT $offset, $items_per_page";
                                // $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    $c = $offset + 1;
                                    while($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        $c++;
                                        echo "<td>" . $row['product_id'] . "</td>";
                                        // echo "<td>" . "<img src='https://www.w3schools.com/w3css/" . $row['avatar'] . "' class=' rounded' width='30px' height='30px'". "</td>";
                                        echo "<td>" . $row['product_name'] . "</td>";
                                        echo "<td>" . $row['product_description'] . "</td>";
                                        echo "<td>" . $row['product_price'] . "</td>";
                                        echo "<td>" . $row['product_img'] . "</td>";
                                        echo "<td>" . $row['product_category'] . "</td>";
                                        echo "<td> 
                                        <a href='producst-detail.php?product_id=" . $row["product_id"] . "'>
                                        <i class='bi bi-file-earmark-person-fill'></i></a> &nbsp;
                                        <a href='producst-update-form.php?product_id=" . $row["product_id"] . "'>
                                        <i class='bi bi-pencil-square'></i></a> &nbsp;
                                        <a href='products-delete.php?product_id=" . $row['product_id'] . "'>
                                        <i class='bi bi-trash-fill'></i></a></td>";
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
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
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
    </div>
    <!--Container Main end-->
    <script type="text/javascript"
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="#"></script>
    <script type="text/javascript" src="#"></script>
    <script type="text/javascript" src="#"></script>
    <script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function(event) {

        const showNavbar = (toggleId, navId, bodyId, headerId) => {
            const toggle = document.getElementById(toggleId),
                nav = document.getElementById(navId),
                bodypd = document.getElementById(bodyId),
                headerpd = document.getElementById(headerId)

            // Validate that all variables exist
            if (toggle && nav && bodypd && headerpd) {
                toggle.addEventListener('click', () => {
                    // show navbar
                    nav.classList.toggle('show')
                    // change icon
                    toggle.classList.toggle('bx-x')
                    // add padding to body
                    bodypd.classList.toggle('body-pd')
                    // add padding to header
                    headerpd.classList.toggle('body-pd')
                })
            }
        }

        showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')

        /*===== LINK ACTIVE =====*/
        const linkColor = document.querySelectorAll('.nav_link')

        function colorLink() {
            if (linkColor) {
                linkColor.forEach(l => l.classList.remove('active'))
                this.classList.add('active')
            }
        }
        linkColor.forEach(l => l.addEventListener('click', colorLink))

        // Your code to run since DOM is loaded and ready
    });
    </script>
    <script type="text/javascript">
    var myLink = document.querySelectorAll('a[href="#"]');
    myLink.forEach(function(link) {
        link.addEventListener('click', function(e) {
            e.preventDefault();
        });
    });
    </script>

</body>

</html>