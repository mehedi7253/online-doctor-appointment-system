<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 6/29/2020
 * Time: 3:18 PM
 */
?>
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="doctor_dashboard.php"><span class="logo-name text-info"><?php echo $userdata['first_name'] . ' ' .$userdata['last_name'];?></span></a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown active">
                <a href="doctor_dashboard.php" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i class="fas fa-user-tie"></i><span>Manage Profile</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="update_profile.php">Update Profile</a></li>
                    <li><a class="nav-link" href="change_pass.php">Change Password</a></li>
                    <li><a class="nav-link" href="update_pic.php">Change Profile Picture</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i class="fas fa-file-medical"></i><span>Appointment</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="new_appointment.php">New Appointment</a></li>
                    <li><a class="nav-link" href="appointment_payment.php">Payment List</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i class="fas fa-clock"></i><span>Manage Schedule</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="set_schedule.php">Set Schedule</a></li>
                </ul>
            </li>

            <?php
                $sql = "SELECT * FROM doctors WHERE category = 'trainer' AND email = '$userdata[email]'";
                $res = mysqli_query($connect, $sql);

                $data = mysqli_fetch_assoc($res);

                if ($data != 0){
                    echo '
                     <li class="dropdown">
                        <a href="#" class="menu-toggle nav-link has-dropdown"><i class="fas fa-chart-line"></i><span>Patient Status</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="update_box.php">Update Patient Status</a></li>
                        </ul>
                     </li>
                    ';
                }else{

                }
            ?>

            <?php
            $sql = "SELECT * FROM doctors WHERE category = 'psychologist' AND email = '$userdata[email]'";
            $res = mysqli_query($connect, $sql);

            $data = mysqli_fetch_assoc($res);

            if ($data != 0){
                echo '
                     <li class="dropdown">
                        <a href="#" class="menu-toggle nav-link has-dropdown"><i class="fas fa-chart-line"></i><span>Patient Status</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="update_box.php">Update Patient Status</a></li>
                        </ul>
                     </li>
                    ';
            }else{

            }
            ?>


            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i class="fas fa-comment"></i><span>Chat Box</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="chat_now.php">Live Chat Box</a></li>
                </ul>
            </li>

        </ul>
    </aside>
</div>
