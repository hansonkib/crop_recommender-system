<?php
// getting values from the modal form using post method
$region_name= $_POST['region'];
$rainfall_value=$_POST['rainfall'];
$title="RECOMMENDED CROPS THAT CAN BE GROWN AT";
$temperature_value=$_POST['temperature'];
?>
<?php
$link=mysqli_connect("localhost","root","","crop_recommender");
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
<?php
require 'header.php';
?>
<body>
    <?php
    $res=mysqli_query($link,"select * from crop");
    $res1=mysqli_query($link,"select * from region where name='" . $region_name ."'");
    $row1=mysqli_fetch_array($res1);
    $temp=$row1['temperature'];
    $rain=$row1['rainfall'];
    ?>
    <div class="col-sm-4 plan price yellow wow fadeInDown" style="width: 800px;">
        <ul class="list-group">
            <li class="list-group-item heading">
                <h1>Region climatic conditions</h1>
            </li>
            <li class="list-group-item"><span>Aggregate rainfall:<?php echo $rain?> mm</span></li>
            <li class="list-group-item"><span>Aggregate Temperature:<?php echo $temp?> celsious</span></li>
        </ul>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Pricing-Tables-Item-Featured-1.js"></script>
    <script src="assets/js/Pricing-Tables-Item-Featured.js"></script>
    <!-- end of conditions -->

    <h1 class="text-center text-primary">The following are lists of crops recommended for <?php echo $region_name?></h1>
    <?php
    while ($row=mysqli_fetch_array($res)) {
        ?>
        <?php
$cropName=$row['name'];
$rainfall=$row['rainfall'];
$temperature=$row['temperature'];
$description=$row['description'];
$image=$row['photo'];
?>

<div class="container" 
 style="margin-top: 10px; margin-bottom: 10px;" data-aos="fade" data-aos-once="true">
        <div class="row" id="serie-card">
            <div class="col-auto d-flex justify-content-center">
                <img class="img-fluid" id="poster" src="assets/img/<?php echo $image?>.jpg" height="auto">
            </div>
            <div class="col"><span id="title"><?php echo $cropName;?></span>
                <div class="d-flex justify-content-end"></div><span id="plot">
                <?php echo $cropName;?> <?php echo $description;?> it requires a temperature
                of about <?php echo $temperature;?> and rainfall of about <?php echo $rainfall;?>
                    2000 years from now, humans are nearly exterminated by titans. Titans are
                     typically several stories.</span>
                <div
                    class="d-flex" style="margin-top: 15px;">
                    <p class="text-nowrap">Casting :&nbsp;</p><span id="casting">Marina Inoue,&nbsp;Yûki Kaji,&nbsp;Yui Ishikawa,&nbsp;Josh Grelle</span></div>
        </div>
    </div>
    </div>
    <hr class="bg-primary" style="height: 5px;">
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
      <?php  
    }
    ?> 
</body>
</html>
<?php
require 'footer.html'
?>