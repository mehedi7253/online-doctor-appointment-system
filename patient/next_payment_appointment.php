<?php
/**
 * Created by PhpStorm.
 * User: mehedi
 * Date: 8/17/2020
 * Time: 11:09 PM
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
                                <p class="mt-4 text-center text-white">Bkash Check Out</p>
                                <h4>
                                    <?php
                                        if (isset($_POST['btn'])){
                                            $appointment_id  = $_POST['appointment_id'];
                                            $payable         = $_POST['payable'];

                                            if ($appointment_id && $payable){

                                                $create = @date('Y-m-d H:i:s');
                                                $pay_ambulance    = "UPDATE appointment_invoice SET payable='$payable', payment_date = '$create' WHERE appointment_id  = $appointment_id";
                                                $result_ambulance = mysqli_query($connect, $pay_ambulance);

                                                echo "<span class='text-success'>Payment Successful</span>";
                                            }

                                        }
                                        if (isset($_POST['cancel'])){
                                            $cancel    = "DELETE FROM appointment_invoice WHERE appointment_id = $appointment_id";
                                            $cance_res = mysqli_query($connect, $cancel);

                                            echo "<script>document.location.href='appointment_payment.php'</script>";
                                        }

                                    ?>
                                    <?php

                                    ?>
                                </h4>
                                <div class="col-md-8 mx-auto">
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label class="text-white">Enter Amount</label>
                                            <input type="number" hidden  name="appointment_id" value="<?php echo $data['appoinment_id'];?>">
                                            <input type="text"  name="payable" hidden class="form-control" value="<?php echo $data['charge'];?>">
                                            <input type="text"   disabled class="form-control" value="<?php echo $data['charge'];?>">

                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox"> <span class="text-white ml-2">I Agree To The Term And Condition</span>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn col-md-5 p-1" value="Submit" name="btn" style="background-color: #B6195E; color: white">
                                            <input type="submit" class="btn col-md-5 p-1" value="Cancel" name="cancel" style="background-color: #B6195E; color: white">
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
