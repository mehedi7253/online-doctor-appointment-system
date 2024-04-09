<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 8/9/2020
 * Time: 4:51 PM
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
                <!-- status-->
                <!-- end status-->

                <!--main content-->
                <div class="row">
                    <div class="col-md-10 mx-auto  mb-5">
                        <div class="card">
                            <div class="card-header">
                                <h4>Confirm Appointment</h4>
                            </div>
                            <div class="card-body">
                               <h3>
                                <?php
                                    if (isset($_GET['book'])){
                                        $id = $_GET['book'];

                                        $query = "SELECT * FROM doctors WHERE doctor_id = $id";

                                        $r = mysqli_query($connect, $query);
                                        $data = mysqli_fetch_assoc($r);
                                    }

                                if (isset($_POST['confirm_book'])){
                                    $doctor_id  = $_POST['doctor_id'];
                                    $patient_id = $_POST['patient_id'];
                                    $charge     = $_POST['charge'];

                                    if ($doctor_id && $patient_id && $charge){
                                        $create = @date('Y-m-d H:i:s');

                                        $conform_book = "INSERT INTO appointment (doctor_id, patient_id, charge, status, date) VALUES ('$doctor_id', '$patient_id', '$charge', '0', '$create')";
                                        $confrim_res  = mysqli_query($connect, $conform_book);


                                        echo "<span class='text-success font-weight-bold'>Appointment successfully..Doctor Will Contact With Soon</span><br/>";

                                    }else{
                                        echo "<span class='text-danger font-weight-bold'>Appointment Failed..!!</span><br/>";
                                    }
                                }
                                ?>
                               </h3>
                                <form action="" method="post">
                                    <h3 class="p-3">Doctor Information</h3>
                                    <div class="form-group">
                                        <input type="text"  hidden name="doctor_id" class="form-control" value="<?php echo $data['doctor_id'];?>">
                                        <input type="text" hidden name="patient_id" class="form-control" value="<?php echo $userdata['patient_id'];?>">
                                        <input type="text" hidden name="charge" class="form-control" value="<?php echo $data['charge'];?>">
                                    </div>
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                        </div>
                                        <input type="text" disabled value="<?php echo $data['first_name'];?> <?php echo $data['last_name'];?>" class="form-control">
                                    </div>
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-mail-bulk"></i> </span>
                                        </div>
                                        <input type="email"  disabled value="<?php echo $data['email'];?>" class="form-control">
                                    </div>
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                                        </div>
                                        <input type="email" disabled value="<?php echo $data['phone'];?>" class="form-control">
                                    </div>
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-dollar-sign"></i> </span>
                                        </div>
                                        <input type="email"  disabled value="<?php echo $data['charge'];?>" class="form-control">
                                    </div>
                                    <div class="border"></div>
                                    <h3 class="p-3">Patient Information</h3>
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                        </div>
                                        <input type="text" disabled value="<?php echo $userdata['first_name'];?> <?php echo $userdata['last_name'];?>" class="form-control">
                                    </div>
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-mail-bulk"></i> </span>
                                        </div>
                                        <input type="email"  disabled value="<?php echo $userdata['email'];?>" class="form-control">
                                    </div>
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                                        </div>
                                        <input type="email" disabled value="<?php echo $userdata['phone'];?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label></label>
                                        <input type="submit" name="confirm_book" class="btn btn-primary" value="Confirm Appointment">
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer">

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
