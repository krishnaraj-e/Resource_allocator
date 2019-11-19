<!DOCTYPE HTML>

<?php
require_once 'config.php';
session_start();
$_SESSION['date']=$_POST["doj"];
if(!isset($_SESSION['user']) || empty($_SESSION['user']))
{
  header("location: index.php");
  exit;
}




?>


<!DOCTYPE html>
<html>
<head>
	<title>auto selection period</title>
	<style type="text/css">
.disabled { cursor: not-allowed; }

</style>

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



</head>
<body>
<center>
	<form action="show_available_resoure_for_spot_allocation.php" method="POST" onsubmit="return validatePeriod();">
		<div id="CheckboxContainer">
	<BR><BR><BR><BR>
	
	<br>

	<?php


	$d=date("l");
    $_SESSION['spot_allocation_from'];
    $_SESSION['spot_allocation_to'];
    $total=$_SESSION['spot_allocation_to'] - $_SESSION['spot_allocation_from'];
    $periods=array("p1"=>0,"p2"=>0,"p3"=>0,"p4"=>0,"p5"=>0,"p6"=>0,"p7"=>0,"p8"=>0);  
    for ($i=$_SESSION['spot_allocation_from']; $i <=$total; $i++) 
    { 
        $tem="p".$i;
        $periods[$tem]=1;
    }

	  $query = "SELECT `period` FROM `allocation` where day='".$d."'";
	  $result = $conn->query($query);
	  
	 if ($result->num_rows== 0 )
		{

	echo "<input type='checkbox' name='p1' value='p1'>08:00AM - 09:00AM &nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type='checkbox' name='p2' value='p2'>09:00AM - 10:00AM &nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type='checkbox' name='p3' value='p3'>10:10AM - 11:10AM &nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type='checkbox' name='p4' value='p4'>11:10AM - 12:10PM &nbsp;&nbsp;&nbsp;&nbsp; <br><br><br>";
	echo "<input type='checkbox' name='p5' value='p5'>12:40PM - 01:40PM &nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type='checkbox' name='p6' value='p6'>01:40PM - 02:40PM &nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type='checkbox' name='p7' value='p7'>02:50PM - 03:50PM &nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type='checkbox' name='p8' value='p8'>03:50PM - 04:50PM &nbsp;&nbsp;&nbsp;&nbsp; <br><br><br>";
         }
         else
         {
         	$prds = array(0, 0, 0, 0, 0, 0, 0, 0);
         	while($row = $result->fetch_assoc()) 
            {
            	if($row['period']=='p1')
            	{
            		$prds[0]=1;
            	}
            	else if($row['period']=='p2')
            	{
            		$prds[1]=1;
            	}
            	else if($row['period']=='p3')
            	{
            		$prds[2]=1;
            	}
            	else if($row['period']=='p4')
            	{
            		$prds[3]=1;
            	}
            	else if($row['period']=='p5')
            	{
            		$prds[4]=1;
            	}
            	else if($row['period']=='p6')
            	{
            		$prds[5]=1;
            	}
            	else if($row['period']=='p7')
            	{
            		$prds[6]=1;
            	}
            	else if($row['period']=='p8')
            	{
            		$prds[7]=1;
            	}
            }
            	if($prds[0]==1)
            	{
    	echo "<input type='checkbox' name='p1' value='p1' class='disabled' title='Allocated' disabled/><font color='red'>08:00AM - 09:00AM &nbsp;&nbsp;&nbsp;&nbsp;</font>";	
            	}
            	else
            	{
         echo "<input type='checkbox' name='p1' value='p1'>08:00AM - 09:00AM &nbsp;&nbsp;&nbsp;&nbsp;";	   
            	}

            	if($prds[1]==1)
            	{
    	echo "<input type='checkbox' name='p2' value='p2' class='disabled' title='Allocated' disabled/><font color='red'>09:00AM - 10:00AM &nbsp;&nbsp;&nbsp;&nbsp;</font>";	
            	}
            	else
            	{
         echo "<input type='checkbox' name='p2' value='p2'>09:00AM - 10:00AM &nbsp;&nbsp;&nbsp;&nbsp;";   
            	}

            	if($prds[2]==1)
            	{
    	echo "<input type='checkbox' name='p3' value='p3' class='disabled' title='Allocated' disabled/><font color='red'>10:10AM - 11:10AM &nbsp;&nbsp;&nbsp;&nbsp;</font>";	
            	}
            	else
            	{
         echo "<input type='checkbox' name='p3' value='p3'>10:10AM - 11:10AM &nbsp;&nbsp;&nbsp;&nbsp;";	   
            	}

            	if($prds[3]==1)
            	{
    	echo "<input type='checkbox' name='p4' value='p4' class='disabled' title='Allocated' disabled/><font color='red'>11:10AM - 12:10PM &nbsp;&nbsp;&nbsp;&nbsp; </font><br><br><br>";	
            	}
            	else
            	{
         echo "<input type='checkbox' name='p4' value='p4' >11:10AM - 12:10PM &nbsp;&nbsp;&nbsp;&nbsp; <br><br><br>";	
     }

            	if($prds[4]==1)
            	{
    		echo "<input type='checkbox' name='p5' value='p5' class='disabled' title='Allocated' disabled/><font color='red'>12:40PM - 01:40PM &nbsp;&nbsp;&nbsp;&nbsp;</font>";	
            	}
            	else
            	{
         	echo "<input type='checkbox' name='p5' value='p5'>12:40PM - 01:40PM &nbsp;&nbsp;&nbsp;&nbsp;";	   
            	}

            	if($prds[5]==1)
            	{
    		echo "<input type='checkbox' name='p6' value='p6' class='disabled' title='Allocated' disabled/><font color='red'>01:40PM - 02:40PM &nbsp;&nbsp;&nbsp;&nbsp;</font>";
            	}
            	else
            	{
         	echo "<input type='checkbox' name='p6' value='p6'>01:40PM - 02:40PM &nbsp;&nbsp;&nbsp;&nbsp;</font>";   
            	}

            	if($prds[6]==1)
            	{
    	echo "<input type='checkbox' name='p7' value='p7' class='disabled' title='Allocated' disabled/><font color='red'>02:50PM - 03:50PM &nbsp;&nbsp;&nbsp;&nbsp;</font>";	
            	}
            	else
            	{
         echo "<input type='checkbox' name='p7' value='p7'>02:50PM - 03:50PM &nbsp;&nbsp;&nbsp;&nbsp;";   
            	}

            	if($prds[7]==1)
            	{
    	echo "<input type='checkbox' name='p8' value='p8' class='disabled' title='Allocated' disabled/><font color='red'>03:50PM - 04:50PM &nbsp;&nbsp;&nbsp;&nbsp; </font><br><br><br>";	
            	}
            	else
            	{
         echo "<input type='checkbox' name='p8' value='p8'>03:50PM - 04:50PM &nbsp;&nbsp;&nbsp;&nbsp; <br><br><br>";	   
            	}


            

 


        }
                 echo "<div id='error'>";
                                
                            echo "</div>";
            echo "<input type='submit' value='SUBMIT'>";
echo "</form>";
echo "</center>";
     }
         ?>
<script type="text/javascript">
			function validatePeriod()
			{
				var p = document.getElementsByTagName('input');
				for (var i = 0; i < p.length; i++)
				{
					if (p[i].type == 'checkbox')
					{
						if (p[i].checked) 
						{
							return true;
						}
					}
				}
				alert('Please select at least 1 Period...!');
				return false;
			}
		</script>

</body>
</html>


