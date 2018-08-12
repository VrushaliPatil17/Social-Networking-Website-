
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
</head>

<body>
<div class="main">

<div class="lefttop">

  <div class="lefttopleft"><img src="images/logo.jpg" width="94" height="21" /></div>
  
  <div class="lefttoright">
  <a href="confirm.php"><img src="images/Untitled-1.png" width="15" height="15" border="0" /></a><?php
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
		
		<a href="unread.php"><img src="images/messages.png" width="15" height="15" border="0" /></a>
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
  </form>	
  </div>
  
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
    <a href="regestration.php">efrewrfewrgt tgrewt
  
  </a></div>
  

  <div class="rightprof">
  <form action="saveprofile.php" method="post">
  <input name="userid" type="hidden" id="curcity" value=" <?php echo $_SESSION['SESS_MEMBER_ID'];?>" /> 
    <div class="namerightprof">

		<div class="nameagain">
		
		<b><?php
$con = mysql_connect("127.0.0.1", "root", "");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("facebook", $con);

$result = mysql_query("SELECT * FROM members WHERE member_id='".$_SESSION['SESS_MEMBER_ID'] ."'");

while($row = mysql_fetch_array($result))
  {
  
  echo "<p><h3>".$row['FirstName']." ".$row['LastName']."</h3>"."</p>";

  		//echo "<img width=50 height=50 alt='Unable to View' src='" . $row["location"] . "'>";
  		//echo '<a href=http://localhost/PHP-Login/member-index.php?id=' . $row["friends_id"] . '>' . $row['firstname'] . '</a><br />';
		
  }

mysql_close($con);
?></b>
		
		</div>
		
		
		
		
		
	    <div class="buttonback">
		
<a href="INFO.php"><input name="back" type="button" value="&lt;View My Profile" class="greenButton" /></a>

		</div>
    </div>
	<div class="namerightprof1">
	<?php
$con = mysql_connect("127.0.0.1", "root", "");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("facebook", $con);

$result = mysql_query("SELECT * FROM members WHERE member_id='".$_SESSION['SESS_MEMBER_ID'] ."'");

while($row = mysql_fetch_array($result))
  {
  
 
	 echo '<div class="currentcity">';
	    
	      echo '<div class="cur">';
		  
		  
		  
		  
		  echo '&nbsp;&nbsp;&nbsp;&nbsp;Address :';
	        //echo '<input name="curcity" type="text" id="curcity"/>'; 
			echo'<input type="text" name="curcity" value="'. $row['curcity'] .'">';
	        echo '<br /><br />';
	     
	      echo '&nbsp;&nbsp;&nbsp;&nbsp;Location:';
	        
          //echo '<input name="hometown" type="text" id="hometown" />';
		  echo'<input type="text" name="hometown" value="'. $row['hometown'] .'">';
	      echo '</div>';  
	     
	      
	    
	  echo '</div>';
	  
	  echo '<div class="currentcity1">';
	    echo '<div class="i">';
		echo 'I am';
          
          echo '<select name="Iam" id="Iam">';
            echo '<option selected="selected">';
			echo $row['Gender'];
			echo '</option>';
            echo '<option>';
			echo 'Male';
			echo '</option>';
            echo '<option>';
			echo 'Female';
			echo '</option>';
          echo '</select>';
          
	    echo '</div>';
	  echo '</div>';
	  
  
	  
	  
	  echo '<div class="currentcity1">';
	    echo '<div class="birth">';
		echo 'Birthday';
          echo '<span class="input-container">';
          echo '<select name="month" id="month">';
            echo '<option>';
			echo $row['month'];
			echo '</option>';
			$month=$row['month'];
			$name= mysql_query("select * from month where month !='$month'");
			
           while($res= mysql_fetch_assoc($name))
{
echo '<option>';
echo $res['month'];
echo'</option>';
}
          echo '</select>';
          echo '<select name="day">';
            echo '<option>';
			echo $row['day'];
			echo '</option>';
			$day=$row['day'];
			$name= mysql_query("select * from day where day !='$day'");
             while($res= mysql_fetch_assoc($name))
{
echo '<option>';
echo $res['day'];
echo'</option>';
}
          echo '</select>';
          echo '<select name="year">';
            echo '<option>';
			echo $row['year'];
			echo '</option>';
			$year=$row['year'];
			$name= mysql_query("select * from year where year !='$year'");
            while($res= mysql_fetch_assoc($name))
{
echo '<option>';
echo $res['year'];
echo'</option>';
}
          echo '</select>';
          echo '</span></div>';
	  echo '</div>';
	  
	  

	  echo '<div class="currentcity1">';
	    echo '<div class="interested">';
		echo 'Interested In';        
	      echo '<select name="Interested" id="Interested">';
            echo '<option selected="selected">';
			echo $row['Interested'];
			echo '</option>';
            echo '<option>';
			echo 'Men';
			echo '</option>';
            echo '<option>';
			echo 'Women';
			echo '</option>';
            echo '</select>';
	    echo '</div>';
	  echo '</div>';
	  
	  
	  
 
	  
	  
	  
	  echo '<div class="currentcity1">';
	    echo '<div class="lang">';
		echo 'language';
          
          //echo '<input name="language" type="text" id="language" />';
		  echo'<input type="text" name="language" value="'. $row['language'] .'">';
          
echo '</div>';
	  echo '</div>';
	  echo '<div class="currentcity1">';
	    echo '<div class="college">';
		echo 'College';
          
          //echo '<input name="college" type="text" id="college" />';
		  echo'<input type="text" name="college" value="'. $row['college'] .'">';
          
echo '</div>';
	  echo '</div>';
	 echo ' <div class="currentcity1">';
	    echo '<div class="high">';
		echo 'Highschool';
          
          //echo '<input name="highschool" type="text" id="highschool" />';
		  echo'<input type="text" name="highschool" value="'. $row['highschool'] .'">';
          
echo '</div>';
	  echo '</div>';
	 echo '<div class="currentcity1">';
	    echo '<div class="experiences">';
		echo 'Experiences';
          
          //echo '<input name="experiences" type="text" id="experiences" />';
		   echo'<input type="text" name="experiences" value="'. $row['experiences'] .'">';
          
echo '</div>';
	  echo '</div>';
	  echo '<div class="currentcity1">';
	    echo '<div class="aande">';
		echo 'Arts and Entertainment';
          
         //echo '<input name="arts" type="text" id="arts" />';
		 echo'<input type="text" name="arts" value="'. $row['arts'] .'">';
          
echo '</div>';
	  echo '</div>';
	  
	  echo '<div class="currentcity">';
	   echo '<div class="about">about me</div>';
       
          echo '<div class="aboutt">';
		  echo'<input type="text" name="aboutme" value="'. $row['aboutme'] .'">';
          echo '</div>';
         
	    
	  echo '</div>';
	  
	  
	  
	  
	  
	 }

mysql_close($con);
?>  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  <div class="currentcity1">
	    <div class="save">
	      
	      <input type="submit" name="Submit" value="Save Changes" class="greenButton" />
          
	    </div>
		
	  </div>
	  
	  
	</div>
	</form>
  </div>
</div>
</body>
</html>
