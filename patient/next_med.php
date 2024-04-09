<?php
/**
 * Created by PhpStorm.
 * User: mehedi
 * Date: 8/17/2020
 * Time: 3:06 PM
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
                                <p class="mt-4 text-center text-white">Bkash Check Out</p>
                                <h4>
                                    <?php

                                    $sub_total = "SELECT price,quantity,SUM(quantity*price + 100) AS paybleAmount FROM medicine_invoice WHERE patient_id = '$userdata[patient_id]' AND med_invoice = '$med_invoice'";
                                    $re = mysqli_query($connect, $sub_total);

                                    $sub_totals = mysqli_fetch_assoc($re);

                                    $pay = $sub_totals['paybleAmount'];

                                    if (isset($_POST['btn'])){
                                        $invoce          = $_POST['med_invoice'];

                                        if ($invoce){

                                            $pay_ambulance    = "UPDATE payment_medicine SET total_price='$pay' WHERE med_invoice = $invoce";
                                            $result_ambulance = mysqli_query($connect, $pay_ambulance);

                                            echo "<span class='text-success'>Payment Successful</span>";
                                        }

                                    }
                                    if (isset($_POST['cancel'])){



                                        $cancel    = "DELETE FROM payment_medicine WHERE med_invoice = $med_invoice";
                                        $cance_res = mysqli_query($connect, $cancel);

                                        echo "<script>document.location.href='buy_medicine__payment_status.php'</script>";
                                    }

                                    ?>
                                    <?php

                                    ?>
                                </h4>
                                <div class="col-md-8 mx-auto">
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label class="text-white">Enter Amount</label>
                                            <input type="number" hidden name="med_invoice" value="<?php echo $data['med_invoice'];?>" class="form-control">
                                            <input type="text" name="total_price" disabled class="form-control" value="<?php echo $sub_totals['paybleAmount'];?>">
                                            <input type="text" hidden name="total_price" disabled class="form-control" value="<?php echo $sub_totals['paybleAmount'];?>">

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
