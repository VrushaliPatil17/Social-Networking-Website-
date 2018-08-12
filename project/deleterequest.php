<?php
				  if (isset($_GET['id']))
	{
			$con = mysql_connect("127.0.0.1", "root", "");
			if (!$con)
			  {
			  die('Could not connect: ' . mysql_error());
			  }
			
			mysql_select_db("facebook", $con);
			$friendid = $_GET['id'];
			//$result = mysql_query("SELECT * FROM friendlist WHERE friends_id = $member_id");
			mysql_query("DELETE FROM friendlist WHERE friends_id='$friendid'");
			header("location: profile.php");
			exit();
			
			mysql_close($con);
			}
			?>