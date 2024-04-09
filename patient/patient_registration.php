<?php
/**
 * Created by PhpStorm.
 * User: mehedi
 * Date: 8/8/2020
 * Time: 8:34 PM
 */

    include '../php/config.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Patient Registration</title>
    <link rel="stylesheet" href="../assets/style/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="../assets/style/main.css" type="text/css">
    <link rel="icon" href="../images/logo.png">
</head>
<body>
    <section class="main_body">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto mt-5 mb-5">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center">Patient Registration</h4>
                        </div>
                        <div class="card-body">
                            <div>
                                <?php
                                if(isset($_SESSION['error'])){
                                    echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
                                    unset($_SESSION['error']);
                                }
                                if(isset($_SESSION['success'])){
                                    echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
                                    unset($_SESSION['success']);
                                }
                                if(isset($_SESSION['exist'])){
                                    echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Email Error!</h4>
              ".$_SESSION['exist']."
            </div>
          ";
                                    unset($_SESSION['exist']);
                                }

                                ?>
                            </div>
                            <?php
                            if (isset($_POST['patent_reg'])){
                                $first_name = $_POST['first_name'];
                                $last_name  = $_POST['last_name'];
                                $email      = $_POST['email'];
                                $phone      = $_POST['phone'];
                                $address    = $_POST['address'];
                                $city       = $_POST['city'];
                                $ps         = $_POST['ps'];
                                $postal     = $_POST['postal'];
                                $birth      = $_POST['date_of_birth'];
                                $gender     = $_POST['gender'];
                                $password   = $_POST['password'];

                                $has = hash('sha256', $password);

                                if ($first_name == ''){
                                    echo "<span class='text-danger'>First Name Must Not Empty.!!</span><br/>";
                                }
                                if ($last_name == ''){
                                    echo "<span class='text-danger'>Last Name Must Not Empty.!!</span><br/>";
                                }
                                if ($email == ''){
                                    echo "<span class='text-danger'>Email Must Not Empty.!!</span><br/>";
                                }
                                if ($phone == ''){
                                    echo "<span class='text-danger'>Phone Number Must Not Empty.!!</span><br/>";
                                }
                                if ($address == ''){
                                    echo "<span class='text-danger'>Street Address Must Not Empty.!!</span><br/>";
                                }
                                if ($city == ''){
                                    echo "<span class='text-danger'>City Must Not Empty.!!</span><br/>";
                                }
                                if ($ps == ''){
                                    echo "<span class='text-danger'>Postal/Zip Code Must Not Empty.!!</span><br/>";
                                }
                                if ($birth == ''){
                                    echo "<span class='text-danger'>Birth Date Must Not Empty.!!</span><br/>";
                                }
                                if ($gender == ''){
                                    echo "<span class='text-danger'>Gender Must Not Empty.!!</span><br/>";
                                }
                                if ($password == ''){
                                    echo "<span class='text-danger'>Password Must Not Empty.!!</span><br/>";
                                }


                                $sqlCheck = "SELECT * FROM patient WHERE email = '$email'";
                                $result = mysqli_query($connect, $sqlCheck);
                                $count = mysqli_num_rows($result);
                                if ($count > 0) {
                                    $_SESSION['exist'] = 'Email All ready Registerd Try Agin!';
                                    header('Location: patient_registration.php');
                                }else {
                                    if ($first_name && $last_name && $email && $phone && $address && $city && $ps && $birth && $gender && $password) {

                                        $create = @date('Y-m-d H:i:s');

                                        $fileinfo = PATHINFO($_FILES['image']['name']);
                                        $newfilename = $fileinfo['filename'] . "." . $fileinfo['extension'];
                                        move_uploaded_file($_FILES['image']['tmp_name'], "../images/" . $newfilename);
                                        $location = $newfilename;

                                        $sql = "INSERT INTO patient (first_name, last_name, email, phone, address, city, ps, date_of_birth, gender, password, image, status, join_date) VALUES ('$first_name', '$last_name', '$email', '$phone', '$address', '$city', '$ps', '$birth', '$gender', '$has', '$location', '0', '$create')";
                                        $res = mysqli_query($connect, $sql);


                                        $_SESSION['success'] = 'Registration successfully';

                                        header('Location: patient_registration.php');
                                    }else{
                                        $_SESSION['error'] = 'Registration Failed..!!!';

                                        header('Location: patient_registration.php');
                                    }
                                }
                            }
                            ?>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group col-md-6 float-left">
                                    <label>First Name</label>
                                    <input type="text" name="first_name" placeholder="Enter First Name" class="form-control" value="<?php if($_POST) {
                                        echo $_POST['first_name'];
                                    } ?>">
                                </div>
                                <div class="form-group col-md-6 float-left">
                                    <label>Last Name</label>
                                    <input type="text" name="last_name" placeholder="Enter Last Name" class="form-control"value="<?php if($_POST) {
                                        echo $_POST['last_name'];
                                    } ?>">
                                </div>
                                <div class="form-group col-md-6 float-left">
                                    <label>Email</label>
                                    <input type="email" name="email" placeholder="Enter Email Address" class="form-control"value="<?php if($_POST) {
                                        echo $_POST['email'];
                                    } ?>">
                                </div>
                                <div class="form-group col-md-6 float-left">
                                    <label>Phone</label>
                                    <input type="number" name="phone" placeholder="Enter Phone Number" class="form-control" value="<?php if($_POST) {
                                        echo $_POST['phone'];
                                    } ?>">
                                </div>
                                <div class="form-group col-md-12 float-left">
                                    <label>Street Address</label>
                                    <textarea name="address" placeholder="Enter Your Street Address" class="form-control"><?php if($_POST) {
                                            echo $_POST['address'];
                                        } ?></textarea>
                                </div>
                                <div class="form-group col-md-6 float-left">
                                    <label>Police Station</label>
                                    <input type="text" name="ps" placeholder="Enter Police Station" class="form-control" value="<?php if($_POST) {
                                        echo $_POST['ps'];
                                    } ?>">
                                </div>
                                <div class="form-group col-md-6 float-left">
                                    <label>City</label>
                                    <input type="text" name="city" placeholder="Enter City Name" class="form-control" value="<?php if($_POST) {
                                        echo $_POST['city'];
                                    } ?>">
                                </div>
                                <div class="form-group col-md-6 float-left">
                                    <label>Postal/Zip</label>
                                    <input type="text" name="postal" placeholder="Enter Email Address" class="form-control" value="<?php if($_POST) {
                                        echo $_POST['postal'];
                                    } ?>">
                                </div>
                                <div class="form-group col-md-6 float-left">
                                    <label>Birth Date</label>
                                    <input type="date" name="date_of_birth" class="form-control" value="<?php if($_POST) {
                                        echo $_POST['date_of_birth'];
                                    } ?>">
                                </div>
                                <div class="form-group col-md-6 float-left">
                                    <label>Gender </label><br/>
                                    <input type="radio" checked name="gender" value="Male"> Male
                                    <input type="radio" name="gender" value="Fe Male"> Fe-Male
                                </div>
                                <div class="form-group col-md-6 float-left">
                                    <label>Password</label>
                                    <input type="password" name="password"  placeholder="Enter Your Password" class="form-control">
                                </div>
                                <div class="form-group col-md-6 float-left">
                                    <label>Image</label>
                                    <input type="file" name="image" class="form-control"  value="<?php if($_POST) {
                                        echo $_POST['image'];
                                    } ?>">
                                </div>
                                <div class="form-group col-md-6 float-left">
                                    <label class="p-2"></label>
                                    <input type="submit" name="patent_reg" class="btn btn-info btn-block" value="Submit">
                                </div>
                            </form>
                        </div>
                        <div class="card-footer">
                            <p class="float-right">All Ready Have Account <span><a href="patient_login.php" class="text-decoration-none">Login Here</a></span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap.js"></script>
</body>
</html>

