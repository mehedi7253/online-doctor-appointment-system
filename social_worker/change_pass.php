<?php
/**
 * Created by PhpStorm.
 * User: mehedi
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
                <!-- status-->
                <!-- end status-->

                <!--main content-->
                <div class="row">
                    <div class="col-md-10 mx-auto mb-5">
                        <div class="card">
                            <div class="card-header">
                                <h4>Change Your Password</h4>
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
                                if (isset($_POST['change_pass'])){
                                    $old_pass = $_POST['old_pass'];
                                    $new_pass = $_POST['password'];

                                    $has_pass = hash('sha256', $old_pass);
                                    $new_pass_hash = hash('sha256', $new_pass);

                                    if ($old_pass == ''){
                                        echo "<span class='text-danger'>Type Your Old Password</span><br/>";
                                    }
                                    if ($new_pass == ''){
                                        echo "<span class='text-danger'>Type Your New Password</span><br/>";
                                    }

                                    if ($old_pass && $has_pass){
                                        $sql = "SELECT * FROM social_worker WHERE worker_id = '$userdata[worker_id]' AND password = '$has_pass'";
                                        $result = mysqli_query($connect, $sql);

                                        $up = mysqli_fetch_assoc($result);

                                        if ($up !=0){
                                            $change_pass = "UPDATE social_worker SET password = '$new_pass_hash' WHERE worker_id = '$userdata[worker_id]'";
                                            $res_change  = mysqli_query($connect, $change_pass);

                                            $_SESSION['success'] = 'Password Change Successful';
                                            echo "<script>document.location.href='change_pass.php'</script>";
                                         }else{
                                            $_SESSION['error'] = 'Password Does Not Match With Current Password';
                                            echo "<script>document.location.href='change_pass.php'</script>";                                        }
                                    }
                                }
                                ?>
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label>Type Your Old Password</label>
                                        <input type="password" name="old_pass" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Type New Password</label>
                                        <input type="password" name="password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" name="change_pass" class="btn btn-success" value="Change Password">
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
