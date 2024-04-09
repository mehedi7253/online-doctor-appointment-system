<?php
/**
 * Created by PhpStorm.
 * User: mehedi
 * Date: 9/2/2020
 * Time: 11:15 AM
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
                    <div class="col-md-10 mx-auto mb-5">
                        <?php
                        if (isset($_GET['id'])){
                            $id = $_GET['id'];

                            $get_data      = "SELECT * FROM social_worker WHERE worker_id = $id";
                            $result_doctor = mysqli_query($connect, $get_data);

                            $doctor_data = mysqli_fetch_assoc($result_doctor);
                        }
                        ?>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-uppercase text-info"><?php echo $doctor_data['first_name'];?> <?php echo $doctor_data['last_name'];?> <span class="text-dark text-capitalize">Doctor Details</span></h4>
                            </div>
                            <div class="card-body">
                                <div class="col-md-4 col-sm-12 float-left">
                                    <img src="../images/<?php echo $doctor_data['image'];?>" style="height: 200px; width: 100%">

                                    <label class="text-info font-weight-bold font-20 p-4"><?php echo $doctor_data['email']?></label>
                                </div>
                                <div class="col-md-8 col-sm-12 float-left">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" style="background-color: blue; color: white">
                                            <tr>
                                                <td class="text-center"> Type</td>
                                                <td class="text-center text-capitalize" style="background-color: white; color: black; border: 1px solid black; border-left: none">Social Worker</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center"> Name</td>
                                                <td class="text-center text-capitalize" style="background-color: white; color: black; border: 1px solid black; border-left: none"><?php echo $doctor_data['first_name']?> <?php echo $doctor_data['last_name']?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center"> Phone</td>
                                                <td class="text-center" style="background-color: white; color: black; border: 1px solid black; border-left: none"><?php echo $doctor_data['phone']?></td>

                                            </tr>
                                            <tr>
                                                <td class="text-center"> Address</td>
                                                <td class="text-center" style="background-color: white; color: black; border: 1px solid black; border-left: none"><?php echo $doctor_data['address']?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">Doctor Gender</td>
                                                <td class="text-center" style="background-color: white; color: black; border: 1px solid black; border-left: none"><?php echo $doctor_data['gender']?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">Join Date </td>
                                                <td class="text-center" style="background-color: white; color: black; border: 1px solid black; border-left: none"><?php echo date('D-M-Y', strtotime($doctor_data['date']))?></td>
                                            </tr>

                                        </table>
                                    </div>
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
