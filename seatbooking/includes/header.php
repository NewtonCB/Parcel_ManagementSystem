<div class="top-bar">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <?php
$query=mysqli_query($con,"select * from tblpage where PageType='contactus'");
while ($row=mysqli_fetch_array($query)) {

?>
              <a href="#" class=""><span class="mr-2  icon-envelope-open-o"></span> <span class="d-none d-md-inline-block"><?php  echo htmlentities($row['Email']);?></span></a>
              <span class="mx-md-2 d-inline-block"></span>
              <a href="#" class=""><span class="mr-2  icon-phone"></span> <span class="d-none d-md-inline-block"><?php  echo htmlentities ($row['MobileNumber']);?></span></a>

<?php } ?>
              <div class="float-right">

                <a href="#" class=""><span class="mr-2  icon-twitter"></span> <span class="d-none d-md-inline-block">Twitter</span></a>
                <span class="mx-md-2 d-inline-block"></span>
                <a href="#" class=""><span class="mr-2  icon-facebook"></span> <span class="d-none d-md-inline-block">Facebook</span></a>

              </div>

            </div>

          </div>

        </div>
      </div>
            <header class="site-navbar js-sticky-header site-navbar-target" role="banner">

        <div class="container">
          <div class="row align-items-center position-relative">


            <div class="site-logo">
              <a href="../index.php" class="text-black"><span class="text-primary">Mkombe Luxury Bus </a>
            </div>

            <div class="col-12">
              <nav class="site-navigation text-right ml-auto " role="navigation">

                <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                  <li><a href="../index.php" class="nav-link">Home</a></li>
                   <li class="has-children">
                    <a href="#about-section" class="nav-link">Ticket & Parcel</a>
                    <ul class="dropdown arrow-top">
                      <li><a href="seatbooking/index.php" class="nav-link">Book Seat</a></li>
                      <li><a href="../track-complaint.php" class="nav-link">Track Parcel</a></li>
                      
                    </ul>
                  </li>
                 <li><a href="#about-section" class="nav-link">About </a></li>
<li><a href="#branch-section" class="nav-link">Branch</a></li>
 <li><a href="#contact-section" class="nav-link">Contact</a></li>


                   <li><a href="../raise-complaint.php" class="nav-link">Complaint</a></li>
            
                </ul>
              </nav>

            </div>

            <div class="toggle-button d-inline-block d-lg-none"><a href="#" class="site-menu-toggle py-5 js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

          </div>
        </div>

      </header>