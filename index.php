<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Life Style</title>
    <link href="assets/style/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="assets/style/main.css" rel="stylesheet" type="text/css">
    <link href="images/logo.png" rel="icon">

</head>
<body>
    <section class="header-top" style="background-color: silver">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="float-left">
                        <a href="index.php"><img src="images/logo.png" style="height: 60px; width: 200px;" class="mt-2"></a>
                    </div>
                    <div class="float-right p-2">
                        <p class="text-info font-weight-bold">Call US: <span class="text-success">01941697253</span> <br/><span>Email: <span class="text-success">lifestyle@gmail.com</span></span></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="slide_body">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-12 slide_head mb-5">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Contact With Us</h3>
                            <?php
                                require_once 'php/config.php';

                                if (isset($_POST['btn'])){
                                    $name   = $_POST['name'];
                                    $phone  = $_POST['phone'];
                                    $msg    = $_POST['msg'];

                                    if ($name && $phone && $msg){
                                        $create = @date('Y-m-d H:i:s');

                                        $sql = "INSERT INTO global_msg (name, phone, msg, date) VALUES ('$name', '$phone', '$msg', '$create')";
                                        $res = mysqli_query($connect, $sql);

                                        echo "<span class='text-success'>Message Sent Successful</span> <br/>";
                                    }else{
                                        echo "<span class='text-danger'>Message Sent Failed...!</span> <br/>";
                                    }
                                }
                            ?>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter Your Name" required>
                                </div>
                                <div class="form-group">
                                    <label>Phone Or Email</label>
                                    <input type="text" name="phone" class="form-control" placeholder="Enter Your Phone Number Or Email" required>
                                </div>
                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea name="msg" class="form-control" placeholder="Enter Your Message" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label></label>
                                    <input type="submit" name="btn" class="btn btn-success" value="Sent Message">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="login_area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="login_btn">
                        <div class="col-md-3 col-sm-12 float-left p-2">
                            <div class="login_box">
                                <img src="images/patient-bed-hospital-illness-admit-512.png" style="height: 100px; width: 100px">
                                <div class="col-md-7 float-right">
                                    <h6 style="color: blue" class="mt-3">Patient's Login</h6>
                                    <a  href="patient/patient_registration.php" style="color: blue; font-size: 11px; margin-left: 6px">Registration & Login</a>
                                    <a href="patient/patient_login.php" class="nav-link" style="margin-top: -10px">Login Here</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12 float-left p-2">
                            <div class="login_box">
                                <img src="images/doctor-icon-avatar-white_136162-58.jpg" style="height: 100px; width: 100px">
                                <div class="col-md-7 float-right">
                                    <h6 style="color: blue" class="mt-3">Doctor's Login</h6>
                                    <a href="doctor/doctor_login.php" class="nav-link">Login Here</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12 float-left p-2">
                            <div class="login_box">
                                    <img src="images/admin.jpg" style="height: 100px; width: 100px">
                                <div class="col-md-7 col-sm-12 float-right">
                                    <h6 style="color: blue" class="mt-3">Admin Login</h6>
                                    <a href="admin/admin_login.php" class="nav-link">Login Here</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12 float-left p-2">
                            <div class="login_box">
                                <img src="images/social.png" style="height: 100px; width: 100px">
                                <div class="col-md-7 col-sm-12 float-right">
                                    <h6 style="color: blue" class="mt-3">Social worker</h6>
                                    <a href="social_worker/reg_worker.php"  style="color: blue; font-size: 11px; margin-left: 6px">Registration & Login</a>
                                    <a href="social_worker/social_login.php" class="nav-link" style="margin-top: -10px">Login Here</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <p class="text-white p-2 text-center">This Site is Create By <span style="font-style: italic">@Mehedi Hasan</span></p>
                </div>
            </div>
        </div>
    </section>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/topdown.js"></script>
</body>
</html>