<?php
ob_start();
require_once '../../../config/config.php';
require_once '../../../connection/db.php';
$title = "Create Program";
?>
<h4 class="fw-bold mb-3">បញ្ចូល កម្មវិធីសិក្សា</h4>
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
                  foreach($rows as $row){
                    ?>
                    <option value="<?php echo $row['MajorID'] ?>">
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
                  foreach($rows as $row){
                    ?>
                    <option value="<?php echo $row['YearID'] ?>">
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
                  <?php foreach ($rows as $row) { ?>
                    <option value="<?php echo $row['SemesterID']; ?>">
                      <?php echo $row['SemesterNameKH']; ?>
                    </option>
                  <?php } ?>
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
                  <?php foreach ($rows as $row) { ?>
                    <option value="<?php echo $row['ShiftID']; ?>">
                      <?php echo $row['ShiftNameKH']; ?>
                    </option>
                  <?php } ?>
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
                  <?php foreach ($rows as $row) { ?>
                    <option value="<?php echo $row['AcademicYearID']; ?>">
                      <?php echo $row['AcademicYear']; ?>
                    </option>
                  <?php } ?>
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
                  <?php foreach ($rows as $row) { ?>
                    <option value="<?php echo $row['DegreeID']; ?>">
                      <?php echo $row['DegreeNameKH']; ?>
                    </option>
                  <?php } ?>
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
                  <?php foreach ($rows as $row) { ?>
                    <option value="<?php echo $row['BatchID']; ?>">
                      <?php echo $row['BatchNameKH']; ?>
                    </option>
                  <?php } ?>
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
                  <?php foreach ($rows as $row) { ?>
                    <option value="<?php echo $row['CampusID']; ?>">
                      <?php echo $row['CampusNameKH']; ?>
                    </option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="mb-3">
                <label class="form-label">ថ្ងៃចាប់ផ្តើម</label>
                <input type="date" required name="StartDate" class="form-control" />
              </div>
            </div>
            <div class="col-sm-4">
              <div class="mb-3">
                <label class="form-label">ថ្ងៃបញ្ចប់</label>
                <input type="date" required name="EndDate" class="form-control" />
              </div>
            </div>
            <?php
            $current_date = date("Y-m-d");
            ?>
            <input hidden value="<?php echo $current_date ?>" type="date" required name="CreatedDate"
              class="form-control" />
            <!-- <div class="col-sm-4">
              <div class="mb-3">
                <label class="form-label">ថ្ងៃបង្កើត</label>
                <input value="<?php echo $current_date ?>" type="date" required name="CreatedDate"
                  class="form-control" />
              </div>
            </div> -->
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