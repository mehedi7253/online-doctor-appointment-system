<?php
/**
 * Created by PhpStorm.
 * User: mehedi
 * Date: 8/30/2020
 * Time: 3:40 PM
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
                    <div class="col-md-10 mx-auto mb-5">
                        <div class="card">
                            <div class="card-header">
                                <h4>Chat Box</h4>
                            </div>
                            <div class="card-body">
                                <div class="card-body"  style="margin: 5px; padding: 5px; height: 400px; overflow: auto;">
                                    <p>
                                        <?php
                                        if (isset($_GET['message_id'])){
                                            $message_id = $_GET['message_id'];

                                            $get_type_id = "SELECT * FROM social_worker WHERE worker_id = $message_id";
                                            $get_res     = mysqli_query($connect, $get_type_id);

                                            $data = mysqli_fetch_assoc($get_res);

                                        }

                                        $id = $userdata['worker_id'];
                                        $view_message =  "SELECT * FROM chat WHERE msg_id = '$userdata[worker_id]' AND to_id = '$message_id' ORDER BY msg_id";
                                        $res = mysqli_query($connect, $view_message);

                                        ?>
                                    </p>


                                    <?php while ($row = mysqli_fetch_assoc($res)){?>
                                        <div class="form-group input-group">
                                            <div class="input-group-prepend">
                                                <img src="../images/<?php echo $row['image'];?>" style="height: 50px; width: 50px; border-radius: 50%;">
                                            </div>
                                            <textarea class="font-weight-bold form-control"  disabled style="height: 56px; border-radius: 16px; margin-left: 8px; margin-top: 10px"><?php echo $row['message'];?></textarea>
                                        </div>
                                        <p class="text-dark float-right" style="font-size: 9px"><?php echo $row['date_time'];?></p>
                                    <?php }?>
                                </div>
                            </div>
                            <div class="card-footer">
                                <?php
                                if (isset($_POST['btn'])){
                                    $message     = $_POST['message'];
                                    $msg_id      = $_POST['msg_id'];
                                    $m_name      = $_POST['m_name'];
                                    $image       = $_POST['image'];
                                    $to_id       = $_POST['to_id'];


                                    $create = @date('Y-m-d H:i:s');

                                    $sql_msg = "INSERT INTO chat (message, msg_id, m_name, image, date_time, to_id) VALUES ('$message', '$msg_id', '$m_name', '$image', '$create', '$to_id')";
                                    $res_msg = mysqli_query($connect, $sql_msg);

                                    echo "<script>document.location.href='chat_box_worker.php?message_id=$message_id'</script>";

                                }


                                ?>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div  class="form-group input-group">
                                        <input type="text" name="message" placeholder="Write Message...." class="form-control">
                                        <input type="number" name="to_id"  hidden value="<?php echo $message_id;?>" class="form-control">
                                        <input type="number" name="msg_id" hidden value="<?php echo $userdata['worker_id'];?>" class="form-control">
                                        <input type="text" name="m_name" hidden value="<?php echo $userdata['first_name'];?> <?php echo $userdata['last_name'];?>" class="form-control">
                                        <input type="text" name="image" hidden value="<?php echo $userdata['image'];?>" class="form-control">

                                        <div class="input-group-prepend">
                                            <button type="submit" name="btn" class="btn btn-primary"><i class="fas fa-chevron-circle-right"></i></button>
                                        </div>
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
