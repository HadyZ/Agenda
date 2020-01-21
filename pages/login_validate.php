<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
</head>

<body>
    <?php
    require_once 'connection.php';

    if (isset($_POST['username']) && isset($_POST['password'])) {

        $u = $_POST['username'];
        $p = $_POST['password'];
        $remember_pass = $_POST['isRememberPass'];
        

        // make sure username and pass are correct for login
        $query = "SELECT * FROM users WHERE userEmail='$u' AND userPassword='$p'";

        $result = mysqli_query($con, $query);

        

        if (mysqli_num_rows($result) == 1) {
            session_start();

            $row = mysqli_fetch_row($result);
            
            $_SESSION['is_logged_in'] = 1;
            $_SESSION['userEmail'] = $u;
            $_SESSION['userPassword'] = $p;
            $_SESSION['userName'] = $row[1];
            $_SESSION['userRole'] = $row[5];
            $_SESSION['isRememberPass'] = $remember_pass;
            $_SESSION['userId'] = $row[0];

            if($row[5] == "parent"){
                header('location: parent.php');
            }
            else{
                header('location: dashboard.php');
            }

           
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
    ?>
</body>

</html>