<?php
/**
 * Created by PhpStorm.
 * User: mehedi
 * Date: 8/11/2020
 * Time: 5:39 PM
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
                                <h4>Your Medicine Cart</h4>
                                <?php

                                    $sql_get_cart = "SELECT * FROM  medicine, medicine_buy WHERE medicine.medecine_id = medicine_buy.medicine_id AND medicine_buy.patient_id = $userdata[patient_id];";
                                    $res          = mysqli_query($connect, $sql_get_cart);

                                ?>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">

                                        <?php
                                        if ($res){
                                            if (mysqli_num_rows($res) > 0){

                                                echo ' <thead>
                                    <tr class="text-center">
                                        <th>Serial</th>
                                        <th>Medicine Name</th>
                                        <th>Image</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>';
                                                $i = 1;
                                                while ($row = mysqli_fetch_assoc($res)){?>
                                                    <tr class="text-center">
                                                        <td><?php echo $i++;?></td>
                                                        <td><?php echo $row['name'];?></td>
                                                        <td>
                                                            <img src="../images/<?php echo $row['image'];?>" style="height: 50px; width: 50px">
                                                        </td>
                                                        <td><?php echo $row['price'];?></td>
                                                        <td style="border: 1px solid #ddd; padding: 2px; width: 300px;">
                                                            <?php
                                                            //
                                                            if (isset($_POST['update'])){
                                                                $medicine_sell_id = $_POST['medicine_sell_id'];
                                                                $quantity = $_POST['quantity'];

                                                                $sql = "UPDATE medicine_buy SET quantity = '$quantity' WHERE medicine_sell_id = $medicine_sell_id";
                                                                $res = mysqli_query($connect, $sql);

                                                                echo "<script>document.location.href='cart.php'</script>";
                                                            }
                                                            ?>
                                                            <form action="" method="post">
                                                                <div class="form-group">
                                                                    <input name="medicine_sell_id" hidden value="<?php echo $row['medicine_sell_id'];?>">
                                                                    <input type="number" id="quantity" name="quantity" class="col-6 mt-2" value="<?php echo $row['quantity'];?>">
                                                                    <input type="submit" name="update" class="btn btn-info" value="Update">
                                                                </div>
                                                            </form>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $pro_price = $row['price'];
                                                            $pro_quant = $row['quantity'];

                                                            $total_price = $pro_price * $pro_quant;
                                                            echo number_format($total_price,2 );

                                                            ?>
                                                        </td>
                                                        <td class="font-weight-bold"><a href="delete.php?delete_medicine=<?php echo $row['medicine_sell_id'];?>" class="btn btn-danger text-white">Remove</a></td>
                                                    </tr>
                                                <?php }
                                            }else{
                                                echo "<span class='text-danger'>Empty Cart...!!</span> <br/>";
                                            }
                                        }
                                        ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td> <span class="float-right">Total:</span></td>
                                                <td><span class="ml-5">
                                           <?php
                                           $sub_total = "SELECT price,quantity,SUM(quantity*price) AS paybleAmount FROM medicine_buy WHERE patient_id = $userdata[patient_id];";
                                           $re = mysqli_query($connect, $sub_total);

                                           $sub_totals = mysqli_fetch_assoc($re);

                                           if ($sub_total){
                                               if ($sub_total !== 0) {

                                                   $payable =  number_format($sub_totals['paybleAmount'], 2);

                                                   echo $payable;


                                               }else{
                                                   echo "0.00";
                                               }
                                           }
                                           ?>
                                                        T.K </span>
                                                </td>
                                                <?php
                                                    if (isset($_POST['checkout'])){
                                                        $sql_invoice = "INSERT INTO medicine_invoice (patient_id, medicine_id, quantity, price) SELECT patient_id, medicine_id, quantity, price FROM medicine_buy WHERE medicine_buy.patient_id = '$userdata[patient_id]'";
                                                        $result = mysqli_query($connect, $sql_invoice);

                                                        echo "<script>document.location.href='checkout.php'</script>";
                                                    }
                                                ?>
                                                <td>
                                                    <form action="" method="post">
                                                        <?php
                                                        $sql_get_cart2 = "SELECT * FROM  medicine, medicine_buy WHERE medicine.medecine_id = medicine_buy.medicine_id AND medicine_buy.patient_id = '$userdata[patient_id]'";
                                                        $res2          = mysqli_query($connect, $sql_get_cart2);

                                                            if ($res2) {
                                                                if (mysqli_num_rows($res2) > 0) {
                                                                    echo '<input  type="submit" class="btn btn-primary" name="checkout" value="Check Out">';
                                                                } else {
                                                                    echo '<input  disabled type="submit" class="btn btn-primary" name="checkout" value="Check Out">';
                                                                }
                                                            }
                                                        ?>


                                                    </form>
                                                </td>
                                            </tr>
                                        </tfoot>
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
