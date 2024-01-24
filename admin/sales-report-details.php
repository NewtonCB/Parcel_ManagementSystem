<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['cmsaid']==0)) {
  header('location:logout.php');
  } else{



  ?>
<!doctype html>
<html lang="en">

    <head>
        <title>Sales Report</title>

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
       
 <?php include_once('includes/header.php');?>
           <?php include_once('includes/leftbar.php');?>
           
           <div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title">Sales Report</h4>
                        <?php
                        $fdate = $_POST['fromdate'];
                        $tdate = $_POST['todate'];
                        $rtype = $_POST['requesttype'];
                        ?>
                        <h5 align="center" style="color:blue">Sales Report from <?php echo $fdate ?> to <?php echo $tdate ?></h5>
                        <hr />
                        <?php if ($rtype == "dtwise") { ?>
                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>S.NO</th>
                                        <th>Date</th>
                                        <th>TZS Amount</th>
                                        <th>S.A Amount</th>
                                    </tr>
                                </thead>
                                <?php
                                $ret = mysqli_query($con, "select date(CourierDate) as cdate,sum(TZSrice) as TZSsum,sum(ZARrice) as ZARsum from tblcourier where CourierDate between '$fdate' and '$tdate' group by cdate");
                                $cnt = 1;
                                while ($row = mysqli_fetch_array($ret)) {
                                ?>
                                    <tr>
                                        <td><?php echo $cnt; ?></td>
                                        <td><?php echo $row['cdate']; ?></td>
                                        <td><?php echo $ttlsl = $row['TZSsum']; ?></td>
                                        <td><?php echo $ttlsl = $row['ZARsum']; ?></td>
                                    </tr>
                                    <?php
                                    $totalsales += $ttlsl;
                                    $cnt = $cnt + 1;
                                }
                                    ?>
                                <tr>
                                    <th colspan="2" style="text-align:center">Total Amount</th>
                                    <td><?php echo $totalsales; ?></td>
                                </tr>
                            </table>
                            <!-- Add export buttons -->
                            <div style="text-align: center; margin-top: 20px;">
                                <button onclick="exportToExcel('datatable', 'sales_report')">Export to Excel</button>
                                <button onclick="exportToPdf('datatable', 'sales_report')">Export to PDF</button>
                            </div>
                        <?php } elseif ($rtype == "mtwise") { ?>
                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>S.NO</th>
                                        <th>Date</th>
                                        <th>TZS Amount</th>
                                        <th>S.A Amount</th>
                                    </tr>
                                </thead>
                                <?php
                                $ret = mysqli_query($con, "select month(CourierDate) as rmonth,year(CourierDate) as ryear,sum(TZSprice) as TZSsum,sum(ZARprice) as ZARsum from tblcourier where CourierDate between '$fdate' and '$tdate' group by rmonth,ryear");
                                $cnt = 1;
                                while ($row = mysqli_fetch_array($ret)) {
                                ?>
                                    <tr>
                                        <td><?php echo $cnt; ?></td>
                                        <td><?php echo $row['rmonth'] . "-" . $row['ryear']; ?></td>
                                        <td><?php echo $ttlsl = $row['TZSsum']; ?></td>
                                        <td><?php echo $ttlsl = $row['ZARsum']; ?></td>
                                    </tr>
                                    <?php
                                    $totalsales += $ttlsl;
                                    $cnt = $cnt + 1;
                                }
                                    ?>
                                <tr>
                                    <th colspan="2" style="text-align:center">Total income</th>
                                    <td><?php echo $totalsales; ?></td>
                                </tr>
                            </table>
                            <!-- Add export buttons -->
                            <div style="text-align: center; margin-top: 20px;">
                                <button onclick="exportToExcel('datatable', 'sales_report')">Export to Excel</button>
                                <button onclick="exportToPdf('datatable', 'sales_report')">Export to PDF</button>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div> <!-- end row -->
        </div>
    </div>
</div>

<script>
    function exportToExcel(tableId, filename) {
        var table = document.getElementById(tableId);
        var html = table.outerHTML;
        var blob = new Blob([html], {
            type: 'application/vnd.ms-excel'
        });
        var a = document.createElement('a');
        a.href = window.URL.createObjectURL(blob);
        a.download = filename + '.xls';
        a.click();
    }

    function exportToPdf(tableId, filename) {
        var table = document.getElementById(tableId);
        var html = table.outerHTML;
        var style = '<style>';
        style += 'table {width: 100%;font: 17px Calibri;}';
        style += 'table, th, td {border: solid 1px #DDD; border-collapse: collapse;';
        style += 'padding: 2px 3px;text-align: center; vertical-align: middle;}';
        style += '</style>';
        var blob = new Blob([style + html], {
            type: 'application/pdf'
        });
        var a = document.createElement('a');
        a.href = window.URL.createObjectURL(blob);
        a.download = filename + '.pdf';
        a.click();
    }
</script>




       
            

            <?php include_once('includes/footer.php');?>

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
            } );

        </script>

    </body>
</html>
<?php }  ?>