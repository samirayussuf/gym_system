
<?php include('head.php');?>

<?php include('header.php');?>
<?php include('sidebar.php');?>

 <?php
 include('connect.php');

date_default_timezone_set('Asia/Kolkata');
 $current_date = date('Y-m-d');
?>

<style type="text/css">
  [type="radio"]:checked,
[type="radio"]:not(:checked) {
    position: absolute;
    left: -9999px;
}
[type="radio"]:checked + label,
[type="radio"]:not(:checked) + label
{
    position: relative;
    padding-left: 28px;
    cursor: pointer;
    line-height: 20px;
    display: inline-block;
    color: #666;
}
[type="radio"]:checked + label:before,
[type="radio"]:not(:checked) + label:before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    width: 18px;
    height: 18px;
    border: 1px solid #ddd;
    border-radius: 100%;
    background: #fff;
}
[type="radio"]:checked + label:after,
[type="radio"]:not(:checked) + label:after {
    content: '';
    width: 12px;
    height: 12px;
    background: #F87DA9;
    position: absolute;
    top: 4px;
    left: 4px;
    border-radius: 100%;
    -webkit-transition: all 0.2s ease;
    transition: all 0.2s ease;
}
[type="radio"]:not(:checked) + label:after {
    opacity: 0;
    -webkit-transform: scale(0);
    transform: scale(0);
}
[type="radio"]:checked + label:after {
    opacity: 1;
    -webkit-transform: scale(1);
    transform: scale(1);
}
</style>
   
<?php 
if(isset($_POST["btn_save"]))
{
    extract($_POST);  
   
       echo $sql="UPDATE `tbl_enquiry` SET `package_offer`='$package_offer',`remark`='$remark',`package_amount`='$package_amount',`follow_date`='$follow_date',`last_follow_date` ='$current_date' WHERE `id`='".$_GET["id"]."'";
 if ($conn->query($sql) === TRUE) {
   
      $_SESSION['success']=' Record Successfully updated';
       //echo 'sss';exit;
     ?>
<script type="text/javascript">
window.location="view_enquiry.php";
</script>
<?php
} else {
    //echo 'saaa';exit;
      $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="view_enquiry.php";
</script>
<?php
}
} ?>
  <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Add Payment</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Add Payment</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                
                <!-- /# row -->
                <div class="row">
                    <div class="col-lg-8" style="margin-left: 10%;">
                        <div class="card">
                            <div class="card-title">
                               
                            </div>
                            <div class="card-body">
                                <div class="input-states">
                                    <form class="form-horizontal" method="POST" name="userform" >

                                    <?php 
                                  $sql = "select * from tbl_enquiry where id = '".$_GET['id']."'";
                                  $sql_res = $conn->query($sql);
                                  $row = mysqli_fetch_array($sql_res);
                                  $package_offer = $row['package_offer'];
                                      ?>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Customer Name</label>
                                                <div class="col-sm-9">
                                                  <input type="text" name="cust_name" class="form-control" value="<?php echo $row['cust_name'];?>" readonly>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Contact</label>
                                                <div class="col-sm-9">
                                                  <input type="text" name="mobile" class="form-control" value="<?php echo $row['mobile'];?>"readonly>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Package offered</label>
                                                <div class="col-sm-9">
                                                 <p>
                                                <input type="radio" id="test32" name="package_offer" checked value="Monthly" <?php if($package_offer=="Monthly") {echo "checked"; }?>>
                                                <label for="test32">Monthly</label>
                                                
                                                  <input type="radio" id="test33" name="package_offer" value="Quarterly" <?php if($package_offer=="Quarterly") {echo "checked"; }?>>
                                                  <label for="test33">Quarterly</label>

                                                   <input type="radio" id="test34" name="package_offer" value="Half Yearly" <?php if($package_offer=="Half Yearly") {echo "checked"; }?>>
                                                  <label for="test34">Half Yearly</label>

                                                   <input type="radio" id="test35" name="package_offer" value="Yearly" <?php if($package_offer=="Yearly") {echo "checked"; }?>>
                                                  <label for="test35">Yearly</label>

                                                   <input type="radio" id="test36" name="package_offer" value="Personal Training" <?php if($package_offer=="Personal Training") {echo "checked"; }?>>
                                                  <label for="test36">Personal Training</label>

                                                   <input type="radio" id="test37" name="package_offer" value="Any Other" <?php if($package_offer=="Any Other") {echo "checked"; }?>>
                                                  <label for="test37">Any Other</label>
                                                  </p>
                                                </div>
                                            </div>
                                        </div>

                                       
                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Remark</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" rows="4" name="remark" placeholder="Remark" style="height: 120px;"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Package Amount</label>
                                                <div class="col-sm-9">
                                                 <p>
                                                   <input type="number" name="package_amount" class="form-control"  placeholder="Package Amount" >
                                                 </p>
                                                 </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Name Of the Counsellor</label>
                                                <div class="col-sm-9">
                                                 <p>
                                                   <input type="text" name="counsellor_name" class="form-control"  placeholder="Counsellor name">
                                                 </p>
                                                 </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Next Follow up on</label>
                                                <div class="col-sm-9">
                                                 <p>
                                                   <input type="date" name="follow_date" class="form-control"  placeholder="Follow Date" required="">
                                                 </p>
                                                 </div>
                                            </div>
                                        </div>

                                        <button type="submit" name="btn_save" class="btn btn-primary btn-flat m-b-30 m-t-30">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
                
               
                <!-- /# row -->

                <!-- End PAge Content -->
    

<?php include('footer.php');?>

<script type="text/javascript">
  $("form").on("keyup",'input[name^="amount"]', function (event) 
   {
         var amount_paid=$('#amount_paid').val();
       
         var amount=$('#amount').val();
       
           if(parseInt(amount)>parseInt(amount_paid))
           {
             $('#remaining_amount').val(0);
             $('#remaining_amount').val(0);
             alert("Your Amount exceeds total Amount");
           
           }
           else
           {
             var remain=parseInt(amount_paid)-parseInt(amount);
             $('#remaining_amount').val(remain);
          
           }
      
   });
</script>