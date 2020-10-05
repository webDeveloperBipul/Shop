
<?php
session_start();
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
<?php
include('action/sql_config.php');
$id = $_GET['id'];
include('part/header.php');
?>

    <?php
$sql    = "SELECT * FROM comity WHERE id = $id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while ($row = $result->fetch_assoc()) {
?>
     <!-- Begin Page Content -->
     <div class="container-fluid">
        
        <!-- Page Heading -->
        <div class="d-flex align-items-center mb-4">
        <h4 class="mb-0">কমিটি বিস্তারিত</h4>
        
          <a href="comity.php" class="d-none ml-auto mt-2 d-sm-inline-block btn btn-sm btn-primary shadow-sm">কমিটি</a>
          <a href="running_member.php" class="d-none ml-3 mt-2 d-sm-inline-block btn btn-sm btn-primary shadow-sm">বর্তমান সদস্য</a>
          <a href="add_member.php" class="d-none ml-3 mt-2 d-sm-inline-block btn btn-sm btn-primary shadow-sm">সদস্য যোগ করুন</a>
        </div>
        </div>
        
    <div class="container mt-3">
      <div class="row">
        <div class="col-sm-3">
          <div class="text-center mt-2 mb-3">
            <?php
if ($row['image']) {
echo "<div id='img_div'>";
echo "<img width='200' alt='image of " . $row["name"] . " '  class='img-thumbnail rounded' src='images/comity/" . $row['image'] . "' >";
echo "</div>";
} else {
echo '<img width="200" src="images/app_image/blank.jpg" alt="image not found"></br>';
echo "<button class='camera_btn btn btn-sm btn-info'><i class='fas fa-camera'></i></button>";
}
?>
          </div>
        </div>
        <div class="col-sm-9">
          <div class="row mt-2">
            <div class="col-sm-6">
              <table class="table">
                <h5 class="mb-3 ml-2">নাম: 
                  <span class="text-danger">
                    <?php
echo $row["name"];
?>
                  </span>
                </h5>
                <tbody>
                  <tr>
                    <th scope="row">
                      পদবী:
                    </th>
                    <td>
                      <?php
echo $row["f_name"];
?>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      পিতার নাম:
                    </th>
                    <td>
                      <?php
echo $row["f_name"];
?>
               

                    </td>
                  </tr>
                  <tr>
                    <th scope="row">মোবাইল নং:
                    </th>
                    <td>
                      <?php
echo $row["phone"];
?>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="col-sm-6">
              <table class="table">
                <h5 class="mb-3 ml-2">সাপ্তাহিক সঞ্চয়:
                  <span class="text-success">
                    <?php
echo $row["savings"];
?>
                  </span>
                  টাকা
                </h5>
                <tbody>
                  <tr>
                    <th scope="row">জমাকৃত সঞ্চয়:
                      <?php
$identy  = $row["id"];
$sql     = "SELECT sum(savings) AS `savings` FROM `comity` where id=$identy";
$result  = mysqli_query($conn, $sql);
$data    = mysqli_fetch_array($result);
$savings = $data['savings'];
?>
                    </th>
                    <td class="text-info">
                      <?php
echo $savings;
?> টাকা
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">অন্যান্য ফি :
                    </th>
                    <td>
                      <?php
if ($savings == 0) {
echo $savings;
} else {
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
$name   = $row["name"];
}
}
?>
    <!-- topbar -->
    <div class="container bg-Secondary">
      <div class="row">
        <div class="col-md-12">
          <div class="row mb-3 bg-dark">
            <div class="col-md-3 col-sm-12 text-white mt-3 mb-2">
              <h5>আদায় :
                <?php
$sql = "SELECT * FROM comity_data where id='$identy'";
if ($result = mysqli_query($conn, $sql)) {
// Return the number of rows in result set
$rowcount = mysqli_num_rows($result);
echo "<span class='text-warning'>" . $rowcount . "</span>";
// Free result set
mysqli_free_result($result);
}
?> টি
              </h5>
            </div>
            <div class="col-md-3 custom-class col-sm-12 text-white mt-3 mb-2">
              <h5>জমাকৃত সঞ্চয়: 
                <?php
$sql         = "SELECT sum(savings) AS `total` FROM `comity_data` where current_id='$identy'";
$result      = mysqli_query($conn, $sql);
$data        = mysqli_fetch_array($result);
$loan_amount = $data['total'];
if ($loan_amount > 0) {
echo "<span class='text-warning'>" . $loan_amount . "</span>";
} else {
echo " 0 ";
}
?> টাকা
              </h5>
            </div>
            <div class="col-md-3 col-sm-12 text-white mt-3 mb-2">
              <h5>অন্যান্য ফি : 
                <?php
$sql         = "SELECT sum(others_fee) AS `savings` FROM `comity_data` where current_id='$identy'";
$result      = mysqli_query($conn, $sql);
$data        = mysqli_fetch_array($result);
$loan_amount = $data['savings'];
if ($loan_amount > 0) {
echo "<span class='text-warning'>" . $loan_amount . "</span>";
} else {
echo " 0 ";
}
?> টাকা
              </h5>
            </div>
            <div class="col-md-3 col-sm-12 text-white">
              <div class="text-right mt-2">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" data-whatever="@getbootstrap">কিস্তি নিবন্ধন করুন
                </button>
              </div>
            </div>
          </div>
          <table class="table  table-dark table-bordered" id="datatable">
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                      <?php
echo $name;
?>:  সঞ্চয় যোগ করুন
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;
                      </span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="action/comity_data_insert.php" method="post" autocomplete="off">
                      <div class="form-group">
                        <label for="datepicker" class="col-form-label">তারিখ:
                        </label>
                        <input class="form-control" name="date" type="text" id="datepicker" placeholder="তারিখ*" min="2010-01-01" value="">
                      </div>
                      <div class="form-group">
                        <input type="hidden" class="form-control" name="name" value="<?php
                                                                                     echo $name;
                                                                                     ?>" id="recipient-name">
                      </div>
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">সঞ্চয়:
                        </label>
                        <input type="number" class="form-control" name="savings" id="recipient-name">
                      </div>
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">অন্যান্য ফি:
                        </label>
                        <input type="number" class="form-control" name="others_fee" id="recipient-name">
                      </div>
                      <div class="form-group">
                        <input type="hidden" name="current_id" value="<?php
                                                                      echo $identy;
                                                                      ?>" class="form-control" id="recipient-name">
                      </div>
                      <div class="form-group">
                        <label for="others_info" class="col-form-label">বিবরণ:
                        </label>
                        <textarea class="form-control p-0" name="others_info" id="others_info">
                        </textarea>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">বাতিল
                        </button>
                        <button type="submit" value="submit" name="submit" class="btn btn-primary">ঠিক আছে
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <?php
$sql = "SELECT * FROM comity_data  where current_id='$identy'";
$res = $conn->query($sql);
if ($res->num_rows > 0) {
?>
            <table id="example"  class="table table-bordered  ">
              <thead class="text-center">
                <tr>
                  <th class='pl-3'>তারিখ
                  </th>
                  <th width="20%">নাম
                  </th>
                  <th width="15%">সঞ্চয়
                  </th>
                  <th width="15%">অন্যান্য ফি
                  </th>
                  <th>মোট টাকা
                  </th>
                  <th class="text-right">অ্যাকশন
                  </th>
                </tr>
              </thead>
              </tbody>
              <?php
// output data of each row
while ($row = $res->fetch_assoc()) {
$c_id    = $row["id"];
$savings = $row["savings"];
$others  = $row["others_fee"];
$date    = $row["date"];
$add     = $savings + $others;
echo "<tr>
<form method='post' autocomplete='off' action='action/edit.php?id=" . $c_id . "&main=" . $identy . "'>
<td class='text-center'><input type='text' class='input_fix' name='date' value='" . $date . "'></td>
<td> " . $name . "</td>
<td><input class='input_fix' type='number' name='savings' value='" . $savings . "'></td>
<td><input class='input_fix' type='number' name='others' value='" . $others . "'></td>
<td> " . $add . "</td>
<td class='text-right'>
<input type='submit' value='সেভ'  class='btn btn-info'>
</input>
</form>
<a class='btn btn-danger btn-sm btn-delete' value='1' name='actiondelete' Onclick='return ConfirmDelete();' id='alert'  href='action/comity_data_delete.php?id=" . $row["id"] . "&cId=" . $identy . "'><i class='fas fa-trash-alt'></i></a></td></tr>";
}
} else {
echo "<h5 class='text-info text-center'>সঞ্চয় নিবন্ধনকৃত নেই</h5>";
}
?>
</tbody>
            </table>
            </div>
        </div>
      </div>
    </div>



  

<?php
include('part/footer.php');
}
?>
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>

