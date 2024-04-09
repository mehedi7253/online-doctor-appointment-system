<?php
/**
 * Created by PhpStorm.
 * User: mehedi
 * Date: 8/18/2020
 * Time: 11:56 AM
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
                                if (isset($_GET['appointment_id'])){
                                    $invoice = $_GET['appointment_id'];

                                    $sql1 = "SELECT * FROM doctors, patient, appointment_invoice WHERE
                                             patient.patient_id = appointment_invoice.patient_id AND
                                            doctors.doctor_id = appointment_invoice.doctor_id AND 
                                            appointment_invoice.appointment_id = '$invoice'";
                                    $res1 = mysqli_query($connect, $sql1);
                                    $data1 = mysqli_fetch_assoc($res1);
                                }
                                ?>
                            </div>
                            <div class="card-body" id="mainFrame">
                                <div class="col-md-12">
                                    <div class="invoice-title">
                                        <div class="invoice-number"> #<?php echo 'Appointment_'.$data1['appointment_id'];?><span class="float-right">Appointment Date:
                                        <?php
                                            $status = $data1['status'];

                                            if ($status = '0'){
                                                echo '<span class="text-danger">pendeing</span>';
                                            }else{
                                                echo '<span class="text-success">payment Complete</span>';
                                            }

                                        ?>
                                            </span></div>
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
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <address>
                                                <strong>Payment Method:</strong><br>
                                                Bkash <?php echo $data1['bkash_number'];?><br>
                                                <?php echo $data1['email'];?><br>
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
                                                        <th>Doctor Name</th>
                                                        <th class="text-center">Doctor Phone</th>
                                                        <th class="text-center">Appointment Date</th>
                                                        <th class="text-center">Fee</th>
                                                    </tr>
                                                    <?php
                                                    $sql = "SELECT * FROM doctors, appointment_invoice WHERE
                                                            doctors.doctor_id = appointment_invoice.doctor_id AND 
                                                            appointment_invoice.appointment_id = '$invoice'";

                                                    $res = mysqli_query($connect, $sql);
                                                    $i =1;
                                                    while ($row = mysqli_fetch_assoc($res)){?>
                                                        <?php $d = $row['payable'];?>
                                                        <tr>
                                                            <td><?php echo $i++;?></td>
                                                            <td><?php echo $row['first_name']. ' '.$row['last_name'];?></td>
                                                            <td class="text-center"><?php echo $row['phone'];?></td>
                                                            <td class="text-center"><?php echo $row['payment_date'];?></td>
                                                            <td class="text-center"><?php echo number_format($row['charge'], '2');?> T.K</td>

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
                                                           <?php echo number_format($data1['charge'], '2');?> T.K</span>
                                                        </div>
                                                    </div>
                                                    <hr class="mt-2 mb-2">
                                                    <div class="invoice-detail-item">
                                                        <div class="invoice-detail-value invoice-detail-value-lg">Total : <span class="ml-2"><span class="ml-2">
                                                             <?php
                                                             echo number_format($data1['charge'], '2');
                                                             ?>
                                                                    T.K
                                                                </span>
                                                        </div>
                                                    </div>

                                                    <div class="invoice-detail-item">
                                                        <div class="invoice-detail-value invoice-detail-value-lg mt-2">Due : <span class="ml-2">
                                                            <?php
                                                            $due = $data1['charge'] - $d;
                                                            echo number_format($due,2);

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