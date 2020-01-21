<?php
require_once 'connection.php';

if (isset($_GET['updateMember']) && $_GET['updateMember'] == "assignment") {

    if (isset($_POST['assignmentDate']) && isset($_POST['assignmentDesc']) && isset($_POST['teacherID']) && isset($_POST['class']) && isset($_POST['courseID'])) {

        $assignmentId = $_GET['memberID'];
        $date = $_POST['assignmentDate'];
        $desc = $_POST['assignmentDesc'];
        $teacherId = $_POST['teacherID'];
        $courseId = $_POST['courseID'];
        $class = $_POST['class'];

        $sql_add_query = "UPDATE assignments set assignmentDate ='$date',assignmentInstructor = $teacherId,assignmentDescription ='$desc', assignmentCourse = $courseId, assignmentClass=$class where assignmentID=$assignmentId";

        if (mysqli_query($con, $sql_add_query)) {
            header('location: dashboard.php?member=assignment');
        } else {
            die('Could not delete this assignment');
        }
    }
} else {
    if (isset($_POST['ename']) && isset($_POST['id']) && isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['pass'])) {
        if ($_GET['updateMember'] == 'parent') {
            $editMember = "parent";
        } else {
            $editMember = "teacher";
        }
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $ename = $_POST['ename'];
        $pass = $_POST['pass'];
        $id = $_POST['id'];

        $sql_add_query = "UPDATE users set userFirstName = '$fname', userLastName = '$lname',userEmail='$ename', userPassword='$pass' where userID = $id";
        print_r($sql_add_query);

        if (mysqli_query($con, $sql_add_query)) {
            header('location: dashboard.php?member=' . $editMember);
        } else {
            die('Could not update this member');
        }
    } else {


        if (isset($_POST['studentParentID']) && isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['class'])) {
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $class = $_POST['class'];
            $studentParentId = $_POST['studentParentID'];
            $id = $_GET['memberID'];

            $sql_add_query = "UPDATE students set studentFirstName = '$fname',studentLastName='$lname', studentClass=$class, studentParent=$studentParentId where studentID=$id";

            if (mysqli_query($con, $sql_add_query)) {
                header('location: dashboard.php?member=student');
            } else {
                die('Could not update this student');
            }
        } else {
            header('location: dashboard.php?member=student');
        }
    }
}