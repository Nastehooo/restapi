<?php

    //DB Params
    $host = 'localhost';
    $username = 'root';
    $password = 'Muddyroom21!';
    $db_name = 'car_insurance';

    // DB Connect
    $con = new mysqli($host, $username, $password, $db_name);
    
    
    if (!$con) {
        die('Connection Failed'. mysqli_connect_error());

    }

?>
