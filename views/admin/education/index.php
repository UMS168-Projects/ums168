<?php
ob_start();
require_once '../../../config/config.php';
require_once '../../../connection/db.php';
require_once BASE_PATH . 'controllers/EducationController.php';

$title = "List Education";
?>

<h4 class="fw-bold mb-2 d-flex justify-content-between align-items-center">
    បញ្ជី ប្រវត្តនៃការសិក្សា
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
                        <th>ឈ្មោះសិស្ស</th>
                        <th>សាលា</th>
                        <th>ប្រភេទ</th>
                        <th>ខេត្ត</th>
                        <th>ឆ្នាំសិក្សា</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        $educationController = new EducationController();
                        $rows = $educationController->list();
                        $No = 1;
                        foreach ($rows as $row):
                        ?>
                    <tr>
                        <td><?php echo $No ?></td>
                        <td><?php echo empty($row['NameInKhmer']) ? 'N/A' : $row['NameInKhmer'] ?></td>
                        <td><?php echo empty($row['SchoolName']) ? 'N/A' : $row['SchoolName'] ?></td>
                        <td><?php echo empty($row['SchoolTypeNameKH']) ? 'N/A' : $row['SchoolTypeNameKH'] ?></td>
                        <td><?php echo empty($row['ProvinceNameKH']) ? 'N/A' : $row['ProvinceNameKH'] ?></td>
                        <td><?php echo empty($row['AcademicYear']) ? 'N/A' : $row['AcademicYear'] ?></td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <div class="form-check form-switch">
                                    <input class="form-check-input statusSwitch" type="checkbox" role="switch" data-id="<?php echo $row['EducationalBackgroundID']; ?>"
                                        <?php echo ($row['Status'] == 1) ? 'checked' : ''; ?>>
                                </div>
                            </div>
                        </td>   
                        <td class="text-center">
                            <a href="edit.php?id=<?php echo $row['EducationalBackgroundID']; ?>">
                                <i class="bx bxs-edit"></i>
                            </a>
                            &nbsp;
                            <a href="javascript:void(0);" class="btnDelete text-danger" data-id="<?php echo $row['EducationalBackgroundID']; ?>" name="btnDelete" data-bs-toggle="modal" data-bs-target="#deleteModal"
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
                let url = "<?php echo BASE_URL; ?>controllers/EducationController.php?id=" + StudentInfoId + "&status=" + status;
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
            var deleteUrl = '<?php echo BASE_URL ?>controllers/EducationController.php?delete_id=' + deleteId;
            $('#confirmDelete').attr('href', deleteUrl);
        });
    });
</script>

<?php
$content = ob_get_clean();
include BASE_PATH . 'views/admin/master.php';
?>