<?php
session_start();
?>
<?php

$crop_name=$_GET['name']; 
?>
<?php
// adding the header
include 'header1.php';
// database connector
$link=mysqli_connect("localhost","root","","crop_recommender");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>crop_regions</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/CDNJS-Search-Final-1.css">
    <link rel="stylesheet" href="assets/css/CDNJS-Search-Final.css">
    <link rel="stylesheet" href="assets/css/Data-Table-with-Search-Sort-Filter-and-Zoom-using-TableSorter.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/css/theme.bootstrap_4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <link rel="stylesheet" href="assets/css/Bootstrap-DataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<!-- receiving data from crop_list page -->
<?php
$rainfall_value=$_SESSION['rainfall'];
$temperature_value=$_SESSION['temperature'];
$min_temp=$temperature_value-5;
$max_temperature=$temperature_value+5;
$min_rainfall=$rainfall_value - 10;
$max_temperature=$rainfall_value + 10;
?>
<body><div class="bootstrap_datatables">
<div class="container py-5">
  <div class="row py-5">
    <div class="col-lg-10 mx-auto">
      <div class="card rounded shadow border-0">
        <div class="card-body p-5 bg-white rounded">
          <div class="table-responsive">
            <table id="example" style="width:100%" class="table table-striped table-bordered">
              <thead>
                <tr class="txt-center text-primary">regions likely to grow <?php echo $crop_name?></tr>
                <tr>
                  <th>Name</th>
                  <th>Rainfall</th>
                  <th>Temperature</th>
                  <th>Other crops</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $regions=mysqli_query($link,"select * from region where temperature >='" . $min_temp ."' AND temperature <='" . $max_temperature ."'");
                ?>
<?php
while ($selected_regions=mysqli_fetch_array($regions)) {
    ?>
    <?php
    $region_name=$selected_regions['name'];
    $rainfall=$selected_regions['rainfall'];
    $temperature=$selected_regions['temperature'];
    ?>

<!-- modal starts here -->
<div>
        <div role="dialog" tabindex="-5" class="modal fade" id="<?php echo $region_name?>">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title text-success text-success"><i class="fa fa-crop"></i>
                             Recommended crops for <?php echo $region_name?></h3>
                            <button type="button" class="close" 
                            data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                    </div>
    <div class="modal-body">
        <div class="row">
        <div class="col padMar margenesCajas">
    <p class="text-primary text-bold text-center p-0 m-0 p-2">
    THE FOLLOWING ARE CLIMATE DETAILS FOR <?php echo $region_name?>.</p>
                            </div>
                        </div>
                        <!-- ------------------- -->
<form method="POST" action="crop_lists.php">
    <!-- region input starts here -->
    <div class="form-group">
        <label for="region" class="text-bold text-primary">region</label>
        <input class="form-control is-valid bg-light border rounded border-secondary shadow-sm form-control d-table" 
        type="text" data-toggle="tooltip" data-bs-tooltip=""
         data-placement="right" name="region" id="region"
         placeholder="<?php echo $region_name ?>" 
         title="Enter rainfall values" value="<?php echo $region_name ?>">
        </div>
        <!-- == -->
            <!-- region inputs ends here -->
    <div class="form-group">
        <label for="rainfall" class="text-bold text-info">rainfall</label>
        <input class="form-control is-valid bg-light border rounded border-secondary shadow-sm form-control d-table" 
        type="number" data-toggle="tooltip" data-bs-tooltip=""
         data-placement="right" name="rainfall" id="rainfall"
         placeholder="<?php echo $rainfall ?>" 
         title="Enter rainfall values" value="<?php echo $rainfall ?>">
        </div>
        <!-- == -->
        <div
        class="form-group">
        <label for="temperature" class="text-bold text-info">Temperature</label>
        <input class="form-control is-valid" type="number" id="temperature"
        name="temperature" placeholder="<?php echo $temperature ?>" value="<?php echo $temperature ?>"></div>
            <p class="text-center text-bold text-danger">Do you to check recommended crops that can be grown together with <?php echo $crop_name?> at <?php echo $region_name?>?</p>
            <div class="form-group"><button class="btn btn-success btn-block"
                 type="submit">yes&nbsp;</button>
                 <button class="btn btn-success btn-block"
                 type="button" data-dismiss="modal">No&nbsp;</button>
                 </div>
</form>
                        <!-- --------------------------- -->
                        <script src="assets/js/jquery.min.js"></script>
                        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
                        <script src="assets/js/bs-init.js"></script>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- modal ends here -->

                    <tr>
                  <td><?php echo $region_name?></td>
                  <td><?php echo $rainfall?></td>
                  <td><?php echo $temperature?></td>
                  <td><button class="btn btn-success btn-centre" type="button" 
                        data-toggle="modal" data-target="#<?php echo $region_name?>">Click to view</button></td>
                </tr>
    <?php
}
?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/js/Bootstrap-DataTables.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.4/lodash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
    <script src="assets/js/CDNJS-Search-Final.js"></script>
    <script src="assets/js/Data-Table-with-Search-Sort-Filter-and-Zoom-using-TableSorter.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/jquery.tablesorter.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/widgets/widget-filter.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/widgets/widget-storage.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
include 'footer.html';
?>