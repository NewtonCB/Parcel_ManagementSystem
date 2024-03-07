<?php
include('includes/dbconnection.php');
session_start();
error_reporting(0);
if (isset($_POST['submit'])) {

  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  $query = mysqli_query($con, "insert into tblcontact(Name,MobileNumber,Email,Message) value('$name','$phone','$email','$message')");

  if ($query) {
    echo "<script>alert('Your message was sent successfully!.');</script>";
    echo "<script>window.location.href ='index.php'</script>";
  } else {
    echo '<script>alert("Something Went Wrong. Please try again")</script>';
  }
}

?>

<!doctype html>
<html lang="en">

<head>
  <title>Mkombe Luxury Parcel Management</title>

  <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,700|Oswald:400,700" rel="stylesheet">

  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/bootstrap2.min.css">
  <link rel="stylesheet" href="css/jquery.fancybox.min.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="css/aos.css">

  <!-- MAIN CSS -->
  <link rel="stylesheet" href="css/style2.css">

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


    <?php include_once('includes/header.php'); ?>



    <div class="ftco-blocks-cover-1">
      <div class="ftco-cover-1 overlay" style="background-image: url('images/bus_1.heic')">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-6">
              <h1> MKOMBE LUXURY </h1>
              <p class="mb-5"> Quality Always</p>
              <a href="track-complain.php" class="btn btn-primary text-white px-4 pt-3 pb-3 mr-5">
                Track Parcel/Cargo
              </a>
              <a href="track-complain.php" class="btn btn-primary text-white px-4 pt-3 pb-3">
                Book Seats
              </a>
            </div>
          </div>
        </div>
      </div>
      <!-- END .ftco-cover-1 -->
      <div class="ftco-service-image-1 ">
        <div class="container">
          <div class="owl-carousel owl-all">


            <div class="service text-center">
              <a href="#"><img src="images/fwd.png" alt="Image" class="img-fluid"></a>
              <div class="px-md-3">
                <h3><a style="color: #190482;" href="#">Parcel & Cargo Fowarding</a></h3>
                <p>Get in-touch with our service</p>
              </div>
            </div>

            <div class="service text-center">
              <a href="#"><img src="images/rsv.png" alt="Image" class="img-fluid"></a>
              <div class="px-md-3">
                <h3><a style="color: #190482;" href="#">Parcel & Cargo Receiving</a></h3>
                <p>Get in-touch with our service</p>
              </div>
            </div>


          </div>
        </div>

      </div>





      <div class="site-section" id="about-section">

        <div class="container">
          <div class="row mb-5 justify-content-center">
            <div class="col-md-7 text-center">
              <div class="block-heading-1" data-aos="fade-up" data-aos-delay="">
                <?php
                $query = mysqli_query($con, "select * from tblpage where PageType='aboutus'");
                while ($row = mysqli_fetch_array($query)) {

                ?>
                  <h2><?php echo $row['PageTitle']; ?></h2>
                  <p><?php echo $row['PageDescription']; ?>.</p>
              </div><?php } ?>
            <img src="images/bus.jpg" alt="Image" class="img-fluid">
            </div>
          </div>
        </div>

      </div>


      <div class="site-section" id="branch-section">
        <div class="container">
          <div class="row mb-5 justify-content-center">
            <div class="col-md-7 text-center">
              <div class="block-heading-1" data-aos="fade-up" data-aos-delay="">
                <h2>Our Branch</h2>
                <p>Quality Always</p>
              </div>
            </div>
          </div>

          <div class="owl-carousel owl-all">
            <?php
            $query = mysqli_query($con, "select * from tblbranch");
            while ($row = mysqli_fetch_array($query)) {

            ?>
              <div class="block-team-member-1 text-center rounded h-100">


                <figure>
                  <img src="images/bus_1.heic" style="border: solid 1px #000" alt="Image" class="img-fluid rounded-circle">
                </figure>
                <h3 class="font-size-20 text-black"><?php echo $row['BranchName']; ?></h3>
                <span class="d-block font-gray-5 letter-spacing-1 text-uppercase font-size-12 mb-3">Branch Name</span>
                <p><strong>Contact Number: </strong>+<?php echo $row['BranchContactnumber']; ?></p>
                <p><strong>Email ID: </strong><?php echo $row['BranchEmail']; ?></p>
                <p><strong>Address: </strong><?php echo $row['BranchAddress']; ?></p>
                <p><strong>City: </strong><?php echo $row['BranchCity']; ?></p>
                <p><strong>Country: </strong><?php echo $row['BranchCountry']; ?></p>

              </div><?php } ?>
          </div>



        </div>

      </div>


    </div>



    <div class="site-section bg-light" id="contact-section">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center mb-5" data-aos="fade-up" data-aos-delay="">
            <div class="block-heading-1">
              <span>Get In Touch</span>
              <h2>Contact Us</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 mb-5" data-aos="fade-up" data-aos-delay="100">
            <form action="#" method="post">
              <div class="form-group row">
                <div class="col-md-6 mb-4 mb-lg-0">
                  <input type="text" class="form-control" name="name" required="true" placeholder="Enter Your Name">
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" placeholder="Mobile Number" name="phone" required="true" maxlength="10" pattern="[0-9]+">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <input type="text" class="form-control" placeholder="Email address" name="email" required="true">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <textarea name="message" required="true" id="" class="form-control" placeholder="Write your message." cols="30" rows="10"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-6 mr-auto">
                  <input type="submit" name="submit" class="btn btn-block btn-primary text-white py-3 px-5" value="Send Message">
                </div>
              </div>
            </form>
          </div>
          <div class="col-lg-4 ml-auto" data-aos="fade-up" data-aos-delay="200">
            <div class="bg-white p-3 p-md-5">

              <h3 class="text-black mb-4">Contact Info</h3>
              <ul class="list-unstyled footer-link"><?php
                                                    $query = mysqli_query($con, "select * from tblpage where PageType='contactus'");
                                                    while ($row = mysqli_fetch_array($query)) {

                                                    ?>
                  <li class="d-block mb-3">
                    <span class="d-block text-black">Address:</span>
                    <span><?php echo $row['PageDescription']; ?></span>
                  </li>
                  <li class="d-block mb-3"><span class="d-block text-black">Phone:</span><span><?php echo htmlentities($row['MobileNumber']); ?></span></li>
                  <li class="d-block mb-3"><span class="d-block text-black">Email:</span><span><?php echo htmlentities($row['Email']); ?></span></li>
                <?php } ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php include_once('includes/footer.php'); ?>

  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>


</body>

</html>