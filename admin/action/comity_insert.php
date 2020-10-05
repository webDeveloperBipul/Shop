<?php

include('sql_config.php');



if(isset($_POST["name"], $_POST["savings"])){

    $date = mysqli_real_escape_string($conn, $_POST["date"]);
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $f_name = mysqli_real_escape_string($conn, $_POST["f_name"]);
    $phone = mysqli_real_escape_string($conn, $_POST["phone"]);
    $address = mysqli_real_escape_string($conn, $_POST["address"]);
    $others_info = mysqli_real_escape_string($conn, $_POST["others_info"]);
    $podobi = mysqli_real_escape_string($conn, $_POST["podobi"]);
    $savings = mysqli_real_escape_string($conn, $_POST["savings"]);
    $image = $_FILES['image']['name'];


}



$sql = "INSERT INTO comity (name, f_name, savings, date, image, phone, address, others_info, podobi)
VALUES('$name', '$f_name', '$savings', '$date', '$image', '$phone', '$address' , '$others_info', '$podobi')";




if ($conn->query($sql) === TRUE) {
     
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

header('location: ../comity.php');



 // Image Upload Code

 if (isset($_POST['img_upload'])) {

    // image file directory
    $target = "../images/comity/".basename($image);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
    }else{
        $msg = "Failed to upload image";
    }
}



$conn->close();
?>