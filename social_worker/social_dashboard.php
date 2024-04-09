
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
              <div class="col-md-12 mx-auto mb-5">
                  <div class="card">
                      <div class="card-header">
                          <h4 class="text-uppercase text-info"><?php echo $userdata['first_name'];?> <?php echo $userdata['last_name'];?> <span class="text-dark text-capitalize"> Details</span></h4>
                      </div>
                      <div class="card-body">
                          <div class="col-md-4 col-sm-12 float-left">
                              <img src="../images/<?php echo $userdata['image'];?>" style="height: 200px; width: 100%">

                              <label class="text-info font-weight-bold font-20 p-4"><?php echo $userdata['email']?></label>
                          </div>
                          <div class="col-md-8 col-sm-12 float-left">
                              <div class="table-responsive">
                                  <table class="table table-bordered" style="background-color: blue; color: white">
                                      <tr>
                                          <td class="text-center"> Name</td>
                                          <td class="text-center text-capitalize" style="background-color: white; color: black; border: 1px solid black; border-left: none"><?php echo $userdata['first_name']?> <?php echo $userdata['last_name']?></td>
                                      </tr>
                                      <tr>
                                          <td class="text-center"> Phone</td>
                                          <td class="text-center" style="background-color: white; color: black; border: 1px solid black; border-left: none"><?php echo $userdata['phone']?></td>
                                      </tr>
                                      <tr>
                                          <td class="text-center"> Address</td>
                                          <td class="text-center" style="background-color: white; color: black; border: 1px solid black; border-left: none"><?php echo $userdata['address']?></td>
                                      </tr>
                                      <tr>
                                          <td class="text-center"> Gender</td>
                                          <td class="text-center" style="background-color: white; color: black; border: 1px solid black; border-left: none"><?php echo $userdata['gender']?></td>
                                      </tr>
                                      <tr>
                                          <td class="text-center">Join Date </td>
                                          <td class="text-center" style="background-color: white; color: black; border: 1px solid black; border-left: none"><?php echo date('D-M-Y', strtotime($userdata['date']))?></td>
                                      </tr>

                                  </table>
                              </div>
                          </div>
                      </div>
                      <div class="card-footer">
                          <a class="float-right btn btn-success text-decoration-none" href="update_profile.php">Update Profile</a>
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
