<?php
    include '../php/db_connect.php';
?>

<!DOCTYPE html>
<html lang="en">


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Social Worker Login</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <link rel="stylesheet" href="assets/bundles/bootstrap-social/bootstrap-social.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
    <link href="../images/logo.png" rel="icon">

</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Social Worker Login</h4>
              </div>
             <div class="card-body">
                 <?php
                 session_start();
                 if (isset($_SESSION['email'])){
                     header('Location: social_dashboard.php');
                 }
                 if (isset($_POST['login'])){
                     $email    = $_POST['email'];
                     $password = $_POST['password'];

                     $has = hash('sha256', $password);

                     $sql = "SELECT * FROM social_worker WHERE email ='$email' AND password = '$has'";

                     $result = mysqli_query($connect, $sql);

                     $row = mysqli_num_rows($result);
                     if ($row == 1){
                         echo "Login Done";
                         $_SESSION['email'] = $email;
                         header('Location: social_dashboard.php');
                     }else{
                         echo "<span class='text-danger'>Email Or Password Doesn't match</span>";
                     }
                 }
                 ?>
                 <form method="POST" action="" class="needs-validation" novalidate="">
                     <div class="form-group">
                         <label for="email">Email</label>
                         <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                         <div class="invalid-feedback">
                             Please fill in your email
                         </div>
                     </div>
                     <div class="form-group">
                         <div class="d-block">
                             <label for="password" class="control-label">Password</label>
                             <div class="float-right">
                                 <a href="" class="text-small">
                                     Forgot Password?
                                 </a>
                             </div>
                         </div>
                         <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                         <div class="invalid-feedback">
                             please fill in your password
                         </div>
                     </div>
                     <div class="form-group">
                         <button type="submit" name="login" class="btn btn-primary btn-lg btn-block" tabindex="4">
                             Login
                         </button>
                     </div>
                 </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
</body>


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
</html>