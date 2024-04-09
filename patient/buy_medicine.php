<?php
/**
 * Created by PhpStorm.
 * User: mehedi
 * Date: 8/11/2020
 * Time: 2:57 PM
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
                                <h4>Buy Medicine</h4>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="form-group input-group">
                                        <label class="pt-1">Find Medicine: </label>
                                        <input type="text"  id="myInput" placeholder="Search Medicine Name.." class="col-8 ml-2">
<!--                                        <button type="button" id="search" class="btn btn-primary"><i class="fas fa-search"></i> Search</button>-->
                                    </div>
                                </form>
                                <?php
                                    $get_all_medicine = "SELECT * FROM medicine";
                                    $res_all_medicine = mysqli_query($connect, $get_all_medicine);
                                ?>
                                    <div class="table-responsive">
                                       <table class="table">
                                           <tbody id="myTable">
                                           <?php while ($row = mysqli_fetch_assoc($res_all_medicine)){?>
                                                  <tr class="col-md-4 col-sm-12 float-left">
                                                    <td>
                                                        <div class="card">
                                                            <img src="../images/<?php echo $row['image'];?>" style="height: 150px" class="card-img-top">
                                                            <div class="card-body">
                                                                <h5 class="text-center"><?php echo $row['name'];?>
                                                                    <sup>
                                                                        <span style="font-size: 13px;">
                                                                            <?php
                                                                            $status = $row['status'];
                                                                            // echo $status;

                                                                            if (($status) == '0'){?>
                                                                                <label class="text-success">Available</label>
                                                                                <?php
                                                                            }
                                                                            if (($status) == '1'){?>
                                                                                <label class="text-danger">Out Of Stock</label>
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </span>
                                                                    </sup>
                                                                </h5>
                                                                <p class="text-justify"><?php echo $row['description'];?></p>
                                                            </div>
                                                            <div class="card-footer border">
                                                                <span class="font-weight-bold">Price: <?php echo $row['price'];?></span> <span class="float-right"><a href="buy.php?buy_id=<?php echo $row['medecine_id'];?>" class="text-decoration-none btn btn-primary">Buy Now</a></span>
                                                            </div>
                                                        </div>
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
<!--<script>-->
<!--    $(document).ready(function(){-->
<!--        $("#myInput").on("keyup", function() {-->
<!--            var value = $(this).val().toLowerCase();-->
<!--            $("#myDIV *").filter(function() {-->
<!--                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)-->
<!--            });-->
<!--        });-->
<!--    });-->
<!--</script>-->

<script>
    $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>