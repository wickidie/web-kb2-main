<?php
    require 'session-admin.inc.php';

    $transaction_id = $_GET['transaction_id'];
    $sql = "DELETE FROM transactions WHERE transaction_id = '$transaction_id';";
    
    if (mysqli_query($conn, $sql)) {
        echo "              
        <script type='text/javascript'>
        alert('Transaction ID $transaction_id has been deleted');
        location='transactions.php';
        </script>";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

    mysqli_close($conn);
?>