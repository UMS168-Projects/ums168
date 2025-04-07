<?php
ob_start();
    require_once '../../../config/config.php';
    require_once '../../../connection/db.php';
    $title = "Create Scholarship Granted";
?>
<h4 class="fw-bold mb-3">បញ្ចូល ការផ្តល់អាហាររូករណ៍</h4>
<div class="row">
  <div class="col-xl">
    <div class="card mb-4">
      <div class="card-body">
        <form action="<?php echo BASE_URL; ?>actions/ScholarshipGrantedAction.php" method="POST">
          <div class="row">
            <div class="col-sm-4">
              <div class="mb-3">
                <label class="form-label">អាហាររូករណ៍</label>
                <select id="ScholarshipID" name="ScholarshipID" class="form-select">
                  <option select hidden>
                    ------------------------------------------------------------------
                  </option>
                  <?php
                      $rows = mysqli_query($conn, "SELECT * FROM Scholarship_Tbl");
                      foreach ($rows as $row) {
                      ?>
                    <option value="<?php echo $row['ScholarshipID']; ?>">
                      <?php echo $row['Scholarship']; ?>
                    </option>
                  <?php
                  }?>
                </select>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="mb-3">
                <label class="form-label">និសិត្ស</label>
                <select id="StudentID" name="StudentID" class="form-select">
                  <option select hidden>
                    ------------------------------------------------------------------
                  </option>
                  <?php
                      $rows = mysqli_query($conn, "SELECT * FROM tblstudentinfo");
                      foreach ($rows as $row) {
                      ?>
                    <option value="<?php echo $row['StudentID']; ?>">
                      <?php echo $row['NameInKhmer']; ?>
                    </option>
                  <?php
                  }?>
                </select>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="mb-3">
                <label class="form-label">ឆ្នាំ</label>
                <select id="YearID" name="YearID" class="form-select">
                  <option select hidden>
                    ------------------------------------------------------------------
                  </option>
                  <?php
                      $rows = mysqli_query($conn, "SELECT * FROM tblyear");
                      foreach ($rows as $row) {
                      ?>
                    <option value="<?php echo $row['YearID']; ?>">
                      <?php echo $row['YearNameKH']; ?>
                    </option>
                  <?php
                  }?>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">ស្នើរដោយ</label>
                <input type="text" required name="RequestedBy" class="form-control" />
              </div>
            </div>
            <div class="col-sm-4">
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">ចំនួន</label>
                <input type="text" required name="Amount" class="form-control" />
              </div>
            </div>
            <div class="col-sm-4">
              <div class="mb-3">
                <label class="form-label">ស្ថានភាព</label>
                <select id="StudentID" name="IsContinue" class="form-select">
                  <option select hidden>
                    ------------------------------------------------------------------
                  </option>
                  <option selected value="1"> Active </option>
                  <option value="0"> Inactive </option>
                </select>
              </div>
            </div>
            <?php
                $current_date = date("Y-m-d");
            ?>
            <div class="col-sm-4">
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">កាលបរិច្ឆេទ</label>
                <input type="date" value="<?php echo $current_date; ?>" name="GrantedDate" class="form-control" />
              </div>
            </div>
          </div>
          <button type="submit" name="btnAdd" class="btn  btn-primary">Save</button>
          <a href="index.php">
            <button type="button" class="btn  btn-secondary">Cancel</button>
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