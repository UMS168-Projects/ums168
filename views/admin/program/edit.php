<?php
    ob_start();
    require_once '../../../config/config.php';
    require_once '../../../connection/db.php';
    $title      = "Edit Program";
    $id         = $_GET['id'];
    $select_row = mysqli_query($conn, "SELECT * FROM tblprogram Where ProgramID = $id");
    foreach ($select_row as $row) {
        $YearID         = $row['YearID'];
        $SemesterID     = $row['SemesterID'];
        $ShiftID        = $row['ShiftID'];
        $DegreeID       = $row['DegreeID'];
        $AcademicYearID = $row['AcademicYearID'];
        $MajorID        = $row['MajorID'];
        $BatchID        = $row['BatchID'];
        $CampusID       = $row['CampusID'];
        $StartDate      = $row['StartDate'];
        $EndDate        = $row['EndDate'];
        $CreatedDate    = $row['CreatedDate'];
    }
?>
<h4 class="fw-bold mb-3">កែប្រែ កម្មវិធីសិក្សា</h4>
<div class="row">
  <div class="col-xl">
    <div class="card mb-4">
      <div class="card-body">
        <form action="<?php echo BASE_URL; ?>actions/ProgramAction.php" method="POST">
          <div class="row">
            <?php
                $rows = mysqli_query($conn, "SELECT * FROM tblmajor");
            ?>
            <div class="col-sm-4">
              <div class="mb-3">
                <label for="defaultSelect" class="form-label">ជំនាញ</label>
                <select id="MajorID" name="MajorID" class="form-select">
                  <option select hidden>
                    ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
                  </option>
                  <?php
                      foreach ($rows as $row) {
                          $selected = ($row["MajorID"] == $MajorID) ? "selected" : "";
                      ?>
                    <option value="<?php echo $row['MajorID'] ?>"<?php echo $selected ?>>
                      <?php echo $row['MajorNameKH']; ?>
                    </option>
                    <?php
                        }
                    ?>
                </select>
              </div>
            </div>
            <?php
                $rows = mysqli_query($conn, "SELECT * FROM tblyear");
            ?>
            <div class="col-sm-4">
              <div class="mb-3">
                <label class="form-label">ឆ្នាំ</label>
                <select id="YearID" name="YearID" class="form-select">
                  <option select hidden>
                    ------------------------------------------------------------------
                  </option>
                   <?php
                       foreach ($rows as $row) {
                          $selected = ($row["YearID"] == $YearID) ? "selected" : "";
                       ?>
                    <option value="<?php echo $row['YearID'] ?>"<?php echo $selected ?>>
                      <?php echo $row['YearNameKH']; ?>
                    </option>
                    <?php
                        }
                    ?>
                </select>
              </div>
            </div>
            <?php
                $rows = mysqli_query($conn, "SELECT * FROM tblsemester");
            ?>
            <div class="col-sm-4">
              <div class="mb-3">
                <label class="form-label">ឆមាស</label>
                <select id="SemesterID" name="SemesterID" class="form-select">
                  <option select hidden>
                    ------------------------------------------------------------------
                  </option>
                  <?php foreach ($rows as $row) {
                          $selected = ($row["SemesterID"] == $SemesterID) ? "selected" : "";
                    ?>
                    <option value="<?php echo $row['SemesterID']; ?>"<?php echo $selected ?>>
                      <?php echo $row['SemesterNameKH']; ?>
                    </option>
                  <?php }?>
                </select>
              </div>
            </div>
            <?php
                $rows = mysqli_query($conn, "SELECT * FROM tblshift");
            ?>
            <div class="col-sm-4">
              <div class="mb-3">
                <label class="form-label">វេន</label>
                <select id="ShiftID" name="ShiftID" class="form-select">
                  <option select hidden>
                    ------------------------------------------------------------------
                  </option>
                  <?php foreach ($rows as $row) {
                          $selected = ($row["ShiftID"] == $ShiftID) ? "selected" : "";
                    
                    ?>
                    <option value="<?php echo $row['ShiftID']; ?>"<?php echo $selected ?>>
                      <?php echo $row['ShiftNameKH']; ?>
                    </option>
                  <?php }?>
                </select>
              </div>
            </div>
            <?php
                $rows = mysqli_query($conn, "SELECT * FROM tblacademicyear");
            ?>
            <div class="col-sm-4">
              <div class="mb-3">
                <label class="form-label">ឆ្នាំសិក្សា</label>
                <select id="AcademicYearID" name="AcademicYearID" class="form-select">
                  <option select hidden>
                    ------------------------------------------------------------------
                  </option>
                  <?php foreach ($rows as $row) {
                          $selected = ($row["AcademicYearID"] == $AcademicYearID) ? "selected" : "";
                    
                    ?>
                    <option value="<?php echo $row['AcademicYearID']; ?>"<?php echo $selected ?>>
                      <?php echo $row['AcademicYear']; ?>
                    </option>
                  <?php }?>
                </select>
              </div>
            </div>
            <?php
                $rows = mysqli_query($conn, "SELECT * FROM tbldegree");
            ?>
            <div class="col-sm-4">
              <div class="mb-3">
                <label class="form-label">កម្រិត</label>
                <select id="DegreeID" name="DegreeID" class="form-select">
                  <option select hidden>
                    ------------------------------------------------------------------
                  </option>
                  <?php foreach ($rows as $row) {
                          $selected = ($row["DegreeID"] == $DegreeID) ? "selected" : "";
                    
                    ?>
                    <option value="<?php echo $row['DegreeID']; ?>"<?php echo $selected ?>>
                      <?php echo $row['DegreeNameKH']; ?>
                    </option>
                  <?php }?>
                </select>
              </div>
            </div>
            <?php
                $rows = mysqli_query($conn, "SELECT * FROM tblbatch");
            ?>
            <div class="col-sm-4">
              <div class="mb-3">
                <label class="form-label">ជំនាន់</label>
                <select id="BatchID" name="BatchID" class="form-select">
                  <option select hidden>
                    ------------------------------------------------------------------
                  </option>
                  <?php foreach ($rows as $row) {
                          $selected = ($row["BatchID"] == $BatchID) ? "selected" : "";
                    
                    ?>
                    <option value="<?php echo $row['BatchID']; ?>"<?php echo $selected ?>>
                      <?php echo $row['BatchNameKH']; ?>
                    </option>
                  <?php }?>
                </select>
              </div>
            </div>
            <?php
                $rows = mysqli_query($conn, "SELECT * FROM tblcampus");
            ?>
            <div class="col-sm-4">
              <div class="mb-3">
                <label class="form-label">សាខា</label>
                <select id="CampusID" name="CampusID" class="form-select">
                  <option select hidden>
                    ------------------------------------------------------------------
                  </option>
                  <?php foreach ($rows as $row) {
                          $selected = ($row["CampusID"] == $CampusID) ? "selected" : "";
                    
                    ?>
                    <option value="<?php echo $row['CampusID']; ?>"<?php echo $selected ?>>
                      <?php echo $row['CampusNameKH']; ?>
                    </option>
                  <?php }?>
                </select>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="mb-3">
                <label class="form-label">ថ្ងៃចាប់ផ្តើម</label>
                <input type="date" value="<?php echo $StartDate ?>" required name="StartDate" class="form-control" />
              </div>
            </div>
            <div class="col-sm-4">
              <div class="mb-3">
                <label class="form-label">ថ្ងៃបញ្ចប់</label>
                <input type="date" value="<?php echo $EndDate ?>" required name="EndDate" class="form-control" />
              </div>
            </div>
            <input hidden value="<?php echo $CreatedDate ?>" type="date" required name="CreatedDate"
              class="form-control" />
              <input value="<?php echo $id ?>" type="hidden" required name="ProgramID"
              class="form-control" />
          </div>
          <button type="submit" name="btnAdd" style="background-color:#0d6efd;" class="btn btn-sm btn-primary">Save</button>
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