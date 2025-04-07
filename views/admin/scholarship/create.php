<?php
    ob_start();
    require_once '../../../config/config.php';
    require_once '../../../connection/db.php';
    $title = "Create ";
?>
<h4 class="fw-bold mb-3">បញ្ចូល អាហាររូករណ៍</h4>
<div class="row">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-body">
                <form action="<?php echo BASE_URL; ?>actions/ScholarshipAction.php" method="POST">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">ឈ្មោះអាហាររូករណ៍</label>
                                <input type="text" required name="Scholarship" class="form-control" />
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">ការពិពណ៌នា</label>
                                <textarea name="Description" class="form-control" rows="5"></textarea>
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