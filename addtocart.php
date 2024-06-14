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
<form name=frm method=post action=addtocart.php>
<center><table>
<caption>add to cart</caption>
<Tr>
<td>Quantity</td>
<td><input type=text name=qt value=1></td>
</tr>
</table>
<input type=submit name=sbm value=back_to_select>
<input type=submit name=sbm value=add>
<input type=submit name=sbm value=confirm>
</center>
</form>
</html>
<?php
$cn=mysql_connect("localhost","root");
mysql_select_db("ecourse",$cn);
session_start();
if(isset($_POST['sbm']))
{
if($_POST['sbm']=="add")
{
$byid=$_SESSION['ui'];
$id=$_SESSION['cno'];
$prid=$_SESSION['prid'];
$price=$_SESSION['pr1'];
$sql1="select count(*) from shopcart where cartno=$id";
$result=mysql_query($sql1,$cn);
$row1=mysql_fetch_array($result);
$srno=$row1[0]+1;
$amt=$_POST['qt']*$_SESSION['pr1'];
$namt=$amt;
$_SESSION['netamt']=$_SESSION['netamt']+$amt;
$dt=date("Y-m-d");
$amt=$price*$_POST['qt'];
$sql="insert into shopcart values('$id','$srno','$ui','$prid','$price','$dt','$_POST[qt]','$amt')";
mysql_query($sql);
header("location:http://localhost/ecourse/surgicalimage.php");
}
else
if($_POST['sbm']=="back_to_select")
header("location:http://localhost/ecourse/surgicalimage.php");
else
header("location:http://localhost/ecourse/conformation.php");
}
?>