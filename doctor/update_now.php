<?php
/**
 * Created by PhpStorm.
 * User: mehedi
 * Date: 8/28/2020
 * Time: 9:19 PM
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
                                <h4>Update Old patient Record</h4>
                                <?php
                                    if (isset($_GET['appoinment_id'])){
                                        $appoinment_id = $_GET['appoinment_id'];

                                        $sql_one = "SELECT * FROM patient, appointment WHERE
                                                        patient.patient_id = appointment.patient_id AND 
                                                        appointment.appoinment_id = '$appoinment_id'";
                                        $res_one = mysqli_query($connect, $sql_one);

                                        $data = mysqli_fetch_assoc($res_one);

                                        $sql_tow = "SELECT * FROM update_box WHERE appointment_id = '$appoinment_id'";
                                        $res_tow = mysqli_query($connect, $sql_tow);

                                        $data_tow = mysqli_fetch_assoc($res_tow);
                                    }


                                ?>
                            </div>
                            <div class="card-body">
                                <h4 class="ml-2">
                                    <?php
                                    if (isset($_POST['btn'])){
                                        $appointment     = $_POST['appointment_id'];
                                        $current_weight  = $_POST['current_weight'];
                                        $mental_support  = $_POST['mental_support'];

                                        if ($current_weight == ''){
                                            echo "<span class='text-danger'>Enter Patient Current Weight</span><br/>";
                                        }
                                        if ($mental_support == ''){
                                            echo "<span class='text-danger'>Enter Mental Support For Patient</span><br/>";
                                        }
                                        if ($current_weight && $mental_support){
                                            $create = @date('Y-m-d H:i:s');
                                            $sql_update = "UPDATE update_box SET
                                                          current_weight = '$current_weight',
                                                          mental_support = '$mental_support'
                                                          WHERE appointment_id = '$appoinment_id'";
                                            $res_record     = mysqli_query($connect, $sql_update);

                                            echo "<span class='text-success'>Patient Record Update Successful</span><br/>";
                                            echo "<script>document.location.href='update_now.php?appoinment_id=$appoinment_id'</script>";
                                        }else{
                                            echo "<span class='text-danger'>Patient Record Failed..!!</span><br/>";
                                            echo "<script>document.location.href='update_now.php?appoinment_id=$appoinment_id'</script>";
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
                                        <input type="number" disabled name="patient_age" class="form-control" value="<?php echo $data_tow['patient_age'];?>">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12 float-left">
                                        <label>Patient Previous Weight</label>
                                        <input type="text" disabled name="prev_weight" class="form-control" value="<?php echo $data_tow['prev_weight'];?>">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12 float-left">
                                        <label>Patient Current Weight</label>
                                        <input type="text" name="current_weight" class="form-control" value="<?php echo $data_tow['current_weight'];?>">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12 float-left">
                                        <label>Mental Support</label>
                                        <textarea name="mental_support" class="form-control" placeholder="Enter Mental Support"><?php echo $data_tow['mental_support'];?></textarea>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12 float-left">
                                        <label class="text-success" style="font-size: 15px">Patient Weight gain</label>
                                        <?php
                                            if ($data_tow['prev_weight'] <  $data_tow['current_weight']){
                                                $gain = $data_tow['current_weight'] - $data_tow['prev_weight'];

                                                echo "<input class='form-control' disabled value='$gain'>";
                                            }else{
                                                echo "<input class='form-control' disabled value='No Weight Gain'>";
                                            }

                                        ?>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12 float-left">
                                        <label class="text-danger" style="font-size: 15px">Patient Weight Loss</label>
                                        <?php
                                            if ($data_tow['prev_weight'] > $data_tow['current_weight']){
                                                $loss = $data_tow['prev_weight'] - $data_tow['current_weight'];

                                                echo "<input class='form-control' disabled value='$loss'>";
                                            }else{
                                                echo "<input class='form-control' disabled value='No Weight Loss'>";
                                            }
                                        ?>
                                    </div>

                                    <div class="form-group col-md-6 col-sm-12 float-left">
                                        <label></label>
                                        <input type="submit" name="btn" class="btn btn-primary btn-block" value="Update Data">
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
