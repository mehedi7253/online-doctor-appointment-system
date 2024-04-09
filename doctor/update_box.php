<?php
/**
 * Created by PhpStorm.
 * User: mehedi
 * Date: 8/28/2020
 * Time: 3:28 PM
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
                                $sql_getData = "SELECT * FROM doctors, patient, appointment WHERE 
                                                    doctors.doctor_id = appointment.doctor_id AND  
                                                    patient.patient_id = appointment.patient_id AND 
                                                    doctors.doctor_id= '$userdata[doctor_id]'";
                                $result      = mysqli_query($connect, $sql_getData);
                                ?>
                                <div class="table-responsive">
                                    <table class="table tab-pane" style="border: 1px solid lightsteelblue">
                                        <thead>
                                        <tr style="border: 1px solid lightsteelblue" class="text-center">
                                            <th style="border: 1px solid lightsteelblue">Serial</th>
                                            <th style="border: 1px solid lightsteelblue">Patient Name</th>
                                            <th style="border: 1px solid lightsteelblue">Patient Phone</th>
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
                                                <td style="border: 1px solid lightsteelblue"><?php echo $row['date'];;?></td>
                                                <td style="border: 1px solid lightsteelblue">
                                                    <?php
                                                        $sql = "SELECT * FROM update_box WHERE appointment_id = '$row[appoinment_id]'";
                                                        $res = mysqli_query($connect, $sql);

                                                        $data = mysqli_fetch_assoc($res);

                                                        if ($data !=0){
                                                            echo '<a href="update_now.php?appoinment_id='.$row['appoinment_id'].'" class="text-decoration-none">Update Old Record</a>';
                                                        }else{
                                                            echo '<a href="insert_updatebox.php?appoinment_id='.$row['appoinment_id'].'" class="text-decoration-none">Add New Record</a>';
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
