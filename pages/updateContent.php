<?php
require_once 'connection.php';

if (isset($_POST['ename']) && isset($_POST['id']) && isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['pass'])) {
    if ($_GET['saveMember'] == 'parent') {
        $saveMember = "parent";
    } else {
        $saveMember = "teacher";
    }
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $ename = $_POST['ename'];
    $pass = $_POST['pass'];
    $id = $_POST['id'];

    $sql_add_query = "update users set userFirstName = '$fname', userLastName = '$lname',userEmail='$ename', userPassword='$pass' where userID = $id)";

    if (mysqli_query($con, $sql_add_query)) {
        header('location: dashboard.php?member=' . $saveMember);
    } else {
        die('Could not add the new member');
    }
} else {


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
}