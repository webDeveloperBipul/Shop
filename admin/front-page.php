<?php
include('action/sql_config.php');

session_start();




if (isset($_SESSION["name"])) {
    $name = $_SESSION["name"];
    $password = $_SESSION["password"];
    
}else {
    echo "not working";
       
    header('location: index.php');
}

// Start the session

if (isset($name)) {

  include('part/header.php');

   ?>

<!-- ==================================================== -->



          <!-- Begin Page Content -->
          <div class="container-fluid">
          
            <!-- Page Heading -->
            <div class="d-flex align-items-center mb-4">
            <h4 class="mb-0">মূলপাতা</h4>
            
              <a href="comity.php" class="d-none ml-auto mt-2 d-sm-inline-block btn btn-sm btn-primary shadow-sm">কমিটি</a>
              <a href="running_member.php" class="d-none ml-3 mt-2 d-sm-inline-block btn btn-sm btn-primary shadow-sm">বর্তমান সদস্য</a>
              <a href="add_member.php" class="d-none ml-3 mt-2 d-sm-inline-block btn btn-sm btn-primary shadow-sm">সদস্য যোগ করুন</a>
            </div>
          
          

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">মোট ঋণ প্রদান</div>
                      <div class="h5 mb-0 bangla font-weight-bold text-gray-800">

                      <?php
                      $sql = "SELECT sum(loan_amount) AS `total` FROM `all_member_form_data` ";
                      
                      $result = mysqli_query($conn, $sql);
                      $data = mysqli_fetch_array($result);
                      $pay_amount = $data['total'];

                      if($pay_amount > 0){
                        echo "৳"." ".$pay_amount;
                      }
                      else{
                        echo "৳ 0";
                      }
                    
                      ?> টাকা

                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-warning shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-info text-uppercase mb-1">মোট ঋণ প্রদান (মুনাফাসহ)</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">

        
          <?php
            $sql = "SELECT sum(total_amount) AS `total` FROM `all_member_form_data` ";
            
            $result = mysqli_query($conn, $sql);
            $data = mysqli_fetch_array($result);
            $total_amount = $data['total'];

            echo "৳"." ".$total_amount;

            ?> টাকা

          </div>
        </div>
        <div class="col-auto">
          <i class="fas fa-hand-holding-usd fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>




            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-sm  font-weight-bold text-success text-uppercase mb-1">মোট আদায়কৃত কিস্তি</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">


                        <?php
                          $sql = "SELECT sum(joma + savings) AS `total` FROM `member_premier_data` ";
                          
                          $result = mysqli_query($conn, $sql);
                          $data = mysqli_fetch_array($result);
                          $premier = $data['total'];

                          if($premier > 0){
                            echo "৳"." ".$premier;
                          }
                          else{
                            echo "৳ 0";
                          }
                        
                          ?> টাকা

                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-hand-point-left fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

                          <!-- Earnings (Monthly) Card Example -->
                          <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-sm  font-weight-bold text-success text-uppercase mb-1">মোট অনাদায়কৃত কিস্তি</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">


                      <?php
                        $sql = "SELECT sum(total_amount) AS `total` FROM `all_member_form_data` ";
                        
                        $result = mysqli_query($conn, $sql);
                        $data = mysqli_fetch_array($result);
                        $total_amount = $data['total'];
                        $unpaid = $total_amount - $premier;

                        if($unpaid > 0){
                          echo "৳"." ".$unpaid;
                        }
                        else{
                          echo "৳ 0";
                        }
                        ?> টাকা

                      </div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-hand-point-left fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

                                                <!-- Earnings (Monthly) Card Example -->
   <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-sm  font-weight-bold text-success text-uppercase mb-1">মোট আদায়কৃত মুনাফা</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">


                      <?php
                        $sql = "SELECT sum(savings) AS `total` FROM `member_premier_data` ";
                        
                        $result = mysqli_query($conn, $sql);
                        $data = mysqli_fetch_array($result);
                        $savings = $data['total'];

                        if($savings > 0){
                          echo "৳"." ".$savings;
                        }
                        else{
                          echo "৳ 0";
                        }
                        ?> টাকা

                      </div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-hand-point-left fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


                                  <!-- Earnings (Monthly) Card Example -->
   <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-sm  font-weight-bold text-success text-uppercase mb-1">অনাদায়কৃত মোট মুনাফা</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">


                      <?php
                        $sql = "SELECT sum(profit_amount) AS `total` FROM `all_member_form_data` ";
                        
                        $result = mysqli_query($conn, $sql);
                        $data = mysqli_fetch_array($result);
                        $loan_amount = $data['total'];

                        $unpaid_save = $loan_amount - $savings;

                        if($unpaid_save > 0){
                          echo "৳"." ".$unpaid_save;
                        }
                        else{
                          echo "৳ 0";
                        }
                        ?> টাকা

                      </div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-hand-point-left fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>




                                                         <!-- Earnings (Monthly) Card Example -->
   <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-sm  font-weight-bold text-success text-uppercase mb-1">সম্ভাব্য মোট মুনাফা</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">


                            <?php
                        $sql = "SELECT sum(profit_amount) AS `total` FROM `all_member_form_data` ";
                        
                        $result = mysqli_query($conn, $sql);
                        $data = mysqli_fetch_array($result);
                        $loan_amount = $data['total'];

                        if($loan_amount > 0){
                          echo "৳"." ".$loan_amount;
                        }
                        else{
                          echo "৳ 0";
                        }
                        ?> টাকা

                      </div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-hand-point-left fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>  
              
              
<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-success shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-sm  font-weight-bold text-success text-uppercase mb-1">মোট অন্যান্য ফি আদায়</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">


          <?php
            $sql = "SELECT sum(add_cost+others_cost) AS `total` FROM `all_member_form_data` ";
            
            $result = mysqli_query($conn, $sql);
            $data = mysqli_fetch_array($result);
            $others_cost = $data['total'];

            if($others_cost > 0){
              echo "৳"." ".$others_cost;
            }
            else{
              echo "৳ 0";
            }
          
            ?> টাকা

          </div>
        </div>
        <div class="col-auto">
        <i class="fas fa-hand-point-left fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

    

  
           <!-- Earnings (Monthly) Card Example -->
             <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-sm  font-weight-bold text-success text-uppercase mb-1"> কমিটির মোট সঞ্চয়</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">


                      <?php
                        $sql = "SELECT sum(savings+others_fee) AS `total` FROM `comity_data` ";
                        
                        $result = mysqli_query($conn, $sql);
                        $data = mysqli_fetch_array($result);
                        $savings = $data['total'];

                        if($savings > 0){
                          echo "৳"." ".$savings;
                        }
                        else{
                          echo "৳ 0";
                        }
                        ?> টাকা

                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>



<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-dark shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">সদস্যের মোট সঞ্চয় </div>
          <div class="h5 mb-0 bangla font-weight-bold text-gray-800">

          <?php
            $sql = "SELECT sum(savings) AS `total` FROM `member_premier_data` ";
            
            $result = mysqli_query($conn, $sql);
            $data = mysqli_fetch_array($result);
            $savings = $data['total'];

            if($savings > 0){
              echo "৳"." ".$savings;
            }
            else{
              echo "৳ 0";
            }
          
            ?> টাকা

          </div>
        </div>
        <div class="col-auto">
          <i class="fas fa-calendar fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

     
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-sm font-weight-bold text-info text-uppercase mb-1">বর্তমান ব্যালেন্স</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">

                    
                      <?php
                        $sql = "SELECT sum(savings+others_fee) AS `total` FROM `comity_data`";
                        
                        $result = mysqli_query($conn, $sql);
                        $data = mysqli_fetch_array($result);
                        $total_amount = $data['total'];

                        $balence = $total_amount - $pay_amount;
                        $total = $premier + $balence + $others_cost;
                        
                        
                        if($total <= 0){
                          echo "<span class='text-danger'>৳"." ".$total. " </span>";
                        }
                        else{
                          echo "<span class='text-primary'>৳"." ".$total. " </span>";
                        }
                        ?>

                      টাকা
                      

                      </div>
                    </div>



                    <div class="col-auto">
                      <i class="fas fa-file-invoice-dollar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          

          







    


          </div>

          



          
          <!-- /Content Row -->



           <!-- Content Row -->
  <div class="row">







<!-- Pending Requests Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-warning shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-sm font-weight-bold text-info text-uppercase mb-1">বর্তমান সদস্য সংখ্যা</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">

          <?php
              $sql = "SELECT * FROM all_member_form_data ORDER BY id";
              if ($result = mysqli_query($conn, $sql)) {
                  // Return the number of rows in result set
                  $rowcount = mysqli_num_rows($result);
                  echo "<span>" .$rowcount . "</span>";
                  // Free result set
                  mysqli_free_result($result);
              }

              ?> জন

          </div>
        </div>
        <div class="col-auto">
          <i class="fas fa-users fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Pending Requests Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-warning shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-sm font-weight-bold text-info text-uppercase mb-1">কমিটির সদস্য সংখ্যা</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">

          <?php
              $sql = "SELECT * FROM comity ORDER BY id";
              if ($result = mysqli_query($conn, $sql)) {
                  // Return the number of rows in result set
                  $rowcount = mysqli_num_rows($result);
                  echo "<span>" .$rowcount . "</span>";
                  // Free result set
                  mysqli_free_result($result);
              }

              ?> জন

          </div>
        </div>
        <div class="col-auto">
          <i class="fas fa-user-tie fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Pending Requests Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-warning shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-info text-uppercase mb-1">পরিশোধকৃত সদস্য সংখ্যা</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">

          <?php
              $sql = "SELECT * FROM all_member_form_data where not is_paid='unpaid' ORDER BY id";
              if ($result = mysqli_query($conn, $sql)) {
                  // Return the number of rows in result set
                  $rowcount = mysqli_num_rows($result);
                  echo "<span>" .$rowcount . "</span>";
                  // Free result set
                  mysqli_free_result($result);
              }

              ?> জন

          </div>
        </div>
          <i class="fas fa-user-check fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>




 

<!-- ==================================================== -->

<?php

include('part/footer.php');

}

?>
