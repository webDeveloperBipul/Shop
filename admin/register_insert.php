
<?php
session_start();
include('action/sql_config.php');




if (isset($_SESSION["name"])) {
    $name = $_SESSION["name"];
    $password = $_SESSION["password"];
    
}else {
    echo "not working";
       
    header('location: index.php');
}

// Start the session

if (isset($name)) {

   ?>

<!-- ==================================================== -->

<?php



if(isset($_POST["name"])){

    $f_name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $image = $_FILES['image']['name'];

}

$sql = "INSERT INTO users (name, email, password, image)
VALUES('$f_name', '$email', '$password', '$image')";


if ($conn->query($sql) === TRUE) {
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}





  // Image Upload Code

  if (isset($_POST['img_upload'])) {

  	// image file directory
  	$target = "images/users/".basename($image);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }


  
  $conn->close();
?>




<!-- ==================================================== -->

<?php


}

?>
