<?php
/**
 * Created by PhpStorm.
 * User: mehdi
 * Date: 8/15/2020
 * Time: 12:50 PM
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
                                <h4>Track Your Delivery</h4>
                                <?php
                                if (isset($_GET['invoice'])){
                                    $invoice = $_GET['invoice'];
                                    $sql1 = "SELECT * FROM payment_medicine WHERE med_invoice = '$invoice'";
                                    $res1 = mysqli_query($connect, $sql1);
                                    $data1 = mysqli_fetch_assoc($res1);

                                    $sql2 = "SELECT * from patient, medicine, medicine_invoice WHERE
                                                            patient.patient_id = medicine_invoice.patient_id AND
                                                            medicine.medecine_id = medicine_invoice.medicine_id AND
                                                            medicine_invoice.med_invoice ='$invoice'";

                                    $res2 = mysqli_query($connect, $sql2);
                                    $data = mysqli_fetch_assoc($res2);
                                }
                                ?>
                            </div>
                            <div class="card-body">
                                <p class="font-weight-bold">Invoice : #MED_<?php echo $data1['med_invoice'];?> <span class="font-weight-bold float-right">Order  Date: <?php echo $data1['date'];?></span></p>
                                <div>
                                    <p>Payment Status : <?php
                                        $status = $data1['payment_status'];
                                        // echo $status;

                                        if (($status) == '0'){?>
                                            <label class="text-danger">Payment Pending</label>
                                            <?php
                                        }
                                        if (($status) == '1'){?>
                                            <label class="text-success">Paid</label>
                                            <?php
                                        }
                                        ?>
                                    </p>
                                    <p>Payment Bkas Number: <?php echo $data1['bkas_number'];?> <span class="float-right">Payment Date: <?php echo $data1['date'];?></span></p>

                                    <div class="border"></div>
                                    <h3 class="mt-3">Delivery Status</h3>
                                </div>
                                <div class="table-responsive">
                                    <div class="table">
                                        <tr>
                                            <td>
                                                <?php
                                                $status = $data1['status'];
                                                // echo $status;

                                                if (($status) == '0'){?>
                                                    <button class="btn btn-danger col-4 ml-4">Pending</button>
                                                    <?php
                                                }
                                                if (($status) == '1'){?>
                                                    <button class="btn btn-success col-4 ml-4">Picked</button>
                                                    <?php
                                                }
                                                if (($status) == '2'){?>
                                                    <button class="btn btn-success col-4 ml-4">Picked</button>
                                                    <?php
                                                }
                                                if (($status) == '3'){?>
                                                    <button class="btn btn-success col-4 ml-4">Picked</button>
                                                    <?php
                                                }
                                                if (($status) == '4'){?>
                                                    <button class="btn btn-danger col-4 ml-4">Canceled</button>
                                                    <?php
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                $process = $data1['status'];
                                                // echo $status;
                                                if (($process) == '0'){?>
                                                    <button class="btn btn-danger col-3 ml-2">Pending</button>
                                                    <?php
                                                }
                                                if (($process) == '1'){?>
                                                    <button class="btn btn-info col-3 ml-2">Picked</button>
                                                    <?php
                                                }
                                                if (($process) == '2'){?>
                                                    <button class="btn btn-info col-3 ml-2">Shipped</button>
                                                    <?php
                                                }
                                                if (($process) == '3'){?>
                                                    <button class="btn btn-success col-3 ml-2">Shipped</button>
                                                    <?php
                                                }
                                                if (($process) == '4'){?>
                                                    <button class="btn btn-danger col-3 ml-2">Canceled</button>
                                                    <?php
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                $process = $data1['status'];
                                                // echo $status;
                                                if (($process) == '0'){?>
                                                    <button class="btn btn-danger col-4 ml-2">Pending</button>
                                                    <?php
                                                }
                                                if (($process) == '1'){?>
                                                    <button class="btn btn-info col-4 ml-2">Picked</button>
                                                    <?php
                                                }
                                                if (($process) == '2'){?>
                                                    <button class="btn btn-info col-4 ml-2">Shipped</button>
                                                    <?php
                                                }
                                                if (($process) == '3'){?>
                                                    <button class="btn btn-success col-4 ml-2">Delivered</button>
                                                    <?php
                                                }
                                                if (($process) == '4'){?>
                                                    <button class="btn btn-danger col-4 ml-2">Canceled</button>
                                                    <?php
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mx-auto mt-2">
                                        <address>
                                            <strong>Billed To:</strong><br>
                                            <span class="text-capitalize"><?php echo $data['first_name']. ' '.$data['last_name'];?></span><br>
                                            <?php echo $data['postal'].', '.$data['ps'];?><br>
                                            <?php echo $data['city'];?><br>
                                        </address>
                                    </div>
                                    <div class="col-md-6 text-md-right">
                                        <address>
                                            <strong>Shipped To:</strong><br>
                                            <span class="text-capitalize"><?php echo $data['first_name']. ' '.$data['last_name'];?></span><br>
                                            <?php echo $data1['shipping_address'];?><br>
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
                                                            $sub_total = "SELECT price,quantity,SUM(quantity*price) AS paybleAmount FROM medicine_invoice WHERE med_invoice = '$invoice'";
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
                                                          $sub_total = "SELECT price,quantity,SUM(quantity*price + 100) AS paybleAmount FROM medicine_invoice WHERE  med_invoice = '$invoice'";
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
