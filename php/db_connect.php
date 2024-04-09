<?php
/**
 * Created by PhpStorm.
 * User: mdmeh
 * Date: 8/5/2020
 * Time: 12:05 PM
 */

    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $dbname     = "life_style";

    // crearte connection
    $connect = new Mysqli($servername, $username, $password, $dbname);

    // check connection
    if($connect->connect_error) {
        die("Connection Failed : " . $connect->error);
    } else {
        // echo "Successfully Connected";
    }


?>