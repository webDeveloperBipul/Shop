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

<!-- --------------------------------------------------------------------------------------------- -->


        <!-- Begin Page Content -->
        <div class="container-fluid">
        
          <!-- Page Heading -->
          <div class="d-flex align-items-center mb-4">
          <h4 class="mb-0">সদস্য ফরম</h4>
          
            <a href="comity.php" class="d-none ml-auto mt-2 d-sm-inline-block btn btn-sm btn-primary shadow-sm">কমিটি</a>
            <a href="running_member.php" class="d-none ml-3 mt-2 d-sm-inline-block btn btn-sm btn-primary shadow-sm">বর্তমান সদস্য</a>
            
          </div>
          
      
          <!-- content -->
          <div class="container mt-2 mb-5">
            <div class="row">
              <div class="col-md-12">
                <div class="container">
                  <div class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-8 ">
                      <div class="user-form mt-3" ng-app="">
                        <form action="action/insert.php" method="POST" enctype="multipart/form-data" autocomplete="off" onsubmit="return check_blank()">
                          <div class="row justify-content-center" >
                            <div class="col-md-6" >
                              <input class="mt-3" id="m_name"  type="text" ng-model="name" name="m_name"  placeholder="নাম*">
                              <br>
                              <input class="mt-3" id="f_name"  type="text" name="f_name" placeholder="পিতার নাম">
                              <br>
                              <input class="mt-3"  type="text" ng-model="phone_no" id="phone_no" name="phone_no"  placeholder="ফোন নাম্বার*">
                              <br>
                              <input class="mt-3" type="text"  name="profesion"  placeholder="পেশা">
                              <br>
                              <input class="mt-3" type="text"  name="permanent_addr"  placeholder="স্থায়ী ঠিকানা">
                              <br>
                              <input class="mt-3" type="text"  name="present_addr"  placeholder="বর্তমান ঠিকানা">
                              <br>
                              <input class="mt-3" type="text"  name="refer_name" placeholder="জামিনদারের নাম">
                              <br>
                              <input class="mt-3" type="text"  name="refer_addr"  placeholder="জামিনদারের ঠিকানা">
                              <br>
                              <input class="mt-3" type="text"  name="refer_phone"  placeholder="জামিনদারের মোবাইল নং">
                              <br>                           
                              <input class="mt-3" type="text"  name="about_work"  placeholder="কি কাজে লোন প্রয়োজন"> 
                              <br>
                              <label for="upload_img" class="btn btn-success btn-sm mt-4">ছবি যোগ করুন</label>
                              <input style=" display:none;" class="mb-5 mt-3" type="file" name="image" id="upload_img" accept="image/*">
                     
                      
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                              <input class="mt-3" type="number" name="nid"  placeholder="ভোটার আই.ডি নং">
                              <br>
                              <input class="mt-3" name="loan_date" type="text" id="datepicker" placeholder="তারিখ*" min="2010-01-01" value="">
                              <input class="mt-3" id="loan_amount" type="number" ng-model="loan_amount" name="loan_amount"  placeholder="লোনের পরিমাণ*">
                              <br>
                              <input class="mt-3" id="profit_amount" type="number" ng-model="profit" name="profit_amount"  placeholder="মুনাফার পরিমাণ*">
                              <br>
                              <input class="mt-3" type="number" name="total_amount"  placeholder="মোট " value="{{loan_amount + profit}}">
                              <br>
                              
                              <input class="mt-3" type="number" name="premier" ng-model="premier"  placeholder="কিস্তির সংখ্যা">
                              <br>
                              <input class="mt-3" type="number" name="premier_amount"value="{{(loan_amount + profit) / premier | number : 2 }}"  placeholder="সাপ্তাহিক কিস্তির হার">
                              <br>
                              <input class="mt-3" type="number" name="savings_amount"  placeholder="সঞ্চয়ের পরিমাণ">
                              <br>
                              
                              <input class="mt-3" type="number" name="add_cost"  placeholder="ভর্তি চার্জ">
                              <br>
                              <input class="mt-3" type="number" name="others_cost"  placeholder="অন্যান্য খরচ">
                              <br>
                              <input class="mt-3" type="text" name="details"  placeholder="বিবরণ">
                              <input class="mt-3" type="hidden" value="unpaid" name="unpaid">
                      
                            </div>   
                          </div>
                          <button  type="submit" name="img_upload"   class="btn btn-info mt-5 text-white btn-block" >
                            <i class="fas fa-user-plus">
                            </i>  নিবন্ধন করুন
                          </button>       
                        </form> 
                      </div>
                    </div>
                  </div>
                </div>
              
          <script  >
            function check_blank() {
              var name =document.getElementById('m_name').value;
              var phone =document.getElementById('phone_no').value;
              var date =document.getElementById('datepicker').value;
              var loan_amount =document.getElementById('loan_amount').value;
              var profit_amount =document.getElementById('profit_amount').value;
              if(name == "", phone == "", date == "", loan_amount == '', profit_amount == '' ){
                Swal.fire({
                  title: '<strong>গুরুত্বপূর্ণ ঘরগুলো পূরন করুন</strong>',
                  type: 'info',
                  html:
                  '<b>নাম, মোবাইল নাম্বার, তারিখ, ঋণের পরিমাণ ইত্যাদি পরবর্তীতে প্রয়োজন হতে পারে</b>' 
                  ,
                  showCloseButton: true,
                  focusConfirm: true,
                  confirmButtonText:
                  ' OK ',
                  confirmButtonAriaLabel: 'Thumbs up, great!',
                }
                         )
                return false;
              }
              else{
                Swal.fire(
                  'তথ্য নিবন্ধিত হয়েছে',
                  'Ok!',
                  'success'
                );
              }
            }
          </script>


<!-- --------------------------------------------------------------------------------------------- -->


<?php
include('part/footer.php');
}

?>