<?php
/**
 * Created by PhpStorm.
 * User: mehedi
 * Date: 8/10/2020
 * Time: 11:10 AM
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
                    <div class="col-md-10 mx-auto mb-5">
                        <div class="card">
                            <?php
                            if (isset($_GET['process_id'])){
                                $process_id     = $_GET['process_id'];


                                $sql_process = "SELECT * FROM doctors, appointment WHERE
                                                        doctors.doctor_id = appointment.doctor_id AND 
                                                        appointment.appoinment_id = '$process_id'";

                                $result      = mysqli_query($connect, $sql_process);

                                $process_data = mysqli_fetch_assoc($result);


                                $sql_process2 = "SELECT * FROM patient, appointment WHERE
                                                        patient.patient_id = appointment.patient_id AND 
                                                        appointment.appoinment_id = '$process_id'";

                                $result2     = mysqli_query($connect, $sql_process2);

                                $process_data2 = mysqli_fetch_assoc($result2);


                            }
                            ?>
                            <div class="card-header">
                                <h3 class="text-center">Appointment Status</h3>
                            </div>
                            <div class="card-body">
                                <p class="font-weight-bold">Appointment ID: #<?php echo $process_data['appoinment_id'];?> <span class="font-weight-bold float-right">Appointment Date: <?php echo $process_data['date'];?></span></p>
                                <div class="table-responsive">
                                    <div class="table">
                                        <tr>
                                            <td>
                                                <?php
                                                $status = $process_data['status'];
                                                // echo $status;

                                                if (($status) == '0'){?>
                                                    <button class="btn btn-danger col-6">Pending</button>
                                                    <?php
                                                }
                                                if (($status) == '1'){?>
                                                    <button class="btn btn-success col-6">Received</button>
                                                    <?php
                                                }
                                                if (($status) == '2'){?>
                                                    <button class="btn btn-success col-6">Received</button>
                                                    <?php
                                                }
                                                if (($status) == '3'){?>
                                                    <button class="btn btn-success col-6">Received</button>
                                                    <?php
                                                }
                                                if (($status) == '4'){?>
                                                    <button class="btn btn-danger col-6">Canceled</button>
                                                    <?php
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                $process = $process_data['status'];
                                                // echo $status;
                                                if (($process) == '0'){?>
                                                    <button class="btn btn-danger col-5">Pending</button>
                                                    <?php
                                                }
                                                if (($process) == '1'){?>
                                                    <button class="btn btn-info col-5">Process Is Going On</button>
                                                    <?php
                                                }
                                                if (($process) == '3'){?>
                                                    <button class="btn btn-success col-5">Complete</button>
                                                    <?php
                                                }
                                                if (($process) == '4'){?>
                                                    <button class="btn btn-danger col-5">Canceled</button>
                                                    <?php
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    </div>
                                </div>

                                <h3 class="p-3">Doctor Information</h3>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                    </div>
                                    <input type="text" disabled value="<?php echo $process_data['first_name'];?> <?php echo $process_data['last_name'];?>" class="form-control">
                                </div>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-mail-bulk"></i> </span>
                                    </div>
                                    <input type="email"  disabled value="<?php echo $process_data['email'];?>" class="form-control">
                                </div>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                                    </div>
                                    <input type="email" disabled value="<?php echo $process_data['phone'];?>" class="form-control">
                                </div>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-dollar-sign"></i> </span>
                                    </div>
                                    <input type="email"  disabled value="<?php echo $process_data['charge'];?>" class="form-control">
                                </div>
                                <div class="border"></div>
                                <h3 class="p-3">Patient Information</h3>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                    </div>
                                    <input type="text" disabled value="<?php echo $process_data2['first_name'];?> <?php echo $process_data2['last_name'];?>" class="form-control">
                                </div>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-mail-bulk"></i> </span>
                                    </div>
                                    <input type="email"  disabled value="<?php echo $process_data2['email'];?>" class="form-control">
                                </div>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                                    </div>
                                    <input type="email" disabled value="<?php echo $process_data2['phone'];?>" class="form-control">
                                </div>


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

