<?php
/**
 * Created by PhpStorm.
 * User: mehedi
 * Date: 8/29/2020
 * Time: 9:58 PM
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
                                <h4>Complain Box</h4>
                            </div>
                            <div class="card-body">
                                <h5 class="mb-5">
                                    <?php
                                    if (isset($_POST['btn'])){
                                        $complain_for   = $_POST['complain_for'];
                                        $issue          = $_POST['issue'];
                                        $complain       = $_POST['complain'];

                                        if ($complain_for == ''){
                                            echo "<span class='text-danger'>Please Select Your Complain Type</span><br/>";
                                        }
                                        if ($issue == ''){
                                            echo "<span class='text-danger'>Please Write issue Title</span><br/>";
                                        }
                                        if ($complain == ''){
                                            echo "<span class='text-danger'>Please Write Complain</span><br/>";
                                        }

                                        if ($complain_for && $issue && $complain){
                                            $create = @date('Y-m-d H:i:s');

                                            $sql = "INSERT INTO complain_box (complain_for,issue, complain, date) VALUES ('$complain_for', '$issue', '$complain', '$create')";
                                            $res = mysqli_query($connect, $sql);

                                            echo "<span class='text-success'>Your Report Submited....</span><br/>";
                                        }else{
                                            echo "<span class='text-danger'>Your Report Submited Fialed....</span><br/>";
                                        }
                                    }
                                    ?>
                                </h5>

                                <form action="" method="post">
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right  col-lg-3">Select Your Complain Type</label>
                                        <div class="col-sm-12 col-md-7">
                                            <select class="form-control" name="complain_for">
                                                <option>--------Select One-------</option>
                                                <option value="Medicine">Medicine Services</option>
                                                <option value="Ambulance">Ambulance Services</option>
                                                <option value="Doctor">Doctor Services</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"> Issue Title</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="issue" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Write Your Complain</label>
                                        <div class="col-sm-12 col-md-7">
                                            <textarea class="summernote form-control" name="complain"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="submit" class="btn btn-primary" name="btn" value="Submit">
                                        </div>
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