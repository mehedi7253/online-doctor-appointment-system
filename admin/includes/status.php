<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 6/29/2020
 * Time: 8:22 PM
 */
?>
<div class="row ">
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
            <div class="card-statistic-4">
                <div class="align-items-center justify-content-between">
                    <div class="row ">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                            <div class="card-content">
                                <h5 class="font-15">Total Doctor</h5>
                                <h2 class="mb-3 font-18">
                                    <?php
                                        $sql = "SELECT count(doctor_id) AS totalDoctor FROM doctors WHERE category = 'doctor'";
                                        $res = mysqli_query($connect, $sql);
                                        $values = mysqli_fetch_assoc($res);
                                        $num_rows = $values['totalDoctor'];
                                        echo "<span style='font-size: 30px;'>$num_rows</span>";
                                    ?>
                                </h2>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                            <div class="banner-img">
                                <img src="../images/doctor-icon-avatar-white_136162-58.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
            <div class="card-statistic-4">
                <div class="align-items-center justify-content-between">
                    <div class="row ">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                            <div class="card-content">
                                <h5 class="font-15">Nutrition Experts</h5>
                                <h2 class="mb-3 font-18">
                                    <?php
                                        $sql = "SELECT count(doctor_id) AS totalDoctor FROM doctors WHERE category = 'nutrition'";
                                        $res = mysqli_query($connect, $sql);
                                        $values = mysqli_fetch_assoc($res);
                                        $num_rows = $values['totalDoctor'];
                                        echo "<span style='font-size: 30px;'>$num_rows</span>";
                                    ?>
                                </h2>

                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                            <div class="banner-img">
                                <img src="../images/doctor-icon-avatar-white_136162-58.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
            <div class="card-statistic-4">
                <div class="align-items-center justify-content-between">
                    <div class="row ">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                            <div class="card-content">
                                <h5 class="font-15">Social Worker</h5>
                                <h2 class="mb-3 font-18">
                                    <?php
                                    $sql = "SELECT count(worker_id) AS totalWorker FROM social_worker";
                                    $res = mysqli_query($connect, $sql);
                                    $values = mysqli_fetch_assoc($res);
                                    $num_rows = $values['totalWorker'];
                                    echo "<span style='font-size: 30px;'>$num_rows</span>";
                                    ?>
                                </h2>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                            <div class="banner-img">
                                <img src="assets/img/banner/4.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
            <div class="card-statistic-4">
                <div class="align-items-center justify-content-between">
                    <div class="row ">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                            <div class="card-content">
                                <h5 class="font-15">Psychologist</h5>
                                <h2 class="mb-3 font-18">
                                    <?php
                                        $sql = "SELECT count(doctor_id) AS totalDoctor FROM doctors WHERE category = 'psychologist'";
                                        $res = mysqli_query($connect, $sql);
                                        $values = mysqli_fetch_assoc($res);
                                        $num_rows = $values['totalDoctor'];
                                        echo "<span style='font-size: 30px;'>$num_rows</span>";
                                    ?>
                                </h2>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                            <div class="banner-img">
                                <img src="../images/doctor-icon-avatar-white_136162-58.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
            <div class="card-statistic-4">
                <div class="align-items-center justify-content-between">
                    <div class="row ">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                            <div class="card-content">
                                <h5 class="font-15">Patient</h5>
                                <h2 class="mb-3 font-18">
                                    <?php
                                        $sql = "SELECT count(patient_id) AS totalPatient FROM patient";
                                        $res = mysqli_query($connect, $sql);
                                        $values = mysqli_fetch_assoc($res);
                                        $num_rows = $values['totalPatient'];
                                        echo "<span style='font-size: 30px;'>$num_rows</span>";
                                    ?>
                                </h2>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                            <div class="banner-img">
                                <img src="../images/patient-bed-hospital-illness-admit-512.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
            <div class="card-statistic-4">
                <div class="align-items-center justify-content-between">
                    <div class="row ">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                            <div class="card-content">
                                <h5 class="font-15">Ambulance Service</h5>
                                <h2 class="mb-3 font-18">
                                    <?php
                                        $sql = "SELECT count(ambulance_service_id) AS totalAmbulance FROM ambulance_service";
                                        $res = mysqli_query($connect, $sql);
                                        $values = mysqli_fetch_assoc($res);
                                        $num_rows = $values['totalAmbulance'];
                                        echo "<span style='font-size: 30px;'>$num_rows</span>";
                                    ?>
                                </h2>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                            <div class="banner-img">
                                <img src="../images/Toyota-Hiace-Ambulance2.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
