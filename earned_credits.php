<?php
session_start();
$con=mysqli_connect("localhost","root","salvation123","ffes");
$query="SELECT *FROM users WHERE firstname='$_SESSION[user]'";
$row=mysqli_query($con,$query);
$result=mysqli_fetch_array($row);
$val1=$result['id'];
foreach($_POST as $var=>$val)
{
$credit="INSERT INTO episodes_record(episodes,f_key) VALUES('$val','$val1')";
if(mysqli_query($con,$credit))
{

header("Location:registered.php");
}
else
header("Location:reg.php");
}
mysqli_close($con);
?>
