<?php
/**
 * Created by PhpStorm.
 * User: mehedi
 * Date: 8/17/2020
 * Time: 12:07 PM
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
                                <h4>
                                    <?php
                                    if (isset($_POST['btn'])){
                                        $ambulance_invoice = $_POST['ambulance_invoice'];
                                        $total_pay        = $_POST['total_pay'];

                                        if ($ambulance_invoice && $total_pay){
                                            $create = @date('Y-m-d H:i:s');
                                            $pay_ambulance    = "UPDATE ambulance_invoice SET total_pay = '$total_pay', payment_date = '$create', payment_sts = '1' WHERE ambulance_invoice = $invoice_id";
                                            $result_ambulance = mysqli_query($connect, $pay_ambulance);

                                            echo "<span class='text-success'>Payment Successful</span>";
                                        }else{
                                            echo "<span class='text-dark'>Payment Failed</span>";
                                        }

                                    }
                                    if (isset($_POST['cancel'])){

                                        $cancel    = "UPDATE ambulance_invoice SET total_pay = '0', payment_date = '0', payment_by = '0' WHERE ambulance_invoice = $invoice_id";
                                        $cance_res = mysqli_query($connect, $cancel);

                                        echo "<script>document.location.href='payment_ambulance.php'</script>";
                                    }

                                    ?>
                                </h4>
                                <div class="col-md-8 mx-auto">
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label class="text-white">Enter Amount</label>
                                            <input type="number" hidden name="ambulance_invoice" value="<?php echo $data['ambulance_invoice'];?>" class="form-control">
                                            <input type="text" name="total_pay" hidden value="<?php echo $data['payble'];?>" class="form-control">
                                            <input type="text" disabled value="<?php echo $data['payble'];?>" class="form-control">
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
