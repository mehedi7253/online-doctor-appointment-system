<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 7/12/2020
 * Time: 4:00 PM
 */

    session_start();

    if (!isset($_SESSION['email'])){
        header('Location: admin_login.php');
    }
    include '../php/db_connect.php';


    //doctor

    if (isset($_POST['add_doctor'])){

        $first_name  = $_POST['first_name'];
        $last_name   = $_POST['last_name'];
        $email       = $_POST['email'];
        $phone       = $_POST['phone'];
        $degree      = $_POST['degree'];
        $type        = $_POST['types'];
//        $image       = $_FILES['image']['name'];
        $password    = $_POST['password'];

        $hashedPW = hash('sha256', $password);

        if ($first_name && $last_name && $email && $phone && $degree && $password){

            $create = @date('Y-m-d H:i:s');
            $fileinfo = PATHINFO($_FILES['image']['name']); // file information
            $newfilename  = $fileinfo['filename']. "." .$fileinfo['extension']; // upload path and name with extension
            move_uploaded_file($_FILES['image']['tmp_name'],"../images/" .$newfilename); // upload file
            $location = $newfilename; // location info


            $add_doctor = "INSERT INTO doctors (first_name, last_name, email, phone, degree, types, password, status, image) VALUES ('$first_name', '$last_name', '$email', '$phone', '$degree', '$type', '$hashedPW', '0', '$location')";
            $doctor_res = mysqli_query($connect, $add_doctor);

            $_SESSION['success'] = 'New Doctor Added successfully';

            header('Location: doctors.php');
        }else{
            $_SESSION['error'] = 'New Doctor Added Failed';

            header('Location: doctors.php');
        }
    }

