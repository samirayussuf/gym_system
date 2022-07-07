<?php
include 'connect.php';


$sql = "DELETE FROM admin WHERE id='".$_GET["id"]."'";

$res = $conn->query($sql) ;
?>
<script>
alert("Delete Successfully");
window.location = "view_person.php";
</script>

