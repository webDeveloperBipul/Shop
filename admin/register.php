<?php
session_start();
include('action/sql_config.php');




if (isset($_SESSION["name"])) {
    $name     = $_SESSION["name"];
    $password = $_SESSION["password"];
    
} else {
    echo "not working";
    
    header('location: index.php');
}

// Start the session

if (isset($name)) {
    
?>
<!-- ==================================================== -->

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Register</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
  <link href="https://fonts.maateen.me/solaiman-lipi/font.css" rel="stylesheet">


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

<div class="row justify-content-md-center">
  <div class="col-md-6 col-offset-3">
    
  <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
        
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">ইউজার একাউন্ট খুলুন</h1>
              </div>
              <form class="user" action="register_insert.php" enctype="multipart/form-data" method="post">
                <div class="form-group row">
                  <div class="col-sm-12 mb-3 mb-sm-0">
                    <input type="text" name="name" class="form-control form-control-user" id="exampleFirstName" placeholder="নাম" required>
                  </div>
                  
                </div>
                <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="ইমেইল এড্রেস">
                </div>
                
                <div class="form-group row">
                  <div class="col-sm-6 mb-sm-0">
                  
                <input type="password" name="password" placeholder="পাসওয়ার্ড" class="form-control form-control-user" id="password" required>
          
                  </div>
                  <div class="col-sm-6">

                    <input type="password" name="password_r" class="form-control form-control-user" id="confirm_password" placeholder="পাসওয়ার্ড নিশ্চিত করুন"  required>
                  </div>
              
                  
                </div>


                <div class="text-center mb-3">
                <label for="upload_img" class="btn btn-success btn-sm mt-4">ছবি যোগ করুন</label>
                  <input style=" display:none;" class="mb-5 mt-3" type="file" name="image" id="upload_img" accept="image/*">
                    
                  </div>

                  
                  <button type="submit" value="submit" name="img_upload"  class="btn btn-primary btn-user btn-block">সাবমিট
                        </button>
              
              </form>




              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.html">পাসওয়ার্ড ভুলে গেছেন ?</a>
              </div>
              <div class="text-center">
                <a class="small" href="../index.php">আগের একাউন্ট আছে ? লগ ইন করুন!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  </div>





  <script>
var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>


  <!-- Bootstrap core JavaScript-->
  <script src="js/vendor/jquery/jquery.min.js"></script>
  <script src="js/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="js/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>


<!-- ==================================================== -->

 
<?php
}

?>
