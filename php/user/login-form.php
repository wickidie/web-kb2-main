<!DOCTYPE html>
<html lang="en" data-bs-target="dark">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Tokaku</title>
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
    <style>
    body,
    html {
        height: 100%;
        overflow: hidden;
    }
    </style>
</head>

<body>
    <main class="h-100 background">
        <header>
            <nav class="navbar justify-content-between align-items-baseline p-0">
                <div aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-chevron p-3">
                        <li class="breadcrumb-item">
                            <a class="link-body-emphasis" href="landing-page.php">
                                <i class="bi bi-person-fill" width="16" height="16"></i>
                                <span class="visually-hidden">Home</span>
                            </a>
                        </li>
                        <!-- <li class="breadcrumb-item active">
                                      <a class="link-body-emphasis fw-semibold text-decoration-none" href="#">Cart</a>
                                    </li> -->
                        <li class="breadcrumb-item active" aria-current="page">Login</li>
                    </ol>
                </div>

                <a href="#" class="p-3 pe-auto">
                    <i class="bi bi-moon-stars" id="themeToggle"></i>
                </a>
            </nav>
        </header>
        <div class="d-flex flex-column justify-content-center align-items-center h-75">
            <img src="../../asset/img/icon/tokaku_logo.svg" class="mb-3" alt="" />
            <h2><b>Login User</b></h2>
            <form class="needs-validation w-25" action="users-login.php" method="post" novalidate>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="usernameph">
                        <i class="bi bi-person-circle"></i>
                    </span>
                    <input type="text" class="form-control" id="user_input" name="username" placeholder="Username"
                        aria-label="Username" aria-describedby="usernameph" required />
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="passwordph">
                        <i class="bi bi-key-fill"></i>
                    </span>
                    <input type="password" class="form-control" id="password_input" name="password"
                        aria-label="Password" aria-describedby="passwordph" placeholder="Password" required
                        pattern=".{5,}" title="Password must be at least 5 characters" />
                    <div class="invalid-feedback">
                        <p class="m-0">Please enter a valid password (at least 5 characters).</p>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary text-center w-100 mb-2">Log in</button>

                <div class="text-center mb-2">
                    <a href="regist-form.php" class=""><small>Create new account</small></a>
                </div>
            </form>
        </div>
    </main>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const form = document.querySelector(".needs-validation");
        const userIdInput = document.getElementById("user_input");
        const passwordInput = document.getElementById("password_input");

        function checkUserId() {
            const userId = userIdInput.value;

            if (!userId || userId.trim() === "") {
                userIdInput.setCustomValidity("Please enter a valid User ID.");
            } else {
                userIdInput.setCustomValidity("");
            }

            form.classList.add("was-validated");
        }

        function checkPassword() {
            const password = passwordInput.value;

            if (password.length < 5) {
                passwordInput.setCustomValidity("Password must be at least 5     characters.");
            } else {
                passwordInput.setCustomValidity("");
            }

            form.classList.add("was-validated");
        }

        // Add event listeners for input event on user ID and password fields
        userIdInput.addEventListener("input", checkUserId);
        passwordInput.addEventListener("input", checkPassword);

        form.addEventListener("submit", function(event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }

            checkUserId(); // Check User ID before form submission
            checkPassword(); // Check password before form submission
        });
    });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>