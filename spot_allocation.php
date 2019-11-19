<?php 
require_once 'config.php'; 
session_start();
$_SESSION['yearfortimetable']="";
 if(!isset($_SESSION['user'])|| empty($_SESSION['user']))
  {
     header("location: index.php");
     exit;
  }


 ?> 




<!DOCTYPE html>
<html>
<head>
	<title>Spot Allocation</title>
			<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">
	<link rel="stylesheet" type="text/css" href="css/datepicker.css" />
</head>
<body>
<form action="time_for_spot_allocation.php" method="POST">	

</form>
</body>
</html>