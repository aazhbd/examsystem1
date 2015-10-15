<?php
require_once ('phplib/populator.php');
initdb();
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Take an exam :::::::: Zakir</title>
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
	if( !$_SESSION['login'] ) die("Login is unsuccessful try logging in again");
	$sid=$_SESSION[sid];
	$Qu="select level, exam from scoredetails where reg='$sid'";
	$Re=mysql_query($Qu) or die("Can't execute query");
	while($l=mysql_fetch_array($Re, MYSQL_ASSOC)){
		$level=$l[level];
		$ex=$l[exam];
	}
	$Q="select questionno, question, answer, fawans1, fawans2, point, level from questiondetails where level='$level'";
	$R=mysql_query($Q) or die("Can't execute query");
	
	$qn=array();
	$qd=array();
	$ans=array();
	$fa1=array();
	$fa2=array();

	while($lin=mysql_fetch_array($R, MYSQL_ASSOC)){
		$qn[]=$lin[questionno];
		$qd[]=$lin[question];
		$ans[]=$lin[answer];
		$fa1[]=$lin[fawans1];
		$fa2[]=$lin[fawans2];
		$point=$lin[point];
		$lev=$lin[level];
	}
	$_SESSION[point]=$point;
	$_SESSION[level]=$lev;
	$_SESSION[exam]=($ex+1);
	$_SESSION[rans]=$ans[0];
	
	?><br />
	<form id="form1" name="form1" method="post" action="exam_post.php">
	  <table width="90%" border="0" cellspacing="0" cellpadding="0" class="textformtable">
        <tr>
          <td width="15%">Question:<?php echo $qn[0]; ?></td>
          <td width="85%"><?php echo $qd[0]; ?></td>
        </tr>
        <tr>
          <td>Answer:</td>
          <td>
		  <?php
		  echo "
		  <label>
            <input name='radio' type='radio' value='$ans[0]' />
			$ans[0]<br />
            <input name='radio' type='radio' value='$fa1[0]' />
            $fa1[0]<br />
            <input name='radio' type='radio' value='$fa2[0]' />
            $fa2[0]<br />
		  </label>
		  ";
		  ?>
		  </td>
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
      </table>
        </form>	</td>
  </tr>
</table>
</center>
</body>
</html>
