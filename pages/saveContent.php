<?php
require_once 'connection.php';

if ($_GET['saveMember'] == "assignment") {
    if (isset($_POST['assignmentDate']) && isset($_POST['assignmentDesc']) && isset($_POST['teacherID']) && isset($_POST['class']) && isset($_POST['courseID'])) {

        $date = $_POST['assignmentDate'];
        $desc = $_POST['assignmentDesc'];
        $teacherId = $_POST['teacherID'];
        $courseId = $_POST['courseID'];
        $class = $_POST['class'];

        $sql_add_query = "INSERT INTO assignments (assignmentDate,assignmentInstructor,assignmentDescription, assignmentCourse, assignmentClass) VALUES('$date','$teacherId','$desc','$courseId','$class')";

        if (mysqli_query($con, $sql_add_query)) {
            header('location: dashboard.php?member=assignment');
        } else {
            die('Could not add the new member');
        }
    }
} else {
    if (isset($_POST['ename']) && isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['pass'])) {
        if ($_GET['saveMember'] == 'parent') {
            $saveMember = "parent";
        } else {
            $saveMember = "teacher";
        }
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $ename = $_POST['ename'];
        $pass = $_POST['pass'];

        $sql_add_query = "INSERT INTO users (userFirstName,userLastName,userEmail, userPassword, userRole) VALUES('$fname','$lname','$ename','$pass','$saveMember')";

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
}