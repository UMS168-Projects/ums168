<?php
require_once '../../../config/config.php';
require_once '../../../connection/db.php';
$title = "List ";
?>


<?php
    $content = ob_get_clean();
    include BASE_PATH . 'views/admin/master.php';
?>
<!-- Script confirm delete -->
<script>
    $(document).ready(function () {
        $('.btnDelete').on('click', function () {
            var deleteId = $(this).data('id');
            var deleteUrl = '<?php echo BASE_URL ?>actions/YearAction.php?id=' + deleteId;
            $('#confirmDelete').attr('href', deleteUrl);
        });
    });
</script>