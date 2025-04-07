<?php
ob_start();
require_once '../../../config/config.php';
require_once '../../../connection/db.php';
require_once BASE_PATH . 'controllers/AcademicYearController.php';

$title = "Edit AcademicYear";
$id = isset($_GET['id']) ? $_GET['id'] : null;

$AcademicYearController = new AcademicYearController();
$row = $AcademicYearController->edit($id);
?>
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="fw-bold mb-0">កែប្រែ ឆ្នាំសិក្សា</h4>
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
                <form action="<?php echo BASE_URL ?>controllers/AcademicYearController.php" method="POST">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">ឆ្នាំសិក្សា</label>
                                <input type="text" name="TxtAcademicYear" id="TxtAcademicYear" class="form-control"
                                    value="<?php echo isset($row['AcademicYear']) ? $row['AcademicYear'] : ''; ?>" placeholder="Example" />
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
                    <input type="hidden" name="id" value="<?= $row['AcademicYearID'] ?? '' ?>">
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
        var txtAcademicYear = document.getElementById("TxtAcademicYear").value;

        if (txtAcademicYear !== "") {
            document.getElementById("btnSave").disabled = false;
        } else {
            document.getElementById("btnSave").disabled = true;
        }
    }

    document.getElementById("TxtAcademicYear").addEventListener("input", validateForm);

    validateForm();
</script>

<?php
$content = ob_get_clean();
include BASE_PATH . 'views/admin/master.php';
?>