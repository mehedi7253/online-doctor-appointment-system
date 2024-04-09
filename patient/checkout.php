<?php
/**
 * Created by PhpStorm.
 * User: mehedi
 * Date: 8/11/2020
 * Time: 6:36 PM
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
                                <h4>Medicine Check out</h4>
                            </div>
                            <div class="card-body">
                                <h3 class="text-success">
                                    <?php
                                    $sql = "SELECT * from patient, medicine, medicine_invoice WHERE 
                                            patient.patient_id = medicine_invoice.patient_id AND
                                            medicine.medecine_id = medicine_invoice.medicine_id AND
                                            patient.patient_id = '$userdata[patient_id]' AND
                                            medicine_invoice.status ='0'";
                                    $res = mysqli_query($connect, $sql);

                                    if (isset($_POST['btn'])) {
                                        $shiping_address = $_POST['shiping_address'];
                                        $note           = $_POST['note'];
                                        $med_invoice    = $_POST['med_invoice'];

                                        $invoice = (rand(10,1000000));

                                        $update = "UPDATE medicine_invoice SET shiping_address = '$shiping_address', note = '$note', med_invoice = '$invoice', status ='1' WHERE patient_id = '$userdata[patient_id]' AND status = 0";
                                        $res_up = mysqli_query($connect, $update);
                                        echo 'Order Placed successfully..Pay Your Payment Within 24 Hours';

                                    }

                                    ?>
                                </h3>
                                <form action="" method="post">
                                    <div class="form-group col-md-6 col-sm-12 float-left">
                                        <label>Name: </label>
                                        <input type="text" class="form-control" hidden name="med_invoice">
                                        <input type="text" disabled class="form-control" value="<?php echo $userdata['first_name']. ' '.$userdata['last_name'];?>">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12 float-left">
                                        <label>Email: </label>
                                        <input type="text" disabled class="form-control" value="<?php echo $userdata['email'];?>">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12 float-left">
                                        <label>Phone: </label>
                                        <input type="text" disabled class="form-control" value="<?php echo $userdata['phone'];?>">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12 float-left">
                                        <label>Address: </label>
                                        <input type="text" disabled class="form-control"  value="<?php echo $userdata['address'];?>">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12 float-left">
                                        <label>City: </label>
                                        <input type="text" disabled class="form-control" value="<?php echo $userdata['city'];?>">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12 float-left">
                                        <label>Post/Zip: </label>
                                        <input type="text" disabled class="form-control" value="<?php echo $userdata['postal'];?>">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12 float-left">
                                        <label>Shiping Address: </label>
                                        <textarea type="text" class="form-control" placeholder="Enter Full Address" name="shiping_address"><?php echo $userdata['address'].', '.$userdata['city'].', '.$userdata['postal'];?></textarea>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12 float-left">
                                        <label>Order Note:</label><sup class="text-danger"> Not Necessary</sup>
                                        <textarea class="form-control" placeholder="Enter Order Note If Have" name="note"></textarea>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12 float-left">
                                        <label>Total Price: </label>
                                        <?php
                                            $sub_total = "SELECT price,quantity,SUM(quantity*price + 100) AS paybleAmount FROM medicine_invoice WHERE patient_id = $userdata[patient_id] AND status = 0;";
                                            $re = mysqli_query($connect, $sub_total);

                                            $sub_totals = mysqli_fetch_assoc($re);

                                            if ($sub_total){
                                                if ($sub_total !== 0) {

                                                    $payable =  number_format($sub_totals['paybleAmount'], 2);

                                                    echo "<input  class='form-control' disabled value='$payable T.K [Include 100 T.K & It is Delivery Charge]'>";


                                                }else{
                                                    echo "<input class='form-control' value='0.00 T.K'>";
                                                }
                                            }
                                        ?>

                                    </div>
                                    <div class="form-group col-md-6 col-sm-12 float-left">
                                        <label></label>
                                        <input type="submit" name="btn" class="btn btn-primary form-control" value="Submit">
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
