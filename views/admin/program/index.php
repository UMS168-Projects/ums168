<?php
ob_start();
require_once '../../../config/config.php';
require_once '../../../connection/db.php';
$title = "List Program";

// Determine the current page number
if (!isset($_GET['page'])) { 
    $page_number = 1;      
} else {
    $page_number = (int)$_GET['page'];      
} 

$limit = 10;
$initial_page = ($page_number - 1) * $limit;

$total_records_query = "SELECT COUNT(*) AS total FROM tblprogram WHERE Status = 1";
$total_records_result = mysqli_query($conn, $total_records_query);
$total_records_row = mysqli_fetch_assoc($total_records_result);
$total_records = $total_records_row['total'];

$total_pages = ceil($total_records / $limit);

$select_row = "SELECT * FROM tblprogram LIMIT $initial_page, $limit";
$result_row = mysqli_query($conn, $select_row);
?>
<h4 class="fw-bold mb-2 d-flex justify-content-between align-items-center">
    បញ្ជី កម្មវិធីសិក្សា
    <a href="create.php" style="font-size:25px;" class="text-primary">
        <i class="bi bi-plus-square-fill "></i>
    </a>
</h4>
<div class="card">
    <div class="card-body">
        <div class="table-responsive text-nowrap">
            <table class="table table-bordered table-sm">
                <thead class="table-secondary text-center">
                    <tr>
                        <th style="font-size: 14;">ID</th>
                        <th style="font-size: 14px;">ឆ្នាំ / ឆមាស / វេន / កម្រិត / ឆ្នាំសិក្សា / ជំនាញ / ជំនាន់ / សាខា /
                            ចាប់ផ្តើម / បញ្ចប់ /
                            បង្កើត</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        $No = $initial_page + 1;
                        while ($row = mysqli_fetch_assoc($result_row)) {
                            $YearID = $row['YearID'];
                            $SemesterID = $row['SemesterID'];
                            $ShiftID = $row['ShiftID'];
                            $DegreeID = $row['DegreeID'];
                            $AcademicYearID = $row['AcademicYearID'];
                            $MajorID = $row['MajorID'];
                            $BatchID = $row['BatchID'];
                            $CampusID = $row['CampusID'];
                            echo "<tr>";
                            echo "<td>" . $row['ProgramID'] . "</td>";
                            //echo "<td>" . $row['ProgramID'] . "</td>";
                            $select_year = "SELECT * FROM tblyear WHERE YearID = $YearID";
                            $result = mysqli_query($conn, $select_year);
                            while ($RowCon = mysqli_fetch_assoc($result)) {
                                echo "<td>" . $RowCon['YearNameKH'] . "";
                            }
                            ;
                            $select_Sem = "SELECT * FROM tblsemester WHERE SemesterID = $SemesterID";
                            $result = mysqli_query($conn, $select_Sem);
                            while ($RowCon = mysqli_fetch_assoc($result)) {
                                echo "/ " . $RowCon['SemesterNameKH'];
                            }
                            ;
                            $select_Sh = "SELECT * FROM tblshift WHERE ShiftID = $ShiftID";
                            $result = mysqli_query($conn, $select_Sh);
                            while ($RowCon = mysqli_fetch_assoc($result)) {
                                echo "/ " . $RowCon['ShiftNameKH'];
                            }
                            ;
                            $select_Dg = "SELECT * FROM tbldegree WHERE DegreeID = $DegreeID";
                            $result = mysqli_query($conn, $select_Dg);
                            while ($RowCon = mysqli_fetch_assoc($result)) {
                                echo "/ " . $RowCon['DegreeNameKH'];
                            }
                            ;
                            $select_ay = "SELECT * FROM tblacademicyear WHERE AcademicYearID = $AcademicYearID";
                            $resultAY = mysqli_query($conn, $select_ay);
                            while ($RowAY = mysqli_fetch_assoc($resultAY)) {
                                echo "/ " . $RowAY['AcademicYear'];
                            }
                            ;
                            $select_Mj = "SELECT * FROM tblmajor WHERE MajorID = $MajorID";
                            $result = mysqli_query($conn, $select_Mj);
                            while ($RowCon = mysqli_fetch_assoc($result)) {
                                echo "/ " . $RowCon['MajorNameKH'];
                            }
                            ;
                            $select_Ba = "SELECT * FROM tblbatch WHERE BatchID = $BatchID";
                            $result = mysqli_query($conn, $select_Ba);
                            while ($RowCon = mysqli_fetch_assoc($result)) {
                                echo "/ " . $RowCon['BatchNameKH'];
                            }
                            ;
                            $select_Cp = "SELECT * FROM tblcampus WHERE CampusID = $CampusID";
                            $result = mysqli_query($conn, $select_Cp);
                            while ($RowCon = mysqli_fetch_assoc($result)) {
                                echo "/ " . $RowCon['CampusNameKH'];
                            }
                            ;
                            echo "/ " . $row['StartDate'] . "/ " . $row['EndDate'] . "/ " . $row['CreatedDate'] . "</td>";
                            ?>
                            <td>
                                <a href="edit.php?id=<?php echo $row['ProgramID']; ?>">
                                    <i class="bx bxs-edit"></i>
                                </a>
                                &nbsp;&nbsp;
                                <a href="javascript:void(0);" class="btnDelete" data-id="<?php echo $row['ProgramID']; ?>"
                                    style="color:red;" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                    <i class="bx bxs-trash"></i>
                                </a>
                            </td>
                            <?php
                            echo "</tr>";
                            $No++;
                        }
                        ?>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Pagination -->
        <nav aria-label="Page navigation example" class="mt-2">
            <ul class="pagination pagination-sm justify-content-left">
                <!-- Previous Button -->
                <li class="page-item <?php if ($page_number <= 1) echo 'disabled'; ?>">
                    <a class="page-link" href="<?php if ($page_number > 1) echo "index.php?page=" . ($page_number - 1); else echo '#'; ?>">Previous</a>
                </li>
                <!-- Pagination Numbers -->
                <?php
                for ($page = 1; $page <= $total_pages; $page++) {
                    $active_class = ($page_number == $page) ? 'active' : '';
                    echo '<li class="page-item ' . $active_class . '"><a class="page-link" href="index.php?page=' . $page . '">' . $page . '</a></li>';
                }
                ?>
                <!-- Next Button -->
                <li class="page-item <?php if ($page_number >= $total_pages) echo 'disabled'; ?>">
                    <a class="page-link" href="<?php if ($page_number < $total_pages) echo "index.php?page=" . ($page_number + 1); else echo '#'; ?>">Next</a>
                </li>
            </ul>
        </nav>
        <!-- End pagination -->
    </div>
</div>
<!-- Script delete data -->
<script>
    $(document).ready(function () {
        $('.btnDelete').on('click', function () {
            var deleteId = $(this).data('id');
            var deleteUrl = 'actionProgram.php?id=' + deleteId;
            $('#confirmDelete').attr('href', deleteUrl);
        });
    });
</script>
<?php
    $content = ob_get_clean();
    include BASE_PATH . 'views/admin/master.php';
?>
