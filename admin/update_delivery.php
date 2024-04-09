<?php
/**
 * Created by PhpStorm.
 * User: mehedi
 * Date: 8/15/2020
 * Time: 12:29 PM
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
                                <h4>Update Delivery Status</h4>
                            </div>
                            <div class="card-body">
                                <?php
                                    $sql1 = "SELECT * FROM payment_medicine";
                                    $res1 = mysqli_query($connect, $sql1);

                                ?>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                        <thead>
                                        <tr>
                                            <th>Serial</th>
                                            <th>Invoice</th>
                                            <th>Order Date</th>
                                            <th>Delivery Status</th>
                                            <th>Update Delivery Status</th>
                                            <th>Action</th>
                                            <th>View Invoice</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i = 1;

                                        while ($row = mysqli_fetch_assoc($res1)){?>
                                            <tr>
                                                <td><?php echo $i++;?></td>
                                                <td><?php echo 'MED_'.$row['med_invoice'];?></td>
                                                <td><?php echo $row['date'];?></td>
                                                <td>
                                                    <?php
                                                    $process = $row['status'];
                                                    // echo $status;
                                                    if (($process) == '0'){?>
                                                        <button class="btn btn-danger">Pending</button>
                                                        <?php
                                                    }
                                                    if (($process) == '1'){?>
                                                        <button class="btn btn-info">Picked</button>
                                                        <?php
                                                    }
                                                    if (($process) == '2'){?>
                                                        <button class="btn btn-info">Shipped</button>
                                                        <?php
                                                    }
                                                    if (($process) == '3'){?>
                                                        <button class="btn btn-success">Delivered</button>
                                                        <?php
                                                    }
                                                    if (($process) == '4'){?>
                                                        <button class="btn btn-danger">Canceled</button>
                                                        <?php
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <form action="" method="post">
                                                        <?php
                                                        if (isset($_POST['up_sts'])){
                                                            $med_invoice     = $_POST['med_invoice'];
                                                            $status          = $_POST['status'];

                                                            $update = "UPDATE payment_medicine SET status = '$status' WHERE med_invoice = '$med_invoice'";
                                                            $res_update = mysqli_query($connect, $update);

                                                            echo "<script>document.location.href='update_delivery.php'</script>";

                                                        }
                                                        ?>
                                                    <input name="med_invoice" hidden value="<?php echo $row['med_invoice'];?>">
                                                    <select class="form-control" name="status">
                                                        <option>-------Update Status-----</option>
                                                        <option value="0">Pending</option>
                                                        <option value="1">Picked</option>
                                                        <option value="2">Shipped</option>
                                                        <option value="3">Delivered</option>
                                                        <option value="4">Canceled</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="submit" name="up_sts" value="Submit" class="btn btn-success">
                                                    </form>
                                                </td>
                                                <td>
                                                    <a href="medicine_invoice.php?invoice=<?php echo $row['med_invoice'];?>" class="btn btn-primary">View Invoice</a>
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
