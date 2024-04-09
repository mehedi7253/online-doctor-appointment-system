<?php
/**
 * Created by PhpStorm.
 * User: mehedi
 * Date: 8/15/2020
 * Time: 10:12 PM
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
                                <h4>Manage Ambulance Service</h4>
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
                                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addnew"><i class="fa fa-plus"></i> Add New Ambulance</button>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                        <thead>
                                        <tr>
                                            <th>Serial</th>
                                            <th>Driver Name</th>
                                            <th> Phone</th>
                                            <th>Car Number</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                            <th>View More</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $sql = "SELECT * FROM ambulance_service";
                                        $res = mysqli_query($connect, $sql);
                                        ?>
                                        <?php $i = 1;
                                        while ($row = mysqli_fetch_assoc($res)){?>
                                            <tr>
                                                <td><?php echo $i++;?></td>
                                                <td class="text-capitalize"><?php echo $row['driver_name'];?></td>
                                                <td><?php echo $row['driver_phone'];?></td>
                                                <td><?php echo $row['car_number'];?></td>
                                                <td style="width: 20%;" class="text-justify"><?php echo $row['description'];?></td>
                                                <td>
                                                    <button class='btn btn-success btn-sm edit btn-flat' data-id='<?php echo $row['ambulance_service_id'];?>'><i class='fa fa-edit'></i> Edit</button>
                                                    <a href="delete_query_ambulance.php?ambulance_id=<?php echo $row['ambulance_service_id'];?>" class='btn btn-danger btn-sm text-white btn-flat'><i class='fa fa-edit'></i> Delete</a>
                                                </td>
                                                <td>
                                                    <a href="car_dtails.php?ambulance_id=<?php echo $row['ambulance_service_id'];?>" class="btn btn-primary"> View</a>
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
                <h5 class="modal-title" id="formModal">Add New Ambulance</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="add_query.php" method="post" enctype="multipart/form-data">
                    <div class="form-group col-md-6 col-sm-12 float-left">
                        <label class="font-weight-bold">Driver Name</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter Driver Name" name="driver_name">
                        </div>
                    </div>
                    <div class="form-group col-md-6 col-sm-12 float-left">
                        <label class="font-weight-bold">Driver Phone</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter Driver Phone" name="driver_phone">
                        </div>
                    </div>
                    <div class="form-group col-md-12 col-sm-12 float-left">
                        <label class="font-weight-bold">Car Description</label>
                        <div class="input-group">
                            <textarea name="description" class="form-control" placeholder="Enter Car Description"></textarea>
                        </div>
                    </div>
                    <div class="form-group col-md-6 col-sm-12 float-left">
                        <label class="font-weight-bold">Car Number</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter Car Phone" name="car_number">
                        </div>
                    </div>
                    <div class="form-group col-md-6 col-sm-12 float-left">
                        <label class="font-weight-bold">Rent Charge</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter Rent Charge" name="price">
                        </div>
                    </div>
                    <div class="form-group col-md-6 col-sm-12 float-left">
                        <label class="font-weight-bold">Car Image</label>
                        <div class="input-group">
                            <input type="file" name="image" class="form-control">
                        </div>
                    </div>

                    <div class="form-group col-md-6 col-sm-12 float-left">
                        <label class="font-weight-bold">Driving Licence</label>
                        <div class="input-group">
                            <input type="file" name="driving_licinence" class="form-control">
                        </div>
                    </div>
                    <div class="form-group col-md-6 col-sm-12 float-left">
                        <label class="font-weight-bold">Driver Image</label>
                        <div class="input-group">
                            <input type="file" name="driver_image" class="form-control">
                        </div>
                    </div>



                    <div class="form-group col-md-6 float-left">
                        <label class="p-2"></label>
                        <div class="input-group">
                            <button type="submit" class="btn btn-primary btn-flat btn-block" name="add_ambulance"><i class="fa fa-save"></i> Add New Medicine</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!--edit-->

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="formModal"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal"> Update Ambulance Service Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="update_query.php" method="post" enctype="multipart/form-data">
                    <div class="form-group col-md-6 col-sm-12 float-left">
                        <input type="hidden" class="ambulance_service_id" name="ambulance_service_id">
                        <label class="font-weight-bold">Driver Name</label>
                        <div class="input-group">
                            <input type="text" class="form-control text-capitalize" placeholder="Enter Driver Name" name="driver_name" id="ed_driver_name">
                        </div>
                    </div>
                    <div class="form-group col-md-6 col-sm-12 float-left">
                        <label class="font-weight-bold">Driver Phone</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter Driver Phone" name="driver_phone" id="ed_driver_phone">
                        </div>
                    </div>
                    <div class="form-group col-md-12 col-sm-12 float-left">
                        <label class="font-weight-bold">Car Description</label>
                        <div class="input-group">
                            <textarea name="description" class="form-control" placeholder="Enter Car Description" id="ed_description"></textarea>
                        </div>
                    </div>
                    <div class="form-group col-md-6 col-sm-12 float-left">
                        <label class="font-weight-bold">Car Number</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter Car Phone" name="car_number" id="ed_car_number">
                        </div>
                    </div>
                    <div class="form-group col-md-6 col-sm-12 float-left">
                        <label class="font-weight-bold">Rent Charge</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter Rent Charge" name="price" id="ed_price">
                        </div>
                    </div>
                    <div class="form-group col-md-6 col-sm-12 float-left">
                        <label class="font-weight-bold">Car Image</label>
                        <div class="input-group">
                            <input type="file" name="image" class="form-control" id="ed_image">
                        </div>
                    </div>

                    <div class="form-group col-md-6 col-sm-12 float-left">
                        <label class="font-weight-bold">Driving Licence</label>
                        <div class="input-group">
                            <input type="file" name="driving_licinence" class="form-control" id="ed_driving_licinence">
                        </div>
                    </div>
                    <div class="form-group col-md-6 col-sm-12 float-left">
                        <label class="font-weight-bold">Driver Image</label>
                        <div class="input-group">
                            <input type="file" name="driver_image" class="form-control" id="ed_driver_image">
                        </div>
                    </div>

                    <div class="form-group col-md-6 col-sm-12 float-left">
                        <div class="input-group">
                            <label class="p-2"></label>
                            <button type="submit" class="btn btn-primary btn-flat btn-block" name="update_ambulance"><i class="fa fa-save"></i> Update Ambulance Service Information</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<script>
    $(function(){
        $(document).on('click', '.edit', function(e){
            e.preventDefault();
            $('#edit').modal('show');
            var id = $(this).data('id');
            getRow(id);
        });

    });

    function getRow(id){
        $.ajax({
            type: 'POST',
            url: 'update_query.php',
            data: {ambulance_service_id:id},
            dataType: 'json',
            success: function(response){
                $('.ambulance_service_id').val(response.ambulance_service_id);
                $('#ed_driver_name').val(response.driver_name);
                $('#ed_driver_phone').val(response.driver_phone);
                $('#ed_description').val(response.description);
                $('#ed_car_number').val(response.car_number);
                $('#ed_price').val(response.price);
                $('#ed_image').val(response.image);
                $('#ed_driver_image').val(response.driver_image);
                $('#ed_driving_licinence').val(response.driving_licinence);
            }
        });
    }


</script>