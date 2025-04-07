<?php
require_once '../../../config/config.php';
require_once '../../../connection/db.php';
$title = "Create ";
?>

<?php
$content = ob_get_clean();
include BASE_PATH . 'views/admin/master.php';
?>