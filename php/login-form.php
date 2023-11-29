<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Ecommerce</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
    body,
    html {
        height: 100%;
    }
    </style>
</head>

<body data-bs-theme="dark">
    <main class="h-100">
        <div class="d-flex flex-column justify-content-center align-items-center h-100" style="z-index: 999">
            <form class="needs-validation w-25" action="users-login.php" method="post" novalidate>
                <h2><b>Login</b></h2>
                <p>Login for instant access to exclusive perks!</p>
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

                <button type="submit" class="btn btn-primary text-center w-100 mb-2">Log in</button>

                <div class="text-center mb-2">
                    <a href="regist-form.php" class="text-light"><small>Create account</small></a>
                </div>
            </form>
        </div>
    </main>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('.needs-validation');
        const userIdInput = document.getElementById('user_input');
        const passwordInput = document.getElementById('password_input');

        function checkUserId() {
            const userId = userIdInput.value;

            if (!userId || userId.trim() === '') {
                userIdInput.setCustomValidity('Please enter a valid User ID.');
            } else {
                userIdInput.setCustomValidity('');
            }

            form.classList.add('was-validated');
        }

        function checkPassword() {
            const password = passwordInput.value;

            if (password.length < 5) {
                passwordInput.setCustomValidity('Password must be at least 5     characters.');
            } else {
                passwordInput.setCustomValidity('');
            }

            form.classList.add('was-validated');
        }

        // Add event listeners for input event on user ID and password fields
        userIdInput.addEventListener('input', checkUserId);
        passwordInput.addEventListener('input', checkPassword);

        form.addEventListener('submit', function(event) {
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