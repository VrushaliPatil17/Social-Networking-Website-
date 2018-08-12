<?php
				  if (isset($_GET['id']))
	{
			$con = mysql_connect("127.0.0.1", "root", "");
			if (!$con)
			  {
			  die('Could not connect: ' . mysql_error());
			  }
			
			mysql_select_db("facebook", $con);
			$messages_id = $_GET['id'];
			//$result = mysql_query("SELECT * FROM friendlist WHERE friends_id = $member_id");
			mysql_query("DELETE FROM message WHERE messages_id='$messages_id'");
			header("location: profile.php");
			exit();
			
			mysql_close($con);
			}
			?>