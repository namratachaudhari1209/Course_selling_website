<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Name       : News Beat
Description: A fixed-width design suitable for small sites and blogs.
Version    : 1.0
Released   : 20071215

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>login page</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<div id="header">
	<h1><a href="#">E Course selling</a></h1>
	<h2></h2>
</div>
<div id="menu">
	<ul>
	</ul>
</div>
<hr />
	<form name=frm method=post action=login.php>
<center><table>
<tr>
<td>User_Id</td>
<Td><input type=text name=ui></td>
</tr>
<tr>
<td>Password</td>
<td><input type=password name=ps></td>
</tr>
</table>
<input class="myclass"  type=submit name=sbm value=go><br>
<a href=user.php>new user?</a><br>
</center>
</form>
	
	
	
	</div>
	
	
	
	
	

</body>
</html>
<?php
$cn=mysql_connect("localhost","root");
mysql_select_db("ecourse",$cn);
if (isset($_POST['sbm']))
{
$sql="select count(*) from user where userid='$_POST[ui]' and password='$_POST[ps]'";
$result=mysql_query($sql,$cn);
$row=mysql_fetch_array($result);
if($row[0]>=1)
{
session_start();
$_SESSION['ui']=$_POST['ui'];
header("location:http://localhost/ecourse/order1.php");
$_SESSION['netamt']=0;
}
else
if($_POST['ui']=="admin" && $_POST['ps']=="admin")
{
header("location:http://localhost/ecourse/index1.html");
}
}
?>