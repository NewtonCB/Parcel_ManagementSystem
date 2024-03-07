<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['cmssid'] == 0)) {
    header('location:logout.php');
} else {



?>
    <!doctype html>
    <html lang="en">

    <head>

        <title>Mkombe Parcel Parcel/Cargo</title>

        <!-- DataTables -->
        <link href="../plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="../plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="../plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Multi Item Selection examples -->
        <link href="../plugins/datatables/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />

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
        <div id="wrapper">
            <!-- Begin page -->

            <?php include_once('includes/header.php'); ?>
            <?php include_once('includes/leftbar.php'); ?>
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title">Parcel/Cargo View</h4>

                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>

                                            <tr>
                                                <th>S.NO</th>
                                                <th>Seat Number</th>
                                                <th>Bus Id</th>
                                                <th>Station</th>
                                                <th>Destination</th>

                                                <th>Action</th>
                                            </tr>

                                        </thead>
                                        <?php
                                        $ret = mysqli_query($con, "select *from seats where is_booked=1 && is_taken=0");
                                        $cnt = 1;
                                        while ($row = mysqli_fetch_array($ret)) {

                                        ?>

                                            <tr>
                                                <!-- <td><?php //echo $cnt; 
                                                            ?></td> -->
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['seat_id']; ?></td>
                                                <td><?php echo $row['bus_id']; ?></td>
                                                <?php if ($row['bus_id'] === 'bus-A') { ?>
                                                    <td>Dar es Salaam</td>
                                                    <td>Johannesburg</td>
                                                <?php } else { ?>
                                                    <td>Johannesburg</td>
                                                    <td>Dar es Salaam</td>
                                                <?php } ?>
                                                <td><a href="seatmanager.php?editid=<?php echo $row['id']; ?>"><button class="btn btn-info waves-effect waves-light w-lg" data-toggle="modal" data-target="#myModal">View Detail</button></a>
                                                    <button class="btn btn-primary waves-effect waves-light w-lg" data-toggle="modal" data-target="#myModal" data-theid="<?php echo $row['id']; ?>" data-seatid="<?php echo $row['seat_id']; ?>" data-busid="<?php echo $row['bus_id']; ?>">Confirm Booking</button>
                                                </td>
                                            </tr>
                                        <?php
                                            $cnt = $cnt + 1;
                                        } ?>


                                    </table>
                                </div>
                            </div>
                        </div> <!-- end row -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Take Action</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form name="submit" method="post" enctype="multipart/form-data">
                                            <table width="100%">
                                                <tr>
                                                    <th>Seat Number :</th>
                                                    <td id="seatNumber"></td>
                                                </tr>
                                                <tr>
                                                    <th>Bus Taken :</th>
                                                    <td id="busTaken"></td>
                                                </tr>
                                                <tr>
                                                    <th>First Name :</th>
                                                    <td>
                                                        Michael
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Last Name :</th>
                                                    <td>
                                                        William
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Phone Number :</th>
                                                    <td>
                                                        0718894777
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Passport Number :</th>
                                                    <td>
                                                        2323461813984738278hfj
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th>Status:</th>
                                                    <td>
                                                        <select name="status" class="form-control wd-450" required="true">
                                                            <option value="Paid" selected="true">Paid</option>
                                                            <option value="Not Paid">Not Paid</option>
                                                        </select>
                                                    </td>
                                                </tr>


                                            </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" name="submit" class="btn btn-success">Confirm</button>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>






            <?php include_once('includes/footer.php'); ?>

        </div>


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

        <!-- Required datatable js -->
        <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="../plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="../plugins/datatables/buttons.bootstrap4.min.js"></script>
        <script src="../plugins/datatables/jszip.min.js"></script>
        <script src="../plugins/datatables/pdfmake.min.js"></script>
        <script src="../plugins/datatables/vfs_fonts.js"></script>
        <script src="../plugins/datatables/buttons.html5.min.js"></script>
        <script src="../plugins/datatables/buttons.print.min.js"></script>

        <!-- Key Tables -->
        <script src="../plugins/datatables/dataTables.keyTable.min.js"></script>

        <!-- Responsive examples -->
        <script src="../plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="../plugins/datatables/responsive.bootstrap4.min.js"></script>

        <!-- Selection table -->
        <script src="../plugins/datatables/dataTables.select.min.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        <script>
            $(document).ready(function() {

                // Default Datatable
                $('#datatable').DataTable();

                //Buttons examples
                var table = $('#datatable-buttons').DataTable({
                    lengthChange: false,
                    buttons: ['copy', 'excel', 'pdf']
                });

                // Key Tables

                $('#key-table').DataTable({
                    keys: true
                });

                // Responsive Datatable
                $('#responsive-datatable').DataTable();

                // Multi Selection Datatable
                $('#selection-datatable').DataTable({
                    select: {
                        style: 'multi'
                    }
                });

                table.buttons().container()
                    .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
            });
        </script>
        <!-- Script for modal -->
        <script>
            $('#myModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var theid = button.data('theid') // Extract info from data-* attributes
                var seatid = button.data('seatid')
                var busid = button.data('busid')
               
                var modal = $(this)
                modal.find('.modal-title').text('Confirming Seat : ' + seatid)
                modal.find('.modal-body #seatNumber').text(seatid)
                modal.find('.modal-body #busTaken').text(busid)
                // modal.find('.modal-body textarea').val(seatid)
            })
        </script>
    </body>

    </html>
<?php }  ?>