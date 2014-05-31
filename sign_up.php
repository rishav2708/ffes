<?php
session_start();
$con=mysqli_connect("localhost","root","salvation123","ffes");
$result = mysqli_query($con,"SELECT * FROM users WHERE firstName='$_POST[first_name]' AND lastname='$_POST[last_name]'");
if (!mysqli_fetch_array($result))
{
$query="INSERT INTO users(firstname,lastname,password) VALUES('$_POST[first_name]','$_POST[last_name]','$_POST[pass_signup]')";
}
else
{
echo "<script>alert('Name already there!')</script>";
header("Location:index.php#modalBox");
}
if(!mysqli_query($con,$query))
echo"Sorry";
else
echo "One Record Added!!";
mysqli_close($con);
header("Location:index.php");
?>
