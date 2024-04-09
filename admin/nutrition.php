<?php
/**
 * Created by PhpStorm.
 * User: mehedi
 * Date: 8/18/2020
 * Time: 1:15 PM
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
                                <h4>Manage Doctors</h4>
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
                                <div class="box-header with-border">
                                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addnew"><i class="fa fa-plus"></i> Add New Nutrition Experts</button>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                        <thead>
                                        <tr>
                                            <th>Serial</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Status</th>
                                            <th>Image</th>
                                            <th>Profile</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $sql = "SELECT * FROM doctors WHERE category = 'nutrition'";
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
                                                    <?php
                                                    $status = $row['status'];
                                                    // echo $status;

                                                    if (($status) == '0'){?>
                                                        <a href="doctor_status.php?status=<?php echo $row['doctor_id'];?>" class="text-decoration-none text-danger" onclick="return confirm('Block <?php echo $row['first_name'];?>')" > <i class="fas fa-user-lock"></i> Block</a>
                                                        <?php
                                                    }
                                                    if (($status) == '1'){?>
                                                        <a href="doctor_status.php?status=<?php echo $row['doctor_id'];?>"  class="text-decoration-none text-success" onclick="return confirm('UnBlock <?php echo $row['first_name'];?>')"> <i class="fas fa-unlock-alt"></i> Unblock </a>
                                                        <?php
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <img src="../images/<?php echo $row['image']?>" style="height: 70px; width: 70px;">
                                                </td>
                                                <td>
                                                    <a href="doctor_profile.php?doctor_id=<?php echo $row['doctor_id'];?>" class="text-decoration-none"><i class='fa fa-eye'></i> View</a>
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




<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="formModal"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal">Add New Nutrition Experts</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="add_query.php" method="post" enctype="multipart/form-data">
                    <div class="form-group col-md-6 col-sm-12 float-left">
                        <label class="font-weight-bold">First Name</label>
                        <div class="input-group">
                            <input type="text" class="form-control" hidden value="nutrition" name="category">
                            <input type="text" class="form-control" placeholder="Enter First Name" name="first_name">
                        </div>
                    </div>

                    <div class="form-group col-md-6 col-sm-12 float-left">
                        <label class="font-weight-bold">Last Name</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter Last Name" name="last_name">
                        </div>
                    </div>

                    <div class="form-group col-md-6 col-sm-12 float-left">
                        <label class="font-weight-bold">Email</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter Email" name="email">
                        </div>
                    </div>

                    <div class="form-group col-md-6 col-sm-12 float-left">
                        <label class="font-weight-bold">Phone Number</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Phone Number" name="phone">
                        </div>
                    </div>
                    <div class="form-group col-md-6 col-sm-12 float-left">
                        <label class="font-weight-bold">Qualification</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter Qualification " name="degree">
                        </div>
                    </div>
                    <!--                    <div class="form-group col-md-6 col-sm-12 float-left">-->
                    <!--                        <label class="font-weight-bold">Category</label>-->
                    <!--                        <div class="input-group">-->
                    <!--                           <select class="form-control" name="category">-->
                    <!--                               <option>----------Select One----------</option>-->
                    <!--                               <option value="doctor">Doctor</option>-->
                    <!--                               <option value="nutrition">Nutrition </option>-->
                    <!--                               <option value="physical trainer">Physical Trainer</option>-->
                    <!--                               <option value="Psychologist">Psychologist</option>-->
                    <!--                           </select>-->
                    <!--                        </div>-->
                    <!--                    </div>-->

                    <div class="form-group col-md-6 col-sm-12 float-left">
                        <label class="font-weight-bold">Image</label>
                        <div class="input-group">
                            <input type="file" class="form-control" name="image">
                            <input type="password" hidden class="form-control" value="123" name="password">
                        </div>
                    </div>
                    <div class="form-group col-md-6 float-left">
                        <label class="p-2"></label>
                        <div class="input-group">
                            <button type="submit" class="btn btn-primary btn-flat btn-block" name="add_nutrition"><i class="fa fa-save"></i> Add New Doctor</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
