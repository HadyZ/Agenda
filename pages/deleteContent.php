<?php
require_once 'connection.php';

if ($_GET['deleteMember'] == "assignment") {

    $id = $_GET['memberID'];
    $sql_add_query = "DELETE FROM assignments where assignmentID=$id";

    if (mysqli_query($con, $sql_add_query)) {
        header('location: dashboard.php?member=assignment');
    } else {
        die('Could not delete this assignment');
    }
} else {
    if ($_GET['deleteMember'] == 'parent' || $_GET['deleteMember'] == 'teacher') {
        $id = $_GET['memberID'];

        if ($_GET['deleteMember'] == 'parent') {
            $deleteMember = "parent";
            $sql = "SELECT * from students where studentParent=$id";
        } else {
            $deleteMember = "teacher";
            $sql = "SELECT * from assignments where assignmentInstructor=$id";
        }

        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) > 0) {
            $sql_add_query = "DELETE from  users where userID=";

            if (mysqli_query($con, $sql_add_query)) {
                header('location: dashboard.php?member=' . $deleteMember);
            } else {
                die('Could not delete this member');
            }
        } else {
            header('location: dashboard.php?member=' . $deleteMember);
        }
    } else {


        if ($_GET['deleteMember'] == 'student') {
            $id = $_GET['memberID'];

            $sql_add_query = "DELETE from students where studentID=$id";

            print_r($sql_add_query);

            if (mysqli_query($con, $sql_add_query)) {
                header('location: dashboard.php?member=student');
            } else {
                die('Could not delete this student');
            }
        } else {
            header('location: dashboard.php?member=student');
        }
    }
}