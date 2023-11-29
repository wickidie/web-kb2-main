<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php
        include_once 'db-connect.inc.php';
        
        if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {
            if ($_POST['password'] != $_POST['confirm_password']) {
                header('location: regist-form.php');
            } else {
                if ($_POST['username'] != "" || $_POST['password'] != "" || $_POST['email'] != "") {
                    $username = $_POST['username'];
                    $password = md5($_POST['password']);
                    $email = $_POST['email'];
                    
                    $sql = "INSERT INTO users (username, password, email, first_name, last_name, address, phone_number)
                    VALUES ('$username', '$password', '$email', 'unset', 'unset', 'unset', 'unset')";

                    if (mysqli_query($conn, $sql)) {
                        echo "              
                        <script type='text/javascript'>
                        alert('Your account has been created');
                        location='login-form.php';
                        </script>";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                    
                    
                } else {
                    echo "              
                    <script type='text/javascript'>
                    alert('Failed to create record!');
                    location='regist-form.php';
                    </script>";
                }
            }
        } else {
            echo "              
            <script type='text/javascript'>
            alert('Failed to create record!');
            location='regist-form.php';
            </script>";
        }

        mysqli_close($conn) ;
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>