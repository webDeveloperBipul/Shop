<?php 
include('sql_config.php');


$id = $_GET['id'];

if ($_GET['image'] == true) {
  $image = $_GET['image'];
}




$query="DELETE FROM `comity`  WHERE id=$id";
mysqli_query($conn, $query);



$file = "../images/comity/".$image ;

if (!unlink($file)) {
  echo ("Error deleting $file");
} else {
  echo ("Deleted $file");
}



 header('location: ../comity.php' );

?>

