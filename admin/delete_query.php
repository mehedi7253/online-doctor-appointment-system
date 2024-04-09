<?php
/**
 * Created by PhpStorm.
 * User: mehedi
 * Date: 8/11/2020
 * Time: 1:55 PM
 */

    require_once '../php/config.php';

    //delete medicine

    if (isset($_GET['medecine_del_id'])){
        $medecine_id_del = $_GET['medecine_del_id'];

        $del_med = "DELETE FROM medicine WHERE medecine_id = $medecine_id_del";
        $res_del = mysqli_query($connect, $del_med);

        $_SESSION['success'] = 'Delete successfully';

        header('Location: medicine.php');
    }else{
        $_SESSION['error'] = 'Delete Failed...!!';

        header('Location: medicine.php');

    }

    //ambulance service

    if (isset($_GET['ambulance_id'])){
        $ambulance_id = $_GET['ambulance_id'];

        $del_ambulance   = "DELETE FROM ambulance_service WHERE ambulance_service_id = $ambulance_id";
        $res_amblance_del = mysqli_query($connect, $del_ambulance);


        if ($res_amblance_del){
            $_SESSION['successs'] = 'Delete successfully';

            header('Location: ambulance.php');
        }else {
            $_SESSION['errors'] = 'Delete Failed...!!';
            header('Location: ambulance.php');
        }

    }