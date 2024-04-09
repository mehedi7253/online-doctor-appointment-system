<?php
/**
 * Created by PhpStorm.
 * User: mehedi
 * Date: 8/9/2020
 * Time: 4:13 PM
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
                    <div class="col-md-12 col-sm-12 mb-5">
                        <div class="card">
                            <div class="card-header">
                                <h4>Withdraw Appointment</h4>
                                <?php
                                    $sql_getData = "SELECT * FROM patient, doctors, appointment WHERE 
                                                        doctors.doctor_id = appointment.doctor_id AND  
                                                        patient.patient_id = appointment.patient_id AND 
                                                        patient.patient_id = '$userdata[patient_id]' AND 
                                                        appointment.status = '0'";
                                    $result      = mysqli_query($connect, $sql_getData);
                                ?>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table tab-bordered">
                                        <thead>
                                            <tr style="border: 1px solid lightsteelblue">
                                                <th style="border: 1px solid lightsteelblue">Serial</th>
                                                <th style="border: 1px solid lightsteelblue">Doctor Name</th>
                                                <th style="border: 1px solid lightsteelblue">Doctor Phone</th>
                                                <th style="border: 1px solid lightsteelblue">Appointment Date</th>
                                                <th style="border: 1px solid lightsteelblue">Appointment Status</th>
                                                <th style="border: 1px solid lightsteelblue">Withdraw</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i = 1;
                                        while ($row = mysqli_fetch_assoc($result)){?>
                                            <tr class="text-center">
                                                <td style="border: 1px solid lightsteelblue"><?php echo $i++;?></td>
                                                <td style="border: 1px solid lightsteelblue" class="text-capitalize"><?php echo $row['first_name'] .' '. $row['last_name'];?></td>
                                                <td style="border: 1px solid lightsteelblue"><?php echo $row['phone'];?></td>
                                                <td style="border: 1px solid lightsteelblue"><?php echo $row['date'];;?></td>
                                                <td style="border: 1px solid lightsteelblue">
                                                    <?php
                                                    $process = $row['status'];
                                                    // echo $status;
                                                    if (($process) == '0'){?>
                                                        <button class="btn btn-danger">Pending</button>
                                                        <?php
                                                    }
                                                    if (($process) == '1'){?>
                                                        <button class="btn btn-info">Received</button>
                                                        <?php
                                                    }
                                                    if (($process) == '2'){?>
                                                        <button class="btn btn-success">Process Is Going On</button>
                                                        <?php
                                                    }
                                                    if (($process) == '3'){?>
                                                        <button class="btn btn-danger">Complete</button>
                                                        <?php
                                                    }
                                                    if (($process) == '4'){?>
                                                        <button class="btn btn-danger">Canceled</button>
                                                        <?php
                                                    }
                                                    ?>
                                                </td>
                                                <td style="border: 1px solid lightsteelblue">
                                                    <a href="withdraw_app.php?appointment_id=<?php echo $row['appoinment_id'];?>" onclick="return confirm('Are You Sure Withdraw Your Appointment Application...!!!')" class="btn btn-danger text-white">Withdraw</a>
                                                </td>

                                            </tr>
                                        <?php }?>
                                        </tbody>
                                    </table>
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
