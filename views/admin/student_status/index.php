<?php
ob_start();
require_once '../../../config/config.php';
require_once '../../../connection/db.php';
$title = "List ";
?>

<h4 class="fw-bold mb-2 d-flex justify-content-between align-items-center">
    ការគ្រប់គ្រង ស្ថានភាពនិសិត្ស
    <!-- <a href="addShift.php" style="font-size:25px;" class="text-primary">
        <i class="bi bi-plus-square-fill "></i>
    </a> -->
</h4>
<div class="card">
    <div class="card-body">
        <?php
        if (isset($_SESSION['Message'])) {
            ?>
            <div class="alert alert-primary text-center alert-dismissible" role="alert">
                <?php echo $_SESSION['Message']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
        } else if (isset($_SESSION['ErrorMessage'])) {
            ?>
                <div class="alert alert-danger text-center alert-dismissible" role="alert">
                <?php echo $_SESSION['ErrorMessage']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
        }
        unset($_SESSION['Message']); // Unset the session message after displaying it
        unset($_SESSION['ErrorMessage']); // Unset the session message after displaying it
        ?>
        <form action="actionStudentStatus.php" method="POST">
            <div class="row">
                <div class="col-sm-6">
                    <!-- Select -->
                    <div class="mb-3">
                        <label for="defaultSelect" class="form-label">ថ្នាក់កំពុងសិក្សា</label>
                        <select class="form-select" id="selectID">
                            <option select hidden>
                                --------------------------------------------------------------------------------------------------------------------------------------------------
                            </option>
                            <?php
                            $rows = mysqli_query($conn, "SELECT * FROM tblprogram ORDER BY ProgramID ASC");
                            ?>
                            <?php foreach ($rows as $row) { 
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
                                    ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <!-- List data -->
                    <div class="table-responsive text-nowrap">
                        <table class="table table-bordered table-sm">
                            <thead class="table-secondary text-center">
                                <tr>
                                    <th>
                                        Assign
                                    </th>
                                    <th>
                                        អត្តលេខ
                                    </th>
                                    <th>
                                        ឈ្មោះខ្មែរ
                                    </th>
                                    <th>
                                        ឈ្មោះឡាតាំង
                                    </th>
                                    <th>
                                        ភេទ
                                    </th>
                                    <th>
                                        លទ្ធផល
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="show">
                                <!-- <tr class="text-center">
                                    <td><input class="form-check-input" type="checkbox" checked/></td>
                                    <td>1</td>
                                    <td>ចន្នី សំណាង</td>
                                    <td>Channy Samnang</td>
                                    <td>ប្រុស</td>
                                    <td>ជាប់</td>
                                </tr>
                                <tr class="text-center">
                                    <td><input class="form-check-input" type="checkbox" checked/></td>
                                    <td>1</td>
                                    <td>ចន្នី សំណាង</td>
                                    <td>Channy Samnang</td>
                                    <td>ប្រុស</td>
                                    <td>ជាប់</td>
                                </tr>
                                <tr class="text-center">
                                    <td><input class="form-check-input" type="checkbox" checked/></td>
                                    <td>1</td>
                                    <td>ចន្នី សំណាង</td>
                                    <td>Channy Samnang</td>
                                    <td>ប្រុស</td>
                                    <td>ជាប់</td>
                                </tr> -->

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="defaultSelect" class="form-label">ថ្នាក់សិក្សាថ្មី</label>
                        <select name="ProgramID" id="NewProgramID" class="form-select">
                            <option select hidden>
                                --------------------------------------------------------------------------------------------------------------------------------------------------
                            </option>
                            <?php
                            $rows = mysqli_query($conn, "SELECT * FROM tblprogram ORDER BY ProgramID ASC");
                            ?>
                            <?php foreach ($rows as $row) { 
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
                                    ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                     <!-- List data -->
                    <div class="table-responsive text-nowrap">
                        <table class="table table-bordered table-sm">
                            <thead class="table-secondary text-center">
                                <tr>
                                    <th>
                                        Assign
                                    </th>
                                    <th>
                                        អត្តលេខ
                                    </th>
                                    <th>
                                        ឈ្មោះខ្មែរ
                                    </th>
                                    <th>
                                        ឈ្មោះឡាតាំង
                                    </th>
                                    <th>
                                        ភេទ
                                    </th>
                                    <th>
                                        លទ្ធផល
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="oldStudents">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php $current_date = date("Y-m-d"); ?>
                  <input hidden type="date" required name="AssignDate" value="<?php echo $current_date ?>"
                    class="form-control form-control-sm" />
                  <input hidden class="form-control form-control-sm" name="Note" id="exampleTextarea1">

                <!-- Clode div row -->
            </div>
            <div class="mt-2">
                <button type="submit" name="btnAdd" class="btn btn-sm btn-primary">Save</button>
                <a href="indexStudentStatus.php">
                    <button type="button" class="btn btn-sm btn-secondary">Cancel</button>
                </a>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function () {
    $('#selectID').on('change', function () {
        var ProgramID = $(this).val();
        $.ajax({
        type: 'POST',
        url: '../../components/fetchStudentCurrentAcademicProgram.php',
        data: { id: ProgramID },
        success: function (data) {
            $('#show').html(data);
        }
        });
    });
    $('#NewProgramID').on('change', function () {
        var ProgramID = $(this).val();
        $.ajax({
        type: 'POST',
        url: '../../components/fetchStudentNewAcademicProgram.php',
        data: { id: ProgramID },
        success: function (data) {
            $('#oldStudents').html(data);
        }
        });
    });
    });
</script>

<?php
    $content = ob_get_clean();
    include BASE_PATH . 'views/admin/master.php';
?>
<!-- Script confirm delete -->
<script>
    $(document).ready(function () {
        $('.btnDelete').on('click', function () {
            var deleteId = $(this).data('id');
            var deleteUrl = '<?php echo BASE_URL ?>actions/YearAction.php?id=' + deleteId;
            $('#confirmDelete').attr('href', deleteUrl);
        });
    });
</script>