<?php
session_start();
include('action/sql_config.php');


if (isset($_SESSION["name"])) {
    $uname = $_SESSION["name"];
    $password = $_SESSION["password"];
    
}else {
    echo "not working";
       
    header('location: index.php');
}

// Start the session

if (isset($name)) {

   ?>

<!-- ==================================================== -->

<!-- ==================================================== -->

   <?php
}else {
    
    header('location: index.php');

}

?>