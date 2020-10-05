<?php 

include('action/sql_config.php');

$id = $_GET['id'];
$image = $_GET['image'];



$query="DELETE FROM `comity`  WHERE id=$id";
mysqli_query($conn, $query);



$file = "images/comity/".$image ;

if (!unlink($file)) {
  echo ("Error deleting $file");
} else {
  echo ("Deleted $file");
}









?>