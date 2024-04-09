<?php
/**
 * Created by PhpStorm.
 * User: mehedi
 * Date: 8/29/2020
 * Time: 10:38 PM
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
                                <h4>Social  Feed</h4>
                                <?php
                                    if (isset($_POST['btn'])){
                                        $user_id    = $_POST['user_id'];
                                        $user_name  = $_POST['user_name'];
                                        $user_image = $_POST['user_image'];
                                        $post_desc  = $_POST['post_desc'];

                                        if ($user_id && $post_desc){
                                            $create = @date('Y-m-d H:i:s');

                                            $sql_post = "INSERT INTO social_feed (user_id, user_name, user_image, post_desc, date, notify) VALUES ('$user_id', '$user_name', '$user_image', '$post_desc', '$create', '0')";
                                            $res_post = mysqli_query($connect, $sql_post);
                                        }
                                    }
                                ?>

                            </div>
                            <div class="card-body">
                               <div class="col-md-12 col-sm-12 float-left">
                                   <div class="card-body" >
                                       <form action="" method="post">
                                           <div class="form-group col-md-12 col-sm-12">
                                               <input type="text" hidden name="user_id" value="<?php echo $userdata['worker_id'];?>">
                                               <input type="text" hidden name="user_name" value="<?php echo $userdata['first_name']. ' ' .$userdata['last_name'];?>">
                                               <input type="text" hidden name="user_image" value="<?php echo $userdata['image'];?>">
                                               <textarea class="form-control" name="post_desc" placeholder="Write Your Post..." style="height: 150px; "></textarea>
                                           </div>
                                           <div class="form-group">
                                               <input type="submit" name="btn" class="btn btn-primary float-right mr-3" value="Post">
                                           </div>
                                       </form>
                                       <h3 class="border-bottom mt-5">All Post</h3>

                                       <div class="mt-2">
                                           <?php
                                               $get_post = "SELECT * FROM social_feed ORDER BY post_id DESC";
                                               $res_get = mysqli_query($connect, $get_post);
                                               while ($post = mysqli_fetch_assoc($res_get)){?>
                                                   <div class="card">
                                                       <div class="card-body">
                                                           <p><img src="../images/<?php echo $post['user_image'];?>" style="height: 34px; width: 34px; border-radius: 50%"> <span class="ml-2 text-capitalize text-info"><?php echo $post['user_name'];?></span></p>
                                                           <p class="text-justify ml-3"><?php echo $post['post_desc'];?></p>
                                                       </div>
                                                       <hr class="border-bottom"/>
                                                       <div class="card-footer">
                                                           <div class="form-group">
                                                               <?php
                                                                    $comment_pro = "SELECT * FROM post_comment WHERE post_id = '$post[post_id]' GROUP BY comment ORDER BY user_comment_id";
                                                                    $res_pro     = mysqli_query($connect, $comment_pro);
                                                                   while ($pro_row=$res_pro->fetch_array()){?>
                                                                       <p><img src="../images/<?php echo $pro_row['comment_image'];?>" style="height: 34px; width: 34px; border-radius: 50%"> <span class="ml-2 text-capitalize text-info"><?php echo $pro_row['comment_name'];?></span></p>
                                                                       <input type="text" class="form-control ml-3" disabled value="<?php echo $pro_row['comment'];?>"><br/>
                                                                   <?php }
                                                               ?>
                                                           </div>

                                                           <form action="" method="post">
                                                               <?php
                                                               if (isset($_POST['btn_comment'])) {
                                                                   $post_id             = $_POST['post_id'];
                                                                   $user_id_comment     = $_POST['user_comment_id'];
                                                                   $user_name_comment   = $_POST['comment_name'];
                                                                   $user_image_comment  = $_POST['comment_image'];
                                                                   $comment             = $_POST['comment'];

                                                                   if ($comment){
                                                                       $sql_comment = "INSERT INTO post_comment (post_id, user_comment_id, comment_name, comment_image, comment) VALUES ('$post_id', '$user_id_comment', '$user_name_comment', '$user_image_comment', '$comment')";
                                                                       $res_comment = mysqli_query($connect, $sql_comment);

                                                                       echo "<script>document.location.href='social_feed.php'</script>";
                                                                   }

                                                               }
                                                               ?>
                                                               <div class="form-group">
                                                                   <input type="text" hidden name="post_id" value="<?php echo $post['post_id'];?>">
                                                                   <input type="text" hidden name="user_comment_id" value="<?php echo $userdata['worker_id'];?>">
                                                                   <input type="text" hidden name="comment_name" value="<?php echo $userdata['first_name']. ' ' .$userdata['last_name'];?>">
                                                                   <input type="text" hidden name="comment_image" value="<?php echo $userdata['image'];?>">
                                                                   <textarea class="form-control" name="comment" placeholder="Write Your Cooment..." style="height: 150px; "></textarea>
                                                               </div>
                                                               <div class="form-group">
                                                                   <input type="submit" name="btn_comment" class="btn btn-primary float-right mr-3" value="Comment">
                                                               </div>
                                                           </form>
                                                       </div>
                                                   </div>
                                           <?php }?>
                                       </div>
                                   </div>
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


