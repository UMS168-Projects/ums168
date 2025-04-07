<?php

session_start();
unset($_SESSION['Confirm']);
if (isset($_SESSION['Username'])) {
    session_destroy();
    unset($_SESSION['Username']);
    unset($_SESSION['StudentID']);
    header("Location: ./index.php");
} else {
    header("Location: ./index.php");
}
