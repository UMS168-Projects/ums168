<?php
require_once '../../config/config.php';
require_once '../../connection/db.php';
if (isset($_POST['id'])) {
    $ProgramID = $_POST['id'];
    $query = "
        SELECT si.StudentID, si.NameInLatin, si.NameInKhmer, sx.SexNameKH, ss.StudentStatusID
        FROM tblstudentinfo si 
        JOIN tblstudentstatus ss ON si.StudentID = ss.StudentID 
        JOIN tblsex sx ON si.SexID = sx.SexID
        WHERE ss.ProgramID = '$ProgramID' AND ss.Status = 1 ORDER BY si.StudentID";

    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($result)) {
        $StudentStatusID = $row['StudentStatusID'];
        echo "<tr>
                <td class='text-center'>
                    <input type='hidden' name='Assigned[{$row['StudentID']}]' value='0'>
                    <input type='checkbox' name='Assigned[{$row['StudentID']}]' value='1' checked>
                </td>
                <td class='text-center'>{$row['StudentID']}</td>
                <td>
                    <a href='indexStudentDetails.php?StudentStatusID={$StudentStatusID}&ProgramID={$ProgramID}' style='text-decoration: none; color: black;' title='View Details'>
                        {$row['NameInKhmer']}
                    </a>
                </td>
                <td>
                    <a href='indexStudentDetails.php?StudentStatusID={$StudentStatusID}&ProgramID={$ProgramID}' style='text-decoration: none; color: black;' title='View Details'>
                        {$row['NameInLatin']}
                    </a>
                </td>
                <td class='text-center'>{$row['SexNameKH']}</td>
                <td class='text-center'>ជាប់</td>
            </tr>";
    }
}
?>
