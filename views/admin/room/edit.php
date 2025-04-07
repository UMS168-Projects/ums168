<?php
require_once '../../../config/config.php';
require_once '../../../connection/db.php';
$title = "Edit ";
?>

<?php
$content = ob_get_clean();
include BASE_PATH . 'views/admin/master.php';
?>