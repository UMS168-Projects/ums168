<?php
ob_start();
require_once '../../../config/config.php';
require_once '../../../connection/db.php';
require_once BASE_PATH . 'controllers/SemesterController.php';

$title = "Edit Semester";
$id = isset($_GET['id']) ? $_GET['id'] : null;

$SemesterController = new SemesterController();
$row = $SemesterController->edit($id);
?>
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="fw-bold mb-0">កែប្រែ ឆមាស</h4>
    <a href="index.php">
        <button type="button" style="font-size:6px;" class="btn btn-primary">
            <i class='bx bx-arrow-back'></i>
        </button>
    </a>
</div>
<div class="row">
    <!-- Form controls -->
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-body">
                <form action="<?php echo BASE_URL ?>controllers/SemesterController.php" method="POST">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">NameKH</label>
                                <input type="text" name="TxtSemesterNameKH" id="TxtSemesterNameKH" class="form-control"
                                    value="<?php echo isset($row['SemesterNameKH']) ? $row['SemesterNameKH'] : ''; ?>" placeholder="Example" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">NameEN</label>
                                <input type="text" name="TxtSemesterNameEN" id="TxtSemesterNameEN" class="form-control"
                                    value="<?php echo isset($row['SemesterNameEN']) ? $row['SemesterNameEN'] : ''; ?>" placeholder="Example" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="defaultSelect" class="form-label">Status</label>
                                <select name="TxtStatus" class="form-select">
                                    <option value="1" <?php echo isset($row['Status']) && $row['Status'] == 1 ? 'selected' : ''; ?>>
                                        Active
                                    </option>
                                    <option value="0" <?php echo isset($row['Status']) && $row['Status'] == 0 ? 'selected' : ''; ?>>
                                        Inactive
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="id" value="<?= $row['SemesterID'] ?? '' ?>">
                    <div class="float-start">
                        <button type="submit" id="btnSave" disabled name="btnSave" class="btn  btn-primary">Save</button>
                        <a href="index.php">
                            <button type="button" class="btn  btn-secondary">Cancel</button>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Validate Form -->
<script>
    function validateForm() {
        var txtSemesterNameKH = document.getElementById("TxtSemesterNameKH").value;
        var txtSemesterNameEN = document.getElementById("TxtSemesterNameEN").value;

        if (txtSemesterNameKH !== "" && txtSemesterNameEN !== "") {
            document.getElementById("btnSave").disabled = false;
        } else {
            document.getElementById("btnSave").disabled = true;
        }
    }

    document.getElementById("TxtSemesterNameKH").addEventListener("input", validateForm);
    document.getElementById("TxtSemesterNameEN").addEventListener("input", validateForm);

    validateForm();
</script>

<?php
$content = ob_get_clean();
include BASE_PATH . 'views/admin/master.php';
?>