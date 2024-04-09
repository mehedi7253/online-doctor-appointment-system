<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 7/1/2020
 * Time: 6:07 PM
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
                <!--main content-->
                <div class="row">
                    <div class="col-md-10 mx-auto mb-5">
                        <div class="card">
                             <div class="card-header">
                                 <h3 class="text-center">Update Your Profile</h3>
                             </div>
                            <div class="card-body">
                                <p>
                                    <?php
                                    if (isset($_POST['update_profile'])){
                                        $student_id        = $_POST['student_id'];
                                        $first_name        = $_POST['first_name'];
                                        $last_name         = $_POST['last_name'];
                                        $contact           = $_POST['contact'];
                                        $birthday          = $_POST['birthday'];
                                        $present_address   = $_POST['present_address'];
                                        $parmanent_address = $_POST['parmanent_address'];
                                        $gurdian           = $_POST['gurdian'];
                                        $relation          = $_POST['relation'];
                                        $father_name       = $_POST['father_name'];
                                        $father_phone      = $_POST['father_phone'];
                                        $father_ocapation  = $_POST['father_ocapation'];
                                        $income            = $_POST['income'];
                                        $mother_name       = $_POST['mother_name'];
                                        $mother_phone      = $_POST['mother_phone'];
                                        $mother_ocaption   = $_POST['mother_ocaption'];
                                        $mother_income     = $_POST['mother_income'];
                                        $gender            = $_POST['gender'];


                                        if ($first_name == ''){
                                            echo "<span class='text-danger'>Pls Enter Your First Name</span><br/>";
                                        }
                                        if ($last_name == ''){
                                            echo "<span class='text-danger'>Pls Enter Your Last Name</span><br/>";
                                        }
                                        if ($contact == ''){
                                            echo "<span class='text-danger'>Pls Enter Your Phone Number</span><br/>";
                                        }
                                        if ($birthday == ''){
                                            echo "<span class='text-danger'>Pls Select Your Birth Date</span><br/>";
                                        }
                                        if ($present_address == ''){
                                            echo "<span class='text-danger'>Pls Enter Present Address </span><br/>";
                                        }
                                        if ($parmanent_address == ''){
                                            echo "<span class='text-danger'>Pls Enter Parmanent Address </span><br/>";
                                        }
                                        if ($gurdian == ''){
                                            echo "<span class='text-danger'>Pls Enter Gurdian Name  </span><br/>";
                                        }
                                        if ($relation == ''){
                                            echo "<span class='text-danger'>Pls Enter  Relation With Your Gurdian</span><br/>";
                                        }
                                        if ($father_name == ''){
                                            echo "<span class='text-danger'>Pls Enter Father Name  </span><br/>";
                                        }
                                        if ($father_phone == ''){
                                            echo "<span class='text-danger'>Pls Enter Father Phone  </span><br/>";
                                        }
                                        if ($father_ocapation == ''){
                                            echo "<span class='text-danger'>Pls Enter Father Occupation  </span><br/>";
                                        }
                                        if ($income == ''){
                                            echo "<span class='text-danger'>Pls Enter Father Yearly Income  </span><br/>";
                                        }

                                        if ($mother_name == ''){
                                            echo "<span class='text-danger'>Pls Enter Mother Name  </span><br/>";
                                        }
                                        if ($mother_phone == ''){
                                            echo "<span class='text-danger'>Pls Enter Mother Phone  </span><br/>";
                                        }
                                        if ($mother_ocaption == ''){
                                            echo "<span class='text-danger'>Pls Enter Mother Occupation  </span><br/>";
                                        }
                                        if ($mother_income == ''){
                                            echo "<span class='text-danger'>Pls Enter Mother Yearly Income  </span><br/>";
                                        }
                                        if ($gender == ''){
                                            echo "<span class='text-danger'>Pls Select Your Gender  </span><br/>";
                                        }



                                        if ($student_id && $first_name && $last_name && $contact && $birthday && $present_address && $parmanent_address && $gurdian && $relation && $father_name && $father_phone && $father_ocapation && $income && $mother_name && $mother_phone && $mother_ocaption && $mother_ocaption && $gender){
                                            $sql = "UPDATE students SET 
                                                    first_name        = '$first_name',
                                                    last_name         = '$last_name',
                                                    contact           = '$contact',
                                                    birthday          = '$birthday',
                                                    present_address   = '$present_address',
                                                    parmanent_address = '$parmanent_address',
                                                    gurdian           = '$gurdian',
                                                    relation          = '$relation',
                                                    father_name       = '$father_name',
                                                    father_phone      = '$father_phone',
                                                    father_ocapation  = '$father_ocapation',
                                                    income            = '$income',
                                                    mother_name       = '$mother_name',
                                                    mother_phone      = '$mother_phone',
                                                    mother_ocaption   = '$mother_ocaption',
                                                    mother_income     = '$mother_income',
                                                    gender            = '$gender' WHERE student_id = $student_id
                                                  ";

                                            $res = mysqli_query($connect, $sql);

                                            echo "<span class='text-success'>Update Successful</span>";
//                                            echo "<script>document.location.href='update_profile.php'</script>";
                                        }else{
                                            echo "<span class='text-danger'>Update Failed</span>";
                                        }
                                    }
                                    ?>
                                </p>
                                <form action="" method="post">
                                    <div class="form-group col-md-6 float-left">
                                        <label>First Name: </label>
                                        <input name="student_id" hidden value="<?php echo $userdata['student_id'];?>">
                                        <input type="text" name="first_name" class="form-control" value="<?php if($_POST) {
                                            echo $_POST['first_name'];
                                        } else {
                                            echo $userdata['first_name'];
                                        } ?>">
                                    </div>
                                    <div class="form-group col-md-6 float-left">
                                        <label>Last Name: </label>
                                        <input type="text" name="last_name" class="form-control" value="<?php if($_POST) {
                                            echo $_POST['last_name'];
                                        } else {
                                            echo $userdata['last_name'];
                                        } ?>">
                                    </div>
                                    <div class="form-group ml-3">
                                        <label>Email: </label>
                                        <input type="email" disabled name="" class="form-control" value="<?php echo $userdata['username'];?>">
                                    </div>
                                    <div class="form-group col-md-6 float-left">
                                        <label>Contact Number: </label>
                                        <input type="number" name="contact" class="form-control" value="<?php if($_POST) {
                                            echo $_POST['contact'];
                                        } else {
                                            echo $userdata['contact'];
                                        } ?>">
                                    </div>
                                    <div class="form-group col-md-6 float-left">
                                        <label>Date of Birth: </label>
                                        <input type="date" name="birthday" class="form-control" value="<?php if($_POST) {
                                            echo $_POST['birthday'];
                                        } else {
                                            echo $userdata['birthday'];
                                        } ?>">
                                    </div>
                                    <div class="form-group col-md-6 float-left">
                                        <label>Prsent Address: </label>
                                        <textarea class="form-control" name="present_address"><?php echo $userdata['present_address'];?></textarea>
                                    </div>
                                    <div class="form-group col-md-6 float-left">
                                        <label>parmanent Address: </label>
                                        <textarea class="form-control" name="parmanent_address"><?php echo $userdata['parmanent_address'];?></textarea>
                                    </div>
                                    <div class="form-group col-md-6 float-left">
                                        <label>Guardian Name: </label>
                                        <input type="text" name="gurdian" class="form-control" value="<?php if($_POST) {
                                            echo $_POST['gurdian'];
                                        } else {
                                            echo $userdata['gurdian'];
                                        } ?>">
                                    </div>
                                    <div class="form-group col-md-6 float-left">
                                        <label>Relation With Guardian : </label>
                                        <input type="text" name="relation" class="form-control" value="<?php if($_POST) {
                                            echo $_POST['relation'];
                                        } else {
                                            echo $userdata['relation'];
                                        } ?>">
                                    </div>
                                    <div class="form-group col-md-6 float-left">
                                        <label>Father Name : </label>
                                        <input type="text" name="father_name" class="form-control" value="<?php if($_POST) {
                                            echo $_POST['father_name'];
                                        } else {
                                            echo $userdata['father_name'];
                                        } ?>">
                                    </div>
                                    <div class="form-group col-md-6 float-left">
                                        <label>Father Phone Number : </label>
                                        <input type="text" name="father_phone" class="form-control" value="<?php if($_POST) {
                                            echo $_POST['father_phone'];
                                        } else {
                                            echo $userdata['father_phone'];
                                        } ?>">
                                    </div>

                                    <div class="form-group col-md-6 float-left">
                                        <label>Father Occupation : </label>
                                        <input type="text" name="father_ocapation" class="form-control" value="<?php if($_POST) {
                                            echo $_POST['father_ocapation'];
                                        } else {
                                            echo $userdata['father_ocapation'];
                                        } ?>">
                                    </div>

                                    <div class="form-group col-md-6 float-left">
                                        <label>Yearly Income : </label>
                                        <input type="text" name="income" class="form-control" value="<?php if($_POST) {
                                            echo $_POST['income'];
                                        } else {
                                            echo $userdata['income'];
                                        } ?>">
                                    </div>

                                    <div class="form-group col-md-6 float-left">
                                        <label>Mother Name : </label>
                                        <input type="text" name="mother_name" class="form-control" value="<?php if($_POST) {
                                            echo $_POST['mother_name'];
                                        } else {
                                            echo $userdata['mother_name'];
                                        } ?>">
                                    </div>
                                    <div class="form-group col-md-6 float-left">
                                        <label>Mother Phone Number : </label>
                                        <input type="text" name="mother_phone" class="form-control" value="<?php if($_POST) {
                                            echo $_POST['mother_phone'];
                                        } else {
                                            echo $userdata['mother_phone'];
                                        } ?>">
                                    </div>

                                    <div class="form-group col-md-6 float-left">
                                        <label>Mother Occupation : </label>
                                        <input type="text" name="mother_ocaption" class="form-control" value="<?php if($_POST) {
                                            echo $_POST['mother_ocaption'];
                                        } else {
                                            echo $userdata['mother_ocaption'];
                                        } ?>">
                                    </div>

                                    <div class="form-group col-md-6 float-left">
                                        <label>Yearly Income : </label>
                                        <input type="text" name="mother_income" class="form-control" value="<?php if($_POST) {
                                            echo $_POST['mother_income'];
                                        } else {
                                            echo $userdata['mother_income'];
                                        } ?>">
                                    </div>
                                    <div class="form-group ml-3">
                                        <label>Gender: </label><br/>
                                        <input type="radio" name="gender" value="Male"> Male
                                        <input type="radio" name="gender" value="Fe-Male"> Fe-Male
                                    </div>

                                    <div class="form-group ml-3">
                                        <input type="submit" name="update_profile" class="btn btn-primary" value="Update Profile">
                                    </div>
                                </form>
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
