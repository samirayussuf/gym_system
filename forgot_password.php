<?php session_start();?>
<?php include('head.php');?>

  <?php
  include('connect.php');
if(isset($_POST['btn_forgot']))
{
    $otp = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 8)), 0, 8);
 $mail=$_POST['email'];
$sql = "SELECT * FROM admin where email ='".$mail."' " ;
$ans = $conn->query($sql);
 $res=mysqli_fetch_array($ans); 
  $realemail=$res['email'];
  $msg = "Your Password is :'".$otp."'";
   $headers='From:ns.upturnit@gmail.com';
    $to=$res['email'];
  $subject='Remind password';
  //$m = mail($to,$subject,$msg,$headers);
  
  
if($mail == $realemail){
 
$sql = "UPDATE admin SET password ='$otp' WHERE email='$mail'";
$m = mail($to,$subject,$msg,$headers);
  if($m)
  {
    echo'Check your inbox in mail';
  }
  else
  {
   echo'mail is not send';
  }
// echo $a = "hhh";
 //else
 //{
  //echo'You entered mail id is not present';
 
}

    
    }
?> 


    <!-- Main wrapper  -->
    <div id="main-wrapper">

        <div class="unix-login">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="login-content card">
                            <div class="login-form">
                                <h4>Forgot Password</h4>
                                <form method="POST">
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" name="email" class="form-control" placeholder="Email" required="">
                                    </div>
                                    
                                   
                                    <button type="submit" name="btn_forgot" class="btn btn-primary btn-flat m-b-30 m-t-30">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>

</body>

</html>