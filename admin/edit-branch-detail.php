<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['cmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

$eid=$_GET['editid'];
 $branchname=$_POST['branchname'];

$contnum=$_POST['contactnumber'];
$bemail=$_POST['email'];
$baddress=$_POST['address'];
$bcity=$_POST['city'];
$bstate=$_POST['state'];
$bpincode=$_POST['pincode'];
$bcountry=$_POST['country'];
 $query=mysqli_query($con,"update tblbranch set BranchName='$branchname',BranchContactnumber='$contnum',BranchEmail='$bemail',BranchAddress='$baddress',BranchCity='$bcity',BranchState='$bstate',BranchPincode='$bpincode',BranchCountry='$bcountry' where  ID='$eid'");

    if ($query) {
    echo '<script>alert("Branch Detail Has been updated")</script>';
    echo "<script>window.location.href ='manage-branch.php'</script>";
  }
  else
    {
     echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}

?>


<!doctype html>
<html lang="en">

    <head>
        <title>Mkombe Parcel Branches</title>

        <!-- Switchery css -->
        <link href="../plugins/switchery/switchery.min.css" rel="stylesheet" />

        <!-- Bootstrap CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

        <!-- App CSS -->
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

        <!-- Modernizr js -->
        <script src="assets/js/modernizr.min.js"></script>

    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
           <?php include_once('includes/header.php');?>
           <?php include_once('includes/leftbar.php');?>
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="page-title-box">
                                    <h4 class="page-title float-left">Branch Detail</h4>

                                    

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                        <!-- end row -->

                        <div class="row">

                            <div class="col-12">
                                <div class="card-box">
   <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>

                                   <h4 class="header-title m-t-0 m-b-30">Branch Detail</h4>
<form name="addbranch" method="post"> 
                                    <div class="form-group row">
                                      
                                        <?php
 $cid=$_GET['editid'];
$ret=mysqli_query($con,"select * from  tblbranch where ID='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                        <label for="example-text-input" class="col-2 col-form-label">Branch Name</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text" value="<?php  echo $row['BranchName'];?>" id="" name="branchname" required="true">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-2 col-form-label">Branch Contact Number</label>
                                        <div class="col-10">
                                        <input class="form-control" type="text" value="<?php echo $row['BranchContactnumber']; ?>" id="" name="contactnumber" maxlength="16" required="true" pattern="\+?[0-9]+">


                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-email-input" class="col-2 col-form-label">Branch Email</label>
                                        <div class="col-10">
                                            <input class="form-control" type="email" value="<?php  echo $row['BranchEmail'];?>" id="" name="email" required="true" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-url-input" class="col-2 col-form-label">Branch Address</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text" value="<?php  echo $row['BranchAddress'];?>" id="" name="address" required="true">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-tel-input" class="col-2 col-form-label">Branch City</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text" value="<?php  echo $row['BranchCity'];?>" id="" name="city" required="true">
                                        </div>
                                    </div>
                                    
                                   
                                     <div class="form-group row">
                                        <label for="example-number-input" class="col-2 col-form-label">Branch Country</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text" value="<?php  echo $row['BranchCountry'];?>" id="" name="country" required="true">
                                        </div>
                                    </div>
                                    
                                        <?php } ?>
                        
                                    
                                    
                                    <div class="form-group row">
                                        
                                        <div class="col-10">
                                          <p style="text-align: center;">  <button type="submit" name="submit" class="btn btn-primary">Update</button></p>
                                           
                                        </div>
                                        </div>

                                    </div>
                                </form>
                                </div>

                            </div>
                        </div>


                       
                        <!-- end row -->


                    <!-- container -->




            </div>
            <!-- End content-page -->


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            <!-- Right Sidebar -->
            <div class="side-bar right-bar">
                <div class="nicescroll">
                    <ul class="nav nav-pills nav-justified">
                        <li class="nav-item">
                            <a href="#home-2"  class="nav-link active" data-toggle="tab" aria-expanded="false">
                                Activity
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#messages-2" class="nav-link" data-toggle="tab" aria-expanded="true">
                                Settings
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="home-2">
                            <div class="timeline-2">
                                <div class="time-item">
                                    <div class="item-info">
                                        <small class="text-muted">5 minutes ago</small>
                                        <p><strong><a href="#" class="text-info">John Doe</a></strong> Uploaded a photo <strong>"DSC000586.jpg"</strong></p>
                                    </div>
                                </div>

                                <div class="time-item">
                                    <div class="item-info">
                                        <small class="text-muted">30 minutes ago</small>
                                        <p><a href="" class="text-info">Lorem</a> commented your post.</p>
                                        <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em></p>
                                    </div>
                                </div>

                                <div class="time-item">
                                    <div class="item-info">
                                        <small class="text-muted">59 minutes ago</small>
                                        <p><a href="" class="text-info">Jessi</a> attended a meeting with<a href="#" class="text-success">John Doe</a>.</p>
                                        <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em></p>
                                    </div>
                                </div>

                                <div class="time-item">
                                    <div class="item-info">
                                        <small class="text-muted">1 hour ago</small>
                                        <p><strong><a href="#" class="text-info">John Doe</a></strong>Uploaded 2 new photos</p>
                                    </div>
                                </div>

                                <div class="time-item">
                                    <div class="item-info">
                                        <small class="text-muted">3 hours ago</small>
                                        <p><a href="" class="text-info">Lorem</a> commented your post.</p>
                                        <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em></p>
                                    </div>
                                </div>

                                <div class="time-item">
                                    <div class="item-info">
                                        <small class="text-muted">5 hours ago</small>
                                        <p><a href="" class="text-info">Jessi</a> attended a meeting with<a href="#" class="text-success">John Doe</a>.</p>
                                        <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="messages-2">

                            <div class="row m-t-10">
                                <div class="col-8">
                                    <h5 class="m-0">Notifications</h5>
                                    <p class="text-muted m-b-0"><small>Do you need them?</small></p>
                                </div>
                                <div class="col-4 text-right">
                                    <input type="checkbox" checked data-plugin="switchery" data-color="#1bb99a" data-size="small"/>
                                </div>
                            </div>

                            <div class="row m-t-10">
                                <div class="col-8">
                                    <h5 class="m-0">API Access</h5>
                                    <p class="m-b-0 text-muted"><small>Enable/Disable access</small></p>
                                </div>
                                <div class="col-4 text-right">
                                    <input type="checkbox" checked data-plugin="switchery" data-color="#1bb99a" data-size="small"/>
                                </div>
                            </div>

                            <div class="row m-t-10">
                                <div class="col-8">
                                    <h5 class="m-0">Auto Updates</h5>
                                    <p class="m-b-0 text-muted"><small>Keep up to date</small></p>
                                </div>
                                <div class="col-4 text-right">
                                    <input type="checkbox" checked data-plugin="switchery" data-color="#1bb99a" data-size="small"/>
                                </div>
                            </div>

                            <div class="row m-t-10">
                                <div class="col-8">
                                    <h5 class="m-0">Online Status</h5>
                                    <p class="m-b-0 text-muted"><small>Show your status to all</small></p>
                                </div>
                                <div class="col-4 text-right">
                                    <input type="checkbox" checked data-plugin="switchery" data-color="#1bb99a" data-size="small"/>
                                </div>
                            </div>

                        </div>
                    </div>
                </div> <!-- end nicescroll -->
            </div>
            <!-- /Right-bar -->

            <?php include_once('includes/footer.php');?>


        </div>
        <!-- END wrapper -->


        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="../plugins/switchery/switchery.min.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>
</html>
<?php }  ?>