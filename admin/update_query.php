<?php
/**
 * Created by PhpStorm.
 * User: mehedi
 * Date: 8/11/2020
 * Time: 12:51 PM
 */

  require_once '../php/config.php';

    //medicine
    if (isset($_POST['medecine_id'])){
        $medecine_id   = $_POST['medecine_id'];

        $sql = "SELECT * FROM medicine WHERE medecine_id = '$medecine_id'";
        $res = mysqli_query($connect, $sql);

        $m_data = mysqli_fetch_assoc($res);

        echo json_encode($m_data);
    }
    if (isset($_POST['update_medicine'])){
        $medecine_id = $_POST['medecine_id'];
        $name        = $_POST['name'];
        $price       = $_POST['price'];
        $description = $_POST['description'];

        if ($name && $price && $description){

            $update_medicine = "UPDATE medicine SET name = '$name', price = '$price', description = '$description' WHERE medecine_id = $medecine_id";
            $res_update_med = mysqli_query($connect, $update_medicine);

            $_SESSION['success'] = 'Update successfully';

            header('Location: medicine.php');
        }else{
            $_SESSION['error'] = 'Update Failed...!!';

            header('Location: medicine.php');
        }
    }


    //ambulance service

    if (isset($_POST['ambulance_service_id'])){

        $ambulance_id   = $_POST['ambulance_service_id'];

        $sql_ambulance = "SELECT * FROM ambulance_service WHERE ambulance_service_id = '$ambulance_id'";
        $res_ambulance = mysqli_query($connect, $sql_ambulance);

        $ambulance_data = mysqli_fetch_assoc($res_ambulance);

        echo json_encode($ambulance_data);
    }

    if (isset($_POST['update_ambulance'])){

        $ambulance_service_id = $_POST['ambulance_service_id'];
        $driver_name          = $_POST['driver_name'];
        $driver_phone         = $_POST['driver_phone'];
        $description          = $_POST['description'];
        $car_number           = $_POST['car_number'];
        $price                = $_POST['price'];

        if ($driver_name && $driver_phone && $description && $car_number && $price){

            $fileinfo = PATHINFO($_FILES['image']['name']);
            $newfilename = $fileinfo['filename'] . "." . $fileinfo['extension'];
            move_uploaded_file($_FILES['image']['tmp_name'], "../images/" . $newfilename);
            $location = $newfilename;

            $fileinfo_2 = PATHINFO($_FILES['driving_licinence']['name']);
            $newfilename_2 = $fileinfo_2['filename'] . "." . $fileinfo_2['extension'];
            move_uploaded_file($_FILES['driving_licinence']['tmp_name'], "../images/" . $newfilename_2);
            $location_2 = $newfilename_2;

            $fileinfo_3 = PATHINFO($_FILES['driver_image']['name']);
            $newfilename_3 = $fileinfo_3['filename'] . "." . $fileinfo_3['extension'];
            move_uploaded_file($_FILES['driver_image']['tmp_name'], "../images/" . $newfilename_3);
            $location_3 = $newfilename_3;


            $update_ambulance = "UPDATE ambulance_service SET
                                driver_name       = '$driver_name',
                                driver_phone      = '$driver_phone',
                                description       = '$description',
                                car_number        = '$car_number',
                                price             = '$price',
                                image             = '$location',
                                driving_licinence = '$location_2',
                                driver_image      = '$location_3' WHERE ambulance_service_id = '$ambulance_id'";
            $res_ambulance_up = mysqli_query($connect, $update_ambulance);

            $_SESSION['success'] = ' Ambulance Service Update successfully';

            header('Location: ambulance.php');
        }else{
            $_SESSION['error'] = ' Ambulance Service  Update Failed...!!';

            header('Location: ambulance.php');
        }


    }


    // add charge
    if (isset($_POST['doctor_id'])){

        $doctor_id   = $_POST['doctor_id'];

        $sql_charge = "SELECT * FROM doctors WHERE doctor_id = '$doctor_id'";
        $res_charge = mysqli_query($connect, $sql_charge);

        $charge_data = mysqli_fetch_assoc($res_charge);

        echo json_encode($charge_data);
    }

    if (isset($_POST['update_charge'])){
        $doc_id     = $_POST['doctor_id'];
        $charge     = $_POST['charge'];

        if ($doc_id && $charge){
            $update_charge = "UPDATE doctors SET charge = '$charge' WHERE doctor_id = '$doc_id'";
            $res_up_charge = mysqli_query($connect, $update_charge);

            $_SESSION['success'] = ' Doctor Appointment Charge Update successfully';

            header('Location: charge.php');
        }else{
            $_SESSION['error'] = '  Doctor Appointment Charge  Update Failed...!!';

            header('Location: charge.php');

        }
    }
