<?php
require_once 'config.php';
session_start();
if(!isset($_SESSION['user']) || empty($_SESSION['user']))
{
  header("location: index.php");
  exit;
}

if(!isset($_POST['r']))
{



    echo "<b>Select Atleat One Resource..You Are Redirecting To The Previous Page</b>";
    header( "refresh:2;url=select_resource_for_load_chart.php" );
    $resource="";
}
else
{
     $resource=$_POST['r'];
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Load Chart</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
    



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




</style>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
<?php
//echo $d;
//echo "<br>".$_SESSION['yearfortimetable'];
$sql="SELECT `period`,`day`,`year`,`staff` FROM `allocation` WHERE `resource`='".$resource."'";

$result = $conn->query($sql);

if ($result->num_rows== 0 )
    {
    echo "<div class='w3-panel w3-red'>";
    echo "<h3>Message!</h3>";
    echo "<p>No Allocation Found For Selected Date</p>";
    echo "</div>";
    }
    else
    {
        echo "<br><br><center><h1><b>".$resource."-Load Chart ";
        echo"</b></h1></center><br><br><br>";

            echo "<center><table id='customers'><tr>";

            echo "<th>D/P</th>";

            echo "<th>08:00AM - 09:00AM</th>";

            echo "<th>09:00AM - 10:00AM</th>";

            echo "<th>10:10AM - 11:10AM</th>";

            echo "<th>11:10AM - 12:10PM</th>";

            echo "<th>12:40PM - 01:40PM</th>";

            echo "<th>01:40PM - 02:40PM</th>";

            echo "<th>02:50PM - 03:50PM</th>";
            

            echo "<th>03:50PM - 04:50PM</th></tr>";


            
        
       

$day=array("MONDAY","TUESDAY","WEDNESDAY","THURSDAY","FRIDAY");

echo "<tr>";
for ($k=0; $k <=4; $k++) { 
    
    echo "<td>".$day[$k]."</td>";


for ($i=1; $i <=8 ; $i++) { 


 
       $sql="SELECT `period`,`year`,`staff` FROM `allocation` WHERE `resource`='".$resource."' AND `day`='".$day[$k]."'";
        //echo $sql."<br>";
$result = $conn->query($sql);
            
            $resultset=array("p1"=>"N/A","p2"=>"N/A","p3"=>"N/A","p4"=>"N/A","p5"=>"N/A","p6"=>"N/A","p7"=>"N/A","p8"=>"N/A");

            while($row=mysqli_fetch_array($result,MYSQLI_NUM)) 

            {

$department_and_year="";
                //print_r($resultset);
                //echo"<br>";
if($row[0]=="p1")
{
    $department_and_year=$row[2]."-".$row[1];
    $resultset['p1']=$department_and_year;
}
else if($row[0]=="p2")
{$department_and_year=$row[2]."-".$row[1];
    $resultset['p2']=$department_and_year;
}
else if($row[0]=="p3")
{$department_and_year=$row[2]."-".$row[1];
    $resultset['p3']=$department_and_year;
}
else if($row[0]=="p4")
{$department_and_year=$row[2]."-".$row[1];
    $resultset['p4']=$department_and_year;
}
else if($row[0]=="p5")
{$department_and_year=$row[2]."-".$row[1];
    $resultset['p5']=$department_and_year;
}
else if($row[0]=="p6")
{$department_and_year=$row[2]."-".$row[1];
    $resultset['p6']=$department_and_year;
}
else if($row[0]=="p7")
{$department_and_year=$row[2]."-".$row[1];
    $resultset['p7']=$department_and_year;
}
else if($row[0]=="p8")
{$department_and_year=$row[2]."-".$row[1];
    $resultset['p8']=$department_and_year;
}

}



    $j="p".$i;
    if($resultset[$j]!="N/A")
    {
    echo "<td><center><font color='red'><b>$resultset[$j]</b></font></center></td>";
    }
    else
    {
        echo "<td><center>$resultset[$j]</center></td>";
    }
}

echo "</tr>";
}

echo "</center></table>";
}
?>

<br><br>

<button class="btn btn-info btn-lg" onclick="location.href='select_resource_for_load_chart.php'" type="button">
     <span class="glyphicon glyphicon-repeat"></span> Check Another</button>




<button onclick="myFunction()" class="btn btn-info btn-lg"><span class="glyphicon glyphicon-print"></span> Print this page</button>



<script>
function myFunction() {
    window.print();
}
</script>

</body>
</html>