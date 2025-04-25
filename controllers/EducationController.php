<?php
require_once __DIR__ . '/../connection/db.php';
require_once __DIR__ . '/../config/config.php';
session_start();

if (isset($_POST['btnSave'])) {
    $id = isset($_POST['id']) ? $_POST['id'] : null;
    $EducationController = new EducationController();
    if (!empty($id)) {
        $EducationController->update();
    } else {
        $EducationController->create();
    }
}

if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $EducationController = new EducationController();
    $EducationController->delete($id);
}

if (isset($_GET['id']) && isset($_GET['status'])) {
    $id = $_GET['id'];
    $status = $_GET['status'];
    $EducationController = new EducationController();
    $EducationController->status($id, $status);
}

class EducationController
{
    public function list()
    {
        global $conn;
        // $query = "SELECT * FROM tbleducationalbackground;";

        $query = "SELECT eb.EducationalBackgroundID, eb.SchoolTypeID, eb.SchoolName, eb.AcademicYearID, eb.ProvinceID, eb.StudentID, eb.Status, 
        st.SchoolTypeNameKH, 
        sd.NameInKhmer,
        pv.ProvinceNameKH,
        ad.AcademicYear
        FROM tbleducationalbackground AS eb
        INNER JOIN tblschooltype AS st ON eb.SchoolTypeID = st.SchoolTypeID
        INNER JOIN tblprovince AS pv ON eb.ProvinceID = pv.ProvinceID
        INNER JOIN tblacademicyear AS ad ON eb.AcademicYearID = ad.AcademicYearID
        INNER JOIN tblstudentinfo AS sd ON eb.StudentID = sd.StudentID;";


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

        $TxtStudentID = mysqli_real_escape_string($conn, $_POST['TxtStudentID']);
        $TxtSchoolName = mysqli_real_escape_string($conn, $_POST['TxtSchoolName']);
        $TxtSchoolTypeID = mysqli_real_escape_string($conn, $_POST['TxtSchoolTypeID']);
        $TxtAcademicYearID = mysqli_real_escape_string($conn, $_POST['TxtAcademicYearID']);
        $TxtProvinceID = mysqli_real_escape_string($conn, $_POST['TxtProvinceID']);
        $TxtStatus = mysqli_real_escape_string($conn, $_POST['TxtStatus']);

        $sql = "INSERT INTO tbleducationalbackground 
                (StudentID, SchoolName, SchoolTypeID, AcademicYearID, ProvinceID, Status) 
                VALUES ('$TxtStudentID', '$TxtSchoolName', '$TxtSchoolTypeID', '$TxtAcademicYearID', '$TxtProvinceID', '$TxtStatus')";

        if (mysqli_query($conn, $sql)) {
            $_SESSION['snackbar'] = ['message' => 'Educational background added successfully.', 'type' => 'success'];
        } else {
            $_SESSION['snackbar'] = ['message' => 'Failed to add educational background.', 'type' => 'error'];
        }

        header('Location: ' . BASE_URL . 'views/admin/educational/index.php');
        exit();
    }
    public function edit($id)
    {
        global $conn;

        $sql = "SELECT * FROM tblbatch WHERE BatchID = ?";
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
        $TxtBatchNameKH = $_POST['TxtBatchNameKH'];
        $TxtBatchNameEN = $_POST['TxtBatchNameEN'];
        $TxtStatus = $_POST['TxtStatus'];
        echo $TxtStatus;
        $sql = "UPDATE tblbatch SET BatchNameKH = '$TxtBatchNameKH', BatchNameEN = '$TxtBatchNameEN', Status = $TxtStatus WHERE BatchID = $id";

        if (mysqli_query($conn, $sql)) {
            $_SESSION['snackbar'] = ['message' => 'Action completed successfully!', 'type' => 'success'];
            header('Location: ' . BASE_URL . 'views/admin/batch/index.php');
            exit();
        } else {
            $_SESSION['snackbar'] = ['message' => 'Oops! Something went wrong.', 'type' => 'error'];
            echo "Error updating record: " . mysqli_error($conn);
        }
    }

    public function delete($id)
    {
        global $conn;

        $sql = "DELETE FROM tbleducationalbackground WHERE EducationalBackgroundID = ?";

        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);

        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            mysqli_commit($conn);
            $_SESSION['snackbar'] = ['message' => 'Action completed successfully!', 'type' => 'success'];
        } else {
            $_SESSION['snackbar'] = ['message' => 'Oops! Something went wrong.', 'type' => 'error'];
        }

        header('Location: ' . BASE_URL . 'views/admin/education/index.php');
        exit();
    }

    public function status($id, $status)
    {
        global $conn;

        $sql = "UPDATE tbleducationalbackground SET Status = ? WHERE EducationalBackgroundID = ?";

        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ii", $status, $id);

        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            mysqli_commit($conn);
            $_SESSION['snackbar'] = ['message' => 'Status updated successfully!', 'type' => 'success'];
        } else {
            $_SESSION['snackbar'] = ['message' => 'Oops! Something went wrong.', 'type' => 'error'];
        }

        header('Location: ' . BASE_URL . 'views/admin/education/index.php');
        exit();
    }
}
