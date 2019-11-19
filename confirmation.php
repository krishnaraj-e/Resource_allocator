<?php
require_once 'config.php'; 
session_start();
 if(!isset($_SESSION['user'])|| empty($_SESSION['user']))
  {
     header("location: index.php");
     exit;
  }
$d=trim(strip_tags(utf8_decode($_POST['doj']))," ");
$prd=$_SESSION['prdfordeletion'];
$confor=0;
                     for($i=0; $i<8; $i++)
						{
							if($prd[$i]==1)
							{
								 
								$j=$i+1;
								
							$period = "p" . strval($j);
							if(isset($_POST[$period]))
							{
								
								$sql="DELETE FROM `allocation` WHERE `year`=".$_SESSION['yearfordeletion']." AND `day`='".$d."' AND `period`='".$period."'";
								
								if($conn->query($sql) == TRUE)
								{
									$confor++;
								}
								else
								{
									echo "error";
							     }
							 }
							else
							{
							
							}
							}
							
						}
						if($confor>0)
						{
                        echo "<div class='alert success'>";
                            echo "<center><strong>Success!</strong> Deallocation Successfull</center>";
                        echo "</div>";

							
						}
					
?>
<!DOCTYPE html>
<html>
<head>
	<title>Succes</title>
	<style type="text/css">
		.alert {
    padding: 20px;
    background-color: #f44336;
    color: white;
    opacity: 1;
    transition: opacity 0.6s;
    margin-bottom: 15px;
    width:800px;
}

.alert.success {background-color: #4CAF50;}
	</style>
</head>
<body>

</body>
</html>