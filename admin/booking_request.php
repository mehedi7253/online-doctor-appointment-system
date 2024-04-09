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
                                                        patient.patient_id = book_ambulance.patient_id";
                                    $result      = mysqli_query($connect, $sql_getData);
                                ?>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                        <thead>
                                        <tr style="border: 1px solid lightsteelblue">
                                            <th>Serial</th>
<!--                                            <th>Driver Name</th>-->
<!--                                            <th>Driver Phone</th>-->
                                            <th>Car Number</th>
                                            <th>Patient Name</th>
                                            <th>Patient Number</th>
                                            <th>Booking Date</th>
                                            <th> Status</th>
                                            <th>Update Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i = 1;
                                        while ($row = mysqli_fetch_assoc($result)){?>
                                            <tr class="text-center">
                                                <td><?php echo $i++;?></td>
<!--                                                <td class="text-capitalize">--><?php //echo $row['driver_name'];?><!--</td>-->
<!--                                                <td>--><?php //echo $row['driver_phone'];?><!--</td>-->
                                                <td><?php echo $row['car_number'];?></td>
                                                <td class="text-capitalize"><?php echo $row['first_name'].' '.$row['last_name'];?></td>
                                                <td><?php echo $row['phone'];?></td>
                                                <td><?php echo $row['booking_date'];?></td>
                                                <td>
                                                    <?php
                                                    $process = $row['status'];
                                                    if (($process) == '0'){?>
                                                        <button class="btn btn-danger">Pending</button>
                                                        <?php
                                                    }
                                                    if (($process) == '1'){?>
                                                        <button class="btn btn-info">Received</button>
                                                        <?php
                                                    }
                                                    if (($process) == '2'){?>
                                                        <button class="btn btn-success text-white">Complete</button>
                                                        <?php
                                                    }
                                                    if (($process) == '3'){?>
                                                        <button class="btn btn-danger">Cancel</button>
                                                        <?php
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <form action="" method="post">
                                                        <?php
                                                        if (isset($_POST['up_sts'])){
                                                            $book_ambulance_id  = $_POST['book_ambulance_id'];
                                                            $status             = $_POST['status'];

                                                            $update = "UPDATE book_ambulance SET status = '$status' WHERE book_ambulance_id = $book_ambulance_id";
                                                            $res_update = mysqli_query($connect, $update);

                                                            echo "<script>document.location.href='booking_request.php'</script>";

                                                        }
                                                        ?>
                                                        <input name="book_ambulance_id" hidden value="<?php echo $row['book_ambulance_id'];?>">
                                                        <select class="form-control" name="status">
                                                            <option>--Update Status--</option>
                                                            <option value="0">Pending</option>
                                                            <option value="1">Received</option>
                                                            <option value="2">Complete</option>
                                                            <option value="3">Canceled</option>
                                                        </select>

                                                </td>
                                                <td>
                                                    <input type="submit" name="up_sts" value="Submit" class="btn btn-success">
                                                </td>
                                                </form>
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
