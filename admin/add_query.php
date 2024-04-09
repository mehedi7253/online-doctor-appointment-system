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
        $category    = $_POST['category'];
        $password    = $_POST['password'];

        $hashedPW = hash('sha256', $password);


        $sqlCheck = "SELECT * FROM doctors WHERE email = '$email'";
        $result = mysqli_query($connect, $sqlCheck);
        $count = mysqli_num_rows($result);
        if ($count > 0) {
            $_SESSION['exist'] = 'Email All ready Registerd Try Agin!';
            header('Location: doctors.php');
        }else{
            if ($first_name && $last_name && $email && $phone && $degree && $password && $category) {

                $create = @date('Y-m-d H:i:s');
                $fileinfo = PATHINFO($_FILES['image']['name']); // file information
                $newfilename = $fileinfo['filename'] . "." . $fileinfo['extension']; // upload path and name with extension
                move_uploaded_file($_FILES['image']['tmp_name'], "../images/" . $newfilename); // upload file
                $location = $newfilename; // location info

                $add_doctor = "INSERT INTO doctors (first_name, last_name, email, phone, degree, password, status, image, join_date, category) VALUES ('$first_name', '$last_name', '$email', '$phone', '$degree', '$hashedPW', '0', '$location', '$create', '$category')";
                $doctor_res = mysqli_query($connect, $add_doctor);

                $_SESSION['success'] = 'New Doctor Added successfully';

                header('Location: doctors.php');
                } else {
                    $_SESSION['error'] = 'New Doctor Added Failed';

                    header('Location: doctors.php');
                }
        }

    }

    //medicine

    if (isset($_POST['add_medicine'])){
        $name        = $_POST['name'];
        $price       = $_POST['price'];
        $description = $_POST['description'];


        $sqlCheckMedicine = "SELECT * FROM medicine WHERE name = '$name'";
        $result_medicine  = mysqli_query($connect, $sqlCheckMedicine);

        $count_medicine   = mysqli_num_rows($result_medicine);

        if ($count_medicine > 0) {
            $_SESSION['exist'] = 'This Medicine Allready Added......Try Agin!';
            header('Location: medicine.php');
        }else{
            if ($name && $price && $description){

                $fileinfo = PATHINFO($_FILES['image']['name']);
                $newfilename = $fileinfo['filename'] . "." . $fileinfo['extension'];
                move_uploaded_file($_FILES['image']['tmp_name'], "../images/" . $newfilename);
                $location = $newfilename;

                $sql_add_medicine = "INSERT INTO medicine (name, price, description, image, status) VALUES ('$name', '$price', '$description', '$location', '0')";
                $res_medicine     = mysqli_query($connect, $sql_add_medicine);

                $_SESSION['success'] = 'New Medicine Added successfully';

                header('Location: medicine.php');
            }else{
                $_SESSION['error'] = 'New Medicine Added Failed...!!';

                header('Location: medicine.php');
            }
        }
    }

    //add ambulance

    if (isset($_POST['add_ambulance'])){
        $driver_name     = $_POST['driver_name'];
        $driver_phone    = $_POST['driver_phone'];
        $description     = $_POST['description'];
        $car_number      = $_POST['car_number'];
        $price           = $_POST['price'];

        $sqlCheckCar_number = "SELECT * FROM ambulance_service WHERE car_number = '$car_number'";
        $result_Car_number  = mysqli_query($connect, $sqlCheckCar_number);

        $count_medicine   = mysqli_num_rows($result_Car_number);

        if ($count_medicine > 0) {
            $_SESSION['exist'] = 'This Car All ready Added......Try Agin!';
            header('Location: ambulance.php');
        }else{
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


                $sql_add_ambulance =  "INSERT INTO ambulance_service (driver_name, driver_phone, description, car_number, price, image, driving_licinence, driver_image, status) VALUES ('$driver_name', '$driver_phone', '$description', '$car_number', '$price', '$location', '$location_2', '$location_3', '0')";
                $result_ambulance  = mysqli_query($connect, $sql_add_ambulance);

                $_SESSION['success'] = 'New Ambulance Service Added successfully';

                header('Location: ambulance.php');
            }else{
                $_SESSION['error'] = 'New Ambulance Service  Added Failed...!!';

                header('Location: ambulance.php');
            }
        }


    }

    //add_nutrition

    if (isset($_POST['add_nutrition'])){

        $first_name  = $_POST['first_name'];
        $last_name   = $_POST['last_name'];
        $email       = $_POST['email'];
        $phone       = $_POST['phone'];
        $degree      = $_POST['degree'];
        $category    = $_POST['category'];
        $password    = $_POST['password'];

        $hashedPW = hash('sha256', $password);


        $sqlChecknutrition = "SELECT * FROM doctors WHERE email = '$email'";
        $result_nutrition = mysqli_query($connect, $sqlChecknutrition);
        $count_nutrition = mysqli_num_rows($result_nutrition);
        if ($count_nutrition > 0) {
            $_SESSION['exist'] = 'Email All ready Registerd Try Agin!';
            header('Location: nutrition.php');
        }else{
            if ($first_name && $last_name && $email && $phone && $degree && $password && $category) {

                $create = @date('Y-m-d H:i:s');
                $fileinfo = PATHINFO($_FILES['image']['name']); // file information
                $newfilename = $fileinfo['filename'] . "." . $fileinfo['extension']; // upload path and name with extension
                move_uploaded_file($_FILES['image']['tmp_name'], "../images/" . $newfilename); // upload file
                $location = $newfilename; // location info

                $add_nutrition = "INSERT INTO doctors (first_name, last_name, email, phone, degree, password, status, image, join_date, category) VALUES ('$first_name', '$last_name', '$email', '$phone', '$degree', '$hashedPW', '0', '$location', '$create', '$category')";
                $nutrition_res = mysqli_query($connect, $add_nutrition);



                $_SESSION['success'] = 'New Nutrition Expert Added successfully';

                header('Location: nutrition.php');
            } else {
                $_SESSION['error'] = 'New Nutrition Expert Added Failed';

                header('Location: nutrition.php');
            }
        }
    }

//
//    //add_trainer

    if (isset($_POST['add_trainer'])){

        $first_name  = $_POST['first_name'];
        $last_name   = $_POST['last_name'];
        $email       = $_POST['email'];
        $phone       = $_POST['phone'];
        $degree      = $_POST['degree'];
        $category    = $_POST['category'];
        $password    = $_POST['password'];

        $hashedPW = hash('sha256', $password);


        $sqlCheckTrainer = "SELECT * FROM doctors WHERE email = '$email'";
        $result_trainer  = mysqli_query($connect, $sqlCheckTrainer);
        $count_trainer = mysqli_num_rows($result_trainer);
        if ($count_trainer > 0) {
            $_SESSION['exist'] = 'Email All ready Registerd Try Agin!';
            header('Location: nutrition.php');
        }else{
            if ($first_name && $last_name && $email && $phone && $degree && $password && $category) {

                $create = @date('Y-m-d H:i:s');
                $fileinfo = PATHINFO($_FILES['image']['name']);
                $newfilename = $fileinfo['filename'] . "." . $fileinfo['extension'];
                move_uploaded_file($_FILES['image']['tmp_name'], "../images/" . $newfilename);
                $location = $newfilename;

                $add_trainer = "INSERT INTO doctors (first_name, last_name, email, phone, degree, password, status, image, join_date, category) VALUES ('$first_name', '$last_name', '$email', '$phone', '$degree', '$hashedPW', '0', '$location', '$create', '$category')";
                $trainer_res = mysqli_query($connect, $add_trainer);

                $_SESSION['success'] = 'New Nutrition Expert Added successfully';

                header('Location: trainer.php');
            } else {
                $_SESSION['error'] = 'New Nutrition Expert Added Failed';

                header('Location: trainer.php');
            }
        }
    }


    //add add_psychologist

    if (isset($_POST['add_psychologist'])){
        $first_name  = $_POST['first_name'];
        $last_name   = $_POST['last_name'];
        $email       = $_POST['email'];
        $phone       = $_POST['phone'];
        $degree      = $_POST['degree'];
        $category    = $_POST['category'];
        $password    = $_POST['password'];

        $hashedPW = hash('sha256', $password);


        $sqlCheckpsychologist = "SELECT * FROM doctors WHERE email = '$email'";
        $result_psychologist = mysqli_query($connect, $sqlCheckpsychologist);
        $count_psychologist = mysqli_num_rows($result_psychologist);
        if ($count_psychologist > 0) {
            $_SESSION['exist'] = 'Email All ready Registerd Try Agin!';
            header('Location: Psychologists.php');
        }else{
            if ($first_name && $last_name && $email && $phone && $degree && $password && $category) {

                $create = @date('Y-m-d H:i:s');
                $fileinfo = PATHINFO($_FILES['image']['name']); // file information
                $newfilename = $fileinfo['filename'] . "." . $fileinfo['extension']; // upload path and name with extension
                move_uploaded_file($_FILES['image']['tmp_name'], "../images/" . $newfilename); // upload file
                $location = $newfilename; // location info

                $add_psychologist = "INSERT INTO doctors (first_name, last_name, email, phone, degree, password, status, image, join_date, category) VALUES ('$first_name', '$last_name', '$email', '$phone', '$degree', '$hashedPW', '0', '$location', '$create', '$category')";
                $psychologist_res = mysqli_query($connect, $add_psychologist);

                $_SESSION['success'] = 'New Nutrition Expert Added successfully';

                header('Location: Psychologists.php');
            } else {
                $_SESSION['error'] = 'New Nutrition Expert Added Failed';

                header('Location: Psychologists.php');
            }
        }
    }
