<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 6/29/2020
 * Time: 8:22 PM
 */
?>
<div class="row ">
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
            <div class="card-statistic-4">
                <div class="align-items-center justify-content-between">
                    <div class="row ">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                            <div class="card-content">
                                <h5 class="font-15">Total Appointment</h5>
                                <h2 class="mb-3 font-18">
                                    <?php
                                    $get_total_work = "SELECT DISTINCT (COUNT(doctor_id)) as NOE FROM appointment a WHERE $userdata[doctor_id]=a.doctor_id";

                                    $result_work = mysqli_query($connect, $get_total_work);

                                    $r = mysqli_fetch_assoc($result_work);

                                    echo $r['NOE'];
                                    ?>
                                </h2>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                            <div class="banner-img">
                                <img src="assets/img/banner/1.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
            <div class="card-statistic-4">
                <div class="align-items-center justify-content-between">
                    <div class="row ">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                            <div class="card-content">
                                <h5 class="font-15">Total Earning</h5>
                                <h2 class="mb-3 font-18">
                                    <?php
                                     $sql = "SELECT payable, SUM(payable) AS totalEarn FROM appointment_invoice WHERE doctor_id = '$userdata[doctor_id]'";
                                     $res = mysqli_query($connect, $sql);

                                     $total = mysqli_fetch_assoc($res);

                                     echo number_format($total['totalEarn'], '2');
                                    ?>
                                    T.K
                                </h2>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                            <div class="banner-img">
                                <img src="assets/img/banner/2.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
