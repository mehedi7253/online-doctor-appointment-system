<?php
/**
 * Created by PhpStorm.
 * User: mehedi
 * Date: 8/10/2020
 * Time: 4:07 PM
 */

    include '../php/config.php';

    if (isset($_GET['appointment_id'])){
        $appointment_id    = $_GET['appointment_id'];

        $sql = "DELETE FROM appointment WHERE appoinment_id = '$appointment_id'";
        $res = mysqli_query($connect, $sql);

        header('Location: withdraw_appointment.php');
    }
