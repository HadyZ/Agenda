<?php
require_once 'connection.php';


if (isset($_POST['name']) && isset($_POST['userPassword']) && isset($_POST['email'])) 
    {
    
        // extract values from user:    
        $u = $_POST['name'];
        $p = $_POST['userPassword'];
        $e = $_POST['email'];


        // make sure username and pass are correct for login
        // $query = "INSERT INTO users VALUES('$u', '$e' , '$p')";
        // $result = mysqli_query($query);
        $sql_add_query = "INSERT INTO users VALUES(NULL,'$u','$e','$ps')";

if(mysqli_query($con, $sql_add_query) === FALSE) die("Could not add the new user");

        
            header("location: member.php");  //also sending a query string containing 
                                                //the username/isloggedin is allowed.
            
       

    }
?>


