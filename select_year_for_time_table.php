<?php
require_once 'config.php';
session_start();
if(!isset($_SESSION['user']) || empty($_SESSION['user']))
{
  header("location: index.php");
  exit;
}

?>
<!DOCTYPE html>
<html>
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

<p>SELECT THE YEAR</p>


	<center>
		<br><br><br><br><br><br><br><br><br><br>
	<form method="GET" action="time_table.php">
			<button class="button" name="b" onclick="window.location.href='?b=1'" value="1"><span>1ST<BR> YEAR </span></button>&nbsp;&nbsp;&nbsp;
			<button class="button" name="b" onclick="window.location.href='?b=2'" value="2"><span>2ND<BR> YEAR </span></button>&nbsp;&nbsp;&nbsp;
			<button class="button" name="b" onclick="window.location.href='?b=3'" value="3"><span>3RD<BR> YEAR </span></button>
    </form>
</center>



</body>
</html>