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

<p> SELECT THE DEPARTMENT</p>


	<center>
		<br><br><br><br><br>
	<form method="GET" action="select_batch_for_deallocation.php">
			<button class="button" name="b" onclick="window.location.href='?b=1'" value="1"><span>CP<BR> 09</span></button>&nbsp;&nbsp;&nbsp;
			<button class="button" name="b" onclick="window.location.href='?b=2'" value="2"><span>CP<BR>08</span></button>&nbsp;&nbsp;&nbsp;
            <button class="button" name="b" onclick="window.location.href='?b=2'" value="2"><span>CP<BR>01</span></button>&nbsp;&nbsp;&nbsp;
            <button class="button" name="b" onclick="window.location.href='?b=2'" value="2"><span>CP<BR>04</span></button>&nbsp;&nbsp;&nbsp;
            <button class="button" name="b" onclick="window.location.href='?b=2'" value="2"><span>CP<BR>15</span></button>&nbsp;&nbsp;&nbsp;
    </form>
</center>

<div class="footer">
  <p>&copy;Created By PEGASUS|QC 2018</p>
</div>

</body>
</html>