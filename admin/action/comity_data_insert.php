
<?php
include('sql_config.php');
if(isset($_POST["submit"])){
$date = mysqli_real_escape_string($conn, $_POST["date"]);
$savings = mysqli_real_escape_string($conn, $_POST["savings"]);
$others_fee = mysqli_real_escape_string($conn, $_POST["others_fee"]);
$id = mysqli_real_escape_string($conn, $_POST["current_id"]);
$others_info = mysqli_real_escape_string($conn, $_POST["others_info"]);
}
$sql = "INSERT INTO comity_data (date, savings, others_fee, current_id)
VALUES('$date', '$savings', '$others_fee', '$id')";
if ($conn->query($sql) === TRUE) {
echo "data inserted"; 
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
header('location: ../comity_single_view.php?id='.$id);
?>
