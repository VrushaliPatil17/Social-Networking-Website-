
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
$messages = clean($_POST['postcomment']);
$user =clean($_POST['user']);
$pic =clean($_POST['pic']);
$postid =clean($_POST['postid']);
$poster2 =clean($_POST['poster2']);
$sql="INSERT INTO postcomment (content, commentedby, pic, id, date_created)
VALUES
('$messages','$user','$pic','$postid','".strtotime(date("Y-m-d H:i:s"))."')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
header("location: friendsprofile1.php" ."?id=" . "$poster2");
exit();

mysql_close($con)

?>

