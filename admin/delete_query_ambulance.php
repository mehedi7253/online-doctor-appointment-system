<?php
/**
 * Created by PhpStorm.
 * User: mehedi
 * Date: 8/16/2020
 * Time: 12:43 PM
 */

    require_once '../php/config.php';

    //ambulance service

    if (isset($_GET['ambulance_id'])) {
        $ambulance_id = $_GET['ambulance_id'];

        $del_ambulance = "DELETE FROM ambulance_service WHERE ambulance_service_id = $ambulance_id";
        $res_amblance_del = mysqli_query($connect, $del_ambulance);

        $_SESSION['success'] = 'Delete successfully';

        header('Location: ambulance.php');
     }else {
            $_SESSION['error'] = 'Delete Failed...!!';
            header('Location: ambulance.php');
    }