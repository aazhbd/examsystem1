<?php
require_once ('phplib/populator.php');
initdb();
session_start();

//extract($_GET);
$sid=$_SESSION[sid];
$Q="select st.name, st.reg, st.email, sc.score, sc.exam, sc.level from studentdetails st, scoredetails sc where st.reg=sc.reg and sc.reg='$sid'";
$R=mysql_query($Q) or die("can't execute query ".mysql_error());
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
<table width="780" border="0">
  <tr>
    <td><img src="imgs/banner.jpg" height="100" width="780" /></td>
  </tr>
  <tr>
    <td>
	<table width="780" border="0" cellpadding="0" cellspacing="0">
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
    <td align="left" bgcolor="#608ca9">
	<p>Your Result is:</p>
	<?php
	echo "<p>Click <a href='exam_page.php?sid=$sid'>here</a> to take an exam.</p>";
	echo "<table width=80% border=0 class='textformtable'>\n";
		echo "<tr>
			<td width=10%>Name</td>
			<td width=20%>Registration No.</td>
			<td width=15%>Email</td>
			<td width=15%>Score</td>
			<td width=15%>Exam</td>
			<td width=15%>Level</td>
			</tr>";
		
		while($line = mysql_fetch_array($R, MYSQL_ASSOC)){
			echo "\t<tr>\n";
			foreach($line as $col_value){
				echo "\t\t<td>$col_value</td>\n";
			}
			echo "\t</tr>\n";
		}
		echo "</table>\n";
	?>
	</td>
  </tr>
</table>
</center>
</body>
</html>
