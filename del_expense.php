<?php
include 'connect.php';


$sql = "DELETE FROM tbl_expense WHERE id='".$_GET["id"]."'";

$res = $conn->query($sql) ;
?>
<script>
alert("Delete Successfully");
window.location = "view_expense.php";
</script>

