
<?php
	require_once('auth.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="keywords" content="">
	<meta name="description" content="">
<title><?php echo $_SESSION['SESS_FIRST_NAME'];?> Friends</title>
<link href="format.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body {
	background-image: url(images/New%20Picture.jpg);
	background-repeat: repeat-x;
}
.style1 {font-weight: bold}
.style3 {color: #0000FF}
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
  <form action="searchfriend.php" method="GET"> 
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

  echo "<img width=50 height=50 alt='Unable to View' src='" . $row["profImage"] . "'>";
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
		  if(isset($_GET['query']))
		  {
mysql_connect("localhost", "root", "") or die("Error connecting to database: ".mysql_error());   
     
 mysql_select_db("facebook") or die(mysql_error());  
    
 $query = $_GET['query'];   

$min_length = 3;  
  
 if(strlen($query) >= $min_length){ 
 $query = htmlspecialchars($query);   
       
 $query = mysql_real_escape_string($query);  

   $raw_results = mysql_query("SELECT * FROM members  
        WHERE (`FirstName` LIKE '%".$query."%') OR (`UserName` LIKE '%".$query."%')") or die(mysql_error());  
  
     if(mysql_num_rows($raw_results) > 0){ 
             
          while($results = mysql_fetch_array($raw_results)){  
        
               //echo $results['FirstName']." ".$results['LastName']; 
			  echo "<img width=100 height=100 alt='Unable to View' src='" .$results['profImage'] . "'>";
			   

			   
			  
            }  
           
      }  
   else{ 
       echo "No results"; 
      }  
        
 }  
 else{  
      echo "Minimum length is ".$min_length;  
  } 
  } 
?>
    </div>
	
	
    <div class="link style1">
	
	<ul id="sddm1">
	<li><a href="#" onmouseover="mopen('m3')" onmouseout="mclosetime()"><img src="images/wal.png" width="17" height="17" border="0" /> &nbsp;Wall</a>
		<div id="m3" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">	  </div>
	</li><br />
	<li><a href="#" onmouseover="mopen('m4')" onmouseout="mclosetime()"><img src="images/message.png" width="16" height="12" border="0" /> &nbsp;Info</a>
		<div id="m4" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">	  </div>
	</li><br />
	<li><a href="photolist.php" onmouseover="mopen('m4')" onmouseout="mclosetime()"><img src="images/photos.png" width="16" height="14" border="0" /> &nbsp;Photos</a>
		<div id="m4" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">	  </div>
	</li><br />
	<li><a href="#" onmouseover="mopen('m4')" onmouseout="mclosetime()"><img src="images/friends.png" width="18" height="15" border="0" /> Friends</a>
		<div id="m4" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">	  </div>
	</li>
</ul>
<div style="clear:both"></div>

<div style="clear:both"></div>
	
	
	</div>
	
	<div class="friends">
	<strong><div align="center">FRIENDS
	<?php
	$con = mysql_connect('localhost','root',"");
	if (!$con)
	{
	die('Could not connect: ' . mysql_error());
	}

	mysql_select_db("facebook", $con);

$result = mysql_query("SELECT * FROM friendlist WHERE addby='".$_SESSION['SESS_FIRST_NAME'] ."' and status='accepted' ORDER BY addby ASC");
	
	$numberOfRows = MYSQL_NUMROWS($result);	
	echo '<font size="2" color="red"><b>' . $numberOfRows. '</b></font>';
	?>
	</div></strong><br />
	<?php
$con = mysql_connect("127.0.0.1", "root", "");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("facebook", $con);

$result = mysql_query("SELECT * FROM friendlist WHERE addby='".$_SESSION['SESS_FIRST_NAME'] ."' and status='accepted' ORDER BY RAND() LIMIT 4");

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
  echo '<a href=http://localhost/PHP-Login/remarks.php?id=' . $row["friends_id"] . '>' . $row['firstname'] . '</a>';
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
	
  </div>
	
	
	
  <div class="right">
    <div class="rightleft">
	  <div class="name">
	  
	  <?php  
		  if(isset($_GET['query']))
		  {
mysql_connect("localhost", "root", "") or die("Error connecting to database: ".mysql_error());   
     
 mysql_select_db("facebook") or die(mysql_error());  
    
 $query = $_GET['query'];   

$min_length = 3;  
  
 if(strlen($query) >= $min_length){ 
 $query = htmlspecialchars($query);   
       
 $query = mysql_real_escape_string($query);  

   $raw_results = mysql_query("SELECT * FROM members  
        WHERE (`FirstName` LIKE '%".$query."%') OR (`UserName` LIKE '%".$query."%')") or die(mysql_error());  
  
     if(mysql_num_rows($raw_results) > 0){ 
             
          while($results = mysql_fetch_array($raw_results)){  
        
               echo $results['FirstName']." ".$results['LastName']; 
			  
			   

			   
			  
            }  
           
      }  
   else{ 
       echo "No results"; 
      }  
        
 }  
 else{  
      echo "Minimum length is ".$min_length;  
  } 
  } 
?>
	  
	  
	  </div>





      <div class="EDUC"><strong>
	  Education, Works, arts, and Entertainment </strong></div>
	  
      <div class="educinfo">
	  <?php  
		  if(isset($_GET['query']))
		  {
mysql_connect("localhost", "root", "") or die("Error connecting to database: ".mysql_error());   
     
 mysql_select_db("facebook") or die(mysql_error());  
    
 $query = $_GET['query'];   

$min_length = 3;  
  
 if(strlen($query) >= $min_length){ 
 $query = htmlspecialchars($query);   
       
 $query = mysql_real_escape_string($query);  

   $raw_results = mysql_query("SELECT * FROM members  
        WHERE (`FirstName` LIKE '%".$query."%') OR (`UserName` LIKE '%".$query."%')") or die(mysql_error());  
  
     if(mysql_num_rows($raw_results) > 0){ 
             
          while($results = mysql_fetch_array($raw_results)){  
        
               echo "College"." ".$results['college']."<br>"; 
			   echo "High School"." ".$results['highschool']."<br>";
			   echo "Arts and Entertainment"." ".$results['arts']."<br>";
	 
            }  
           
      }  
   else{ 
       echo "No results"; 
      }  
        
 }  
 else{  
      echo "Minimum length is ".$min_length;  
  } 
  } 
?>
	<?php
	if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
		echo '<ul class="err">';
		foreach($_SESSION['ERRMSG_ARR'] as $msg) {
			echo '<li>',$msg,'</li>'; 
		}
		echo '</ul>';
		unset($_SESSION['ERRMSG_ARR']);
	}
?>  
	  
	  
	  <br />
      </div>
	  <div class="EDUC1"><strong>
	  Basic and Contact Information</strong></div>
	  <div class="educinfo1">
	  <?php  
		  if(isset($_GET['query']))
		  {
mysql_connect("localhost", "root", "") or die("Error connecting to database: ".mysql_error());   
     
 mysql_select_db("facebook") or die(mysql_error());  
    
 $query = $_GET['query'];   

$min_length = 3;  
  
 if(strlen($query) >= $min_length){ 
 $query = htmlspecialchars($query);   
       
 $query = mysql_real_escape_string($query);  

   $raw_results = mysql_query("SELECT * FROM members  
        WHERE (`FirstName` LIKE '%".$query."%') OR (`UserName` LIKE '%".$query."%')") or die(mysql_error());  
  
     if(mysql_num_rows($raw_results) > 0){ 
             
          while($results = mysql_fetch_array($raw_results)){  
        
               
			   echo "Birthdate"." ".$results['Birthdate']."<br>";
			   echo "Location"." ".$results['hometown'].", ".$results['curcity']."<br>";
			   echo "Gender"." ".$results['Gender']."<br>";
			   echo "About Me"." ".$results['aboutme']."<br>";
			   echo "Contact No."." ".$results['ContactNo']."<br>";
			   echo "Website"." ".$results['Url']."</ br>";
	 
            }  
           
      }  
   else{ 
       echo "No results"; 
      }  
        
 }  
 else{  
      echo "Minimum length is ".$min_length;  
  } 
  } 
?>
</div>
	<div class="buttonback1">
	<form action="addfriend.php" method="get">
	<input name="name" type="hidden" id="name" value="<?php echo $_SESSION['SESS_FIRST_NAME'];?>"/>
	<?php  
		  if(isset($_GET['query']))
		  {
mysql_connect("localhost", "root", "") or die("Error connecting to database: ".mysql_error());  

 mysql_select_db("facebook") or die(mysql_error());  
    /* tutorial_search is the name of database we've created */  
 
 $query = $_GET['query'];   

$min_length = 3;  
    // you can set minimum length of the query if you want  
 if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then  
 $query = htmlspecialchars($query);   
 
 $query = mysql_real_escape_string($query);  
 
    
   $raw_results = mysql_query("SELECT * FROM members  
        WHERE (`FirstName` LIKE '%".$query."%') OR (`UserName` LIKE '%".$query."%')") or die(mysql_error());  

        
     if(mysql_num_rows($raw_results) > 0){ // if one or more rows are returned do following  
             
          while($results = mysql_fetch_array($raw_results)){   
			   echo'<input type="hidden" name="firstname" value="'. $results['FirstName'] .'">'; 
			   echo'<input type="hidden" name="username" value="'. $results['UserName'] .'">';
			   echo'<input type="hidden" name="lastname" value="'. $results['LastName'] .'">';
			   echo'<input type="hidden" name="address" value="'. $results['Address'] .'">';
			   echo'<input type="hidden" name="contactno" value="'. $results['ContactNo'] .'">';
			   echo'<input type="hidden" name="url" value="'. $results['Url'] .'">';
			   echo'<input type="hidden" name="gender" value="'. $results['Gender'] .'"."<br>';
			   echo'<input type="hidden" name="propic" value="'. $results['profImage'] .'"."<br>';
			   echo'<input type="hidden" name="status" value="pending"."<br><br>';
			    //echo'<input type="submit" name="addfriend" value="addfriend">';
       echo'<input name="addfriend" type="submit" value="Add Friend" class="greenButton" />';
            }  
          //error trapping
		  
		  $result = mysql_query("SELECT * FROM friendlist WHERE addby='". $_SESSION['SESS_FIRST_NAME'] ."'");
while($row = mysql_fetch_array($result))
  {
  echo'<input type="hidden" name="url" value="'. $row['friends_id'] .'">';
  }
		  
		  
		  //end of error trapping
		   
      }  
   else{ // if there is no matching rows do following  
       echo "No results"; 
      }  
        
 }  
 else{ // if query length is less than minimum  
      echo "Minimum length is ".$min_length;  
  } 
  } 
?>	

</form>
	  </div>  
    </div>
    </div>
  </div>
</div>

</body>
</html>
