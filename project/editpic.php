<?php
	require_once('auth.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" href="img/Untitled-1.png" type="image" />
<link rel="shortcut icon" href="img/Untitled-1.png" type="image" />

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<form action="editpic.php" method="post" enctype="multipart/form-data">
  <p>Name:
    <label>
    
    </label>
  </p>
  <p> file:
    <input type="file" name="image"> 
  </p>
  <p>
    <input type="submit" value="Upload">
        </p>
</form>

<?php
mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("facebook") or die(mysql_error());

$id= $_SESSION['SESS_MEMBER_ID'];
$user= $_SESSION['SESS_FIRST_NAME'];



	if (!isset($_FILES['image']['tmp_name'])) {
	echo "";
	}else{
	$file=$_FILES['image']['tmp_name'];
	$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$image_name= addslashes($_FILES['image']['name']);
	$image_size= getimagesize($_FILES['image']['tmp_name']);

	
		if ($image_size==FALSE) {
		
			echo "That's not an image!";
			
		}else{
			
			move_uploaded_file($_FILES["image"]["tmp_name"],"uploadedimage/" . $_FILES["image"]["name"]);
			
			$location="uploadedimage/" . $_FILES["image"]["name"];

			$update2=mysql_query("UPDATE postcomment SET pic = '$location' WHERE commentedby='$user'");
			$update3=mysql_query("UPDATE message SET picture = '$location' WHERE user='$user'");
			
			/*mysql_query("UPDATE members SET profImage = '$location' WHERE message_id='$messageid'");

			mysql_close($con);*/
			if(!$update=mysql_query("UPDATE members SET profImage = '$location' WHERE member_id='$id'")) {
			
				echo mysql_error();
				
				
			}
			else{
			
			header("location: lol.php");
			exit();
			}
			}
	}


?>
</body>
</html>
