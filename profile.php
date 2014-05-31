<?php
session_start();
if(!isset($_SESSION['user']))
{
header('Location:index.php');
}

?>
<style type="text/css">
body{background:#eeeeee;font-family:ubuntu helvetica sans-serif;font-size:14pt;font-weight:bold;overflow:auto;}
#profile_maker{position:absolute;top:0px;right:0px;left:0px;bottom:790px;background:rgb(59,89,152);height:160px;width:1320px;}
.image_frame{position:absolute;top:30px;left:40px;height:210px;width:200px;border-style:solid;border-width:3pt;box-shadow:black 2px 2px 2px 2px;border-color:black;z-index:200;background:white;}
.font_class{position:absolute;top:125px;left:270px;font-size:17pt;font-weight:bold;color:white;}
.logout_class{position:absolute;right:30px;top:30px;color:white;}
.modal_div{position:fixed;top:0;bottom:0;right:0;left:0;background:black;z-index:10000;opacity:0;transition:opacity 400ms ease-in;pointer-events:none;}
.modal_div:target{opacity:0.9;pointer-events:auto;}
.modal_div>div{position:absolute;top:90px;left:310px;background:white;height:120px;width:350px;}
.upload_frame{height:34px;width:290px;background:rgb(59,89,152);font-size:14pt;}
.submit{color:white;font-weight:bold;border-radius:4px;-moz-border-radius:4px;-webkit-border-radius:4px;width:110px;border-color:rgb(59,89,152);border-width:1pt;background:rgb(59,89,152);}
.adjust{height:34px;width:135px;}
.browse{background:transparent;}
.upload_button{background:#99FF66;border-color:#99FF66;border-width:2pt;text-decoration:none;color:black;height:34px;width:110px;font-size:14pt;padding:3px;position:absolute;left:85px;top:130px;opacity:0;z-index:999;}
#contents{position:absolute;top:240px;left:350px;border-width:1pt;border-color:rgb(59,89,152);}
.close{text-decoration:none;font-weight:bold;background:rgb(59,89,152);border-radius:10px;text-align:center;height:20px;width:20px;position:absolute;right:-5px;color:white;font-size:12pt;top:-3px;}
.close:hover{background:#99FF66;}
#description1{font-family:sans-serif;font-size:14pt;font-weight:bold;border-sty le:solid;border-width:5pt;border-color:black;border-radius:5px;}
#view_registered_courses{position:absolute;left:-320px;top:40px;background:rgb(89,89,89);padding:10px;border-radius:10px;color:white;box-shadow:rgb(89,89,89) 4px 4px 4px 4px;z-index:10000;}
table{color:white;}
#ideaform{border-style:solid;border-color:rgb(81,81,81);border-width:5pt;padding:10px;z-index:1000;border-radius:12px;background:rgb(59,59,59);opacity:0.9;box-shadow:rgb(89,89,89) 4px 4px 4px 4px;z-index:10000;}
#table1{color:black;border-style:solid;border-width:2pt;box-shadow:rgb(109,108,107) 3px 3px 3px;padding:6px;border-color:rgb(109,108,107);border-radius:8px;}
#online_users_container{position:absolute;left:1000px;background:rgb(89,89,89);width:200px;padding:8px;border-radius:8px;box-shadow:rgb(89,89,89) 4px 4px 4px 4px;z-index:10000;top:-100px}
#check_radio{background:green;color:green;}
td{font-size:12pt;font-weight:bold;}
.design{height:34px;padding:5px;width:134px;font-size:15pt;border-color:rgb(59,89,152)}
</style>
<html>
<body>
<script>
function mastercheck()
{
if(document.getElementById("file").value=="")
{
alert("Input a file");
return false;
}
return true;
}
function visible_upload_button()
{
document.getElementById("upload_btton").style.opacity=0.7;
}
function invisible_upload_button()
{
document.getElementById("upload_btton").style.opacity=0;
}
function check_for_null()
{
if(document.getElementById("description1").value=="")
{
alert("Please Enter something");
return false;
}
return true;
}
</script>
<div id="profile_maker">
<?php  
$con=mysqli_connect("localhost","root","salvation123","ffes");
$query="SELECT *FROM users WHERE firstname='$_SESSION[user]'";
$set=mysqli_query($con,$query);
$result=mysqli_fetch_array($set);
echo "<img id='images' class='image_frame' src='$result[image_path]'  onmouseover='visible_upload_button();' onmouseout='invisible_upload_button();'/>";
echo "<span class='font_class'>";
echo"&nbsp"."&nbsp"."&nbsp"."&nbsp".$_SESSION['user']."&nbsp".$result['lastname'];
echo "</span>";
mysqli_close($con);
?>
<input type="button" name="log_out_button" id="log_out_button"class="logout_class submit design" value="Log Out" onclick='window.location.href="logout.php"'/>
<input type="button" id="upload_btton" name="upload_btton" onclick="window.location.href='#upload_div'" class="submit upload_button" value="upload" onmouseover='visible_upload_button();' />
<div id="contents">
<form id="ideaform" name="ideaform" action="submit_report.php" method="post" onsubmit="check_for_null();">
<textarea id="description1" name="description1" rows="3" cols="25" placeholder="Hello <?php echo $_SESSION[user]; ?>, What's going On?">
</textarea></br></br>
<input type="submit" id="feedback_button" name="feedback_button" class="submit adjust" value="POST" />
</form>
<?php
$con=mysqli_connect("localhost","root","salvation123","ffes");
$query="SELECT *FROM users WHERE firstname='$_SESSION[user]'";
$chatlist="SELECT *FROM users";
$confirm=mysqli_query($con,$chatlist);
$result=mysqli_query($con,$query);
$row=mysqli_fetch_array($result);
$catch="SELECT *FROM episodes_record WHERE f_key='$row[id]'";
$catch1=mysqli_query($con,$catch);
$query1="SELECT *FROM users,info_record WHERE users.id=info_record.like_key ";
$result1=mysqli_query($con,$query1);

echo "<table border=1 id='table1'>";
echo "<tr>";
while($row1=mysqli_fetch_array($result1))
{
echo "<td>".$row1['firstname']."</td>"."<td>".$row1['description']."</td>";
echo "</tr>";
}
echo "</table>";
echo "</br></br>";
echo "<div id='view_registered_courses'>";
echo "Registered Credits:";
echo "<table border=1>";
echo "<tr>";
while($row2=mysqli_fetch_array($catch1))
{
echo "<td>". $row2['episodes']."</td>";
echo "</tr>";
}
echo "</table>";
echo "<div id='online_users_container'>";
echo "<table border='0'>";
while($row3=mysqli_fetch_array($confirm))
{
if($_SESSION['user']==$row3['firstname'])
{
echo "<tr>";
echo "<td>". $row3['firstname'] ." ".$row3['lastname']."</td>";
echo "<td><input type='radio' id='check_radio' name='check_radio' checked='checked' onclick='return false;'/></td>";
echo "</tr>";
}
else
{
echo "<tr>";
echo "<td>". $row3['firstname'] ." ".$row3['lastname']."</td>";
echo "<td><input type='radio' id='check_radio' name='check_radio' onclick='return false;'/></td>";
echo "</tr>";
}
}
echo "</table>";
echo "</div>";
echo "</div>";
mysqli_close($con);
?>
<input type="button" id="register_button" name="register_button" class="submit design" value="Register" onclick="window.location.href='reg.php'"/>
</div>
</div>
<div id="upload_div" class="modal_div">
<div>
<a href="#" class="close">X</a>
<form id="form1" name="form1" action="upload.php" method="post" enctype="multipart/form-data" onsubmit="return mastercheck();"/>
<table border="0">
<tr>
<td><input type="file" name="file" id="file" class="upload_frame browse"/></td>
</tr>
<tr>
<td><input type="submit" name="submit_button" id="submit_button" value="Submit" class="upload_frame submit"/></td>
</tr>
</table>
</form>
</div>
</div>
</body>
</html>

