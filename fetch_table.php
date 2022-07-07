<?php 

 include 'connect.php';	

  echo $event_date = $_POST['event_date'];
   $client_event = $_POST['client_event'];

$exp  = explode( " - ", $event_date);
 $exp_first = $exp[0];
 $exp_sec = $exp[1];


$exp_first = str_replace(",","",$exp_first);
$date = new DateTime($exp_first);
$new_date_format1 = $date->format('Y-m-d');

$exp_sec = str_replace(",","",$exp_sec);
$date = new DateTime($exp_sec);
$new_date_format2 = $date->format('Y-m-d');

//echo $format_exp_first = $exp_first->format('F j, Y');
/* $last_month_f_day = $month_ini->format('F j, Y');*/
//echo  $q="select * from admin where dob = '".$new_date_format."' ";
echo  $q="select * from tbl_customer where dob BETWEEN '".$new_date_format1."' AND '".$new_date_format2."' ";
$res = $conn->query($q);

    
   
    //State option list
  
		
       while($row=mysqli_fetch_array($res)){ 
	  // echo "dfdfh";
	print_r($row);

  ?>
   <tbody>
     <td></td>

   </tbody>>         
    <?php    } 
   
	//echo $a;exit; 

?>



