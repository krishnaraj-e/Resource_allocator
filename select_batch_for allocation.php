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

.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   color: black;
   text-align: center;
}
</style>
</head>
<body>

<h1> SELECT THE BATCH</h1>


	<center>
		<br><br><br><br>
	<form method="GET" action="select_date.php">
			<button class="button" name="b" onclick="window.location.href='?b=1'" value="1"><span>A<</span></button>&nbsp;&nbsp;&nbsp;
			<button class="button" name="b" onclick="window.location.href='?b=2'" value="2"><span>B</span></button>&nbsp;&nbsp;&nbsp;

    </form>
</center>

<div class="footer">
</div>

</body>
</html>
