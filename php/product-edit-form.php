<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 8 | Edit form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="javascript.js"></script>
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
            <form class="needs-validation" action="users-update.php" method="post" novalidate>
                <h2><b>User Data Update</b></h2>
                <p>This form is used to update user data!</p>
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
                <?php
                    $username= $_GET['username'];
                    echo"
                    <div class='text-center btn-group w-100'>
                    <button type='submit' class='btn btn-primary' name='pastUser' value='$username'>Update</button>
                    <button type='submit' class='btn btn-danger' onclick='history.back()'>Close</button>
                    </div>
                    ";
                ?>
            </form>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>