<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - TOKAKU</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
    body,
    html {
        height: 100%;
    }

    .invalid-feedback {
        font-size: small;
    }
    </style>
</head>

<body data-bs-theme="dark">
    <main class="h-100">
        <div class="d-flex flex-column justify-content-center align-items-center h-100" style="z-index: 999">
            <form class="needs-validation w-25" action="users-add.php" method="post" novalidate>
                <h2><b>Create your Account</b></h2>
                <p>Join us today for exclusive deals and offers!</p>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="emailph">
                        <i class="bi bi-envelope-fill"></i>
                    </span>
                    <input type="text" class="form-control" id="user_input" name="email" placeholder="Email"
                        aria-label="Email" aria-describedby="emailph" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="usernameph">
                        <i class="bi bi-person-circle"></i>
                    </span>
                    <input type="text" class="form-control" id="user_input" name="username" placeholder="Username"
                        aria-label="Username" aria-describedby="usernameph" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="passwordph">
                        <i class="bi bi-key-fill"></i>
                    </span>
                    <input type="password" class="form-control" id="password_input" name="password"
                        aria-label="Password" aria-describedby="passwordph" placeholder="Password" required
                        pattern=".{5,}" title="Password must be at least 5 characters">
                    <div class="invalid-feedback">
                        <p class="m-0">Please enter a valid password (at least 5 characters).</sp>
                    </div>
                </div>

                <div class="input-group mb-2">
                    <span class="input-group-text" id="cpasswordph">
                        <i class="bi bi-patch-check"></i>
                    </span>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                        aria-label="Confirm your password" aria-describedby="cpasswordph"
                        placeholder="Please confirm your password" required>
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
                    <a href="login-form.php" class="text-light"><small>Already have an account? Sign in</small></a>
                </div>
            </form>
        </div>
    </main>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('.needs-validation');
        const userIdInput = document.getElementById('user_input');
        const passwordInput = document.getElementById('password_input');
        const confirmPasswordInput = document.getElementById('confirm_password');

        function checkUserId() {
            const userId = userIdInput.value;

            if (!userId || userId.trim() === '') {
                userIdInput.setCustomValidity('Please enter a valid User ID.');
            } else {
                userIdInput.setCustomValidity('');
            }

            form.classList.add('was-validated');
        }

        function checkPasswordMatch() {
            const password = passwordInput.value;
            const confirmPassword = confirmPasswordInput.value;

            if (password != confirmPassword) {
                confirmPasswordInput.setCustomValidity('Passwords do not match.');
            } else {
                confirmPasswordInput.setCustomValidity('');
            }

            form.classList.add('was-validated');
        }

        // Add event listeners for input event on password fields
        passwordInput.addEventListener('input', checkPasswordMatch);
        confirmPasswordInput.addEventListener('input', checkPasswordMatch);

        form.addEventListener('submit', function(event) {
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