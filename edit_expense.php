
<?php include('head.php');?>

<?php include('header.php');?>
<?php include('sidebar.php');?>

 <?php
 include('connect.php');


if(isset($_POST["btn_update"]))
{
    extract($_POST);

    $target_dir = "../uploadImage/Expense/";
    if($_FILES["bill_file"]["tmp_name"]!=''){
    $image = $target_dir . basename($_FILES["bill_file"]["name"]);
    
     if (move_uploaded_file($_FILES["bill_file"]["tmp_name"], $image)) {
        
       @unlink("../uploadImage/".$_POST['old_file']);
        
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
    
    }
    else {
         $billfile =$_POST['old_file'];
    }

   
     $q1="UPDATE `tbl_expense` SET `item_name`='$item_name',`purchase_shop_name`='$purchase_shop_name',`purchase_date`='$purchase_date',`price`='$price',`bill`='$billfile' WHERE `id`='".$_GET["id"]."'";
     if ($conn->query($q1) === TRUE) {
   
      $_SESSION['success']='Record Successfully Updated';
      
     ?>
<script type="text/javascript">
window.location="view_expense.php";
</script>
<?php
} else {
   
      $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="view_expense.php";
</script>
<?php
}
}

?>

<?php
$que="select * from tbl_expense where id='".$_GET["id"]."'";
$query=$conn->query($que);
while($row=mysqli_fetch_array($query))
{
    //print_r($row);
    extract($row);
$item_name = $row['item_name'];
$purchase_shop_name = $row['purchase_shop_name'];
$purchase_date = $row['purchase_date'];
$price = $row['price'];
$bill = $row['bill'];

}

?> 


   


  <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Edit Membership</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Edi Membership</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                
                <!-- /# row -->
                <div class="row">
                    <div class="col-lg-8" style="    margin-left: 10%;">
                        <div class="card">
                            <div class="card-title">
                               
                            </div>
                            <div class="card-body">
                                <div class="input-states">
                                     <form class="form-horizontal" method="POST" name="userform" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Item Name</label>
                                                <div class="col-sm-9">
                                                  <input type="text" name="item_name" class="form-control" placeholder="Item Name" value="<?php echo $item_name;?>"  required="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Purchase From</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="purchase_shop_name" placeholder="Purchase Shop Name"  value="<?php echo $purchase_shop_name;?>" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>

                                           <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Purchase Date</label>
                                                <div class="col-sm-9">
                                                    <input type="date" name="purchase_date" placeholder="Purchase Date"  value="<?php echo $purchase_date;?>" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Purchase Date</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="price" placeholder="Price"  class="form-control" value="<?php echo $price;?>" required>
                                                </div>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Bill</label>
                                                <div class="col-sm-9">
                                                <input type="text" class="form-control" value="<?=$bill?>" name="old_file">
                                                    <input type="file" name="bill_file" class="form-control" >
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" name="btn_update" class="btn btn-primary btn-flat m-b-30 m-t-30">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
                
               
                <!-- /# row -->

                <!-- End PAge Content -->
    

<?php include('footer.php');?>
