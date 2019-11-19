<!DOCTYPE HTML>

<?php
require_once 'config.php';
session_start();

if($_POST["doj"]=="Select Day")  
{     

    header( "refresh:2;url=it.php" );
echo "<br><br><center><h2 style='color:red'>Select A Day....!</h2><h2 style='color:red'>You Are Redirecting To The Previous Page...!</h2></center>";
}


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
	<title>Period</title>
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
	<form action="select_resource.php" method="POST" onsubmit="return validatePeriod();">
		<div id="CheckboxContainer">
	<BR><BR><BR><BR>
	
	<br>

	<?php
    if($_POST["doj"]!="Select Day")  
{ 
    echo "<U>SELECT YOUR PERIOD</U><br>";
	$d=strip_tags( utf8_decode($_SESSION['date']));
	  $query = "SELECT `period` FROM `allocation` where day='".$d."' AND year=".$_SESSION['year']." AND staff='".$_SESSION['user']."'";
	  $result = $conn->query($query);
	  
	 if ($result->num_rows== 0 )
		{

	echo "<input type='checkbox' name='p1' value='p1'>06:00AM - 07:00AM &nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type='checkbox' name='p2' value='p2'>07:00AM - 08:00AM &nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type='checkbox' name='p3' value='p3'>08:00AM - 09:00AM &nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type='checkbox' name='p4' value='p4'>09:00AM - 10:00PM &nbsp;&nbsp;&nbsp;&nbsp; <br><br><br>";
	echo "<input type='checkbox' name='p5' value='p5'>10:10PM - 11:10PM &nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type='checkbox' name='p6' value='p6'>11:10PM - 12:10PM &nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type='checkbox' name='p7' value='p7'>12:40PM - 01:40PM &nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type='checkbox' name='p8' value='p8'>1:40PM - 02:40PM &nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type='checkbox' name='p9' value='p9'>2:50PM - 03:50PM &nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type='checkbox' name='p10' value='p10'>3:50PM - 04:50PM &nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type='checkbox' name='p11' value='p11'>4:50PM - 05:50PM &nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type='checkbox' name='p12' value='p12'>5:50PM - 06:50PM &nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type='checkbox' name='p13' value='p13'>6:50PM - 07:50PM &nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type='checkbox' name='p14' value='p14'>7:50PM - 08:50PM &nbsp;&nbsp;&nbsp;&nbsp; <br><br><br>";
         }
         else
         {
         	$prds = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
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
				else if($row['period']=='p9')
				{
					$prds[8]=1;
				}
				else if($row['period']=='p10')
				{
					$prds[9]=1;
				}
				else if($row['period']=='p11')
				{
					$prds[10]=1;
				}
				else if($row['period']=='p12')
				{
					$prds[11]=1;
				}
				else if($row['period']=='p13')
				{
					$prds[12]=1;
				}
				else if($row['period']=='p14')
				{
					$prds[13]=1;
				}
            }
            	if($prds[0]==1)
            	{
    	echo "<input type='checkbox' name='p1' value='p1' class='disabled' title='Allocated' disabled/><font color='red'>06:00AM - 07:00AM &nbsp;&nbsp;&nbsp;&nbsp;</font>";	
            	}
            	else
            	{
         echo "<input type='checkbox' name='p1' value='p1'>06:00AM - 07:00AM &nbsp;&nbsp;&nbsp;&nbsp;";	   
            	}

            	if($prds[1]==1)
            	{
    	echo "<input type='checkbox' name='p2' value='p2' class='disabled' title='Allocated' disabled/><font color='red'>07:00AM - 08:00AM &nbsp;&nbsp;&nbsp;&nbsp;</font>";	
            	}
            	else
            	{
         echo "<input type='checkbox' name='p2' value='p2'>07:00AM - 08:00AM &nbsp;&nbsp;&nbsp;&nbsp;";   
            	}

            	if($prds[2]==1)
            	{
    	echo "<input type='checkbox' name='p3' value='p3' class='disabled' title='Allocated' disabled/><font color='red'>08:00AM - 09:00AM &nbsp;&nbsp;&nbsp;&nbsp;</font>";	
            	}
            	else
            	{
         echo "<input type='checkbox' name='p3' value='p3'>08:00AM - 09:00AM &nbsp;&nbsp;&nbsp;&nbsp;";	   
            	}

            	if($prds[3]==1)
            	{
    	echo "<input type='checkbox' name='p4' value='p4' class='disabled' title='Allocated' disabled/><font color='red'>09:00AM - 10:00PM &nbsp;&nbsp;&nbsp;&nbsp; </font><br><br><br>";	
            	}
            	else
            	{
		 echo "<input type='checkbox' name='p4' value='p4' >09:00AM - 10:00PM &nbsp;&nbsp;&nbsp;&nbsp; <br><br><br>";	
		        }

            	if($prds[4]==1)
            	{
    		echo "<input type='checkbox' name='p5' value='p5' class='disabled' title='Allocated' disabled/><font color='red'>10:10PM - 11:10PM &nbsp;&nbsp;&nbsp;&nbsp;</font>";	
            	}
            	else
            	{
         	echo "<input type='checkbox' name='p5' value='p5'>10:10PM - 11:10PM &nbsp;&nbsp;&nbsp;&nbsp;";	   
            	}

            	if($prds[5]==1)
            	{
    		echo "<input type='checkbox' name='p6' value='p6' class='disabled' title='Allocated' disabled/><font color='red'>11:10PM - 12:10PM &nbsp;&nbsp;&nbsp;&nbsp;</font>";
            	}
            	else
            	{
         	echo "<input type='checkbox' name='p6' value='p6'>11:10PM - 12:10PM &nbsp;&nbsp;&nbsp;&nbsp;</font>";   
            	}

            	if($prds[6]==1)
            	{
    	echo "<input type='checkbox' name='p7' value='p7' class='disabled' title='Allocated' disabled/><font color='red'>12:40PM - 01:40PM &nbsp;&nbsp;&nbsp;&nbsp;</font>";	
            	}
            	else
            	{
         echo "<input type='checkbox' name='p7' value='p7'>12:40PM - 01:40PM &nbsp;&nbsp;&nbsp;&nbsp;";   
            	}

            	if($prds[7]==1)
            	{
    	echo "<input type='checkbox' name='p8' value='p8' class='disabled' title='Allocated' disabled/><font color='red'>01:40PM - 02:40PM &nbsp;&nbsp;&nbsp;&nbsp; </font><br><br><br>";	
            	}
            	else
            	{
         echo "<input type='checkbox' name='p8' value='p8'>01:40PM - 02:40PM &nbsp;&nbsp;&nbsp;&nbsp;";	   
				}
				if($prds[8]==1)
            	{
    	echo "<input type='checkbox' name='p9' value='p9' class='disabled' title='Allocated' disabled/><font color='red'>02:50PM - 03:50PM &nbsp;&nbsp;&nbsp;&nbsp; </font><br><br><br>";	
            	}
            	else
            	{
         echo "<input type='checkbox' name='p9' value='p9'>02:50PM - 03:50PM &nbsp;&nbsp;&nbsp;&nbsp;";	   
				}if($prds[9]==1)
            	{
    	echo "<input type='checkbox' name='p10' value='p10' class='disabled' title='Allocated' disabled/><font color='red'>03:50PM - 04:50PM &nbsp;&nbsp;&nbsp;&nbsp; </font><br><br><br>";	
            	}
            	else
            	{
         echo "<input type='checkbox' name='p10' value='p10'>03:50PM - 04:50PM &nbsp;&nbsp;&nbsp;&nbsp;";	   
				}if($prds[10]==1)
            	{
    	echo "<input type='checkbox' name='p11' value='p11' class='disabled' title='Allocated' disabled/><font color='red'>04:50PM - 05:50PM &nbsp;&nbsp;&nbsp;&nbsp; </font><br><br><br>";	
            	}
            	else
            	{
         echo "<input type='checkbox' name='p11' value='p11'>04:50PM - 05:50PM &nbsp;&nbsp;&nbsp;&nbsp;";	   
				}if($prds[11]==1)
            	{
    	echo "<input type='checkbox' name='p12' value='p12' class='disabled' title='Allocated' disabled/><font color='red'>05:50PM - 06:50PM &nbsp;&nbsp;&nbsp;&nbsp; </font><br><br><br>";	
            	}
            	else
            	{
         echo "<input type='checkbox' name='p12' value='p12'>05:50PM - 06:50PM &nbsp;&nbsp;&nbsp;&nbsp;";	   
				}if($prds[12]==1)
            	{
    	echo "<input type='checkbox' name='p13' value='p13' class='disabled' title='Allocated' disabled/><font color='red'>06:50PM - 07:50PM &nbsp;&nbsp;&nbsp;&nbsp; </font><br><br><br>";	
            	}
            	else
            	{
         echo "<input type='checkbox' name='p13' value='p13'>06:50PM - 07:50PM &nbsp;&nbsp;&nbsp;&nbsp;";	   
				}
				if($prds[13]==1)
            	{
    	echo "<input type='checkbox' name='p13' value='p13' class='disabled' title='Allocated' disabled/><font color='red'>07:50PM - 08:50PM &nbsp;&nbsp;&nbsp;&nbsp; </font><br><br><br>";	
            	}
            	else
            	{
         echo "<input type='checkbox' name='p13' value='p13'>07:50PM - 08:50PM &nbsp;&nbsp;&nbsp;&nbsp;<br><br><br>";	   
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


