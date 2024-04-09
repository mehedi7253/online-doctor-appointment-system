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
                                if (isset($_GET['invoice_id'])){
                                    $invoice_id = $_GET['invoice_id'];

                                    $sql = "SELECT * FROM ambulance_invoice WHERE ambulance_invoice = $invoice_id";
                                    $res = mysqli_query($connect, $sql);

                                    $data = mysqli_fetch_assoc($res);
                                }
                            ?>
                            <div class="card-header">
                                <img src="../images/payment_list_01.png" class="card-img-top" style="height: 100px; width: 100%">
                            </div>
                            <div class="card-body" style="background-color: #E3106D;">
                                <p class="mt-4 text-center text-white">Bkash Check Out</p>
                                <div class="col-md-8 mx-auto">
                                    <form action="" method="post">
                                        <?php
                                             if (isset($_POST['btn_next'])){
                                                 $ambulance_invoice = $_POST['ambulance_invoice'];
                                                 $payment_by        = $_POST['payment_by'];

                                                 if ($ambulance_invoice && $payment_by){
                                                     $pay_ambulance    = "UPDATE ambulance_invoice SET payment_by = '$payment_by' WHERE ambulance_invoice = $invoice_id";
                                                     $result_ambulance = mysqli_query($connect, $pay_ambulance);

                                                     echo "<script>document.location.href='next.php?invoice_id=$invoice_id'</script>";
                                                 }

                                             }

                                        ?>
                                        <div class="form-group">
                                            <label class="text-white">Enter Bkash Number</label>
                                            <input type="number" hidden name="ambulance_invoice" value="<?php echo $data['ambulance_invoice'];?>" class="form-control">
                                            <input type="number" name="payment_by" placeholder="eg: 01XXXXXXXXX" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox"> <span class="text-white ml-2">I Agree To The Term And Condition</span>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn col-md-5 p-1" value="Proceed" name="btn_next" style="background-color: #B6195E; color: white">
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
