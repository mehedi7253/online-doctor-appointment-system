<?php
/**
 * Created by PhpStorm.
 * User: mehedi
 * Date: 8/14/2020
 * Time: 8:27 PM
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
                            <div class="card-header" >
                                <h4>Your Invoice</h4>
                                <?php
                                    if (isset($_GET['invoice_id'])){
                                        $invoice = $_GET['invoice_id'];
//
                                        $sql1 = "SELECT * FROM payment_medicine WHERE med_invoice = '$invoice' AND patient_id = '$userdata[patient_id]'";
                                        $res1 = mysqli_query($connect, $sql1);
                                        $data1 = mysqli_fetch_assoc($res1);
//

                                    }
                                ?>
                            </div>
                            <div class="card-body" id="mainFrame">
                                <div class="col-md-12">
                                    <div class="invoice-title">
                                        <div class="invoice-number">Order #<?php echo 'MED_'.$data1['med_invoice'];?></div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <address>
                                                <strong>Billed To:</strong><br>
                                                <span class="text-capitalize"><?php echo $userdata['first_name']. ' '.$userdata['last_name'];?></span><br>
                                                <?php echo $userdata['postal'].', '.$userdata['ps'];?><br>
                                                <?php echo $userdata['city'];?><br>
                                            </address>
                                        </div>
                                        <div class="col-md-6 text-md-right">
                                            <address>
                                                <strong>Shipped To:</strong><br>
                                                <span class="text-capitalize"><?php echo $userdata['first_name']. ' '.$userdata['last_name'];?></span><br>
                                                <?php echo $data1['shipping_address'];?><br>
                                            </address>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <address>
                                                <strong>Payment Method:</strong><br>
                                                Bkash <?php echo $data1['bkas_number'];?><br>
                                                <?php echo $userdata['email'];?><br>
                                            </address>
                                        </div>
                                        <div class="col-md-6 text-md-right">
                                            <address>
                                                <strong>Order Date:</strong><br>
                                                <?php echo $data1['date'];?><br><br><br>
                                            </address>
                                        </div>
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-md-12">
                                            <div class="section-title">Order Summary</div>
                                            <p class="section-lead">All items here cannot be deleted.</p>
                                            <div class="table-responsive">
                                                <table class="table table-striped table-hover table-md">
                                                    <tr>
                                                        <th data-width="40">#</th>
                                                        <th>Item</th>
                                                        <th class="text-center">Price</th>
                                                        <th class="text-center">Quantity</th>
                                                        <th class="text-right">Totals</th>
                                                    </tr>
                                                    <?php
                                                    $sql = "SELECT * from patient, medicine, medicine_invoice WHERE
                                                            patient.patient_id = medicine_invoice.patient_id AND
                                                            medicine.medecine_id = medicine_invoice.medicine_id AND
                                                            patient.patient_id = '$userdata[patient_id]' AND
                                                            medicine_invoice.med_invoice ='$invoice'";

                                                    $res = mysqli_query($connect, $sql);
                                                        $i =1;
                                                       while ($row = mysqli_fetch_assoc($res)){?>
                                                    <tr>
                                                        <td><?php echo $i++;?></td>
                                                        <td><?php echo $row['name'];?></td>
                                                        <td class="text-center"><?php echo number_format($row['price'], '2');?> T.K</td>
                                                        <td class="text-center"><?php echo $row['quantity'];?></td>
                                                        <td class="text-right">
                                                            <?php
                                                                $pro_price = $row['price'];
                                                                $pro_quant = $row['quantity'];

                                                                $total_price = $pro_price * $pro_quant;
                                                                echo number_format($total_price,2 );
                                                            ?> T.K
                                                        </td>
                                                    </tr>
                                                    <?php }?>
                                                </table>
                                            </div>
                                            <div class="row mt-4">
                                                <div class="col-lg-8">
                                                </div>
                                                <div class="col-lg-4 text-right">
                                                    <div class="invoice-detail-item">
                                                        <div class="invoice-detail-value"> Subtotal : <span class="ml-2">
                                                            <?php
                                                            $sub_total = "SELECT price,quantity,SUM(quantity*price) AS paybleAmount FROM medicine_invoice WHERE patient_id = $userdata[patient_id] AND med_invoice = '$invoice'";
                                                            $re = mysqli_query($connect, $sub_total);

                                                            $sub_totals = mysqli_fetch_assoc($re);

                                                            if ($sub_total){
                                                                if ($sub_total !== 0) {

                                                                    $payable =  number_format($sub_totals['paybleAmount'], 2);

                                                                    echo $payable;


                                                                }else{
                                                                    echo "0.00";
                                                                }
                                                            }
                                                            ?>
                                                            T.K</span>
                                                        </div>
                                                    </div>
                                                    <div class="invoice-detail-item">
                                                        <div class="invoice-detail-value">Shipping :<span class="ml-3"> <?php $shipping = 100;?> 100.00 T.K</span></div>
                                                    </div>
                                                    <hr class="mt-2 mb-2">
                                                    <div class="invoice-detail-item">
                                                        <div class="invoice-detail-value invoice-detail-value-lg">Total : <span class="ml-2"><span class="ml-2">
                                                             <?php
                                                             $sub_total = "SELECT price,quantity,SUM(quantity*price + 100) AS paybleAmount FROM medicine_invoice WHERE patient_id = $userdata[patient_id] AND med_invoice = '$invoice'";
                                                             $re = mysqli_query($connect, $sub_total);

                                                             $sub_totals = mysqli_fetch_assoc($re);

                                                             if ($sub_total){
                                                                 if ($sub_total !== 0) {

                                                                     $payable =  number_format($sub_totals['paybleAmount'], 2);

                                                                     echo $payable;


                                                                 }else{
                                                                     echo "0.00";
                                                                 }
                                                             }
                                                             ?>
                                                            T.K
                                                                </span>
                                                        </div>
                                                    </div>

                                                    <div class="invoice-detail-item">
                                                        <div class="invoice-detail-value invoice-detail-value-lg mt-2">Due : <span class="ml-2">
                                                            <?php
                                                                $due = $data1['total_price'] - $sub_totals['paybleAmount'];
                                                                echo $due;

                                                            ?>
                                                            T.K</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-md-right">
                                    <button class="btn btn-warning btn-icon icon-left" type="pss" id="prntPSS"><i class="fas fa-print"></i> Print</button>
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
<script type="application/javascript">
    $(document).ready(function () {

        $('#prntPSS').click(function() {
            var printContents = $('#mainFrame').html();
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        });

    });
</script>