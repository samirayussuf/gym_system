<?php include('head.php');?>
<?php include('header.php');?>

<?php include('sidebar.php');?>   
<?php //echo  $_SESSION["email"];
include('connect.php');
 date_default_timezone_set('Asia/Kolkata');
 $current_date = date('Y-m-d');


    if(isset($_POST["btn_submit"]))
                            {
                              extract($_POST);
                              $sql="insert into tbl_group(name,description)values('$assign_name','$description')";
                              $query=$conn->query($sql);
                            $last_id =  mysqli_insert_id($conn);
                            $id=$last_id;
                            $checkItem = $_POST["checkItem"];
                            //print_r($_POST);
                             $a = count($checkItem);  
                            for($i=0;$i<$a;$i++){

                              $sql="insert into tbl_permission_role(permission_id,role_id)values('$checkItem[$i]','$id')";
                              $query=$conn->query($sql);
                           
                                   }
                            }
//echo "sdg";exit;
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

        
              <img src='pages/assign_role.jpg' />
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
            <?php include('footer.php');?>