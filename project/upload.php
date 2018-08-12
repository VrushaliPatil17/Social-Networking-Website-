
<?php
	require_once('auth.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">


body{
	font-family:arial;
	
	background-color:#cbd4e4;

}

table{font-size:80%; background:url(img/bg.jpg) repeat-x #cbd4e4;}

a{color:black;text-decoration:none;font:bold}

a:hover{background-color:#606060}

td.menu{background-color:lightblue}

table.menu

{

font-size:100%;

position:absolute;

visibility:hidden;

}

</style>
</head>

<body>
<table width="286" height="163" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="282" height="161" valign="top"><p>
	
	</p>
    <form action="saveupload.php" method="post" enctype="multipart/form-data">
  <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;file:
    <input type="file" name="image"> 
  </p>
  <p>&nbsp;
    Term
    <select name="term" id="term">
      <option>Select Term</option>
      <option>Private</option>
      <option>Public</option>
    </select>
   
    &nbsp;</p>
  <p>name:
    <label>
	<input name="uploadedby" type="text"  value="<?php echo $_SESSION['SESS_MEMBER_ID'];?>"/>
    <input name="caption" type="text" id="caption" />
    </label>
  </p>
  <p>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="submit" value="Upload">
  </p>
    </form>sa
	
	<label><a href="photolist.php">back to Photos </a></label></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
