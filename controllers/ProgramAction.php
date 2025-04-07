<?php
session_start();
require_once '../config/config.php';
require_once '../connection/db.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Check if the 'id' parameter exists (for editing), if not, we're adding a new record


if (isset($_POST['btnAdd']) || isset($_POST['btnEdit'])) {
    $id = $_POST['ProgramID'];
    $MajorID = $_POST['MajorID'];
    $YearID = $_POST['YearID'];
    $SemesterID = $_POST['SemesterID'];
    $ShiftID = $_POST['ShiftID'];
    $AcademicYearID = $_POST['AcademicYearID'];
    $DegreeID = $_POST['DegreeID']; 
    $BatchID = $_POST['BatchID'];
    $CampusID = $_POST['CampusID'];
    $StartDate = $_POST['StartDate'];
    $EndDate = $_POST['EndDate'];
    $CreatedDate = $_POST['CreatedDate'];
    if ($id) {
        // **Updated SQL for UPDATE operation**
        $sql = "UPDATE tblprogram 
                SET MajorID='$MajorID', YearID='$YearID', SemesterID='$SemesterID', 
                    ShiftID='$ShiftID', AcademicYearID='$AcademicYearID', DegreeID='$DegreeID', 
                    BatchID='$BatchID', CampusID='$CampusID', StartDate='$StartDate', 
                    EndDate='$EndDate', CreatedDate='$CreatedDate'
                WHERE ProgramID='$id'";

        if (mysqli_query($conn, $sql)) {
            $_SESSION['snackbar'] = ['message' => 'Update completed successfully!', 'type' => 'success'];
        } else {
            $_SESSION['snackbar'] = ['message' => 'Error updating record: ' . mysqli_error($conn), 'type' => 'error'];
        }
    } else {  
        // SQL INSERT statement for adding a new person record
        $sql = "INSERT INTO tblprogram 
                (MajorID, YearID, SemesterID, AcademicYearID, DegreeID, BatchID, CampusID, StartDate, 
                EndDate, CreatedDate)
                VALUES ('$MajorID', '$YearID', '$SemesterID', '$AcademicYearID', '$DegreeID', 
                        '$BatchID', '$CampusID', '$StartDate', '$EndDate', '$CreatedDate')";

        if (mysqli_query($conn, $sql)) {
            $_SESSION['snackbar'] = ['message' => 'Action completed successfully! ', 'type' => 'success'];
        } else {
            $_SESSION['snackbar'] = ['message' => 'Oops! Something went wrong.', 'type' => 'error'];
            // echo "Error inserting record: " . mysqli_error($conn);
        }
    }
    header('location:' . BASE_URL . 'views/admin/program/index.php');
    mysqli_close($conn);
}

if (isset($_GET['id'])) {
    // Get and sanitize the ID from the URL
    $ProgramID = $_GET['id'];
    $ProgramID = mysqli_real_escape_string($conn, $ProgramID);

    // Update the Status column to 0 instead of deleting the record
    $sql = "UPDATE Program_Tbl SET Status = 0 WHERE ProgramID = '$ProgramID'";

    // Execute the query and set session messages based on the result
    if (mysqli_query($conn, $sql)) {
        $_SESSION['snackbar'] = ['message' => 'Action completed successfully! ', 'type' => 'success'];
    } else {
        $_SESSION['snackbar'] = ['message' => 'Oops! Something went wrong.', 'type' => 'error'];
    }

    // Redirect back to the index page
    header('Location: indexEmployee.php');
    exit(); 
}
?>
