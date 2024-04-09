<?php
/**
 * Created by PhpStorm.
 * User: mehedi
 * Date: 8/11/2020
 * Time: 3:52 PM
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
                        <div class="card">
                            <div class="card-header">
                                <h4>Buy Medicine</h4>
                                <?php
                                    if (isset($_GET['buy_id'])){
                                        $buy_id  = $_GET['buy_id'];

                                        $get_medicine = "SELECT * FROM medicine WHERE medecine_id = $buy_id AND status = 0";
                                        $result_get_md = mysqli_query($connect, $get_medicine);

                                        $data = mysqli_fetch_assoc($result_get_md);
                                    }

                                    if (isset($_POST['btn_buy'])){
                                        $user_id     = $_POST['patient_id'];
                                        $medicine_id = $_POST['medicine_id'];
                                        $quantity    = $_POST['quantity'];
                                        $price       = $_POST['price'];

                                        $sqlCheck = "SELECT * FROM medicine_buy WHERE medicine_id = '$medicine_id' AND patient_id = '$userdata[patient_id]'";
                                        $result = mysqli_query($connect, $sqlCheck);
                                        $count = mysqli_num_rows($result);
                                        if ($count > 0) {
                                            $_SESSION['exist'] = 'This Medicine Already Added Try Agin!';
                                            echo "<script>document.location.href='buy.php?buy_id=$buy_id'</script>";
                                        }else{
                                            if ($user_id && $medicine_id && $quantity){

                                                $sql_medicine_buy = "INSERT INTO medicine_buy (patient_id, medicine_id, quantity, status, price) VALUES ('$user_id', '$medicine_id', '$quantity', '0', '$price')";
                                                $res_buy          = mysqli_query($connect, $sql_medicine_buy);

                                                $_SESSION['success'] = 'New Medicine Added successfully';

                                                echo "<script>document.location.href='buy.php?buy_id=$buy_id'</script>";
                                            }else{
                                                $_SESSION['error'] = 'New Medicine Added Failed';

                                                echo "<script>document.location.href='buy.php?buy_id=$buy_id'</script>";
                                            }
                                        }
                                    }
                                ?>
                            </div>
                            <?php
                                if ($data !=0){
                                    $id      = $userdata['patient_id'];
                                    $m_id    = $data['medecine_id'];
                                    $m_name  = $data['name'];
                                    $m_price = $data['price'];
                                    $m_image = $data['image'];
                                    $m_des   = $data['description'];

                                    echo '<div class="card-body">
                                <div class="col-md-5 col-sm-12 float-left">
                                    <div class="card">
                                        <img src="../images/'.$m_image.'" class="card-img-top" style="height: 200px;" title="'.$m_name.'">

                                        <div class="card-body">
                                            <form action="" method="post">
                                                <div class="form-group">
                                                     <input type="number" name="patient_id" hidden value="'.$id.'">
                                                    <input type="number" name="medicine_id" hidden value="'.$m_id.'">
                                                    <input name="price"  class="form-control" hidden value="'.$m_price.'">

                                                </div>
                                                <div class="form-group">
                                                    <label>Quantity: </label>
                                                    <input type="number" name="quantity" class="form-control" placeholder="Enter Quantity">
                                                </div>      
                                                <div class="form-group">
                                                    <input type="submit" name="btn_buy" class="btn btn-primary float-right" value="Buy Now">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7 col-sm-12 float-left">
                                    <div class="card">
                                        <div class="card-body">
                                            <form action="" method="post">
                                            
                                                <div class="form-group">
                                                    <label>Medicine Name: </label>
                                                    <input type="text" class="form-control" disabled value="'.$m_name.'">
                                                </div>
                                                <div class="form-group">
                                                    <label>Medicine Description: </label>
                                                    <input type="text" class="form-control" disabled value="'.$m_des.'">
                                                </div>
                                                <div class="form-group">
                                                    <label>Medicine Price: </label>
                                                    <input type="text" class="form-control" disabled value="'.$m_price.'">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                        ';
                                }else{
                                    echo "<h2 class='text-center text-danger mt-5'>Stock Out <span><img src='../images/smile-3.jpg' style='height: 100px'></span></h2>";
                                }
                              ?>
                            <div class="card-footer">
                                <a href="buy_medicine.php" class="float-right btn btn-primary">Buy more</a>
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
