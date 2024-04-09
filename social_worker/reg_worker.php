<?php
    include "../php/config.php";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Social Worker Registration</title>
    <link href="../assets/style/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="../assets/style/main.css" rel="stylesheet" type="text/css">
    <link href="../images/logo.png" rel="icon">
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto mt-5 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Social Worker Registration</h3>
                    </div>
                    <div class="card-body">
                        <h6 class="ml-3">
                            <?php
                                if (isset($_POST['reg_btn'])) {
                                    $first_name = $_POST['first_name'];
                                    $last_name = $_POST['last_name'];
                                    $email = $_POST['email'];
                                    $phone = $_POST['phone'];
                                    $address = $_POST['address'];
                                    $password = $_POST['password'];

                                    if($first_name == "") {
                                        echo "<span class='text-danger'> First Name is Required <sup class='font-weight-bold'>*</sup></span> <br/>";
                                    }
                                    if($last_name == "") {
                                        echo "<span class='text-danger'> Last Name is Required <sup class='font-weight-bold'>*</sup></span> <br/>";
                                    }
                                    if($email == "") {
                                        echo "<span class='text-danger'> Email is Required <sup class='font-weight-bold'>*</sup></span> <br/>";
                                    }
                                    if($phone == "") {
                                        echo "<span class='text-danger'> Phone Number is Required <sup class='font-weight-bold'>*</sup></span> <br/>";
                                    }
                                    if($address == "") {
                                        echo "<span class='text-danger'> Address is Required <sup class='font-weight-bold'>*</sup></span> <br/>";
                                    }
                                    if($password == "") {
                                        echo "<span class='text-danger'> Password is Required <sup class='font-weight-bold'>*</sup></span> <br/>";
                                    }

                                    $hashedPW = hash('sha256', $password);

                                    $sqlCheck = "SELECT * FROM social_worker WHERE email = '$email'";
                                    $result   = mysqli_query($connect, $sqlCheck);

                                    $count = mysqli_num_rows($result);
                                    if ($count > 0){
                                        echo "<span class='text-danger'>Email All Ready Registered...!!!</span><br/>";
                                    }else{
                                        if ($first_name && $last_name && $email && $phone && $address && $password){

                                            $create = @date('Y-m-d H:i:s');

                                            $fileinfo = PATHINFO($_FILES['image']['name']);
                                            $newfilename = $fileinfo['filename'] . "." . $fileinfo['extension'];
                                            move_uploaded_file($_FILES['image']['tmp_name'], "../images/" . $newfilename);
                                            $location = $newfilename;

                                            $sql_reg = "INSERT INTO social_worker (first_name, last_name, email, phone, address, password, image, date) VALUES ('$first_name', '$last_name', '$email', '$phone', '$address', '$hashedPW', '$location', '$create')";
                                            $res_reg = mysqli_query($connect, $sql_reg);

                                            echo "<span class='text-success'>Registered Successful</span><br/>";
                                        }else{
                                            echo "<span class='text-danger'>Registered Failed....!!</span><br/>";
                                        }
                                    }

                                }

                            ?>
                        </h6>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group col-md-6 col-sm-12 float-left">
                                <label>First Name</label>
                                <input type="text" name="first_name" class="form-control" placeholder="Enter First Name" value="<?php if($_POST) {
                                    echo $_POST['first_name'];
                                } ?>">
                            </div>
                            <div class="form-group col-md-6 col-sm-12 float-left">
                                <label>Last Name</label>
                                <input type="text" name="last_name" class="form-control" placeholder="Enter last Name" value="<?php if($_POST) {
                                    echo $_POST['last_name'];
                                } ?>">
                            </div>
                            <div class="form-group col-md-6 col-sm-12 float-left">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter Email" value="<?php if($_POST) {
                                    echo $_POST['email'];
                                } ?>">
                            </div>
                            <div class="form-group col-md-6 col-sm-12 float-left">
                                <label>Phone Number</label>
                                <input type="text" name="phone" class="form-control" placeholder="Enter Phone Number" value="<?php if($_POST) {
                                    echo $_POST['phone'];
                                } ?>">
                            </div>
                            <div class="form-group col-md-12 col-sm-12 float-left">
                                <label>Address</label>
                                <textarea name="address" class="form-control" placeholder="Enter Your Address"></textarea>
                            </div>
                            <div class="form-group col-md-6 col-sm-12 float-left">
                                <label>Chose photo</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="form-group col-md-6 col-sm-12 float-left">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Enter Password">
                            </div>
                            <div class="form-group col-md-6 col-sm-12 float-left">
                                <label></label>
                                <input type="submit" name="reg_btn" class="btn btn-success btn-block" value="Submit">
                            </div>
                            <div class="form-group col-md-6 col-sm-12 float-left">
                                <label></label>
                                <input type="reset" name="" class="btn btn-danger btn-block" value="Cancel">
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <a href="social_login.php" class="text-decoration-none float-right">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap.js"></script>
</body>
</html>
