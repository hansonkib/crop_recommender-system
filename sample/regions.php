<!-- database connector starts here -->
<?php
$link=mysqli_connect("localhost","root","","crop_recommender");
?>
<!-- database connector ends here -->
<?php
$region_name ="Different Regions";
$title="Climatic conditions for different";
require 'header.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>region lists</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/CDNJS-Search-Final-1.css">
    <link rel="stylesheet" href="assets/css/CDNJS-Search-Final.css">
    <link rel="stylesheet" href="assets/css/Data-Table-with-Search-Sort-Filter-and-Zoom-using-TableSorter.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/css/theme.bootstrap_4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div class="container-auto">

    <div class="container">
        <div class="card" id="TableSorterCard">
            <div class="row table-topper align-items-center">
                <div class="col-4 text-left" style="margin: 0px;padding: 5px 15px;">
                    <button class="btn btn-primary btn-sm reset" type="button" 
                    style="padding: 5px;margin: 2px;">Reset Filters</button>
                    <button class="btn btn-warning btn-sm" id="zoom_in" type="button"
                     zoomclick="ChangeZoomLevel(-10);" style="padding: 5px;margin: 2px;">
                     <i class="fa fa-search-plus"></i></button>
                    <button
                        class="btn btn-warning btn-sm" id="zoom_out" type="button" zoomclick="ChangeZoomLevel(-10);" style="padding: 5px;margin: 2px;"><i class="fa fa-search-minus"></i></button>
                </div>
                <div class="col-4 text-center" style="margin: 0px;padding: 5px 10px;">
                    <h6 id="counter">Showing: <strong id="rowCount">ALL</strong>&nbsp;Region(s)</h6>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div>
                        <table class="table table tablesorter" id="ipi-table">
                            <thead class="thead-primary">
                                <tr>
                                    <th>region</th>
                                    <th class="sorter-false">temperatures</th>
                                    <th class="filter-false">rainfall</th>
                                    <th class="filter-false sorter-false">crops Recommended</th>
                                </tr>
                            </thead>
                            <tbody>
<!-- displaying data in the table cells -->
<!-- database query starts here -->
<?php
$res=mysqli_query($link,'select * from region');
?>
<?php
while ($row=mysqli_fetch_array($res)) {
    ?>
<?php
$region=$row['name'];
$temperature=$row['temperature'];
$rainfall=$row['rainfall'];
?>
<!-- modal starts here -->
<div>
        <div role="dialog" tabindex="-5" class="modal fade" id="<?php echo $region?>">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title text-success text-success"><i class="fa fa-crop"></i>
                             Recommended crops for <?php echo $region?></h3>
                            <button type="button" class="close" 
                            data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                    </div>
    <div class="modal-body">
        <div class="row">
        <div class="col padMar margenesCajas">
    <p class="text-primary text-bold text-center p-0 m-0 p-2">
    THE FOLLOWING ARE CLIMATE DETAILS FOR <?php echo $region?>.</p>
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
         placeholder="<?php echo $region ?>" 
         title="Enter rainfall values" value="<?php echo $region ?>">
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
            <p class="text-center text-bold text-danger">Do you to check recommended crops for <?php echo $region?>?</p>
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
                                    <td><?php echo $region?></td>
                                    <td><?php echo $temperature?></td>
                                    <td><?php echo $rainfall?></td>
                                    <td><button class="btn btn-success btn-centre" type="button" 
                        data-toggle="modal" data-target="#<?php echo $region?>">Check recommended crops</button>
                                   </td>
                                </tr>
                                
                                    
<?php
}
?>

<!-- database query ends here -->

<!-- logics for displaying data in table cellls ends here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


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
<?php
require 'footer.html';
?>
</div>
</body>

</html>