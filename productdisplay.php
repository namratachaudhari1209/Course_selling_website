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
				<li class="current_page_item"><a href="index1.html">Home</a></li>
				<li><a href="product.php">Product</a></li>
				<li><a href="delivary.php">Delivery</a></li>
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

<form name=frm method=post action=productdisplay.php>
<center>
<input type=submit name=sbm value=display><br>
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
if($sb=="display")
{
$sql="select * from product";
$result=mysql_query($sql,$cn);
echo "<center><table border=1>";
echo "<caption>product report</caption>";
echo "<tr>";
echo "<th>prodid</th>";
echo "<th>proddesc</th>";
echo "<th>classification</th>";
echo "<th>price</th>";
echo "<th>mattype</th>";
echo "<th>size</th>";
echo "<th>ptype</th>";
echo "<th>description</th>";
echo "<th>image</th>";
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
}
?>
