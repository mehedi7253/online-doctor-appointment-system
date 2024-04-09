<?php
/**
 * Created by PhpStorm.
 * User: mehedi
 * Date: 7/1/2020
 * Time: 6:07 PM
 */
?>
<!--header-->
    <?php include 'includes/header.php';?>
<!--end header-->
<body>
<div class="loader"></div>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        <!--nav bar-->
        <?php include 'includes/nav.php';?>
        <!--end navbar-->

        <!-- side bar-->
        <?php include 'includes/side.php';?>
        <!-- end side bar-->
        <!-- Main Content -->
        <div class="main-content">
            <section class="section">
                <!--main content-->
                <div class="row">
                    <div class="col-md-10 mx-auto mb-5">
                        <div class="card">
                             <div class="card-header">
                                 <h3 class="text-center">Update Your Profile</h3>
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
                                    ?>
                                </div>
                                <h3>
                                    <?php
                                    if (isset($_POST['update_profile'])){
                                        $worker_id        = $_POST['worker_id'];
                                        $first_name        = $_POST['first_name'];
                                        $last_name         = $_POST['last_name'];
                                        $phone             = $_POST['phone'];
                                        $address           = $_POST['address'];
                                        $gender            = $_POST['gender'];


                                        if ($first_name == ''){
                                            echo "<span class='text-danger'>Pls Enter Your First Name</span><br/>";
                                        }
                                        if ($last_name == ''){
                                            echo "<span class='text-danger'>Pls Enter Your Last Name</span><br/>";
                                        }
                                        if ($phone == ''){
                                            echo "<span class='text-danger'>Pls Enter Your Phone Number</span><br/>";
                                        }

                                        if ($address == ''){
                                            echo "<span class='text-danger'>Pls Enter Your Address  </span><br/>";
                                        }
                                        if ($gender == ''){
                                            echo "<span class='text-danger'>Pls Select Your Gender  </span><br/>";
                                        }



                                        if ($worker_id && $first_name && $last_name && $phone && $address && $gender){
                                            $sql = "UPDATE social_worker SET 
                                                    first_name        = '$first_name',
                                                    last_name         = '$last_name',
                                                    phone             = '$phone',
                                                    address           = '$address',
                                                    gender            = '$gender' WHERE worker_id = $worker_id
                                                  ";

                                            $res = mysqli_query($connect, $sql);

                                            $_SESSION['success'] = 'Profile Update successfully';
                                            echo "<script>document.location.href='update_profile.php'</script>";
                                        }else{
                                            $_SESSION['error'] = 'Profile Update Filed...!!';
                                            echo "<script>document.location.href='update_profile.php'</script>";
                                        }
                                    }
                                    ?>
                                </h3>
                                <form action="" method="post">
                                    <div class="form-group col-md-6 float-left">
                                        <label>First Name: </label>
                                        <input name="worker_id" hidden value="<?php echo $userdata['worker_id'];?>">
                                        <input type="text" name="first_name" class="form-control" value="<?php if($_POST) {
                                            echo $_POST['first_name'];
                                        } else {
                                            echo $userdata['first_name'];
                                        } ?>">
                                    </div>
                                    <div class="form-group col-md-6 float-left">
                                        <label>Last Name: </label>
                                        <input type="text" name="last_name" class="form-control" value="<?php if($_POST) {
                                            echo $_POST['last_name'];
                                        } else {
                                            echo $userdata['last_name'];
                                        } ?>">
                                    </div>
                                    <div class="form-group ml-3">
                                        <label>Email: </label>
                                        <input type="email" disabled name="email" class="form-control" value="<?php echo $userdata['email'];?>">
                                    </div>
                                    <div class="form-group col-md-6 float-left">
                                        <label>Contact Number: </label>
                                        <input type="number" name="phone" class="form-control" value="<?php if($_POST) {
                                            echo $_POST['phone'];
                                        } else {
                                            echo $userdata['phone'];
                                        } ?>">
                                    </div>
                                    <div class="form-group col-md-6 float-left">
                                        <label> Address: </label>
                                        <textarea class="form-control" name="address"><?php echo $userdata['address'];?></textarea>
                                    </div>
                                    <div class="form-group ml-3">
                                        <label>Gender: </label><br/>
                                        <input type="radio" checked name="gender" value="Male"> Male
                                        <input type="radio" name="gender" value="Fe-Male"> Fe-Male
                                    </div>
                                    <div class="form-group ml-3">
                                        <input type="submit" name="update_profile" class="btn btn-primary" value="Update Profile">
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer">
                                <a class="float-right btn btn-success text-decoration-none" href="social_dashboard.php">Home</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--main content-->

            </section>


            <!--setting side bar-->
            <?php include 'includes/setting.php';?>
            <!-- end setting side bar-->


        </div>

        <!-- footer-->
        <?php include "includes/footer.php";?>
        <!-- footer-->
    </div>
</div>
<!-- scripts-->
<?php include "includes/script.php";?>
<!-- end script-->
