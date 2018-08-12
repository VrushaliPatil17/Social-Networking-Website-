
<?php
	//Start session
	session_start();
	
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_FIRST_NAME']);
	unset($_SESSION['SESS_LAST_NAME']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" href="img/Untitled-1.png" type="image" />
<link rel="shortcut icon" href="img/Untitled-1.png" type="image" />


<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>BookFace the leading</title>
<link href="format1.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/reset.css" type="text/css" />
<link rel="stylesheet" href="css/master.css" type="text/css" />

<script type="text/javascript" src="contact1.js"></script>
<script type="text/javascript" src="contact.js"></script>
<script type="text/javascript" src="contact3.js"></script>
<style type="text/css">
<!--
body {
	background-image: url(img/bg2.jpg);
	background-repeat:repeat-x;
	background-color:#d9deeb;

}
-->
</style>
<script type="text/javascript" src="jquery.watermarkinput.js"></script>
<script type="text/javascript">
jQuery(function($){
   $("#login").Watermark("username");
   
   });
</script>



</head>
<SCRIPT LANGUAGE="JavaScript">
function CountLeft(field, count, max) {
if (field.value.length > max)
field.value = field.value.substring(0, max);
else
count.value = max - field.value.length;
}
</script>
<body>
<div class="mainr">
  <div class="topleft"><img src="img/logo1.jpg" width="175" height="41" /></div>
  <form action="login-exec.php" method="post">
  <div class="qwerty">
  
		<div class="label">
		  <div class="email">UserName</div>
		  <div class="password">Password</div>
		</div>
		<div class="label1">
				
				<div class="emailtext"><input name="login" type="text" id="login"  />
				</div>
		  		<div class="passwordtext"><input name="password" type="password"  />
		  		<input type="submit" class="greenButton" value="Login" /></div>
				
		</div>
		<div class="label2">
		
				<div class="email">
				<div class="radio"><input name="check" type="checkbox" value="" /></div>
				<div class="text1">Keep me Log-in</div>
				</div>
		  		<div class="password">Forgot Password?</div>
		
		</div>
</div>
</form>





</div>


<div class="downleft">

  <div class="picture">
  
  
  
  <img src="img/wala.jpg" width="471" height="257" />
  
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
  
  
  </div>
  <div class="field">
  
    <div class="signup">Sign Up</div>
	<div class="free">It's free, and always will be</div>
	<div class="text">
	<form action="register-exec.php" method="post">
	  	<div class="textleft">FirstName:</div>
		<div class="textright"><input name="fname" type="text" class="textfield" id="fname" onKeyDown="CountLeft(this.form.fname, this.form.left,30);" onKeyUp="CountLeft(this.form.fname,this.form.left,30);" size="40">
		<input readonly type="text" name="left" size=3 maxlength=3 value="30" disabled="disabled" class="textfield2">
		</div>
		<div class="textleft">LastName:</div>
		<div class="textright"><input name="lname" type="text" class="textfield" id="lname" onKeyDown="CountLeft(this.form.lname, this.form.last,30);" onKeyUp="CountLeft(this.form.lname,this.form.last,30);" size="40">
		<input readonly type="text" name="last" size=3 maxlength=3 value="30" disabled="disabled" class="textfield2">
		</div>
		<div class="textleft">UserName:</div>
		<div class="textright"><input name="login" type="text" class="textfield" id="login1" onKeyDown="CountLeft(this.form.login, this.form.log,30);" onKeyUp="CountLeft(this.form.login,this.form.log,30);" size="40">
		<input readonly type="text" name="log" size=3 maxlength=3 value="30" disabled="disabled" class="textfield2">
		</div>
		<div class="textleft">Password:</div>
		<div class="textright">
		  <input name="password2" type="password" class="textfield" id="password" onkeydown="CountLeft(this.form.password, this.form.pas,30);" onkeyup="CountLeft(this.form.password,this.form.pas,30);" size="40" />
		  <input readonly type="text" name="pas" size=3 maxlength=3 value="30" disabled="disabled" class="textfield2">
		</div>
		<div class="textleft">Cofirm Password:</div>
		<div class="textright"><input name="cpassword" type="password" class="textfield" id="cpassword" onkeydown="CountLeft(this.form.cpassword, this.form.pas1,30);" onkeyup="CountLeft(this.form.cpassword,this.form.pas1,30);" size="40" />
		  <input readonly type="text" name="pas1" size=3 maxlength=3 value="30" disabled="disabled" class="textfield2">
		</div>
		<div class="textleft">Address:</div>
		<div class="textright"><input name="address" type="text" class="textfield" id="address" onKeyDown="CountLeft(this.form.address, this.form.ad,50);" onKeyUp="CountLeft(this.form.address,this.form.ad,50);" size="40">
		<input readonly type="text" name="ad" size=3 maxlength=3 value="50" disabled="disabled" class="textfield2">
		</div>
		<div class="textleft">Contact Number:</div>
		<div class="textright"><input name="cnumber" type="text" class="textfield" id="cnumber" onKeyDown="CountLeft(this.form.cnumber, this.form.cn,11);" onKeyUp="CountLeft(this.form.cnumber,this.form.cn,11);" size="40">
		<input readonly type="text" name="cn" size=3 maxlength=3 value="11" disabled="disabled" class="textfield2">
		<input name="propic" id="dadded" type="hidden" value="uploadedimage/defoult.jpg" /></div>
		<div class="textleft">Email:</div>
		<div class="textright"><input name="email" type="text" class="textfield" id="email" onKeyDown="CountLeft(this.form.email, this.form.em,50);" onKeyUp="CountLeft(this.form.email,this.form.em,50);" size="40">
		<input readonly type="text" name="em" size=3 maxlength=3 value="50" disabled="disabled" class="textfield2">
		</div>
		<div class="textleft1">I am:</div>
		<div class="textright1">
			<div class="input-container">
			  <select name="gender" id="gender" class="textfield1">
                <option >Select</option>
                <option >Female</option>
                <option >Male</option>
              </select><br />
			</div>
		
		</div>
		<div class="textleft1">Birth Day:</div>
		<div class="textright1">
		
		<div class="input-container">
    <?php
	  $con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("facebook", $con);
$name= mysql_query("select * from month");

echo '<select name="month" id="user" class="textfield1">';
 while($res= mysql_fetch_assoc($name))
{
echo '<option>';
echo $res['month'];
echo'</option>';
}
echo'</select>';

mysql_close($con)


?>
 &nbsp;<?php
	  $con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("facebook", $con);
$name= mysql_query("select * from day order by day_id asc");

echo '<select name="day" id="user" class="textfield1">';
 while($res= mysql_fetch_assoc($name))
{
echo '<option>';
echo $res['day'];
echo'</option>';
}
echo'</select>';

mysql_close($con)


?>
    <?php
	  $con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("facebook", $con);
$name= mysql_query("select * from year");

echo '<select name="year" id="user" class="textfield1">';
 while($res= mysql_fetch_assoc($name))
{
echo '<option>';
echo $res['year'];
echo'</option>';
}
echo'</select>';

mysql_close($con)


?>
	
    </div>
		
		
		</div>
		<div class="textleft">
</div>


	
		
		<div class="textright">


		
		
		<div class="textleft"></div>
		<div class="textright">
		  <br /><label>
		  <input type="submit" name="Submit" value="Sign Up" class="greenButton1" />
		  </label>
		</div>
	</form>	
	</div>
  </div>
</div>
</body>
</html>
