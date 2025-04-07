<?php
require_once '../../config/config.php';
require_once '../../connection/db.php';

if (isset($_POST['id'])) {
    $ProgramID = $_POST['id'];

    // Fetch students who are assigned to the selected program
    $query = "
        SELECT si.StudentID, si.NameInLatin, si.NameInKhmer, sx.SexNameKH, ss.StudentStatusID
        FROM tblstudentinfo si 
        JOIN tblstudentstatus ss ON si.StudentID = ss.StudentID 
        JOIN tblsex sx ON si.SexID = sx.SexID
        WHERE ss.ProgramID = '$ProgramID' AND ss.Status = 1 ORDER BY si.StudentID";
    
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>
                <td>
                <input type='hidden' name='Assigned[{$row['StudentID']}]' value='0'>
                <input type='checkbox' name='Assigned[{$row['StudentID']}]' value='1' checked>
                </td>
                <td>{$row['StudentID']}</td>
                <td>{$row['NameInLatin']}</td>
                <td>{$row['NameInKhmer']}</td>
                <td>{$row['SexNameKH']}</td>
                <td>ជាប់</td>
              </tr>";
    }
}
?>

