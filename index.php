<?php include('head.php');?>
<?php include('header.php');?>

<?php include('sidebar.php');?>   
<?php //echo  $_SESSION["email"];
 date_default_timezone_set('Asia/Kolkata');
 $current_date = date('Y-m-d');

 $sql_currency = "select * from manage_website"; 
             $result_currency = $conn->query($sql_currency);
             $row_currency = mysqli_fetch_array($result_currency);
?>    
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dashboard</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                
<div class="row">
                    <div class="col-md-4">
                        <div class="card bg-primary p-20">
                            <div class="media widget-ten">
                                <div class="media-left meida media-middle">
                                    <span><i class="ti-bag f-s-40"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <?php 
                                    include('connect.php');
                                    $sql = "select sum(installment_amount) as amount from tbl_deposit";
                                    $res = $conn->query($sql);
                                    while($rows=mysqli_fetch_array($res)){
                                         $amt = $rows['amount'];
                                    }
                                    ?>
                                    <h2 class="color-white"><?php echo $row_currency['currency_symbol'];?> <?php echo $amt;?></h2>
                                    <p class="m-b-0">Total Earnings</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-pink p-20">
                            <div class="media widget-ten">
                                <div class="media-left meida media-middle">
                                    <span><i class="ti-comment f-s-40"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <?php 
                                   // include('connect.php');
                      $month_num = date("m");
                      $sql1 = "SELECT sum(installment_amount) as amount FROM `tbl_deposit` WHERE MONTH(created_date) = $month_num";
                      $res1 = $conn->query($sql1);
                        $num_rows = mysqli_num_rows($res1);
                       while($rows1=mysqli_fetch_array($res1)){
                                         $month_amt = $rows1['amount'];
                                    }
                                    ?>
                                    <h2 class="color-white"><?php echo $row_currency['currency_symbol'];?> <?php echo $month_amt;?></h2>
                                    <p class="m-b-0">Monthly Earnings</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-success p-20">
                            <div class="media widget-ten">
                                <div class="media-left meida media-middle">
                                    <span><i class="ti-vector f-s-40"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                     <?php 
                      $week = date("w");
                       $year = date("Y");

$dt_min = new DateTime("last saturday"); // Edit
$dt_min->modify('+1 day'); // Edit
$dt_max = clone($dt_min);
$dt_max->modify('+6 days');

 $a =  $dt_min->format('Y-m-d').' , '.$dt_max->format('Y-m-d');
$exp = explode(', ', $a);
 $w_start = $dt_min->format($exp[0]);
$w_end = $dt_min->format($exp[1]);

 $sql1 = "SELECT sum(installment_amount) as week_amount FROM `tbl_deposit` WHERE created_date BETWEEN '".$w_start."' AND '$w_end' ";
 $res1 = $conn->query($sql1);
    $num_rows_week = mysqli_num_rows($res1);
while($rows1=mysqli_fetch_array($res1)){
                                         $week_amt = $rows1['week_amount'];
                                    }

// print_r($rows1);
                                    ?>
                                    <h2 class="color-white"><?php echo $row_currency['currency_symbol'];?> <?php echo $week_amt; ?></h2>
                                    <p class="m-b-0">Weekly Earnings</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-warning p-20">
                            <div class="media widget-ten">
                                <div class="media-left meida media-middle">
                                     <?php 
                                    //include('connect.php');
                                    $sql_avg = "select avg(installment_amount) as avg_amount from tbl_deposit where MONTH(created_date) = $month_num";
                                    $res_avg = $conn->query($sql_avg);
                                    while($rows_avg=mysqli_fetch_array($res_avg)){
                                         $avg_amt = $rows_avg['avg_amount'];
                                         $avg =  bcadd(0,$avg_amt,2);
                                      //result=10.11
                                    }
                                    ?>
                                    <span><i class="ti-location-pin f-s-40"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2 class="color-white"><?php echo $row_currency['currency_symbol'];?> <?php echo $avg;?></h2>
                                    <p class="m-b-0">Average Monthly</p>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="col-md-4">
                        <div class="card bg-danger p-20">
                            <div class="media widget-ten">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-users f-s-40"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                     <?php 
                                    //include('connect.php');
                                    $sql_cust = "select * from tbl_customer";
                                    $res_cust = $conn->query($sql_cust);
                                    $num_rows_cust = mysqli_num_rows($res_cust);
                                   
                                    ?>
                                    <h2 class="color-white"><?php echo $num_rows_cust ; ?></h2>
                                    <p class="m-b-0">Total Customers</p>
                                </div>
                            </div>
                        </div>
                    </div>
                   <div class="col-md-4">
                         <div class="card bg-primary p-20">
                            <div class="media widget-ten">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-user f-s-40"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                     <?php 
                                    //include('connect.php');
                                    $sql_cust1 = "select * from tbl_customer where MONTH(created_on) = $month_num";
                                    $res_cust1 = $conn->query($sql_cust1);
                                    $num_rows_cust1 = mysqli_num_rows($res_cust1);
                                   
                                    ?>
                                    <h2 class="color-white"><?php echo $num_rows_cust1;?></h2>
                                    <p class="m-b-0">Customers This Month</p>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
                
        
                <!-- /# row -->
                <div class="row">
                     <div class="col-lg-6">
                        <div class="card">
                            <div class="card-title">
                                <h3>SUBSCRIPTIONS EXPIRING IN NEXT 45 DAYS </h3>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover ">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Client Name</th>
                                                <th>Expiring On</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $date1=date_create("$current_date");
                                      date_add($date1,date_interval_create_from_date_string("45 days"));
                                         $days = date_format($date1,"Y-m-d");
                                        $q = "select * from tbl_subscription where expiry_date >='".$current_date."' AND expiry_date <='".$days."'";
                                            $q1 = $conn->query($q);
                                            $i=1;
                                         while($r=mysqli_fetch_array($q1)){
                                         $exp_date = $r['expiry_date'];
                                $sql_cust2 = "select * from tbl_customer where id = '".$r['user_id']."'";
                                $res_cust2 = $conn->query($sql_cust2);
                                $rows_cust2 = mysqli_fetch_array($res_cust2);
                                      ?>
                                            <tr>
                                                <th scope="row"><?php echo $i;?></th>
                                                <td><?php echo $rows_cust2['fname']?>&nbsp;<?php echo $rows_cust2['lname']?></td>
                                                <td><?php echo $exp_date ;?></td>
                                                <td></td>
                                            </tr>
                                        <?php $i++; } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
                
                 <div class="col-lg-6">
                        <div class="card">
                            <div class="card-title">
                                <h3>DUE PAYMENTS</h3>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover ">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Client Name</th>
                                                <th>Due Amount</th>
                                                <th>Due Date</th>
                                            </tr>
                                        </thead>
                                        <tbody> <?php 
                                            
                                         $query_due = "select * from tbl_subscription where more_payment_required ='Yes' AND next_payment_date <='".$current_date."'";
                                            $query_due1 = $conn->query($query_due);
                                            $i=1;
                                             $sum = 0;
                                         while($r1=mysqli_fetch_array($query_due1)){

                                        $sql_payment = "SELECT sum(installment_amount) as ins_amount FROM tbl_deposit where subscription_id = '".$r1['id']."'";
                                           $result_payment = $conn->query($sql_payment);
                                           $row_payment = mysqli_fetch_array($result_payment);

                                            $ins_amt = $row_payment['ins_amount'];
                                           $remain_amt  = ($r1['amount']) - ($ins_amt);

                                         //$exp_date = $r['expiry_date'];
                            $sql_cust3 = "select * from tbl_customer where id = '".$r1['user_id']."'";
                            $res_cust3 = $conn->query($sql_cust3);
                            $rows_cust3 = mysqli_fetch_array($res_cust3);
                                      ?>
                                            <tr>
                                                <th scope="row"><?php echo $i;?></th>
                                                <td><?php echo $rows_cust3['fname']?>&nbsp;<?php echo $rows_cust3['lname']?></td>
                                                <td><?php echo $remain_amt ;?></td>
                                                <td><?php echo $r1['next_payment_date'] ;?></td>
                                            </tr>
                                        <?php $i++; } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
                </div>

                <div class="card">
                            <div class="card-body">
                                <center><h3>RECENT CUSTOMERS</h3></center>
                                <div class="table-responsive m-t-40">
                                    <table  class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Client Name</th>
                                                <th>Email</th>
                                                <th>Contact</th>
                                                <th>Created On</th>
                                                <th>Gender</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 

                            $sql_cust4 = "select * from tbl_customer ORDER BY id DESC LIMIT 10 ";
                            $res_cust4 = $conn->query($sql_cust4);
                            $i=1;
                            while($rows_cust4 = mysqli_fetch_array($res_cust4)){
                           ?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $rows_cust4['fname'];?>&nbsp;<?php echo $rows_cust4['lname'];?></td>
                                                <td><?php echo $rows_cust4['email'];?></td>
                                                <td><?php echo $rows_cust4['contact'];?></td>
                                                <td><?php echo $rows_cust4['created_on'];?></td>
                                                <td><?php echo $rows_cust4['gender'];?></td>
                                            </tr>
                                        <?php $i++; }  ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <center><h3>Today's Follow Up</h3></center>
                                <div class="table-responsive m-t-40">
                                    <table  class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Customer Name</th>
                                                <th>Email</th>
                                                <th>Contact</th>
                                                <th>Enquiry Date</th>
                                                <th>Follow On</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 

                        $sql_follow = "select * from tbl_enquiry where follow_date = '$current_date'";
                        $res_follow = $conn->query($sql_follow);
                        $i=1;
                        while($rows_follow = mysqli_fetch_array($res_follow)){
                           ?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $rows_follow['cust_name'];?></td>
                                                <td><?php echo $rows_follow['email'];?></td>
                                                <td><?php echo $rows_follow['mobile'];?></td>
                                                <td><?php echo $rows_follow['enquiry_date'];?></td>
                                                <td><?php echo $rows_follow['follow_date'];?></td>
                                            </tr>
                                        <?php $i++; }  ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
            <?php include('footer.php');?>