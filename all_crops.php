<?php
session_start();
?>
<?php
$link=mysqli_connect("localhost","root","","crop_recommender");
$region_name="";
$title="All crops";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>crops lists</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="assets/css/serie-card-responsive.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://daneden.github.io/animate.css/animate.min.css">
    <link rel="stylesheet" href="assets/css/Pricing-Tables-Item-Featured-1.css">
    <link rel="stylesheet" href="assets/css/Pricing-Tables-Item-Featured.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <!-- navigation -->
<?php
require 'header.php';
?>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Pricing-Tables-Item-Featured-1.js"></script>
    <script src="assets/js/Pricing-Tables-Item-Featured.js"></script>
    <!-- end of conditions -->

    <h1 class="text-center text-black">DIFFERENT CROPS AND THEIR DETAILS</h1>
    <!-- crop details starts here -->
    <?php
    $crops_data=mysqli_query($link,"select * from crop");
    ?>
     <?php
     while($row_details=mysqli_fetch_array($crops_data)){
     ?>
     <?php
     $crop_name=$row_details['name'];
     $description=$row_details['description'];
     $rainfall=$row_details['rainfall'];
     $temperature=$row_details['temperature'];
     $image=$row_details['photo'];
     ?>
    <div class="container" style="margin-top: 10px;" data-aos="fade" data-aos-once="true">
        <div class="row" id="serie-card">
            <div class="col-auto d-flex justify-content-center"><img class="img-fluid" 
                id="poster" src="assets/img/<?php echo $image?>.jpg" height="auto"></div>
            <div class="col"><span class="text-bold text-primary" id="title"><?php echo $crop_name?></span>
                <div class="d-flex justify-content-end"></div><span class="text-success" id="plot">
                    <?php echo $description?>.</span>
                <div
                    class="d-flex" style="margin-top: 15px;">
                    <p class="text-nowrap">conditions :&nbsp;</p><span class="text-danger" id="casting">Rainfall
                    &nbsp;<?php echo $rainfall?> mm   &nbsp;Temperature&nbsp;<?php echo $temperature?> Celsious</span></div>
                    <?php
                    $_SESSION["rainfall"]=$rainfall;
                    $_SESSION["temperature"]=$temperature;
                    ?>
                    <a class="btn btn-danger" href="crop_region.php?name=<?php echo $crop_name?>"> check regions likely to grow <?php echo $crop_name?></a>
        </div>
    </div>
    </div>
    <?php
     }
    ?>
    <!-- crop details ends here -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
<?php
require 'footer.html';
?>
</body>

</html>