<?php
    $connect = new mysqli('localhost','root','','3tn-shop');
    if($connect->errno !== 0)
    {
        die("Error: Could not connect to the database. An error ".$connect->error." ocurred.");
    }
    $connect->set_charset('utf8');
?>
