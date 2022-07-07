<?php
session_start();
include('../connect.php');
 date_default_timezone_set('Asia/Kolkata');
 $current_date = date('Y-m-d');



$client_id  =$_POST['client_id'];
$membership  =$_POST['membership'];
$exp_membership = explode(',', $membership);
$exp_membership_id = $exp_membership['1'];


$membership_cost  =$_POST['membership_cost'];
$amount  = $_POST['amount'];
$discount  = $_POST['discount'];
$register_date  = $_POST['register_date'];
$remark  = $_POST['remark'];
 $start_date  = $_POST['start_date'];

           $sql1 = "SELECT * FROM tbl_membership where id='$exp_membership_id'";
           $result1 = $conn->query($sql1);
           $row1 = mysqli_fetch_array($result1);
            $membership_duration = $row1['duration'];

 $expiry_date=date( "Y-m-d", strtotime( "$start_date +$membership_duration" ) );
//echo $expiry_date=date( "Y-m-d", strtotime( "$start_date" ) );


    $sql = "INSERT INTO  tbl_subscription (user_id, membership_id, membership_cost ,  amount,registration_date, start_date, remark, discount, expiry_date)
   VALUES ('$client_id', '$exp_membership_id','$membership_cost', '$amount','$register_date','$start_date','$remark','$discount','$expiry_date')";

 if ($conn->query($sql) === TRUE) {
   
      $_SESSION['success']='Record Successfully Added';
      
     ?>
<script type="text/javascript">
window.location="../view_subscription.php";
</script>
<?php
} else {
   
      $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="../view_subscription.php";
</script>
<?php
}

//}

?>