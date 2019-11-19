<?php
session_start();
echo $_SESSION['user'];


// If session variable is not set it will redirect to login page
if(!isset($_SESSION['user']) || empty($_SESSION['user']))
{
  header("location: index.php");
  exit;
}

echo "<a href=logout.php>logout</a>";
?>


<!DOCTYPE html>
<html lang="en">
<head>
<style>





.button {
  border-radius: 4px;
  background-color: #f4511e;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}


</style>
</head>





<body>
	<center>
		<br><br><br><br><br><br><br><br><br><br>
			<button class="button"><span>MAIN BLOCK </span></button>&nbsp;&nbsp;&nbsp;
			<button class="button" onclick="window.location.href='it.php'"><span>IT <br>BLOCK </span></button>&nbsp;&nbsp;&nbsp;
			<button class="button"><span>IMPACT BLOCK </span></button>
			<br><br>	
			<button class="button"><span>LIBRARY BLOCK </span></button>&nbsp;&nbsp;&nbsp;
			<button class="button"><span>SUP BLOCK </span></button>&nbsp;&nbsp;&nbsp;
			<button class="button"><span>CANTEEN BLOCK </span></button>

</center>

</body>

</html>