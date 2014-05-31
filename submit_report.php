<?php
session_start();
$con=mysqli_connect("localhost","root","salvation123","ffes");
$query="SELECT *FROM users WHERE firstname='$_SESSION[user]'";
$result=mysqli_query($con,$query);
$row=mysqli_fetch_array($result);
$query1="INSERT INTO info_record(description,like_key) VALUES('$_POST[description1]','$row[id]')";
if(mysqli_query($con,$query1))
{
header("Location:index.php");
}
else
{
echo "<script>alert('Not added')</script>";
}
mysqli_close($con);
?>

