<?php
session_start();
include('action/sql_config.php');


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
          <h4 class="mb-0">পরিশোধকৃত সদস্য</h4>
          
            <a href="comity.php" class="d-none ml-auto mt-2 d-sm-inline-block btn btn-sm btn-primary shadow-sm">কমিটি</a>
            <a href="running_member.php" class="d-none ml-3 mt-2 d-sm-inline-block btn btn-sm btn-primary shadow-sm">বর্তমান সদস্য</a>
            <a href="add_member.php" class="d-none ml-3 mt-2 d-sm-inline-block btn btn-sm btn-primary shadow-sm">সদস্য যোগ করুন</a>
          </div>
          

<!-- topbar -->
  <div class="container bg-Secondary">

        
    <div class="row">
        <div class="col-md-12">
            <div class="row mb-3 bg-dark">
                <div class="col-md-3 col-sm-12 text-white mt-3 mb-2">
                <h5 class="text-warning" >পরিশোধকৃত সদস্য :
                              
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
                    
                 </h5>  
                </div>
                
                <!-- <div class="col-md-3 col-sm-12 text-white mt-3 mb-2"><h5>সর্বমোট প্রদান :  </h5></div> -->
                <div class="col-md-3 col-sm-12 text-white">
                
                </div>
            </div>
            
            <table class="table table-striped table-dark table-bordered" id="datatable">
                <thead class="text-center">
                  <tr>
                    <th>ছবি</th>
                    <th>তারিখ</th>
                    <th>নাম</th>
                    <th>পিতার নাম</th>
                    <th>ঋণের পরিমান</th>
                    <th>মোট টাকা</th>
                    <th>বিস্তারিত</th>

                </tr>
                </thead>


            
                <?php


$sql = "SELECT * FROM all_member_form_data where not is_paid='unpaid' ORDER BY id";
  $res = $conn->query($sql);

if ($res->num_rows > 0) {
    // output data of each row
    while ($row = $res->fetch_assoc()) {
      
    $image = $row["image"];
      
   
        echo "<tr>              
                                <td width='5%' class='text-center'> <img width='50' class='rounded' src='images/members/" . $row['image'] . "' ></td>
                                <td width='10%' > " . $row["loan_date"] . " </td>
                                <td width='15%'> " . $row["m_name"] . "</td>
                                <td width='15%'> " . $row["f_name"] . "</td>
                                <td width='15%'> " . $row["loan_amount"] . "</td>
                                <td width='15%'> " . $row["total_amount"] . "</td>          
                                <td class='text-center'><a class='btn btn-info btn-sm' id='alert' href='single_view.php?id=" . $row["id"] . "&paid=yes'>দেখুন</a>
                                <a class='btn btn-danger btn-sm btn-delete' value='1' name='actiondelete' Onclick='return ConfirmDelete();' id='alert'  href='action/paid_member_delete.php?id=" . $row["id"] .  "&image=". $image ."'>ডিলিট</a>
                                </td></tr>";
        
    }



  
} else {
    echo "no result";
}


$conn->close();
?>


             
          
            
            </table>
        </div>
    </div>
  </div>

  </div>


  
</div>


  
<?php
 include('part/footer.php');
?>

<script>
$(document).ready(function() {
  $('#datatable').DataTable();
} );
</script>

<script>
$(document).ready(function () {
document.querySelector('warning').onclick = function () {
  swal({
  title: 'Are you sure?',
  text: 'Some text.',
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#DD6B55',
  confirmButtonText: 'Yes!',
  cancelButtonText: 'No.'
}).then(() => {
  if (result.value) {
    // handle Confirm button click
  } else {
    // result.dismiss can be 'cancel', 'overlay', 'esc' or 'timer'
  }
});
    };

});
</script>


<script>
    function ConfirmDelete()
    {
      var x = confirm( "আপনি কি এই সদস্য ডিলিট করতে চান?");
      if (x)
          return true;
      else
        return false;
    }
</script>    
<script>
    function ConfirmPaid()
    {
      var x = confirm( "এই সদস্য কে পরিশোধ পাতায় পাঠাতে চান ?");
      if (x)
          return true;
      else
        return false;
    }
</script>    
    
    
<!-- ==================================================== -->


<?php
}

?>
