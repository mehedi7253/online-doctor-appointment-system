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
                <!-- status-->
                <!-- end status-->

                <!--main content-->
                <div class="row">
                    <div class="col-md-8 mx-auto mb-5">
                        <div class="card">
                            <div class="card-header">
                                <h4>Change Your Profile Picture</h4>
                            </div>
                            <div class="card-body">
                                <?php
                                if (isset($_POST['pic'])){
                                    $fileinfo = PATHINFO($_FILES['image']['name']);
                                    $newfilename  = $fileinfo['filename']. "." .$fileinfo['extension'];
                                    move_uploaded_file($_FILES['image']['tmp_name'],"../images/" .$newfilename);
                                    $location = $newfilename;

                                    $update_profie_pic = "UPDATE patient SET image = '$location' WHERE email = '$_SESSION[email]'";
                                    mysqli_query($connect, $update_profie_pic);


                                    $sql = "SELECT * FROM patient WHERE email = '$_SESSION[email]'";
                                    $records = mysqli_query($connect, $sql);
                                    $count = mysqli_num_rows($records);

                                    if ($count == 1) {
                                        $row = mysqli_fetch_array($records);
                                        echo " $userdata[image]";

                                        echo "<script>document.location.href='update_pic.php'</script>";

                                    }
                                }
                                ?>
                                <div class="text-center">
                                    <img src="../images/<?php echo $userdata['image'];?>" class="img-fluid" style="height: 200px; width: 200px; border-radius: 50%">
                                </div>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Chose Photo</label>
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" name="pic" class="btn btn-success" value="Change Profile Pic">
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
