<?php
require_once 'connection.php';

if (isset($_POST['username']) && isset($_POST['password'])) {

    // extract values from user:
    // $u = mysql_real_escape_string( $_POST['username'] );
    // $p = mysql_real_escape_string( $_POST['password'] );

    $u = $_POST['username'];
    $p = $_POST['password'];

    // make sure username and pass are correct for login
    $query = "SELECT * FROM users WHERE userEmail='$u' AND userPassword='$p'";

    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 1) {
        session_start();
        $_SESSION['is_logged_in'] = 1;

        $_SESSION['username'] = $u;
        $row = mysqli_fetch_row($result);

        $_SESSION['userRole'] = $row[4];
        header('location: dashboard.php');
    } else {

        header('location: login.php');
        // redirect him back to index page

    }
}

// function mysql_fix_string( $string )
//  {
//     if ( get_magic_quotes_gpc() ) $string = stripslashes( $string );
//     return mysql_real_escape_string( $string );
// }