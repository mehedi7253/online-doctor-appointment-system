<?php
/**
 * Created by PhpStorm.
 * User: mehedi
 * Date: 8/29/2020
 * Time: 9:14 PM
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
                                <h4>Manage Appointment Charge</h4>
                                <?php
                                    $sql = "SELECT * FROM doctors";
                                    $res = mysqli_query($connect, $sql);
                                ?>
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
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Serial</th>
                                                <th>Doctor Name</th>
                                                <th>Doctor Email</th>
                                                <th>Doctor Type</th>
                                                <th>Appointment Charge</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $i = 1;
                                            while ($row = mysqli_fetch_assoc($res)){?>
                                                <tr>
                                                    <td><?php echo $i++;?></td>
                                                    <td class="text-capitalize"><?php echo $row['first_name'] . ' '. $row['last_name'];?></td>
                                                    <td><?php echo $row['email'];?></td>
                                                    <td class="text-capitalize"><?php echo $row['category'];?></td>
                                                    <td><?php echo $row['charge'];?></td>
                                                    <td>
                                                        <button class='btn btn-success btn-sm edit btn-flat' data-id='<?php echo $row['doctor_id'];?>'><i class='fa fa-edit'></i> Update</button>
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


<!--edit-->

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="formModal"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal"> Update Doctor Appointment Charge</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="update_query.php" method="post" enctype="multipart/form-data">
                    <div class="form-group col-md-12 col-sm-12 float-left">
                        <input type="hidden" class="doctor_id" name="doctor_id">
                        <label class="font-weight-bold">Enter Amount</label>
                        <div class="input-group">
                            <input type="number" class="form-control" placeholder="Enter Doctor Appointment Charge" name="charge" id="ed_charge">
                        </div>
                    </div>
                    <div class="form-group col-md-6 float-left">
                        <div class="input-group">
                            <button type="submit" class="btn btn-primary btn-flat btn-block" name="update_charge"><i class="fa fa-save"></i> Update</button>
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
            data: {doctor_id:id},
            dataType: 'json',
            success: function(response){
                $('.doctor_id').val(response.doctor_id);
                $('#ed_charge').val(response.charge);
            }
        });
    }


</script>