
<?php
require_once 'config/conn.php';
session_start();
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

if (isset($_POST['btnVerify'])) {
  $PhoneNumber = mysqli_real_escape_string($conn, $_POST['PhoneNumber']);

  $select_student = "SELECT * FROM tblstudentinfo WHERE PhoneNumber = '$PhoneNumber'";
  $result_student = mysqli_query($conn, $select_student);
  if (mysqli_num_rows($result_student) > 0) {
    $row_student = mysqli_fetch_array($result_student);
    // $_SESSION['StudentID'] = $row_student['StudentID'];
    $_SESSION['PhoneNumber'] = $row_student['PhoneNumber'];
    header('location: ./new_password.php');
    exit;
  } else {
  echo '<script>alert("Welcome to Geeks for Geeks")</script>';

    header('location: ./verify.php');
    $_SESSION['InvalidPhoneNumber'] = "Invalid Phone Number. Please try again.";
  }
}
?>
<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default"
  data-assets-path="public/assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Verify</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <!-- <link rel="icon" type="image/x-icon" href="public/assets/img/favicon/favicon.ico" /> -->
  <link rel="icon" type="image/x-icon" href="public/assets/img/favicon/logo-3.ico" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />

  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="public/assets/vendor/fonts/boxicons.css" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="public/assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="public/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="public/assets/css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="public/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

  <!-- Page CSS -->

  <!-- Page -->
  <link rel="stylesheet" href="public/assets/vendor/css/pages/page-auth.css" />
  <!-- Helpers -->
  <script src="public/assets/vendor/js/helpers.js"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="public/assets/js/config.js"></script>
</head>

<body>
  <!-- Content -->

  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <!-- Register -->
        <div class="card">
          <div class="card-body">
            <!-- Logo -->
            <div class="mb-4 app-brand justify-content-center">
              <a href="index.html" class="app-brand-link gap-2">
                <span class="app-brand-logo demo">
                  <img width="305px" src="./public/assets/img/logo/logo-4.png">
                </span>
              </a>
            </div>
            <h5 class="mb-3 text-center">Verification your phone number.</h5>


            <!-- /Logo -->
            <!-- <p class="mb-4">Please sign-in to continue</p> -->

            <form id="formAuthentication" class="mb-3" action="" method="POST">
              <div class="mb-2">
                <label for="email" class="form-label">StudentID</label>
                <input type="text" readonly value="<?php echo $_SESSION['StudentID']; ?>" required class="form-control" id="email" name="StudentID"
                  placeholder="Enter your email or username" />
              </div>
              <div class="mb-3 form-password-toggle">
                <label class="form-label" for="PhoneNumber">Phone Number</label>
                <input type="text" name="PhoneNumber" class="form-control <?php echo isset($_SESSION['InvalidPhoneNumber']) ? 'is-invalid' : ''; ?>" 
                  required pattern="[0-9]+" title="Please enter a valid phone number." placeholder="Enter your phone number" />
                <div class="invalid-feedback">
                  <?php 
                    if (isset($_SESSION['InvalidPhoneNumber'])) { 
                      echo $_SESSION['InvalidPhoneNumber']; 
                      // unset($_SESSION['InvalidPhoneNumber']); 
                    } 
                  ?>
                </div>
              </div>
              <div class="mb-3">
                <button class="btn btn-primary d-grid w-100" name="btnVerify" type="submit">VERIFY</button>
              </div>
            </form>
          </div>
        </div>
        <!-- /Register -->
      </div>
    </div>
  </div>

  <!-- / Content -->

  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="public/assets/vendor/libs/jquery/jquery.js"></script>
  <script src="public/assets/vendor/libs/popper/popper.js"></script>
  <script src="public/assets/vendor/js/bootstrap.js"></script>
  <script src="public/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

  <script src="public/assets/vendor/js/menu.js"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->

  <!-- Main JS -->
  <script src="public/assets/js/main.js"></script>

  <!-- Page JS -->

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>