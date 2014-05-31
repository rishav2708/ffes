<?php
session_start();
?>
<html>
<head>
<title>Thank You</title>
</head>
<style type="text/css">
body{background:#eeeeee;}
#thanku_div{position:absolute;height:270px;width:350px;top:170px;left:350px;border-style:solid;border-width:12pt;border-color:rgb(59,89,152);z-index:10000;background:transparent;font-family:ubuntu helvetica sans;font-size:14pt;font-weight:bold;color:black;padding:30px;border-radius:12px;box-shadow:rgb(59,89,152) 2px 2px 2px 2px;)}
#developer_span{color:rgb(59,89,152);}
</style>
<body>
<div id="thanku_div" name="thanku_div">
<p>Thank You for registering the series...</br>Our help will be for you forever...</br>The site is for those who participate in tv series watching with true seriesman spirit</p>
<p>Thanking You,</br>
<span id="developer_span" name="developer_span">Developer's Team</span></p>
<a href="logout.php">Log Out</a>
</div>
</body>
</html>
