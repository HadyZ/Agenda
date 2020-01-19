<?php
require_once 'connection.php';

if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['userPassword']) && isset($_POST['email'])) {

    $uf = $_POST['fname'];
    $ul = $_POST['lname'];
    $p = $_POST['userPassword'];
    $e = $_POST['email'];

    $sql_add_query = "INSERT INTO users (userFirstName,userLastName,userEmail,userPassword,userRole) VALUES('$uf','$ul','$e','$p','admin')";

    if (mysqli_query($con, $sql_add_query)) {
        session_start();

        $_SESSION['is_logged_in'] = 1;
        $_SESSION['userEmail'] = $e;
        $_SESSION['userPassword'] = $p;
        $_SESSION['userName'] = $uf;
        $_SESSION['userRole'] = 'admin';
        $_SESSION['isRememberPass'] = false;
        header('location: dashboard.php');
    } else {
        header('location: login.php');
    }
}