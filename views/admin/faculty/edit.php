<?php
    ob_start();
    require_once '../../../config/config.php';
    require_once '../../../connection/db.php';
    $title      = "Edit Faculty ";
    $id         = $_GET['id'];
    $select_row = mysqli_query($conn, "SELECT * FROM tblfaculty Where FacultyID = $id");
    foreach ($select_row as $row) {
        $FacultyNameKH = $row['FacultyNameKH'];
        $FacultyNameEN = $row['FacultyNameEN'];
    }
?>
<h4 class="fw-bold mb-3">កែប្រែ មហាវិទ្យាល័យ</h4>
<div class="row">

  <div class="col-xl">
    <div class="card mb-4">
      <div class="card-body">
      <form action="<?php echo BASE_URL ?>actions/FacultyAction.php" method="POST">
          <div class="row">
            <div class="col-sm-6">
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">ឈ្មោះខ្មែរ</label>
                <input type="text" value="<?php echo $FacultyNameKH ?>" required name="FacultyNameKH" class="form-control" id="basic-default-fullname" />
              </div>
            </div>
            <div class="col-sm-6">
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">ឈ្មោះឡាតាំង</label>
                <input type="text" value="<?php echo $FacultyNameEN ?>" required name="FacultyNameEN" class="form-control" id="basic-default-fullname" />
              </div>
            </div>
          </div>
          <input type="hidden" value="<?php echo $id ?>" required name="FacultyID" class="form-control" id="basic-default-fullname" />
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