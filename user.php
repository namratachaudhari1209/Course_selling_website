<!DOCTYPE HTML">

<html>
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Blackwhite by FCT</title>
<link href='http://fonts.googleapis.com/css?family=Nova+Mono' rel='stylesheet' type='text/css'>
<link href="css/style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body style="">
<div id="wrapper">

	<!-- end #header -->

	<!-- end #menu -->
	
	
	
	<div class="loginform">
	
		<div id="header-wrapper">
		<div id="header">
			<div>
				<h1><a href="#">Furniture Mart</a></h1>
					<hr>
			</div>
		</div>
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
$fl=0;
if(isset($_POST['sbm']))
{
if(empty($_POST['uid']))
{
$err1="userid must exist";
$fl=1;
}
if(empty($_POST['nm']))
{
$err2="name must exist";
$fl=1;
}
if(empty($_POST['add']))
{
$err3="address must exist";
$fl=1;
}
if(empty($_POST['cty']))
{
$err4="city must exist";
$fl=1;
}
if(empty($_POST['eid']))
{
$err5="email_id must exist";
$fl=1;
}
if(empty($_POST['psw']))
{
$err6="password must exist";
$fl=1;
}
}
?>
<form name=frm method=post action=user.php>
<center>
<table>
<caption>User</caption>
<tr>
<td>User_Id</td>
<td><input type=text name=uid><?php echo $err1; ?></td>
</tr>
<tr>
<td>Name</td>
<td><input type=text name=nm><?php echo $err2; ?></td>
</tr>
<tr>
<td>Address</td>
<td><input type=text name=add><?php echo $err3; ?></td>
</tr>
<tr>
<td>City</td>
<td><input type=text name=cty><?php echo $err4; ?></td>
</tr>
<tr>
<td>Email_id</td>
<td><input type=text name=eid><?php echo $err5; ?></td>
</tr>
<tr>
<td>Password</td>
<td><input type=text name=psw><?php echo $err6; ?></td>
</tr>
</table>
<input type=submit name=sbm value=submit>
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
$sql="insert into user values('$_POST[uid]','$_POST[nm]','$_POST[add]','$_POST[cty]','$_POST[eid]','$_POST[psw]')";
mysql_query($sql,$cn);
echo "record saved";
header("location:http://localhost/ecourse/login.php");
}
}
else
if($sb=="update")
{
$sql="update user  userid='$_POST[uid]',name='$_POST[nm]',address='$_POST[add]',city='$_POST[cty]',emailid='$_POST[eid]',password='$_POST[psw]' where userid='$_POST[uid]'";
mysql_query($sql,$cn);
echo "record updated";
}
else
if($sb=="delete")
{
$sql="delete from user where userid='$_POST[uid]'";
mysql_query($sql,$cn);
echo "record deleted";
}
else
if($sb=="display")
{
$sql="select * from user";
$result=mysql_query($sql,$cn);
echo "<center><table border=1>";
echo "<tr>";
echo "<th>userid</th>";
echo "<th>name</th>";
echo "<th>address</th>";
echo "<th>city</th>";
echo "<th>email_id</th>";
echo "<th>password</th>";
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
echo "</table></center>";
}
else
if($sb=="search")
{
$sql="select * from user where userid='$_POST[uid]";
$result=mysql_query($sql,$cn);
echo "<center><table border=1>";
echo "<tr>";
echo "<th>userid</th>";
echo "<th>name</th>";
echo "<th>address</th>";
echo "<th>city</th>";
echo "<th>email_id</th>";
echo "<th>password</th>";
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
echo "</table></center>";
}
}
?>