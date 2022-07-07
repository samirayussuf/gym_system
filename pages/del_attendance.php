<?php
session_start();
include('../connect.php');

$user_id = $_GET['id'];


 $sql = "DELETE FROM tbl_attendance WHERE user_id='".$_GET["id"]."'";
$res = $conn->query($sql) ;


 $attend = "select * from tbl_customer where id = '$user_id'";
  $result_attend = $conn->query($attend);
  $row_attend = mysqli_fetch_array($result_attend);
  $cnt = $row_attend['attendance_count'];
 $attend_count = $cnt  - 1;
      $sql1 = "update tbl_customer set attendance_count ='$attend_count' where id='$user_id'";
     $conn->query($sql1) ;
?>
<script>
//alert("Delete Successfully");
window.location = "../attendance.php";
</script>


 