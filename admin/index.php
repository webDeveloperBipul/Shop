<?php
session_start();
?>




<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    
  <link href="js/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://fonts.maateen.me/solaiman-lipi/font.css" rel="stylesheet">
    <link href="css/jquery-ui.min.css" rel="stylesheet">
    <link href="css/sweetalert2.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/datatables.min.css"/>
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
      form{
        height: 100%;
      }
      .sidebar_bg{
        background: #000d66;
      }
      .header-top-bg{
        background: #004d66;
      }
      body{
        font-family: 'SolaimanLipi', sans-serif !important;
        padding:0;
        margin:0;
        background: #555  ;
        height:100%;
      }
    </style>
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">

                            <div class="col-sm-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">স্বাগতম!</h1>
                                    </div>



                                    
 <?php
include ('action/sql_config.php');


         // define variables and set to empty values
         $nameErr = $passErr = "";
         $name = $email = $gender = $comment = $website = "";

         
         
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name"] && $_POST["password"])) {
               echo "<h6 class='text-danger mt-3 text-center' >ইউজার নেম এবং পাসওয়ার্ড প্রবেশ করান</h6>";
            }else {
               $name = test_input($_POST["name"]);
               $password = test_input($_POST["password"]);
            }
        
         }
      
         function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }

       

         if($name && $password){
            $username = mysqli_real_escape_string($conn,$name);
            $password = mysqli_real_escape_string($conn,$password);
            $query = "SELECT * FROM `users` WHERE name='$username'
            and password='$password'";
          $result = mysqli_query($conn,$query) or die(mysql_error());
         
          $rows = mysqli_num_rows($result);
                 if($rows==1){

                  

                   $_SESSION['name'] = $username;
                   $_SESSION['password'] = $password;
                   header('location: front-page.php');
            

                   if(!empty($_POST["remember"])) {
                    setcookie ("username",$username,time()+ 3600);
                    setcookie ("password",$password,time()+ 3600);
                    echo "Cookies Set Successfuly";
                  } else {
                    setcookie("username","");
                    setcookie("password","");
                    echo "Cookies Not Set";
                  }
                     // Redirect user to index.php
             
                  }else{
                    session_unset();
                    echo "<h6 class='text-danger mt-3 text-center' >ইউজার নেম অথবা পাসওয়ার্ড ভুল</h6>";
                  }
                  
                  
         }
         
      ?>

                                    <form class="user" id="myForm" action="" method="post">
                                        <div class="form-group">
                                            <input type="text" name="name" value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; }  ?>" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="ইউজার নেম">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; }  ?>" class="form-control form-control-user" id="exampleInputPassword" placeholder="পাসওয়ার্ড">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox"  name="remember" class="custom-control-input" id="customCheck" >
                                                <label class="custom-control-label" for="customCheck">মনে রাখুন</label>
                                            </div>
                                        </div>
                                        <input type="submit" name="submit" value="সাবমিট"  class="btn btn-primary btn-user btn-block">

                                    </form>

                                   
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.php">পাসওয়ার্ড ভুলে গেছেন ?</a>
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

<!-- Bootstrap core JavaScript-->
<script src="js/vendor/jquery/jquery.min.js"></script>
  <script src="js/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="js/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="js/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>
</html>