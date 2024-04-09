<?php
/**
 * Created by PhpStorm.
 * User: mehedi
 * Date: 8/11/2020
 * Time: 12:19 PM
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
                                <h4>Manage Medicine</h4>
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
                                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addnew"><i class="fa fa-plus"></i> Add New Medicine</button>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                        <thead>
                                        <tr>
                                            <th>Serial</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th>Change Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $sql = "SELECT * FROM medicine";
                                        $res = mysqli_query($connect, $sql);
                                        ?>
                                        <?php $i = 1;
                                        while ($row = mysqli_fetch_assoc($res)){?>
                                            <tr>
                                                <td><?php echo $i++;?></td>
                                                <td class="text-capitalize"><?php echo $row['name'];?></td>
                                                <td><?php echo $row['price'];?></td>
                                                <td style="width: 25%;" class="text-justify"><?php echo $row['description'];?></td>
                                                <td>
                                                    <img src="../images/<?php echo $row['image']?>" style="height: 70px; width: 70px;">
                                                </td>
                                                <td>
                                                    <?php
                                                    $status = $row['status'];
                                                    // echo $status;

                                                    if (($status) == '0'){?>
                                                        <a href="medicine_status.php?status=<?php echo $row['medecine_id'];?>" class="text-decoration-none text-white btn btn-success" onclick="return confirm('Are You Sure To Stock Out   <?php echo $row['name'];?>')" > Stock Available </a>
                                                        <?php
                                                    }
                                                    if (($status) == '1'){?>
                                                        <a href="medicine_status.php?status=<?php echo $row['medecine_id'];?>" class="text-decoration-none text-white btn btn-danger" onclick="return confirm('Are You Sure To Available <?php echo $row['name'];?>')" > Stock Not Available</a>
                                                        <?php
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <button class='btn btn-success btn-sm edit btn-flat' data-id='<?php echo $row['medecine_id'];?>'><i class='fa fa-edit'></i> Edit</button>
                                                    <a href="delete_query.php?medecine_del_id=<?php echo $row['medecine_id'];?>" class='btn btn-danger btn-sm text-white btn-flat'><i class='fa fa-edit'></i> Delete</a>
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
                    <h5 class="modal-title" id="formModal">Add New Medicine</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="add_query.php" method="post" enctype="multipart/form-data">
                        <div class="form-group col-md-6 col-sm-12 float-left">
                            <label class="font-weight-bold">Medicine Name</label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Enter Medicine Name" name="name">
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-12 float-left">
                            <label class="font-weight-bold">Medicine Price</label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Enter Medicine Price" name="price">
                            </div>
                        </div>
                        <div class="form-group col-md-12 col-sm-12 float-left">
                            <label class="font-weight-bold">Medicine Description</label>
                            <div class="input-group">
                                <textarea name="description" class="form-control" placeholder="Enter Medicine Description"></textarea>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-12 float-left">
                            <label class="font-weight-bold">Medicine Image</label>
                            <div class="input-group">
                                <input type="file" name="image" class="form-control">
                            </div>
                        </div>

                        <div class="form-group col-md-6 float-left">
                            <label class="p-2"></label>
                            <div class="input-group">
                                <button type="submit" class="btn btn-primary btn-flat btn-block" name="add_medicine"><i class="fa fa-save"></i> Add New Medicine</button>
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
                    <h5 class="modal-title" id="formModal"> Update Medicine Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="update_query.php" method="post" enctype="multipart/form-data">
                        <div class="form-group col-md-6 col-sm-12 float-left">
                            <input type="hidden" class="medecine_id" name="medecine_id">
                            <label class="font-weight-bold">Medicine Name</label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Enter Medicine Name" name="name" id="ed_name">
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-12 float-left">
                            <label class="font-weight-bold">Medicine Price</label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Enter Medicine Price" name="price" id="ed_price">
                            </div>
                        </div>
                        <div class="form-group col-md-12 col-sm-12 float-left">
                            <label class="font-weight-bold">Medicine Description</label>
                            <div class="input-group">
                                <textarea name="description" class="form-control" placeholder="Enter Medicine Description" id="ed_description"></textarea>
                            </div>
                        </div>

                        <div class="form-group col-md-6 float-left">
                            <div class="input-group">
                                <button type="submit" class="btn btn-primary btn-flat btn-block" name="update_medicine"><i class="fa fa-save"></i> Update Medicine Information</button>
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
            data: {medecine_id:id},
            dataType: 'json',
            success: function(response){
                $('.medecine_id').val(response.medecine_id);
                $('#ed_name').val(response.name);
                $('#ed_price').val(response.price);
                $('#ed_description').val(response.description);
            }
        });
    }


</script>