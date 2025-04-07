<?php
require_once __DIR__ . '/../connection/db.php';
require_once __DIR__ . '/../config/config.php';
session_start();

if (isset($_POST['btnSave'])) {
    $id = isset($_POST['id']) ? $_POST['id'] : null;
    $SemesterController = new SemesterController();
    if (!empty($id)) {
        $SemesterController->update();
    } else {
        $SemesterController->create();
    }
}

if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $SemesterController = new SemesterController();
    $SemesterController->delete($id);
}

if (isset($_GET['status_id']) && isset($_GET['status'])) {
    $id = $_GET['status_id'];
    $status = $_GET['status'];
    $SemesterController = new SemesterController();
    $SemesterController->status($id, $status);
}

class SemesterController
{
    public function list()
    {
        global $conn;

        $query = "SELECT * FROM tblsemester";

        $result = mysqli_query($conn, $query);

        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }

        mysqli_free_result($result);

        return $rows;
    }

    public function create()
    {
        global $conn;
        $TxtSemesterNameKH = $_POST['TxtSemesterNameKH'];
        $TxtSemesterNameEN = $_POST['TxtSemesterNameEN'];
        $TxtStatus = $_POST['TxtStatus'];

        $sql = "INSERT INTO tblsemester (SemesterNameKH, SemesterNameEN, Status) VALUES (?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $TxtSemesterNameKH, $TxtSemesterNameKH, $TxtStatus);

        if ($stmt->execute()) {
            $_SESSION['snackbar'] = ['message' => 'Action completed successfully!', 'type' => 'success'];
            header('Location: ' . BASE_URL . 'views/admin/semester/index.php');
            exit();
        } else {
            $_SESSION['snackbar'] = ['message' => 'Oops! Something went wrong.', 'type' => 'error'];
            header('Location: ' . BASE_URL . 'views/admin/semester/index.php');
        }
        $stmt->close();
    }

    public function edit($id)
    {
        global $conn;

        $sql = "SELECT * FROM tblsemester WHERE SemesterID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();
        $rows = $result->fetch_assoc();

        $stmt->close();
        return $rows;
    }

    public function update()
    {
        global $conn;

        $id = $_POST['id'];
        $TxtSemesterNameKH = $_POST['TxtSemesterNameKH'];
        $TxtSemesterNameEN = $_POST['TxtSemesterNameEN'];
        $TxtStatus = $_POST['TxtStatus'];
        echo $TxtStatus;
        $sql = "UPDATE tblsemester SET SemesterNameKH = '$TxtSemesterNameKH', SemesterNameEN = '$TxtSemesterNameEN', Status = $TxtStatus WHERE SemesterID = $id";

        if (mysqli_query($conn, $sql)) {
            $_SESSION['snackbar'] = ['message' => 'Action completed successfully!', 'type' => 'success'];
            header('Location: ' . BASE_URL . 'views/admin/semester/index.php');
            exit();
        } else {
            $_SESSION['snackbar'] = ['message' => 'Oops! Something went wrong.', 'type' => 'error'];
            echo "Error updating record: " . mysqli_error($conn);
        }
    }

    public function delete($id)
    {
        global $conn;

        $sql = "DELETE FROM tblsemester WHERE SemesterID = ?";

        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);

        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            mysqli_commit($conn);
            $_SESSION['snackbar'] = ['message' => 'Action completed successfully!', 'type' => 'success'];
        } else {
            $_SESSION['snackbar'] = ['message' => 'Oops! Something went wrong.', 'type' => 'error'];
        }

        header('Location: ' . BASE_URL . 'views/admin/semester/index.php');
        exit();
    }

    public function status($id, $status)
    {
        global $conn;

        $sql = "UPDATE tblsemester SET Status = ? WHERE SemesterID = ?";

        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ii", $status, $id);

        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            mysqli_commit($conn);
            $_SESSION['snackbar'] = ['message' => 'Status updated successfully!', 'type' => 'success'];
        } else {
            $_SESSION['snackbar'] = ['message' => 'Oops! Something went wrong.', 'type' => 'error'];
        }

        header('Location: ' . BASE_URL . 'views/admin/semester/index.php');
        exit();
    }
}
