<?php
    function alertToLocation($location, $msg){
        echo "              
        <script type='text/javascript'>
        alert('$msg');
        location='$location.php';
        </script>";
    }

    function toLocation($location){
        echo "              
        <script type='text/javascript'>
        location='$location.php';
        </script>";
    }

    

?>