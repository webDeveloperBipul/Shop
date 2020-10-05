<?php 

include('sql_config.php');

$id = $_GET['id'];
if ($_GET['paid'] == true) {
  $paid = $_GET['paid'];
}



$sql = "UPDATE all_member_form_data SET is_paid = '$paid'
 WHERE id=$id";


if ($conn->query($sql) === TRUE) {
     
} else {    
    echo "Error: " . $sql . "<br>" . $conn->error;
}


/*
$file = "images/".$image ;

if (!unlink($file)) {
  echo ("Error deleting $file");
} else {
  echo ("Deleted $file");
}

*/



header('location: ../running_member.php' );




?>