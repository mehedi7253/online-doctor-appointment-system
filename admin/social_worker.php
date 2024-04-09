<?php
/**
 * Created by PhpStorm.
 * User: mehedi
 * Date: 9/2/2020
 * Time: 11:13 AM
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
                                <h4>Manage Social Worker</h4>
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
                                    if(isset($_SESSION['exist'])){
                                        echo "
           <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Email Error!</h4>
              ".$_SESSION['exist']."
            </div>
          ";
                                        unset($_SESSION['exist']);
                                    }
                                    ?>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                        <thead>
                                        <tr>
                                            <th>Serial</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Image</th>
                                            <th>Profile</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $sql = "SELECT * FROM social_worker";
                                        $res = mysqli_query($connect, $sql);
                                        ?>
                                        <?php $i = 1;
                                        while ($row = mysqli_fetch_assoc($res)){?>
                                            <tr>
                                                <td><?php echo $i++;?></td>
                                                <td class="text-capitalize"><?php echo $row['first_name'];?> <?php echo $row['last_name'];?></td>
                                                <td><?php echo $row['email'];?></td>
                                                <td><?php echo $row['phone'];?></td>
                                                <td>
                                                    <img src="../images/<?php echo $row['image']?>" style="height: 70px; width: 70px;">
                                                </td>
                                                <td>
                                                    <a href="social_worker_profile.php?id=<?php echo $row['worker_id'];?>" class="text-decoration-none"><i class='fa fa-eye'></i> View</a>
                                                </td>
                                            </tr>
                                        <?php }?>
                                        </tbody>
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
