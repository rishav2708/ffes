<?php
session_start();
$con=mysqli_connect("localhost","root","salvation123","ffes");
$result = "UPDATE users SET password='$_POST[newpass]' WHERE firstname='$_SESSION[user]'";
if(mysqli_query($con,$result))
{
echo"<script>window.location.href='index.php#correct_password_confirmation_applet'</script>";
}
else
echo "sorry";
mysqli_close($con);
?>



