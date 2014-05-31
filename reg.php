<?php
session_set_cookie_params(160000000);
session_start();
if(!isset($_SESSION['user']))
{
header('Location:index.php');
}
$con=mysqli_connect("localhost","root","salvation123","ffes");
$query="SELECT *FROM users WHERE firstname='$_SESSION[user]'";
$row=mysqli_query($con,$query);
$result=mysqli_fetch_array($row);
$val1=$result['id'];
$check="SELECT * FROM episodes_record WHERE f_key='$val1' ";
$result=mysqli_query($con,$check);
if(mysqli_fetch_array($result))
{
header("Location:registered.php");
}
?>
<html>
<head>
<link rel="shortcut icon" href="1375225123_65701.ico"/>
<title>Register For Episodes</title>
</head>
<style type="text/css">
body{
background:url('TVSeries-WideBannerMod-10x4-Grid.jpg');
color:none;
font-family:Ubuntu;
font-size:16pt;
font-weight:bold;
font-style:none;
overflow:auto;
}
marquee{z-index:1000;opacity:1;}
#div1{border-radius:2px;padding:4px;position:absolute;margin:-10px;opacity:0.9;height:670px;width:1290px;}
.reg1{position:absolute;top:60px;left:290px;color:rgb(8,0,0);box-shadow:black 4px 4px 4px 4px;-moz-box-shadow:black 4px 4px 4px 4px;-webkit-box-shadow:black 4px 4px 4px 4px;padding:7px;border-radius:20px;border-width:3pt;border-color:black;background:white;opacity:0.9;z-index:2000;}
.name{border-radius:3px;box-shadow:transparent 1px 1px 1px;border-color:transparent;left:12px;font-size:14pt;}
.check1{border-radius:2px;height:10px;width:10px;}
.register_button{box-shadow:transparent 1px1px 1px 1px;-moz-box-shadow:transparent 1px1px 1px 1px;-webkit-box-shadow:transparent 1px1px 1px 1px;border-radius:7px;-moz-border-radius:7px;-webkit-border-radius:7px;border-color:rgb(59,89,152);background:rgb(59,89,152);font-size:25pt;color:white;height:74px;width:190px;font-weight:bold;position:relative;left:180px;}
.table1{padding:2px;font-size:20pt;}
.detail{background:rgb(59,89,152);color:white;border-radius:3px;-moz-border-radius:3px;-webkit-border-radius:3px;border:none;box-shadow:none;}
.image{box-shadow:black 2px 2px 2px 2px;-moz-box-shadow:black 2px 2px 2px 2px;-webkit-box-shadow:black 2px 2px 2px 2px;height:190px;width:190px;}
.image1{box-shadow:black 2px 2px 2px 2px;-moz-box-shadow:black 2px 2px 2px 2px;-webkit-box-shadow:black 2px 2px 2px 2px;height:190px;width:190px;position:absolute;top:40px;right:40px;}
#check{border-radius:14px;-moz-border-radius:14px;-webkit-border-radius:14px;height:10px;width:10px;background:green;}
#check:hover{background:green;}
.modalDetail{position:fixed;top:0;bottom:0;left:0;right:0;background:black;opacity:0;z-index:9999;transition:opacity 400ms ease-in;pointer-events:none;font-size:12pt;}
.modalDetail:target{pointer-events:auto;opacity:0.94;}
.modalDetail>div{position:relative;margin:20px auto;padding:7px;border-radius:12px;background:#eee;height:600px;width:720px;}
.close{border-radius:20px;text-align:center;background:#4682B4;color:white;font-weight:bold;position:absolute;right:-6px;top:-5px;font-size:14pt;width:30px;height:25px;font-style:none;text-decoration:none;}
.close:hover{background:#D2B48C;}
.image2{height:190px;width:190px;}
#credit{box-shadow:none;border:none;background:transparent;font-size:16pt;height:30px;width:30px;color:red;font-weight:bold;}
.select1{position:absolute;right:60px;top:40px;background:transparent;}
#logout_button{background:rgb(59,89,152);color:white;height:34px;width:110px;font-size:14pt;font-weight:bold;border-color:rgb(59,89,152);border-radius:7px;position:absolute;bottom:30px;right:140px;}
#break_button{background:rgb(59,89,152);color:white;height:34px;width:110px;font-size:14pt;font-weight:bold;border-color:rgb(59,89,152);border-radius:7px;position:absolute;bottom:30px;right:10px;}
.logged_in_info{color:white;font-weight:bold;font-size:14pt;border:none;position:absolute;top:67px;left:380px;}
.log_out_applet{position:fixed;top:0;right:0;bottom:0;left:0;background:black;opacity:0;z-index:10000;color:black;font-size:14pt;transition:opacity 400ms ease-in;pointer-events:none;}
.log_out_applet:target{pointer-events:auto;opacity:0.9}
.log_out_applet>div{height:170px;width:510px;position:absolute;top:180px;left:290px;background:white;box-shadow:rgb(59,89,152) 0px 0px 1px 1px;border-radius:15px;border:4px;padding:15px;border-style:solid;border-width:9pt;border-color:rgb(59,89,152);}
#logout_index{position:absolute;right:4px;top:-1px;}
#changepassword_index{position:absolute;right:4px;top:25px;}
.field{font-size:13pt;height:36px;width:320px;padding:5px;}
.alert_applet{position:fixed;top:0;right:0;bottom:0;left:0;background:black;opacity:0;z-index:10000;color:black;font-size:14pt;transition:opacity 400ms ease-in;pointer-events:none;cursor:pointer;}
.alert_applet:target{pointer-events:auto;opacity:0.9}
.alert_applet>div{height:170px;width:510px;position:absolute;top:180px;left:290px;background:white;box-shadow:rgb(59,89,152) 0px 0px 1px 1px;border-radius:15px;border:4px;padding:15px;border-style:solid;border-width:9pt;border-color:rgb(59,89,152);}
#ok_button{background:rgb(59,89,152);color:white;height:34px;width:110px;font-size:14pt;font-weight:bold;border-color:rgb(59,89,152);border-radius:7px;position:absolute;bottom:30px;right:20px;}

</style>
<body>
<marquee behaviour="scroll" direction="left" scrollamount="6" onmouseover="this.stop();" onmouseout="this.start();"><img src="prison_break.jpeg" id="img1" name="img1" class="image prison_break"/><img src="lost.jpeg" id="img1" name="img1" class="image lost"/><img src="spartacus.jpeg" id="img1" name="img1" class="image spartacus"/><img src="white_collar.jpg" id="img1" name="img1" class="image"/>
<img src="mind_your_language.jpg" id="img1" name="img1" class="image"/>
<img src="game-of-thrones.jpg" id="img1" name="img1" class="image"/><img src="sherlock.jpeg" id="img1" name="img1" class="image"/><img src="arrow.jpeg" id="img1" name="img1" class="image"/></marquee>
<script>
var counter=0;
function fun1(obj)
{
if(counter<0)
{
counter=0;
return false;
}
if(obj.checked==true){counter=counter+parseInt(obj.value);document.getElementById("credit").value=counter.toString();}
else{counter=counter-parseInt(obj.value);document.getElementById("credit").value=counter.toString();}
}
function checkequal()
{
if(document.getElementById("newpass").value=="")
{
window.location.href="#null_password_confirmation_applet";
return false;
}
else if(document.getElementById("cnewpass").value=="")
{
window.location.href="#null_password_confirmation_applet";
return false;
}
else if(document.getElementById("newpass").value!=document.getElementById("cnewpass").value)
{
window.location.href="#wrong_password_confirmation_applet";
return false;
}
return true;
}
</script>
<div id="div1" name="div1">
<div class="select1">
</div>
<form id="reg1" name="reg1" class="reg1" action="earned_credits.php" method="post">
Hi <?php echo ($_SESSION['user']); ?></br>
<a id="logout_index" role="button" href="#close_applet">Log Out</a>
<a id="changepassword_index" role="button" href="#change_password_applet">Change Password<a>
Registered Credits:<input type="text" id="credit" name="credit" value="" size="2" readonly="readonly"/>
<table border="2" class="table1">
<tr>
<td>Check In</td><td>Episode</td><td>Details</td><td>Credits</td>
</tr>
<tr>
<td><input type="checkbox" id="sherlock" name="sherlock" value="5_sherlock" onclick="return fun1(this);"/></td><td>Sherlock</td><td><input type="button" value="view" id="detail" class="detail" name="detail" onclick="window.location.href='#sherlockDetail'"/></td><td>5</td>
</tr>
<tr>
<td><input type="checkbox" id="perison_break" name="prison_break" value="3_prison_break" onclick="return fun1(this);"/></td><td>Prison Break</td><td><input type="button" value="view" id="detail" class="detail" name="detail" onclick="window.location.href='#prison_break_Detail'"/></td><td>3</td>
</tr>
<tr>
<td><input type="checkbox" id="game_of_thrones" name="game_of_thrones" value="5_game_of_thrones" onclick="return fun1(this);"/></td><td>Game Of Thrones</td><td><input type="button" value="view"id="detail" class="detail" name="detail" onclick="window.location.href='#game_of_thrones_Detail'"/></td><td>5</td>
</tr>
<tr>
<td><input type="checkbox" id="arrow" name="arrow" value="2_arrow" onclick="return fun1(this);"/></td><td>Arrow</td><td><input type="button" value="view"id="detail" class="detail" name="detail" onclick="window.location.href='#arrow_Detail'"/></td><td>2</td>
</tr>
<tr>
<td><input type="checkbox" id="sarabhai_vs_sarabhai" name="sarabhai_vs_sarabhai" value="3_sarabhai_vs_sarabhai" onclick="return fun1(this);"/></td><td>Sarabhai vs Sarabhai</td><td><input type="button" value="view"id="detail" class="detail" name="detail"/></td><td>3</td>
</tr>
<tr>
<td><input type="checkbox" id="wire" name="wire" value="4_wire" onclick="return fun1(this);"/></td><td>Wire</td><td><input type="button"id="detail" value="view" class="detail" name="detail"/></td><td>4</td>
</tr>
<tr>
<td><input type="checkbox" id="lost" name="lost" value="4_lost" onclick="return fun1(this);"/></td><td>Lost</td><td><input type="button" value="view"id="detail" class="detail" name="detail" onclick="window.location.href='#lostDetail'"/></td><td>4</td>
</tr>
<tr>
<td><input type="checkbox" id="white_collar" name="white_collar" value="4_white_collar" onclick="return fun1(this);"/></td><td>White Collar</td><td><input type="button" value="view"id="detail" class="detail" name="detail"/></td><td>4</td>
</tr>
<tr>
<td><input type="checkbox" id="spartacus" name="spartacus" value="3_spartacus" onclick="return fun1(this);"/></td><td>Spartacus</td><td><input type="button" value="view"id="detail" class="detail" name="detail"/></td><td>3</td>
</tr>
<tr>
<td><input type="checkbox" id="mind_your_language" name="mind_your_language" value="4_mind_your_language" onclick="return fun1(this);"/></td><td>Mind Your Language</td><td><input type="button" value="view"id="detail" class="detail" name="detail"/></td><td>4</td>
</tr>
<tr>
<td><input type="checkbox" id="mentalist" name="mentalist" value="2_mentalist" onclick="return fun1(this);"/></td><td>Mentalist</td><td><input type="button" value="view"id="detail" class="detail" name="detail"/></td><td>2</td>
</tr>
<tr>
<td><input type="checkbox" id="how_i_met_ur_mother" name="how_i_met_ur_mother" value="3_how_i_met_ur_mother" onclick="return fun1(this);"/></td><td>How I Met Ur Mother</td><td><input type="button" value="view"id="detail" class="detail" name="detail"/></td><td>3</td>
</tr>
<tr>
<td><input type="checkbox" id="dexter" name="dexter" value="2_dexter" onclick="return fun1(this);"/></td><td>Dexter</td><td><input type="button" value="view"id="detail" class="detail" name="detail"/></td><td>2</td>
</tr>
<tr>
<td><input type="checkbox" id="suits" name="suits" value="4_suits" onclick="return fun1(this);"/></td><td>Suits</td><td><input type="button" value="view"id="detail" class="detail" name="detail"/></td><td>4</td>
</tr>
<tr>
<td><input type="checkbox" id="big_bang_theory" name="big_bang_theory" value="3_big_bang_theory" onclick="return fun1(this);"/></td><td>Big Bang Theory</td><td><input type="button" value="view"id="detail" class="detail" name="detail"/></td><td>3</td>
</tr>
</table></br>
<input type="submit" id="register_button" name="register_button" class="register_button" value="Register"/>
</form>
</div>
</body>
<div id="arrow_Detail" class="modalDetail">
<div>
<a href="#" class="close">X</a>
<img src="arrow.jpeg"/></br>
The series follows Oliver Queen (Stephen Amell), billionaire playboy of Starling City, who spends five years stranded on an island following a shipwreck that claims the life of everyone else on board, including his father, Robert Queen, and Sara Lance (Jacqueline MacInnes Wood), the sister of Oliver's girlfriend Laurel (Katie Cassidy), and with whom he was having an affair. Upon his return to Starling City, he is reunited with his mother, Moira (Susanna Thompson), her new husband, Walter Steele (Colin Salmon), the former CFO of his father's company who is now the CEO; and his younger sister, Thea (Willa Holland). He is also greeted by his best friend, Tommy Merlyn (Colin Donnell), the son of successful businessman Malcolm Merlyn (John Barrowman). Oliver also tries to reconnect with ex-girlfriend Laurel, but she blames him for the death of her sister, Sara.

During the day Oliver plays the billionaire playboy trying to catch up with society after 5 years, who also owns and runs a nightclub; at night he becomes a green-hooded vigilante, following through with his father's dying wishes to right the wrongs of the Queen family, fight the ills of society, and restore Starling City to its former glory. Oliver's vigilante persona becomes the focus of police detective Quentin Lance (Paul Blackthorne), father to Laurel and Sara, who is determined to arrest the vigilante and who also blames Oliver for his daughter's death and his wife leaving him, though he remains unaware of Oliver's dual identity. Oliver is constantly flanked by a bodyguard, John Diggle (David Ramsey), who later joins him in his fight for justice.
</div>
</div>
<div id="prison_break_Detail" class="modalDetail">
<div>
<a href="#" class="close">X</a>
<img src="prison_break.jpeg"/></br>
Prison Break maintains an ensemble cast for each season along with many recurring guest stars. The first season features a cast of ten actors who receive star billing, who were based in Chicago or at Fox River State Penitentiary. The second season features a cast of nine actors who receive billing; three characters are downgraded from series regular to recurring status, another is upgraded, and a new character is introduced. The third season introduces four new characters; two of whom are prisoners at Penitenciaría Federal de Sona.

Most of the changes in the cast have been due to character deaths. Series creator, Paul Scheuring, explains that killing off major characters "makes the audience that much more fearful for our protagonists" and that "it actually does help us in terms of reducing story lines". The two protagonists of the series, Michael Scofield and Lincoln Burrows, are the only characters to have appeared in every episode of the series.
</div>
</div>


<div id="game_of_thrones_Detail" class="modalDetail">
<div>
<a href="#" class="close">X</a>
<img src="game-of-thrones.jpg" class="image2"/></br>
Like the novels it adapts, Game of Thrones has a sprawling ensemble cast, estimated to be the largest on television.[12] During the production of the third season, 257 cast names were recorded.[13] The following overview reduces the list of characters in Game of Thrones to those played by the actors credited as part of the main cast.[14]

Lord Eddard "Ned" Stark (Sean Bean) is the head of the Stark family whose members are involved in most of the series's intertwined plot lines. He and his wife Catelyn Tully (Michelle Fairley) have five children: the eldest, Robb (Richard Madden), the dainty Sansa (Sophie Turner), the tomboy Arya (Maisie Williams), the adventurous Bran (Isaac Hempstead-Wright) and the youngest, Rickon (Art Parkinson). Ned's hostage and ward Theon Greyjoy (Alfie Allen) used to live with the Starks. Robb's wife is the healer Talisa Maegyr (Oona Chaplin), and Arya has befriended the blacksmith's apprentice Gendry (Joe Dempsie). Ned's bastard son Jon Snow (Kit Harington) and his friend Samwell Tarly (John Bradley) serve in the Night's Watch under Lord Commander Jeor Mormont (James Cosmo). The red-haired Wildling Ygritte (Rose Leslie) is Jon Snow's romantic interest.

Ned's old friend King Robert Baratheon (Mark Addy) shares a loveless marriage with Queen Cersei Lannister (Lena Headey), who has taken her twin, the "Kingslayer" Ser Jaime Lannister (Nikolaj Coster-Waldau) as her secret lover. She loathes her younger brother, the clever dwarf Tyrion Lannister (Peter Dinklage), who is attended by his mistress Shae (Sibel Kekilli), the sellsword Bronn (Jerome Flynn) and his squire, Podrick Payne (Daniel Portman). Cersei's father is the fabulously wealthy Lord Tywin Lannister (Charles Dance), and her son Joffrey (Jack Gleeson) is guarded by the scarfaced warrior Sandor "the Hound" Clegane (Rory McCann). And the story conitnues...
</div>
</div>

<div id="lostDetail" class="modalDetail">
<div>
<a href="#" class="close">X</a>
<img src="lost.jpeg"/></br>
Lost was planned as a multi-cultural show with an international cast. The initial season had 14 regular speaking roles that received star billing. Matthew Fox played the protagonist, a troubled surgeon named Jack Shephard. Evangeline Lilly portrayed a fugitive Kate Austen. Jorge Garcia played Hugo "Hurley" Reyes, an unlucky lottery winner. Josh Holloway played a con man, James "Sawyer" Ford. Ian Somerhalder played Boone Carlyle, chief operating officer of his mother's wedding business. Maggie Grace played his stepsister Shannon Rutherford, a former dance teacher. Harold Perrineau portrayed construction worker and aspiring artist Michael Dawson, while Malcolm David Kelley played his young son, Walt Lloyd. Terry O'Quinn played the mysterious John Locke. Naveen Andrews portrayed former Iraqi Republican Guard Sayid Jarrah. Emilie de Ravin played a young Australian mother-to-be, Claire Littleton. Yunjin Kim played Sun-Hwa Kwon, the daughter of a powerful Korean businessman and mobster, with Daniel Dae Kim as her husband and father's enforcer Jin-Soo Kwon. Dominic Monaghan played English ex-rock star drug addict Charlie Pace.
</div>
</div>
<div id="sherlockDetail" class="modalDetail">
<div>
<a href="#" class="close">X</a>
<img src="sherlock.jpeg"/></br>

</div>
</div>

<div id="close_applet" class="log_out_applet">
<div>
</br></br>
Hello <?php echo $_SESSION['user']  ?>,</tr>  Are you sure you want to exit?
<form id="log_out_form" name="log_out_form" action="logout.php" method="post">
<input type="submit" id="logout_button" name="logout_button" value="Yes"/>
<input type="button" id="break_button" name="break_button"  value="No" onclick="window.location.href='#'"/>
</form>
</div>
</div>
<div id="change_password_applet" class="log_out_applet">
<div>
<a href="#" class="close">X</a>
<form id="change_password" name="change_password" action="change_password.php" method="post" onsubmit="return checkequal();">
<table border="0">
<tr>
<td><input type="password" name="newpass" id="newpass" class="field" placeholder="Password"/></td>
</tr>
<tr>
<td><input type="password" name="cnewpass" id="cnewpass" class="field" placeholder="Confirm Password"/></td>
</tr>
</table>
<input type="submit" value="submit" id="logout_button" name="logout_button"/>
</form>
</div>
</div>
<div id="correct_password_confirmation_applet" class="alert_applet">
<div>
</br></br>
Password Changed successfully !! 
<input type="button" id="ok_button" name="ok_button" value="Ok" onclick="window.location.href='#'"/>
</div>
</div>
<div id="wrong_password_confirmation_applet" class="alert_applet">
<div>
</br></br>
The two passwords do not match!! 
<input type="button" id="ok_button" name="ok_button" value="Ok" onclick="window.location.href='#change_password_applet'"/>
</div>
</div>
<div id="null_password_confirmation_applet" class="alert_applet">
<div>
</br></br>
One of the field has not been set!! 
<input type="button" id="ok_button" name="ok_button" value="Ok" onclick="window.location.href='#change_password_applet'"/>
</div>
</div>
</html>
