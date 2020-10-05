
<?php
session_start();
include('action/sql_config.php');
include('action/login.php');



// Start the session
$uname = $_SESSION["name"];
$password = $_SESSION["password"];

if ($uname == $user_name && $password == $user_password) {

   ?>

<!-- ==================================================== -->

<!-- ==================================================== -->

   <?php
}else {
   header('location: index.php');


}

?>