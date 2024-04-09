<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 6/29/2020
 * Time: 3:18 PM
 */
?>
<nav class="navbar navbar-expand-lg main-navbar sticky">
    <div class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                    <i data-feather="maximize"></i>
                </a></li>
            <li>
                <form class="form-inline mr-auto">
                    <div class="search-element">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200">
                        <button class="btn" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </li>
        </ul>
    </div>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown dropdown-list-toggle">
            <a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle"><i data-feather="message-square"></i>
                <span class="badge headerBadge1">
                  <?php
                  $id = $userdata['worker_id'];

                  $count = 0;
                  $sql2 = "SELECT * FROM chat WHERE msg_notify = 0 AND to_id = $id";
                  $result = mysqli_query($connect, $sql2);
                  $count = mysqli_num_rows($result);
                  ?>
                  <?php if($count>0) { echo $count; } ?>
                 </span>
            </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
                <div class="dropdown-header">
                    Message
                </div>
                <div class="dropdown-list-content dropdown-list-icons">
                    <?php
                    $sql="UPDATE chat SET msg_notify= 1 WHERE msg_notify = 0 AND to_id = '$id'";
                    $result=mysqli_query($connect, $sql);

                    $sql_process2 = "SELECT * FROM chat WHERE to_id = '$id' GROUP BY msg_id";
                    $result2     = mysqli_query($connect, $sql_process2);

                    ?>
                    <?php $i = 1; while ($row = mysqli_fetch_assoc($result2)){?>
                        <a href="chat_box.php" class="dropdown-item dropdown-item-unread">
                            <span class="dropdown-item-icon bg-primary text-white">  <?php echo $i++;?></span>
                            <span class="dropdown-item-desc text-capitalize"> <?php echo $row['m_name'];?><span class="time"><?php echo $row['date_time'];?></span></span>
                        </a>
                    <?php }?>
                </div>
            </div>
        </li>

        <li class="dropdown dropdown-list-toggle">
            <a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle"><i data-feather="bell"></i>
                <span class="badge headerBadge1">
                  <?php
                      $id = $userdata['worker_id'];

                      $count = 0;
                      $sql2 = "SELECT * FROM social_feed WHERE notify = 0";
                      $result = mysqli_query($connect, $sql2);
                      $count = mysqli_num_rows($result);
                  ?>
                  <?php if($count>0) { echo $count; } ?>
                 </span>
            </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
                <div class="dropdown-header">
                    Notifications
                </div>
                <div class="dropdown-list-content dropdown-list-icons">
                    <?php
                        $sql="UPDATE social_feed SET notify= 1 WHERE notify = 0 AND user_id = '$id'";
                        $result=mysqli_query($connect, $sql);

                        $sql_process2 = "SELECT * FROM social_feed ORDER BY user_id Limit 3";

                        $result2     = mysqli_query($connect, $sql_process2);

                    ?>
                    <?php $i = 1; while ($row = mysqli_fetch_assoc($result2)){?>
                    <a href="social_feed.php" class="dropdown-item dropdown-item-unread">
                         <span class="dropdown-item-icon bg-primary text-white">  <?php echo $i++;?></span>
                        <span class="dropdown-item-desc text-capitalize"> <?php echo $row['user_name'];?><span class="time"><?php echo $row['date'];?></span></span>
                    </a>
                    <?php }?>
                </div>
            </div>
        </li>
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="../images/<?php echo $userdata['image'];?>" class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
                <div class="dropdown-title"><?php echo $userdata['email'];?></div>
                <a href="logout.php" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                    Logout
                </a>
            </div>
        </li>
    </ul>
</nav>

