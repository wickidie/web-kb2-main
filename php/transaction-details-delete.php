<?php
    require 'session-admin.inc.php';
    
    $transaction_detail_id = $_GET['transaction_detail_id'];
    $sql = "DELETE FROM transaction_details WHERE transaction_detail_id = '$transaction_detail_id';";
    
    if (mysqli_query($conn, $sql)) {
        echo "              
        <script type='text/javascript'>
        alert('Transaction Details ID $transaction_detail_id has been deleted');
        location='transaction-details.php';
        </script>";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

    mysqli_close($conn);
?>