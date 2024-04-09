<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 8/10/2020
 * Time: 4:53 PM
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
                                <h4>Appointment List</h4>
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
                                            <th style="border: 1px solid lightsteelblue">Present Status</th>
                                            <th style="border: 1px solid lightsteelblue">Update Status</th>
                                            <th style="border: 1px solid lightsteelblue">Action</th>
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
                                                            <label class="text-danger">Pending</label>
                                                            <?php
                                                        }
                                                        if (($process) == '1'){?>
                                                            <label class="text-info">Recived</label>
                                                            <?php
                                                        }
                                                        if (($process) == '2'){?>
                                                            <label class="text-info">Process Is Going On</label>
                                                            <?php
                                                        }
                                                        if (($process) == '3'){?>
                                                            <label class="text-success">Complete</label>
                                                            <?php
                                                        }
                                                        if (($process) == '4'){?>
                                                            <label class="text-danger">Canceled</label>
                                                            <?php
                                                        }
                                                ?>
                                                </td>
                                                <td style="border: 1px solid lightsteelblue">
                                                    <form action="" method="post">
                                                        <?php
                                                            if (isset($_POST['up_sts'])){
                                                                $appoinment_id  = $_POST['appoinment_id'];
                                                                $status         = $_POST['status'];

                                                                $update = "UPDATE appointment SET status = '$status' WHERE appoinment_id = '$appoinment_id'";
                                                                $res_update = mysqli_query($connect, $update);

                                                                echo "<script>document.location.href='new_appointment.php'</script>";

                                                            }
                                                        ?>
                                                        <input name="appoinment_id" hidden value="<?php echo $row['appoinment_id'];?>">
                                                        <select class="form-control" name="status">
                                                            <option>-------Update Status-----</option>
                                                            <option value="0">Pending</option>
                                                            <option value="1">Received</option>
                                                            <option value="2">Process Going On</option>
                                                            <option value="3">Complete</option>
                                                            <option value="4">Canceled</option>
                                                        </select>

                                                </td>
                                                <td  style="border: 1px solid lightsteelblue">
                                                    <input type="submit" name="up_sts" value="Submit" class="btn btn-success">
                                                </td>
                                                </form>

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
