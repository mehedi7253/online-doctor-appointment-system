<?php
/**
 * Created by PhpStorm.
 * User: mehedi
 * Date: 8/16/2020
 * Time: 8:12 PM
 */



    include '../php/config.php';

    if (isset($_GET['ambulance_id'])){
        $ambulance_id   = $_GET['ambulance_id'];

        $sql = "DELETE FROM book_ambulance WHERE book_ambulance_id = $ambulance_id";
        $res = mysqli_query($connect, $sql);

        header('Location: withdraw_ambulance.php');
    }