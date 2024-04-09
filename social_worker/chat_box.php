<?php
/**
 * Created by PhpStorm.
 * User: mehedi
 * Date: 8/15/2020
 * Time: 1:54 PM
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
                                <h4>Message List</h4>
                            </div>
                            <div class="card-body">
                                <?php
                                    $sql = "SELECT * FROM chat WHERE to_id = '$userdata[worker_id]' GROUP BY msg_id";
                                    $res = mysqli_query($connect, $sql);
                                ?>
                            </div>
                            <div class="col-md-6 mx-auto">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <?php while ($row = mysqli_fetch_assoc($res)){?>
                                            <tr>
                                                <td><?php echo $row['m_name'];?></td>
                                                <td>
                                                    <a href="chat.php?chat_id=<?php echo $row['msg_id']?>" class="text-decoration-none">Reply</a>
                                                </td>
                                            </tr>
                                        <?php }?>
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
