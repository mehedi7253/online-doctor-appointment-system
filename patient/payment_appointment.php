<?php
/**
 * Created by PhpStorm.
 * User: mehedi
 * Date: 8/17/2020
 * Time: 11:00 PM
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
                    <div class="col-md-8 mx-auto mb-5">
                        <div class="card">
                            <?php
                            if (isset($_GET['appointment_id'])){
                                $appointment_id = $_GET['appointment_id'];

                                $sql = "SELECT * FROM appointment WHERE appoinment_id = $appointment_id";
                                $res = mysqli_query($connect, $sql);

                                $data = mysqli_fetch_assoc($res);
                            }
                            ?>
                            <div class="card-header">
                                <img src="../images/payment_list_01.png" class="card-img-top" style="height: 100px; width: 100%">
                            </div>
                            <div class="card-body" style="background-color: #E3106D;">
                                <?php
                                if (isset($_POST['btn_pay'])){
                                    $appointment_id     = $_POST['appointment_id'];
                                    $patient_id         = $_POST['patient_id'];
                                    $doctor_id          = $_POST['doctor_id'];
                                    $bkash_number       = $_POST['bkash_number'];

                                    if ($patient_id && $appointment_id && $doctor_id) {
                                        $pay = "INSERT INTO appointment_invoice (appointment_id, patient_id, doctor_id, bkash_number) VALUES ('$appointment_id', '$patient_id', '$doctor_id', '$bkash_number')";
                                        $result = mysqli_query($connect, $pay);

                                        echo "<script>document.location.href='next_payment_appointment.php?appointment_id=$appointment_id'</script>";
                                    }
                                }
                                ?>
                                <p class="mt-4 text-center text-white">Bkash Check Out</p>
                                <div class="col-md-8 mx-auto">
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <input type="number" hidden  name="appointment_id" value="<?php echo $data['appoinment_id'];?>">
                                            <input type="number" hidden  name="patient_id" value="<?php echo $data['patient_id'];?>">
                                            <input type="number" hidden  name="doctor_id" value="<?php echo $data['doctor_id'];?>">

                                            <label class="text-white">Enter Bkash Number</label>
                                            <input type="number" name="bkash_number" placeholder="eg: 01XXXXXXXXX" class="form-control">

                                        </div>

                                        <div class="form-group">
                                            <input type="checkbox"> <span class="text-white ml-2">I Agree To The Term And Condition</span>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn col-md-5 p-1" value="Proceed" name="btn_pay" style="background-color: #B6195E; color: white">
                                            <a href="payment_ambulance.php" type="reset" class="btn col-md-5 p-1" style="background-color: #B6195E; color: white">Cancel</a>
                                        </div>
                                    </form>
                                </div>
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