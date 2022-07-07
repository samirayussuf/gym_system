
<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');?>



  <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary"> Attendance</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Attendance</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                
                <!-- /# row -->
                  <div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">

                            </div>
                            <div class="card-body">
                              <form method="POST">
                                <div class="table-responsive">
                                   <table class="table table-hover ">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Profile</th>
                                                <th>Name</th>
                                                <th>Attendance</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <?php 
                                          include 'connect.php';
                                     date_default_timezone_set('Asia/Kolkata');
                                     //$current_date = date('Y-m-d h:i:s');
                                        $current_date = date('Y-m-d h:i A');
                                       $exp_date_time = explode(' ', $current_date);
                                    $todays_date =  $exp_date_time['0'];
                                           $q="select * from  tbl_customer";
                                           $res = $conn->query($q);
                                          $i=1;
                                          while($row=mysqli_fetch_array($res)){ 
                                           ?>
                            <tr>

                                <td><?php echo $i; ?></td>
                                <td><image class="profile-pic img-responsive" src="images/profile_image.png" style="height:30%;width:25%;">
                                </td>

                                <td><?php echo $row['fname'];?> <?php echo $row['lname'];?></td>

                                <td><div class="row"><i class="fa fa-map-marker" style="font-size:50px;color:blue"></i>
                                    <div class="widget-thumb-body">
                                <span class="widget-thumb-body-stat" data-counter="counterup" data-value="0" style="margin-left: 30%;"><?php echo $row['attendance_count'] ?></span><br>
                                <span class="widget-thumb-subtitle uppercase"> Check In</span>
                                 </div></div>
                                </td>
                                    <!-- <span>count</span><br>CHECK IN</td> -->
                               <input type="hidden" name="user_id" value="<?php echo $row['id'];?>">
<?php
  $q = "select * from tbl_attendance where curr_date = '$todays_date' AND user_id = '".$row['id']."'";
$result = $conn->query($q);
$num_count  = mysqli_num_rows($result);
$row_exist = mysqli_fetch_array($result);
$curr_date = $row_exist['curr_date'];
if($curr_date == $todays_date){
  
    ?>

 <td><label class="btn btn-primary" style="padding-top: 0px;height: 26px;"><?php echo $row_exist['curr_date'];?>  <?php echo $row_exist['curr_time'];?></label><br>
<a href = "pages/del_attendance.php?id=<?php echo $row_exist['user_id'] ;?>" class="btn btn-warning"><i class="fa fa remove"></i>REMOVE CHECK IN</a></td>
</td>

<?php } else {
    
?>
  <td><a href="pages/check_attendance.php?id=<?php echo $row['id'];?>"><button type="button" name="check_in" class="btn btn-success">CHECK IN</button></td>

<?php }
?>
                              
                            </tr>
                                           <?php $i++ ;} ?>
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
               
                <!-- /# row -->

                <!-- End PAge Content -->
           

<?php include('footer.php');?>

<link rel="stylesheet" href="popup_style.css">
<?php if(!empty($_SESSION['success'])) {  ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Success 
    </h1>
    <p><?php echo $_SESSION['success']; ?></p>
    <p>
      <button class="button button--success" data-for="js_success-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["success"]);  
} ?>
<?php if(!empty($_SESSION['error'])) {  ?>
<div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Error 
    </h1>
    <p><?php echo $_SESSION['error']; ?></p>
    <p>
      <button class="button button--error" data-for="js_error-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["error"]);  } ?>
    <script>
      var addButtonTrigger = function addButtonTrigger(el) {
  el.addEventListener('click', function () {
    var popupEl = document.querySelector('.' + el.dataset.for);
    popupEl.classList.toggle('popup--visible');
  });
};

Array.from(document.querySelectorAll('button[data-for]')).
forEach(addButtonTrigger);
    </script>
