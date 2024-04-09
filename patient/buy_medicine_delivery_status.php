<?php
/**
 * Created by PhpStorm.
 * User: mehedi
 * Date: 8/11/2020
 * Time: 2:57 PM
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
                                <h4>Delivery Status</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Serial</th>
                                            <th>Invoice</th>
                                            <th>Order Date</th>
                                            <th>View Delivery Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $sql = "SELECT * FROM patient, medicine, medicine_invoice 
                                                    WHERE patient.patient_id = medicine_invoice.patient_id AND 
                                                    medicine.medecine_id = medicine_invoice.medicine_id AND 
                                                    patient.patient_id = '$userdata[patient_id]' AND medicine_invoice.status = '1' GROUP BY  medicine_invoice.med_invoice";

                                        $res = mysqli_query($connect, $sql);

                                        $i = 1;

                                        while ($row = mysqli_fetch_assoc($res)){?>
                                            <tr>
                                                <td><?php echo $i++;?></td>
                                                <td><?php echo 'MED_'.$row['med_invoice'];?></td>
                                                <td><?php echo $row['date'];?></td>
                                                <td>
                                                    <?php
                                                    $sq = "SELECT medicine_invoice.med_invoice, payment_medicine.med_invoice FROM 
                                                                  payment_medicine, medicine_invoice WHERE 
                                                                  medicine_invoice.med_invoice = payment_medicine.med_invoice AND 
                                                                  payment_medicine.med_invoice = '$row[med_invoice]'";

                                                    $r = mysqli_query($connect, $sq);

                                                    $d = mysqli_fetch_assoc($r);

                                                    if ($d !=0){
                                                        echo '<a href="deleviry_process.php?invoice_id='.$row['med_invoice'].'" class="btn btn-primary">View More</a>';
                                                    }else{
                                                        echo "<span class='btn btn-danger text-white'>Complete Your Payment</span>";
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php }
                                        ?>
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
