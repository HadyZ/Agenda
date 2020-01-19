<?php
require_once 'connection.php';

if (isset($_POST['studentParentID']) && isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['class'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $class = $_POST['class'];
    $studentParentId = $_POST['studentParentID'];

    $sql_add_query = "INSERT INTO students (studentFirstName,studentLastName, studentClass, studentParent) VALUES('$fname','$lname','$class',$studentParentId)";

    if (mysqli_query($con, $sql_add_query)) {
        header('location: dashboard.php?member=student');
    } else {
        die('Could not add the new student');
    }
} else {
    header('location: dashboard.php?member=student');
}