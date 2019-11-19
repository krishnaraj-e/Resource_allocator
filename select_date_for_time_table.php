<?php 
require_once 'config.php'; 
session_start();
$_SESSION['yearfortimetable']="";
 if(!isset($_SESSION['user'])|| empty($_SESSION['user']))
  {
     header("location: index.php");
     exit;
  }



        $year=$_GET['b'];
        if ($year == '1'){
         $_SESSION['yearfortimetable']="1";
                  }
        if ($year == '2'){
            $_SESSION['yearfortimetable']="2";
        }
        if ($year == '3'){
            $_SESSION['yearfortimetable']="3";
        }
        

        



 ?> 




<!DOCTYPE html>
<html>
<head>
	<title>Date Selection Time Table</title>
			<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">
	<link rel="stylesheet" type="text/css" href="css/datepicker.css" />
		<style type="text/css">
.disabled { cursor: not-allowed; }

</style>
</head>
<body>
<form action="time_table.php" method="POST">
  <div class="container">
	<center>
  <select name="doj">
  <option disabled="disabled" selected value="Select Day">Select Day</option>
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