<?php
session_start();
?>
<html>
<form id="upload_form" name="upload_form" action="upload.php" method="post" enctype="multipart/form-data">
<input type="file" id="file" name="file"/>
<input type="submit" id="submit" name="submit" value="submit"/>
</form>
</html>
