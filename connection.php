<?php
$db_hostname = 'localhost';
$db_database = 'agenda';
$db_username = 'root';
$db_password =''; // might be = root for mac users 

$con = mysqli_connect($db_hostname,$db_username,$db_password,$db_database);

// Check connection
if(mysqli_connect_error()){
    
    echo "failed to connect: ".mysqli_connect_error();
}


?>