<?php
require_once __DIR__ . '/../connection/db.php';
require_once __DIR__ . '/../config/config.php';
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

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

if (isset($_GET['status_id']) && isset($_GET['status'])) {
    $id = $_GET['status_id'];
    $status = $_GET['status'];
    $EducationController = new EducationController();
    $EducationController->status($id, $status);
}if (isset($_POST['btnSave'])) {
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
    $StudentInfoController = new StudentInfoController();
    $StudentInfoController->delete($id);
}

if (isset($_GET['status_id']) && isset($_GET['status'])) {
    $id = $_GET['status_id'];
    $status = $_GET['status'];
    $StudentInfoController = new StudentInfoController();
    $StudentInfoController->status($id, $status);
}

class EducationController
{
    public function list()
    {
        global $conn;
        // $query = "SELECT * FROM tbleducationalbackground;";

        $query = "SELECT eb.EducationalBackgroundID, eb.SchoolTypeID, eb.SchoolName, eb.AcademicYearID, eb.ProvinceID, eb.StudentID, 
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
    
        // Get data from POST request
        $TxtStudentID = $_POST['TxtStudentID'];
        $TxtProvinceID = $_POST['TxtProvinceID'];
        $TxtSchoolTypeID = $_POST['TxtSchoolTypeID'];
        $TxtSchoolName = $_POST['TxtSchoolName'];
        $TxtAcademicYearID = $_POST['TxtAcademicYearID'];
        $TxtStatus = 1; // Default status
    
        // Create the SQL insert query
        $sql = "INSERT INTO tbleducationalbackground 
                (SchoolTypeID, SchoolName, AcademicYearID, ProvinceID, StudentID, Status) 
                VALUES 
                ('$TxtSchoolTypeID', '$TxtSchoolName', '$TxtAcademicYearID', '$TxtProvinceID', '$TxtStudentID', '$TxtStatus')";
    
        // Execute the query
        if (mysqli_query($conn, $sql)) {
            $_SESSION['snackbar'] = ['message' => 'Action completed successfully!', 'type' => 'success'];
            header('Location: ' . BASE_URL . 'views/admin/education/index.php');
            exit();
        } else {
            $_SESSION['snackbar'] = ['message' => 'Oops! Something went wrong.', 'type' => 'error'];
            header('Location: ' . BASE_URL . 'views/admin/education/index.php');
        }
    }
    

    // public function create()
    // {
    //     global $conn;
    //     $TxtProgramID = $_POST['TxtProgramID'];
    //     $TxtNameInLatin = $_POST['TxtNameInLatin'];
    //     $TxtNameInKhmer = $_POST['TxtNameInKhmer'];
    //     $TxtFamilyName = $_POST['TxtFamilyName'];
    //     $TxtGivenName = $_POST['TxtGivenName'];
    //     $TxtSexID = $_POST['TxtSexID'];
    //     $TxtIDPassportNo = $_POST['IDPassportNo'];
    //     $TxtNationalityID = $_POST['TxtNationalityID'];
    //     $TxtCountryID = $_POST['TxtCountryID'];
    //     $TxtDOB = $_POST['TxtDOB'];
    //     $TxtPOB = $_POST['TxtPOB'];
    //     $TxtPhoneNumber = $_POST['TxtPhoneNumber'];
    //     $TxtEmail = $_POST['TxtEmail'];
    //     $TxtCurrentAddress = $_POST['CurrentAddress'];
    //     $TxtCurrentAddressPP = $_POST['TxtCurrentAddressPP'];
    //     $TxtPhoto = $_POST['TxtPhoto'];
    //     $TxtRegisterDate = $_POST['TxtRegisterDate'];
    //     $TxtStudentPassword = $_POST['TxtStudentPassword'];
    //     $TxtStatus = $_POST['TxtStatus'];

    //     if (move_uploaded_file($_FILES["Photo"]["tmp_name"], "../public/uploads/students/" . $_FILES["Photo"]["name"])) {
    //         $Photo = mysqli_real_escape_string($conn, $_FILES["Photo"]["name"]);
    //         $sql = "INSERT INTO tblstudentinfo 
    //         (NameInKhmer, NameInLatin, FamilyName, GivenName, SexID, IDPassportNo, NationalityID, CountryID, DOB, POB, PhoneNumber, Email, CurrentAddress, CurrentAddressPP, RegisterDate,Photo)
    //         VALUES 
    //         ('$NameInKhmer', '$NameInLatin', '$FamilyName', '$GivenName', '$SexID', '$IDPassportNo', '$NationalityID', '$CountryID', '$DOB', '$POB', '$PhoneNumber', '$Email', '$CurrentAddress', '$CurrentAddressPP', '$RegisterDate','$Photo')";
    //         if (mysqli_query($conn, $sql)) {
    //             $StudentID = mysqli_insert_id($conn);
    //             //header('location: ./indexStudentInfo.php');
    //             if (isset($_POST['ProgramID']) && !empty($_POST['ProgramID'])) {
    //                 $ProgramID = $_POST['ProgramID'];
    //                 $AssignDate = $_POST['RegisterDate'];
    //                 $Note = mysqli_real_escape_string($conn, $_POST['Note']);
    //                 $insert_status = "INSERT INTO tblstudentstatus (StudentID, ProgramID, Assigned, AssignDate, Note, Status) 
    //                 VALUES ('$StudentID', '$ProgramID', 1, '$AssignDate', '$Note', 1)";
    //                 if (mysqli_query($conn, $insert_status)) {
    //                     header('location: ./indexStudentInfo.php');
    //                 } else {
    //                     //echo "Error: " . $insert_status . ":-" . mysqli_error($conn);
    //                     header('location: ./indexMaintenance.php');
    //                 }
    //                 mysqli_close($conn);
    //             } else {
    //                 header('location: ./indexMaintenance.php');
    //             }
    //         } else {
    //             echo "Error: " . $sql . ":-" . mysqli_error($conn);
    //         }
    //     } else {
            
    //         echo "Error uploading file.";
    //     }
    // }

    public function edit($id)
    {
        global $conn;

        $sql = "SELECT * FROM tblstudentinfo WHERE StudentInfoID = ?";
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
        $TxtStudentInfoNameKH = $_POST['TxtStudentInfoNameKH'];
        $TxtStudentInfoNameEN = $_POST['TxtStudentInfoNameEN'];
        $TxtStatus = $_POST['TxtStatus'];
        echo $TxtStatus;
        $sql = "UPDATE tblstudentinfo SET StudentInfoNameKH = '$TxtStudentInfoNameKH', StudentInfoNameEN = '$TxtStudentInfoNameEN', Status = $TxtStatus WHERE StudentInfoID = $id";

        if (mysqli_query($conn, $sql)) {
            $_SESSION['snackbar'] = ['message' => 'Action completed successfully!', 'type' => 'success'];
            header('Location: ' . BASE_URL . 'views/admin/StudentInfo/index.php');
            exit();
        } else {
            $_SESSION['snackbar'] = ['message' => 'Oops! Something went wrong.', 'type' => 'error'];
            echo "Error updating record: " . mysqli_error($conn);
        }
    }

    public function delete($id)
    {
        global $conn;

        // Fetch the photo filename before deleting the record
        $sql = "SELECT Photo FROM tblstudentinfo WHERE StudentID = '$id'";
        $result = mysqli_query($conn, $sql);
        
        if ($row = mysqli_fetch_assoc($result)) {
            $photo = $row['Photo'];
            
            // Delete the photo file if it exists
            $photoPath = BASE_PATH . "storage/students/" . $photo;
            if (file_exists($photoPath) && !empty($photo)) {
                unlink($photoPath);
            }
        }

        // Delete the student record
        $sql = "DELETE FROM tblstudentinfo WHERE StudentID = '$id'";
        if (mysqli_query($conn, $sql)) {
            $_SESSION['snackbar'] = ['message' => 'Action completed successfully!', 'type' => 'success'];
        } else {
            $_SESSION['snackbar'] = ['message' => 'Oops! Something went wrong.', 'type' => 'error'];
        }

        // Redirect back to the student info page
        header('Location: ' . BASE_URL . 'views/admin/student_info/index.php');
        exit();
    }


    public function status($id, $status)
    {
        global $conn;

        $sql = "UPDATE tblstudentinfo SET Status = '$status' WHERE StudentID = '$id'";

        if (mysqli_query($conn, $sql)) {
            $_SESSION['snackbar'] = ['message' => 'Status updated successfully!', 'type' => 'success'];
        } else {
            $_SESSION['snackbar'] = ['message' => 'Oops! Something went wrong.', 'type' => 'error'];
        }

        header('Location: ' . BASE_URL . 'views/admin/student_info/index.php');
        exit();
    }

}
