<?php
session_start();
error_reporting(0);
include('./includes/dbconnection.php');
// if (isset($_POST['submit'])) {
// echo "";
// };

// for seat booking 
$query = "SELECT seat_id, is_taken , is_booked FROM seats";
$result = mysqli_query($con, $query);

$takenSeats = array();
$bookedSeats = array();

while ($row = mysqli_fetch_assoc($result)) {
  if ($row['is_taken'] == 1) {
    $takenSeats[] = $row['seat_id'];
  } elseif ($row['is_booked'] == 1) {
    $bookedSeats[] = $row['seat_id'];
  }
}
$takenSeatsJSON = json_encode($takenSeats);
$bookedSeatsJSON = json_encode($bookedSeats);
echo $bookedSeatsJSON;

?>


<!DOCTYPE html>
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
  <!-- <link rel="stylesheet" href="style.css"> -->
  <link rel="stylesheet" href="mickeys.css">


  <!-- MAIN CSS -->
  <link rel="stylesheet" href="../css/style2.css">

  <!-- <script src="reservation.js"></script> -->

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


    <?php include_once('./includes/header.php'); ?>

    <div class="site-section bg-light" id="contact-section">
      <div class="container pt-0">
        <div class="row">
          <div class="col-12 text-center mb-5" data-aos="fade-up" data-aos-delay="">
            <div class="block-heading-1">
              <h2>Book Seats</h2>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-lg-7 mb-5" data-aos="fade-up" data-aos-delay="100" id="booking-step">
              <!-- <div class="card p-3 shadow-sm"> -->

              <form method="POST" action="submit.php" accept-charset="UTF-8" id="booking-form" novalidate="novalidate"><input name="_token" type="hidden" value="8hwR8o5UYEW0OCATrp2PQPVTaL6qnbSxWS9CkMDl">
                <div class="panel booking-wizard" style="border: 1px solid #e6e6e6">
                  <div class="iconbar">
                    <div class="navbar-inner" style="position: relative">
                      <div class="liner"></div>
                      <ul class="nav-justified  nav-tabs-justified nav nav-tabs nav-step">
                        <li class=""><a href="#seat" data-toggle="tab" aria-expanded="true">
                            <span class="round-tabs" data-toggle="tooltip" title="" data-html="true" data-placement="bottom" data-original-title="<small>Kiti cha Abiria</small>">
                              <span class="icon-bus icon-2x"></span>
                            </span>
                          </a>
                        </li>
                        <li class=""><a href="#customer" data-toggle="tab" aria-expanded="false">
                            <span class="round-tabs" data-toggle="tooltip" title="" data-html="true" data-placement="bottom" data-original-title="<small>Abiria</small>">
                              <span class="icon-user icon-2x"></span>
                            </span>
                          </a>
                        </li>
                        <li class="active"><a href="#confirm" data-toggle="tab">
                            <span class="round-tabs" data-toggle="tooltip" data-html="true" title="" data-placement="bottom" data-original-title="<small>Hakiki Taarifa</small>">
                              <i class="icon-check icon-2x"></i>
                            </span>

                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="panel-body no-padding-top">
                    <div class="row">
                      <div class="tab-content">
                        <div class="tab-pane active" id="confirm">
                          <fieldset>
                            <legend class="no-padding-top text-muted">
                              <small class="text-black">Muhtasari wa malipo</small>
                              <br>
                              <span style="text-transform: none"><i> Kagua na uhakikishe taarifa za malipo
                                  maelezo ya ili kuhifadhi tiketi yako</i></span>
                            </legend>
                            <div class="alert small alert-grayish">
                              <span>
                                <b>Muhimu:</b> Utakuwa na lisaa (1 hr) ili kukamilisha malipo ya tiketi, kushindwa kufanya hivyo kutasababisha kufuta moja kwa moja taarifa za tiketi yako
                              </span>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <h6 style="font-size: 15px"><b>Bei ya tiketi</b> :
                                  29,000 /=
                                </h6>
                              </div>
                              <br>
                            </div>
                          </fieldset>

                          <fieldset>

                            <legend class="no-padding-top text-muted">
                              <small class="text-black">Njia ya Malipo</small>
                              <br>
                              <span style="text-transform: none"><i> Fuata maelekezo kukamilisha malipo ya siti ulio hifadhi</i></span>
                            </legend>
                            <div class="form-group text-center">
                              <p></p>
                              <!-- <div class="radio">
                                <label class="radio-inline" title="Pay through bank">
                                  <input data-method="tigo-container" name="method" type="radio" value="1">
                                  Bank Card/ Account
                                  <br>
                                </label>
                                <label class="radio-inline" title="Pay with Vodacom Mpesa">
                                  <input data-method="voda-container" name="method" type="radio" value="2">
                                  Vodacom M-Pesa

                                </label>

                                <label class="radio-inline" title="Pay with Vodacom Mpesa">
                                  <input name="method" type="radio" value="5">
                                  Tigo Tigo-Pesa
                                </label> 

                              </div>-->
                            </div>

                            <div class="row">
                              <hr class="no-margin">
                              <div class="panel-body panel-box voda-container" style="background: rgb(251, 251, 251); border-bottom: 1px solid rgb(208, 208, 208); display: none;">
                                <div class="row">
                                  <div class="form-group col-md-6 col-md-push-3">
                                    <label class="control-label">
                                      Namba ya simu
                                    </label>
                                    <input class="form-control pay-number" placeholder="Andika namba yako ya vodacom" name="phone_number" type="text">
                                    <small class="text-muted">
                                      Namba ya malipo ya Vodacom M-Pesa
                                    </small>
                                  </div>
                                </div>
                                <p>
                                  Baada ya kubofya button ya ticket,
                                  Utatumiwa maombi ya kukamilisha malipo kwa simu yako ya Vodacom M-Pesa
                                </p>
                              </div>
                              <div class="panel-body panel-box tigo-container" style="background: rgb(251, 251, 251); border-bottom: 1px solid rgb(208, 208, 208); display: none;">
                                <div class="row">
                                  <div class="form-group col-md-6 col-md-push-3">
                                    <label class="control-label">
                                      Namba ya simu
                                    </label>
                                    <input class="form-control pay-number" placeholder="Andika namba yako ya tigopesa" name="phone_number" type="text">
                                    <small class="text-muted">
                                      Namba ya malipo ya Tigo Pesa
                                    </small>
                                  </div>
                                </div>
                                <p>
                                  Baada ya kubofya button ya ticket,
                                  Utatumiwa maombi ya kukamilisha malipo kwa simu yako ya Tigo Pesa
                                </p>
                              </div>
                            </div>
                            <hr>
                            <!-- <div class="form-group">
                              <div class="checkbox">
                                <label class="text-black text-regular small">
                                  <input name="confirm" type="checkbox" value="1">Nimesoma na kukubaliana na
                                  <a href="https://shabiby.co.tz/pages/terms-of-service" target="_blank"> Masharti
                                    ya Huduma </a> na <a target="_blank" href="https://shabiby.co.tz/pages/privacy">Sera
                                    ya Faragha</a>
                                </label>
                              </div>
                            </div> -->
                            <div class="panel-footer bg-white">

                              <a onclick="prevTab('customer')" aria-expanded="false" class="btn">
                                <small><i class="icon-arrow-left12">Nyuma</i></small>
                              </a>


                              

                            </div>
                          </fieldset>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
            </div>

            </form>

            <!-- </div> -->



            <!-- contact section -->

            <div class="col-lg-4 ml-auto" data-aos="fade-up" data-aos-delay="100">
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
                    <li class="d-block mb-3"><span class="d-block text-black">Phone:</span><span>+<?php echo htmlentities($row['MobileNumber']); ?></span></li>
                    <li class="d-block mb-3"><span class="d-block text-black">Email:</span><span><?php echo htmlentities($row['Email']); ?></span></li>
                  <?php } ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


  </div>





  <?php include_once('includes/footer.php'); ?>

  </div>

  <script src="../js/jquery-3.3.1.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/owl.carousel.min.js"></script>
  <script src="../js/jquery.sticky.js"></script>
  <script src="../js/jquery.validate.min.js"></script>
  <script src="../js/jquery.waypoints.min.js"></script>
  <script src="../js/jquery.animateNumber.min.js"></script>
  <script src="../js/jquery.fancybox.min.js"></script>
  <script src="../js/jquery.easing.1.3.js"></script>
  <script src="../js/aos.js"></script>
  <!-- <script src="mickey.js"></script> -->
  <script src="../js/main.js"></script>
  <script>
    function nextTab(tabId) {
      const currentActiveTab = document.querySelector('.tab-pane.active');
      currentTabId = currentActiveTab.id
      if (!validateTab(currentTabId)) {
        console.log('if-validateTab');
        return;
      }
      
      currentActiveTab.classList.remove('active');

      const nextTab = document.getElementById(tabId);
      nextTab.classList.add('active');

      const currentTabNavLink = document.querySelector('.nav-link.active[href="#${currentActiveTab.id}"]');
      const nextTabNavLink = document.querySelector('.nav-link[href="#${tabId}"]');

      currentTabNavLink.classList.remove('active');
      currentTabNavLink.setAttribute('aria-selected', 'false');

      nextTabNavLink.classList.add('active');
      nextTabNavLink.setAttribute('aria-selected', 'true');
      
    }
    function confirm(){
      submitSilently();
      nextTab('confirm');
    }

    function validateTab(tabId) {

      let isValid = true;
      let errorMessage = "";
      const seatError = document.getElementById('noSelectedSeats');
      const firstNameError = document.getElementById('fnerror');
      const lastNameError = document.getElementById('lnerror');
      const phoneError = document.getElementById('perror');
      const emailError = document.getElementById('eerror');
      const passportError = document.getElementById('pperror');
      const yellowfeverError = document.getElementById('yferror');
      console.log('validateTab');
      if (tabId === 'seat') {

        const selectedSeats = document.querySelectorAll('.selected');
        console.log(selectedSeats.length);
        if (selectedSeats.length === 1) {
          
          isValid = false;
          errorMessage = 'Please select a seat.';
          console.log('Please select');
      const errorContainer = document.getElementById('noSelectedSeats');
     
        errorContainer.textContent = errorMessage;
        errorContainer.style.display = 'block';
      
        }else{
          seatError.textContent = '';
        seatError.style.display = 'none';
        }
      }else if(tabId === 'customer'){

        const firstname = document.querySelector('input[name="first_name"]').value.trim();
        const lastname = document.querySelector('input[name="last_name"]').value.trim();
        const phone = document.querySelector('input[name="phone"]').value.trim();
        const email = document.querySelector('input[name="email"]').value.trim();

        if(firstname === '' || lastname === '' || phone === '' || email === '') {
          isValid =false;
          errorMessage = 'Please fill in all required fields.';
        }
      }else if(tabId === 'confirm'){
        const phone = document.querySelector('input[name="phone"]').value.trim();
      }
      console.log('You did everything right');
      // const errorContainer = document.getElementById('${tabId}-error');
      // if(!isValid){
      //   errorContainer.textContent = errorMessage;
      //   errorContainer.style.display = 'block';
      // }else {
      //   errorContainer.textContent = '';
      //   errorContainer.style.display = 'none';
      // }


      return isValid;

    }

    function prevTab(tabId) {
      const currentActiveTab = document.querySelector('.tab-pane.active');
      currentActiveTab.classList.remove('active');

      const prevTab = document.getElementById(tabId);
      prevTab.classList.add('active');

      const currentTabNavLink = document.querySelector('.nav-link.active[href="#${currentActiveTab.id}"]');
      const prevTabNavLink = document.querySelector('.nav-link[href="#${tabId}"]');

      currentTabNavLink.classList.remove('active');
      currentTabNavLink.setAttribute('aria-selected', 'false');

      prevTabNavLink.classList.add('active');
      prevTabNavLink.setAttribute('aria-selected', 'true');
    }


    var selectedSeats = [];

    function updateSelectedSeats() {
      var selectedSeatsList = document.getElementById("selectedSeats");
      selectedSeatsList.innerHTML = "";

      selectedSeats.forEach(function(seatID) {
        var listItem = document.createElement("li");
        listItem.textContent = "Seat " + seatID;
        selectedSeatsList.appendChild(listItem);
        var selectedSeatsInput = document.getElementById("selectedSeatsInput");  
        selectedSeatsInput.value = seatID;      
      });
    }

    function handleSeatSelection(event) {
      var seatID = event.target.id;

      var seatIndex = selectedSeats.indexOf(seatID);
     if(selectedSeats.length = 2){
       if (seatIndex === -1) {
        selectedSeats.push(seatID);
      } else {
        selectedSeats.splice(seatIndex, 1);
      }
     }

      updateSelectedSeats();
    }

    updateSelectedSeats();

    document.addEventListener('DOMContentLoaded', function() {
      const takenSeats = <?php echo $takenSeatsJSON ?>;
      const bookedSeats = <?php echo $bookedSeatsJSON ?>;

      const seats = document.querySelectorAll('.seatCharts-seat');
      console.log(bookedSeats);
      seats.forEach(seat => {
        
        if (takenSeats.includes(seat.id)) {
          seat.classList.add('unavailable');
        } else if (bookedSeats.includes(seat.id)) {
          console.log(seat);
          seat.classList.add('selected');
          seat.style.pointerEvents = "none";
        } else {
          seat.classList.add('available');
        }
        seat.addEventListener('click', function() {
          if (this.classList.contains('available') && selectedSeats < 2) {
            this.classList.remove('available');
            this.classList.add('selected');

            var seatIndex = selectedSeats.indexOf(this.id);
            if (seatIndex === -1) {
              selectedSeats.push(this.id);
            } else {
              selectedSeats.splice(seatIndex, 1);
            }
            updateSelectedSeats();

            console.log('Selected seat:', this.id);
          } else if (this.classList.contains('selected')) {
            this.classList.remove('selected');
            this.classList.add('available');

            var seatIndex = selectedSeats.indexOf(this.id);
            if (seatIndex === -1) {
              selectedSeats.push(this.id);
            } else {
              selectedSeats.splice(seatIndex, 1);
            }
            updateSelectedSeats();

            console.log('Deselected seat:', this.id);
          }
        });
      });
    });
    function submitSilently(){
    const form = document.getElementById('booking-form');

     // Get and clean form data
     var formData = {
        seat_id: cleanInput(document.getElementById('seat_id').value),
        first_name: cleanInput(document.getElementById('first_name').value),
        last_name: cleanInput(document.getElementById('last_name').value),
        phone: cleanInput(document.getElementById('phone').value),
        passport_number: cleanInput(document.getElementById('passport_number').value),
      };


    fetch('submit.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(formData),
      })
      .then(response => response.json())
      .then(data => {
        // Handle the response from the server
        console.log(data);
        // You can update the DOM or perform other actions based on the response
      })
      .catch(error => console.error('Error:', error));
    }

    function cleanInput(value) {
      // Implement your data cleaning logic here
      // For simplicity, we're using trim() to remove leading and trailing whitespaces
      return value.trim();
    }
  </script>
  <!-- <script>

    var seatElements = document.querySelectorAll(".seat");
    seatElements.forEach(function(seat){
      seat.addEventListener('click', handleSeatSelection);
    });

   
  </script> -->
  <script>
    $(document).ready(function() {
      jQuery.validator.addMethod("regex", function(value, element, regex) {

        return regex.test(value);

      }, "Please write  a valid phone number");

      var bookForm = $('#booking-form').validate({
        ignore: [],
        rules: {
          seat: {
            required: true,
          },
          first_name: {
            required: true,
            lettersonly: true,
          },
          last_name: {
            required: true,
            lettersonly: true,
          },
          email: {
            email: true,
          },
          phone: {
            required: true,
            regex: /^(\+?255|0|^){1}?([67|22]{1}[13456789|2]{1}[0-9]{1}|[6]{1}[57]{1}[2-9]{1}[0-9]{6}){1}?([0-9]{6})$/,
          },
          confirm: {
            required: true,
          }
        },
        messages: {
          seat: "Tafadhali chagua kiti kuendelea",
          email: {

            email: "Tafadhali weka barua pepe halali"
          },
          first_name: {
            required: 'Tafadhali weka jina lako la kwanza',
            lettersonly: "Jina linaweza tu kuwa na maneno tu",
          },
          last_name: {
            required: 'Tafadhali weka jina lako la mwisho',
            lettersonly: "Jina linaweza tu kuwa na maneno tu",
          },
          phone: {
            required: "Tafadhali weka namba yako ya simu",
          },
          confirm: {
            required: "Lazima ukubaliana na masharti yetu"
          }
        },
        focusInvalid: true,
        focusCleanup: true,
        errorElement: "small",
        errorClass: "text-danger",
        errorPlacement: function(error, element) {
          error.appendTo(element.parents(".form-group").addClass('has-error'));
        }
      });

      var customer = $("#customer");

      var wizard = $('#booking-step');

      var confirm = $("#confirm");

      var schedule = $("#seat");

      $(wizard).bootstrapWizard({
        tabClass: 'nav nav-tabs',
        onNext: function(tab, navigation, index) {

          var noErrors = true;

          cleanErrors(tab);

          if (index == 1) {

            var seat = $(schedule).find("input[name=seat]");

            if (!bookForm.element(seat)) {

              noErrors = false;
            }
          }

          if (index == 2) {13

            $(customer).find('input').each(function(key, field) {

              if (!bookForm.element(field)) {

                noErrors = false;
              }

            });
          }

          return noErrors;
        },

        onTabShow: function(tab, navigation, index) {

          cleanErrors(tab);

          return false;
        },
        onTabClick: function(tab, navigation, index) {

          return false;

        },

        onFinish: function(tab, navigation, index) {

          var noErrors = true;

          $(confirm).find('input').each(function(key, field) {

            if (!bookForm.element(field)) {

              noErrors = false;
            }

          });

          if (!bookForm.element($(schedule).find("input[name=seat]"))) {

            toastr['error']('Sorry your selected seat has just been booked, please pick another seat to continue', 'Selected seat not available');

            return false;
          }

          if (noErrors) {

            var submitButton = $('form button[type=submit]');

            if (submitButton.data('submitted') === 0) {

              $('form#booking-form').submit();

              submitButton.data('submitted', 1);

            } else if (submitButton.data('submitted') === 1) {

              //toastr['info']('Your booking is being processed..', 'Please wait');
            }
          }
        },
        onTabChange: function(tab, navigation, index) {

        }

      });

      function cleanErrors(tab) {

        $(tab).find('small.text-danger').remove();
        $(tab).find('.form-group').removeClass('has-error');
      }

    });
  </script>


</body>

</html>