<?php
session_start();
include('../connect.php');
 extract($_POST);
 date_default_timezone_set('Asia/Kolkata');
 $current_date = date('Y-m-d');
/*if(isset($_POST["btn_save"]))
{*/
   
   echo $sql="UPDATE `tbl_enquiry` SET `package_offer`='$package_offer',`remark`='$remark',`package_amount`='$package_amount',`follow_date`='$follow_date',last_follow_date ='$current_date' WHERE `id`='".$_GET["id"]."'";exit;
 if ($conn->query($sql) === TRUE) {
   
      $_SESSION['success']=' Record Successfully updated';
       //echo 'sss';exit;
     ?>
<script type="text/javascript">
window.location="../view_enquiry.php";
</script>
<?php
} else {
    //echo 'saaa';exit;
      $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="../view_enquiry.php";
</script>
<?php
}


//$q = $conn->query($sql);

 

//}
?>