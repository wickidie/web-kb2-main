<!DOCTYPE html>
<html lang="en" data-bs-target="dark">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create account - Tokaku</title>
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
    <style>
    body,
    html {
        height: 100%;
        overflow: hidden;
    }

    .invalid-feedback {
        font-size: small;
    }
    </style>
</head>

<body>
    <main class="h-100">
        <header>
            <nav class="navbar justify-content-between align-items-baseline p-0">
                <a href="#" class="p-3 pe-auto">
                    <div class="form-check form-check-reverse form-switch">
                        <input class="form-check-input" type="checkbox" id="themeToggle" checked />
                    </div>
                </a>
            </nav>
        </header>
        <div class="d-flex flex-column justify-content-center align-items-center h-75">
            <img src="../../asset/img/logo/tokaku_logo.svg" class="mb-3" alt="" />
            <form class="needs-validation w-25" action="users-add.php" method="post" novalidate>
                <h2><b>Create your Account</b></h2>
                <p>Join us today for exclusive deals and offers!</p>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="emailph">
                        <i class="bi bi-envelope-fill"></i>
                    </span>
                    <input type="text" class="form-control" id="user_input" name="email" placeholder="Email"
                        aria-label="Email" aria-describedby="emailph" required />
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="usernameph">
                        <i class="bi bi-person-circle"></i>
                    </span>
                    <input type="text" class="form-control" id="user_input" name="username" placeholder="username"
                        aria-label="username" aria-describedby="usernameph" required />
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="firstnameph">
                        <i class="bi bi-person-circle"></i>
                    </span>
                    <input type="text" class="form-control" id="user_input" name="first_name" placeholder="firstname"
                        aria-label="firstname" aria-describedby="firstnameph" required />
                    <input type="text" class="form-control" id="user_input" name="last_name" placeholder="lastname"
                        aria-label="lastname" aria-describedby="lastnameph" required />
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="addressph">
                        <i class="bi bi-person-circle"></i>
                    </span>
                    <input type="text" class="form-control" id="user_input" name="address" placeholder="address"
                        aria-label="address" aria-describedby="addressph" required />
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="phone_numberph">
                        <i class="bi bi-person-circle"></i>
                    </span>
                    <input type="number" class="form-control" id="user_input" name="phone_number"
                        placeholder="phone_number" aria-label="phone_number" aria-describedby="phone_numberph"
                        required />
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

                <div class="input-group mb-2">
                    <span class="input-group-text" id="cpasswordph">
                        <i class="bi bi-patch-check"></i>
                    </span>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                        aria-label="Confirm your password" aria-describedby="cpasswordph"
                        placeholder="Please confirm your password" required />
                    <div class="valid-feedback">
                        <p class="m-0">Passwords match.</p>
                    </div>
                    <div class="invalid-feedback">
                        <p class="m-0">Passwords do not match.</p>
                    </div>
                </div>
                <div class="text-center btn-group w-100 my-3">
                    <button type="submit" class="btn btn-primary">Create account</button>
                    <button class="btn btn-danger" onclick="history.back()">Close</button>
                </div>
                <div class="text-center">
                    <a href="login-form.php" class=""><small>Already have an account? Sign in</small></a>
                </div>
            </form>
        </div>
    </main>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const form = document.querySelector(".needs-validation");
        const userIdInput = document.getElementById("user_input");
        const passwordInput = document.getElementById("password_input");
        const confirmPasswordInput = document.getElementById("confirm_password");

        function checkUserId() {
            const userId = userIdInput.value;

            if (!userId || userId.trim() === "") {
                userIdInput.setCustomValidity("Please enter a valid User ID.");
            } else {
                userIdInput.setCustomValidity("");
            }

            form.classList.add("was-validated");
        }

        function checkPasswordMatch() {
            const password = passwordInput.value;
            const confirmPassword = confirmPasswordInput.value;

            if (password != confirmPassword) {
                confirmPasswordInput.setCustomValidity("Passwords do not match.");
            } else {
                confirmPasswordInput.setCustomValidity("");
            }

            form.classList.add("was-validated");
        }

        // Add event listeners for input event on password fields
        passwordInput.addEventListener("input", checkPasswordMatch);
        confirmPasswordInput.addEventListener("input", checkPasswordMatch);

        form.addEventListener("submit", function(event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }

            checkUserId();
            checkPasswordMatch(); // Check password match before form submission
        });
    });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>