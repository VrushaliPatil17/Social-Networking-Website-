<?php
	require_once('auth.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="photo.css" rel="stylesheet" type="text/css" />
</head>

<div class="main">
  <div class="pic">
  <?php
$con = mysql_connect("127.0.0.1", "root", "");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("facebook", $con);

$result = mysql_query("SELECT * FROM photos WHERE uploadedby='".$_SESSION['SESS_MEMBER_ID'] ."'  ORDER BY photo_id DESC");


while($row = mysql_fetch_array($result))
  {
  
  echo "<img width=100 height=100 alt='Unable to View' src='" . $row["location"] . "'><br>";
  echo '<a href=http://localhost/PHP-Login/mphotos.php?id=' . $row["photo_id"] . '>' . $row['caption'] . '</a>';
  echo"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
 
  }

mysql_close($con);
?>
  </div>
</div>

<body>
</body>
</html>
