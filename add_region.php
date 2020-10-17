<?php
$link=mysqli_connect("localhost","root","","crop_recommender");
if (isset($_POST['submit'])) {
$region_name=$_POST['Region'];
$temp=$_POST['temperature'];
$rain=$_POST['rainfall'];
mysqli_query($link,"INSERT INTO Region(name,temperature,rainfall) VALUES('$region_name','$temp','$rain'')");
echo '<script>alert("New region added successfully");</script>';
}
else{
    echo '<script>alert("failed! region not added");</script>';

}

?>