<?php
/**
 * Created by PhpStorm.
 * User: mehedi
 * Date: 8/17/2020
 * Time: 10:28 AM
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

                                    $sql1 = "SELECT * FROM patient, ambulance_service, ambulance_invoice WHERE 
                                             patient.patient_id = ambulance_invoice.patient_id AND 
                                             ambulance_service.ambulance_service_id = ambulance_invoice.ambulance_service_id AND
                                              ambulance_invoice.ambulance_invoice = '$invoice'";
                                    $res1 = mysqli_query($connect, $sql1);
                                    $data1 = mysqli_fetch_assoc($res1);

                                }
                                ?>
                            </div>
                            <div class="card-body" id="mainFrame">
                                <div class="col-md-12">
                                    <div class="invoice-title">
                                        <div class="invoice-number">Invoice ID #<?php echo 'Ambulance_'.$data1['ambulance_invoice'];?> <span class="float-right">Payment :
                                                <?php
                                                    $status = $data1['payment_sts'];
                                                    // echo $status;

                                                    if (($status) == '0'){?>
                                                        <label class="text-danger">Payment Pending</label>
                                                        <?php
                                                    }
                                                    if (($status) == '1'){?>
                                                            <label class="text-success">Payment Done</label>
                                                        <?php
                                                    }
                                                ?>

                                            </span>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <address>
                                                <strong>Billed To:</strong><br>
                                                <span class="text-capitalize"><?php echo $data1['first_name']. ' '.$data1['last_name'];?></span><br>
                                                <?php echo $data1['postal'].', '.$data1['ps'];?><br>
                                                <?php echo $data1['city'];?><br>
                                            </address>
                                        </div>
                                        <div class="col-md-6 text-md-right">
                                            <address>
                                                <strong>Driver Info:</strong><br>
                                                <span class="text-capitalize"><?php echo $data1['driver_name'];?></span><br>
                                                <?php echo $data1['driver_phone'];?><br/>
                                                <?php echo $data1['car_number'];?><br>
                                            </address>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <address>
                                                <strong>Payment Method:</strong><br>
                                                Bkash <?php echo $data1['payment_by'];?><br>
                                                <?php echo $data1['email'];?><br>
                                            </address>
                                        </div>
                                        <div class="col-md-6 text-md-right">
                                            <address>
                                                <strong>Order Date:</strong><br>
                                                <?php echo $data1['payment_date'];?><br><br><br>
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
                                                        <th class="text-center">Car Number</th>
                                                        <th class="text-center">Driver Name</th>
                                                        <th class="text-right">Driver Phone</th>
                                                        <th class="text-right">Patient Name</th>
                                                        <th class="text-right">Patient Phone</th>
                                                        <th class="text-right">Payable</th>
                                                        <th class="text-right">Price</th>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo $data1['car_number'];?></td>
                                                        <td><?php echo $data1['driver_name'];?></td>
                                                        <td><?php echo $data1['driver_phone'];?></td>
                                                        <td class="text-capitalize"><?php echo $data1['first_name']. ' '.$data1['last_name'];?></td>
                                                        <td><?php echo $data1['phone'];?></td>
                                                        <td class="text-center">
                                                            <?php
                                                            $pro_price = $data1['payble'];
                                                            $pro_quant = $data1['total_pay'];

                                                            $total_price = $pro_price - $pro_quant;
                                                            echo number_format($total_price,2 );
                                                            ?> T.K
                                                        </td>
                                                        <td class="text-center"><?php echo number_format($data1['total_pay'], '2');?> T.K</td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="row mt-4">
                                                <div class="col-lg-8">
                                                </div>
                                                <div class="col-lg-4 text-right">
                                                    <div class="invoice-detail-item">
                                                        <div class="invoice-detail-value"> Total : <span class="ml-2"> <?php echo number_format($data1['payble'], '2');?> T.K</span>
                                                        </div>
                                                    </div>
                                                    <hr class="mt-2 mb-2">

                                                    <div class="invoice-detail-item">
                                                        <div class="invoice-detail-value invoice-detail-value-lg mt-2">Due : <span class="ml-2">
                                                            <?php
                                                            $due = $data1['payble'] - $data1['total_pay'];
                                                            echo number_format($due,2) ;

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