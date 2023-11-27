<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 4 | Users form</title>
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
            <form class="needs-validation" action="../users-add.php" method="post" novalidate>
                <h2><b>Register</b></h2>
                <p>This form is used to add new user!</p>
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

                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                        placeholder="Password" required>
                    <label for="confirm_password"><strong>Confirm Password</strong></label>
                    <div class="valid-feedback">
                        <p>Passwords match</p>
                    </div>
                    <div class="invalid-feedback">
                        Passwords do not match.
                    </div>
                </div>

                <div class="text-center btn-group w-100">
                    <button type="submit" class="btn btn-primary">Register</button>
                    <button class="btn btn-danger" onclick="history.back()">Close</button>
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

            if (password !== confirmPassword) {
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