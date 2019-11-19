<?php 
require_once 'config.php'; 
session_start();
$_SESSION['prdfordeletion']="";
 if(!isset($_SESSION['user'])|| empty($_SESSION['user']))
  {
     header("location: index.php");
     exit;
  }


        echo "<link rel='stylesheet' href='https://www.w3schools.com/w3css/4/w3.css'>";
$d=strip_tags( utf8_decode($_POST['doj']));
$sql="SELECT `resource`,`period` FROM `allocation` WHERE `staff`='".$_SESSION['user']."' AND `year`=".$_SESSION['yearfordeletion']." AND `day`='".$d."'";
$result = $conn->query($sql);
$perio=array(0,0,0,0,0,0,0,0);
if($result->num_rows==0)
{
	echo "<div class='w3-container'>
    <div class='w3-panel w3-red' style='height:100px'>
   <h2>No Allocation Found On These Session... Try Again.!</h2>
</div>
</div>";
}
else
{
while($row = $result->fetch_assoc()) 
{
		if($row['period'])
         {
         	if($row['period']=='p1')
         	{
         		$perio[0]=1;
         	}
         	else if($row['period']=='p2')
         	{
         		$perio[1]=1;
         	}
         	else if($row['period']=='p3')
         	{
         		$perio[2]=1;
         	}
         	else if($row['period']=='p4')
         	{
         		$perio[3]=1;
         	}
         	else if($row['period']=='p5')
         	{
         		$perio[4]=1;
         	}
         	else if($row['period']=='p6')
         	{
         		$perio[5]=1;
         	}
         	else if($row['period']=='p7')
         	{
         		$perio[6]=1;
         	}
         	else if($row['period']=='p8')
         	{
         		$perio[7]=1;
         	}
         	echo "<center><form action='confirmation.php' method='POST'>";
		echo "<div>";
		echo "<input type='checkbox' name='".$row['period']."'>".$row['period'] ." -- ". $row['resource'];
		echo "</div>";
	     }
	
	echo "<br></center>";
}
}
$_SESSION['prdfordeletion']=$perio;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Deallocate Resource</title>
	<style type="text/css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">




#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}


.button3 {
    background-color: white; 
    color: black; 
    border: 2px solid #f44336;
    padding: 14px 30px;
}

.button3:hover {
    background-color: #f44336;
    color: white;
}	

</style>

</head>
<body>
	<center>

	<input type="text" name="doj" value=" <?php echo $d ?> " hidden>
	<?php
	if($result->num_rows>0)
	{
	echo "<button type='submit' class='button button3'>Deallocate</button>";
}

?>
</center>	
</form>
</body>
</html>