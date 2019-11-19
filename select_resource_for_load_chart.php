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
	<title>SELECT RESOURCE-Load Chart</title>

	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){

		$('#CheckboxContainer :checkbox').change(function () {

			var checkedCheckBoxes = $(this).parent().find(':checkbox:checked');
			if (checkedCheckBoxes.length > 1)
			{
				this.checked = false;
				$("#error").html("Only 1 can be checked. Please uncheck some if you want to check others... :)");


			}
			else if (checkedCheckBoxes.length ==0)
			{

				$("#error").html("<h1>Select Atleast One Resource....!</h1>");


			}
			else {

				$("#error").empty();



			}
		});

	});
	</script>
<style type="text/css">
.disabled { cursor: not-allowed; }

</style>

</head>
<body>

<center>
<form action="load_chart.php" method="POST">
	<div id="CheckboxContainer">
<h2><u>Select A Class/Lab To View The Load Chart</u></h2>

		<?php

							echo"&nbsp;&nbsp;<input type='checkbox' name='r' value='WT-LAB'>WT-LAB &nbsp;&nbsp;&nbsp;";
							echo"<input type='checkbox' name='r' value='CR3'>CR3 &nbsp;&nbsp;&nbsp;";
							echo"<input type='checkbox' name='r' value='CR2'>CR2 <br><br>";
							echo"&nbsp;&nbsp;&nbsp;<input type='checkbox' name='r' value='VCS'>VCS &nbsp;&nbsp;&nbsp;";
							echo"<input type='checkbox' name='r' value='CR4'>CR4 &nbsp;&nbsp;&nbsp;";
							echo"<input type='checkbox' name='r' value='MM-LAB'>MM-LAB <br><br>";
							echo"<input type='checkbox' name='r' value='PL-LAB'>PL-LAB &nbsp;&nbsp;&nbsp;";
							echo"<input type='checkbox' name='r' value='CR5'>CR5 &nbsp;&nbsp;&nbsp;";
							echo"<input type='checkbox' name='r' value='CR6'>CR6 <br><br>";
							echo"<input type='checkbox' name='r' value='LINUX-LAB'>LINUX-LAB &nbsp;&nbsp;&nbsp;";
							echo"<input type='checkbox' name='r' value='NETWORKING-LAB'>NETWORKING-LAB &nbsp;&nbsp;&nbsp;";
							echo"<input type='checkbox' name='r' value='DB-LAB'>DB-LAB <br><br>";






       ?>
						</div>
							<div id="error">

							</div>


							<div id="submit">
								<input type="submit" value="SUBMIT">
							</div>

						</form>

</center>



</body>
</html>
