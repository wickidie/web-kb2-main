<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users form</title>
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
            <form class="needs-validation" action="users-login.php" method="post" novalidate>
                <h2><b>Login</b></h2>
                <p>Please, Register or Login to our site first!</p>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="user_input" name="userID" placeholder="name@example.com"
                        required>
                    <label for="user_input"><strong>User ID</strong></label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password_input" name="password"
                        placeholder="Password" required pattern=".{5,}" title="Password must be at least 5 characters">
                    <label for="password_input"><strong>Password</strong></label>
                    <div class="invalid-feedback">
                        Please enter a valid password (at least 5 characters).
                    </div>
                </div>

                <button type="submit" class="btn btn-primary text-center w-100 mb-2">Log in</button>

                <div class="text-center mb-2">
                    <a href="regist-form.php" class="text-light">Register</a>
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