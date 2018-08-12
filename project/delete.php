<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("facebook", $con);
$id=$_POST['useid'];
mysql_query("DELETE FROM friendlist WHERE friends_id='$id'");
echo 'friends succesfully deleted';
mysql_close($con);
?> 