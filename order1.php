<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Name       : Optimism
Description: A two-column, fixed-width design for 1024x768 screen resolutions.
Version    : 1.0
Released   : 20080311

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Optimism by Free CSS Templates</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<div id="header-wrapper">
	<div id="header">
		<div id="menu">
			<ul>
				<li class="current_page_item"><a href="order1.php">Home</a></li>
				<li><a href="contactus.html">Contact</a></li>
				<li><a href="aboutus.html">About</a></li>
				<li><a href="login.php">Logout</a></li>
			</ul>
		</div>
		<!-- end #menu -->
		<div id="search">
			<form method="get" action="">
				<fieldset>
				<input type="text" name="s" id="search-text" size="15" />
				<input type="submit" id="search-submit" value="Search" />
				</fieldset>
			</form>
		</div>
		<!-- end #search -->
	</div>
	<!-- end #header -->
</div>
<!-- end #header-wrapper -->

<?php
session_start();
$cn=mysql_connect("localhost","root");
mysql_select_db("ecourse",$cn);
$sql="select count(*) from shopcart";
$result=mysql_query($sql,$cn);
$row=mysql_fetch_array($result);
if($row[0]>0)
{
$sql="select max(cartno) from shopcart";
$result=mysql_query($sql,$cn);
$row=mysql_fetch_array($result);
$cno=$row[0]+1;
echo $cno;
$_SESSION['cno']=$cno;
} 
else
{
$cno=1;
$_SESSION['cno']=$cno;
}
echo $_SESSION['cno'];
header("location:http://localhost/ecourse/surgicalimage.php");
?>
</body>
</html>