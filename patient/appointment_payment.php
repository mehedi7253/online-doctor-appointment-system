<?php
/**
 * Created by PhpStorm.
 * User: mehedi
 * Date: 8/9/2020
 * Time: 4:27 PM
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
                                <h4>Appointment Payment</h4>
                                <?php
                                    $sql_getData = "SELECT * FROM patient, doctors, appointment WHERE 
                                                        doctors.doctor_id = appointment.doctor_id AND  
                                                        patient.patient_id = appointment.patient_id AND 
                                                        patient.patient_id = '$userdata[patient_id]'";
                                    $result      = mysqli_query($connect, $sql_getData);
                                ?>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table tab-pane" style="border: 1px solid lightsteelblue">
                                        <thead>
                                        <tr style="border: 1px solid lightsteelblue" class="text-center">
                                            <th style="border: 1px solid lightsteelblue">Serial</th>
                                            <th style="border: 1px solid lightsteelblue">Doctor Name</th>
                                            <th style="border: 1px solid lightsteelblue">Doctor Phone</th>
                                            <th style="border: 1px solid lightsteelblue">Appointment Date</th>
                                            <th style="border: 1px solid lightsteelblue">Appointment Fee</th>
                                            <th style="border: 1px solid lightsteelblue">Payment</th>
                                            <th style="border: 1px solid lightsteelblue">Invoice</th>

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
                                                <td style="border: 1px solid lightsteelblue"><?php echo $row['date'];?></td>
                                                <td style="border: 1px solid lightsteelblue"><?php echo $row['charge'];?></td>
                                                <td style="border: 1px solid lightsteelblue">
                                                    <?php
                                                        $sql_payment = "SELECT * FROM appointment_invoice WHERE appointment_id = '$row[appoinment_id]' AND patient_id = '$userdata[patient_id]'";
                                                        $res_payment = mysqli_query($connect, $sql_payment);

                                                        $data = mysqli_fetch_assoc($res_payment);

                                                        if ($data !=0){
                                                            echo '<span class="btn btn-success">paid</span>';
                                                        }else{
                                                            echo '<a href="payment_appointment.php?appointment_id='.$row['appoinment_id'].'" class="btn btn-primary">Pay Now</a>';
                                                        }
                                                    ?>
                                                </td>
                                                <td style="border: 1px solid lightsteelblue">
                                                    <?php
                                                        if ($data !=0){
                                                            echo '<a href="appointment_invoice.php?appointment_id='.$data['appointment_id'].'" class="btn btn-primary">View </a>';
                                                        }else{
                                                            echo '<span class="btn btn-danger">Complete Your Payment First</span>';
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
