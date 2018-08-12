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
$messages = clean($_POST['comment']);
$user =$_POST['firstname'];
$sql="INSERT INTO comment (comment, post_id)
VALUES
('$messages','$user')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "success";
exit();

mysql_close($con)

?>