<?php
/**
 * Created by PhpStorm.
 * User: mehedi
 * Date: 8/15/2020
 * Time: 1:03 PM
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
                                <h4>Total Medicine Sell</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover" id="tableExport" style="width:100%;">
                                        <thead>
                                        <tr class="text-center">
                                            <th>Serial</th>
                                            <th>Invoice ID</th>
                                            <th>Order Date</th>
                                            <th>Sell Amount</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $sql = "SELECT * FROM payment_medicine";
                                            $res = mysqli_query($connect, $sql);

                                            $i = 1;
                                            while ($row = mysqli_fetch_assoc($res)){?>
                                            <tr class="text-center">
                                                <td><?php echo $i++;?></td>
                                                <td>
                                                    <a href="medicine_invoice.php?invoice=<?php echo $row['med_invoice'];?>" class="text-decoration-none" target="_blank">MED_<?php echo $row['med_invoice'];?></a>
                                                </td>
                                                <td><?php echo $row['date'];?></td>
                                                <td><?php echo number_format($row['total_price'],2);?> T.K</td>
                                            </tr>
                                        <?php }?>
                                        </tbody>

                                        <tfoot>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td> <span class="float-right">Total:</span></td>
                                            <td class="text-center">
                                                <span>
                                                    <?php
                                                        $sql_total = "SELECT  SUM(total_price) AS total_amount FROM payment_medicine";
                                                        $total = mysqli_query($connect, $sql_total);
                                                        $values = mysqli_fetch_assoc($total);
                                                        $num_rows = $values['total_amount'];
                                                        $total_amount = number_format($num_rows,2);
                                                        echo "<span>$total_amount T.K</span>";
                                                    ?>
                                                </span>
                                            </td>
                                        </tr>
                                        </tfoot>
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
