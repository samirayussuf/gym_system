
<?php include('head.php');?>

<?php include('header.php');?>
<?php include('sidebar.php');?>

 <?php
 include('connect.php');
 date_default_timezone_set('Asia/Kolkata');
 $current_date = date('Y-m-d');

if(isset($_POST["btn_update"]))
{
    extract($_POST);
    $start_date  =$_POST['start_date'];
     $membership  =$_POST['membership'];
   $exp_membership = explode(',' , $membership);
   $exp_membership_id = $exp_membership['1'];

   $sql1 = "SELECT * FROM tbl_membership where id='$exp_membership_id'";
           $result1 = $conn->query($sql1);
           $row1 = mysqli_fetch_array($result1);
            $membership_duration = $row1['duration'];

   $expiry_date=date( "Y-m-d", strtotime( "$start_date +$membership_duration" ) );

    echo $q1="UPDATE `tbl_subscription` SET `user_id`='$client_id',`membership_id`='$exp_membership_id',`membership_cost`='$membership_cost',`amount`='$amount',`registration_date`='$register_date',`start_date`='$start_date',`remark`='$remark',`discount`='$discount' , `expiry_date`='$expiry_date' WHERE `id`='".$_GET["id"]."'";
    $q2=$conn->query($q1);
    ?>
    <script>
 window.location = "view_subscription.php";
    </script>
    <?php
}

?>

<?php
$que="select * from tbl_subscription where id='".$_GET["id"]."'";
$query=$conn->query($que);
while($row=mysqli_fetch_array($query))
{
    //print_r($row);
    extract($row);
$user_id = $row['user_id'];
$membership_id = $row['membership_id'];
$membership_cost = $row['membership_cost'];
$amount = $row['amount'];
$registration_date = $row['registration_date'];
$start_date = $row['start_date'];
$remark = $row['remark'];
$discount = $row['discount'];
$expiry_date = $row['expiry_date'];
}

?> 


   


  <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Edit Membership</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Edi Membership</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                
                <!-- /# row -->
                <div class="row">
                    <div class="col-lg-8" style="    margin-left: 10%;">
                        <div class="card">
                            <div class="card-title">
                               
                            </div>
                            <div class="card-body">
                                <div class="input-states">
                                     <form class="form-horizontal" method="POST" name="userform">
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Client</label>
                                                <div class="col-sm-9">
                                                 <select name="client_id" id="client_id" class="form-control" required>
                                                  <option value=" ">--Select Client--</option>
                                                  <?php 
                                                  $sql="select * from tbl_customer";
                                                  $res = $conn->query($sql);

                                                  while($row = mysqli_fetch_array($res)){
                                                  ?>
                                                    
                                                     <option value="<?php echo $row['id'];?>" <?php if($user_id == $row['id']){ echo "selected";}?>><?php echo $row['fname'];?> <?php echo $row['lname'];?></option>
                                                     <?php } ?>
                                                   </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Membership</label>
                                                <div class="col-sm-9">
                                                    <select name="membership" id="membership" class="form-control" required="">
                                                       <option value=" ">--Select Membership--</option>
                                                  <?php 
                                                  $sql1="select * from  tbl_membership";
                                                  $res1 = $conn->query($sql1);
                                                  while($row1 = mysqli_fetch_array($res1)){
                                                  ?>
                                                   
                                                     <option value="<?php echo $row1['price'];?>,<?php echo $row1['id'];?>" <?php if($membership_id == $row1['id']){ echo "selected";}?>><?php echo $row1['name'];?></option>
                                                    <?php } ?> 
                                                   </select>
                                                </div>
                                            </div>
                                        </div>

                                          <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Membership Cost</label>
                                                <div class="col-sm-9">
                                                    <input type="number" name="membership_cost" id="membership_cost" value="<?php echo $membership_cost;?>" placeholder="Membership Cost"  class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Amount To Be Paid</label>
                                                <div class="col-sm-9">
                                                    <input type="number" name="amount" id="amount" placeholder="Amount to be Paid" value="<?php echo $amount;?>"  class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                          <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Discount</label>
                                                <div class="col-sm-9">
                                                    <input type="number" name="discount" id="discount" placeholder="Discount" value="<?php echo $discount;?>" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Registration Date</label>
                                                <div class="col-sm-9">
                                                    <input type="date" name="register_date" id="register_date" placeholder="Registration Date"  class="form-control" value="<?php echo $current_date;?>">
                                                </div>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Customer is going to come from</label>
                                                <div class="col-sm-9">
                                                    <input type="date" name="start_date" id="start_date" placeholder="Start Date" value="<?php echo $start_date;?>" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Remark</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" rows="4" name="remark" placeholder="Remark" style="height: 120px;"><?php echo $remark;?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        

                                         

                                        <button type="submit" name="btn_update" class="btn btn-primary btn-flat m-b-30 m-t-30">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
                
               
                <!-- /# row -->

                <!-- End PAge Content -->
    

<?php include('footer.php');?>