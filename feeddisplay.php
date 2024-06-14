<html>
<body>
<form name=frm method=post action=feedback.php>
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
}
?>