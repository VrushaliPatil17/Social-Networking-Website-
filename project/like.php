
<?php
				 
			$con = mysql_connect("127.0.0.1", "root", "");
			if (!$con)
			  {
			  die('Could not connect: ' . mysql_error());
			  }
			
			mysql_select_db("facebook", $con);
			$messages = $_POST['com'];
			$remarksby = $_POST['cam'];
			//mysql_query("INSERT INTO like(like, likeby) VALUES ('$messages_id','$likeby')");
			$sql="INSERT INTO bleh (remarks, remarksby)
VALUES
('$messages','$remarksby')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
			header("location: lol.php");
			exit();
			
			mysql_close($con);
			
			?>