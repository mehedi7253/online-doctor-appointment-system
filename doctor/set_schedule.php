<?php
/**
 * Created by PhpStorm.
 * User: mehedi
 * Date: 8/10/2020
 * Time: 7:37 PM
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
                    <div class="col-md-8 mx-auto mb-5">
                        <div class="card">
                            <div class="card-header">
                                <h4>Manage Schedule</h4>
                            </div>
                            <div class="card-body">
                                <h3>
                                <?php
                                    if (isset($_POST['set_schedule'])){

                                        $doctor_id = $_POST['doctor_id'];
                                        $schedule  = $_POST['schedule'];

                                        if ($schedule == " "){
                                            echo "<span class='text-danger'>Select One.!</span><br/>";
                                        }

                                        if ($schedule) {
                                            $sql = "UPDATE doctors SET schedule = '$schedule' WHERE doctors.doctor_id = '$doctor_id'";
                                            $res = mysqli_query($connect, $sql);

                                            echo "<span class='text-success'>Update Successful....!</span><br/>";

                                        }else{
                                            echo "<span class='text-danger'>Update Failed....!</span><br/>";

                                        }
                                    }

                                ?>
                                </h3>
                                <form action="" method="post">
                                    <div class="form-group">
                                        <input name="doctor_id" hidden value="<?php echo $userdata['doctor_id'];?>">
                                        <label>Set Schedule</label>
                                        <select name="schedule" class="form-control">
                                            <option>--------Select One--------</option>
                                            <option value="Morning">Morning (8.00 AM - 12.00 AM) </option>
                                            <option value="After Noon">After Noon (12.00 PM - 3.00 PM) </option>
                                            <option value="Evening">Evening (4.00 PM - 7.00 PM) </option>
                                            <option value="Night">Night (7.00 PM - 12.00 AM)</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="set_schedule" class="btn btn-success"> Submit
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
