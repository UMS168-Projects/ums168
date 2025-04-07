<?php
require_once '../config/config.php';
require_once '../connection/db.php';
session_start();
// if (isset($_POST['btnAdd'])) {
//     $YearNameKH = $_POST['YearNameKH'];
//     $YearNameEN = $_POST['YearNameEN'];
//     $sql = "INSERT INTO tblyear (YearNameKH, YearNameEN) values ('$YearNameKH', '$YearNameEN')";
//     if (mysqli_query($conn, $sql)) {
//         $_SESSION['Message'] = 'Action completed successfully!';
//         header('location: ./indexYear.php');
//     } else {
//         header('location: ./indexMaintenance.php');
//     }
//     mysqli_close($conn);
// } else if (isset($_POST['btnEdit'])) {
//     if (isset($_POST['YearID']) && !empty($_POST['YearID'])) {
//         $YearID = $_POST['YearID'];
//         $YearNameKH = $_POST['YearNameKH'];
//         $YearNameEN = $_POST['YearNameEN'];
//         $sql = "UPDATE tblyear SET YearNameKH='$YearNameKH', YearNameEN='$YearNameEN' WHERE YearID=$YearID";
//         if (mysqli_query($conn, $sql)) {
//             $_SESSION['Message'] = 'Action completed successfully!';
//             header('location: ./indexYear.php');
//         } else {
//             header('location: ./indexMaintenance.php');
//         }
//         mysqli_close($conn);
//     } else {
//         header('location: ./indexMaintenance.php');
//     }
// }
if (isset($_GET['id'])) {
    $YearID = $_GET['id'];

    // Step 1: Fetch the current status
    $sql = "SELECT Status From tblyear Where YearID = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $YearID);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if ($row = mysqli_fetch_assoc($result)) {
        $currentStatus = $row['Status'];
        
        // Step 2: Toggle the status
        $newStatus = $currentStatus == 1 ? 0 : 1;

        // Step 3: Update the status in the database
        $updateSql = "UPDATE tblyear SET Status = ? WHERE YearID = ?";
        $updateStmt = mysqli_prepare($conn, $updateSql);
        mysqli_stmt_bind_param($updateStmt, 'ii', $newStatus, $YearID);
        if (mysqli_stmt_execute($updateStmt)) {
            $_SESSION['snackbar'] = ['message' => 'Action completed successfully!', 'type' => 'success'];
            header('location:' . BASE_URL . 'views/admin/year/index.php');
        } else {
            $_SESSION['snackbar'] = ['message' => 'Oops! Something went wrong.', 'type' => 'error'];
            header('location: ./indexMaintenance.php');
        }
    } else {
        // If no record found
        $_SESSION['snackbar'] = ['message' => 'No record found with that ID.', 'type' => 'error'];
        header('location: ./indexMaintenance.php');
    }

    // Close statement and connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
// if (isset($_GET['id'])) {
//     $YearID = $_GET['id'];
//     $YearID = mysqli_real_escape_string($conn, $YearID);
//     $sql = "DELETE FROM tblyear WHERE YearID='$YearID'";
//     if (mysqli_query($conn, $sql)) {
//         $_SESSION['snackbar'] = ['message' => 'Action completed successfully! ', 'type' => 'success'];
//         header('location: ./indexYear.php');
//     } else {
//         header('location: ./indexMaintenance.php');
//     }
//     mysqli_close($conn);
// }