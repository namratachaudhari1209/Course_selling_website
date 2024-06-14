<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Name       : Black / White   
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20111121

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Blackwhite by FCT</title>
<link href='http://fonts.googleapis.com/css?family=Nova+Mono' rel='stylesheet' type='text/css'>
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<div id="wrapper">
	<div id="header-wrapper">
		<div id="header">
			<div id="logo">
				<h1><a href="#">Furniture Mart</a></h1>
				<p></p>
			</div>
		</div>
	</div>
	<!-- end #header -->
	<div id="menu">
		<ul>
			<li class="current_page_item"><a href="index1.html">Home</a></li>
			<li><a href="contactus.html">contact</a></li>
			<li><a href="aboutus.html">about</a></li>
			<li><a href="login.php">logout</a></li>
<li><a href="feedback.php">feedback</a></li>
            
		</ul>
	</div>
	<!-- end #menu -->
<?php
$err1="";
$err2="";
$err3="";
$fl=0;
if(isset($_POST['sbm']))
{
if(empty($_POST['ui']))
{
$err1="userid must exist";
$fl=1;
}
if(empty($_POST['rm']))
{
$err2="remark must exist";
$fl=1;
}
if(empty($_POST['dt']))
{
$err3="date must exist";
$fl=1;
}
}
?>
<form name=frm method=post action=feedback.php>
<center>
<table>
<caption>Feedback Information</caption>
<tr>
<td>User_Id</td>
<td><input type=text name=ui><?php echo $err1; ?></td>
</tr>
<tr>
<td>Remark</td>
<td><input type=text name=rm><?php echo $err2; ?></td>
</tr>
<tr>
<td>Date</td>
<td><input type=text name=dt><?php echo $err3; ?></td>
</tr>
</table>
<input type=submit name=sbm value=submit>
<input type=submit name=sbm value=update>
<input type=submit name=sbm value=delete>
<input type=submit name=sbm value=display>
<input type=submit name=sbm value=search>
</center>
</form>
</body>
</html>
<?php
$cn=mysql_connect("localhost","root");
mysql_select_db("ecourse",$cn);
if(isset($_POST['sbm']))
{
$sb=$_POST['sbm'];
if($sb=="submit")
{
if($fl==0)
{
$sql="insert into feedback values('$_POST[ui]','$_POST[rm]','$_POST[dt]')";
mysql_query($sql,$cn);
echo "record saved";
}
}
else
if($sb=="update")
{
$sql="update feedback  remark='$_POST[rm]',feedbackdate='$_POST[dt]' where userid='$_POST[ui]'";
mysql_query($sql,$cn);
echo "record updated";
}
else
if($sb=="delete")
{
$sql="delete from feedback  where userid='$_POST[ui]'";
mysql_query($sql,$cn);
echo "record deleted";
}
else
if($sb=="display")
{
$sql="select * from feedback";
$result=mysql_query($sql,$cn);
echo "<center><table border=1>";
echo "<tr>";
echo "<th>userid</th>";
echo "<th>remark</th>";
echo "<th>feed date</th>";
echo "</tr>";
while($row=mysql_fetch_array($result))
{
echo "<tr>";
echo "<td>$row[0]</td>";
echo "<td>$row[1]</td>";
echo "<td>$row[2]</td>";
echo "</tr>";
}
echo "</table></center>";
}
else
if($sb=="search")
{
$sql="select * from feedback where userid='$_POST[ui]";
$result=mysql_query($sql,$cn);
echo "<center><table border=1>";
echo "<tr>";
echo "<th>userid</th>";
echo "<th>remark</th>";
echo "<th>feed date</th>";
echo "</tr>";
while($row=mysql_fetch_array($result))
{
echo "<tr>";
echo "<td>$row[0]</td>";
echo "<td>$row[1]</td>";
echo "<td>$row[2]</td>";
echo "</tr>";
}
echo "</table></center>";
}
}
?>