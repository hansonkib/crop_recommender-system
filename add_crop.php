<?php
$link=mysqli_connect("localhost","root","","crop_recommender");
if (isset($_POST['submit'])) {
$image_directory="photos/".basename($_FILES["photo"]['name']);
$photo=$_FILES['photo']['name'];
$crop_name=$_POST['CropName'];
$temp=$_POST['temperature'];
$rain=$_POST['rainfall'];
$desc=$_POST['description'];
// moving the uploaded image into  the folder  images
if (move_uploaded_file($_FILES['photo']['tmp_name'],$image_directory)) {
mysqli_query($link,"INSERT INTO crop(name,description,rainfall,temperature,photo) VALUES('$crop_name','$desc','$rain','$temp','$photo')");
echo '<script>alert("New crop added successfully");</script>';
}
else{
    echo '<script>alert("failed to upload photo");</script>';
    // echo '<script>$("#errorModal").modal("show")</script>';

}
}
?>