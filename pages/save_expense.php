<?php
session_start();
include('../connect.php');
 extract($_POST);


/*$sql = "select * from tbl_enquiry where email ='$email' AND mobile='$contact'";
$result = $conn->query($sql);
if(mysqli_num_rows($result) > 0){

while($row = $result->fetch_assoc()) {

    $_SESSION['error']='Email Or Contact No. Already Exist';
    //header("location:../view_enquiry.php?rp=1185");
     ?>
<script type="text/javascript">
window.location="../view_enquiry.php";
</script>
<?php
    }

} else {*/

  $target_dir = "../uploadImage/Expense/";
     $image_file = basename($_FILES["bill_file"]["name"]);
   
     if(!empty($image_file)){
    $target_file = $target_dir . basename($_FILES["bill_file"]["name"]);
     if (move_uploaded_file($_FILES["bill_file"]["tmp_name"], $target_file)) {
    } else {
       //echo "Sorry, there was an error uploading your image file.";
    }
  }

   $sql = "INSERT INTO tbl_expense (item_name, purchase_shop_name, purchase_date,price,bill)
   VALUES ('$item_name', '$purchase_shop_name','$purchase_date', '$price','$target_file')";
 if ($conn->query($sql) === TRUE) {
   
      $_SESSION['success']='Record Successfully Added';
      
     ?>
<script type="text/javascript">
window.location="../view_expense.php";
</script>
<?php
} else {
   
      $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="../view_expense.php";
</script>
<?php
}

//}

?>