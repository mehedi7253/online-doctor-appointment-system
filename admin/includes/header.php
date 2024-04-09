<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 6/29/2020
 * Time: 3:19 PM
 */

    session_start();
    if (!isset($_SESSION['email'])){
        header('Location: admin_login.php');
    }


    require_once '../php/db_connect.php';

    $email = $_SESSION['email'];

    $sql = "select * from admin WHERE email = '$email'";
    $res = mysqli_query($connect, $sql);

    $userdata = mysqli_fetch_array($res);
?>

<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Admin Dashboard</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="assets/css/app.min.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="assets/bundles/datatables/datatables.min.css">
    <link rel="stylesheet" href="assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel='shortcut icon' type='image/x-icon' href="../images/<?php echo $userdata['image'];?>"/>
</head>