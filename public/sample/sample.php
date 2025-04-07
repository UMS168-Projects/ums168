<div class="row">
            <h5 class="float-start">Create New Subjects </h5>
            <?php
            $faculties = mysqli_query($conn, "SELECT * FROM tblfaculty");
            ?>
            <div class="col">
                <div class="mb-3">
                    <label for="defaultSelect" class="form-label">មហាវិទ្យាល័យ</label>
                    <select id="defaultSelect" name="facultyID" class="form-select">
                        <option select hidden>-----------------------------------------</option>
                        <?php foreach ($faculties as $faculty) { ?>
                            <option value="<?php echo $faculty['FacultyID']; ?>">
                                <?php echo $faculty['FacultyNameKH']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <?php
            $majors = mysqli_query($conn, "SELECT * FROM tblmajor");
            ?>
            <div class="col">
                <div class="mb-3">
                    <label for="defaultSelect" class="form-label">ជំនាញ</label>
                    <select id="defaultSelect" name="MajorID" class="form-select">
                        <option select hidden>-----------------------------------------</option>
                        <?php foreach ($majors as $major) { ?>
                            <option value="<?php echo $major['MajorID']; ?>">
                                <?php echo $major['MajorNameKH']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <?php
            $degrees = mysqli_query($conn, "SELECT * FROM tbldegree");
            ?>
            <div class="col">
                <div class="mb-3">
                    <label for="defaultSelect" class="form-label">កម្រិត</label>
                    <select id="defaultSelect" name="DegreeID" class="form-select">
                        <option select hidden>-----------------------------------------</option>
                        <?php foreach ($degrees as $degree) { ?>
                            <option value="<?php echo $degree['DegreeID']; ?>">
                                <?php echo $degree['DegreeNameKH']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <?php
            $academics = mysqli_query($conn, "SELECT * FROM tblacademicyear");
            ?>
            <div class="col">
                <div class="mb-3">
                    <label for="defaultSelect" class="form-label">ឆ្នាំសិក្សា</label>
                    <select id="defaultSelect" name="AcademicYearID" class="form-select">
                        <option select hidden>-----------------------------------------</option>
                        <?php foreach ($academics as $academic) { ?>
                            <option value="<?php echo $academic['AcademicYearID']; ?>">
                                <?php echo $academic['AcademicYear']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            
            <?php
            $Shifts = mysqli_query($conn, "SELECT * FROM tblshift");
            ?>
            <div class="col">
                <div class="mb-3">
                    <label for="defaultSelect" class="form-label">វេន</label>
                    <select id="defaultSelect" name="ShiftID" class="form-select">
                        <option select hidden>-----------------------------------------</option>
                        <?php foreach ($Shifts as $Shift) { ?>
                            <option value="<?php echo $Shift['ShiftID']; ?>">
                                <?php echo $Shift['ShiftNameKH']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <?php
            $Degrees = mysqli_query($conn, "SELECT * FROM tblDegree");
            ?>
            <div class="col">
                <div class="mb-3">
                    <label for="defaultSelect" class="form-label">កម្រិត</label>
                    <select id="defaultSelect" name="DegreeID" class="form-select">
                        <option select hidden>-----------------------------------------</option>
                        <?php foreach ($Degrees as $Degree) { ?>
                            <option value="<?php echo $Degree['DegreeID']; ?>">
                                <?php echo $Degree['DegreeNameKH']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>


        <div class="card mb-2">
    <div class="card-body">
        <?php
        if (isset($_SESSION['Message'])) {
            ?>
            <div class="alert alert-primary text-center alert-dismissible" role="alert">
                <?php echo $_SESSION['Message']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
            unset($_SESSION['Message']);
        }
        ?>
        <form action="" id="form-section" method="post">
            <div class="row">
                <h5 class="float-start">ជ្រើសរើស</h5>
                <?php
                $faculties = mysqli_query($conn, "SELECT * FROM tblfaculty");
                ?>
                <div class="col-sm-4">
                    <div class="mb-3">
                        <label for="defaultSelect" class="form-label">មហាវិទ្យាល័យ</label>
                        <select id="FacultyID" name="FacultyID" class="form-select">
                            <option select hidden>
                                -------------------------------------------------------------------------
                            </option>
                            <?php foreach ($faculties as $faculty) { ?>
                                <option value="<?php echo $faculty['FacultyID']; ?>">
                                    <?php echo $faculty['FacultyNameKH']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <?php
                $majors = mysqli_query($conn, "SELECT * FROM tblmajor");
                ?>
                <div class="col-sm-3">
                    <div class="mb-3">
                        <label for="defaultSelect" class="form-label">ជំនាញ</label>
                        <select disabled id="MajorID" disabled name="MajorID" class="form-select">
                            <option select hidden>
                                -------------------------------------------------------------------------
                            </option>
                        </select>
                    </div>
                </div>
                <?php
                $academics = mysqli_query($conn, "SELECT * FROM tblyear");
                ?>
                <div class="col">
                    <div class="mb-3">
                        <label for="defaultSelect" class="form-label">ឆ្នាំ</label>
                        <select disabled id="YearID" name="YearID" class="form-select">
                            <option select hidden>-----------------------------------------</option>
                            <?php foreach ($academics as $academic) { ?>
                                <option value="<?php echo $academic['YearID']; ?>">
                                    <?php echo $academic['YearNameKH']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <?php
                $semesters = mysqli_query($conn, "SELECT * FROM tblsemester");
                ?>
                <div class="col">
                    <div class="mb-3">
                        <label for="defaultSelect" class="form-label">ឆមាស</label>
                        <select disabled id="SemesterID" name="SemesterID" class="form-select">
                            <option select hidden>-----------------------------------------</option>
                            <?php foreach ($semesters as $semester) { ?>
                                <option value="<?php echo $semester['SemesterID']; ?>">
                                    <?php echo $semester['SemesterNameKH']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <?php
                $degrees = mysqli_query($conn, "SELECT * FROM tblshift");
                ?>
                <div class="col">
                    <div class="mb-3">
                        <label for="defaultSelect" class="form-label">វេន</label>
                        <select disabled id="ShiftID" name="ShiftID" class="form-select">
                            <option select hidden>-----------------------------------------</option>
                            <?php foreach ($degrees as $degree) { ?>
                                <option value="<?php echo $degree['ShiftID']; ?>">
                                    <?php echo $degree['ShiftNameKH']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <!-- <div class="row">
                    <?php
                    $rows = mysqli_query($conn, "SELECT * FROM tblprogram");
                    ?>
                    <di <?php
                                foreach ($rows as $row) {
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

                                    $YearNameKH = mysqli_fetch_assoc(mysqli_query($conn, "SELECT YearNameKH FROM tblyear WHERE YearID = $YearID"))['YearNameKH'] ?? '';
                                    $SemesterNameKH = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SemesterNameKH FROM tblSemester WHERE SemesterID = $SemesterID"))['SemesterNameKH'] ?? '';
                                    $ShiftNameKH = mysqli_fetch_assoc(mysqli_query($conn, "SELECT ShiftNameKH FROM tblShift WHERE ShiftID = $ShiftID"))['ShiftNameKH'] ?? '';
                                    $DegreeNameKH = mysqli_fetch_assoc(mysqli_query($conn, "SELECT DegreeNameKH FROM tblDegree WHERE DegreeID = $DegreeID"))['DegreeNameKH'] ?? '';
                                    $AcademicYear = mysqli_fetch_assoc(mysqli_query($conn, "SELECT AcademicYear FROM tblAcademicYear WHERE AcademicYearID = $AcademicYearID"))['AcademicYear'] ?? '';
                                    $MajorNameKH = mysqli_fetch_assoc(mysqli_query($conn, "SELECT MajorNameKH FROM tblMajor WHERE MajorID = $MajorID"))['MajorNameKH'] ?? '';
                                    $BatchNameKH = mysqli_fetch_assoc(mysqli_query($conn, "SELECT BatchNameKH FROM tblBatch WHERE BatchID = $BatchID"))['BatchNameKH'] ?? '';
                                    $CampusNameKH = mysqli_fetch_assoc(mysqli_query($conn, "SELECT CampusNameKH FROM tblCampus WHERE CampusID = $CampusID"))['CampusNameKH'] ?? '';

                                    ?>
                                    <option value="<?php echo $row["ProgramID"]; ?>">
                                        <?php echo $MajorNameKH
                                            . " [" . $DegreeNameKH . "]"
                                            . "-[" . $BatchNameKH . "]"
                                            . "-[" . $ShiftNameKH . "]"
                                            . "-[" . $YearNameKH . "]"
                                            . "-[" . $SemesterNameKH . "]"
                                            . "-[" . $AcademicYear . "] "
                                            . "  [" . $StartDate . " "
                                            . " - " . $EndDate . "]"
                                            ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div> -->
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#FacultyID').on('change', function () {
            var FacultyID = $(this).val();
            if (FacultyID) {
                $('#MajorID').prop('disabled', false);
                $.ajax({
                    type: 'POST',
                    url: 'fetchMajorByFaculty.php',
                    data: { id: FacultyID },
                    success: function (data) {
                        $('#MajorID').html(data).show();
                    }
                });
            } else {
                $('#MajorID').prop('disabled', true).html('<option selected hidden disabled>-----------------------------</option>');
            }
        });
        $('#MajorID').on('change', function () {
            var MajorID = $(this).val();

            if (MajorID) {
                $('#YearID').prop('disabled', false);
            } else {
                $('#YearID').prop('disabled', true).html('<option selected hidden disabled>-----------------------------</option>');
            }
        });
        $('#YearID').on('change', function () {
            var YearID = $(this).val();
            if (YearID) {
                $('#SemesterID').prop('disabled', false);
            } else {
                $('#SemesterID').prop('disabled', true).html('<option selected hidden disabled>-----------------------------</option>');
            }
        });
        $('#SemesterID').on('change', function () {
            var SemesterID = $(this).val();
            if (SemesterID) {
                $('#ShiftID').prop('disabled', false);
            } else {
                $('#ShiftID').prop('disabled', true).html('<option selected hidden disabled>-----------------------------</option>');
            }
        });
        $('#ShiftID').on('change', function () {
            var SemesterID = $(this).val();
            if (SemesterID) {
                $('#ProgramID').prop('disabled', false);
            } else {
                $('#ProgramID').prop('disabled', true).html('<option selected hidden disabled>-----------------------------</option>');
            }
            $.ajax({
                url: 'fetchScheduleBySelect.php',
                type: 'POST',
                data: {
                    FacultyID: $('#FacultyID').val(),
                    MajorID: $('#MajorID').val(),
                    YearID: $('#YearID').val(),
                    SemesterID: $('#SemesterID').val(),
                    ShiftID: $('#ShiftID').val()
                },
                success: function (data) {
                    $('#Data').html(data);
                }
            });
            // $.ajax({
            //     url: 'fetchProgramBySelect.php',
            //     type: 'POST',
            //     data: {
            //         FacultyID: $('#FacultyID').val(),
            //         MajorID: $('#MajorID').val(),
            //         YearID: $('#YearID').val(),
            //         SemesterID: $('#SemesterID').val(),
            //         ShiftID: $('#ShiftID').val()
            //     },
            //     success: function (data) {
            //         $('#ProgramID').html(data).show();
            //     }
            // });
        });

    });

</script>