<?php
/**
 * Created by PhpStorm.
 * User: mehedi
 * Date: 8/16/2020
 * Time: 10:44 PM
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
                                <h4>Make invoice</h4>
                                <?php
                                    if (isset($_GET['invoice_id'])){
                                        $invoice_id   = $_GET['invoice_id'];

                                        $sql_getData = "SELECT * FROM ambulance_service, patient, book_ambulance WHERE 
                                                        ambulance_service.ambulance_service_id = book_ambulance.ambulance_service_id AND
                                                        patient.patient_id = book_ambulance.patient_id AND book_ambulance.book_ambulance_id = $invoice_id";
                                        $result      = mysqli_query($connect, $sql_getData);

                                        $data = mysqli_fetch_assoc($result);
                                    }
                                ?>
                            </div>
                            <div class="card-body">
                                <div>
                                    <?php
                                    if(isset($_SESSION['error'])){
                                        echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
                                        unset($_SESSION['error']);
                                    }
                                    if(isset($_SESSION['success'])){
                                        echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
                                        unset($_SESSION['success']);
                                    }
                                    ?>
                                </div>
                                <?php
                                if (isset($_POST['btn'])){
                                    $patient_id           = $_POST['patient_id'];
                                    $book_ambulance_id    = $_POST['book_ambulance_id'];
                                    $ambulance_service_id = $_POST['ambulance_service_id'];
                                    $going_address        = $_POST['going_address'];
                                    $payble               = $_POST['payble'];

                                    if ($patient_id && $book_ambulance_id && $ambulance_service_id && $going_address && $payble){
                                        $sql_make_invoice = "INSERT INTO ambulance_invoice (patient_id, book_ambulance_id, ambulance_service_id, going_address, payble) VALUES ('$patient_id', '$book_ambulance_id', '$ambulance_service_id', '$going_address', '$payble')";
                                        $res_make_invoice = mysqli_query($connect, $sql_make_invoice);

                                        $_SESSION['success'] = 'Invoice Make successful';
                                        echo "<script>document.location.href='make_invoice_admin.php?invoice_id=$invoice_id'</script>";
                                    }else{
                                        $_SESSION['error'] = 'Invoice Make Failed';

                                        echo "<script>document.location.href='make_invoice_admin.php?invoice_id=$invoice_id'</script>";
                                    }

                                }
                                ?>
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

                                <h3 class="border-bottom ml-3">Patient Details</h3>
                                <div class="form-group col-md-6 col-sm-12 float-left">
                                    <label class="font-weight-bold">Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="<?php echo $data['first_name'].' '.$data['last_name'];?>" disabled name="price" id="ed_price">
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-sm-12 float-left">
                                    <label class="font-weight-bold">Phone</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="<?php echo $data['phone'];?>" disabled name="price" id="ed_price">
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-sm-12 float-left">
                                    <label class="font-weight-bold">Email</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="<?php echo $data['email'];?>" disabled name="price" id="ed_price">
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-sm-12 float-left">
                                    <label class="font-weight-bold">Going Address</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="<?php echo $data['going_address'];?>" disabled name="price" id="ed_price">
                                    </div>
                                </div>

                                <h3 class="border-bottom ml-3">Make Invoice</h3>
                                <form action="" method="post">
                                    <div class="form-group col-md-6 col-sm-12 float-left">
                                        <label class="font-weight-bold">Enter Price</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" hidden value="<?php echo $data['patient_id'];?>"  name="patient_id">
                                            <input type="text" class="form-control" hidden value="<?php echo $data['book_ambulance_id'];?>"  name="book_ambulance_id">
                                            <input type="text" class="form-control" hidden value="<?php echo $data['ambulance_service_id'];?>"  name="ambulance_service_id">
                                            <input type="text" class="form-control" hidden value="<?php echo $data['going_address'];?>"  name="going_address">
                                            <input type="text" class="form-control" value="<?php echo $data['price'];?>"  name="payble">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12 float-left">
                                        <label class="p-4"></label>
                                        <input type="submit" name="btn" class="btn btn-primary col-5" value="Submit">
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
