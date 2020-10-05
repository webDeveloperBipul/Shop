<?php  
	include('sql_config.php');
	$id = $_GET["id"];  
	$identy = $_GET["main"];  

  
if (isset($_POST['savings'], $_POST['others'])) {

    $date =mysqli_real_escape_string($conn,$_POST['date']);
    $savings =mysqli_real_escape_string($conn,$_POST['savings']);
    $others =mysqli_real_escape_string($conn,$_POST['others']);
	
}


	$sql = "UPDATE comity_data SET date = '".$date."', savings= '".$savings."', others_fee= '".$others."' WHERE id='".$id."'";  
	if(mysqli_query($conn, $sql))  
	{  
		echo 'সেভ হয়েছে';  
	}
	
	header('location: ../comity_single_view.php?id='.$identy);  
 ?>

