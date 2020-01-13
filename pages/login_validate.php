<?php
require_once 'connection.php';

if ( isset( $_POST['username'] ) && isset( $_POST['password'] ) ) 
 {

    // extract values from user:
    // $u = mysql_real_escape_string( $_POST['username'] );
    // $p = mysql_real_escape_string( $_POST['password'] );

    $u = $_POST['username'];
    $p = $_POST['password'];

    // make sure username and pass are correct for login
    $query = "SELECT * FROM users WHERE userEmail='$u' AND userPassword='$p'";

    $result = mysqli_query( $con, $query );

    if ( mysqli_num_rows( $result ) == 1 ) 
 {
        session_start();
        $_SESSION['is_logged_in'] = 1;

        $_SESSION['username'] = $u;
        header( 'location: dashboard.php' );
        //also sending a query string containing
        //the username/isloggedin is allowed.
    } else {

        header( 'location: login_fail.php' );
        // redirect him back to index page

    }

}

function mysql_fix_string( $string )
 {
    if ( get_magic_quotes_gpc() ) $string = stripslashes( $string );
    return mysql_real_escape_string( $string );
}

?>

