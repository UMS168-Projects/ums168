<?php
// master.php

// Include config and db files using BASE_PATH
require_once BASE_PATH . 'config/config.php';
require_once BASE_PATH . 'connection/db.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['Username']) || $_SESSION['UserTypeID'] != 1) {
    header('location: ' . BASE_URL . 'index.php');
}

// Set default language
$lang_df = 'kh';

// Check if language is set in the URL
if (isset($_GET['lang'])) {
    $lang_df = $_GET['lang'];
    $_SESSION['lang_df'] = $lang_df; // Save language preference in session
} elseif (isset($_SESSION['lang_df'])) {
    // Get language from session if set
    $lang_df = $_SESSION['lang_df'];
}

// Load the language file
$lang = include BASE_PATH . "lang/{$lang_df}/{$lang_df}.php";
$_SESSION['lang'] = $lang;
?>

<!DOCTYPE html>
<!-- beautify ignore:start -->
<html lang="<?php echo $lang; ?>" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="<?php echo BASE_URL; ?>public/assets/" data-template="vertical-menu-template-free">
<head>
  <meta charset="utf-8" />
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
  />
  <title><?php echo $title ?></title>
  <meta name="description" content="" />
  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="<?php echo BASE_URL; ?>public/assets/img/favicon/logo-3.ico" />
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet"
  />
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Khmer:wght@400;700&display=swap" rel="stylesheet" />
  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/assets/vendor/fonts/boxicons.css" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/assets/css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

  <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/assets/vendor/libs/apex-charts/apex-charts.css" />
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/assets/css/snackbar.css" />
  
  <script src="<?php echo BASE_URL; ?>public/assets/vendor/js/helpers.js"></script>
  <script src="<?php echo BASE_URL; ?>public/assets/js/config.js"></script>
  <script src="<?php echo BASE_URL; ?>public/libs/jquery/jquery.js"></script>
  <script src="<?php echo BASE_URL; ?>public/assets/js/snackbar.js"></script>
  <script src="<?php echo BASE_URL; ?>public/assets/js/dynamic-image.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> 
  <style>
    body {
      font-family: "Siemreap", sans-serif;
      font-weight: 400;
      font-style: normal;
      /* font-size: 14px; */
    }
    th {
      font-family: khmer, Arial,Helvetica, sans-serif;
    }
    .form-label{
      font-size: 15px;
    }
    :root {
      --bs-blue: #0d6efd;
      --bs-primary:#0d6efd; /* Primary color set to Bootstrap blue */
      --bs-primary-rgb: 0, 123, 255; /* RGB values for primary color */
      --bs-text-opacity: 1; /* Default text opacity */
    }
    .text-primary {
      --bs-text-opacity: 1;
      color: rgba(var(--bs-primary-rgb), var(--bs-text-opacity)) !important;
    }
    .table-secondary th {
  text-transform: none !important;
  }
  .signature-container {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px;
      /* Adjust as needed */
      border: 0px solid #ccc;
      /* Example border */
    }

    .left-signature,
    .right-signature {
      flex: 1;
    }

    .left-signature {
      text-align: left;
    }

    .right-signature {
      text-align: right;
    }
  </style>
  <!-- Library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- CDN bootstrap icon -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
  <body>
    
        <?php if (isset($_SESSION['snackbar'])): ?>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                triggerSnackbar(
                    "<?php echo $_SESSION['snackbar']['message']; ?>",
                    "<?php echo $_SESSION['snackbar']['type']; ?>"
                );
            });
        </script>
        <?php unset($_SESSION['snackbar']); ?>
        <?php endif; ?>
            <!-- Snackbar Content -->
    <div id="snackbar">
        <span class="snackbar-icon" id="snackbar-icon"></span>
        <span id="snackbar-message"></span>
        <!-- <button class="snackbar-close" onclick="closeSnackbar()">×</button> -->
    </div>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
        <?php include BASE_PATH . 'views/layouts/sidebar.php'; ?>
        <!-- / Menu -->
        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
          <?php include BASE_PATH . 'views/layouts/navbar.php'; ?>
          <!-- / Navbar -->
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
              <?php echo $content; ?>
            </div>
            <!-- / Content -->
            <!-- Footer -->
            <?php include BASE_PATH . 'views/layouts/footer.php'; ?>
            <!-- / Footer -->
            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>
      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
    
    <!-- Snackbar container -->

    <!-- Confirm Delete Modal -->
    <div class="mt-3">
        <div class="modal fade" id="deleteModal" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1">Confirm Deletion</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                                    </div>
                                    <hr />
                                    <div class="modal-body">Are you sure you want to delete this record?
                        This action can't be undone.</div>
                                    <hr />
                                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <a id="confirmDelete" class="btn btn-sm btn-danger" href="#">Confirm</a>
                        <!-- <button type="submit" ></button> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
            
    <script src="<?php echo BASE_URL; ?>public/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="<?php echo BASE_URL; ?>public/assets/vendor/libs/popper/popper.js"></script>
    <script src="<?php echo BASE_URL; ?>public/assets/vendor/js/bootstrap.js"></script>
    <script src="<?php echo BASE_URL; ?>public/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="<?php echo BASE_URL; ?>public/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="<?php echo BASE_URL; ?>public/assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="<?php echo BASE_URL; ?>public/assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="<?php echo BASE_URL; ?>public/assets/js/dashboards-analytics.js"></script>

  </body>
</html>