<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['cmssid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

$cmsaid=$_SESSION['cmssid'];
 $SenderBranch=$_POST['SenderBranch'];
$SenderName=$_POST['SenderName'];
$SenderContactnumber=$_POST['SenderContactnumber'];
$SenderCity=$_POST['SenderCity'];
$SenderPincode=$_POST['SenderPincode'];
$SenderCountry=$_POST['SenderCountry'];
$RecipientName=$_POST['RecipientName'];
$RecipientContactnumber=$_POST['RecipientContactnumber'];
$RecipientCity=$_POST['RecipientCity'];
$RecipientPincode=$_POST['RecipientPincode'];
$RecipientCountry=$_POST['RecipientCountry'];
$CourierDes=$_POST['CourierDes'];
$ParcelWeight=$_POST['ParcelWeight'];
$TZSprice=$_POST['TZSprice'];
$ZARprice=$_POST['ZARprice'];
$RefNumber=mt_rand(1000, 9999);
$Status='0';
 $query=mysqli_query($con,"insert into tblcourier(RefNumber,SenderBranch,SenderName,SenderContactnumber,SenderCity,SenderPincode,SenderCountry,RecipientName,RecipientContactnumber,RecipientCity,RecipientPincode,RecipientCountry,CourierDes,ParcelWeight,TZSprice,ZARprice,Status) value('$RefNumber','$SenderBranch','$SenderName','$SenderContactnumber','$SenderCity','$SenderPincode','$SenderCountry','$RecipientName','$RecipientContactnumber','$RecipientCity','$RecipientPincode','$RecipientCountry','$CourierDes','$ParcelWeight','$TZSprice','$ZARprice','$Status')");

    if ($query) {
    $msg="Courier Detail has been added.";
    echo '<script>alert("Courier Detail has been added..")</script>';
    echo "<script>window.location.href ='add-courierdetail.php'</script>";
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
        <!-- App title -->
        <title>Mkombe Parcel Parcel/Cargo</title>

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
                                    <h4 class="page-title float-left">Parcel/Cargo Detail</h4>

                                    

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">

                                   
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <h4 class="header-title m-t-0 m-b-30">Sender Detail</h4>
                                           
                                            <form name="submit" method="post"> 
                                            <fieldset class="form-group">
    <label for="exampleInputEmail1">Sender Branch</label>
    <select name='SenderBranch' id="SenderBranch" class="form-control white_bg" readonly='true'>
        <?php
        // Remove the WHERE clause to fetch all branches
        $query = mysqli_query($con, "SELECT * FROM tblbranch");

        while ($row = mysqli_fetch_array($query)) {
            ?>
            <option value="<?php echo $row['BranchName']; ?>"><?php echo $row['BranchName']; ?></option>
        <?php } ?>
    </select>
</fieldset>

                                                
                                                <fieldset class="form-group">
                                                    <label for="exampleInputPassword1">Sender Name</label>
                                                    <input type="text" class="form-control"
                                                           id="exampleInputPassword1" name="SenderName" required="true">
                                                </fieldset>
                                                <fieldset class="form-group">
                                                    <label for="exampleSelect1">Sender Contact Number</label>
                                                    <input type="text" class="form-control"
                                                           id="exampleInputPassword1" name="SenderContactnumber" maxlength="16" required="true" pattern="\+?[0-9]+">
                                                </fieldset>
                                              
                                               

                                                <fieldset class="form-group">
                                                    <label >Sender City</label>
                                                    <input class="form-control" type="text" name="SenderCity" required="true">
                                                </fieldset>
                                                 
                                                <fieldset class="form-group">
                                                    <label >Sender Pincode</label>
                                                    <input class="form-control" type="text" name="SenderPincode" required="true">
                                                </fieldset>
                                                 <fieldset class="form-group">
                                                    <label >Sender Country</label>
                                                    <input class="form-control" type="text" name="SenderCountry" required="true">
                                                </fieldset>
                                                
                                            
                                        </div><!-- end col -->

                                        <div class="col-xl-6 m-t-sm-40">
                                             <h4 class="header-title m-t-0 m-b-30">Recipient Detail</h4>
                                          
                                                <fieldset>
                            
                                                 
                                                        <label for="disabledSelect">Recipient Name</label>
                                                       <input type="text" class="form-control m-b-20" id="exampleInputPassword1" name="RecipientName" required="true">
                                              
                                                </fieldset>

                                                <fieldset>
                                                    <label >Recipient Contact Number</label>
                                                    <input class="form-control m-b-20" type="text"  name="RecipientContactnumber" maxlength="16" required="true" pattern="\+?[0-9]+">
                                                    
                                                    
                                                </fieldset>

                                               
                                                <fieldset>
                                                    <label >Recipient City</label>
                                                    <input class="form-control m-b-20" type="text"name="RecipientCity" required="true">
                                                    
                                                    
                                                </fieldset>
                                        
                                                <fieldset>
                                                    <label >Recipient Pincode</label>
                                                    <input class="form-control m-b-20" type="text" name="RecipientPincode" required="true">
                                                    
                                                    
                                                </fieldset>
                                                 
                                                 <fieldset class="form-group">
                                                    <label >Recipient Country</label>
                                                    <input class="form-control m-b-20" type="text" name="RecipientCountry" required="true">
                                                </fieldset>
                                          
                                        </div><!-- end col -->

                                    </div><!-- end row -->
                                </div>
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->




                        <div class="row">

                            <div class="col-md-12">
                                <div class="card-box">
   

                                   <h4 class="header-title m-t-0 m-b-30">Parcel/Cargo Detail</h4>

                                    <div class="form-group row">
                                       
                                        <label for="example-text-input" class="col-2 col-form-label">Parcel/Cargo Description</label>
                                        <div class="col-10">
                                            <textarea class="form-control" type="text" value=""  name="CourierDes" required="true" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-2 col-form-label">Parcel weight(in kg)</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text" value="" id="" name="ParcelWeight" required="true" placeholder="for example:2kg or .2kg">
                                        </div>
                                    </div>
                                    <br>
                                    <h4 class="header-title m-t-0 m-b-30">Parcel/Cargo Price</h4>

                                    <div class="form-group row">
    <label for="country1" class="col-2 col-form-label">Tanzania Price (TZS)</label>
    <div class="col-5">
        <input class="form-control" type="decimal" value="" id="country1" name="TZSprice" placeholder="Enter amount in TZS" oninput="convertCurrency('TZS', 'ZAR')">
    </div>
    <div class="col-5">
        <!-- Set the default currency for Tanzania to TZS -->
        <input type="hidden" name="country1currency" value="TZS">
        <p class="form-control-static">TZS</p>
    </div>
</div>

<div class="form-group row">
    <label for="country2" class="col-2 col-form-label">South Africa Price (ZAR)</label>
    <div class="col-5">
        <input class="form-control" type="decimal" value="" id="country2" name="ZARprice" placeholder="Enter amount in ZAR" oninput="convertCurrency('ZAR', 'TZS')">
    </div>
    <div class="col-5">
        <!-- Set the default currency for South Africa to ZAR -->
        <input type="hidden" name="country2currency" value="ZAR">
        <p class="form-control-static">ZAR</p>
    </div>
</div>

<script>
    function convertCurrency(fromCurrency, toCurrency) {
        // Get the input values
        let inputValue = document.getElementById(`country${fromCurrency === 'TZS' ? '1' : '2'}`).value;
        
        // Convert ZAR to TZS or vice versa
        let conversionRate = (fromCurrency === 'TZS') ? 1/140 : 140;
        let convertedValue = inputValue * conversionRate;

        // Set the converted value to the other input
        document.getElementById(`country${toCurrency === 'TZS' ? '1' : '2'}`).value = convertedValue.toFixed(2);
    }
</script>


                                   
                                    
                                   
                                                                     
                                                                
                                    
                                    
                                    <div class="form-group row">
                                        
                                        <div class="col-10">
                                          <p style="text-align: center;">  <button type="submit" name="submit" class="btn btn-primary">Submit</button></p>
                                           
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



            <?php include_once('includes/footer.php');?>


        </div>
    </div></div>
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