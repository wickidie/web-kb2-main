<?php
    require 'session-admin.inc.php';

    $category_id = $_GET['category_id'];
    $sql = "SELECT * FROM product_category WHERE category_id = '$category_id'";            
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category update form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
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
            <form class="needs-validation" action="category-update.php" method="post" novalidate>
                <?php                   
                    echo"
                    <h2>
                        <b>Category ID ". $row['category_id'] ." Update</b>
                    </h2>";
                ?>

                <p>This form is used to update category data!</p>

                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="confirm_password" name="category_name"
                        placeholder="Category Name" <?php echo "value='" . $row['category_name'] . "'"?> required>
                </div>
                <?php
                    $category_id= $_GET['category_id'];
                    echo"
                    <div class='text-center btn-group w-100'>
                    <button type='submit' class='btn btn-primary' name='category_id' value='$category_id'>Update</button>
                    <a href='products-category.php' type='submit' class='btn btn-danger'>Close</a>
                    </div>
                    ";
                ?>
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