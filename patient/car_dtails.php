<?php
/**
 * Created by PhpStorm.
 * User: mehedi
 * Date: 8/16/2020
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
                                <h4>Car Details</h4>
                                <?php
                                if (isset($_GET['ambulance_id'])){
                                    $ambulance_id = $_GET['ambulance_id'];

                                    $sql = "SELECT * FROM ambulance_service WHERE ambulance_service_id = '$ambulance_id'";
                                    $res = mysqli_query($connect, $sql);

                                    $data = mysqli_fetch_assoc($res);
                                }
                                ?>
                            </div>
                            <div class="card-body">
                                <div class="col-md-4 col-sm-12 float-left">
                                    <div class="card">
                                        <img src="../images/<?php echo $data['image'];?>" class="card-img-top" style="height: 200px; width: 100%">
                                        <h5 class="text-center p-3">Ambulance</h5>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 float-left">
                                    <div class="card">
                                        <img src="../images/<?php echo $data['driver_image'];?>" class="card-img-top" style="height: 200px; width: 100%">
                                        <h5 class="text-center p-3">Driver</h5>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 float-left">
                                    <div class="card">
                                        <img src="../images/<?php echo $data['driving_licinence'];?>" class="card-img-top" style="height: 200px; width: 100%">
                                        <h5 class="text-center p-3">Driving Licence</h5>
                                    </div>
                                </div>

                                <h3 class="border-bottom mt-4 ml-3 form-group">More Details</h3>
                                <div class="col-md-6 col-sm-12 float-left">
                                    <label>Driver Name: </label>
                                    <input value="<?php echo $data['driver_name'];?>" class="form-control" disabled>
                                </div>
                                <div class="form-group col-md-6 col-sm-12 float-left">
                                    <label>Driver Phone: </label>
                                    <input value="<?php echo $data['driver_phone'];?>" class="form-control" disabled>
                                </div>
                                <div class="form-group col-md-12 col-sm-12 float-left">
                                    <label>Car Description </label>
                                    <textarea class="form-control" disabled><?php echo $data['description'];?></textarea>
                                </div>
                                <div class="form-group col-md-6 col-sm-12 float-left">
                                    <label>Car Number: </label>
                                    <input value="<?php echo $data['car_number'];?>" class="form-control" disabled>
                                </div>
                                <div class="form-group col-md-6 col-sm-12 float-left">
                                    <label>Price: </label>
                                    <input value="<?php echo $data['price'];?>" class="form-control" disabled>
                                </div>
                                <div class="form-group col-md-6 col-sm-12 float-left">
                                    <label>Total Booking: </label>
                                    <?php
                                        $get_total_work = "SELECT ambulance_service_id, COUNT(ambulance_service_id) AS total FROM book_ambulance WHERE ambulance_service_id = '$ambulance_id' GROUP BY ambulance_service_id";

                                        $result_work = mysqli_query($connect, $get_total_work);

                                        $r = mysqli_fetch_assoc($result_work);
                                    ?>
                                    <input value="<?php echo $r['total'];?>" class="form-control" disabled>
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
