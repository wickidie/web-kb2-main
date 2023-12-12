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

    $sql = "SELECT category_name FROM product_category";
    $result = mysqli_query($conn, $sql);
    // $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
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
            <form class="needs-validation" action="products-add.php" method="post" enctype="multipart/form-data" novalidate>
                <h2 class="mb-3"><b>Add Product</b></h2>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control form-control-sm" id="name" name="name"
                        placeholder="Shirt, t-shirt, etc." aria-label="Name" aria-describedby="nameph" required>
                </div>
                <div class="row">
                    <div class="col">
                        <div>
                            <label for="name" class="col form-label">Category</label>
                        </div>
                            <?php
                                echo "<select class='col mb-3' name='category'>";
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value=" .  $row['category_name'] . ">" . $row['category_name'] . "</option>";
                                }
                                echo "</select>";
                            ?>
                    </div>

                    <div class="col mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="decimal" class="form-control form-control-sm" id="price" name="price"
                            placeholder="0.00" required>
                    </div>
                </div>
                <div class="col mb-3">
                    <label for="media" class="form-label">Image</label>
                    <input class="form-control form-control-sm" id="image" type="file" name="image"
                        placeholder="Upload media" required>
                </div>

                <div class="mb-3">
                    <label for="desc" class="form-label">Description
                        <small class="text-secondary">(optional)</small>
                    </label>
                    <textarea class="form-control form-control-sm" id="desc" name="description" rows="4"
                        placeholder="Type your description..."></textarea>
                </div>
                <div class="justify-content-center justify-content-sm-end">
                    <div class="text-end">
                        <!-- <a href="#" type="button" class="btn btn-ghost-light" onclick="history.back()">Discard</a> -->
                        <!-- <a href="#" class="btn btn-primary" type="submit">Save</a> -->
                        <button class="btn btn-danger" onclick="history.back()">Discard</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>