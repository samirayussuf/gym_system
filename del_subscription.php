<?php
include 'connect.php';


$sql = "DELETE FROM tbl_subscription WHERE id='".$_GET["id"]."'";

$res = $conn->query($sql) ;
?>
<script>
alert("Delete Successfully");
window.location = "view_subscription.php";
</script>

