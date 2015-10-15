<?php
require_once ('phplib/populator.php');
initdb();
session_start();
if( isset($_POST[email]) ){
	$Q="INSERT INTO `studentdetails` ( `name` , `reg` , `email` , `add` , `phone` , `pass` ) VALUES ('{$_POST[name]}', '{$_POST[reg]}', '{$_POST[email]}', '{$_POST[add]}', '{$_POST[phone]}', '{$_POST[pass]}')";
	$R=mysql_query($Q) or die("Can't execute That entry. ".mysql_error());
	$_SESSION['login']=true;
}
$sid=$_POST[reg];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Join Us :::::::: Zakir</title>
<link rel = "stylesheet" type = "text/css" href = "ExpreStyle.css" />
</head>

<body>
<center>
<table width="760" border="0">
  <tr>
    <td><img src="imgs/banner.jpg" height="100" width="760" /></td>
  </tr>
  <tr>
    <td>
	<table width="760" border="0">
      <tr>
        <td width="70" class="MOut" onmouseover="this.className='MOver'" onmouseout="this.className='MOut'"><a href="start.php">Home</a></td>
        <td width="70" class="MOut" onmouseover="this.className='MOver'" onmouseout="this.className='MOut'"><a href="login.php">Login</a></td>
        <td width="70" class="MOut" onmouseover="this.className='MOver'" onmouseout="this.className='MOut'"><a href="join.php">Join Us</a></td>
        <td width="70" class="MOut" onmouseover="this.className='MOver'" onmouseout="this.className='MOut'"><a href="logout.php">Log Out</a></td>
        <td width="70" class="MOut" onmouseover="this.className='MOver'" onmouseout="this.className='MOut'"><a href="about.php">About Us</a></td>
        <td width="70" class="MOut" onmouseover="this.className='MOver'" onmouseout="this.className='MOut'">&nbsp;</td>
      </tr>
    </table>
	</td>
  </tr>
  <tr>
    <td bgcolor="#608ca9">
	<?php
	echo "<p>If you are a member already click <a href='exam_page.php?sid=$sid'>here</a> to take an exam.</p>";
	if(isset($_POST[email])) die("Click on the link to take an exam");
	?>
	<p>Enter your details to become a member. You can't use more then one registration number for more then one accounts.</p>
	<form id="form1" name="form1" method="post" action="">
	  <table width="90%" border="0" cellspacing="0" cellpadding="0" class="textformtable">
        <tr>
          <td width="37%" align="right">Name:</td>
          <td width="63%"><input type="text" name="name" /></td>
        </tr>
        <tr>
          <td align="right">eamil:</td>
          <td><input type="text" name="email" /></td>
        </tr>
        <tr>
          <td align="right">address:</td>
          <td><input type="text" name="add" /></td>
        </tr>
        <tr>
          <td align="right">Phone:</td>
          <td><input type="text" name="phone" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="right">Choose a registration number: </td>
          <td><input type="text" name="reg" /></td>
        </tr>
        <tr>
          <td align="right">Choose a password: </td>
          <td><input type="password" name="pass" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="reset" name="Reset" value="Reset" />
            <input type="submit" name="Submit" value="Submit" /></td>
        </tr>
      </table><br />
	  <p>If you are already a member then click <a href="login.php">here</a> to login.</p>
        </form>
	</td>
  </tr>
</table>
</center>
</body>
</html>
