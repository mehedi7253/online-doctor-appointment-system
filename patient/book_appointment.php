<?php
/**
 * Created by PhpStorm.
 * User: mehedi
 * Date: 8/9/2020
 * Time: 4:12 PM
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
                    <div class="col-md-12 mx-auto mb-5">
                        <div class="card">
                            <div class="card-header">
                                <h4>Appointment Doctors</h4>
                            </div>
                            <div class="card-body">
                                <form action="" method="POST">
                                    <div class="form-group">
                                        <label>Find Doctor: </label>

                                        <input type="text" id="search_data" class="col-8 ml-2"  placeholder="Search Doctor Or Consultant..."/>
                                        <button type="button" id="search" class="btn btn-primary"><i class="fas fa-search"></i> Search</button>
                                        <button type="button" id="refresh" class="btn btn-success"><i class="fas fa-redo-alt"></i></button>
                                    </div>
                                </form>
                                <br /><br />
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="alert-success">
                                        <tr>
                                            <th>Doctor</th>
                                            <th>Consultant</th>
                                            <th>Phone</th>
                                            <th>Available Time</th>
                                            <th>Appointment Charge</th>
                                            <th>Book</th>
                                            <th>Profile</th>
                                        </tr>
                                        </thead>
                                        <tbody id="data"></tbody>
                                    </table>
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
