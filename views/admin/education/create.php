<?php
ob_start();
require_once '../../../config/config.php';
require_once '../../../connection/db.php';
$title = "Create Educational Background";
?>
<h4 class="fw-bold mb-3">បញ្ចូល  ប្រវត្តិនៃការសិក្សា</h4>
<div class="row">
  <div class="col-xl">
    <div class="card mb-4">
      <div class="card-body">
        <form action="<?php echo BASE_URL ?>controllers/EducationController.php" method="POST">
          <div class="row">
            <div class="col-sm-3">
              <div class="mb-3">
                <label for="defaultSelect" class="form-label">និសិត្ស</label>
                <select name="TxtStudentID" id="TxtStudentID" class="form-select">
                  <option select hidden>
                    --------------------------------------------------------------------------------------------------------------------------------------------------
                  </option>
                  <?php
                  $rows = mysqli_query($conn, "SELECT * FROM tblstudentinfo");
                  ?>
                  <?php foreach ($rows as $row) { ?>
                    <option value="<?php echo $row['StudentID']; ?>">
                      <?php echo $row['NameInKhmer']; ?>
                    </option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">ឈ្មោះសាលា</label>
                <input type="text" required name="TxtSchoolName" class="form-control" id="TxtSchoolName" />
              </div>
            </div>
            <?php
            $rows = mysqli_query($conn, "SELECT * FROM tblschooltype");
            ?>
            <div class="col-sm-3">
              <div class="mb-3">
                <label for="defaultSelect" class="form-label">ប្រភេទសាលា</label>
                <select name="TxtSchoolTypeID" id="TxtSchoolTypeID" class="form-select">
                  <option select hidden>
                    --------------------------------------------------------------------------------------------------------------------------------------------------
                  </option>
                  <?php foreach ($rows as $row) { ?>
                    <option value="<?php echo $row['SchoolTypeID']; ?>">
                      <?php echo $row['SchoolTypeNameKH']; ?>
                    </option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <?php
            $rows = mysqli_query($conn, "SELECT * FROM tblacademicyear");
            ?>
            <div class="col-sm-3">
              <div class="mb-3">
                <label for="defaultSelect" class="form-label">ឆ្នាំសិក្សា</label>
                <select name="TxtAcademicYearID" id="TxtAcademicYearID" class="form-select">
                  <option select hidden>
                    --------------------------------------------------------------------------------------------------------------------------------------------------
                  </option>
                  <?php foreach ($rows as $row) { ?>
                    <option value="<?php echo $row['AcademicYearID']; ?>">
                      <?php echo $row['AcademicYear']; ?>
                    </option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <?php
            $rows = mysqli_query($conn, "SELECT * FROM tblprovince");
            ?>
            <div class="col-sm-3">
              <div class="mb-3">
                <label for="defaultSelect" class="form-label">ខេត្តឬរាជធានី</label>
                <select name="TxtProvinceID" id="TxtProvinceID" class="form-select">
                  <option select hidden>
                    --------------------------------------------------------------------------------------------------------------------------------------------------
                  </option>
                  <?php foreach ($rows as $row) { ?>
                    <option value="<?php echo $row['ProvinceID']; ?>">
                      <?php echo $row['ProvinceNameKH']; ?>
                    </option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="mb-3">
                <label for="defaultSelect" class="form-label">Status</label>
                <select id="TxtStatus"  name="TxtStatus" class="form-select">
                  <option select hidden>
                    --------------------------------------------------------------------------------------------------------------------------------------------------
                  </option>
                  <option selected value="1">Active</option>
                  <option value="2">Inactive</option>
                </select>
              </div>
            </div>
            <!-- Clode div row -->
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
    const isValid = 
      document.getElementById("TxtStudentID").value.trim() !== "" &&
      document.getElementById("TxtSchoolName").value.trim() !== "" &&
      document.getElementById("TxtSchoolTypeID").value.trim() !== "" &&
      document.getElementById("TxtAcademicYearID").value.trim() !== "" &&
      document.getElementById("TxtProvinceID").value.trim() !== "" &&
      document.getElementById("TxtStatus").value.trim() !== "";

    document.getElementById("btnSave").disabled = !isValid;
  }

  const inputs = [
    "TxtStudentID",
    "TxtSchoolName",
    "TxtSchoolTypeID",
    "TxtAcademicYearID",
    "TxtProvinceID",
    "TxtStatus"
  ];

  inputs.forEach(function(id) {
    const el = document.getElementById(id);
    if (el) {
      el.addEventListener("change", validateForm);
      el.addEventListener("input", validateForm);
    }
  });

  validateForm(); // Initial check on page load
</script>

<?php
$content = ob_get_clean();
include BASE_PATH . 'views/admin/master.php';
?>