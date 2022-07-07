
<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');?>



  <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary"> View Enquiry</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">View Enquiry</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                
                <!-- /# row -->
                 <div class="card">
                            <div class="card-body">
                                <?php if(isset($useroles)){  if(in_array("add_enquiry",$useroles)){ ?> 
                                <a href="#"><button class="btn btn-primary">Add Enquiry</button></a>
                              <?php } } ?>
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Contact No</th>
                                                <th>Gender</th>
                                                <th>Birth Date</th>
                                                <th>Occupation</th>
                                                <th>Last Follow up </th>
                                                <th>Next Follow up </th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php 
                                          include 'connect.php';
                                          $sql = "SELECT * FROM  tbl_enquiry";
                                           $result = $conn->query($sql);

                                           while($row = $result->fetch_assoc()) { ?>
                                            <tr>
                                                <td><?php echo $row['cust_name']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><?php echo $row['mobile']; ?></td>
                                                <td><?php echo $row['gender']; ?></td>
                                                <td><?php echo $row['dob']; ?></td>
                                                <td><?php echo $row['occupation']; ?></td>
                                                 <td><?php echo $row['last_follow_date']; ?></td>
                                                  <td><?php echo $row['follow_date']; ?></td>
                                                  
                                                <td>
  <?php if(isset($useroles)){  if(in_array("edit_enquiry",$useroles)){ ?> 
                                             <button onclick="myFunction()" type="button" class="btn btn-xs btn-primary" ><i class="fa fa-pencil"></i></button>
                                            <?php } } ?>
 <div id="snackbar">for Full sourcecode visit <a href="https://www.instamojo.com/minfospace/">Visit my Online Store</a><br>Thanks !</div>
    <?php if(isset($useroles)){  if(in_array("delete_enquiry",$useroles)){ ?> 
                                               <button onclick="myFunction()" type="button" class="btn btn-xs btn-danger" ><i class="fa fa-trash"></i></button>
                                             <?php } } ?>

                                              <a href="follow_up.php?id=<?=$row['id'];?>"><button type="button" class="btn btn-xs btn-success" ><i class="fa fa-calendar"></i></button></a> 
                                               <!-- <button class="btn btn-xs btn-danger sweet-prompt" id="<?php //echo $row['id'];?>" onclick="showalert(this);"><i class="fa fa-remove" aria-hidden="true"></i></button> -->
                                          
                                                </td>
                                            </tr>
                                          <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
               
                <!-- /# row -->

                <!-- End PAge Content -->
           

<?php include('footer.php');?>

<!-- <script>
             function showalert() {
              var id=$(".sweet-prompt").attr("id");
              alert(id);
     swal({
            title: "You Sure !!",
            text: "To Delete This Record!!",
            type: "input",
            showCancelButton: true,
            closeOnConfirm: false,
            animation: "slide-from-top",
            inputValue:id,
            //inputType:'hidden',
            inputPlaceholder: "Write something"
        },        
        function(inputValue){
          if (inputValue === false) return false;
          $.ajax({
              url: "del_enquiry.php"+id,
              type: "POST",
              success: function(inputValue){
                if (inputValue === "") {
                    swal.showInputError("You need to write something!");
                    return false
                }
                swal("Successfully Deleted");
                setTimeout(function(){// wait for 5 secs(2)
                   location.reload(); // then reload the page.(3)
              }, 1000); 
                }
            });
            
        });
              }
            </script> -->


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
