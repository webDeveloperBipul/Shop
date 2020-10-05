
<?php
session_start();
include('sql_config.php');




if (isset($_SESSION["name"])) {
    $name = $_SESSION["name"];
    $password = $_SESSION["password"];
    
}else {
    echo "not working";
       
    header('location: index.php');
}

// Start the session

if (isset($name)) {






if(isset($_POST["m_name"], $_POST["f_name"])){

    $m_name = mysqli_real_escape_string($conn, $_POST["m_name"]);
    $f_name = mysqli_real_escape_string($conn, $_POST["f_name"]);
    $phone_no = mysqli_real_escape_string($conn, $_POST["phone_no"]);
    $profesion= mysqli_real_escape_string($conn, $_POST["profesion"]);
    $refer_name = mysqli_real_escape_string($conn, $_POST["refer_name"]);
    $permanent_addr = mysqli_real_escape_string($conn, $_POST["permanent_addr"]);
    $present_addr = mysqli_real_escape_string($conn, $_POST["present_addr"]);
    $nid = mysqli_real_escape_string($conn, $_POST["nid"]);
    $refer_name = mysqli_real_escape_string($conn, $_POST["refer_name"]);
    $refer_addr = mysqli_real_escape_string($conn, $_POST["refer_addr"]);
    $refer_phone = mysqli_real_escape_string($conn, $_POST["refer_phone"]);
    $about_work = mysqli_real_escape_string($conn, $_POST["about_work"]);
    $loan_date = mysqli_real_escape_string($conn, $_POST["loan_date"]);
    $loan_amount = mysqli_real_escape_string($conn, $_POST["loan_amount"]);
    $profit_amount = mysqli_real_escape_string($conn, $_POST["profit_amount"]);
    $total_amount = mysqli_real_escape_string($conn, $_POST["total_amount"]);
    $premier = mysqli_real_escape_string($conn, $_POST["premier"]);
    $premier_amount = mysqli_real_escape_string($conn, $_POST["premier_amount"]);
    $savings_amount = mysqli_real_escape_string($conn, $_POST["savings_amount"]);
    $add_cost = mysqli_real_escape_string($conn, $_POST["add_cost"]);
    $others_cost = mysqli_real_escape_string($conn, $_POST["others_cost"]);
    $details = mysqli_real_escape_string($conn, $_POST["details"]);
    $unpaid = mysqli_real_escape_string($conn, $_POST["unpaid"]);
    $image = $_FILES['image']['name'];

}

$sql = "INSERT INTO all_member_form_data (m_name, f_name, phone_no, profesion, permanent_addr, present_addr, refer_name, refer_addr, refer_phone, about_work, nid, loan_date, loan_amount, profit_amount, total_amount, premier, premier_amount, savings_amount, add_cost, others_cost, details, is_paid, image)
VALUES('$m_name', '$f_name', '$phone_no', '$profesion', '$permanent_addr', '$present_addr',  '$refer_name',  '$refer_addr', '$refer_phone', '$about_work', '$nid', '$loan_date', '$loan_amount', '$profit_amount', '$total_amount', '$premier',  '$premier_amount', '$savings_amount', '$add_cost', '$others_cost', '$details','$unpaid', '$image')";


if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;  
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


header('location: ../single_view.php?id='. $last_id);



  // Image Upload Code

  if (isset($_POST['img_upload'])) {

  	// image file directory
  	$target = "../images/members/".basename($image);

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
