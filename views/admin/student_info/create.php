<?php
ob_start();
require_once '../../../config/config.php';
require_once '../../../connection/db.php';
$title = "Create Student Info";
?>
<div class="d-flex justify-content-between align-items-center mb-3">
  <h4 class="fw-bold mb-0">បញ្ចូល ព័ត៌មាននិសិ្សត</h4>
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
        <form action="<?php echo BASE_URL ?>controllers/StudentInfoController.php" method="POST" enctype="multipart/form-data">
          <div class="row">
            <div class="col-sm-12">
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">ជ្រើសរើស ថ្នាក់រៀន</label>
                <?php
                $select_content = "SELECT * FROM tblprogram  WHERE YearID = 1 ORDER BY YearID ASC, SemesterID ASC";
                $result = mysqli_query($conn, $select_content);
                ?>
                <select required class="form-select" id="TxtProgramID" name="TxtProgramID">
                  <option selected hidden disabled>--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</option>
                  <?php
                  while ($row = mysqli_fetch_array($result)) {
                    $YearID = $row['YearID'];
                    $SemesterID = $row['SemesterID'];
                    $ShiftID = $row['ShiftID'];
                    $DegreeID = $row['DegreeID'];
                    $AcademicYearID = $row['AcademicYearID'];
                    $MajorID = $row['MajorID'];
                    $BatchID = $row['BatchID'];
                    $CampusID = $row['CampusID'];
                    $StartDate = $row['StartDate'];
                    $EndDate = $row['EndDate'];
                    $CreatedDate = $row['CreatedDate'];
                    $YearNameKH = mysqli_fetch_assoc(mysqli_query($conn, "SELECT YearNameKH FROM tblyear WHERE YearID = $YearID"))['YearNameKH'] ?? '';
                    $SemesterNameKH = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SemesterNameKH FROM tblsemester WHERE SemesterID = $SemesterID"))['SemesterNameKH'] ?? '';
                    $ShiftNameKH = mysqli_fetch_assoc(mysqli_query($conn, "SELECT ShiftNameKH FROM tblshift WHERE ShiftID = $ShiftID"))['ShiftNameKH'] ?? '';
                    $DegreeNameKH = mysqli_fetch_assoc(mysqli_query($conn, "SELECT DegreeNameKH FROM tbldegree WHERE DegreeID = $DegreeID"))['DegreeNameKH'] ?? '';
                    $AcademicYear = mysqli_fetch_assoc(mysqli_query($conn, "SELECT AcademicYear FROM tblacademicyear WHERE AcademicYearID = $AcademicYearID"))['AcademicYear'] ?? '';
                    $MajorNameKH = mysqli_fetch_assoc(mysqli_query($conn, "SELECT MajorNameKH FROM tblmajor WHERE MajorID = $MajorID"))['MajorNameKH'] ?? '';
                    $BatchNameKH = mysqli_fetch_assoc(mysqli_query($conn, "SELECT BatchNameKH FROM tblbatch WHERE BatchID = $BatchID"))['BatchNameKH'] ?? '';
                    $CampusNameKH = mysqli_fetch_assoc(mysqli_query($conn, "SELECT CampusNameKH FROM tblcampus WHERE CampusID = $CampusID"))['CampusNameKH'] ?? '';
                  ?>
                    <option value="<?php echo $row["ProgramID"]; ?>">
                      <?php echo $MajorNameKH
                        . " [" . $DegreeNameKH . "]"
                        . "-[" . $BatchNameKH . "]"
                        . "-[" . $ShiftNameKH . "]"
                        . "-[" . $YearNameKH . "]"
                        . "-[" . $SemesterNameKH . "]"
                        . "-[" . $AcademicYear . "] "
                        . "  [Start: " . $StartDate . " "
                        . " End: " . $EndDate . " "
                        . " Created: " . $CreatedDate . "]"
                      ?>
                    </option>
                  <?php
                  }
                  ?>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-3">
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">ឈ្មោះខ្មែរ</label>
                <input type="text" required name="TxtNameInKhmer" class="form-control" id="TxtNameInKhmer" />
              </div>
            </div>
            <div class="col-sm-3">
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">ឈ្មោះ​ឡាតាំង</label>
                <input type="text" required name="TxtNameInLatin" class="form-control" id="TxtNameInLatin" />
              </div>
            </div>
            <div class="col-sm-3">
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">នាមត្រកូល</label>
                <input type="text" required name="TxtFamilyName" class="form-control" id="basic-default-fullname" />
              </div>
            </div>
            <div class="col-sm-3">
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">នាមខ្លួន</label>
                <input type="text" required name="TxtGivenName" class="form-control" id="basic-default-fullname" />
              </div>
            </div>
            <?php
            $faculties = mysqli_query($conn, "SELECT * FROM tblsex");
            ?>
            <div class="col-sm-3">
              <div class="mb-3">
                <label for="defaultSelect" class="form-label">ភេទ</label>
                <select id="CampusID" name="TxtSexID" class="form-select">
                  <option select hidden>
                    --------------------------------------------------------------------------------------------------------------------------------------------------
                  </option>
                  <?php foreach ($faculties as $faculty) { ?>
                    <option value="<?php echo $faculty['SexID']; ?>">
                      <?php echo $faculty['SexNameKH']; ?>
                    </option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">ថ្ងៃខែឆ្នាំ​កំំណើត</label>
                <input type="date" required name="TxtDOB" class="form-control" id="basic-default-fullname" />
              </div>
            </div>
            <div class="col-sm-3">
              <div class="mb-3">
                <label for="defaultSelect" class="form-label">ទីកន្លែងកំណើត</label>
                <select name="TxtPOB" class="form-select">
                  <option select hidden>
                    --------------------------------------------------------------------------------------------------------------------------------------------------
                  </option>
                  <?php
                  $faculties = mysqli_query($conn, "SELECT * FROM tblprovince");
                  foreach ($faculties as $faculty) { ?>
                    <option value="<?php echo $faculty['ProvinceID']; ?>">
                      <?php echo $faculty['ProvinceNameKH']; ?>
                    </option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <?php
            $faculties = mysqli_query($conn, "SELECT * FROM tblnationality");
            ?>
            <div class="col-sm-3">
              <div class="mb-3">
                <label for="defaultSelect" class="form-label">សញ្ជាត្តិ</label>
                <select name="TxtNationalityID" class="form-select">
                  <option select hidden>
                    --------------------------------------------------------------------------------------------------------------------------------------------------
                  </option>
                  <?php foreach ($faculties as $faculty) { ?>
                    <option value="<?php echo $faculty['NationalityID']; ?>">
                      <?php echo $faculty['NationalityNameKH']; ?>
                    </option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <?php
            $faculties = mysqli_query($conn, "SELECT * FROM tblcountry");
            ?>
            <div class="col-sm-3">
              <div class="mb-3">
                <label for="defaultSelect" class="form-label">ប្រទេស</label>
                <select name="TxtCountryID" class="form-select">
                  <option select hidden>
                    --------------------------------------------------------------------------------------------------------------------------------------------------
                  </option>
                  <?php foreach ($faculties as $faculty) { ?>
                    <option value="<?php echo $faculty['CountryID']; ?>">
                      <?php echo $faculty['CountryNameKH']; ?>
                    </option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">អត្តលេខលិខិតឆ្លងដែន</label>
                <input type="text" required name="TxtIDPassportNo" class="form-control" id="basic-default-fullname" />
              </div>
            </div>
            <div class="col-sm-3">
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">អាស័យដ្ឋានបច្ចុប្បន្ន</label>
                <input type="text" required name="TxtCurrentAddress" class="form-control" id="basic-default-fullname" />
              </div>
            </div>
            <div class="col-sm-3">
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">អាស័យដ្ឋាននៅភ្នំពេញ</label>
                <input type="text" required name="TxtCurrentAddressPP" class="form-control" id="basic-default-fullname" />
              </div>
            </div>
            <div class="col-sm-3">
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">អ៊ីមែល</label>
                <input type="text" required name="TxtEmail" class="form-control" id="basic-default-fullname" />
              </div>
            </div>
            <div class="col-sm-3">
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">លេខទូរសព្ទ</label>
                <input type="text" required name="TxtPhoneNumber" class="form-control" id="basic-default-fullname" />
              </div>
            </div>
            <div class="col-sm-3">
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">រូបថត</label>
                <input type="file" name="TxtPhoto" class="form-control" id="basic-default-fullname" />
              </div>
            </div>
            <div class="col-sm-3">
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">ថ្ងៃចុះឈ្មោះ</label>
                <?php
                $current_date = date("Y-m-d");
                ?>
                <input type="date" value="<?php echo $current_date; ?>" name="TxtRegisterDate" class="form-control" id="basic-default-fullname" />
              </div>
            </div>
          </div>
          <!-- <div class="col-sm-3">
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">រូបថត</label>
                <input type="file" name="TxtPhoto" class="form-control" id="basic-default-fullname" />
              </div>
            </div> -->
          <div class="float-start">
            <button type="submit" id="btnSave" name="btnSave" class="btn  btn-primary">Save</button>
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
    var txtNameInLatin = document.getElementById("txtNameInLatin").value;
    var txtNameInKhmer = document.getElementById("TxtNameInKhmer").value;
    console.log(txtNameInKhmer + txtNameInLatin);
    if (txtNameInLatin !== "" && txtNameInKhmer !== "") {
      document.getElementById("btnSave").disabled = false;
    } else {
      document.getElementById("btnSave").disabled = true;
    }
  }

  document.getElementById("txtNameInLatin").addEventListener("input", validateForm);
  document.getElementById("txtNameInKhmer").addEventListener("input", validateForm);

  validateForm();
</script>

<?php
$content = ob_get_clean();
include BASE_PATH . 'views/admin/master.php';
?>