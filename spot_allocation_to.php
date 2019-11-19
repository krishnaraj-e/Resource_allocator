<?php
require_once 'config.php';
session_start();
if(!isset($_SESSION['user']) || empty($_SESSION['user']))
{
  header("location: index.php");
  exit;
}
$_SESSION['spot_allocation_to']=0;


if(isset($_POST["to"]))
{

	if($_POST["to"]!=0)
	{
$to=$_POST["to"];
$_SESSION['spot_allocation_to']=$to;
//header("location: show_available_resource_for_spot_allocation.php");
header("location: print_selected_periods.php");
}
else
{

}
}
else
{
	if(!isset($_POST["to"]))
	{
		echo "Select An ending Time...!";
	}
	else if($_POST["to"])
	{
	echo "You Selected a wrong option...!";
	}

}
?>



<!DOCTYPE html>
<html>
<head>
	<title>Spot Allocation:to</title>
</head>
<body>
<form method="POST" action="spot_allocation_to.php">

<?php
$start=$_SESSION['spot_allocation_from']+1;
	echo "<select name='to'>";
	echo "<option disabled='disabled' selected='selected' value='0'>TO</option>";

$periods=array("09:00AM","10:00AM","11:10AM","12:10PM","01:40PM","02:40PM","03:50PM","04:50PM");
		for ($i=$start; $i <=8+1 ; $i++) 
		{ 
		$pos=$i-2;
         echo"<option value='$i'>$periods[$pos]</option>";

		}
  ?>
 </select>
<input type="submit" value="SUBMIT">
</form>
</body>
</html>