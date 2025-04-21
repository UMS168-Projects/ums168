<?php
require_once '../../../config/config.php';
require_once '../../../connection/db.php';
$title = "Edit ";
?>
<h4 class="fw-bold mb-3">កែប្រែ ប្រវត្តិនៃការសិក្សា</h4>
<div class="row">
  <div class="col-xl">
    <div class="card mb-4">
      <div class="card-body">
        <form action="actionEducational.php" method="POST">
          <div class="row">
            <div class="col-sm-3">
              <div class="mb-3">
                <label for="defaultSelect" class="form-label">និសិត្ស</label>
                <select name="StudentID" class="form-select">
                  <option select hidden>
                    --------------------------------------------------------------------------------------------------------------------------------------------------
                  </option>
                  <?php 
                    $rows = mysqli_query($conn, "SELECT * FROM tblstudentinfo");
                    foreach ($rows as $row) { 
                    $selected = ($row["StudentID"] == $StudentID) ? "selected" : "";
                  ?>
                  <option value="<?php echo $row['StudentID']; ?>" <?php echo $selected; ?>>
                    <?php echo $row['NameInKhmer']; ?>
                  </option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">ឈ្មោះសាលា</label>
                <input type="text" value="<?php echo $SchoolName; ?>" required name="SchoolName" class="form-control" id="basic-default-fullname" />
              </div>
            </div>
            <div class="col-sm-3">
              <div class="mb-3">
                <label for="defaultSelect" class="form-label">ប្រភេទសាលា</label>
                <select name="SchoolTypeID" class="form-select">
                  <option select hidden>
                    --------------------------------------------------------------------------------------------------------------------------------------------------
                  </option>
                  <?php 
                    $rows = mysqli_query($conn, "SELECT * FROM tblschooltype");
                    foreach ($rows as $row) { 
                    $selected = ($row["SchoolTypeID"] == $SchoolTypeID) ? "selected" : "";
                  ?>
                  <option value="<?php echo $row['SchoolTypeID']; ?>" <?php echo $selected; ?>>
                    <?php echo $row['SchoolTypeNameKH']; ?>
                  </option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="mb-3">
                <label for="defaultSelect" class="form-label">ឆ្នាំសិក្សា</label>
                <select name="AcademicYearID" class="form-select">
                  <option select hidden>
                    --------------------------------------------------------------------------------------------------------------------------------------------------
                  </option>
                  <?php
                    $rows = mysqli_query($conn, "SELECT * FROM tblacademicyear");
                    foreach ($rows as $row) { 
                    $selected = ($row["AcademicYearID"] == $AcademicYearID) ? "selected" : "";
                  ?>
                  <option value="<?php echo $row['AcademicYearID']; ?>" <?php echo $selected; ?> >
                    <?php echo $row['AcademicYear']; ?>
                  </option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <?php
            ?>
            <div class="col-sm-3">
              <div class="mb-3">
                <label for="defaultSelect" class="form-label">ខេត្តឬរាជធានី</label>
                <select name="ProvinceID" class="form-select">
                  <option select hidden>
                    --------------------------------------------------------------------------------------------------------------------------------------------------
                  </option>
                  <?php 
                    $rows = mysqli_query($conn, "SELECT * FROM tblprovince");
                    foreach ($rows as $row) { 
                    $selected = ($row["ProvinceID"] == $ProvinceID) ? "selected" : "";
                  ?>
                  <option value="<?php echo $row['ProvinceID']; ?>" <?php echo $selected; ?>>
                    <?php echo $row['ProvinceNameKH']; ?>
                  </option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <!-- Clode div row -->
          </div>
          <input type="text" hidden value="<?php echo $id; ?>" name="EducationalBackgroundID" class="form-control" id="basic-default-fullname" />
          <button type="submit" name="btnEdit" class="btn btn-sm btn-primary">Save Change</button>
          <a href="indexEducational.php">
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