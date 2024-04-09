<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 8/16/2020
 * Time: 12:51 PM
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
                                <h4>Book Ambulance Service</h4>
                                <?php
                                    $sql = "SELECT * FROM ambulance_service";
                                    $res = mysqli_query($connect, $sql);
                                ?>
                            </div>
                            <div class="card-body">
                                <?php   while ($row = mysqli_fetch_assoc($res)){?>
                                    <div class="col-md-6 col-sm-12 float-left">
                                        <div class="card">
                                            <img src="../images/<?php echo $row['image'];?>" class="card-img-top" style="height: 200px; width: 100%">
                                            <div class="card-body">
                                                <label class="font-weight-bold">Driver: <?php echo $row['driver_name'];?> </label><br/>
                                                <label class="font-weight-bold">Phone: <?php echo $row['driver_phone'];?> </label><br/>
                                                <p class="font-weight-bold text-justify">Driver: <?php echo $row['description'];?> </p>
                                                <label class="font-weight-bold">Car Number: <?php echo $row['car_number'];?> </label><br/>
                                                <label class="font-weight-bold">Total Service Provide:
                                                    <?php
                                                    $get_total_work = "SELECT ambulance_service_id, COUNT(ambulance_service_id) AS total FROM book_ambulance WHERE ambulance_service_id = '$row[ambulance_service_id]' GROUP BY ambulance_service_id";

                                                    $result_work = mysqli_query($connect, $get_total_work);

                                                    $r = mysqli_fetch_assoc($result_work);

                                                    echo $r['total'];
                                                    ?>
                                                </label><br/>
                                            </div>
                                            <div class="card-footer">
                                                <a href="car_dtails.php?ambulance_id=<?php echo $row['ambulance_service_id'];?>" class="btn btn-primary"> View More</a>
                                                <a href="confirm_ambulance.php?ambulance_id=<?php echo $row['ambulance_service_id'];?>" class="btn btn-primary float-right">Book Now</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php }?>
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
