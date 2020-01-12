<?php
require_once 'connection.php';


if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) 
    {
    
        // extract values from user:    
        $u = $_POST['username'];
        $p = $_POST['password'];
        $e = $_POST['email'];


        // make sure username and pass are correct for login
        // $query = "INSERT INTO users VALUES('$u', '$e' , '$p')";
        // $result = mysqli_query($query);
        $sql_add_query = "INSERT INTO USERS VALUES('$u','$e','$ps')";

if(mysqli_query($con, $sql_add_query) === FALSE) die("Could not add the new user");

        
            header("location: member.php");  //also sending a query string containing 
                                                //the username/isloggedin is allowed.
            
       

    }
?>


