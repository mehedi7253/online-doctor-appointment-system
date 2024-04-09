<?php
/**
 * Created by PhpStorm.
 * User: mehedi
 * Date: 8/16/2020
 * Time: 8:45 PM
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
                                <h4>Booking Request</h4>
                                <?php
                                $sql_getData = "SELECT * FROM ambulance_service, patient, book_ambulance WHERE 
                                                        ambulance_service.ambulance_service_id = book_ambulance.ambulance_service_id AND
                                                        patient.patient_id = book_ambulance.patient_id AND 
                                                        book_ambulance.status = 1";
                                $result      = mysqli_query($connect, $sql_getData);
                                ?>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                        <thead>
                                        <tr style="border: 1px solid lightsteelblue">
                                            <th>Serial</th>
                                            <th>Driver Name</th>
                                            <th>Driver Phone</th>
                                            <th>Car Number</th>
                                            <th>Patient Name</th>
                                            <th>Patient Number</th>
                                            <th>Booking Date</th>
                                            <th>Invoice</th>
                                            <th>Payment</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i = 1;
                                        while ($row = mysqli_fetch_assoc($result)){?>
                                            <tr class="text-center">
                                                <td><?php echo $i++;?></td>
                                                <td class="text-capitalize"><?php echo $row['driver_name'];?></td>
                                                <td><?php echo $row['driver_phone'];?></td>
                                                <td><?php echo $row['car_number'];?></td>
                                                <td class="text-capitalize"><?php echo $row['first_name'].' '.$row['last_name'];?></td>
                                                <td><?php echo $row['phone'];?></td>
                                                <td><?php echo $row['booking_date'];?></td>
                                                <td>
                                                    <?php
                                                        $sql_invoice = "SELECT * FROM ambulance_invoice WHERE book_ambulance_id = '$row[book_ambulance_id]'";
                                                        $res_invoice = mysqli_query($connect, $sql_invoice);

                                                        $data = mysqli_fetch_assoc($res_invoice);

                                                        if ($data !=0){
                                                            echo '<a href="ambulance_invoice.php?invoice_id='.$data['ambulance_invoice'].'" class="btn btn-success">View</a>';
                                                        }else{
                                                            echo '<a href="make_invoice_admin.php?invoice_id='.$row['book_ambulance_id'].'" class="btn btn-primary">Make Now</a>';
                                                        }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                        if ($data !=0){
                                                            $process = $data['payment_sts'];
                                                            if (($process) == '0'){?>
                                                                <button class="btn btn-danger">Pending</button>
                                                                <?php
                                                            }
                                                            if (($process) == '1'){?>
                                                                <button class="btn btn-info">Complete</button>
                                                                <?php
                                                            }
                                                        }else{
                                                            echo '<a class="text-danger text-decoration-none">No Invoice Found</a>';
                                                        }

                                                    ?>
                                                </td>
                                            </tr>
                                        <?php }?>
                                        </tbody>
                                    </table>
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
<!---->
