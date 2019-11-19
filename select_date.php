<?php 
require_once 'config.php'; 
session_start();
 if(!isset($_SESSION['user'])|| empty($_SESSION['user']))
  {
     header("location: index.php");
     exit;
  }



        $year=$_GET['b'];
        if ($year == '1'){
         $_SESSION['year']="1";
                  }
        if ($year == '2'){
            $_SESSION['year']="2";
        }
        if ($year == '3'){
            $_SESSION['year']="3";
        }
        




 ?> 




<!DOCTYPE html>
<html>
<head>
	<title>Date Selection</title>
			<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">
	<link rel="stylesheet" type="text/css" href="css/datepicker.css" />
		<style type="text/css">
.disabled { cursor: not-allowed; }

</style>
</head>
<body>
<form action="select_period.php" method="POST">
  <div class="container">
	<center>
  <select name="doj">
  <option  selected="selected" value="Select Day">Select Day</option>
  <option value="Monday">Monday</option>
  <option value="Tuesday">Tuesday</option>
  <option value="Wednesday">Wednesday</option>
  <option value="Thursday">Thursday</option>
  <option value="Friday">Friday</option>

</select><br>
  <input type="submit" name="submit" value="Submit">
</center>
</form>
</body>
</html>