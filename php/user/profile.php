<?php
    require 'session-users.inc.php';
    $user_id = $_GET['user_id'];
    $sql = "SELECT username, password, email, first_name, last_name, address, phone_number FROM users WHERE user_id = $user_id ";
    $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    $username = $row['username'];
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $email = $row['email'];
    $address = $row['address'];
    $phonenum = $row['phone_number'];
    $password = $row['password'];
?>

<!DOCTYPE html>
<html lang="en" data-bs-target="dark">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profile</title>
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
    <main class="container p-3">
        <article class="d-flex flex-column justify-content-center align-items-center">
            <section class="container-fluid flex-grow-1 ">
                <div>
                    <p class="fs-2 fw-bold">Profile <small class="fw-light"></small></p>
                </div>
                <div class="row column-gap-2 justify-content-center">
                    <div class="col card shadow p-0">
                        <div class="justify-content-center align-items-center">
                            <div class="card-header text-center">
                                <?php
                            echo'<p class="my-2 fw-bold">' . $username . '</p>';
                            ?>
                            </div>
                            <div class="card-body">
                                <div class="text-center"><img class="rounded-circle img-fluid mb-3"
                                        src="https://github.com/mdo.png" width="150" height="150"
                                        alt="Image Description" />
                                </div>
                                <?php
                            echo'
                            <p class="mb-2 text-wrap"><i class="bi bi-person-lines-fill"></i>&nbsp' . $first_name . ' ' . $last_name . '</p>
                            <p class="mb-2"><i class="bi bi-envelope"></i>&nbsp' . $email . '</p>
                            <p class="mb-2"><i class="bi bi-geo-alt"></i>&nbsp' . $address . '</p>
                            <p class="mb-2"><i class="bi bi-telephone"></i>&nbsp' . $phonenum . '</p>';
                            ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-9 card shadow p-0">
                        <div>
                            <div class="card-header">
                                <p class="my-2">Account details</p>
                            </div>
                            <div class="card-body d-flex">
                                <?php
                            echo'
                            <form class="needs-validation w-100 justify-content-center" action="users-update.php" method="post" enctype="multipart/form-data" novalidate>
                            <div class="mb-3 row">
                                <div class="col-sm-2 col-form-label">
                                    <label class="labels">Fullname</label>
                                </div>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="firstname" name="first_name"
                                        placeholder="Firstname" value="' . $first_name . '" aria-label="firstname"
                                        aria-describedby="firstnameph" required />
                                </div>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="lastname" name="last_name"
                                    placeholder="Lastname" value="' . $last_name . '" aria-label="lastname" aria-describedby="lastnameph"
                                        required />
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="username_input" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="username_input" name="username"
                                    placeholder="Username" value="' . $username . '" aria-label="username" aria-describedby="usernameph"
                                        required />
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="email" name="email"
                                    placeholder="Email" value="' . $email . '" aria-label="Email" aria-describedby="emailph"
                                        required />
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="address" class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="address" name="address"
                                    placeholder="Address" value="' . $address . '" aria-label="address" aria-describedby="addressph"
                                        required />
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="phonenum" class="col-sm-2 col-form-label">Phone Number</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="phonenum" name="phone_number"
                                    placeholder="Phone number" value="' . $phonenum . '" aria-label="phone_number"
                                        aria-describedby="phone_numberph" required />
                                </div>
                            </div>

                            <!--<div class="mb-3 row">
                                <label for="password_input" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="password_input" name="password"
                                        aria-label="Password" aria-describedby="passwordph" placeholder="Password"
                                        required pattern=".{5,}" title="Password must be at least 5 characters" />
                                    <div class="invalid-feedback">
                                        <p class="m-0">Please enter a valid password (at least 5 characters).</p>
                                    </div>
                                </div>
                            </div>-->

                            <!--<div class="mb-3 row">
                                <div class="col-sm-2 col-form-label">
                                    <label class="labels">Confirm password</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="confirm_password"
                                        name="confirm_password" aria-label="Confirm your password"
                                        aria-describedby="cpasswordph" placeholder="Please confirm your password"
                                        required />
                                    <div class="valid-feedback">
                                        <p class="m-0">Passwords match.</p>
                                    </div>
                                    <div class="invalid-feedback">
                                        <p class="m-0">Passwords do not match.</p>
                                    </div>
                                </div>
                            </div>-->
                            <div class="d-flex justify-content-end gap-3">
                                <a class="btn btn-danger" href="landing-page.php">Close</a>
                                <button type="submit" class="btn btn-primary" name="user_id" value="'. $user_id .'">
                                Save profile</button>
                            </div>
                            </form>';
                            ?>
                            </div>
                        </div>
                    </div>
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