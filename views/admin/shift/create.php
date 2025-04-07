<?php
ob_start();
require_once '../../../config/config.php';
require_once '../../../connection/db.php';
$title = "Create Shift";
?>
<div class="d-flex justify-content-between align-items-center mb-3">
  <h4 class="fw-bold mb-0">បញ្ចូល ជំនាន់</h4>
  <a href="index.php">
    <button type="button" style="font-size: 0px;" class="btn btn-primary">
      <i class='bx bx-arrow-back'></i>
    </button>
  </a>
</div>
<div class="row">
  <div class="col-xl">
    <div class="card mb-4">
      <div class="card-body">
        <form action="<?php echo BASE_URL ?>controllers/ShiftController.php" method="POST">
          <div class="row">
            <div class="col-sm-6">
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">ឈ្មោះខ្មែរ</label>
                <input type="text" required name="TxtShiftNameKH" id="TxtShiftNameKH" class="form-control" />
              </div>
            </div>
            <div class="col-sm-6">
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">ឈ្មោះអង់គ្លេស</label>
                <input type="text" required name="TxtShiftNameEN" id="TxtShiftNameEN" class="form-control" />
              </div>
            </div>
            <div class="col-sm-6">
              <div class="mb-3">
                <label for="defaultSelect" class="form-label">Status</label>
                <select id="TxtStatus" name="TxtStatus" class="form-select">
                  <option select hidden>
                    --------------------------------------------------------------------------------------------------------------------------------------------------
                  </option>
                  <option selected value="1">Active</option>
                  <option value="2">Inactive</option>
                </select>
              </div>
            </div>
          </div>
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
    var txtShiftNameKH = document.getElementById("TxtShiftNameKH").value;
    var txtShiftNameEN = document.getElementById("TxtShiftNameEN").value;

    if (txtShiftNameKH !== "" && txtShiftNameEN !== "") {
      document.getElementById("btnSave").disabled = false;
    } else {
      document.getElementById("btnSave").disabled = true;
    }
  }

  document.getElementById("TxtShiftNameKH").addEventListener("input", validateForm);
  document.getElementById("TxtShiftNameEN").addEventListener("input", validateForm);

  validateForm();
</script>

<?php
$content = ob_get_clean();
include BASE_PATH . 'views/admin/master.php';
?>