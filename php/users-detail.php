<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 7</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <!-- passing the value -->
    <div class="container p-4 mx-5" style="max-width: 720px">
        <p><a class="link" onclick="history.back()"><b>Chara</b></a> / <b>Chara Detail</b></p>
        <?php
            session_start();
            include_once 'db-connect.inc.php';
            $user_id = $_SESSION['user_id'];
            if (isset($user_id) && !empty($user_id)) {
            } else {
                echo "              
                <script type='text/javascript'>
                alert('You must login first');
                location='login-form.php';
                </script>";
            }
            $user_id= $_GET['user_id'];

            // $sql = "DELETE FROM users WHERE userID = '$user'";
            $sql = "SELECT * FROM users WHERE user_id = '$user_id'";            
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            
            echo "<div class='container p-4 mx-5' style='max-width: 960px'>";
            echo "<div class='card' style='width: 18rem;'>";
            // echo "<img src='https://www.w3schools.com/w3css/" . $row['avatar'] . "' class='rounded-5 card-img-top'";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>" . $row['username'] . "</h5>";
            echo "<p class='card-text'>" . $row['password'] . "</p>";
            echo "<p class='card-text'>" . $row['email'] . "</p>";
            echo "<p class='card-text'>" . $row['first_name'] . " " . $row['last_name']. "</p>";
            echo "<p class='card-text'>" . $row['address'] . "</p>";
            echo "<p class='card-text'>" . $row['phone_number'] . "</p>";
            echo "</div>";
            echo "</div>";
            ?>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>