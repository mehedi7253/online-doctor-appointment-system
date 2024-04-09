<?php
/**
 * Created by PhpStorm.
 * User: mehedi
 * Date: 8/17/2020
 * Time: 11:40 AM
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
                            if (isset($_GET['med_invoice'])){
                                $med_invoice = $_GET['med_invoice'];

                                $sql = "SELECT * FROM medicine_invoice WHERE patient_id = '$userdata[patient_id]' AND med_invoice = '$med_invoice'";
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
                                    $patient_id      = $_POST['patient_id'];
                                    $shiping_address = $_POST['shipping_address'];
                                    $bkas_number     = $_POST['bkas_number'];
                                    $invoce          = $_POST['med_invoice'];

                                    if ($patient_id && $shiping_address && $bkas_number) {
                                        $create = @date('Y-m-d H:i:s');
                                        $pay = "INSERT INTO payment_medicine (patient_id, shipping_address, payment_status, date, bkas_number, med_invoice) VALUES ('$patient_id', '$shiping_address', '1','$create', '$bkas_number', '$invoce')";
                                        $result = mysqli_query($connect, $pay);

                                        echo "<script>document.location.href='next_med.php?med_invoice=$med_invoice'</script>";
                                    }
                                }
                                ?>
                                <p class="mt-4 text-center text-white">Bkash Check Out</p>
                                <div class="col-md-8 mx-auto">
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <input type="number" hidden name="med_invoice" value="<?php echo $data['med_invoice'];?>">
                                            <input type="number" hidden name="patient_id" value="<?php echo $userdata['patient_id'];?>">
                                            <input type="text" hidden name="shipping_address" value="<?php echo $data['shiping_address'];?>">

                                            <label class="text-white">Enter Bkash Number</label>
                                            <input type="number" name="bkas_number" placeholder="eg: 01XXXXXXXXX" class="form-control">

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