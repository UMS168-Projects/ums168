<?php
require_once '../config/config.php';
require_once '../connection/db.php';
session_start();
if (isset($_POST['btnAdd'])) {
    $BatchNameKH = $_POST['BatchNameKH'];
    $BatchNameEN = $_POST['BatchNameEN'];
    $sql = "INSERT INTO tblBatch (BatchNameKH, BatchNameEN) values ('$BatchNameKH', '$BatchNameEN')";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['Message'] = 'Action completed successfully!';
        header('location: ./indexBatch.php');
    } else {
        header('location: ./indexMaintenance.php');
    }
    mysqli_close($conn);
} else if (isset($_POST['btnEdit'])) {
    if (isset($_POST['BatchID']) && !empty($_POST['BatchID'])) {
        $BatchID = $_POST['BatchID'];
        $BatchNameKH = $_POST['BatchNameKH'];
        $BatchNameEN = $_POST['BatchNameEN'];
        $sql = "UPDATE tblBatch SET BatchNameKH='$BatchNameKH', BatchNameEN='$BatchNameEN' WHERE BatchID=$BatchID";
        if (mysqli_query($conn, $sql)) {
            $_SESSION['Message'] = 'Action completed successfully!';
            header('location: ./indexBatch.php');
        } else {
            header('location: ./indexMaintenance.php');
        }
        mysqli_close($conn);
    } else {
        header('location: ./indexMaintenance.php');
    }
}
if (isset($_GET['id'])) {
    $BatchID = $_GET['id'];

    // Step 1: Fetch the current status
    $sql = "SELECT Status From tblBatch Where BatchID = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $BatchID);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if ($row = mysqli_fetch_assoc($result)) {
        $currentStatus = $row['Status'];
        
        // Step 2: Toggle the status
        $newStatus = $currentStatus == 1 ? 0 : 1;

        // Step 3: Update the status in the database
        $updateSql = "UPDATE tblBatch SET Status = ? WHERE BatchID = ?";
        $updateStmt = mysqli_prepare($conn, $updateSql);
        mysqli_stmt_bind_param($updateStmt, 'ii', $newStatus, $BatchID);
        if (mysqli_stmt_execute($updateStmt)) {
            $_SESSION['snackbar'] = ['message' => 'Action completed successfully!', 'type' => 'success'];
            header('location:' . BASE_URL . 'views/admin/Batch/index.php');
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
//     $BatchID = $_GET['id'];
//     $BatchID = mysqli_real_escape_string($conn, $BatchID);
//     $sql = "DELETE FROM tblBatch WHERE BatchID='$BatchID'";
//     if (mysqli_query($conn, $sql)) {
//         $_SESSION['snackbar'] = ['message' => 'Action completed successfully! ', 'type' => 'success'];
//         header('location: ./indexBatch.php');
//     } else {
//         header('location: ./indexMaintenance.php');
//     }
//     mysqli_close($conn);
// }