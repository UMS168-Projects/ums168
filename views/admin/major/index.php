<?php
ob_start();
require_once '../../../config/config.php';
require_once '../../../connection/db.php';
$title = "List Major";
?>
<h4 class="fw-bold mb-2 d-flex justify-content-between align-items-center">
    បញ្ជី ជំនាញ
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
                        <th>
                            ID
                        </th>
                        <th>
                            Major Name KH
                        </th>
                        <th>
                            Major Name EN
                        </th>
                        <th>
                            Faculty
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        $rows = mysqli_query($conn, "SELECT MajorID, MajorNameKH, MajorNameEN, FacultyNameKH FROM tblmajor INNER JOIN tblfaculty on tblmajor.FacultyID = tblfaculty.FacultyID");
                        foreach ($rows as $row) {
                            echo "<tr>";
                            echo "<td>" . $row['MajorID'] . "</td>";
                            echo "<td>" . $row['MajorNameKH'] . "</td>";
                            echo "<td>" . $row['MajorNameEN'] . "</td>";
                            echo "<td>" . $row['FacultyNameKH'] . "</td>";
                            ?>
                            <td class="text-center">
                                <a href="editMajor.php?id=<?php echo $row['MajorID']; ?>">
                                    <i class="bx bxs-edit"></i>
                                </a>
                                &nbsp;
                                <a href="actionMajor.php?DeleteID=<?php echo $row['MajorID']; ?>" name="btnDelete"
                                    style="color:red;">
                                    <i class="bx bxs-trash"></i>
                                </a>
                            </td>
                            <?php
                            echo "</tr>";
                        }
                        ?>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>
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
<?php
    $content = ob_get_clean();
    include BASE_PATH . 'views/admin/master.php';
?>
