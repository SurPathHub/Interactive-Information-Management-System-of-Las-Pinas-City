<?php session_start(); ?>
<?php ob_start(); ?>

<?php

if (isset($_SESSION['user_role'])) {

  if ($_SESSION['user_role'] == 'admin') {
    header("Location: admin/portal.php");
  } else if ($_SESSION['user_role'] == 'writer') {
    header("Location: writer_editor/writer_portal.php");
  } else if ($_SESSION['user_role'] == 'customer service') {
    header("Location: customer_service/cs_portal.php");
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Log in </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">

      <img class="animation__shake" src="https://res.cloudinary.com/sarabgi/image/upload/v1662100389/lpc_mbzrbe.png" alt="AdminLTELogo" width="200">
    </div>


    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="index.html" class="h1"><b>Login</b></a>
      </div>

      <div class="card-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <!-- 
        <form action="imageupload.php" method="post" runat="server" enctype="multipart/form-data">
          <div class="input-group">
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04" name="submit" value="submit">

        </form>


 -->

        <form action="user_login.php" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="username" placeholder="Username">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="user_password" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" name="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <!-- /.social-auth-links -->

        <p class="mb-1">
          <a href="forgot-password.html">I forgot my password</a>
        </p>

      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>

  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>

</body>

</html>