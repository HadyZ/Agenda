<?php
require_once 'connection.php';

if ( isset( $_POST['studentId'] ) && isset( $_POST['fname'] ) && isset( $_POST['lname'] ) && isset( $_POST['pFname'] ) && isset( $_POST['pLname'] ) && isset( $_POST['pPhoneNumber'] ) && isset( $_POST['class'] ) )
 {
    $id = $_POST['studentId'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $pFname = $_POST['pFname'];
    $pLname = $_POST['pLname'];
    $pNumber = $_POST['pPhoneNumber'];
    $class = $_POST['class'];
    $studentParentId = 13456;
    $sql_add_query = "INSERT INTO students (studentId, fname, lname, pPhoneNumber, class, studentParent) VALUES('$id','$fname','$lname','$pNumber','$class','$studentParentId')";

    if ( mysqli_query( $con, $sql_add_query ) === FALSE ) die( 'Could not add the add student' );

}

?>
