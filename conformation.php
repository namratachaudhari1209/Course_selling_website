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
<title>News Beat by Free CSS Templates</title>
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
		<li class="first"><a href="index2.html" accesskey="1" title="">Homepage</a></li>
		<li><a href="Order1.php" accesskey="2" title="">Order</a></li>
		<li><a href="contactus.html" accesskey="4" title="">contact</a></li>
		<li><a href="aboutus.html" accesskey="4" title="">about</a></li>
        <li><a href="login.php" accesskey="5" title="">Logout</a></li>
	</ul>
</div>
<hr />
<?php
$err1="";
$err2="";
$err3="";
$err4="";
$err5="";
$err6="";
$err7="";
$err8="";
$fl=0;
if(isset($_POST['sbm1']))
{
if(empty($_POST['dtyp']))
{
$err5="deltype must exist";
$fl=1;
}
if(empty($_POST['dnm']))
{
$err6="deliname must exist";
$fl=1;
}
if(empty($_POST['dadd']))
{
$err7="deliaddress must exist";
$fl=1;
}
if(empty($_POST['dcty']))
{
$err8="delicity must exist";
$fl=1;
}
}
session_start();
$id=$_SESSION['cno'];
$ui=$_SESSION['ui'];
$amt=$_SESSION['netamt'];
$dt=date('Y-m-d');
echo $id,$ui,$dt;
?>
<form name=frm method=post action=conformation.php>
<center>
<br />
<br />
<br />

<table>
<caption>     Conformation    </caption>
<tr>
<td>Conformation_Id</td>
<td><input type=text name=cid value=<?php echo $id; ?>><?php echo $err1; ?></td>
</tr>
<tr>
<td>Conform_date</td>
<td><input type=date name=cd value=<?php echo $dt; ?>><?php echo $err2; ?></td>
</tr>
<tr>
<td>Buy_Id</td>
<td><input type=text name=bid value=<?php echo $ui; ?>><?php echo $err3; ?></td>
</tr>
<?php
$cn=mysql_connect("localhost","root");
mysql_select_db("ecourse",$cn);
$sql="select sum(amt) from shopcart where cartno=$id";
$result=mysql_query($sql,$cn);
$row=mysql_fetch_array($result);
$amt=$row[0];
?>
<tr>
<td>Total Amount</td>
<td><input type=text name=tmt value=<?php echo $amt; ?>><?php echo $err4; ?></td>
</tr>
<tr>
<td>Delivary Type</td>
<td><input type=text name=dtyp><?php echo $err5; ?></td>
</tr>
<tr>
<td>Delivary Name</td>
<td><input type=text name=dnm><?php echo $err6; ?></td>
</tr>
<tr>
<td>Delivary Address</td>
<td><input type=text name=dadd><?php echo $err7; ?></td>
</tr>
<tr>
<td>Delivary City</td>
<td><input type=text name=dcty><?php echo $err8; ?></td>
</tr>
</table>
<input type=submit name=sbm1 value=submit>
<input type=submit name=sbm1 value=update>
<input type=submit name=sbm1 value=delete>
<input type=submit name=sbm1 value=display>
<input type=submit name=sbm1 value=search>
</center>
</form>
</body>
</html><?php
$cn=mysql_connect("localhost","root");
mysql_select_db("ecourse",$cn);
if(isset($_POST['sbm1']))
{
$sb=$_POST['sbm1'];
if($sb=="submit")
{
if($fl==0)
{
$sql="insert into conformation values($id,$dt,$ui,$amt,'$_POST[dtyp]','$_POST[dnm]','$_POST[dadd]','$_POST[dcty]')";
mysql_query($sql,$cn);
echo "record saved";
}
}
else
if($sb=="update")
{
$sql="insert into conformation values(update into conformation values('$_POST[cd]','$_POST[bid]','$_POST[tmt]','$_POST[dtyp]','$_POST[dnm]','$_POST[dadd]','$_POST[dcty]')";
mysql_query($sql,$cn);
echo "record updated";
}
else
if($sb=="delete")
{
$sql="delete from conformation where conid='$_POST[cid]'";
mysql_query($sql,$cn);
echo "record deleted";
}
else
if($sb=="display")
{
$sql="select * from conformation";
$result=mysql_query($sql,$cn);
echo "<center><table border=1>";
echo "<tr>";
echo "<th>conid</th>";
echo "<th>cdate</th>";
echo "<th>buyeid</th>";
echo "<th>totalamt</th>";
echo "<th>deltype</th>";
echo "<th>deliname</th>";
echo "<th>deliaddress</th>";
echo "<th>delicity</th>";
echo "</tr>";
while($row=mysql_fetch_array($result))
{
echo "<tr>";
echo "<td>$row[0]</td>";
echo "<td>$row[1]</td>";
echo "<td>$row[2]</td>";
echo "<td>$row[3]</td>";
echo "<td>$row[4]</td>";
echo "<td>$row[5]</td>";
echo "<td>$row[6]</td>";
echo "<td>$row[7]</td>";
echo "</tr>";
}
echo "</table></center>";
}
else
if($sb=="search")
{
$sql="select * from conformation where conid='$_POST[cid]";
$result=mysql_query($sql,$cn);
echo "<center><table border=1>";
echo "<tr>";
echo "<th>conid</th>";
echo "<th>cdate</th>";
echo "<th>buyeid</th>";
echo "<th>totalamt</th>";
echo "<th>deltype</th>";
echo "<th>deliname</th>";
echo "<th>deliaddress</th>";
echo "<th>delicity</th>";
echo "</tr>";
while($row=mysql_fetch_array($result))
{
echo "<tr>";
echo "<td>$row[0]</td>";
echo "<td>$row[1]</td>";
echo "<td>$row[2]</td>";
echo "<td>$row[3]</td>";
echo "<td>$row[4]</td>";
echo "<td>$row[5]</td>";
echo "<td>$row[6]</td>";
echo "<td>$row[7]</td>";
echo "</tr>";
}
}
}
?>