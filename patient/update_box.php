<?php
/**
 * Created by PhpStorm.
 * User: mehedi
 * Date: 8/28/2020
 * Time: 10:22 PM
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
                                <h4>Check And Update Patient Current Status</h4>
                            </div>
                            <div class="card-body">
                                <?php
                                $sql_getData = "SELECT * FROM doctors, update_box WHERE doctors.doctor_id = update_box.doctor_id AND update_box.patinet_id = '$userdata[patient_id]'";
                                $result      = mysqli_query($connect, $sql_getData);
                                ?>
                                <div class="table-responsive">
                                    <table class="table tab-pane" style="border: 1px solid lightsteelblue">
                                        <thead>
                                        <tr style="border: 1px solid lightsteelblue" class="text-center">
                                            <th style="border: 1px solid lightsteelblue">Serial</th>
                                            <th style="border: 1px solid lightsteelblue">Doctor Name</th>
                                            <th style="border: 1px solid lightsteelblue">Doctor Phone</th>
                                            <th style="border: 1px solid lightsteelblue">Appointment Date</th>
                                            <th style="border: 1px solid lightsteelblue">Update Record</th>
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
                                                <td style="border: 1px solid lightsteelblue"><?php echo date('D-M-Y', strtotime($row['date']))?></td>
                                                <td style="border: 1px solid lightsteelblue">
                                                    <a href="view_update_box.php?appointment_id=<?php echo $row['appointment_id'];?>" class="text-decoration-none">View Now</a>
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
