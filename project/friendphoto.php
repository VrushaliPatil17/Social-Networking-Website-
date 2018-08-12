
<?php
	require_once('auth.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" href="img/Untitled-1.png" type="image" />
<link rel="shortcut icon" href="img/Untitled-1.png" type="image" />

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="keywords" content="">
	<meta name="description" content="">
<title><?php echo $_SESSION['SESS_FIRST_NAME'];?> Profile</title>
<link type='text/css' href='css1/demo.css' rel='stylesheet' media='screen' />
<link type='text/css' href='css1/basic.css' rel='stylesheet' media='screen' />
<script type='text/javascript' src='js/jquery.js'></script>
<script type='text/javascript' src='js/jquery.simplemodal.js'></script>
<script type='text/javascript' src='js/basic.js'></script>
<link href="format.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body {
	background-image: url(images/New%20Picture.jpg);
	background-repeat: repeat-x;
}
.style1 {font-weight: bold}
.style2 {font-size: 12px}
-->
</style>

<script type="text/javascript">
<!--
var timeout         = 500;
var closetimer		= 0;
var ddmenuitem      = 0;

// open hidden layer
function mopen(id)
{	
	// cancel close timer
	mcancelclosetime();

	// close old layer
	if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';

	// get new layer and show it
	ddmenuitem = document.getElementById(id);
	ddmenuitem.style.visibility = 'visible';

}
// close showed layer
function mclose()
{
	if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';
}

// go close timer
function mclosetime()
{
	closetimer = window.setTimeout(mclose, timeout);
}

// cancel close timer
function mcancelclosetime()
{
	if(closetimer)
	{
		window.clearTimeout(closetimer);
		closetimer = null;
	}
}

// close layer when click-out
document.onclick = mclose; 
// -->
</script>
<script language="javascript" type="text/javascript">
function showHide(shID) {
	if (document.getElementById(shID)) {
		if (document.getElementById(shID+'-show').style.display != 'none') {
			document.getElementById(shID+'-show').style.display = 'none';
			document.getElementById(shID).style.display = 'block';
		}
		else {
			document.getElementById(shID+'-show').style.display = 'inline';
			document.getElementById(shID).style.display = 'none';
		}
	}
}
</script>
<style type="text/css">
	/* This CSS is just for presentational purposes. */
	
	#wrap {
		font: 1.3em/1.3 Arial, Helvetica, sans-serif;
		width: 30em;
		margin: 0 auto;
		padding: 1em;
		background-color: #fff; }
	h1 {
		font-size: 200%; }

	/* This CSS is used for the Show/Hide functionality. */
	.more {
		display: none;
		border-top: 1px solid #666;
		border-bottom: 1px solid #666; }
	a.showLink, a.hideLink {
		text-decoration: none;
		color: #36f;
		padding-left: 8px;
		background: transparent url(down.gif) no-repeat left; }
	a.hideLink {
		background: transparent url(up.gif) no-repeat left; }
	a.showLink:hover, a.hideLink:hover {
		border-bottom: 1px dotted #36f; }
a:link {
	color: #0000FF;
	text-decoration: none;
}
a:hover {
	color: #0033FF;
	text-decoration: underline;
}
a:visited {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
.style3 {color: #0000FF}
</style>
</head>

<body>
<div class="main1">

<div class="lefttop">

  <div class="lefttopleft"><img src="images/logo.jpg" width="94" height="21" /></div>
  
  <div class="lefttoright">
  <a href="request.php"><img src="images/Untitled-1.png" width="15" height="15" border="0" /></a><?php
	$con = mysql_connect('localhost','root',"");
	if (!$con)
	{
	die('Could not connect: ' . mysql_error());
	}

	mysql_select_db("facebook", $con);

$result = mysql_query("SELECT * FROM friendlist WHERE firstname='".$_SESSION['SESS_FIRST_NAME'] ."' and status='pending' ORDER BY firstname ASC");
	
	$numberOfRows = MYSQL_NUMROWS($result);	
	
	echo '<font size="2" color="red"><b>' . $numberOfRows . '</b></font>'; 
	?>
		
		<a href="messages.php"><img src="images/messages.png" width="15" height="15" border="0" /></a>
		<?php
	$con = mysql_connect('localhost','root',"");
	if (!$con)
	{
	die('Could not connect: ' . mysql_error());
	}

	mysql_select_db("facebook", $con);

$result = mysql_query("SELECT * FROM messages WHERE receiver='".$_SESSION['SESS_FIRST_NAME'] ."' and status='pending' ORDER BY receiver ASC");
	
	$numberOfRows = MYSQL_NUMROWS($result);	
	echo '<font size="2" color="red"><b>' . $numberOfRows. '</b></font>';
	?>
  </div>
</div>
	
	
	
  <div class="righttop">
  <div class="search">
   <form action="friends.php" method="GET"> 
	<input name="query" type="text" maxlength="30" class="textfield" />
  </form></div>
  
    <div class="nav"><ul id="sddm">
	
	<li><a href="lol.php" onmouseover="mopen('m3')" onmouseout="mclosetime()">Home</a>
		<div id="m3" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">		  </div>
	</li>
	<li><a href="profile.php" onmouseover="mopen('m4')" onmouseout="mclosetime()">Profile</a>
		<div id="m4" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">		  </div>
	</li>
	<li><a href="#" onmouseover="mopen('m5')" onmouseout="mclosetime()">Account</a>
		<div id="m5" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
		<a href="profile.php">	
		<?php
$con = mysql_connect("127.0.0.1", "root", "");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("facebook", $con);

$result = mysql_query("SELECT * FROM members WHERE FirstName='".$_SESSION['SESS_FIRST_NAME'] ."'");

echo "<br />";
while($row = mysql_fetch_array($result))
  {

  echo "<img width=70 height=90 alt='Unable to View' src='" . $row["profImage"] . "'>";
  echo '<br />';
  echo $_SESSION['SESS_FIRST_NAME']." ". $row["LastName"] ;
 
  		//echo "<img width=50 height=50 alt='Unable to View' src='" . $row["location"] . "'>";
  		//echo '<a href=http://localhost/PHP-Login/member-index.php?id=' . $row["friends_id"] . '>' . $row['firstname'] . '</a><br />';
		
  }

mysql_close($con);
?></a>
		<a href="editfriends.php">Edit Friend</a>
		<a href="#">Account Setting</a>	
		<a href="searchfriend.php">SearchFriend</a>
		<a href="index.php">Logout</a>		  </div>
	</li>
</ul>
<div style="clear:both"></div>

<div style="clear:both"></div></div>
  </div>
  <div class="left">
    <div class="propic">
	<?php
							if (isset($_GET['id']))
							{
						$con = mysql_connect('localhost','root',"");
						if (!$con)
						  {
						  die('Could not connect: ' . mysql_error());
						  }
						
						mysql_select_db("facebook", $con);
						
						$member_id = $_GET['id'];
						$result = mysql_query("SELECT * FROM friendlist WHERE friends_id = $member_id");
						
						$row = mysql_fetch_array($result);
						if (!$result) 
												{
												echo "wala";
												}
												else{
						echo "<br />";
						echo "<img width=106 height=140 alt='Unable to View' src='" . $row["location"] . "'> <br />";
						
						mysql_close($con);
						}
						}
						?>
	</div>
	
	
    <div class="link style1">
	
	<ul id="sddm1">
	<li><a href="#" onmouseover="mopen('m3')" onmouseout="mclosetime()">Wall</a>
		<div id="m3" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">	  </div>
	</li><br />
	<li><?php
	if (isset($_GET['id']))
	{
	
	$con = mysql_connect('localhost','root',"");
	if (!$con)
	{
	die('Could not connect: ' . mysql_error());
	}

	mysql_select_db("facebook", $con);
	
	$info=$_GET['id'];
$result = mysql_query("SELECT * FROM friendlist WHERE friends_id='$info'");


while($row = mysql_fetch_array($result))
  {
  
  echo '<a href=http://localhost/PHP-Login/friendsinfo.php?id=' . $row["friends_id"] . '>' . "Info" .'</a>';
 
  }
	}
	?>
		<div id="m4" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">	  </div>
	</li><br />
	<li>
	
	<!--link to view photos--><!--counterphotos-->
	  <?php
	 if (isset($_GET['id']))
	{
	
	$con = mysql_connect('localhost','root',"");
	if (!$con)
	{
	die('Could not connect: ' . mysql_error());
	}

	mysql_select_db("facebook", $con);
	$member_id = $_GET['id'];
			$result1 = mysql_query("SELECT * FROM friendlist WHERE friends_id = $member_id");
			
			while($row = mysql_fetch_array($result1))
			  {
			  $uploaded=$row['firstname'];
			  }

$result = mysql_query("SELECT * FROM photos WHERE uploadedby='$uploaded'");
	
	$numberOfRows = MYSQL_NUMROWS($result);
	$photo=$_GET['id'];
$result = mysql_query("SELECT * FROM friendlist WHERE friends_id='$photo'");


while($row = mysql_fetch_array($result))
  {
  
  echo '<a href=http://localhost/PHP-Login/friendsprofile1.php?id=' . $row["friends_id"] . '>' . '<font color="#0000FF">' . "Photos" . '</font>' . '   ('. $numberOfRows . ')' . '</a>';
 
  }
	//echo '<font size="1" color="blue"><b>' . $numberOfRows . '</b></font>'; 
	
	}
	?>
	
	
	
	</a>
		<div id="m4" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">	  </div>
	</li><br />
	<li><?php
	if (isset($_GET['id']))
	{
	
	$con = mysql_connect('localhost','root',"");
	if (!$con)
	{
	die('Could not connect: ' . mysql_error());
	}

	mysql_select_db("facebook", $con);
	$member_id = $_GET['id'];
			$result1 = mysql_query("SELECT * FROM friendlist WHERE friends_id = $member_id");
			
			while($row = mysql_fetch_array($result1))
			  {
			  $friendlist=$row['firstname'];
			  }


$result = mysql_query("SELECT * FROM friendlist WHERE addby='$friendlist' and status='accepted' ");
	
	$numberOfRows = MYSQL_NUMROWS($result);	
	$photo=$_GET['id'];
$result = mysql_query("SELECT * FROM friendlist WHERE friends_id='$photo'");


while($row = mysql_fetch_array($result))
  {
  
  echo '<a href=http://localhost/PHP-Login/friendsprofile1.php?id=' . $row["friends_id"] . '>' . "Friends" . '   ('. $numberOfRows . ')' . '</a>';
 
  }
	}
	?></a>
		<div id="m4" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">	  </div>
	</li>
</ul>
<div style="clear:both"></div>

<div style="clear:both"></div>
	
	
	</div>
	
    <div class="friends">
	<strong><div align="center"></div>
	</strong>
	<div align="center"><div id='basic-modal'><a class='basic' href="#" style="text-decoration:none;">View all Friend</a></div>
	
	<div id="basic-modal-content">
	
					<?php
				$con = mysql_connect("127.0.0.1", "root", "");
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				
				mysql_select_db("facebook", $con);
				
				$result = mysql_query("SELECT * FROM friendlist WHERE addby='".$_SESSION['SESS_FIRST_NAME'] ."' and status='accepted'");
				echo $_SESSION['SESS_FIRST_NAME'];
				echo '>';
				echo 'Friends';
				echo "<br />";
				while($row = mysql_fetch_array($result))
				  {
				  echo '<table width="125" height="50" border="0" cellspacing="0" cellpadding="0" align="center">';
				  echo '<tr>';
				  echo '<td width="50px" colspan="0" rowspan="3" align="left" valign="top">';
				  echo "<img width=50 height=50 alt='Unable to View' src='" . $row["location"] . "'>";
				  echo '</td>';
				  echo '<td height="16">&nbsp;</td>';
				  echo '</tr>';
				  echo '<tr>';
				  echo '<td height="17">';
				  echo '<div align="left" valign="center">';
				  echo '&nbsp;&nbsp;';
				  echo '<a href=http://localhost/PHP-Login/friendsprofile.php?id=' . $row["friends_id"] . '>' . $row['firstname'] . '</a>';
				  echo '</div>';
				  echo '</td>';
				  echo '</tr>';
				  echo '<tr>';
				  echo '<td height="16">&nbsp;</td>';
				  echo ' </tr>';
				  echo '</table>';
				  echo '<br>';
						//echo "<img width=50 height=50 alt='Unable to View' src='" . $row["location"] . "'>";
						//echo '<a href=http://localhost/PHP-Login/member-index.php?id=' . $row["friends_id"] . '>' . $row['firstname'] . '</a><br />';
						
				  }
				
				mysql_close($con);
				?>
	
	</div>

		<!-- preload the images -->
		<div style='display:none'>
			<img src='img/basic/x.png' alt='' />
		</div>
		<!--end of popup-->
	
	
	    <?php
if (isset($_GET['id']))
	{
	
	$con = mysql_connect('localhost','root',"");
	if (!$con)
	{
	die('Could not connect: ' . mysql_error());
	}

	mysql_select_db("facebook", $con);
	$member_id = $_GET['id'];
			$result1 = mysql_query("SELECT * FROM friendlist WHERE friends_id = $member_id");
			
			while($row = mysql_fetch_array($result1))
			  {
			  $friendlist=$row['firstname'];
			  }

$result = mysql_query("SELECT * FROM friendlist WHERE addby='$friendlist' and status='accepted' ORDER BY RAND() LIMIT 4");

echo "<br />";
while($row = mysql_fetch_array($result))
  {
  echo '<table width="125" height="50" border="0" cellspacing="0" cellpadding="0" align="center">';
  echo '<tr>';
  echo '<td width="50px" colspan="0" rowspan="3" align="left" valign="top">';
  echo "<img width=50 height=50 alt='Unable to View' src='" . $row["location"] . "'>";
  echo '</td>';
  echo '<td height="16">&nbsp;</td>';
  echo '</tr>';
  echo '<tr>';
  echo '<td height="17">';
  echo '<div align="left">';
  echo '&nbsp;&nbsp;';
  echo '<a href=http://localhost/PHP-Login/friendsprofile1.php?id=' . $row["friends_id"] . '>' . $row['firstname'] . '</a>';
  echo '</div>';
  echo '</td>';
  echo '</tr>';
  echo '<tr>';
  echo '<td height="16">&nbsp;</td>';
  echo ' </tr>';
  echo '</table>';
  echo '<br>';
  		//echo "<img width=50 height=50 alt='Unable to View' src='" . $row["location"] . "'>";
  		//echo '<a href=http://localhost/PHP-Login/member-index.php?id=' . $row["friends_id"] . '>' . $row['firstname'] . '</a><br />';
		
  }

mysql_close($con);
}
?>
 
	  
	  </div>
    </div>
  </div>
	
	
	
  <div class="right">
    <div class="rightleft">
      <div class="name"><strong>
        <?php
				  if (isset($_GET['id']))
	{
			$con = mysql_connect("127.0.0.1", "root", "");
			if (!$con)
			  {
			  die('Could not connect: ' . mysql_error());
			  }
			
			mysql_select_db("facebook", $con);
			$member_id = $_GET['id'];
			$result = mysql_query("SELECT * FROM friendlist WHERE friends_id = $member_id");
			
			while($row = mysql_fetch_array($result))
			  {
			  
			  echo "<p><h3>".$row['firstname']." ".$row['lastname']."</h3>"."</p>";
			
					//echo "<img width=50 height=50 alt='Unable to View' src='" . $row["location"] . "'>";
					//echo '<a href=http://localhost/PHP-Login/member-index.php?id=' . $row["friends_id"] . '>' . $row['firstname'] . '</a><br />';
					
			  }
			
			mysql_close($con);
			}
			?>
      </strong></div>
      <div class="information">
        <?php
if (isset($_GET['id'])){
$con = mysql_connect("127.0.0.1", "root", "");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("facebook", $con);

$member_id = $_GET['id'];
			$result = mysql_query("SELECT * FROM friendlist WHERE friends_id = $member_id");

while($row = mysql_fetch_array($result))
  {
  
  echo "Live in: "."<b>".$row['address']."</b>"."    |    " ."Gender : "."<b>".$row['gender']."</b>"; 
		
  }

mysql_close($con);
}
?>
      </div>
      <div class="EDUC"><strong> Friends Photos </strong> </div>
      <div class="educinfo2"><br />
          <?php
		  if (isset($_GET['id'])){
$con = mysql_connect("127.0.0.1", "root", "");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("facebook", $con);
$member_id = $_GET['id'];
			$result1 = mysql_query("SELECT * FROM friendlist WHERE friends_id = $member_id");

while($row1 = mysql_fetch_array($result1))
  {
$uploadedby=$row1['firstname'];	
  }

$result = mysql_query("SELECT * FROM photos WHERE uploadedby='$uploadedby'  ORDER BY photo_id DESC");


while($row = mysql_fetch_array($result))
  {

  //echo "<img width=100 height=100 alt='Unable to View' src='" . $row["location"] . "'>";

 echo '<a href=http://localhost/PHP-Login/photocomment.php?id=' . $row["photo_id"] . '>' . "<img width=100 height=100 alt='Unable to View' src='". $row["location"] . "'>" . '</a>';

  echo"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

  }

mysql_close($con);
}
?>
      </div>
    </div>
    <div class="rightright">
	
	
	  <div class="rightright1">People You May Know</div>
	  <div class="rightright2">
	  
	  
	  <?php
$con = mysql_connect("127.0.0.1", "root", "");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("facebook", $con);

$result = mysql_query("SELECT * FROM members ORDER BY RAND() LIMIT 4");

echo "<br />";
while($row = mysql_fetch_array($result))
  {
  echo '<table width="125" height="50" border="0" cellspacing="0" cellpadding="0" align="center">';
  echo '<tr>';
  echo '<td width="50px" colspan="0" rowspan="3" align="left" valign="top">';
  echo "<img width=50 height=50 alt='Unable to View' src='" . $row["profImage"] . "'>";
  echo '</td>';
  echo '<td height="16">&nbsp;</td>';
  echo '</tr>';
  echo '<tr>';
  echo '<td height="17">';
  echo '<div align="left">';
  echo '&nbsp;&nbsp;';
  echo '<a href=http://localhost/PHP-Login/member-index.php?id=' . $row["member_id"] . '>' . $row['FirstName'] . '</a>';
  echo '</div>';
  echo '</td>';
  echo '</tr>';
  echo '<tr>';
  echo '<td height="16">&nbsp;</td>';
  echo ' </tr>';
  echo '</table>';
  echo '<br>';
  		
		
  }

mysql_close($con);
?>
	  
	  
	  
	  </div>
	</div>
	
  </div>
</div>
</body>
</html>
