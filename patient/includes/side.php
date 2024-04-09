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
            <a href="patient_dashboard.php"><span class="logo-name text-info"><?php echo $userdata['first_name'] . ' ' .$userdata['last_name'];?></span></a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown active">
                <a href="patient_dashboard.php" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
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
                    <li><a class="nav-link" href="book_appointment.php">Book New Appointment</a></li>
                    <li><a class="nav-link" href="appointment_status.php">Appointment Status</a></li>
                    <li><a class="nav-link" href="withdraw_appointment.php">Withdraw Appointment</a></li>
                    <li><a class="nav-link" href="appointment_payment.php">Appointment Payment Status</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i class="fas fa-chart-line"></i><span>Update Box</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="update_box.php">Update Current Situation</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i class="fas fa-briefcase-medical"></i><span>Buy Medicine</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="buy_medicine.php">Buy Medicine</a></li>
                    <li><a class="nav-link" href="cart.php">Cart</a></li>
                    <li><a class="nav-link" href="buy_medicine__payment_status.php">Medicine Payment Status</a></li>
                    <li><a class="nav-link" href="buy_medicine_delivery_status.php">Delivery Status</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i class="fas fa-comment"></i><span>Chat Box</span></a>
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
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i class="fas fa-ambulance"></i><span>Ambulance Service</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="book_ambulance.php">Book Ambulance</a></li>
                    <li><a class="nav-link" href="withdraw_ambulance.php">Withdraw Booking</a></li>
                    <li><a class="nav-link" href="payment_ambulance.php">Ambulance Payment Status</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i class="fas fa-sign-in-alt"></i><span>Complain Box</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="complain_box.php">Complain Here</a></li>
                </ul>
            </li>
        </ul>
    </aside>
</div>
