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
$err6="";
$err7="";
$err8="";
$err9="";
$err10="";
$err11="";
$fl=0;
if(isset($_POST['sbm']))
{
if(empty($_POST['pid']))
{
$err1="pid must exist";
$fl=1;
}
if(empty($_POST['pd']))
{
$err2="prodesc must exist";
$fl=1;
}
if(empty($_POST['cls']))
{
$err3="classification must exist";
$fl=1;
}
if(empty($_POST['pr']))
{
$err4="price must exist";
$fl=1;
}
if(empty($_POST['mtyp']))
{
$err5="mattype must exist";
$fl=1;
}
if(empty($_POST['sz']))
{
$err6="size must exist";
$fl=1;
}
if(empty($_POST['pt']))
{
$err7="ptyp must exist";
$fl=1;
}
if(empty($_POST['des']))
{
$err8="description must exist";
$fl=1;
}
if(empty($_POST['im']))
{
$err9="image must exist";
$fl=1;
}
}
?>
<form name=frm method=post action=product.php>
<br />
<br />
<br />
<center>
<table>
<caption>Product</caption>
<tr>
<td>Product_ID</td>
<td><input type=text name=pid><?php echo $err1; ?></td>
</tr>
<tr>
<td>ProductDesc</td>
<td><input type=text name=pd><?php echo $err2; ?></td>
</tr>
<tr>
<td>Classification</td>
<td><input type=text name=cls><?php echo $err3; ?></td>
</tr>
<tr>
<td>Price</td>
<td><input type=text name=pr><?php echo $err4; ?></td>
</tr>
<tr>
<td>Mattype</td>
<td><input type=text name=mtyp><?php echo $err5; ?></td>
</tr>
<tr>
<td>Size</td>
<td><input type=text name=sz><?php echo $err6; ?></td>
</tr>
<tr>
<td>ProductType</td>
<td><input type=text name=pt><?php echo $err7; ?></td>
</tr>
<tr>
<td>Description</td>
<td><input type=text name=des><?php echo $err8; ?></td>
</tr>
<tr>
<td>Image</td>
<td><input type=file name=im><?php echo $err9; ?></td>
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
$sql="insert into product values('$_POST[pid]','$_POST[pd]','$_POST[cls]','$_POST[pr]','$_POST[mtyp]','$_POST[sz]','$_POST[pt]','$_POST[des]','$_POST[im]')";
mysql_query($sql,$cn);
echo "record saved";
}
}
else
if($sb=="update")
{
$sql="update product set prodesc='$_POST[pd]',classification='$_POST[cls]',price='$_POST[pr]',mattype='$_POST[mtyp]',size='$_POST[sz]',ptype='$_POST[pt]',discription='$_POST[des]',image='$_POST[im]' where prodid='$_POST[pid]'";
mysql_query($sql,$cn);
echo "record updated";
}
else
if($sb=="delete")
{
$sql="delete from product where pid='$_POST[pid]'";
mysql_query($sql,$cn);
echo "record deleted";
}
else
if($sb=="display")
{
$sql="select * from product";
$result=mysql_query($sql,$cn);
echo "<center><table border=1>";
echo "<tr>";
echo "<th>pid</th>";
echo "<th>pd</th>";
echo "<th>cls</th>";
echo "<th>pr</th>";
echo "<th>mtyp</th>";
echo "<th>sz</th>";
echo "<th>pt</th>";
echo "<th>des</th>";
echo "<th>im</th>";
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
echo "<td>$row[8]</td>";
echo "</tr>";
}
echo "</table></center>";
}
else
if($sb=="search")
{
$sql="select * from product where pid='$_POST[pid]";
$result=mysql_query($sql,$cn);
echo "<center><table border=1>";
echo "<tr>";
echo "<th>pid</th>";
echo "<th>pd</th>";
echo "<th>cls</th>";
echo "<th>pr</th>";
echo "<th>mtyp</th>";
echo "<th>sz</th>";
echo "<th>pt</th>";
echo "<th>des</th>";
echo "<th>im</th>";
echo "</tr>";
while($row=mysql_fetch_array($result))
{
echo "<tr>";
echo "<td>$row[0]</td>";
echo "<td>$row[1]</td>";
echo "<td>$row[2]</td>";
echo "<td>$row[9]</td>";
echo "<td>$row[4]</td>";
echo "<td>$row[5]</td>";
echo "<td>$row[6]</td>";
echo "<td>$row[7]</td>";
echo "<td>$row[8]</td>";
echo "</tr>";
}
}
}
?>
