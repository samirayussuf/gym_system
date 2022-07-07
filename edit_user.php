
<?php include('head.php');?>

<?php include('header.php');?>
<?php include('sidebar.php');?>

 <?php
 include('connect.php');


if(isset($_POST["btn_update"]))
{
    extract($_POST);
   
     $q1="UPDATE `tbl_customer` SET `fname`='$fname',`lname`='$lname',`email`='$email',`address`='$address',`gender`='$gender',`contact`='$contact',`married_status`='$married_status',`age`='$age',`feet`='$feet',`inches`='$inches',`weight`='$weight',`anniversary_date`='$anniversary_date',`dob`='$dob' WHERE `id`='".$_GET["id"]."'";
    //$q2=$conn->query($q1);
    if ($conn->query($q1) === TRUE) {
      $_SESSION['success']=' Record Successfully Updated';
     ?>
<script type="text/javascript">
window.location="view_user.php";
</script>
<?php
} else {
      $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="view_user.php";
</script>
<?php
}
}

?>

<?php
$que="select * from tbl_customer where id='".$_GET["id"]."'";
$query=$conn->query($que);
while($row=mysqli_fetch_array($query))
{
    //print_r($row);
    extract($row);
$fname = $row['fname'];
$lname = $row['lname'];
$email = $row['email'];
$address = $row['address'];
$gender = $row['gender'];
$contact = $row['contact'];
$married_status = $row['married_status'];
$age = $row['age'];
$feet = $row['feet'];
$inches = $row['inches'];
$weight = $row['weight'];
$anniversary_date = $row['anniversary_date'];
$dob = $row['dob'];
}

?> 


   


  <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Edir User</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Edir User</li>
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
                                    <form class="form-horizontal" method="POST" name="userform">
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">First Name</label>
                                                <div class="col-sm-9">
                                                  <input type="text" name="fname" class="form-control" placeholder="First Name" id="event" onkeydown="return alphaOnly(event);" value="<?php echo $fname;?>" required="">
                                                </div>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Last Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text"  name="lname" id="lname" class="form-control" id="event" onkeydown="return alphaOnly(event);" placeholder="Last Name" value="<?php echo $lname;?>" required="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Email</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"  placeholder="Email" value="<?php echo $email;?>" required>
                                                </div>
                                            </div>
                                        </div>
                                       

                                          <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Gender</label>
                                                <div class="col-sm-9">
                                                   <select name="gender" id="gender" class="form-control" required="">
                                                    <option value=" ">--Select Gender--</option>
                                                     <option value="Male" <?php if($gender=="Male"){echo "selected";} ?>>Male</option>
                                                      <option value="Female" <?php if($gender=="Female"){echo "selected";} ?>>Female</option>
                                                   </select>
                                                </div>
                                            </div>
                                        </div>

                                        <script type="text/javascript">
                      function ShowHideDiv1() {
                        var married_status = document.getElementById("married_status");
                        var married_yes = document.getElementById("married_yes");
                        married_yes.style.display = married_status.value == "Married" ? "block" : "none";
                      }
                    </script>

                                           <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Married Status</label>
                                                <div class="col-sm-9">
                                                   <select name="married_status" id="married_status" class="form-control" required onchange = "ShowHideDiv1()">
                                                    <option value=" ">--Select Status--</option>
                                                     <option value="Married" <?php if($married_status=="Married"){echo "selected";} ?>>Married</option>
                                                      <option value="Unmarried" <?php if($married_status=="Unmarried"){echo "selected";} ?>>Unmarried</option>
                                                   </select>
                                                </div>
                                            </div>
                                        </div>

                                        <?php if($married_status == 'Married'){ ?>
                                         <div class="form-group">
                                              <div class="row">
                                                <label class="col-sm-3 control-label">Anniversary Date</label>
                                                <div class="col-sm-9">
                                                  <input type="date" name="anniversary_date" class="form-control" placeholder="Anniversary Date" value="<?php echo $anniversary_date;?>">
                                                </div>
                                              </div>
                                        </div>
                                    <?php } else { ?>
                                         <div class="form-group">
                                            <div id="married_yes" style="display: none">
                                              <div class="row">
                                                <label class="col-sm-3 control-label">Anniversary Date</label>
                                                <div class="col-sm-9">
                                                  <input type="date" name="anniversary_date" class="form-control" placeholder="Anniversary Date">
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                   <?php  } ?>

                                        <div class="form-group">
                                              <div class="row">
                                                <label class="col-sm-3 control-label">Date Of Birth</label>
                                                <div class="col-sm-9">
                                                  <input type="date" name="dob" class="form-control" placeholder="Birth Date" value="<?php echo $dob;?>" >
                                                </div>
                                            </div>
                                        </div>
                                           <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Age</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="age" class="form-control" placeholder="Age" value="<?php echo $age;?>" required="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Contact</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="contact" class="form-control" placeholder="Contact Number" id="tbNumbers" minlength="10" maxlength="10" onkeypress="javascript:return isNumber(event)" value="<?php echo $contact;?>" required="">
                                                </div>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Address</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" rows="4" name="address" placeholder="Address" style="height: 120px;"><?php echo $address;?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                      
                                       
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Height</label>
                                                <div class="col-sm-5">
                                                    <input type="text" name="feet" class="form-control" placeholder="Feet" value="<?php echo $feet;?>"  required="">
                                                </div>

                                                 <div class="col-sm-4">
                                                    <input type="text" name="inches" class="form-control" placeholder="Inches" value="<?php echo $inches;?>"> 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Weight</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="weight" class="form-control" placeholder="Weight"  value="<?php echo $weight;?>"required="">
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