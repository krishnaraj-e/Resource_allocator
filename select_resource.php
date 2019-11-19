
<?php
require_once 'config.php';
session_start();
$_SESSION['resource']="";
$_SESSION['period']="";
if(!isset($_SESSION['user']) || empty($_SESSION['user']))
{
  header("location: index.php");
  exit;
}


						for($i=1; $i<9; $i++)
						{
							$period = "p" . strval($i);
							if(isset($_POST[$period]))
							{
								$_SESSION['period']=$_SESSION['period'] ."-". $_POST[$period];
							}
						}
					?>


<!DOCTYPE html>
<html>
<head>
	<title>SELECT RESOURCE</title>

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
<form action="insert.php" method="POST" onsubmit="return validatePeriod();">
	<div id="CheckboxContainer">


		<?php
        $p=0;
        
            		$d=strip_tags( utf8_decode($_SESSION['date']));
					for($i=1; $i<9; $i++)
						{
							$period = "p" . strval($i);
							if(isset($_POST[$period]))
							{
								//$_SESSION['period']=$_SESSION['period'] ."-". $_POST[$period];
					            $_SESSION['period']=implode('',explode('-', $_SESSION['period']));
					            //echo "SELECT `resource` FROM `allocation` where day='".$d."' AND period='p".$i."'<br>";
								//echo "<input type='text' class='span3' name=p".$i." value=".$i." readonly/><br>";
			                    $query = "SELECT * FROM `allocation` where day='".$d."' AND period='p".$i."'";

						$result = $conn->query($query);                                  
					if ($result->num_rows== 0 )
						{
                            if($p==0)
            {
							echo"<input type='checkbox' name='r' value='WT-LAB'>WT-LAB &nbsp;&nbsp;&nbsp;";
							echo"<input type='checkbox' name='r' value='CR3'>CR3 &nbsp;&nbsp;&nbsp;";
							echo"<input type='checkbox' name='r' value='CR2'>CR2 <br><br>";
							echo"<input type='checkbox' name='r' value='VCS'>VCS &nbsp;&nbsp;&nbsp;";
							echo"<input type='checkbox' name='r' value='CR4'>CR4 &nbsp;&nbsp;&nbsp;";
							echo"<input type='checkbox' name='r' value='MM-LAB'>MM-LAB <br><br>";
							echo"<input type='checkbox' name='r' value='PL-LAB'>PL-LAB &nbsp;&nbsp;&nbsp;";
							echo"<input type='checkbox' name='r' value='CR5'>CR5 &nbsp;&nbsp;&nbsp;";
							echo"<input type='checkbox' name='r' value='CR6'>CR6 <br><br>";
							echo"<input type='checkbox' name='r' value='LINUX-LAB'>LINUX-LAB &nbsp;&nbsp;&nbsp;";
							echo"<input type='checkbox' name='r' value='NETWORKING-LAB'>NETWORKING-LAB &nbsp;&nbsp;&nbsp;";
							echo"<input type='checkbox' name='r' value='DB-LAB'>DB-LAB <br><br>";
                        $p++;
                    }
                        }
                        else
                        {
                        	$resources = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
                        while($row = $result->fetch_assoc()) 
                        {
                        	if($row['resource']=='WT-LAB')
                        	{
                        		$resources[0]=1;
                        		
                        	}
                        	 else if($row['resource']=='CR3')
                        	{
                        		$resources[1]=1;
                        		//
                        	}
                        	else if($row['resource']=='CR2')
                        	{
                        		$resources[2]=1;
                        		//
                        	}
                        	else if($row['resource']=='VCS')
                        	{
                        		$resources[3]=1;
                        		//
                        	}
                        	else if($row['resource']=='CR4')
                        	{
                        		$resources[4]=1;
                        		//
                        	}
                        	
                        	else if($row['resource']=='MM-LAB')
                        	{
                        		$resources[5]=1;
                        		//
                        	}
                        	else if($row['resource']=='PL-LAB')
                        	{
                        		$resources[6]=1;
                        		//
                        	}
                        	else if($row['resource']=='CR5')
                        	{
                        		$resources[7]=1;
                        	}
                        	else if($row['resource']=='CR6')
                        	{
                        		$resources[8]=1;
                        		//
                        	}
                        	else if($row['resource']=='LINUX-LAB')
                        	{
                        		$resources[9]=1;
                        		//
                        	}
                        	else if($row['resource']=='NETWORKING-LAB')
                        	{
                        		$resources[10]=1;
                        		//
                        	}
                        	else if($row['resource']=='DB-LAB')
                        	{
                        		$resources[11]=1;
                        		//
                        	}

                         }
                            if($resources[0]==1)
                            {
                            	echo"<input type='checkbox' name='r' value='WT-LAB' class='disabled'title='Allocated' disabled/><font color='red'>WT-LAB &nbsp;&nbsp;&nbsp;</font>";
                            }
                            else
                            {
                            	echo"<input type='checkbox' name='r' value='WT-LAB' >WT-LAB &nbsp;&nbsp;&nbsp;";
                            }
                          
                            if($resources[1]==1)
                            {
                            echo"<input type='checkbox' name='r' value='CR3' title='Allocated' class='disabled' disabled/><font color='red'>CR3 &nbsp;&nbsp;&nbsp;</font>";	
                            }
                            else
                            {
                             echo"<input type='checkbox' name='r' value='CR3'>CR3 &nbsp;&nbsp;&nbsp;";
                            }
                          
                            if($resources[2]==1)
                            {
                            	echo"<input type='checkbox' name='r' value='CR2' title='Allocated' class='disabled' disabled/><font color='red'>CR2 </font><BR><BR>";
                            }
                            else
                            {
                            echo"<input type='checkbox' name='r' value='CR2' >CR2 <BR><BR>";
                            }
                          
                            if($resources[3]==1)
                            {
                            echo"<input type='checkbox' name='r' value='VCS' title='Allocated' class='disabled' disabled/><font color='red'>VCS &nbsp;&nbsp;&nbsp;</font>";
                            }
                            else
                            {
                            echo"<input type='checkbox' name='r' value='VCS'>VCS &nbsp;&nbsp;&nbsp;";
                        }
                          
                            if($resources[4]==1)
                            {
                            echo"<input type='checkbox' name='r' value='CR4' title='Allocated' class='disabled' disabled/><font color='red'>CR4 &nbsp;&nbsp;&nbsp;</font>";
                        	}
                            else
                            {
                            echo"<input type='checkbox' name='r' value='CR4'>CR4 &nbsp;&nbsp;&nbsp;";
                        	}
                          
                            if($resources[5]==1)
                            {
                            echo"<input type='checkbox' name='r' value='MM-LAB' title='Allocated' class='disabled' disabled/><font color='red'>MM-LAB </font><BR><BR>";
                        	}
                            else
                            {
                            echo"<input type='checkbox' name='r' value='MM-LAB'>MM-LAB <BR><BR>";
                        	}
                          
                            if($resources[6]==1)
                            {
                            	echo"<input type='checkbox' name='r' value='PL-LAB' title='Allocated' class='disabled' disabled/><font color='red'>PL-LAB &nbsp;&nbsp;&nbsp;</font>";
                        	}
                            else
                            {
                            echo"<input type='checkbox' name='r' value='PL-LAB' >PL-LAB &nbsp;&nbsp;&nbsp;";
                        	}
                          
                            if($resources[7]==1)
                            {
                            	echo"<input type='checkbox' name='r' value='CR5' title='Allocated' class='disabled' disabled/><font color='red'>CR5 &nbsp;&nbsp;&nbsp;</font>";
                        	}
                            else
                            {
                            echo"<input type='checkbox' name='r' value='CR5' >CR5 &nbsp;&nbsp;&nbsp;";
                        	}
                          
                            if($resources[8]==1)
                            {
                            echo"<input type='checkbox' name='r' value='CR6' title='Allocated' class='disabled' disabled/><font color='red'>CR6 </font><BR><BR>";
                        	}
                            else
                            {
                            echo"<input type='checkbox' name='r' value='CR6' >CR6 <BR><BR>";
                        	}
                          
                            if($resources[9]==1)
                            {
                            echo"<input type='checkbox' name='r' value='LINUX-LAB' title='Allocated' class='disabled' disabled/><font color='red'>LINUX-LAB &nbsp;&nbsp;&nbsp;</font>";
                        	}
                            else
                            {
                            echo"<input type='checkbox' name='r' value='LINUX-LAB' >LINUX-LAB &nbsp;&nbsp;&nbsp;";
                        	}
                          
                            if($resources[10]==1)
                            {
                            echo"<input type='checkbox' name='r' value='NETWORKING-LAB' title='Allocated' class='disabled' disabled/><font color='red'>NETWORKING-LAB &nbsp;&nbsp;&nbsp;</font>";
                        	}
                            else
                            {
                            echo"<input type='checkbox' name='r' value='NETWORKING-LAB' >NETWORKING-LAB &nbsp;&nbsp;&nbsp;";
                        	}
                        
                        	if($resources[11]==1)
                            {
                            echo"<input type='checkbox' name='r' value='DB-LAB' title='Allocated' class='disabled' disabled/><font color='red'>DB-LAB </font><BR><BR>";
                        	}
                            else
                            {
                            echo"<input type='checkbox' name='r' value='DB-LAB' >DB-LAB <BR><BR>";
                        	}

                        






                     }

                    }
                }

              
            
       ?>
						</div>
							<div id="error">
								
							</div>


							<div id="submit">
								<input type="submit" value="SUBMIT">
							</div>
						
						</form>

</center>

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
                alert('Please select at least 1 Resource...!');
                return false;
            }
        </script>

</body>
</html>