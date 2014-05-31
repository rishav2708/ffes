<?php
session_set_cookie_params(160000000);
session_start();
$con=mysqli_connect("localhost","root","salvation123","ffes");
$result = mysqli_query($con,"SELECT * FROM users WHERE firstName='$_POST[user]' AND password='$_POST[pass]'");
 if ($row=mysqli_fetch_array($result))
{
$_SESSION['user']=$_POST['user'];
$_SESSION['pass']=$_POST['pass'];
header('Location: profile.php');
}
else
{
echo "<script>
     window.location.href='index.php#close_applet'; 
 </script>";
}
?>
