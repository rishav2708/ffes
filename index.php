<?php
session_set_cookie_params(160000000);
session_start();
error_reporting(E_ALL ^ E_NOTICE);
if(isset($_SESSION['user']))
{
header('location:profile.php');
}
?>
<style type="text/css">
body {background:#708090;}
#login_div{position:absolute;top:220px;left:480px;background:#13253e;box-shadow:#FFFACD 3px 3px 3px 3px;border-radius:10px;-moz-border-radius:10px;-webkit-border-radius:10px;z-index:840;padding:10px;}
#login_form{font-size:16pt;padding:5px;}
.field{font-size:14pt;height:36px;width:320px;padding:5px;}
.button_design{border-radius:4px;-moz-border-radius:4px;-webkit-border-radius:4px;background:rgb(59,89,152);border-width:1px;border-color:rgb(59,89,152);
color:white;height:34px;width:78px;font-size:14pt;}
td{padding:6px;}
.sign_up{background:#006400;position:absolute;left:180px;}
.modalDialog{position:fixed;top:0;bottom:0;right:0;left:0;background:#4F4F4F;z-index:9999;opacity:0;transition:opacity 400ms ease-in;pointer-events:none;}
.modalDialog:target{pointer-events:auto;opacity:0.98;}
.modalDialog>div{position:relative;top:180px;left:340px;padding:30px;}
#sign_up_form{background:white;height:350px;width:590px;border-radius:14px;-moz-border-radius:14px;-webkit-border-radius:14px;}
.close{position:absolute;left:615px;bottom:380px;border-radius:20px;height:26px;width:28px;background:rgb(59,89,152);text-align:center;color:white;text-decoration:none;font-weight:bold;}
.modal_box{position:absolute;left:40px;background:rgb(59,89,152);}
.close:hover{background:#D2B48C;}
.alert_applet{position:fixed;top:0;right:0;bottom:0;left:0;background:black;opacity:0;z-index:10000;color:black;font-size:14pt;transition:opacity 400ms ease-in;pointer-events:none;cursor:pointer;}
.alert_applet:target{pointer-events:auto;opacity:0.9}
.alert_applet>div{height:170px;width:510px;position:absolute;top:180px;left:290px;background:white;box-shadow:rgb(59,89,152) 0px 0px 1px 1px;border-radius:15px;border:4px;padding:15px;border-style:solid;border-width:9pt;border-color:rgb(59,89,152);}
#ok_button{background:rgb(59,89,152);color:white;height:34px;width:110px;font-size:14pt;font-weight:bold;border-color:rgb(59,89,152);border-radius:7px;position:absolute;bottom:30px;right:20px;}
</style>
<html>
<script>
function checknull()
{
if(document.getElementById("user").value=="")
{
window.location.href="#close_applet";
return false;
}
if(document.getElementById("pass").value=="")
{
window.location.href="#close_applet";
return false;
}
return true;
}
</script>
<body>
<div id="login_div">
<form id="login_form" name="login_form" action="login.php" method="post" onsubmit="return checknull();">
<table border="1">
<tr>
<td><input type="text" class="field" name="user" id="user" placeholder="User Name"/></td>
</tr>
<tr>
<td><input type="password" class="field" name="pass" id="pass" placeholder="Password"/></td>
</tr>
<tr>
<td><input type="submit" name="log_in" id="log_in" class="button_design" value="Log In"/> <input type="button" name="sign_up" id="sign_up" class="button_design sign_up" value="Sign up" onclick="window.location.href='#modalBox'"/></td>
</tr>
</table>
</form>
</div>
<div id="modalBox" class="modalDialog">
<div>
<a  class="close" href="#">X</a>
<form action="sign_up.php" name="sign_up_form" id="sign_up_form" method="post">
<table border="0" cellspacing="8">
<tr>
<td><input type="text" name="first_name" id="first_name" class="field" placeholder="First Name"/></td>
</tr>
<tr>
<td><input type="text" name="last_name" id="last_name" class="field" placeholder="Last Name"/></td>
</tr>
<tr>
<td><input type="password" name="pass_signup" id="pass_signup" class="field" placeholder="Password"/></td>
</tr>
<tr>
<td><input type="submit" name="sign_up" id="sign_up" class="button_design sign_up modal_box" value="Register"/></td>
</tr>
</table>
</form>
</div>
</div>
<div id="close_applet" class="alert_applet">
<div>
</br></br>
Please Provide  correct Username and Password, otherwise would not be able to log in!!
<input type="button" id="ok_button" name="ok_button" value="Ok" onclick="window.location.href='#'"/>
</div>
</div>
</body>
</html>
