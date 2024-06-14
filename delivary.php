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
		<li class="first"><a href="index1.html" accesskey="1" title="">Homepage</a></li>
		<li><a href="product.php" accesskey="2" title="">Product</a></li>
		<li><a href="delivary.php" accesskey="4" title="">Delivery</a></li>
        <li><a href="login.php" accesskey="5" title="">Logout</a></li>
	</ul>
</div>

<?php
$err1="";
$err2="";
$err3="";
$err4="";
$err5="";
$fl=0;
if(isset($_POST['sbm']))
{
if(empty($_POST['dno']))
{
$err1="dno must exist";
$fl=1;
}
if(empty($_POST['ddate']))
{
$err2="ddate must exist";
$fl=1;
}
if(empty($_POST['cartno']))
{
$err3="cartno must exist";
$fl=1;
}
if(empty($_POST['tranname']))
{
$err5="trannomust exist";
$fl=1;
}
}
$cn=mysql_connect("localhost","root");
mysql_select_db("ecourse",$cn);
$sql="Select count(*) from delivary";
$result=mysql_query($sql,$cn);
$row=mysql_fetch_array($result);
if($row[0]>0)
{
$sql="Select max(dno) from delivary";
$result=mysql_query($sql,$cn);
$row=mysql_fetch_array($result);
$dn=$row[0]+1;
}
else
$dn=1;
?>
<form name=frm method=post action=delivary.php>
<br />
<br />
<br />

<center>
<table>
<caption>          Delivary </caption>
<tr>
<td>DelivaryNo</td>
<td><input type=text name=dno value=<?php echo $dn; ?>><?php echo $err1; ?></td>
</tr>
<tr>
<td>Delivary Date</td>
<td><input type=date name=ddate value=<?php echo date('Y-m-d'); ?> ><?php echo $err2; ?></td>
</tr>
<tr>
<td>CartNo</td>
<td><input type=text name=cartno><?php echo $err3; ?></td>
</tr>
<tr>
<td>Transport Name</td>
<td><input type=text name=tranname><?php echo $err5; ?></td>
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
$sql="insert into delivary values('$_POST[dno]','$_POST[ddate]','$_POST[cartno]','$_POST[tranname]')";
mysql_query($sql,$cn);
echo "record saved";
}
}
else
if($sb=="update")
{
$sql="update delivary set ddate='$_POST[ddate]',cartno'$_POST[cartno]',tranname='$_POST[tranname]' where dno='$_POST[dno]'";
mysql_query($sql,$cn);
echo "record updated";
}
else
if($sb=="delete")
{
$sql="delete from delivary  where dno='$_POST[dno]'";
mysql_query($sql,$cn);
echo "record deleted";
}
else
if($sb=="display")
{
$sql="select * from delivary";
$result=mysql_query($sql,$cn);
echo "<center><table border=1>";
echo "<tr>";
echo "<th>dno</th>";
echo "<th>ddate</th>";
echo "<th>cartno</th>";
echo "<th>tranname</th>";
echo "</tr>";
while($row=mysql_fetch_array($result))
{
echo "<tr>";
echo "<td>$row[0]</td>";
echo "<td>$row[1]</td>";
echo "<td>$row[2]</td>";
echo "<td>$row[3]</td>";
echo "</tr>";
}
echo "</table></center>";
}

else
if($sb=="search")
{
echo "<center><table border=1>";
echo "<tr>";
echo "<th>dno</th>";
echo "<th>ddate</th>";
echo "<th>cartno</th>";
echo "<th>tranname</th>";
echo "</tr>";
$sql="select * from delivary where dno='$_POST[dno]'";
$result=mysql_query($sql,$cn);
while($row=mysql_fetch_array($result))
{
echo "<tr>";
echo "<td>$row[0]</td>";
echo "<td>$row[1]</td>";
echo "<td>$row[2]</td>";
echo "<td>$row[3]</td>";
echo "</tr>";
}
}
}
?>