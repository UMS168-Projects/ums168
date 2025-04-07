<?php
require_once '../config/config.php';
require_once '../connection/db.php';
session_start();

if (isset($_POST['btnAdd'])) {
    $Scholarship = $_POST['Scholarship'];
    $Description = $_POST['Description'];
    $sql = "INSERT INTO Scholarship_Tbl (Scholarship, Description) values ('$Scholarship', '$Description')";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['snackbar'] = ['message' => 'Action completed successfully! ', 'type' => 'success'];
        header('location:' . BASE_URL . 'views/admin/scholarship/index.php');
    } else {
        $_SESSION['snackbar'] = ['message' => 'Oops! Something went wrong.', 'type' => 'error'];
        header('location:' . BASE_URL . 'views/admin/scholarship/index.php');
    }
    mysqli_close($conn);
} else if (isset($_POST['btnEdit'])) {
    if (isset($_POST['ScholarshipID']) && !empty($_POST['ScholarshipID'])) {
        $ScholarshipID = $_POST['ScholarshipID'];
        $Scholarship = $_POST['Scholarship'];
        $Description = $_POST['Description'];
        $sql = "UPDATE Scholarship_Tbl SET Scholarship='$Scholarship', Description='$Description' WHERE ScholarshipID=$ScholarshipID";
        if (mysqli_query($conn, $sql)) {
            $_SESSION['snackbar'] = ['message' => 'Action completed successfully! ', 'type' => 'success'];;
            header('location:' . BASE_URL . 'views/admin/scholarship/index.php');
        } else {
            $_SESSION['snackbar'] = ['message' => 'Oops! Something went wrong.', 'type' => 'error'];
            header('location:' . BASE_URL . 'views/admin/scholarship/index.php');
        }
        mysqli_close($conn);
    } else {
        $_SESSION['snackbar'] = ['message' => 'Oops! Something went wrong.', 'type' => 'error'];
        header('location:' . BASE_URL . 'views/admin/scholarship/index.php');
    }
}
if (isset($_GET['id'])) {
    $ScholarshipID = $_GET['id'];
    $ScholarshipID = mysqli_real_escape_string($conn, $ScholarshipID);
    $sql = "DELETE FROM Scholarship_Tbl WHERE ScholarshipID='$ScholarshipID'";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['snackbar'] = ['message' => 'Action completed successfully! ', 'type' => 'success'];
        header('location:' . BASE_URL . 'views/admin/scholarship/index.php');
    } else {
        $_SESSION['snackbar'] = ['message' => 'Oops! Something went wrong.', 'type' => 'error'];
        header('location:' . BASE_URL . 'views/admin/scholarship/index.php');
    }
    mysqli_close($conn);
}
