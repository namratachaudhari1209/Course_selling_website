<?php
session_start();
$_SESSION['prid']=$_GET['prid1'];
$_SESSION['pr1']=$_GET['pr1'];

header("location:http://localhost/ecourse/addtocart.php");
?>
