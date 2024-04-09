<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 8/16/2020
 * Time: 12:51 PM
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
                                <h4>Withdraw Ambulance Booking </h4>
                                <?php
                                    $sql_getData = "SELECT * FROM ambulance_service, patient, book_ambulance WHERE 
                                                    ambulance_service.ambulance_service_id = book_ambulance.ambulance_service_id AND
                                                    patient.patient_id = book_ambulance.patient_id AND
                                                    book_ambulance.patient_id = '$userdata[patient_id]'";
                                    $result      = mysqli_query($connect, $sql_getData);
                                ?>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table tab-bordered">
                                        <thead>
                                        <tr style="border: 1px solid lightsteelblue">
                                            <th style="border: 1px solid lightsteelblue">Serial</th>
                                            <th style="border: 1px solid lightsteelblue">Driver Name</th>
                                            <th style="border: 1px solid lightsteelblue">Driver Phone</th>
                                            <th style="border: 1px solid lightsteelblue">Car Number</th>
                                            <th style="border: 1px solid lightsteelblue">Booking Date</th>
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
                                                <td style="border: 1px solid lightsteelblue" class="text-capitalize"><?php echo $row['driver_name'];?></td>
                                                <td style="border: 1px solid lightsteelblue"><?php echo $row['driver_phone'];?></td>
                                                <td style="border: 1px solid lightsteelblue"><?php echo $row['car_number'];;?></td>
                                                <td style="border: 1px solid lightsteelblue"><?php echo $row['booking_date'];;?></td>
                                                <td style="border: 1px solid lightsteelblue">
                                                    <?php
                                                    $process = $row['status'];
                                                    if (($process) == '0'){?>
                                                        <button class="btn btn-danger">Pending</button>
                                                        <?php
                                                    }
                                                    if (($process) == '1'){?>
                                                        <button class="btn btn-info">Received</button>
                                                        <?php
                                                    }
                                                    if (($process) == '2'){?>
                                                        <button class="btn btn-success text-white">Complete</button>
                                                        <?php
                                                    }
                                                    if (($process) == '3'){?>
                                                        <button class="btn btn-danger">Cancel</button>
                                                        <?php
                                                    }
                                                    ?>
                                                </td>
                                                <td style="border: 1px solid lightsteelblue">
                                                    <?php
                                                    $process = $row['status'];
                                                    if (($process) == '0'){?>
                                                        <a href="withdraw_ambulance_app.php?ambulance_id=<?php echo $row['book_ambulance_id'];?>" onclick="return confirm('Are You Sure Withdraw Your Ambulance Service Application...!!!')" class="btn btn-danger text-white">Withdraw</a>
                                                        <?php
                                                    }
                                                    if (($process) == '1'){?>
                                                        <button class="btn btn-danger" disabled>Withdraw</button>
                                                        <?php
                                                    }
                                                    if (($process) == '2'){?>
                                                        <button class="btn btn-danger" disabled>Withdraw</button>
                                                        <?php
                                                    }
                                                    if (($process) == '3'){?>
                                                        <button class="btn btn-danger" disabled>Withdraw</button>
                                                        <?php
                                                    }
                                                    ?>
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
