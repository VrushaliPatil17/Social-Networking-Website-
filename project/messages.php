
<?php
	require_once('auth.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<p>New messages</p>
<p>
<?php
$con = mysql_connect("127.0.0.1", "root", "");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("facebook", $con);

$result = mysql_query("SELECT * FROM messages WHERE receiver='".$_SESSION['SESS_FIRST_NAME'] ."' and status='pending' ORDER BY receiver ASC");

echo "<br />";
while($row = mysql_fetch_array($result))
  {
  		echo $row['sender'];
		echo '&nbsp;&nbsp;&nbsp;';
		echo '<a href=http://localhost/PHP-Login/read.php?id=' . $row["message_id"] . '>' . "Read" . '</a>';
		echo '&nbsp;&nbsp;&nbsp;';
		echo '<a href=http://localhost/PHP-Login/replymessages.php?id=' . $row["message_id"] . '>' . "Reply" . '</a><br />';
		
  }
mysql_close($con);

?>


</p>
</body>
</html>
