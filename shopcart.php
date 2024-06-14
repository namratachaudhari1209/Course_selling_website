<?php
$err1="";
$err2="";
$err3="";
$err4="";
$err5="";
$err6="";
$fl=0;
if(isset($_POST['sbm']))
{
if(empty($_POST['cartno']))
{
$err1="cartno must exist";
$fl=1;
}
if(empty($_POST['srno']))
{
$err2="srno must exist";
$fl=1;
}
if(empty($_POST['buyeid']))
{
$err3="buyeid must exist";
$fl=1;
}
if(empty($_POST['proid']))
{
$err4="proid must exist";
$fl=1;
}

if(empty($_POST['price']))
{
$err5="price must exist";
$fl=1;
}
if(empty($_POST['conf']))
{
$err6="conformdate must exist";
$fl=1;
}
}
?>
<html>
<body>
<form name=frm method=post action=conformation.php>
<center>
<table>
<caption>Shopcart</caption>
<tr>
<td>CartNo</td>
<td><input type=text name=cno><?php echo $err1; ?></td>
</tr>
<tr>
<td>SrNo.</td>
<td><input type=text name=srno><?php echo $err2; ?></td>
</tr>
<tr>
<td>Buy_Id</td>
<td><input type=text name=bid><?php echo $err3; ?></td>
</tr>
<tr>
<td>Product_Id</td>
<td><input type=text name=pid><?php echo $err4; ?></td>
</tr>
<tr>
<td>Price</td>
<td><input type=text name=ps><?php echo $err5; ?></td>
</tr>
<tr>
<td>ConformDate</td>
<td><input type=text name=cdt><?php echo $err6; ?></td>
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
$sql="insert into shopcart values('$_POST[cno]','$_POST[srno]','$_POST[bid]','$_POST[pid]','$_POST[ps]','$_POST[cdt]')";
mysql_query($sql,$cn);
echo "record saved";
}
}
else
if($sb=="update")
{
$sql="update shopcart cartno='$_POST[cno]',srno='$_POST[sno]' buyerid='$_POST[bid]',prodid='$_POST[pid]',prise='$_POST[pr]',confirmdate='$_POST[cdt]";
mysql_query($sql,$cn);
echo "record updated";
}
else
if($sb=="delete")
{
$sql="delete from shopcart where userid='$_POST[ui]'";
mysql_query($sql,$cn);
echo "record deleted";
}
else
if($sb=="display")
{
$sql="select * from shopcart";
$result=mysql_query($sql,$cn);
echo "<center><table border=1>";
echo "<tr>";
echo "<th>cartno</th>";
echo "<th>srno</th>";
echo "<th>buyerid</th>";
echo "<th>prodid</th>";
echo "<th>price</th>";
echo "<th>confirmdate</th>";
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
echo "</tr>";
}
echo"</table></center>";
}
else
if($sb=="search")
{
$sql="select * from shopcart where userid='$_POST[ui]";
$result=mysql_query($sql,$cn);
echo "<center><table border=1>";
echo "<tr>";
echo "<th>cartno</th>";
echo "<th>srno</th>";
echo "<th>buyerid</th>";
echo "<th>prodid</th>";
echo "<th>price</th>";
echo "<th>confirmdate</th>";
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
echo "</tr>";
}
}
}
?>