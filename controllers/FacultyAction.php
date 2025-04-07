<?php
require_once '../config/config.php';
require_once '../connection/db.php';
session_start();
if (isset($_POST['btnAdd'])) {
    $FacultyNameKH = $_POST['FacultyNameKH'];
    $FacultyNameEN = $_POST['FacultyNameEN'];
    $sql = "INSERT INTO tblfaculty (FacultyNameKH, FacultyNameEN) values ('$FacultyNameKH', '$FacultyNameEN')";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['snackbar'] = ['message' => 'Action completed successfully!', 'type' => 'success'];
        header('location:' . BASE_URL . 'views/admin/faculty/index.php');
    } else {
        header('location: ./indexMaintenance.php');
    }
    mysqli_close($conn);
} else if (isset($_POST['btnEdit'])) {
    if (isset($_POST['FacultyID']) && !empty($_POST['FacultyID'])) {
        $FacultyID = $_POST['FacultyID'];
        $FacultyNameKH = $_POST['FacultyNameKH'];
        $FacultyNameEN = $_POST['FacultyNameEN'];
        $sql = "UPDATE tblfaculty SET FacultyNameKH='$FacultyNameKH', FacultyNameEN='$FacultyNameEN' WHERE FacultyID=$FacultyID";
        if (mysqli_query($conn, $sql)) {
            $_SESSION['snackbar'] = ['message' => 'Action completed successfully!', 'type' => 'success'];
            header('location:' . BASE_URL . 'views/admin/faculty/index.php');
        } else {
            header('location: ./indexMaintenance.php');
        }
        mysqli_close($conn);
    } else {
        header('location: ./indexMaintenance.php');
    }
}
if (isset($_GET['id'])) {
    $FacultyID = $_GET['id'];

    // Step 1: Fetch the current status
    $sql = "SELECT Status From tblfaculty Where FacultyID = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $FacultyID);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if ($row = mysqli_fetch_assoc($result)) {
        $currentStatus = $row['Status'];
        
        // Step 2: Toggle the status
        $newStatus = $currentStatus == 1 ? 0 : 1;

        // Step 3: Update the status in the database
        $updateSql = "UPDATE tblfaculty SET Status = ? WHERE FacultyID = ?";
        $updateStmt = mysqli_prepare($conn, $updateSql);
        mysqli_stmt_bind_param($updateStmt, 'ii', $newStatus, $FacultyID);
        if (mysqli_stmt_execute($updateStmt)) {
            $_SESSION['snackbar'] = ['message' => 'Action completed successfully!', 'type' => 'success'];
            header('location:' . BASE_URL . 'views/admin/faculty/index.php');
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
//     $FacultyID = $_GET['id'];
//     $FacultyID = mysqli_real_escape_string($conn, $FacultyID);
//     $sql = "DELETE FROM tblFaculty WHERE FacultyID='$FacultyID'";
//     if (mysqli_query($conn, $sql)) {
//         $_SESSION['snackbar'] = ['message' => 'Action completed successfully! ', 'type' => 'success'];
//         header('location: ./indexFaculty.php');
//     } else {
//         header('location: ./indexMaintenance.php');
//     }
//     mysqli_close($conn);
// }