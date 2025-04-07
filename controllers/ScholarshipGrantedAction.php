<?php
require_once '../config/config.php';
require_once '../connection/db.php';
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['btnAdd']) || isset($_POST['btnEdit'])) {
// Get Data
    $StudentID     = $_POST['StudentID'];
    $ScholarshipID = $_POST['ScholarshipID'];
    $scholarship_grantedID        = $_POST['scholarship_grantedID'];
    $GrantedDate   = $_POST['GrantedDate'];
    $Amount        = $_POST['Amount'];
    $IsContinue    = $_POST['IsContinue'];
    $RequestedBy   = mysqli_real_escape_string($conn, $_POST['RequestedBy']);
// Check for an ID
    $SchGrantedID = isset($_POST['SchGrantedID']) ? $_POST['SchGrantedID'] : null;

// Determine if this is an insert or an update
    if ($SchGrantedID) {
// Perform an update
        $sql = "UPDATE ScholarGranted_Tbl
SET
StudentID = $StudentID,
ScholarshipID = $ScholarshipID,
scholarship_grantedID = $scholarship_grantedID,
GrantedDate = '$GrantedDate',
Amount = $Amount,
IsContinue = $IsContinue,
RequestedBy = '$RequestedBy'
WHERE
SchGrantedID = $SchGrantedID";
    } else {
// Perform an insert
        $sql = "INSERT INTO ScholarGranted_Tbl
(StudentID, ScholarshipID, scholarship_grantedID, GrantedDate, Amount, IsContinue, RequestedBy)
VALUES
($StudentID, $ScholarshipID, $scholarship_grantedID, '$GrantedDate', $Amount, $IsContinue, '$RequestedBy')";
    }

// Execute the query && Alert status
    if (mysqli_query($conn, $sql)) {
        $_SESSION['snackbar'] = ['message' => 'Action completed successfully!', 'type' => 'success'];
    } else {
        $_SESSION['snackbar'] = ['message' => 'Oops! Something went wrong.', 'type' => 'error'];
    }

// Redirect and close connection
                header('location:' . BASE_URL . 'views/admin/scholarship_granted/index.php');

    mysqli_close($conn);
}
if (isset($_GET['id'])) {
    $SchGrantedID = $_GET['id'];
// Perform sanitation to prevent SQL injection
    $SchGrantedID = mysqli_real_escape_string($conn, $SchGrantedID);

    $sql = "DELETE FROM ScholarGranted_Tbl WHERE SchGrantedID='$SchGrantedID'";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['snackbar'] = ['message' => 'Action completed successfully! ', 'type' => 'success'];
                    header('location:' . BASE_URL . 'views/admin/scholarship_granted/index.php');

    } else {
        $_SESSION['snackbar'] = ['message' => 'Oops! Something went wrong.', 'type' => 'error'];
                    header('location:' . BASE_URL . 'views/admin/scholarship_granted/index.php');

    }
    mysqli_close($conn);
}
