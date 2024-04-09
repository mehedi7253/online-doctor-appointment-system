
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
        <?php include 'includes/status.php';?>
<!-- end status-->

<!--main content-->
          <div class="row">
              <div class="col-md-12 mx-auto mt-3 mb-5">
                  <div class="card">
                      <div class="card-header">
                          <h3 class="text-capitalize text-info"><a href="patient_dashboard.php" class="text-decoration-none"><?php echo $userdata['first_name'] . ' '. $userdata['last_name'];?> </a><span class="text-dark">Profile</span></h3>
                      </div>
                      <div class="card-body">
                          <div class="col-md-4 col-sm-12 float-left">
                              <img src="../images/<?php echo $userdata['image'];?>" style="height: 200px; width: 100%; border-radius: 10px" title="<?php echo $userdata['first_name'];?>">
                          </div>
                          <div class="col-md-8 col-sm-12 float-left">
                              <div class="table-responsive">
                                  <table class="table table-bordered">
                                      <tr>
                                          <th class="text-center">Name </th>
                                          <td class="font-weight-bold text-capitalize"><?php echo $userdata['first_name']. ' '. $userdata['last_name']; ?></td>
                                      </tr>
                                      <tr>
                                          <th class="text-center">Email </th>
                                          <td class="font-weight-bold"><?php echo $userdata['email'];?></td>
                                      </tr>
                                      <tr>
                                          <th class="text-center">Phone Number </th>
                                          <td class="font-weight-bold"><?php echo $userdata['phone'];?></td>
                                      </tr>
                                      <tr>
                                          <th class="text-center">Street Address </th>
                                          <td class="font-weight-bold"><?php echo $userdata['address'];?></td>
                                      </tr>
                                      <tr>
                                          <th class="text-center">Post/Zip Code </th>
                                          <td class="font-weight-bold"><?php echo $userdata['postal'];?></td>
                                      </tr>
                                      <tr>
                                          <th class="text-center"> Police Station</th>
                                          <td class="font-weight-bold"><?php echo $userdata['ps'];?></td>
                                      </tr>
                                      <tr>
                                          <th class="text-center">Date Of Birth </th>
                                          <td class="font-weight-bold"><?php echo date('D-M-Y', strtotime($userdata['date_of_birth']))?></td>
                                      </tr>
                                      <tr>
                                          <th class="text-center">Gender </th>
                                          <td class="font-weight-bold"><?php echo $userdata['gender'];?></td>
                                      </tr>

                                  </table>
                              </div>
                          </div>
                      </div>
                      <div class="card-footer">
                          <a class="float-right btn btn-success" href="update_profile.php">Update Profile</a>
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
