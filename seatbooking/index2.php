<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['submit']))
  {


$nocomplain=$_POST['nocomplain'];
$trackingnum=$_POST['trackingnum'];
$issuedes=$_POST['issuedes'];
$ticnum=mt_rand(100000, 999999);

$sql=mysqli_query($con,"select ID from tblcourier where RefNumber='$trackingnum'");
$row=mysqli_num_rows($sql);
if($row>0){
$query=mysqli_query($con,"insert into tblcomplains(TicketNumber,TrackingNumber,NatureofComplain,IssuesDesc) value('$ticnum','$trackingnum','$nocomplain','$issuedes')");
if ($query) {
echo '<script>alert("Your ticket has been generated. Ticket Number is "+"'.$ticnum.'")</script>';
echo "<script>window.location.href ='index.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
  } else {

     echo '<script>alert("Invalid Refrence or tracking Number")</script>';
     echo "<script>window.location.href ='./raise-complaint.php'</script>";
  }

  

}

?>
<!doctype html>
<html lang="en">

  <head>
    <title>Mkombe Luxury Bus Management System</title>
   
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,700|Oswald:400,700" rel="stylesheet">

    <link rel="stylesheet" href="../fonts/icomoon/style.css">

    <link rel="stylesheet" href="../css/bootstrap2.min.css">
    <link rel="stylesheet" href="../css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="../css/aos.css">
    <link rel="stylesheet" href="style.css">
    

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="../css/style2.css">

    <script src="reservation.js"></script>

  </head>

  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    <div id="overlayer"></div>
    <div class="loader">
      <div class="spinner-border text-primary" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>

    <div class="site-wrap" id="home-section">

      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>


<?php include_once('includes/header.php');?>

      <div class="site-section bg-light" id="contact-section">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center mb-5" data-aos="fade-up" data-aos-delay="">
            <div class="block-heading-1">
            
              <h2>Book Seats</h2>
            </div>
          </div>
        </div>
        <div class="row">
        <div class="col-lg-6 mb-5" data-aos="fade-up" data-aos-delay="100">
  <div class="card p-3 shadow-sm">
    <?php
      // (A) FIXED IDS FOR THIS DEMO
      $sessid = 1;
      $userid = 999;

      // (B) GET SESSION SEATS
      require "2-reserve-lib.php";
      $seats = $_RSV->get($sessid);
    ?>

    <!-- (C) DRAW SEATS LAYOUT -->
    <div  id="layout">
  <?php
    foreach ($seats as $s) {
      $taken = is_numeric($s["user_id"]);
      printf("<div class='seat%s'%s>
                <img src='img/seat_3.png' alt='Seat Icon'> <br>
                <span>%s</span>
              </div>",
        $taken ? " taken" : "",
        $taken ? "" : " onclick='reserve.toggle(this)'",
        $s["seat_id"]
      );
    }
  ?>
</div>



    <!-- (D) LEGEND -->
    <div id="legend" class="mt-3">
      <div class="seat"></div> <div class="txt">Open</div>
      <div class="seat taken"></div> <div class="txt">Taken</div>
      <div class="seat selected"></div> <div class="txt">Your Selected Seats</div>
    </div>

    <!-- (E) SAVE SELECTION -->
    <form id="ninja" method="post" action="4-save.php">
      <input type="hidden" name="sessid" value="<?=$sessid?>">
      <input type="hidden" name="userid" value="<?=$userid?>">
    </form>

    <button id="go" onclick="reserve.save()" class="btn btn-primary mt-3">
  <img src="img/seat_icon.png" alt="Bus Seat" class="bus-seat-icon">
  Reserve Seats
</button>

  </div>
</div>


<!-- contact section -->

         <div class="col-lg-4 ml-auto" data-aos="fade-up" data-aos-delay="200">
            <div class="bg-white p-3 p-md-5">

              <h3 class="text-black mb-4">Contact Info</h3>
              <ul class="list-unstyled footer-link"><?php
$query=mysqli_query($con,"select * from tblpage where PageType='contactus'");
while ($row=mysqli_fetch_array($query)) {

?>
                <li class="d-block mb-3">
                  <span class="d-block text-black">Address:</span>
                  <span><?php echo $row['PageDescription'];?></span></li>
                <li class="d-block mb-3"><span class="d-block text-black">Phone:</span><span>+<?php  echo htmlentities ($row['MobileNumber']);?></span></li>
                <li class="d-block mb-3"><span class="d-block text-black">Email:</span><span><?php  echo htmlentities($row['Email']);?></span></li>
              <?php } ?></ul>
            </div>
          </div>
        </div>
      </div>
    </div>


    </div>





    <?php include_once('includes/footer.php');?>

    </div>

    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/jquery.sticky.js"></script>
    <script src="../js/jquery.waypoints.min.js"></script>
    <script src="../js/jquery.animateNumber.min.js"></script>
    <script src="../js/jquery.fancybox.min.js"></script>
    <script src="../js/jquery.easing.1.3.js"></script>
    <script src="../js/aos.js"></script>

    <script src="../js/main.js"></script>


  </body>

</html>
