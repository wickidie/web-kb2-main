<?php
    session_start();
    include_once 'db-connect.inc.php';
    $userID = $_SESSION['userID'];
    if (isset($userID)&& !empty($userID)) {
    } else {
        echo "              
        <script type='text/javascript'>
        alert('You must login first');
        location='login-form.php';
        </script>";
    }
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Template</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div
                class="d-flex flex-column bg-body-tertiary col-auto col-md-4 col-lg-3 col-xl-2 min-vh-100 justify-content-center p-3">
                <div class="pt-3 mb-auto">
                    <div class="d-flex text-decoration-none justify-content-center align-items-center">
                        <span class="fs-4 d-sm-inline">
                            <svg id="logo-72" width="42" height="34" viewBox="0 0 53 44" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M23.2997 0L52.0461 28.6301V44H38.6311V34.1553L17.7522 13.3607L13.415 13.3607L13.415 44H0L0 0L23.2997 0ZM38.6311 15.2694V0L52.0461 0V15.2694L38.6311 15.2694Z"
                                    class="ccustom" fill="currentColor"></path>
                            </svg>
                        </span>
                    </div>
                    <hr>
                    <ul
                        class="nav nav-pills flex-column justify-content-center align-items-sm-stretch align-items-center">
                        <li class="nav-item py-2 py-sm-0">
                            <a href="#" class="nav-link" aria-current="page">
                                <i class="bi bi-house"></i>
                                <span class="d-none fs-5 ms-2 d-sm-inline">
                                    Home
                                </span>
                            </a>
                        </li>
                        <li class="nav-item py-2 py-sm-0">
                            <a href="#" class="nav-link active">
                                <i class="bi bi-speedometer2"></i>
                                <span class="d-none fs-5 ms-2 d-sm-inline">
                                    Dashboard
                                </span>
                            </a>
                        </li>
                        <li class="nav-item py-2 py-sm-0">
                            <a href="#" class="nav-link">
                                <i class="bi bi-table"></i>
                                <span class="d-none fs-5 ms-2 d-sm-inline">
                                    Orders
                                </span>
                            </a>
                        </li>
                        <li class="nav-item py-2 py-sm-0">
                            <a href="#" class="nav-link">
                                <i class="bi bi-grid"></i>
                                <span class="d-none fs-5 ms-2 d-sm-inline">
                                    Products
                                </span>
                            </a>
                        </li>
                        <li class="nav-item py-2 py-sm-0">
                            <a href="#" class="nav-link">
                                <i class="bi bi-person-circle"></i>
                                <span class="d-none fs-5 ms-2 d-sm-inline">
                                    Customers
                                </span>
                            </a>
                        </li>
                        <!-- <li class="nav-item disabled">
                            <a href="#" class="nav-link">Disabled</a>
                        </li> -->
                    </ul>
                </div>
                <hr>
<<<<<<< HEAD
                <div class="dropup">
=======
                <div class="dropdown">
>>>>>>> b063f2b10433a251a14f9987c2623e7c41b356f3
                    <a href="#"
                        class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                        <strong>mdo</strong>
                    </a>
                    <ul class="dropdown-menu text-small shadow">
                        <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-auto col-md-8 col-lg-9 col-xl-10 min-vh-100 justify-content-center p-3">
                <div class="container">
                    <form>
                        <div class="my-2">
                            <!-- onkeyup="Search()" -->
                            <input type="text" class="form-control form-control-sm" id="myInput"
                                placeholder="Search for user">
                            <label for=""><i class="bi bi-search"></i></label>

                        </div>
                    </form>
                    <table class="table table-hover table-striped" id="myTable">
                        <thead">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Avatar</th>
                                <th scope="col">userID</th>
                                <th scope="col">passcode</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <?php
                                $sql = "SELECT userID, passcode, avatar FROM users";
                                $result = mysqli_query($conn, $sql);

                                $rows = mysqli_num_rows($result);

                                $items_per_page = 5;

                                $total_page=ceil($rows/$items_per_page);

                                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                                $previous = $current_page - 1;
                                $next = $current_page + 1;
                                $offset = ($current_page - 1) * $items_per_page;

                                $sql = "SELECT userID, avatar, passcode FROM users LIMIT $offset, $items_per_page";

                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    $c = $offset + 1;
                                    while($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>" . $c++. "</td>";
                                        echo "<td>" . "<img src='https://www.w3schools.com/w3css/" . $row['avatar'] . "' class=' rounded' width='30px' height='30px'". "</td>";
                                        echo "<td>" . $row['userID'] . "</td>";
                                        echo "<td>" . $row['passcode'] . "</td>";
                                        echo "<td> 
                                        <a href='users-detail.php?userID=" . $row["userID"] . "'>
                                        <i class='bi bi-file-earmark-person-fill'></i></a> &nbsp;
                                        <a href='edit-form.php?userID=" . $row["userID"] . "'>
                                        <i class='bi bi-pencil-square'></i></a> &nbsp;
                                        <a href='users-delete.php?userID=" . $row['userID'] . "'>
                                        <i class='bi bi-trash-fill'></i></a></td>";
                                        echo "<tr>";
                                    }
                                } else {
                                echo "0 results";
                                }

                                mysqli_close($conn);

                                ?>
                    </table>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a class="page-link" <?php if($current_page > 1){ echo "href='?page=$previous'"; } ?>>
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <?php 
                                for($x=1;$x<=$total_page;$x++){
                                    ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?php echo $x ?>"><?php echo $x; ?>
                                </a>
                            </li>
                            <?php
                                }
                            ?>
                            <li class="page-item">
                                <a class="page-link"
                                    <?php if($current_page < $total_page) { echo "href='?page=$next'"; } ?>>
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <a class="btn btn-outline-success" href="users-logout.php">
                        Back to login
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script>
    function Search() {
        var input, filter, table, tr, td, i;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[2];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>