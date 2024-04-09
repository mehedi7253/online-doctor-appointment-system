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
            <a href="social_dashboard.php"><span class="logo-name text-info"><?php echo $userdata['first_name'] . ' ' .$userdata['last_name'];?></span></a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown active">
                <a href="social_dashboard.php" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
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
                <a href="#" class="menu-toggle nav-link has-dropdown"><i class="fas fa-file-word"></i><span>Chat Box</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="chat_now.php">Live Chat Box</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i class="fab fa-ioxhost"></i><span>Post Social Feed</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="social_feed.php">Social Feed</a></li>
                </ul>
            </li>
        </ul>
    </aside>
</div>
