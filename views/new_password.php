
<?php
require_once 'config/conn.php';
session_start();
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
if (isset($_POST['btnSignIn'])) {
    $StudentPassword = mysqli_real_escape_string($conn, $_POST['StudentPassword']);
    $ConfirmPassword = mysqli_real_escape_string($conn, $_POST['ConfirmPassword']);
    $StudentID = mysqli_real_escape_string($conn, $_POST['StudentID']);

    $StudentPassword = md5($_POST['StudentPassword']);
    $ConfirmPassword = md5($_POST['ConfirmPassword']);

    if ($StudentPassword === $ConfirmPassword) {
        $sql = "UPDATE tblstudentinfo SET StudentPassword='$StudentPassword' WHERE StudentID = $StudentID";
        if (mysqli_query($conn, $sql)) {
        $select_student = "SELECT * FROM tblstudentinfo WHERE StudentID = '$StudentID'";
            $result_student = mysqli_query($conn, $select_student);
            if (mysqli_num_rows($result_student) > 0) {
                $row_student = mysqli_fetch_array($result_student);
                $_SESSION['Username'] = $row_student['NameInLatin'];
                $_SESSION['StudentID'] = $row_student['StudentID'];
                // $_SESSION['ProfileImage'] = $row_student['Photo'];
                $UserTypeName = mysqli_fetch_assoc(mysqli_query($conn, "SELECT UserTypeName FROM tblusertype Where UserTypeID = 5"))['UserTypeName'] ?? '';
                $_SESSION['UserTypeName'] = $UserTypeName;          
                header('location: ./student/index.php');
                exit;
            }
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
    } else {
        $_SESSION['InvalidConPass'] = "The confirm new passwords do not match!";
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

  <title>New Password</title>

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
            <h5 class="mb-3 text-center">New Password</h5>


            <!-- /Logo -->
            <!-- <p class="mb-4">Please sign-in to continue</p> -->

            <form id="formAuthentication" method="POST">
  <div class="mb-2">
    <label for="studentID" class="form-label">Student ID</label>
    <input type="text" readonly value="<?php echo $_SESSION['StudentID']; ?>" required class="form-control" id="studentID" name="StudentID">
  </div>

  <div class="mb-3">
    <label for="StudentPassword" class="form-label">Password</label>
    <input type="password" required id="StudentPassword" class="form-control" name="StudentPassword">
  </div>

  <div class="mb-3">
    <label for="ConfirmPassword" class="form-label">Confirm Password</label>
    <input type="password" required id="ConfirmPassword" class="form-control <?php echo isset($_SESSION['InvalidConPass']) ? 'is-invalid' : ''; ?>" name="ConfirmPassword">
    <div class="invalid-feedback">
      <?php if (isset($_SESSION['InvalidConPass'])) { echo $_SESSION['InvalidConPass']; unset($_SESSION['InvalidConPass']); } ?>
    </div>
  </div>

  <div class="mb-3">
    <button class="btn btn-primary d-grid w-100" name="btnSignIn" type="submit">VERIFY</button>
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