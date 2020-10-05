<?php

include('action/sql_config.php');


$id = $_GET['id'];
$identy = $_GET['mId'];



$query="DELETE FROM `member_premier_data`  WHERE id=$id";
mysqli_query($conn, $query);

header('location: single_view.php?id='.$identy);

$conn->close();
?>