<?php
/**
 * Created by PhpStorm.
 * User: mehedi
 * Date: 8/10/2020
 * Time: 9:33 PM
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
                    <div class="col-md-11 mx-auto mb-5">
                        <div class="card">
                            <div class="card-header">
                                <h4>Available Doctor's</h4>
                            </div>
                            <div class="card-body">
                                <nav>
                                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active bg-secondary" id="nav-doctor-tab" data-toggle="tab" href="#nav-doctor" role="tab" aria-controls="nav-doctor" aria-selected="true"><span class="ml-3 text-white font-weight-bold">Doctor </span> </a>
                                        <a class="nav-item nav-link bg-secondary" id="nav-nutrition-tab" data-toggle="tab" href="#nav-nutrition" role="tab" aria-controls="nav-nutrition" aria-selected="false"> <span class="ml-3 text-white font-weight-bold"> Nutrition</span></a>
                                        <a class="nav-item nav-link bg-secondary" id="nav-psychologist-tab" data-toggle="tab" href="#nav-psychologist" role="tab" aria-controls="nav-psychologist" aria-selected="false"> <span class="ml-3 text-white font-weight-bold"> Psychologist</span></a>
                                        <a class="nav-item nav-link bg-secondary" id="nav-worker-tab" data-toggle="tab" href="#nav-worker" role="tab" aria-controls="nav-worker" aria-selected="false"> <span class="ml-3 text-white font-weight-bold"> Social Worker</span></a>
                                        <a class="nav-item nav-link bg-secondary" id="nav-patient-tab" data-toggle="tab" href="#nav-patient" role="tab" aria-controls="nav-worker" aria-selected="false"> <span class="ml-3 text-white font-weight-bold"> patient</span></a>

                                    </div>
                                </nav>
                                <br/>
                                <br/>

                                <div class="tab-content" id="nav-tabContent">

                                    <div class="tab-pane fade show active" id="nav-doctor" role="tabpanel" aria-labelledby="nav-doctor-tab">
                                        <div class="form_1">
                                            <div class="table-responsive">
                                                <table class="table tab-bordered">
                                                    <?php
                                                        $sql = "SELECT * FROM doctors WHERE category = 'doctor'";
                                                        $res = mysqli_query($connect, $sql);
                                                    ?>

                                                    <?php while ($row = mysqli_fetch_assoc($res)){?>
                                                        <tr>
                                                            <td class="text-capitalize border-bottom"><?php echo $row['first_name'] . ' '. $row['last_name'];?></td>
                                                            <td class="text-capitalize border-bottom">
                                                                <a class="text-decoration-none" href="chat_box_doctor.php?message_id=<?php echo $row['doctor_id'];?>">Message Now</a>
                                                            </td>
                                                            <td class="text-capitalize border-bottom"><i class="fas fa-circle" style="color: green"></i></td>
                                                        </tr>
                                                    <?php }?>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="nav-nutrition" role="tabpanel" aria-labelledby="nav-nutrition-tab">
                                        <div class="form_1">
                                            <div class="table-responsive">
                                                <table class="table tab-bordered">
                                                    <?php
                                                    $sql_nutrition = "SELECT * FROM doctors WHERE category = 'nutrition'";
                                                    $res_nutrition = mysqli_query($connect, $sql_nutrition);
                                                    ?>

                                                    <?php while ($row_nutrition = mysqli_fetch_assoc($res_nutrition)){?>
                                                        <tr>
                                                            <td class="text-capitalize border-bottom"><?php echo $row_nutrition['first_name'] . ' '. $row_nutrition['last_name'];?></td>
                                                            <td class="text-capitalize border-bottom">
                                                                <a class="text-decoration-none" href="chat_box_nutrition.php?message_id=<?php echo $row_nutrition['doctor_id'];?>">Message Now</a>
                                                            </td>
                                                            <td class="text-capitalize border-bottom"><i class="fas fa-circle" style="color: green"></i></td>
                                                        </tr>
                                                    <?php }?>
                                                </table>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="tab-pane fade" id="nav-psychologist" role="tabpanel" aria-labelledby="nav-psychologist-tab">
                                        <div class="form_1 mt-4">
                                            <div class="table-responsive">
                                                <table class="table tab-bordered">
                                                    <?php
                                                    $sql_psychologist = "SELECT * FROM doctors WHERE category = 'psychologist'";
                                                    $res_psychologist = mysqli_query($connect, $sql_psychologist);

                                                    $_SESSION['psychologist'] = 'psychologist';
                                                    ?>

                                                    <?php while ($row = mysqli_fetch_assoc($res_psychologist)){?>
                                                        <tr>
                                                            <td class="text-capitalize border-bottom"><?php echo $row['first_name'] . ' '. $row['last_name'];?></td>
                                                            <td class="text-capitalize border-bottom">
                                                                <a class="text-decoration-none" href="chat_box_ psychologist.php?message_id=<?php echo $row['doctor_id'];?>">Message Now</a>
                                                            </td>
                                                            <td class="text-capitalize border-bottom"><i class="fas fa-circle" style="color: green"></i></td>
                                                        </tr>
                                                    <?php }?>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="nav-worker" role="tabpanel" aria-labelledby="nav-worker-tab">
                                        <div class="form_1 mt-4">
                                            <div class="table-responsive">
                                                <table class="table tab-bordered">
                                                    <?php
                                                    $sql_psychologist = "SELECT * FROM social_worker";
                                                    $res_psychologist = mysqli_query($connect, $sql_psychologist);

                                                    ?>

                                                    <?php while ($row = mysqli_fetch_assoc($res_psychologist)){?>
                                                        <tr>
                                                            <td class="text-capitalize border-bottom"><?php echo $row['first_name'] . ' '. $row['last_name'];?></td>
                                                            <td class="text-capitalize border-bottom">
                                                                <a class="text-decoration-none" href="chat_box_worker.php?message_id=<?php echo $row['worker_id'];?>">Message Now</a>
                                                            </td>
                                                            <td class="text-capitalize border-bottom"><i class="fas fa-circle" style="color: green"></i></td>
                                                        </tr>
                                                    <?php }?>
                                                </table>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="tab-pane fade" id="nav-patient" role="tabpanel" aria-labelledby="nav-patient-tab">
                                        <div class="form_1 mt-4">
                                            <div class="table-responsive">
                                                <table class="table tab-bordered">
                                                    <?php
                                                    $sql_psychologist = "SELECT * FROM patient";
                                                    $res_psychologist = mysqli_query($connect, $sql_psychologist);

                                                    ?>

                                                    <?php while ($row = mysqli_fetch_assoc($res_psychologist)){?>
                                                        <tr>
                                                            <td class="text-capitalize border-bottom"><?php echo $row['first_name'] . ' '. $row['last_name'];?></td>
                                                            <td class="text-capitalize border-bottom">
                                                                <a class="text-decoration-none" href="chat_box_patient.php?message_id=<?php echo $row['patient_id'];?>">Message Now</a>
                                                            </td>
                                                            <td class="text-capitalize border-bottom"><i class="fas fa-circle" style="color: green"></i></td>
                                                        </tr>
                                                    <?php }?>
                                                </table>
                                            </div>
                                        </div>
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
