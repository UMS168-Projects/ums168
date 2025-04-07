<?php
ob_start();
require_once '../../../config/config.php';
require_once '../../../connection/db.php';
require_once BASE_PATH . 'controllers/StudentInfoController.php';

$title = "List StudentInfo";
?>

<h4 class="fw-bold mb-2 d-flex justify-content-between align-items-center">
    បញ្ជី ព័ត៌មាននិសិ្សត
    <a href="create.php" style="font-size:30px;" class="text-primary">
        <i class="bi bi-plus-square-fill "></i>
    </a>
</h4>
<div class="card">
    <div class="card-body">
        <div class="table-responsive text-nowrap">
            <table class="table table-bordered table-sm">
                <thead class="table-secondary text-center">
                    <tr>
                        <th>លរ</th>
                        <th>ID</th>
                        <th>ឈ្មោះ​ឡាតាំង</th>
                        <th>ឈ្មោះខ្មែរ</th>
                        <th>ភេទ</th>
                        <th>ថ្ងៃខែឆ្នាំ​កំំណើត</th>
                        <th>លេខទូរសព្ទ</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        $StudentInfoController = new StudentInfoController();
                        $rows = $StudentInfoController->list();
                        foreach ($rows as $row):
                            $No = 1;
                        ?>
                    <tr>
                        <td><?php echo $No ?></td>
                        <td><?php echo $row['StudentID']; ?></td>
                        <td><?php echo empty($row['NameInLatin']) ? 'N/A' : $row['NameInLatin'] ?></td>
                        <td><?php echo empty($row['NameInKhmer']) ? 'N/A' : $row['NameInKhmer'] ?></td>
                        <td><?php echo empty($row['SexID']) ? 'N/A' : $row['SexID'] ?></td>
                        <td><?php echo empty($row['DOB']) ? 'N/A' : $row['DOB'] ?></td>
                        <td><?php echo empty($row['PhoneNumber']) ? 'N/A' : $row['PhoneNumber'] ?></td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <div class="form-check form-switch">
                                    <input class="form-check-input statusSwitch" type="checkbox" role="switch" data-id="<?php echo $row['StudentID']; ?>"
                                        <?php echo ($row['Status'] == 1) ? 'checked' : ''; ?>>
                                </div>
                            </div>
                        </td>   
                        <td class="text-center">
                            <a href="edit.php?id=<?php echo $row['StudentID']; ?>">
                                <i class="bx bxs-edit"></i>
                            </a>
                            &nbsp;
                            <a href="javascript:void(0);" class="btnDelete text-danger" data-id="<?php echo $row['StudentID']; ?>" name="btnDelete" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                style="color:r ed;">
                                <i class="bx bxs-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php
                            $No++;
                        endforeach;
                ?>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Script Status -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Change status on switch toggle
        document.querySelectorAll(".statusSwitch").forEach(function(switchBtn) {
            switchBtn.addEventListener("change", function() {
                let StudentInfoId = this.dataset.id;
                let status = this.checked ? 1 : 0;
                let url = "<?php echo BASE_URL; ?>controllers/StudentInfoController.php?id=" + StudentInfoId + "&status=" + status;
                // Redirect to the URL
                window.location.href = url;
            });
        });
    });
</script>
<!-- Script confirm delete -->
<script>
    $(document).ready(function() {
        $('.btnDelete').on('click', function() {
            var deleteId = $(this).data('id');
            var deleteUrl = '<?php echo BASE_URL ?>controllers/StudentInfoController.php?delete_id=' + deleteId;
            $('#confirmDelete').attr('href', deleteUrl);
        });
    });
</script>

<?php
$content = ob_get_clean();
include BASE_PATH . 'views/admin/master.php';
?>