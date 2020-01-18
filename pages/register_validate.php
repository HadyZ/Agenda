<?php
require_once 'connection.php';

if (isset($_POST['name']) && isset($_POST['userPassword']) && isset($_POST['email'])) {

    $u = $_POST['name'];
    $p = $_POST['userPassword'];
    $e = $_POST['email'];

    $sql_add_query = "INSERT INTO users (userName,userEmail,userPassword,userRole) VALUES('$u','$e','$p','admin')";

    if (mysqli_query($con, $sql_add_query)) {
        header('location: dashboard.php');
    } else {
        header('location: login.php');
    }
}