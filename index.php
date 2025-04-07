<?php
require_once 'config/config.php';
// Redirect to the view index.php
header('Location:' . BASE_URL . 'views/index.php');
exit();  // Always use exit after a header redirect to ensure no further code is executed

