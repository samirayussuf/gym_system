
<?php include('head.php');?>
<style type="text/css">
  [type="radio"]:checked,
[type="radio"]:not(:checked) {
    position: absolute;
    left: -9999px;
}
[type="radio"]:checked + label,
[type="radio"]:not(:checked) + label
{
    position: relative;
    padding-left: 28px;
    cursor: pointer;
    line-height: 20px;
    display: inline-block;
    color: #666;
}
[type="radio"]:checked + label:before,
[type="radio"]:not(:checked) + label:before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    width: 18px;
    height: 18px;
    border: 1px solid #ddd;
    border-radius: 100%;
    background: #fff;
}
[type="radio"]:checked + label:after,
[type="radio"]:not(:checked) + label:after {
    content: '';
    width: 12px;
    height: 12px;
    background: #F87DA9;
    position: absolute;
    top: 4px;
    left: 4px;
    border-radius: 100%;
    -webkit-transition: all 0.2s ease;
    transition: all 0.2s ease;
}
[type="radio"]:not(:checked) + label:after {
    opacity: 0;
    -webkit-transform: scale(0);
    transform: scale(0);
}
[type="radio"]:checked + label:after {
    opacity: 1;
    -webkit-transform: scale(1);
    transform: scale(1);
}
</style>
<?php include('header.php');?>
<?php include('sidebar.php');?>

 <?php
 include('connect.php');
 date_default_timezone_set('Asia/Kolkata');
 $current_date = date('Y-m-d');



?>


   


  <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Add Enquiry</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Add Enquiry</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                
                <!-- /# row -->
                <div class="row">
                    <div class="col-lg-10" style="margin-left: 10%;">
                        <div class="card">
                            <div class="card-title">
                               
                            </div>
                            <div class="card-body">
                                <div class="input-states">
                                    <form class="form-horizontal" action="pages/save_enquiry.php" method="POST" name="userform">
                                        <div class="form-group">
                                            <div class="row">
                                              <label class="col-sm-3 control-label">Enquiry Date</label>
                                                <div class="col-sm-9">
                                                  <input type="text" value="<?php echo $current_date;?>" name="enquiry_date" class="form-control" readonly>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Customer Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="customer_name" placeholder="Customer Name"  class="form-control"  required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Email</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"  placeholder="Email" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Address</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" rows="4" name="address" placeholder="Address" style="height: 120px;" required></textarea>
                                                </div>
                                            </div>
                                        </div>

                                          <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Contact</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="contact" class="form-control" placeholder="Contact Number" id="tbNumbers" minlength="10" maxlength="10" onkeypress="javascript:return isNumber(event)" required="">
                                                </div>
                                            </div>
                                        </div>
                                        

                                         <div class="form-group">
                                              <div class="row">
                                                <label class="col-sm-3 control-label">Date Of Birth</label>
                                                <div class="col-sm-9">
                                                  <input type="date" name="dob" class="form-control" placeholder="Birth Date" required="">
                                                </div>
                                            </div>
                                        </div>
                                           <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Age</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="age" class="form-control" placeholder="Age" required="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Gender</label>
                                                <div class="col-sm-9">
                                                   <select name="gender" id="gender" class="form-control" required>
                                                    <option value=" ">--Select Gender--</option>
                                                     <option value="Male">Male</option>
                                                      <option value="Female">Female</option>
                                                   </select>
                                                </div>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Height</label>
                                                <div class="col-sm-5">
                                                    <input type="number" name="feet" class="form-control" placeholder="Feet" >
                                                </div>

                                                 <div class="col-sm-4">
                                                    <input type="number" name="inches" class="form-control" placeholder="Inches">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Weight</label>
                                                <div class="col-sm-9">
                                                    <input type="number" name="weight" class="form-control" placeholder="Weight" required="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Occupation</label>
                                                <div class="col-sm-9">
                                                 <p>
                                                  <input type="radio" id="test1" name="occupation"  value="Professional" checked>
                                                  <label for="test1">Professional</label>
                                                
                                                  <input type="radio" id="test2" name="occupation" value="Business" >
                                                  <label for="test2">Business</label>
                                                
                                                  <input type="radio" id="test3" name="occupation" value="Service" >
                                                  <label for="test3">Service</label>

                                                   <input type="radio" id="test4" name="occupation"  value="Homemaker" >
                                                  <label for="test4">Homemaker</label>
                                                
                                                  <input type="radio" id="test5" name="occupation" value="Student" >
                                                  <label for="test5">Student</label>
                                                
                                                  <input type="radio" id="test6" name="occupation" value="Other" >
                                                  <label for="test6">Other</label>
                                                </p>
                                                </div>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">How did you get to know about us?</label>
                                                <div class="col-sm-9">
                                                 <p>
                                                    <input type="radio" id="test7" name="reference" value="News paper" checked>
                                                    <label for="test7">News paper</label>
                                                  
                                                    <input type="radio" id="test8" name="reference" value="Hoarding">
                                                    <label for="test8">Hoarding</label>
                                                  
                                                    <input type="radio" id="test9" name="reference" value="Existing Member">
                                                    <label for="test9">Existing Member</label>

                                                     <input type="radio" id="test10" name="reference"  value="Family">
                                                    <label for="test10">Family</label>
                                                  
                                                    <input type="radio" id="test11" name="reference" value="Friends">
                                                    <label for="test11">Friends</label>
                                                  
                                                    <input type="radio" id="test12" name="reference" value="Doctor">
                                                    <label for="test12">Doctor</label>

                                                    <input type="radio" id="test13" name="reference" value="Old Member">
                                                    <label for="test13">Old Member</label>

                                                    <input type="radio" id="test14" name="reference" value="Just Dial">
                                                    <label for="test14">Just Dial</label>

                                                    <input type="radio" id="test15" name="reference" value="Huntplex.com">
                                                    <label for="test15">Huntplex.com</label>

                                                    <input type="radio" id="test16" name="reference" value="Others">
                                                    <label for="test16">Others</label>
                                                  </p>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Goal</label>
                                                <div class="col-sm-9">
                                                 <p>
                                                    <div class="row">
                                                    <div class="col-md-4">
                                                    <input type="radio" id="test17" name="goal" checked value="">
                                                    <label for="test17">Weight Loss</label>
                                                     </div>
                                                      <div class="col-md-2">
                                                    <input type="number" name="weight_loss" class="form-control" placeholder="Feet" style="border: 0;border-bottom: 1px solid #c2cad8;">
                                                     </div>  <!-- </div><br> -->

                                                    <!--  <div class="row"> -->
                                                    <div class="col-md-4">
                                                    <input type="radio" id="test17" name="goal"  value="">
                                                    <label for="test17">Weight Gain</label>
                                                     </div>
                                                      <div class="col-md-2">
                                                    <input type="number" name="weight_gain" class="form-control" placeholder="Feet" style="border: 0;border-bottom: 1px solid #c2cad8;">
                                                     </div>  </div><br>
                                               
                                                  
                                                    <input type="radio" id="test18" name="goal" value="Flexibility">
                                                    <label for="test18">Flexibility</label>
                                                  
                                                    <input type="radio" id="test19" name="goal" value="Injury Rehabilitation">
                                                    <label for="test19">Injury Rehabilitation</label>

                                                     <input type="radio" id="test20" name="goal"  value="Yoga">
                                                    <label for="test20">Yoga</label>
                                                  
                                                    <input type="radio" id="test21" name="goal" value="Toning">
                                                    <label for="test21">Toning</label>
                                                  
                                                    <input type="radio" id="test22" name="goal" value="Stress Management">
                                                    <label for="test22">Stress Management</label>

                                                    <input type="radio" id="test23" name="goal" value="Cardio Vascular Endurance">
                                                    <label for="test23">Cardio Vascular Endurance</label>

                                                    <input type="radio" id="test24" name="goal" value="Strength Endurance">
                                                    <label for="test24">Strength Endurance</label>
                                                  </p>
                                                </div>
                                            </div>
                                        </div>
                                          <hr>
                                           <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Do you exercise regularly?</label>
                                                <div class="col-sm-9">
                                                 <p>
                                                <input type="radio" id="test25" name="exercise" checked value="Yes">
                                                <label for="test25">Yes</label>
                                                
                                                  <input type="radio" id="test26" name="exercise" value="No">
                                                  <label for="test26">No</label>
                                                  </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">If yes what type?</label>
                                                <div class="col-sm-9">
                                                 <p>
                                                <input type="radio" id="test27" name="exercise_type" checked value="Gym">
                                                <label for="test27">Gym</label>
                                                
                                                  <input type="radio" id="test28" name="exercise_type" value="Yoga">
                                                  <label for="test28">Yoga</label>

                                                   <input type="radio" id="test29" name="exercise_type" value="Walking">
                                                  <label for="test29">Walking</label>

                                                   <input type="radio" id="test30" name="exercise_type" value="Jogging">
                                                  <label for="test30">Jogging</label>

                                                   <input type="radio" id="test31" name="exercise_type" value="Spinning">
                                                  <label for="test31">Spinning</label>
                                                  </p>
                                                </div>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">If gyming where?</label>
                                                <div class="col-sm-9">
                                                     <div class="row">
                                                 <p>
                                                     <div class="col-sm-6">
                                                   <input type="text" name="gyming" class="form-control"  placeholder="If gyming where?" >
                                                   </div>

                                                  <div class="col-sm-6">
                                                  <input type="text" name="gyming_time" class="form-control"  placeholder="How much time ?">
                                                  </div>

                                                  </p>
                                                </div> </div>
                                            </div>
                                        </div>


                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Package offered</label>
                                                <div class="col-sm-9">
                                                 <p>
                                                <input type="radio" id="test32" name="package_offer" checked value="Monthly">
                                                <label for="test32">Monthly</label>
                                                
                                                  <input type="radio" id="test33" name="package_offer" value="Quarterly">
                                                  <label for="test33">Quarterly</label>

                                                   <input type="radio" id="test34" name="package_offer" value="Half Yearly">
                                                  <label for="test34">Half Yearly</label>

                                                   <input type="radio" id="test35" name="package_offer" value="Yearly">
                                                  <label for="test35">Yearly</label>

                                                   <input type="radio" id="test36" name="package_offer" value="Personal Training">
                                                  <label for="test36">Personal Training</label>

                                                   <input type="radio" id="test37" name="package_offer" value="Any Other">
                                                  <label for="test37">Any Other</label>
                                                  </p>
                                                </div>
                                            </div>
                                        </div>


                                          <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Remark</label>
                                                <div class="col-sm-9">
                                                 <p>
                                                   <input type="text" name="remark" class="form-control"  placeholder="Remark" >
                                                 </p>
                                                 </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Package Amount</label>
                                                <div class="col-sm-9">
                                                 <p>
                                                   <input type="number" name="package_amount" class="form-control"  placeholder="Package Amount" >
                                                 </p>
                                                 </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Name Of the Counsellor</label>
                                                <div class="col-sm-9">
                                                 <p>
                                                   <input type="text" name="counsellor_name" class="form-control"  placeholder="Counsellor name">
                                                 </p>
                                                 </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Next Follow up on</label>
                                                <div class="col-sm-9">
                                                 <p>
                                                   <input type="date" name="follow_date" class="form-control" value="<?php echo $current_date;?>"  placeholder="Follow Date" required="">
                                                 </p>
                                                 </div>
                                            </div>
                                        </div>

                                        <button type="submit" name="btn_save" class="btn btn-primary btn-flat m-b-30 m-t-30">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
                
               
                <!-- /# row -->

                <!-- End PAge Content -->
    

<?php include('footer.php');?>

