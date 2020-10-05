
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

  /* weekly variable */
  $cur_date = date("d-m-Y");
  $last_week = date("d-m-Y", strtotime("previous friday"));

   ?>

<!-- ==================================================== -->



          <!-- Begin Page Content -->
          <div class="container-fluid">
          
            <!-- Page Heading -->
            <div class="d-flex align-items-center mb-4">
            <h4 class="mb-0 mt-2">সাপ্তাহিক হিসাব 
(শুক্রবার থেকে)</h4>
            
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
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">এই সপ্তাহে মোট ঋণ প্রদান</div>
                      <div class="h5 mb-0 bangla font-weight-bold text-gray-800">
<!--                       $sql = "SELECT * FROM all_member_form_data where loan_date BETWEEN '$last_week' AND '$cur_date' ORDER BY id"; -->

                      <?php
                       $cur_date = date("d-m-Y");
                       $last_week = date("d-m-Y", strtotime("previous friday"));
                      $sql = "SELECT sum(loan_amount) AS `total` FROM `all_member_form_data` where loan_date BETWEEN '$last_week' AND '$cur_date'";
                      
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
                        <div class="text-xs  font-weight-bold text-success text-uppercase mb-1">এই সপ্তাহে মোট আদায়কৃত কিস্তি</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">


                        <?php
                          $sql = "SELECT sum(joma) AS `total` FROM `member_premier_data` where premier_date BETWEEN '$last_week' AND '$cur_date' ";
                          
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



 
              
<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-success shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs  font-weight-bold text-success text-uppercase mb-1">এই সপ্তাহে মোট অন্যান্য ফি আদায়</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">


          <?php
            $sql = "SELECT sum(add_cost+others_cost) AS `total` FROM `all_member_form_data` where loan_date BETWEEN '$last_week' AND '$cur_date'";
            
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
                      <div class="text-xs  font-weight-bold text-success text-uppercase mb-1">এই সপ্তাহে কমিটির মোট সঞ্চয়</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">


                      <?php
                        $sql = "SELECT sum(savings+others_fee) AS `total` FROM `comity_data` where date BETWEEN '$last_week' AND '$cur_date' ";
                        
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
          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">এই সপ্তাহে সদস্যের মোট সঞ্চয় </div>
          <div class="h5 mb-0 bangla font-weight-bold text-gray-800">

          <?php
            $sql = "SELECT sum(savings) AS `total` FROM `member_premier_data` where premier_date BETWEEN '$last_week' AND '$cur_date'";
            
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
          <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">এই সপ্তাহে সদস্য ভর্তি</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">

          <?php
              $sql = "SELECT * FROM all_member_form_data where loan_date BETWEEN '$last_week' AND '$cur_date'";
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
          <i class="fas fa-comments fa-2x text-gray-300"></i>
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
          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">এই সপ্তাহে সদস্য পরিশোধ</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">

          <?php
              $sql = "SELECT * FROM all_member_form_data where is_paid='yes_paid' AND loan_date BETWEEN '$last_week' AND '$cur_date'";
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
        <i class="fas fa-user-check fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>



         

     
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-sm font-weight-bold text-info text-uppercase mb-1">বর্তমান ব্যালেন্স</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">

                    
                      <?php
                        $sql = "SELECT sum(savings+others_fee) AS `total` FROM `comity_data` ";
                        
                        $result = mysqli_query($conn, $sql);
                        $data = mysqli_fetch_array($result);
                        $total_amount = $data['total'];
                        
                        $balence = $total_amount - $pay_amount;
                        $total = $premier + $balence + $others_cost+$savings;
                        
                        
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
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


          </div>


  


<div class="container">
  <div id="accordion">
    <div class="card">
      <div class="card-header text-center mb-2">
      <button type="button" class="btn btn-primary btn-xs"  data-toggle="collapse" href="#collapseOne">ঋণ প্রদান</button>
      <button type="button" class="btn btn-info"  data-toggle="collapse" href="#collapse2">আদায়কৃত কিস্তি</button>
      <button type="button" class="btn btn-success"  data-toggle="collapse" href="#collapseThree">সদস্য ভর্তি</button>
      <button type="button" class="btn btn-xs btn-dark"  data-toggle="collapse" href="#collapse4">সদস্য পরিশোধ</button>
      </div>
      <div id="collapseOne" class="collapse show" data-parent="#accordion">
      <table id="table_id" class="display table table-bordered">
                  <thead class="text-primary text-center">
                      <tr>
                          <th>ছবি</th>
                          <th>তারিখ</th>
                          <th>নাম</th>
                          <th>মোবাইল নং</th>
                          <th width="20%">ঋণের পরিমাণ<span class="text-xs text-primary"> (মুনাফা সহ)</span></th>
                          <th>Column 2</th>
                      </tr>
                  </thead>
                  <tbody>
                  <?php


              $sql = "SELECT * FROM all_member_form_data where is_paid='unpaid' AND loan_date BETWEEN '$last_week' AND '$cur_date'  ORDER BY id";
                $res = $conn->query($sql);

              if ($res->num_rows > 0) {
                  // output data of each row
                  while ($row = $res->fetch_assoc()) {
                    
                  $image = $row["image"];
                    

                     echo "
                     <tr>
                     <td width='5%' class='text-center'> <img width='40' class='rounded' src='images/members/" . $row['image'] . "' ></td>
                          <td>". $row["loan_date"] ."</td>
                          <td>" . $row["m_name"] . "</td>
                          <td>" . $row["phone_no"] . "</td>
                          <td>" . $row["total_amount"] . "</td>
    
                          <td class='text-center'><a class='btn btn-info btn-sm' id='alert' href='single_view.php?id=" . $row["id"] . "'>দেখুন</a>
                          <a class='btn btn-success btn-sm btn-delete' value='1' name='actiondelete' Onclick='return ConfirmPaid();' id='alert'  href='action/paid.php?id=" . $row["id"] .  "&paid=yes_paid'>পরিশোধ</a>
                          <a class='btn btn-danger btn-sm btn-delete' value='1' name='actiondelete' Onclick='return ConfirmDelete();' id='alert'  href='action/delete.php?id=" . $row["id"] .  "&image=". $image ."'>ডিলিট</a></td>
                      </tr>";

                    }

      
                  } else {
                    echo "no result";
                  }
                  
                  
                  $conn->close();
                     
                     ?>
                  
                  </tbody>
              </table>
      </div>
    </div>


    <div class="card">
      <div id="collapse2" class="collapse" data-parent="#accordion">
      <table id="table_id2" class="display table table-bordered">
                  <thead class="text-info text-center">
                      <tr>
                          <th>তারিখ</th>
                          <th>Column 2</th>
                          <th>Column 2</th>
                          <th>Column 2</th>
                          <th>Column 2</th>
                          <th>Column 2</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td>Row 1 Data 1</td>
                          <td>Row 1 Data 2</td>
                          <td>Row 1 Data 2</td>
                          <td>Row 1 Data 2</td>
                          <td>Row 1 Data 2</td>
                          <td>Row 1 Data 2</td>
                      </tr>
                      <tr>
                          <td>Row 2 Data 1</td>
                          <td>Row 2 Data 2</td>
                          <td>Row 2 Data 2</td>
                          <td>Row 2 Data 2</td>
                          <td>Row 2 Data 2</td>
                          <td>Row 2 Data 2</td>
                      </tr>
                  </tbody>
              </table>
      </div>
    </div>
    <div class="card">
      <div id="collapseThree" class="collapse" data-parent="#accordion">
      <table id="table_id3" class="display table table-bordered">
                  <thead class="text-success text-center">
                      <tr>
                          <th>তারিখ</th>
                          <th>Column 2</th>
                          <th>Column 2</th>
                          <th>Column 2</th>
                          <th>Column 2</th>
                          <th>Column 2</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td>Row 1 Data 1</td>
                          <td>Row 1 Data 2</td>
                          <td>Row 1 Data 2</td>
                          <td>Row 1 Data 2</td>
                          <td>Row 1 Data 2</td>
                          <td>Row 1 Data 2</td>
                      </tr>
                      <tr>
                          <td>Row 2 Data 1</td>
                          <td>Row 2 Data 2</td>
                          <td>Row 2 Data 2</td>
                          <td>Row 2 Data 2</td>
                          <td>Row 2 Data 2</td>
                          <td>Row 2 Data 2</td>
                      </tr>
                  </tbody>
              </table>
      </div>
    </div>

    <div class="card">
      <div id="collapse4" class="collapse" data-parent="#accordion">
      <table id="table_id4" class="display table table-bordered">
                  <thead class="text-dark text-center">
                      <tr>
                          <th>তারিখ</th>
                          <th>Column 2</th>
                          <th>Column 2</th>
                          <th>Column 2</th>
                          <th>Column 2</th>
                          <th>Column 2</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td>Row 1 Data 1</td>
                          <td>Row 1 Data 2</td>
                          <td>Row 1 Data 2</td>
                          <td>Row 1 Data 2</td>
                          <td>Row 1 Data 2</td>
                          <td>Row 1 Data 2</td>
                      </tr>
                      <tr>
                          <td>Row 2 Data 1</td>
                          <td>Row 2 Data 2</td>
                          <td>Row 2 Data 2</td>
                          <td>Row 2 Data 2</td>
                          <td>Row 2 Data 2</td>
                          <td>Row 2 Data 2</td>
                      </tr>
                  </tbody>
              </table>
      </div>
    </div>

  </div>
</div>





<script>
$(document).ready( function () {
    $('#table_id').DataTable();
} );
$(document).ready( function () {
    $('#table_id2').DataTable();
} );
$(document).ready( function () {
    $('#table_id3').DataTable();
} );
$(document).ready( function () {
    $('#table_id4').DataTable();
} );
</script>


<!-- ==================================================== -->

<?php

include('part/footer.php');

}

?>
