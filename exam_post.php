<?php
require_once ('phplib/populator.php');
initdb();
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Your result :::::::: Zakir</title>
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
	  echo "<p>";
	  if( !$_SESSION['login'] ) die("Login is unsuccessful try logging in again");

	  $po=$_SESSION[point];
	  $lev=$_SESSION[level];
	  $ex=$_SESSION[exam];
	  
	  if($_POST[radio]==$_SESSION[rans]){
	  	echo "You have given the correct answer.";
		$Qu="UPDATE `scoredetails` SET `score` = '$po', `level`='$lev', `exam`='$ex' WHERE reg='{$_SESSION[id]}'";
		$Re=mysql_query($Qu) or die("Can't execute query".mysql_error());
		echo " Registration No. is :".$_SESSION[sid];
	  }
	  else{
		  echo "You have entered the wrong answer";
	  }
	  echo "</p>";
	  echo "<p>To take another exam click <a href='exam_page.php?sid={$_SESSION[sid]}'>here.</a></p>";
	  echo "<p>To view results click <a href='reuslt_page.php?sid={$_SESSION[sid]}'>here.</a></p>";
	?>
	</td>
  </tr>
</table>
</center>
</body>
</html>
