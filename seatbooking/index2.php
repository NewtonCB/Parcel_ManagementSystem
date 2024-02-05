<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (isset($_POST['submit'])) {


  $nocomplain = $_POST['nocomplain'];
  $trackingnum = $_POST['trackingnum'];
  $issuedes = $_POST['issuedes'];
  $ticnum = mt_rand(100000, 999999);

  $sql = mysqli_query($con, "select ID from tblcourier where RefNumber='$trackingnum'");
  $row = mysqli_num_rows($sql);
  if ($row > 0) {
    $query = mysqli_query($con, "insert into tblcomplains(TicketNumber,TrackingNumber,NatureofComplain,IssuesDesc) value('$ticnum','$trackingnum','$nocomplain','$issuedes')");
    if ($query) {
      echo '<script>alert("Your ticket has been generated. Ticket Number is "+"' . $ticnum . '")</script>';
      echo "<script>window.location.href ='index.php'</script>";
    } else {
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
  <link rel="stylesheet" href="mickeys.css">


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


    <?php include_once('includes/header.php'); ?>

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
          <div class="col-sm-8 mb-5" data-aos="fade-up" data-aos-delay="100">
            <!-- <div class="card p-3 shadow-sm">
              <?php
              // (A) FIXED IDS FOR THIS DEMO
              $sessid = 1;
              $userid = 999;

              // (B) GET SESSION SEATS
              require "2-reserve-lib.php";
              $seats = $_RSV->get($sessid);
              ?>

               (C) DRAW SEATS LAYOUT 
              <div id="layout">
                <?php
                foreach ($seats as $s) {
                  $taken = is_numeric($s["user_id"]);
                  printf(
                    "<div class='seat%s'%s>
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



               (D) LEGEND 
              <div id="legend" class="mt-3">
                <div class="seat"></div>
                <div class="txt">Open</div>
                <div class="seat taken"></div>
                <div class="txt">Taken</div>
                <div class="seat selected"></div>
                <div class="txt">Your Selected Seats</div>
              </div>

               (E) SAVE SELECTION 
              <form id="ninja" method="post" action="4-save.php">
                <input type="hidden" name="sessid" value="<?= $sessid ?>">
                <input type="hidden" name="userid" value="<?= $userid ?>">
              </form>

              <button id="go" onclick="reserve.save()" class="btn btn-primary mt-3">
                <img src="img/seat_icon.png" alt="Bus Seat" class="bus-seat-icon">
                Reserve Seats
              </button>

            </div> -->
            <!-- <div class="card p-3 shadow-sm"> -->
              <form method="POST" action="https://shabiby.co.tz/bus-schedules/BS-2498516143/add-booking" accept-charset="UTF-8" id="booking-form" novalidate="novalidate"><input name="_token" type="hidden" value="8hwR8o5UYEW0OCATrp2PQPVTaL6qnbSxWS9CkMDl">
                <div class="panel booking-wizard" style="border: 1px solid #e6e6e6">
                  <div class="navbar">
                    <div class="navbar-inner" style="position: relative">
                      <div class="liner"></div>
                      <ul class="nav-justified  nav-tabs-justified nav nav-tabs nav-steps">
                        <li class="active"><a href="#seat" data-toggle="tab" aria-expanded="true">
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
                        <li><a href="#confirm" data-toggle="tab">
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
                        <div class="tab-pane   active" id="seat">

                          <fieldset>
                            <legend class="no-padding-top text-muted">
                              <small class="text-black">Chagua Kiti Chako</small>
                              <br>
                              <span style="text-transform: none"><i>
                                  Chagua kiti kwa kubonyeza alama ya kiti unachohitaji
                                </i></span>
                            </legend>
                            <div class="row" id="seat-chart-BS-2498516143">
                              <div class="col-md-12 col-xs-12">
                                <div class="row">
                                  <div class="col-sm-6 seatChart-wrapper col-xs-6" style="border-right: 1px solid #ddd">
                                    <p class="text-center no-margin-bottom visible-md text-bold-500 small text-muted">
                                      MBELE</p>
                                    <div class="seatCharts-row">
                                      <div class="seatCharts-cell seatCharts-space"></div>
                                      <div class="seatCharts-cell seatCharts-space"></div>
                                      <div class="seatCharts-cell seatCharts-space"></div>
                                      <div class="seatCharts-cell seatCharts-space"></div>
                                      <div class="seatCharts-cell seatCharts-space">
                                        <span title="Kiti cha dereva" class="icon-steering-wheel text-muted"></span>
                                      </div>
                                    </div>
                                    <div id="seat-chart" class="seatCharts-container" tabindex="0" aria-activedescendant="G1">
                                      <div class="seatCharts-row">
                                        <div id="A3" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available">A3</div>
                                        <div id="A4" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available">A4</div>
                                        <div class="seatCharts-cell seatCharts-space"></div>
                                        <div id="A2" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available">A2</div>
                                        <div id="A1" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available">A1</div>
                                      </div>
                                      <div class="seatCharts-row">
                                        <div id="B3" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available">B3</div>
                                        <div id="B4" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available">B4</div>
                                        <div class="seatCharts-cell seatCharts-space"></div>
                                        <div id="B2" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available">B2</div>
                                        <div id="B1" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available">B1</div>
                                      </div>
                                      <div class="seatCharts-row">
                                        <div id="C3" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available">C3</div>
                                        <div id="C4" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available">C4</div>
                                        <div class="seatCharts-cell seatCharts-space"></div>
                                        <div id="C2" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available">C2</div>
                                        <div id="C1" role="checkbox" aria-checked="true" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell selected">C1</div>
                                      </div>
                                      <div class="seatCharts-row">
                                        <div id="D3" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available">D3</div>
                                        <div id="D4" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available">D4</div>
                                        <div class="seatCharts-cell seatCharts-space"></div>
                                        <div id="D2" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available">D2</div>
                                        <div id="D1" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available">D1</div>
                                      </div>
                                      <div class="seatCharts-row">
                                        <div id="E3" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available">E3</div>
                                        <div id="E4" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available">E4</div>
                                        <div class="seatCharts-cell seatCharts-space"></div>
                                        <div id="E2" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available">E2</div>
                                        <div id="E1" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available">E1</div>
                                      </div>
                                      <div class="seatCharts-row">
                                        <div id="F3" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available">F3</div>
                                        <div id="F4" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available">F4</div>
                                        <div class="seatCharts-cell seatCharts-space"></div>
                                        <div id="F2" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available">F2</div>
                                        <div id="F1" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available">F1</div>
                                      </div>
                                      <div class="seatCharts-row">
                                        <div id="G3" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available">G3</div>
                                        <div id="G4" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available">G4</div>
                                        <div class="seatCharts-cell seatCharts-space"></div>
                                        <div id="G2" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available">G2</div>
                                        <div id="G1" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available">G1</div>
                                      </div>
                                      <div class="seatCharts-row">
                                        <div id="H3" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available">H3</div>
                                        <div id="H4" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available">H4</div>
                                        <div class="seatCharts-cell seatCharts-space"></div>
                                        <div id="H2" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available">H2</div>
                                        <div id="H1" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available">H1</div>
                                      </div>
                                      <div class="seatCharts-row">
                                        <div id="I3" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available">I3</div>
                                        <div id="I4" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available">I4</div>
                                        <div class="seatCharts-cell seatCharts-space"></div>
                                        <div id="I2" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available">I2</div>
                                        <div id="I1" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available">I1</div>
                                      </div>
                                      <div class="seatCharts-row">
                                        <div id="J3" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available">J3</div>
                                        <div id="J4" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available">J4</div>
                                        <div class="seatCharts-cell seatCharts-space"></div>
                                        <div id="J2" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available">J2</div>
                                        <div id="J1" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available">J1</div>
                                      </div>
                                      <div class="seatCharts-row">
                                        <div id="K3" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available">K3</div>
                                        <div id="K4" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available">K4</div>
                                        <div class="seatCharts-cell seatCharts-space"></div>
                                        <div id="K2" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available">K2</div>
                                        <div id="K1" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available">K1</div>
                                      </div>
                                      <div class="seatCharts-row">
                                        <div id="L3" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available">L3</div>
                                        <div id="L4" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available">L4</div>
                                        <div class="seatCharts-cell seatCharts-space"></div>
                                        <div id="L2" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available">L2</div>
                                        <div id="L1" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available">L1</div>
                                      </div>
                                      <div class="seatCharts-row">
                                        <div id="M3" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available">M3</div>
                                        <div id="M4" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available">M4</div>
                                        <div class="seatCharts-cell seatCharts-space"></div>
                                        <div id="M2" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available">M2</div>
                                        <div id="M1" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available">M1</div>
                                      </div>
                                      <div class="seatCharts-row">
                                        <div id="N3" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available">N3</div>
                                        <div id="N4" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available">N4</div>
                                        <div id="N5" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available">N5</div>
                                        <div id="N2" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available">N2</div>
                                        <div id="N1" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available">N1</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-sm-6 col-xs-6">
                                    <fieldset>
                                      <legend class="no-padding-top text-muted">
                                        <small class="text-black">Taarifa za Machaguo
                                        </small>
                                      </legend>
                                    </fieldset>
                                    <div class="booking-details">
                                      <p class="text-bold-500 small mb-5">
                                        Kiti kilichochaguliwa:
                                        <span id="selected">
                                          C1
                                        </span>
                                      </p>
                                      <div class="form-group mb-10">
                                        <input name="seat" type="hidden" value="C1">
                                      </div>
                                      <hr class="mt-10">
                                    </div>
                                    <div id="legend" class="text-size-mini seatCharts-legend">
                                      <ul class="seatCharts-legendList">
                                        <li class="seatCharts-legendItem">
                                          <div class="seatCharts-seat seatCharts-cell available"></div><span class="seatCharts-legendDescription">Kilichopo</span>
                                        </li>
                                        <li class="seatCharts-legendItem">
                                          <div class="seatCharts-seat seatCharts-cell selected"></div><span class="seatCharts-legendDescription">Kilichocchaguliwa</span>
                                        </li>
                                        <li class="seatCharts-legendItem">
                                          <div class="seatCharts-seat seatCharts-cell unavailable"></div><span class="seatCharts-legendDescription">Kisichopatikana</span>
                                        </li>
                                      </ul>
                                    </div>
                                    <br>
                                    <fieldset>
                                      <legend class="no-padding-top text-muted">
                                        <small class="text-black">
                                          Kituo utakapopanda basi
                                        </small>
                                      </legend>
                                      <div class="form-group">
                                        <div class="btn-group bootstrap-select show-tick form-control dropup"><button type="button" class="btn dropdown-toggle bs-placeholder default" data-toggle="dropdown" role="button" title="Chagua kituo cha kupandia basi"><span class="filter-option pull-left">Chagua kituo cha kupandia basi</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button>
                                          <div class="dropdown-menu open" role="combobox">
                                            <div class="popover-title"><button type="button" class="close" aria-hidden="true">×</button>Vituo vya basi</div>
                                            <ul class="dropdown-menu inner" role="listbox" aria-expanded="false">
                                              <li data-original-index="1"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Dodoma Stand</span><span class="glyphicon  check-mark"></span></a></li>
                                              <li data-original-index="2"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Ihumwa</span><span class="glyphicon  check-mark"></span></a></li>
                                              <li data-original-index="3"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Chamwino Ikulu</span><span class="glyphicon  check-mark"></span></a></li>
                                              <li data-original-index="4"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Mbande</span><span class="glyphicon  check-mark"></span></a></li>
                                              <li data-original-index="5"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Narco</span><span class="glyphicon  check-mark"></span></a></li>
                                              <li data-original-index="6"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Kibaigwa</span><span class="glyphicon  check-mark"></span></a></li>
                                              <li data-original-index="7"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Morogoro</span><span class="glyphicon  check-mark"></span></a></li>
                                              <li data-original-index="8"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Gairo Mjini</span><span class="glyphicon  check-mark"></span></a></li>
                                              <li data-original-index="9"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Mtumba</span><span class="glyphicon  check-mark"></span></a></li>
                                            </ul>
                                          </div><select name="boarding_point" class="selectpicker form-control dropup" data-header="Vituo vya basi" data-title="Chagua kituo cha kupandia basi" tabindex="-98">
                                            <option class="bs-title-option" value="">Chagua kituo cha kupandia basi</option>
                                            <option value="416">Dodoma Stand</option>
                                            <option value="417">Ihumwa</option>
                                            <option value="422">Chamwino Ikulu</option>
                                            <option value="423">Mbande</option>
                                            <option value="425">Narco</option>
                                            <option value="419">Kibaigwa</option>
                                            <option value="447">Morogoro</option>
                                            <option value="386">Gairo Mjini</option>
                                            <option value="421">Mtumba</option>
                                          </select>
                                        </div>
                                      </div>
                                    </fieldset>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </fieldset>




                        </div>
                        <div class="tab-pane" id="customer">
                          <fieldset>
                            <legend class="no-padding-top text-muted">
                              <small class="text-black">Taarifa za abiria</small>
                              <br>
                              <span style="text-transform: none"><i>Tafadhali jaza seheme zote zenye ulazima hapo chini</i></span>
                            </legend>

                            <div class="col-sm-6">
                              <div class="row">
                                <div class="form-group has-feedback">
                                  <label class="control-label">
                                    Jina la Kwanza
                                  </label>
                                  <input class="form-control" placeholder="Jina la kwanza" name="first_name" type="text">
                                  <span class="fa fa-user form-control-feedback"></span>
                                </div>
                                <div class="form-group has-feedback">
                                  <label class="control-label">
                                    Jina la Mwisho
                                  </label>
                                  <input class="form-control" placeholder="Jina la mwisho" name="last_name" type="text">
                                  <span class="fa fa-user form-control-feedback"></span>
                                </div>
                                <div class="form-group has-feedback">
                                  <label class="control-label">
                                    Namba ya Simu
                                  </label>
                                  <input class="form-control" placeholder="(000) 0000000" name="phone" type="text">
                                  <span class="fa fa-phone form-control-feedback"></span>
                                </div>
                                <div class="form-group has-feedback">
                                  <label class="control-label">
                                    Barua Pepe
                                  </label>
                                  <input class="form-control" placeholder="example@domain.com" name="email" type="text">
                                  <span class="fa fa-envelope form-control-feedback"></span>
                                </div>
                                <div class="form-group has-feedback">
                                  <label class="control-label">
                                    Namba ya TIN (<small>Kama ipo</small>)
                                  </label>
                                  <input class="form-control" placeholder="Namba ya TIN kama ipo" name="tin_number" type="text">
                                  <span class="fa fa-envelope form-control-feedback"></span>
                                </div>
                              </div>
                            </div>

                          </fieldset>
                        </div>
                        <div class="tab-pane" id="confirm">
                          <fieldset>
                            <legend class="no-padding-top text-muted">
                              <small class="text-black">Muhtasari wa malipo</small>
                              <br>
                              <span style="text-transform: none"><i> Kagua na uhakikishe taarifa za malipo
                                  maelezo ya ili kuhifadhi tiketi yako</i></span>
                            </legend>
                            <div class="alert small alert-grayish">
                              <span>
                                <b>Muhimu:</b> Utakuwa na dakika 20 ili kukamilisha malipo ya tiketi, kushindwa kufanya hivyo kutasababisha kufuta moja kwa moja taarifa za tiketi yako
                              </span>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <h6 style="font-size: 15px"><b>Bei ya tiketi</b> :
                                  29,000 /=
                                </h6>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label class="control-label">
                                    Namba ya punguzo
                                  </label>
                                  <input class="form-control" placeholder="Andika namba ya punguzo lako" name="discount" type="text">
                                  <small class="text-muted">Kama una namba yoyote ya punguzo
                                  </small>
                                </div>
                              </div>
                            </div>
                          </fieldset>

                          <fieldset>

                            <legend class="no-padding-top text-muted">
                              <small class="text-black">Njia ya Malipo</small>
                              <br>
                              <span style="text-transform: none"><i> Chagua njia ya malipo unayohitaji</i></span>
                            </legend>
                            <div class="form-group text-center">
                              <div class="radio">
                                <label class="radio-inline" title="Pay with TigoPesa">
                                  <input data-method="tigo-container" name="method" type="radio" value="1">
                                  Tigo Pesa
                                  <br>
                                </label>
                                <label class="radio-inline" title="Pay with Vodacom Mpesa">
                                  <input data-method="voda-container" name="method" type="radio" value="2">
                                  Vodacom M-Pesa

                                </label>

                                <label class="radio-inline" title="Pay with Vodacom Mpesa">
                                  <input name="method" type="radio" value="5">
                                  Njia Nyingine
                                </label>

                              </div>
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
                            <div class="form-group">
                              <div class="checkbox">
                                <label class="text-black text-regular small">
                                  <input name="confirm" type="checkbox" value="1">Nimesoma na kukubaliana na
                                  <a href="https://shabiby.co.tz/pages/terms-of-service" target="_blank"> Masharti
                                    ya Huduma </a> na <a target="_blank" href="https://shabiby.co.tz/pages/privacy">Sera
                                    ya Faragha</a>
                                </label>
                              </div>
                            </div>
                          </fieldset>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="panel-footer bg-white">
                    <ul class="pager wizard">
                      <li class="previous first disabled" style="display:none;"><a class="btn  default" href="javascript:;">
                          <small>Mwanzo <i class="icon-arrow-right13"></i></small>
                        </a>
                      </li>
                      <li class="previous disabled"><a href="javascript:;" class="btn default">
                          <small><i class="icon-arrow-left12"></i>Nyuma</small>
                        </a>
                      </li>
                      <li class="last" style="display:none;"><a class="btn red" href="javascript:;">Mwisho</a></li>
                      <li class="next"><a class="btn  grayish" href="javascript:;">
                          <small>Hatua Ifuatayo <i class="icon-arrow-right13"></i></small>
                        </a></li>
                      <li class="finish hidden">
                        <button type="submit" data-submitted="0" data-processing-text="<small class='fa fa-spinner fa-pulse'></small>&nbsp;Inashughulikia ombi .. " class="btn btn-sm pull-right primary">
                          Thibitisha Taarifa

                        </button>
                      </li>
                    </ul>
                  </div>
                </div>

              </form>
            <!-- </div> -->
          </div>


          <!-- contact section -->

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





  <?php include_once('includes/footer.php'); ?>

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