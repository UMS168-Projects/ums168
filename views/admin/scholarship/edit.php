<?php
    require_once '../../../config/config.php';
    require_once '../../../connection/db.php';
    $title      = "Edit ";
    $id         = $_GET['id'];
    $select_row = mysqli_query($conn, "SELECT * FROM Scholarship_Tbl Where ScholarshipID = $id");
    foreach ($select_row as $row) {
        $Scholarship = $row['Scholarship'];
        $Description = $row['Description'];
    }
?>
<h4 class="fw-bold mb-3">កែប្រែ អាហាររូករណ៍</h4>
<div class="row">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-body">
                <form action="<?php echo BASE_URL; ?>actions/ScholarshipAction.php" method="POST">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">ឈ្មោះអាហាររូករណ៍</label>
                                <input type="text" value="<?php echo $Scholarship; ?>" required name="Scholarship"
                                    class="form-control" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">ការពិពណ៌នា</label>
                                <textarea name="Description" class="form-control"
                                    rows="5"><?php echo $Description; ?></textarea>
                            </div>
                        </div>
                    </div>
                    <input type="text" hidden value="<?php echo $id; ?>" name="ScholarshipID" class="form-control" />
                    <button type="submit" name="btnEdit" class="btn btn-sm btn-primary">Save</button>
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