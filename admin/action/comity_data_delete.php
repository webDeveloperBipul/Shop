<?php 
include('sql_config.php');


$id = $_GET['id'];
$identy = $_GET['cId'];


$query="DELETE FROM `comity_data`  WHERE id=$id";
mysqli_query($conn, $query);


 header('location: ../comity_single_view.php?id='.$identy);

?>

