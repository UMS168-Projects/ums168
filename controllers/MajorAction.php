<?php

require_once '../config/config.php';
require_once '../connection/db.php';
session_start();

if (isset($_POST['btnAdd'])) {
//     print_r($_POST);
// exit();

    $TxtMajorNameKH = $_POST['TxtMajorNameKH'];
    $TxtMajorNameEN = $_POST['TxtMajorNameEN'];
    $TxtFacultyID = $_POST['TxtFacultyID'];
    $TxtStatus = $_POST['TxtStatus'];
    $sql = "INSERT INTO tblmajor (MajorNameKH, MajorNameEN, FacultyID, Status) values ('$TxtMajorNameKH', '$TxtMajorNameEN' , $TxtFacultyID, $TxtStatus)";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['snackbar'] = ['message' => 'Action completed successfully!', 'type' => 'success'];
        header('location:' . BASE_URL . 'views/admin/major/index.php');
    } else {
        // header('location: ./indexMaintenance.php');
    }
    mysqli_close($conn);
} 
// else if (isset($_POST['btnEdit'])) {
//     if (isset($_POST['MajorID']) && !empty($_POST['MajorID'])) {
//         $MajorID = $_POST['MajorID'];
//         $MajorNameKH = $_POST['MajorNameKH'];
//         $MajorNameEN = $_POST['MajorNameEN'];
//         $sql = "UPDATE tblMajor SET MajorNameKH='$MajorNameKH', MajorNameEN='$MajorNameEN' WHERE MajorID=$MajorID";
//         if (mysqli_query($conn, $sql)) {
//             $_SESSION['snackbar'] = ['message' => 'Action completed successfully!', 'type' => 'success'];
//             header('location:' . BASE_URL . 'views/admin/Major/index.php');
//         } else {
//             header('location: ./indexMaintenance.php');
//         }
//         mysqli_close($conn);
//     } else {
//         header('location: ./indexMaintenance.php');
//     }
// }

// if (isset($_GET['id'])) {
//     $MajorID = $_GET['id'];

//     // Step 1: Fetch the current status
//     $sql = "SELECT Status From tblMajor Where MajorID = ?";
//     $stmt = mysqli_prepare($conn, $sql);
//     mysqli_stmt_bind_param($stmt, 'i', $MajorID);
//     mysqli_stmt_execute($stmt);
//     $result = mysqli_stmt_get_result($stmt);
    
//     if ($row = mysqli_fetch_assoc($result)) {
//         $currentStatus = $row['Status'];
        
//         // Step 2: Toggle the status
//         $newStatus = $currentStatus == 1 ? 0 : 1;

//         // Step 3: Update the status in the database
//         $updateSql = "UPDATE tblMajor SET Status = ? WHERE MajorID = ?";
//         $updateStmt = mysqli_prepare($conn, $updateSql);
//         mysqli_stmt_bind_param($updateStmt, 'ii', $newStatus, $MajorID);
//         if (mysqli_stmt_execute($updateStmt)) {
//             $_SESSION['snackbar'] = ['message' => 'Action completed successfully!', 'type' => 'success'];
//             header('location:' . BASE_URL . 'views/admin/Major/index.php');
//         } else {
//             $_SESSION['snackbar'] = ['message' => 'Oops! Something went wrong.', 'type' => 'error'];
//             header('location: ./indexMaintenance.php');
//         }
//     } else {
//         // If no record found
//         $_SESSION['snackbar'] = ['message' => 'No record found with that ID.', 'type' => 'error'];
//         header('location: ./indexMaintenance.php');
//     }

//     // Close statement and connection
//     mysqli_stmt_close($stmt);
//     mysqli_close($conn);
// }
// if (isset($_GET['id'])) {
//     $MajorID = $_GET['id'];
//     $MajorID = mysqli_real_escape_string($conn, $MajorID);
//     $sql = "DELETE FROM tblMajor WHERE MajorID='$MajorID'";
//     if (mysqli_query($conn, $sql)) {
//         $_SESSION['snackbar'] = ['message' => 'Action completed successfully! ', 'type' => 'success'];
//         header('location: ./indexMajor.php');
//     } else {
//         header('location: ./indexMaintenance.php');
//     }
//     mysqli_close($conn);
// }