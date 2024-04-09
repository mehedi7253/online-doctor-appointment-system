<?php
/**
 * Created by PhpStorm.
 * User: mehedi
 * Date: 8/28/2020
 * Time: 3:51 PM
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
                                <h4>Add New Record</h4>
                                <?php
                                    if (isset($_GET['appoinment_id'])){
                                        $appoinment_id = $_GET['appoinment_id'];

                                        $sql_one = "SELECT * FROM patient, appointment WHERE
                                                    patient.patient_id = appointment.patient_id AND 
                                                    appointment.appoinment_id = '$appoinment_id'";
                                        $res_one = mysqli_query($connect, $sql_one);

                                        $data = mysqli_fetch_assoc($res_one);
                                    }
                                ?>
                            </div>
                            <div class="card-body">
                                <h4 class="ml-2">
                                    <?php
                                    if (isset($_POST['btn'])){
                                        $patient_id      = $_POST['patinet_id'];
                                        $doctor_id       = $_POST['doctor_id'];
                                        $appointment     = $_POST['appointment_id'];
                                        $age             = $_POST['patient_age'];
                                        $current_weight  = $_POST['current_weight'];
                                        $prev_weight     = $_POST['prev_weight'];
                                        $mental_support  = $_POST['mental_support'];

                                        if ($age == ''){
                                            echo "<span class='text-danger'>Enter Patient Age</span><br/>";
                                        }
                                        if ($current_weight == ''){
                                            echo "<span class='text-danger'>Enter Patient Current Weight</span><br/>";
                                        }
                                        if ($prev_weight == ''){
                                            echo "<span class='text-danger'>Enter Patient Previous Weight</span><br/>";
                                        }
                                        if ($mental_support == ''){
                                            echo "<span class='text-danger'>Enter Mental Support For Patient</span><br/>";
                                        }
                                        if ($patient_id && $doctor_id && $appointment && $age && $current_weight && $prev_weight && $mental_support){
                                            $create = @date('Y-m-d H:i:s');
                                            $sql_add_record = "INSERT INTO update_box (patinet_id, doctor_id, appointment_id, patient_age, current_weight, prev_weight, mental_support, date) VALUES ('$patient_id', '$doctor_id', '$appointment', '$age', '$current_weight', '$prev_weight', '$mental_support', '$create')";
                                            $res_record     = mysqli_query($connect, $sql_add_record);

                                            echo "<span class='text-success'>Patient Record Successful</span><br/>";
                                        }else{
                                            echo "<span class='text-danger'>Patient Record Failed..!!</span><br/>";
                                        }

                                    }

                                    ?>
                                </h4>
                                <form action="" method="post">
                                    <div class="form-group col-md-4 col-sm-12 float-left">
                                        <label>Patient Name:</label>
                                        <input type="text" hidden name="patinet_id" value="<?php echo $data['patient_id'];?>">
                                        <input type="text" hidden name="doctor_id" value="<?php echo $data['doctor_id'];?>">
                                        <input type="text" hidden name="appointment_id" value="<?php echo $data['appoinment_id'];?>">

                                        <input disabled class="form-control text-capitalize" value="<?php echo $data['first_name'] . ' '. $data['last_name'];?>">
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12 float-left">
                                        <label>Appointment Date:</label>
                                        <input disabled class="form-control text-capitalize" value="<?php echo date('D-M-Y', strtotime($data['date']))?>">
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12 float-left">
                                        <label>Appointment Serial ID:</label>
                                        <input disabled class="form-control text-capitalize" value="<?php echo $data['appoinment_id'];?>">
                                    </div>

                                    <h4 class="text-capitalize border-bottom p-2">Add New Record For <span class="text-info"> "<?php echo $data['first_name'] . ' '. $data['last_name'];?>"</span></h4>

                                    <div class="form-group col-md-6 col-sm-12 float-left">
                                        <label>Patient Age</label>
                                        <input type="text" name="patient_age" class="form-control" placeholder="Enter patient Age">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12 float-left">
                                        <label>Patient Current Weight</label>
                                        <input type="text" name="current_weight" class="form-control" placeholder="Enter patient current weight">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12 float-left">
                                        <label>Patient Previous Weight</label>
                                        <input type="text" name="prev_weight" class="form-control" placeholder="Enter patient Previous Weight">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12 float-left">
                                        <label>Mental Support</label>
                                        <textarea name="mental_support" class="form-control" placeholder="Enter Mental Support"></textarea>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12 float-left">
                                        <label class="text-success">Patient Weight gain</label>
                                        <input type="text" disabled class="form-control" value="">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12 float-left">
                                        <label class="text-danger">Patient Weight Loss</label>
                                        <input type="text" disabled  class="form-control" value="">
                                    </div>

                                    <div class="form-group col-md-6 col-sm-12 float-left">
                                        <label></label>
                                        <input type="submit" name="btn" class="btn btn-primary btn-block" value="Submit Data">
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
