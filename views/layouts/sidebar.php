<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.php" class="app-brand-link">
            <img width="205px" src="<?php echo BASE_URL; ?>public/assets/img/logo/logo-4.png">
            <!-- <h1 class="demo text-center text-primary menu-text fw-bolder ms-2">UMS 168</h1> -->
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>
    <!-- <div class="menu-inner-shadow"></div> -->

    <ul class="menu-inner py-1">
        <?php if ($_SESSION['UserTypeID'] == 1) { ?>
        <!-- Dashboard -->
        <li class="menu-item active" id="dashboard-menu">
            <a href="<?php echo BASE_URL; ?>index.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">ទំព័រដើម</div>
            </a>
        </li>
        <!-- SchoolFee -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <!-- <i class='menu-icon tf-icons bx bxs-user-account'></i> -->
                <i class="menu-icon tf-icons bx bx-money"></i>
                <div data-i18n="Layouts"><?php echo $lang['schoolfee'] ?></div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="<?php echo BASE_URL; ?>views/admin/school_fee/index.php" class="menu-link">
                        <!-- <a href="indexSchoolFee.php" class="menu-link"> -->
                        <div data-i18n="Without menu"><?php echo $lang['schoolfee'] ?></div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="<?php echo BASE_URL; ?>views/admin/scholarship/index.php" class="menu-link">
                        <div data-i18n="Without menu"><?php echo $lang['scholarship'] ?></div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="<?php echo BASE_URL; ?>views/admin/scholarship_granted/index.php" class="menu-link">
                        <div data-i18n="Without menu"><?php echo $lang['scholar_granted'] ?></div>
                    </a>
                </li>
                <!-- Profile -->
                <li class="menu-item">
                    <a href="indexProfile.php" class="menu-link">
                        <!-- <i class="menu-icon tf-icons bx bx-user"></i> -->
                        <div data-i18n="Basic">None</div>
                    </a>
                </li>
            </ul>
        </li>
        <!-- Student Status -->
        <li class="menu-item">
            <a href="<?php echo BASE_URL; ?>views/admin/student_status/index.php" class="menu-link">
                <i class='menu-icon bx bxs-user-check'></i>
                <div data-i18n="Basic"><?php echo "ស្ថានភាពនិសិត្ស" ?></div>
            </a>
        </li>
        <!-- Faculty -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-graduation"></i>
                <div data-i18n="Layouts"><?php echo $lang['faculty'] ?></div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="<?php echo BASE_URL; ?>views/admin/program/index.php" class="menu-link">
                        <div data-i18n="Without menu"><?php echo $lang['program'] ?></div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="<?php echo BASE_URL; ?>views/admin/subject/index.php" class="menu-link">
                        <div data-i18n="Without navbar"><?php echo $lang['subject'] ?></div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="<?php echo BASE_URL; ?>views/admin/faculty/index.php" class="menu-link">
                        <div data-i18n="Container"><?php echo $lang['faculty'] ?></div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="<?php echo BASE_URL; ?>views/admin/major/index.php" class="menu-link">
                        <div data-i18n="Fluid"><?php echo $lang['major'] ?></div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="<?php echo BASE_URL; ?>views/admin/batch/index.php" class="menu-link">
                        <div data-i18n="Blank"><?php echo $lang['batch'] ?></div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="<?php echo BASE_URL; ?>views/admin/degree/index.php" class="menu-link">
                        <div data-i18n="Blank"><?php echo $lang['degree'] ?></div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="<?php echo BASE_URL; ?>views/admin/year/index.php" class="menu-link">
                        <div data-i18n="Blank"><?php echo $lang['year'] ?></div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="<?php echo BASE_URL; ?>views/admin/semester/index.php" class="menu-link">
                        <div data-i18n="Blank"><?php echo $lang['semester'] ?></div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="<?php echo BASE_URL; ?>views/admin/shift/index.php" class="menu-link">
                        <div data-i18n="Blank"><?php echo $lang['shift'] ?></div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="<?php echo BASE_URL; ?>views/admin/campus/index.php" class="menu-link">
                        <div data-i18n="Blank"><?php echo $lang['campus'] ?></div>
                    </a>
                </li>
                <!-- AcademicYear -->
                <li class="menu-item">
                    <a href="<?php echo BASE_URL; ?>views/admin/academic_year/index.php" class="menu-link">
                        <div data-i18n="Blank"><?php echo $lang['academicyear'] ?></div>
                    </a>
                </li>

            </ul>
        </li>
        <!-- Student Info -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-user-badge"></i>
                <div data-i18n="Layouts"><?php echo $lang['studentinfo'] ?></div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="<?php echo BASE_URL; ?>views/admin/student_info/index.php" class="menu-link">
                        <div data-i18n="Without menu"><?php echo $lang['personal'] ?></div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="<?php echo BASE_URL; ?>views/admin/education/index.php" class="menu-link">
                        <div data-i18n="Without navbar"><?php echo $lang['educational'] ?></div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="<?php echo BASE_URL; ?>views/admin/family/index.php" class="menu-link">
                        <div data-i18n="Container"><?php echo $lang['family'] ?></div>
                    </a>
                </li>
            </ul>
        </li>
        <!-- Subject & Document -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon tf-icons bx bxs-book-alt'></i>
                <div data-i18n="Layouts"><?php echo $lang['subject'] ?></div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="indexSubject.php" class="menu-link">
                        <div data-i18n="Without menu"><?php echo $lang['subject'] ?></div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="indexSubjectType.php" class="menu-link">
                        <div data-i18n="Without menu">ប្រភេទមុខវិជ្ជា</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="indexDocument.php" class="menu-link">
                        <div data-i18n="Without menu"><?php echo $lang['document'] ?></div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="indexDocumentType.php" class="menu-link">
                        <div data-i18n="Without navbar"><?php echo $lang['documenttype'] ?></div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="indexExtensionType.php" class="menu-link">
                        <div data-i18n="Container"><?php echo $lang['documenttype2'] ?></div>
                    </a>
                </li>
            </ul>
        </li>
        <!-- Schedule -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon tf-icons bx bx-table'></i>
                <div data-i18n="Layouts">កាលវិភាគ</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="indexSchedule.php" class="menu-link">
                        <div data-i18n="Without menu">កាលវិភាគ</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="indexLecturer.php" class="menu-link">
                        <div data-i18n="Without menu">សាស្ត្រាចារ្យ</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="indexRoom.php" class="menu-link">
                        <div data-i18n="Without menu">បន្ទប់រៀន</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="indexTime.php" class="menu-link">
                        <div data-i18n="Without menu">ម៉ោងរៀន</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="indexDayWeek.php" class="menu-link">
                        <div data-i18n="Container">ថ្ងៃ & សប្តាហ៏</div>
                    </a>
                </li>
            </ul>
        </li>
        <!-- Student Info -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon tf-icons bx bxs-check-square'></i>
                <box-icon type='solid' name='check-square'></box-icon>
                <div data-i18n="Layouts">វត្តមាននិសិត្ស</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="indexAttendance.php" class="menu-link">
                        <div data-i18n="Container">វត្តមាន</div>
                    </a>
                </li>
                <!-- <li class="menu-item">
            <a href="indexAttendanceAfternoon.php?ShiftID=3" class="menu-link">

              <div data-i18n="Without menu">រសៀល</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="indexAttendanceEvening.php?ShiftID=5" class="menu-link">

              <div data-i18n="Without navbar">ល្ងាច</div>
            </a> -->
        </li>
    </ul>
    </li>
    <!-- Employee -->
    <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class='menu-icon tf-icons bx bxs-user-account'></i>
            <div data-i18n="Layouts">បុគ្គលិក</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item">
                <a href="indexEmployee.php" class="menu-link">
                    <div data-i18n="Without menu">បុគ្គលិក</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="indexUserType.php" class="menu-link">
                    <div data-i18n="Without menu">តួនាទី</div>
                </a>
            </li>
            <!-- Profile -->
            <li class="menu-item">
                <a href="indexProfile.php" class="menu-link">
                    <!-- <i class="menu-icon tf-icons bx bx-user"></i> -->
                    <div data-i18n="Basic">Profile</div>
                </a>
            </li>
        </ul>
    </li>
    <!-- User -->
    <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <!-- <i class='bx bx-user-account'></i> -->
            <i class='menu-icon tf-icons bx bx-user'></i>
            <div data-i18n="Layouts">អ្នកប្រើប្រាស់</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item">
                <a href="indexUser.php" class="menu-link">
                    <div data-i18n="Without menu">អ្នកប្រើប្រាស់</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="indexUserType.php" class="menu-link">
                    <div data-i18n="Without menu">តួនាទី</div>
                </a>
            </li>
            <!-- Profile -->
            <li class="menu-item">
                <a href="indexProfile.php" class="menu-link">
                    <!-- <i class="menu-icon tf-icons bx bx-user"></i> -->
                    <div data-i18n="Basic">Profile</div>
                </a>
            </li>
        </ul>
    </li>
    <!-- Others -->
    <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class='menu-icon bx bx-left-indent'></i>
            <div data-i18n="Layouts">ផ្សេងៗ</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item">
                <a href="indexVillage.php" class="menu-link">
                    <div data-i18n="Without menu">ភូមិ</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="indexCommune.php" class="menu-link">
                    <div data-i18n="Without menu">ឃុំ</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="indexDistrict.php" class="menu-link">
                    <div data-i18n="Basic">ស្រុក</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="indexProvince.php" class="menu-link">
                    <div data-i18n="Basic">ខេត្ត</div>
                </a>
            </li>
        </ul>
    </li>
    <!-- Trash -->
    <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class='menu-icon tf-icons bx bx-trash'></i>
            <div data-i18n="Layouts">ធុងសំរាម</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item">
                <a href="indexUser.php" class="menu-link">
                    <div data-i18n="Without menu">បុគ្គលិក</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="indexSubjectTypeTrash.php" class="menu-link">
                    <div data-i18n="Without menu">ប្រភេទមុខវិជ្ជា</div>
                </a>
            </li>
            <!-- Profile -->
            <li class="menu-item">
                <a href="indexProfile.php" class="menu-link">
                    <!-- <i class="menu-icon tf-icons bx bx-user"></i> -->
                    <div data-i18n="Basic">Profile</div>
                </a>
            </li>
    </li>
    <?php } else if ($_SESSION['UserTypeID'] == 4) { ?>
    <!-- Dashboard -->
    <li class="menu-item active" id="dashboard-menu">
        <a href="index.php" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Analytics">ទំព័រដើម</div>
        </a>
    </li>
    <li class="menu-item" id="dashboard-menu">
        <a href="indexAttendance.php" class="menu-link">
            <i class='menu-icon tf-icons bx bxs-check-square'></i>
            <div data-i18n="Analytics">វត្តមាននិសិត្ស</div>
        </a>
    </li>

    <!-- Student Info -->
    <!-- <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class='menu-icon tf-icons bx bxs-check-square'></i>
          <box-icon type='solid' name='check-square'></box-icon>
          <div data-i18n="Layouts">វត្តមាននិសិត្ស</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="indexAttendanceMorning.php?ShiftID=2" class="menu-link">
              <div data-i18n="Container">ព្រឹក</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="indexAttendanceAfternoon.php?ShiftID=3" class="menu-link">

              <div data-i18n="Without menu">រសៀល</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="indexAttendanceEvening.php?ShiftID=5" class="menu-link">

              <div data-i18n="Without navbar">ល្ងាច</div>
            </a>
          </li>
        </ul>
      </li> -->
    <?php }else{ ?>
    <!-- Dashboard -->
    <li class="menu-item active" id="dashboard-menu">
        <a href="index.php" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Analytics">ទំព័រដើម</div>
        </a>
    </li>
    <!-- SchoolFee -->
    <li class="menu-item">
        <a href="indexSchoolFee.php" class="menu-link">
            <i class="menu-icon tf-icons bx bx-money"></i>
            <div data-i18n="Basic"><?php echo $lang['schoolfee'] ?></div>
        </a>
    </li>
    <li class="menu-item" id="dashboard-menu">
        <a href="indexStudentStatus.php" class="menu-link">
            <i class="menu-icon tf-icons bx bxs-graduation"></i>
            <div data-i18n="Analytics">ការសិក្សា</div>
        </a>
    </li>
    <li class="menu-item" id="dashboard-menu">
        <a href="indexStudentInfo.php" class="menu-link">
            <i class="menu-icon tf-icons bx bxs-user-badge"></i>
            <div data-i18n="Analytics">ព័ត៌មាននិសិត្ស</div>
        </a>
    </li>
    <!-- SchoolFee -->
    <li class="menu-item">
        <a href="indexStudentProfile.php" class="menu-link">
            <i class="menu-icon tf-icons bx bx-user"></i>
            <div data-i18n="Basic">Profile</div>
        </a>
    </li>
    <?php }?>

    </ul>
</aside>