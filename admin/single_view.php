<?php
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
         include('action/sql_config.php');
         include('part/header.php');
   
      ?>
<!-- ==================================================== -->
<?php 
   $id = $_GET['id'];

   if(isset($_GET['paid'])) {
      $paid = $_GET['paid']; 
    }
    
   $sql = "SELECT * FROM all_member_form_data WHERE id = $id";
   $result = $conn->query($sql);
   if ($result->num_rows > 0) {
      
   // output data of each row
   while ($row = $result->fetch_assoc()) {
   

   ?>

     
        <!-- Begin Page Content -->
        <div class="container-fluid">
        
          <!-- Page Heading -->
          <div class="d-flex align-items-center mb-4">
          <h4 class="mb-0 text-success  border p-2 mt-3"><?php if(isset($paid)){echo "পরিশোধকৃত সদস্য";}?></h4>
          
            <a href="comity.php" class="d-none ml-auto mt-3 d-sm-inline-block btn btn-sm btn-primary shadow-sm">কমিটি</a>
            <a href="running_member.php" class="d-none ml-3 mt-3 d-sm-inline-block btn btn-sm btn-primary shadow-sm">বর্তমান সদস্য</a>
            <a href="add_member.php" class="d-none ml-3 mt-3 d-sm-inline-block btn btn-sm btn-primary shadow-sm">সদস্য যোগ করুন</a>
            <a href="member_details.php?id=<?php echo $id;?>" class="btn mt-3 btn-sm btn-danger ml-2">বিস্তারিত  দেখুন
            </a>
          </div>
          
      <hr>

         <div class="container">
         
     
         <div class="container mt-3">
            <div class="row">
               <div class="col-sm-3">
                  <div class="text-center mt-2 mb-3">
                     <?php
                        if($row['image']){
                        echo "<div id='img_div'>";
                        echo "<img width='200' alt='image of " . $row["m_name"] . " '  class='img-thumbnail rounded' src='images/members/" . $row['image'] . "' >";
                        echo "</div>";
                        }
                        else{
                        echo '<img width="200" src="images/app_image/blank.jpg" alt="image not found"></br>';
                        echo "<button class='camera_btn btn btn-sm btn-info'><i class='fas fa-camera'></i></button>";
                        }
                        ?>
                  </div>
               </div>
               <img src="" alt="">
               <div class="col-sm-9">
                  <div class="row mt-2">
                     <div class="col-sm-6">
                        <table class="table">
                           <h3 class="mb-3 ml-2">নাম: 
                              <span class="text-danger">
                              <?php echo $row["m_name"]; ?>
                              </span>
                           </h3>
                           <tbody>
                              <tr>
                                 <th scope="row">
                                    পিতার নাম:
                                 </th>
                                 <td > 
                                    <?php echo $row["f_name"]; ?>
                                 </td>
                              </tr>
                              <tr>
                                 <th width="200px" scope="row">সদস্য আই.ডি :
                                 </th>
                                 <td>
                                    <?php echo $row["id"]; ?>
                                 </td>
                              </tr>
                              <tr>
                                 <th scope="row">মোবাইল নং:
                                 </th>
                                 <td>
                                    <?php echo $row["phone_no"]; ?>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                     <div class="col-sm-6">
                        <table class="table">
                           <h4 class="mb-3 ml-2">ঋণের পরিমাণ: 
                              <span class="text-success">
                              <?php echo $row["loan_amount"]; ?>
                              </span>
                              টাকা
                           </h4>
                           <tbody>
                              <tr>
                                 <th scope="row">মূনাফার পরিমাণ: 
                                 </th>
                                 <td>
                                    <?php echo $row["profit_amount"]; ?> /- 
                                 </td>
                              </tr>
                              <tr>
                                 <th scope="row">মোট :
                                    <?php
                                       $identy = $row["id"];
                                       $loan_amount = $row["loan_amount"];
                                       $profit_amount = $row["profit_amount"];
                                       
                                       $sql = "SELECT sum(joma) AS `joma` FROM `member_premier_data` where current_id=$identy";
                                       
                                       
                                         $result = mysqli_query($conn, $sql);
                                         $data = mysqli_fetch_array($result);
                                         $joma = $data['joma'];
                                       
                                         
                                        
                                         ?>
                                 </th>
                                 <td class="text-info">
                                    <?php 
                                       echo $loan_amount + $profit_amount;
                                        
                                       ?>  টাকা
                                 </td>
                              </tr>
                              <tr>
                                 <th width="200px" scope="row">due :
                                 </th>
                                 <td>
                                    <?php 
                                       if($joma == 0){
                                         echo $loan_amount + $profit_amount;
                                         }else{
                                           echo ($loan_amount + $profit_amount) - $joma;
                                         }
                                         
                                       
                                       ?>
                                    টাকা
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
            <hr>
         </div>
         <?php
            $identy = $row["id"];
            $name = $row["m_name"];
            }
            } 
            ?>
         <!-- topbar -->
         <div class="container bg-Secondary">
            <div class="row">
               <div class="col-md-12">
                  <div class="row mb-3 bg-dark">
                     <div class="col-md-3 col-sm-12 text-white mt-3 mb-2">
                        <h5 >কিস্তি আদায় :
                           <?php
                              $sql = "SELECT * FROM member_premier_data where test=$identy";
                              if ($result = mysqli_query($conn, $sql)) {
                              // Return the number of rows in result set
                              $rowcount = mysqli_num_rows($result);
                              echo "<span class='text-warning'>" .$rowcount ."</span>";
                              
                              // Free result set
                              mysqli_free_result($result);
                              }
                              ?> টি
                        </h5>
                     </div>
                     <div class="col-md-3 custom-class col-sm-12 text-white mt-3 mb-2">
                        <h5>মোট আদায় : 
                           <?php
                              $sql = "SELECT sum(joma) AS `total` FROM `member_premier_data` where current_id='$identy'";
                              
                              $result = mysqli_query($conn, $sql);
                              $data = mysqli_fetch_array($result);
                              $loan_amount = $data['total'];
                              
                              if($loan_amount > 0){
                                echo "<span class='text-warning'>" .$loan_amount ."</span>";
                              }
                              else{
                                echo " 0 ";
                              }
                              ?> টাকা
                        </h5>
                     </div>
                     <div class="col-md-3 col-sm-12 text-white mt-3 mb-2">
                        <h5>সঞ্চয় আদায় : 
                           <?php
                              $sql = "SELECT sum(savings) AS `savings` FROM `member_premier_data` where current_id='$identy'";
                              
                              $result = mysqli_query($conn, $sql);
                              $data = mysqli_fetch_array($result);
                              $loan_amount = $data['savings'];
                              
                              if($loan_amount > 0){
                                echo "<span class='text-warning'>" .$loan_amount ."</span>";
                              }
                              else{
                                echo " 0 ";
                              }
                              ?> টাকা
                        </h5>
                     </div>
                     <div class="col-md-3 col-sm-12 text-white">
                        <div class="text-right mt-2">
                           <button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#myModal" data-whatever="@getbootstrap">কিস্তি নিবন্ধন করুন
                           </button>
                        </div>
                     </div>
                  </div>
                  <table class="table  table-dark table-bordered" id="datatable">
                  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog" role="document">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">কিস্তি যোগ করুন
                              </h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;
                              </span>
                              </button>
                           </div>
                           <div class="modal-body">
                              <form  action="action/premier_data_insert.php" method="post" autocomplete="off">
                                 <div class="form-group">
                                    <label for="datepicker" class="col-form-label">তারিখ:
                                    </label>
                                    <input class="form-control" name="premier_date" type="text" id="datepicker" placeholder="তারিখ*" min="2010-01-01" value="">
                                 </div>
                                 <div class="form-group">
                                    <input type="hidden" class="form-control" name="name" value="<?php echo $name; ?>" id="recipient-name">
                                 </div>
                                 <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">জমা
                                    </label>
                                    <input type="number" class="form-control" name="joma" id="recipient-name">
                                 </div>
                                 <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">সঞ্চয়
                                    </label>
                                    <input type="number" class="form-control" name="savings" id="recipient-name">
                                 </div>
                                 <div class="form-group">
                                    <input type="hidden" name="current_id" value="<?php echo $identy; ?>" class="form-control" id="recipient-name">
                                 </div>
                                 <div class="form-group">
                                    <label for="message-text" class="col-form-label">Message:
                                    </label>
                                    <textarea class="form-control" id="message-text">
                                    </textarea>
                                 </div>
                                 <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                    </button>
                                    <button type="submit" value="submit" name="submit"  class="btn btn-primary">Send message
                                    </button>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php
                     $sql = "SELECT * FROM member_premier_data  where current_id='$identy'";
                     $res = $conn->query($sql);
                     if ($res->num_rows > 0) {
                     ?>  
                  <table class="table table-dark table-bordered table-striped">
                     <thead class="text-center">
                        <tr>
                           <th width="15%">তারিখ
                           </th>
                           <th width="20%">নাম
                           </th>
                           <th width="10%">আদায়
                           </th>
                           <th width="10%">সঞ্চয়
                           </th>
                           <th width="10%">মোট টাকা
                           </th>
                           <th width="10%">বিস্তারিত
                           </th>
                        </tr>
                     </thead>
                     <?php
                     echo "<tbody>";
                        // output data of each row
                        while ($row = $res->fetch_assoc()) {
                        echo "<tr>
                        <td> " . $row["premier_date"] . " </td>
                        <td> " . $name . "</td>
                        <td> " . $row["joma"] . "</td>
                        <td> " . $row["savings"] . "</td>
                        <td> " . $row["savings"] . "</td>
                        <td class='text-right'><a class='btn btn-danger btn-sm' id='alert' href='single_view.php?id=" . $identy . "'><i class='fas fa-trash-alt'></i></i></a>
                        <a class='btn btn-warning btn-sm btn-delete' value='1' name='actiondelete' Onclick='return ConfirmDelete();' id='alert'  href='premier_data_delete.php?id=" . $row["id"] . "&mId=". $row["current_id"] ."'><i class='fas fa-times'></i></a></td></tr>";
                        }
                        } else {
                        echo "<h5 class='text-info text-center'>কিস্তি নিবন্ধনকৃত নেই</h5>";
                        }
                        $conn->close();
                        echo "<tbody>";
                        ?>
                  </table>
               </div>
            </div>
         </div>
      </div>
 
<!-- ==================================================== -->
<?php
include('part/footer.php');
   }
   
   ?>