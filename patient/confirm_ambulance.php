<?php
/**
 * Created by PhpStorm.
 * User: mehedi
 * Date: 8/16/2020
 * Time: 1:06 PM
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
                                <h4>Confirm Book ambulance</h4>
                                <?php
                                    if (isset($_GET['ambulance_id'])){
                                        $ambulance_id = $_GET['ambulance_id'];

                                        $sql = "SELECT * FROM ambulance_service WHERE ambulance_service_id = $ambulance_id";
                                        $res = mysqli_query($connect, $sql);

                                        $data = mysqli_fetch_assoc($res);
                                    }

                                ?>
                            </div>
                            <div class="card-body">
                                <h3>
                                    <?php
                                    if (isset($_POST['btn'])){
                                        $patient_id            = $_POST['patient_id'];
                                        $ambulance_service_id  = $_POST['ambulance_service_id'];
                                        $going_address         = $_POST['going_address'];
                                        $price                 = $_POST['price'];

                                        if ($going_address && $price){
                                            $create = @date('Y-m-d H:i:s');

                                            $sql_book = "INSERT INTO book_ambulance (patient_id, ambulance_service_id, going_address, price, booking_date, status) VALUES ('$patient_id', '$ambulance_service_id', '$going_address', '$price', '$create', '0')";
                                            $res_book = mysqli_query($connect, $sql_book);

                                            echo "<span class='text-success font-weight-bold'>Booking Successful. Ambulance Driver Will Contact with You Soon...</span>";
                                        }else{
                                            echo "<span class='text-danger'>Booking Failed</span>";
                                        }
                                    }
                                    ?>
                                </h3>

                                <h3 class="ml-3 border-bottom">Ambulance Details</h3>
                                <div class="form-group col-md-6 col-sm-12 float-left">
                                    <label class="font-weight-bold">Driver Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control text-capitalize" value="<?php echo $data['driver_name'];?>" disabled name="driver_name" id="ed_driver_name">
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-sm-12 float-left">
                                    <label class="font-weight-bold">Driver Phone</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="<?php echo $data['driver_phone'];?>" disabled name="driver_phone" id="ed_driver_phone">
                                    </div>
                                </div>
                                <div class="form-group col-md-12 col-sm-12 float-left">
                                    <label class="font-weight-bold">Car Description</label>
                                    <div class="input-group">
                                        <textarea name="description" class="form-control" disabled id="ed_description"><?php echo $data['description'];?></textarea>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-sm-12 float-left">
                                    <label class="font-weight-bold">Car Number</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="<?php echo $data['car_number'];?>" disabled name="car_number" id="ed_car_number">
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-sm-12 float-left">
                                    <label class="font-weight-bold">Rent Charge</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="<?php echo $data['price'];?>" disabled name="price" id="ed_price">
                                    </div>
                                </div>

                                <h3 class="border-bottom ml-3">Your Details</h3>
                                <div class="form-group col-md-6 col-sm-12 float-left">
                                    <label class="font-weight-bold">Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="<?php echo $userdata['first_name'].' '.$userdata['last_name'];?>" disabled name="price" id="ed_price">
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-sm-12 float-left">
                                    <label class="font-weight-bold">Phone</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="<?php echo $userdata['phone'];?>" disabled name="price" id="ed_price">
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-sm-12 float-left">
                                    <label class="font-weight-bold">Email</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="<?php echo $userdata['email'];?>" disabled name="price" id="ed_price">
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-sm-12 float-left">
                                    <label class="font-weight-bold">Address</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="<?php echo $userdata['address'];?>" disabled name="price" id="ed_price">
                                    </div>
                                </div>

                                <h3 class="border-bottom ml-3">Fill All Filed</h3>
                                <form action="" method="post">
                                    <div class="form-group col-md-6 col-sm-12 float-left">
                                        <input type="number" hidden value="<?php echo $userdata['patient_id'];?>" name="patient_id">
                                        <input type="number" hidden value="<?php echo $data['ambulance_service_id'];?>" name="ambulance_service_id">
                                        <label class="font-weight-bold">Going Address: </label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="going_address" placeholder="Enter Your Going Address">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12 float-left">
                                        <label class="font-weight-bold">payment Option: </label>
                                        <div class="form-group">
                                            <select class="form-control" name="price">
                                                <option>----------Select One Method----------</option>
                                                <option value="negotiable">Out Site Dhaka (Negotiable)</option>
                                                <option value="1000">In site Dhaka 1000 T.K</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12 float-left">
                                        <input type="submit" name="btn" class="btn btn-primary" value="Submit">
                                    </div>
                                </form>
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
