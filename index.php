<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>home page</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/best-carousel-slide.css">
    <link rel="stylesheet" href="assets/css/Footer-with-social-media-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/Navigation-Dark-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">

    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div class="container-auto">

    <nav class="navbar navbar-dark navbar-expand-md bg-primary navigation-clean">
        <div class="container"><a class="navbar-brand" href="#">CROP RECOMMENDER SYSTEM</a>
        <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="all_crops.php">Crops</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="regions.php">Regions</a></li>
                    <!-- <li class="nav-item" role="presentation"><a class="nav-link" href="check crop.html">Climate</a></li> -->
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Dropdown </a>
                        <div class="dropdown-menu" role="menu"><a class="dropdown-item"
                         role="presentation" href="all_crops.php">Crops</a><a class="dropdown-item"
                          role="presentation" href="regions.php">Regions</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section id="carousel">
        <div class="carousel slide" data-ride="carousel" id="carousel-1">
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item">
                    <div class="jumbotron pulse animated hero-nature carousel-hero"
                     style="background-image: url(&quot;assets/img/big_tom.jpg&quot;);">
                        <h1 class="hero-title text-warning">CROP RECOMMENDER SYSTEM</h1>
                        <p class="hero-subtitle text-white text-bolder">This is the platform hich can help you as a farmer to make the right decision
                            on the type of the crop to plant in your region.</p>
                            <button class="btn btn-primary hero-button plat" type="button" 
                            data-toggle="modal" data-target="#modalCrop">START</button>
                    </div>
                </div>
                <div class="carousel-item active">
                    <div class="jumbotron pulse animated hero-photography carousel-hero"
                     style="background-image: url(&quot;assets/img/tomato.jpg&quot;);">
                        <h1 class="hero-title text-warning">CROP RECOMMENDER SYSTEM</h1>
                        <p class="hero-subtitle text-success">This is the platform hich can help you as a farmer to make the right decision
                            on the type of the crop to plant in your region.</p>
                            <button class="btn btn-primary hero-button plat"
                            type="button" data-toggle="modal" data-target="#modalCrop">START</button>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="jumbotron pulse animated hero-technology carousel-hero" style="background-image: url(&quot;assets/img/tomatoes.jpg&quot;);">
                        <h1 class="hero-title">CROP RECOMMENDER SYSTEM</h1>
                        <p class="hero-subtitle text-warning">This is the platform hich can help you as a farmer to make the right decision
                            on the type of the crop to plant in your region.
                       </p>
                       <button class="btn btn-primary hero-button plat" type="button" 
                       data-toggle="modal" data-target="#modalCrop">START</button>
                    </div>
                </div>
            </div>
            <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev"><i class="fa fa-chevron-left"></i><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next"><i class="fa fa-chevron-right"></i><span class="sr-only">Next</span></a></div>
            <ol
                class="carousel-indicators">
                <li data-target="#carousel-1" data-slide-to="0"></li>
                <li data-target="#carousel-1" data-slide-to="1" class="active"></li>
                <li data-target="#carousel-1" data-slide-to="2"></li>
                </ol>
        </div>
    </section>
    <footer id="footerpad" class="bg-success">
        <div class="container ">
            <div class="row">
                <div class="col-md-6 col-lg-8 mx-auto"><p class="text-white copyright text-bold text-center">Copyright &copy; Crop Recomender | Web Design by SANG HANSON KIBET</p></div>
            </div>
        </div>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <div>
        <div role="dialog" tabindex="-5" class="modal fade" id="modalCrop">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title text-success text-success"><i class="fa fa-crop"></i>
                             CROP RECOMMENDER SYSTEM</h3><button type="button" class="close" 
                            data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col padMar margenesCajas">
                                <p class="text-primary text-bold text-center p-0 m-0 p-2">Input your Regions details.</p>
                            </div>
                        </div>
                        <!-- ------------------- -->

                        <!-- connecting with the database -->
                        <?php
$link=mysqli_connect("localhost","root","","crop_recommender");
$res=mysqli_query($link,"select * from region");
                         ?>
<!-- database connection ends here -->
<form method="POST" action="crop_lists.php">
    <!-- region input starts here -->
    <div class="form-group text-bold text-info"><label for="region">Select Region</label>
        <div class="input-group">
            <div class="input-group-prepend"><span class="input-group-text">
                <i class="fa fa-location-arrow"></i>
            </span></div><select class="form-control" id="region"  
            name="region">
                <optgroup label="Your Region">
                <?php
    while ($row=mysqli_fetch_array($res)) {
                ?>
                <?php
                $region=$row['name'];
                ?>
                    <!-- <option value="client" selected="">Bungoma</option> -->
                    <option value="<?php echo $region?>"><?php echo $region ?></option>
                    <?php
    }
    ?>
                </optgroup></select></div>
            </div>
            <!-- region inputs ends here -->
    <div class="form-group">
        <label for="rainfall" class="text-bold text-info">Enter rainfall values in mm</label>
        <input class="bg-light border rounded border-secondary shadow-sm form-control d-table" 
        type="number" data-toggle="tooltip" data-bs-tooltip=""
         data-placement="right" name="rainfall"
          id="rainfall"
         placeholder="rainfall" title="Enter rainfall values">
        </div>
        <!-- == -->
        <div
        class="form-group">
        <label for="temperature" class="text-bold text-info">Enter temperature values in F</label>
        <input class="form-control is-invalid" type="number" id="temperature"
        name="temperature" placeholder="temperature"><small class="form-text text-danger">
            Please enter a corrrect format for temperature.</small></div>
            <div class="form-group"><button class="btn btn-success btn-block"
                 type="submit">SEARCH FOR RECOMMENDED CROPS&nbsp;</button></div>
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
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.4/lodash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
    <script src="assets/js/CDNJS-Search-Final.js"></script>
</div>
</body>

</html>