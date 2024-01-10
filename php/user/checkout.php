<?php
    require 'session-users.inc.php';
    
    $quantity_count = $_POST['quantity_count'];
    $quantity = $_POST['quantity'];
    echo $quantity . "</p>";


    for ($i=0; $i < $quantity_count; $i++) { 
        $cart = $_POST['quantity'][$i];
        echo $cart . "</p>";
        echo "<p>asda" . $i  . "</p>";


    }
    
    echo $quantity_count;
    
    // cart update
    $sqlUpdateCart = "SELECT c.cart_id, c.quantity, p.product_id FROM cart c JOIN products p ON c.product_id = p.product_id WHERE user_id = $user_id";
    $result = mysqli_query($conn, $sqlUpdateCart);
    if (mysqli_num_rows($result) > 0) {
        $c = 0;
        while($row = mysqli_fetch_assoc($result)) {
            $cart_id = $row['cart_id'];
            
            $sql_update = "UPDATE `cart` SET `quantity`= $quantity[$c] WHERE cart_id = $cart_id";
            mysqli_query($conn, $sql_update);
            $c++;
        }
    }
    
    // getting transaction total value
    $sql = "SELECT c.cart_id, c.created_at, c.user_id, c.quantity, c.product_id, p.product_price FROM cart c JOIN products p ON c.product_id = p.product_id WHERE user_id = $user_id";
    $result = mysqli_query($conn, $sql);
    $transaction_total = 0;

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $transaction_total += $row['quantity'] * $row['product_price'];
        }
    }

    // buying, add to transactions or checking out
    $sql = "INSERT INTO `transactions`(`transaction_date`, `transaction_total`, `status`,`user_id`) VALUES (CURRENT_DATE(), $transaction_total, 'Pending', $user_id);";
    
    if (mysqli_query($conn, $sql)) {
        echo "              
        <script type='text/javascript'>
        alert('Item has been purchased');
        location='cart.php';
        </script>";
    } else {
        echo "Error buying record: " . mysqli_error($conn);
    }
    
    // getting transaction_id to input to transaction details
    $sqlTransactionId = "SELECT transaction_id FROM transactions;";
    $result = mysqli_query($conn, $sqlTransactionId);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $transaction_id = $row['transaction_id'];
        }
    }
    
    // input data to transaction details
    $sqlTransactionDetails = "SELECT c.cart_id, c.created_at, c.user_id, c.quantity, c.product_id, p.product_price FROM cart c JOIN products p ON c.product_id = p.product_id WHERE user_id = $user_id;";
    $result = mysqli_query($conn, $sqlTransactionDetails);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $quantity = $row['quantity'];
            $product_price = $row['product_price'];
            $product_id = $row['product_id'];

            $sql_insert = "INSERT INTO `transaction_details`(`quantity`, `product_price`, `transaction_id`, `product_id`) VALUES ($quantity, $product_price, $transaction_id, $product_id)";
            mysqli_query($conn, $sql_insert);
        }
    }

    // // empty the cart after checking out
    // $sql = "SELECT * FROM cart WHERE user_id = $user_id;";
    // $result = mysqli_query($conn, $sql);
    // if (mysqli_num_rows($result) > 0) {
    //     $truncate = "DELETE FROM `cart` WHERE user_id = $user_id;";
    //     mysqli_query($conn, $truncate);
    // }

    mysqli_close($conn) ;
?>