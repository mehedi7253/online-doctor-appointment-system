<?php
/**
 * Created by PhpStorm.
 * User: mehedi
 * Date: 9/4/2020
 * Time: 4:32 PM
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
                                <h4>Pending List</h4>
                                <?php
                                    $sql = "SELECT patient.patient_id, doctors.doctor_id AS d_id, patient.first_name AS p_name,  patient.last_name AS p_lname, patient.email AS p_email,  patient.phone AS p_phone, doctors.first_name AS d_fname, doctors.last_name AS d_lname, doctors.email AS d_email,  doctors.phone AS d_phone, appointment.date AS booking_date FROM patient, doctors, appointment WHERE
                                           appointment.patient_id = patient.patient_id AND 
                                           appointment.doctor_id = doctors.doctor_id AND 
                                            appointment.status = '0'";
                                    $res = mysqli_query($connect, $sql);
                                ?>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th>Serial</th>
                                                <th>Patient Name</th>
                                                <th>Patient Phone</th>
                                                <th>Patient Email</th>
                                                <th>Booking Date</th>
                                                <th>Doctor Name</th>
                                                <th>Doctor Phone</th>
                                                <th>Doctor Email</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $i = 1;
                                            while ($row = mysqli_fetch_assoc($res)){?>
                                            <tr>
                                                <td><?php echo $i++;?></td>
                                                <td class="text-capitalize"><?php echo $row['p_name']. ' '.$row['p_lname'];?></td>
                                                <td><?php echo $row['p_phone'];?></td>
                                                <td><?php echo $row['p_email'];?></td>
                                                <td><?php echo $row['booking_date'];?></td>
                                                <td class="text-capitalize"><?php echo $row['d_fname']. ' '.$row['d_lname'];?></td>
                                                <td><?php echo $row['d_phone'];?></td>
                                                <td><?php echo $row['d_email'];?></td>
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
