
<?php

$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
 
 function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
mysql_select_db("facebook", $con);
$messages = clean($_POST['message']);
$user =clean($_POST['name']);
$pic =clean($_POST['name1']);
$poster =clean($_POST['poster']);
$sql="INSERT INTO message (messages, user, picture, date_created, poster)
VALUES
('$messages','$user','$pic','".strtotime(date("Y-m-d H:i:s"))."','$poster')";
mysql_query("UPDATE messages SET picture = '$pic' WHERE FirstName='$user'");
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
header("location: profile.php");
exit();

mysql_close($con)

?>
<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("facebook", $con);

$name=$_POST['name'];
$pic=$_POST['name1'];


mysql_query("UPDATE messages SET picture = '$pic' WHERE FirstName='$name'");

mysql_close($con);
?> 
