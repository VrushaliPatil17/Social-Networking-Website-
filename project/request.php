<?php
	require_once('auth.php');
?>
<?php
$con = mysql_connect("127.0.0.1", "root", "");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("facebook", $con);

$result = mysql_query("SELECT * FROM friendlist WHERE firstname='".$_SESSION['SESS_FIRST_NAME'] ."' and status='pending' ORDER BY firstname ASC");

echo "<br />";
while($row = mysql_fetch_array($result))
  {
  		
		echo $row['addby'];
		echo '<a href=http://localhost/PHP-Login/acceptrequest.php?id=' . $row["friends_id"] . '>' . "Accept" .  '</a>';
		echo '<a href=http://localhost/PHP-Login/deleterequest.php?id=' . $row["friends_id"] . '>' . "Delete" .  '</a>';
  }

mysql_close($con);

?>
