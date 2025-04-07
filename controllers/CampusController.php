<?php
require_once __DIR__ . '/../connection/db.php';
require_once __DIR__ . '/../config/config.php';
session_start();

if (isset($_POST['btnSave'])) {
    $id = isset($_POST['id']) ? $_POST['id'] : null;
    $CampusController = new CampusController();
    if (!empty($id)) {
        $CampusController->update();
    } else {
        $CampusController->create();
    }
}

if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $CampusController = new CampusController();
    $CampusController->delete($id);
}

if (isset($_GET['status_id']) && isset($_GET['status'])) {
    $id = $_GET['status_id'];
    $status = $_GET['status'];
    $CampusController = new CampusController();
    $CampusController->status($id, $status);
}

class CampusController
{
    public function list()
    {
        global $conn;

        $query = "SELECT * FROM tblcampus";

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
        $TxtCampusNameKH = $_POST['TxtCampusNameKH'];
        $TxtCampusNameEN = $_POST['TxtCampusNameEN'];
        $TxtStatus = $_POST['TxtStatus'];

        $sql = "INSERT INTO tblcampus (CampusNameKH, CampusNameEN, Status) VALUES (?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $TxtCampusNameKH, $TxtCampusNameKH, $TxtStatus);

        if ($stmt->execute()) {
            $_SESSION['snackbar'] = ['message' => 'Action completed successfully!', 'type' => 'success'];
            header('Location: ' . BASE_URL . 'views/admin/campus/index.php');
            exit();
        } else {
            $_SESSION['snackbar'] = ['message' => 'Oops! Something went wrong.', 'type' => 'error'];
            header('Location: ' . BASE_URL . 'views/admin/campus/index.php');
        }
        $stmt->close();
    }

    public function edit($id)
    {
        global $conn;

        $sql = "SELECT * FROM tblcampus WHERE CampusID = ?";
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
        $TxtCampusNameKH = $_POST['TxtCampusNameKH'];
        $TxtCampusNameEN = $_POST['TxtCampusNameEN'];
        $TxtStatus = $_POST['TxtStatus'];
        echo $TxtStatus;
        $sql = "UPDATE tblcampus SET CampusNameKH = '$TxtCampusNameKH', CampusNameEN = '$TxtCampusNameEN', Status = $TxtStatus WHERE CampusID = $id";

        if (mysqli_query($conn, $sql)) {
            $_SESSION['snackbar'] = ['message' => 'Action completed successfully!', 'type' => 'success'];
            header('Location: ' . BASE_URL . 'views/admin/campus/index.php');
            exit();
        } else {
            $_SESSION['snackbar'] = ['message' => 'Oops! Something went wrong.', 'type' => 'error'];
            echo "Error updating record: " . mysqli_error($conn);
        }
    }

    public function delete($id)
    {
        global $conn;

        $sql = "DELETE FROM tblcampus WHERE CampusID = ?";

        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);

        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            mysqli_commit($conn);
            $_SESSION['snackbar'] = ['message' => 'Action completed successfully!', 'type' => 'success'];
        } else {
            $_SESSION['snackbar'] = ['message' => 'Oops! Something went wrong.', 'type' => 'error'];
        }

        header('Location: ' . BASE_URL . 'views/admin/campus/index.php');
        exit();
    }

    public function status($id, $status)
    {
        global $conn;

        $sql = "UPDATE tblcampus SET Status = ? WHERE CampusID = ?";

        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ii", $status, $id);

        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            mysqli_commit($conn);
            $_SESSION['snackbar'] = ['message' => 'Status updated successfully!', 'type' => 'success'];
        } else {
            $_SESSION['snackbar'] = ['message' => 'Oops! Something went wrong.', 'type' => 'error'];
        }

        header('Location: ' . BASE_URL . 'views/admin/campus/index.php');
        exit();
    }
}
