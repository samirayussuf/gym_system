<?php
session_start();
include('../connect.php');
 date_default_timezone_set('Asia/Kolkata');
 $current_date = date('Y-m-d');


 $subscription_id  = $_POST['subscription_id'];
$installment_amount  = $_POST['amount'];
$remaining_amount  = $_POST['remaining_amount'];
$payment_source  = $_POST['payment_source'];
$created_date  = $_POST['payment_date'];
$more_payment_required  = $_POST['more_payment_required'];
$next_payment_date  = $_POST['next_payment_date'];
$remark  = $_POST['remark'];

	 $sql_update = "update `tbl_subscription` set `more_payment_required` = '$more_payment_required' , `next_payment_date` = '$next_payment_date' where id ='$subscription_id'";
    $conn->query($sql_update);

     $sql = "INSERT INTO tbl_deposit (subscription_id, installment_amount,remaining_amount, payment_source , created_date,remark)
   VALUES ('$subscription_id', '$installment_amount','$remaining_amount','$payment_source', '$created_date','$remark')";

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