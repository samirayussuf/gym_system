
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
                                    <form class="form-horizontal" method="POST" name="userform" action="pages/save_payment.php">

                                    <?php 
                                  $sql = "select * from tbl_subscription where id = '".$_GET['id']."'";
                                  $sql_res = $conn->query($sql);
                                  $row = mysqli_fetch_array($sql_res);

                                  $sql1 = "SELECT * FROM tbl_customer where id = '".$row['user_id']."'";
                                  $result1 = $conn->query($sql1);
                                  $row_client = mysqli_fetch_array($result1);

                                   $sql_member = "SELECT * FROM  tbl_membership";
                                   $result_member = $conn->query($sql_member);
                                   $row_member = mysqli_fetch_array($result_member);

                                      ?>

                                      <input type="hidden" name="amount_paid" id="amount_paid" value="<?php echo $row['amount']; ?>">

                                       <input type="hidden" name="subscription_id" id="subscription_id" value="<?php echo $row['id']; ?>">

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Client Name</label>
                                                <div class="col-sm-9">
                                                  <input type="text" name="client_name" class="form-control" value="<?php echo $row_client['fname'];?> <?php echo $row_client['lname'];?>"  readonly>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Membership Name</label>
                                                <div class="col-sm-9">
                                                  <input type="text" name="client_name" class="form-control" value="<?php echo $row_member['name'];?>"readonly>
                                                </div>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Amount</label>
                                                <div class="col-sm-9">
                                                  <input type="text" name="amount" id="amount" class="form-control" placeholder = "Enter Amount">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                          <div class="row">
                                           <label class="col-sm-3 control-label">Remaining Amount</label>
                                                <div class="col-sm-9">
                                                  <input type="text" name="remaining_amount" id="remaining_amount"  class="form-control" readonly="">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Payment Source</label>
                                                <div class="col-sm-9">
                                                 <p>
                                                  <input type="radio" id="test1" name="payment_source"  value="Cash" >
                                                  <label for="test1">Cash</label>
                                                
                                                  <input type="radio" id="test2" name="payment_source" value="Credit Card" >
                                                  <label for="test2">Credit Card</label>

                                                   <input type="radio" id="test4" name="payment_source"  value="Debit Card" >
                                                  <label for="test4">Debit Card</label>
                                                
                                                  <input type="radio" id="test5" name="payment_source" value="Net Banking" >
                                                  <label for="test5">Net Banking</label>  
                                                 
                                                </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                              <label class="col-sm-3 control-label">Payment Date</label>
                                                <div class="col-sm-9">
                                                  <input type="text" value="<?php echo $current_date;?>" name="payment_date" class="form-control" >
                                                </div>
                                            </div>
                                        </div>

                   <script type="text/javascript">
                      function yesnoCheck() {
                          if (document.getElementById('test7').checked) {
                              document.getElementById('ifYes').style.display = 'block';
                          }
                          else document.getElementById('ifYes').style.display = 'none';

                      }
                 </script>


                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">More Payment Required</label>
                                                <div class="col-sm-9">
                                                 <p>
                                                  <input type="radio"  id="test6" name="more_payment_required" value="No" onclick="javascript:yesnoCheck();">
                                                  <label for="test6">NO</label>
                                                
                                                  <input type="radio" onclick="javascript:yesnoCheck();" name="more_payment_required" id="test7" value="Yes" >
                                                  <label for="test7">Yes</label>
                                                </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group" id="ifYes" style="display:none">
                                            <div class="row">
                                              <label class="col-sm-3 control-label">Next Payment Date</label>
                                                <div class="col-sm-9">
                                                  <input type="date" name="next_payment_date" class="form-control">
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