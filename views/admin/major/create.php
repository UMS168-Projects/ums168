<?php
ob_start();
require_once '../../../config/config.php';
require_once '../../../connection/db.php';
$title = "Create Major";
?>
<h4 class="fw-bold mb-3">បញ្ចូល ជំនាញ</h4>
<div class="row">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-body">
                <form action="<?php echo BASE_URL; ?>actions/MajorAction.php" method="POST">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">ឈ្មោះខ្មែរ</label>
                                <input type="text" required name="MajorNameKH" class="form-control" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">ឈ្មោះឡាតាំង</label>
                                <input type="text" required name="MajorNameEN" class="form-control" />
                            </div>
                        </div>
                        <?php
                        $faculties = mysqli_query($conn, "SELECT * FROM tblfaculty");
                        ?>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="defaultSelect" class="form-label">មហាវិទ្យាល័យ</label>
                                <select id="FacultyID" name="FacultyID" class="form-select">
                                    <option select hidden>
                                        --------------------------------------------------------------------------------------------------------------------------------------------------
                                    </option>
                                    <?php foreach ($faculties as $faculty) { ?>
                                        <option value="<?php echo $faculty['FacultyID']; ?>">
                                            <?php echo $faculty['FacultyNameKH']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="defaultSelect" class="form-label">Status</label>
                                <select id="FacultyID" name="Status" class="form-select">
                                    <option select hidden>
                                        --------------------------------------------------------------------------------------------------------------------------------------------------
                                    </option>
                                    <option selected value="1">Active</option>
                                    <option value="2">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="btnAdd" class="btn btn-sm btn-primary">Save</button>
                    <a href="index.php">
                        <button type="button" class="btn btn-sm btn-secondary">Cancel</button>
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
include BASE_PATH . 'views/admin/master.php';
?>