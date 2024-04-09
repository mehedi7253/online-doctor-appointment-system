<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 8/9/2020
 * Time: 4:51 PM
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
                <?php include 'includes/status.php';?>
                <!-- end status-->

                <!--main content-->
                <div class="row">
                    <div class="col-md-12 mx-auto mb-5">
                        <div class="card">
                            <?php
                                if (isset($_GET['doctor_id'])){
                                    $doctor_id  = $_GET['doctor_id'];

                                    $sql_get_doctor  = "SELECT * FROM doctors WHERE doctor_id = '$doctor_id'";
                                    $res_doctor_data = mysqli_query($connect, $sql_get_doctor);

                                    $fetch_doctor = mysqli_fetch_assoc($res_doctor_data);
                                }
                            ?>
                            <div class="card-header">
                                <h4 class="text-uppercase text-info"><span class="text-dark text-capitalize">Doctor </span><?php echo $fetch_doctor['first_name'];?> <?php echo $fetch_doctor['last_name'];?> <span class="text-dark text-capitalize"> Details</span></h4>
                            </div>
                            <div class="card-body">
                                <div class="col-md-4 col-sm-12 float-left">
                                    <img src="../images/<?php echo $fetch_doctor['image'];?>" style="height: 200px; width: 100%">

                                    <label class="text-info font-weight-bold font-20 p-4"><?php echo $fetch_doctor['email']?></label>
                                    <label class="text-center font-weight-bold ml-4"> Total Appointment Patient :
                                        <span>
                                            <?php
                                                $get_total_work = "SELECT DISTINCT (COUNT(doctor_id)) as NOE FROM appointment a WHERE '$doctor_id'=a.doctor_id";

                                                $result_work = mysqli_query($connect, $get_total_work);

                                                $r = mysqli_fetch_assoc($result_work);

                                                echo $r['NOE'];
                                            ?>
                                        </span>
                                    </label>
                                </div>
                                <div class="col-md-8 col-sm-12 float-left">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" style="background-color: blue; color: white">
                                            <tr>
                                                <td class="text-center">Doctor Type</td>
                                                <td class="text-center" style="background-color: white; color: black; border: 1px solid black; border-left: none"><?php echo $fetch_doctor['category']?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">Doctor Name</td>
                                                <td class="text-center text-capitalize" style="background-color: white; color: black; border: 1px solid black; border-left: none"><?php echo $fetch_doctor['first_name']?> <?php echo $fetch_doctor['last_name']?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">Doctor Phone</td>
                                                <td class="text-center" style="background-color: white; color: black; border: 1px solid black; border-left: none"><?php echo $fetch_doctor['phone']?></td>

                                            </tr>
                                            <tr>
                                                <td class="text-center">Doctor Qualification</td>
                                                <td class="text-center" style="background-color: white; color: black; border: 1px solid black; border-left: none"><?php echo $fetch_doctor['degree']?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">Doctor Address</td>
                                                <td class="text-center" style="background-color: white; color: black; border: 1px solid black; border-left: none"><?php echo $fetch_doctor['address']?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">Doctor Gender</td>
                                                <td class="text-center" style="background-color: white; color: black; border: 1px solid black; border-left: none"><?php echo $fetch_doctor['gender']?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">Join Date </td>
                                                <td class="text-center" style="background-color: white; color: black; border: 1px solid black; border-left: none"><?php echo date('D-M-Y', strtotime($fetch_doctor['join_date']))?></td>
                                            </tr>

                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a class="float-right btn btn-success text-decoration-none" href="book_appointment.php">Book Appointment</a>
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
