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
 	<title>Time For Spot Allocation</title>
 	<script>
	function validate() {
    var selectBox = document.getElementById("from");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
    //document.write(selectedValue);
   }
</script>
 </head>
 <body>
 	<form action="time_for_spot_allocation.php" method="POST" onclick="validate()">
 <select id="from" onClick="validate()">
 	<option disabled="disabled" >FROM</option>
 	<option value="1" onClick=validate()>06:00AM</option>
 	<option value="2">07:00AM</option>
 	<option value="3">8:00AM</option>
 	<option value="4">09:00AM</option>
	<option value="5">10:10PM</option>
 	<option value="6">11:10PM</option>
 	<option value="7">12:40PM</option>
 	<option value="8">1:40PM</option>
	<option value="9">2:50PM</option>
	<option value="10">3:50PM</option>
	<option value="11">4:50PM</option>
 </select>

  <select name="to">
 	<option disabled="disabled" selected="selected">TO</option>
 	<option value="1">07:00AM</option>
 	<option value="2">08:00AM</option>
 	<option value="3">09:00AM</option>
 	<option value="4">10:00PM</option>
 	<option value="5">11:10PM</option>
 	<option value="6">12:10PM</option>
 	<option value="7">1:40PM</option>
 	<option value="8">2:40PM</option>
	<option value="9">3:50PM</option>
	<option value="10">4:50PM</option>
	<option value="11">5:50PM</option>
 </select>
 <input type="submit" name="submit" value="SUBMIT">
</form>

 </body>
 </html>