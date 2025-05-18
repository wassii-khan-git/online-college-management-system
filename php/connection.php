<?php

// create a connection with database 

$server = "localhost";
$name = "root";
$password = "";
$db_name = "cms";

try {
    $con = mysqli_connect($server, $name, $password, $db_name);
    if (!$con) {
        die("Error - Cannot connect to the database!" . mysqli_connect_error());
    }
    //  else {
    //     echo "<h1>Connection Sucessfull!</h1>";
    // }
} catch (Exception $expception) {
    $connect_error_msg = $expception->getMessage();
    print('<h1>Connectio Failed, Due to '.$connect_error_msg.'</h1>');
}





// // close the connection
// $con->close();