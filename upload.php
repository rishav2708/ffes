<?php
$con=mysqli_connect("localhost","root","salvation123","ffes");
session_start();
if($_FILES["file"]["error"]>0)
{
echo "Error";
}
else
{
echo "stored in:". $_FILES['file']['tmp_name'];
if(move_uploaded_file($_FILES['file']['tmp_name'],"upload/". $_FILES["file"]["name"]))
{
$dir="upload/";
$path=$_FILES["file"]["name"];
$tot=$dir.$path;
$query=" UPDATE users SET image_path='$tot' WHERE firstname='$_SESSION[user]' AND password='$_SESSION[pass]'";
if(mysqli_query($con,$query))
{
header("Location:index.php");
}
}
else
{
echo "sorry";
}
}
?>
