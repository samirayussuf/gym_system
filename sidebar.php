 <?php 
 include('connect.php');
  $sql = "select * from admin where id = '".$_SESSION["id"]."'";
        $result=$conn->query($sql);
        $row1=mysqli_fetch_array($result);
       
            $q = "select * from tbl_permission_role where role_id='".$row1['group_id']."'";
            $ress=$conn->query($q);
            //$row=mysqli_fetch_all($ress);
             $name = array();
            while($row=mysqli_fetch_array($ress)){
          $sql = "select * from tbl_permission where id = '".$row['permission_id']."'";
        $result=$conn->query($sql);
        $row1=mysqli_fetch_array($result);
             array_push($name,$row1[1]);
             }
             $_SESSION['name']=$name;
             $useroles=$_SESSION['name'];

 ?>

 <!-- Left Sidebar  -->
        <div class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label">Home</li>
                        <li> <a  href="index.php" aria-expanded="false"><i class="fa fa-tachometer"></i><!-- <span class="hide-menu"> <span class="label label-rouded label-primary pull-right">2</span></span> -->Dashboard</a>
                            <!-- <ul aria-expanded="false" class="collapse">
                                <li><a href="index.html">Ecommerce </a></li>
                                <li><a href="index1.html">Analytics </a></li>
                            </ul> -->
                        </li> 
                    <?php if(isset($useroles)){  if(in_array("manage_client",$useroles)){ ?> 
                         <li class="nav-label">Management</li>
                        <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">Client Management</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <?php if(isset($useroles)){  if(in_array("add_client",$useroles)){?>
                                <li><a href="add_user.php">Add Client</a></li>
                            <?php } } ?>
                                <li><a href="view_user.php">View Client</a></li>
                            </ul>
                        </li>
                    <?php } } ?>

                         <?php if(isset($useroles)){  if(in_array("manage_membership",$useroles)){ ?>                       
                        <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-users"></i><span class="hide-menu">Membership Plans</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <?php if(isset($useroles)){  if(in_array("add_membership",$useroles)){ ?>
                                <li><a href="add_membership.php">Add Membership Plans</a></li>
                            <?php } } ?>
                                <li><a href="view_membership.php">View Membership Plans</a></li>
                            </ul>
                        </li>
                          <?php } } ?>

                        <?php if(isset($useroles)){  if(in_array("manage_enquiry",$useroles)){ ?>
                         <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-question"></i><span class="hide-menu">Manage Enquiry</span></a>
                            <ul aria-expanded="false" class="collapse">
                             <?php if(isset($useroles)){  if(in_array("add_enquiry",$useroles)){ ?>
                                <li><a href="add_enquiry.php">Add Enquiry </a></li>
                            <?php } } ?>
                                <li><a href="view_enquiry.php">View Enquiry </a></li>
                            </ul>
                        </li>
                          <?php } } ?>


                        <?php if(isset($useroles)){  if(in_array("manage_subscription",$useroles)){ ?> 
                        <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-suitcase"></i><span class="hide-menu">Manage Subscriptions</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="#">Add Subscriptions</a></li>
                                <li><a href="#">View Subscriptions</a></li>
                            </ul>
                        </li>
                         <?php } } ?>

                         <?php if(isset($useroles)){  if(in_array("manage_attendance",$useroles)){ ?> 
                         <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-check-square-o"></i><span class="hide-menu">Manage Attendance</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="attendance.php">Check IN</a></li>
                                <!-- <li><a href="view_attendance.php">View Attendance</a></li> -->
                            </ul>
                        </li>
                         <?php } } ?>

                        <?php if(isset($useroles)){  if(in_array("manage_expense",$useroles)){ ?> 
                        <li class="nav-label">Add On</li>
                         <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-external-link"></i><span class="hide-menu">Expense Management</span></a>
                            <ul aria-expanded="false" class="collapse">
                                 <?php if(isset($useroles)){  if(in_array("add_expense",$useroles)){ ?>
                                <li><a href="add_expense.php">Add Expense</a></li>
                            <?php } } ?>
                                <li><a href="view_expense.php">View Expense</a></li>
                            </ul>
                        </li>
                         <?php } } ?>
                                                                                                                                             
                         <?php if($_SESSION["username"]=='admin') { ?>
                         <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-cog"></i><span class="hide-menu">Setting</span></a>
                            <ul aria-expanded="false" class="collapse">
                               <?php if($_SESSION["username"]=='user' || $_SESSION["username"]=='admin') { ?>
                               <li><a href="manage_website.php">System Management</a></li>
                             <?php } ?>
                              <li><a href="email_config.php">Email Management</a></li>
                                <li><a href="sms_config.php">SMS Management</a></li>
                            </ul>
                        </li> 
                        <?php } ?> 

                  <?php if(isset($useroles)){  if(in_array("manage_user",$useroles)){ ?> 
                         <li class="nav-label">Users</li>
                        <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-user-plus"></i><span class="hide-menu">User Management</span></a>
                            <ul aria-expanded="false" class="collapse">
                            <?php if(isset($useroles)){  if(in_array("add_user",$useroles)){ ?> 
                                <li><a href="add_person.php">Add Users</a></li>
                            <?php } } ?>
                                <li><a href="view_person.php">View Users</a></li>
                            </ul>
                        </li>
                    <?php } } ?>

                    <?php if($_SESSION["username"]=='admin') { ?>
                         <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-lock"></i><span class="hide-menu">User Permissions</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="assign_role.php">assign role</a></li>
                                <li><a href="view_role.php">View Role</a></li>
                            </ul>
                        </li>
                    <?php } ?>

                          <?php if(isset($useroles)){  if(in_array("manage_reports",$useroles)){ ?> 
                         <li class="nav-label">Reports</li>
                                <li><a href="client_report.php">Client Report</a></li><!-- 
                                <li><a href="finance_report.php">Finance Report</a></li> -->
                                <li><a href="attendance_report.php">Attendance  Report</a></li>
                                <li><a href="enquiry_report.php">Enquiry  Report</a></li><!-- 
                                <li><a href="balance.php">Balance  Report</a></li> -->
								<br>

                            <?php } } ?>
                    </ul>   
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>
        <!-- End Left Sidebar  -->