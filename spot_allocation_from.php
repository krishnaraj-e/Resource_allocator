<?php
require_once 'config.php';
session_start();
if(!isset($_SESSION['user']) || empty($_SESSION['user']))
{
  header("location: index.php");
  exit;
}
$_SESSION['spot_allocation_from']=0;

if(isset($_POST["from"]))
{
$from=$_POST["from"];
$_SESSION['spot_allocation_from']=$from;
  header("location: spot_allocation_to.php");
}
else
{
	echo "Select Any Starting Time";
}
?>



<!DOCTYPE html>
<html>
<head>
	<title>Spot Allocation:from</title>
</head>
<body>
<form method="POST" action="spot_allocation_from.php">
	
 <select name="from">
 	<option disabled="disabled" >FROM</option>
 	<option value="1">08:00AM</option>
 	<option value="2">09:00AM</option>
 	<option value="3">10:10AM</option>
 	<option value="4">11:10AM</option>
 	<option value="5">12:40PM</option>
 	<option value="6">01:40PM</option>
 	<option value="7">02:50PM</option>
 	<option value="8">03:50PM</option>
 </select>
<input type="submit" value="SUBMIT">
</form>
</body>
</html>