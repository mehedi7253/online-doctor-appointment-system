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
            <a href="admin_dashboard.php"><span class="logo-name text-info">Admin Dashboard</span></a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown active">
                <a href="admin_dashboard.php" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i class="fas fa-user-tie"></i><span>Manage User</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="doctors.php">Manage Doctors</a></li>
                    <li><a class="nav-link" href="nutrition.php">Manage Nutrition Experts</a></li>
                    <li><a class="nav-link" href="trainer.php">Manage Physical Trainers</a></li>
                    <li><a class="nav-link" href="Psychologists.php">Manage Psychologists</a></li>
                    <li><a class="nav-link" href="social_worker.php">Social Worker</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i class="fas fa-user-tie"></i><span> Appointment Charge</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="charge.php">Appoinment Charge</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i class="fas fa-file-medical"></i><span>Appointment</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="appointment.php"> Pending List</a></li>
                    <li><a class="nav-link" href="appointment_complete.php">Complete List </a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i class="fas fa-briefcase-medical"></i><span>Manage Medicine</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="medicine.php">Manage Medicine</a></li>
                    <li><a class="nav-link" href="update_delivery.php">Udate Delivery Status </a></li>
                    <li><a class="nav-link" href="total_sell_med.php">Total Sell </a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i class="fas fa-ambulance"></i><span>Manage Ambulance</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="ambulance.php">Manage Ambulance</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i class="fas fa-ambulance"></i><span>Ambulance Booking</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="booking_request.php">New Booking Request</a></li>
                    <li><a class="nav-link" href="make_invoice.php">Update Payment Status </a></li>
                    <li><a class="nav-link" href="total_ambulance_earn.php">Total Earning</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i class="fas fa-sign-in-alt"></i><span>Complain Box</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="compalin_box.php">Compalin Box</a></li>
                </ul>
            </li>
        </ul>
    </aside>
</div>
