<?php
/**
 * Created by PhpStorm.
 * User: mehedi
 * Date: 8/16/2020
 * Time: 12:52 PM
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
                                <h4>Payment List</h4>
                                <?php
                                    $sql_getData = "SELECT * FROM ambulance_service, patient, book_ambulance WHERE 
                                                            ambulance_service.ambulance_service_id = book_ambulance.ambulance_service_id AND
                                                            patient.patient_id = book_ambulance.patient_id AND 
                                                            book_ambulance.patient_id = '$userdata[patient_id]'";
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
                                            <th>Going Address</th>
                                            <th>Booking Date</th>
                                            <th>Invoice</th>
<!--                                            <th>Payment Status</th>-->
                                            <th>Pay Now</th>
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
                                                <td><?php echo $row['going_address'];?></td>
                                                <td><?php echo $row['booking_date'];?></td>
                                                <td>
                                                    <?php
                                                    $sql_invoice = "SELECT * FROM ambulance_invoice WHERE book_ambulance_id = '$row[book_ambulance_id]'";
                                                    $res_invoice = mysqli_query($connect, $sql_invoice);

                                                    $data = mysqli_fetch_assoc($res_invoice);

                                                    if ($data !=0){
                                                        echo '<a href="ambulance_invoice.php?invoice_id='.$data['ambulance_invoice'].'" class="btn btn-success">View</a>';
                                                    }else{
                                                        echo '<a disabled class="btn btn-danger text-white">Not Ready</a>';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    $sql_invoice2 = "SELECT * FROM ambulance_invoice WHERE ambulance_invoice = '$data[ambulance_invoice]' AND total_pay = 0 AND patient_id = '$userdata[patient_id]'";
                                                    $res_invoice2 = mysqli_query($connect, $sql_invoice2);

                                                    $data2 = mysqli_fetch_assoc($res_invoice2);

                                                    if ($data !=0){
                                                        if ($data2 == 0){
                                                            echo '<a class="btn btn-success text-white">paid</a>';
                                                        }else{
                                                            echo ' <a href="pay_ambulance.php?invoice_id='.$data['ambulance_invoice'].'" class="btn btn-primary">Pay Now</a>';
                                                        }
                                                    }else{
                                                        echo '<a disabled class="btn btn-danger text-white">Not Ready</a>';
                                                    }

                                                    ?>

<!--                                                  <a href="pay_ambulance.php?invoice_id=--><?php //echo $data['ambulance_invoice'];?><!--" class="btn btn-primary">Pay Now</a>-->
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
