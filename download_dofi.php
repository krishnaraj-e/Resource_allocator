<?php 
require_once 'config.php'; 
session_start();
$_SESSION['yearfortimetable']="";
 if(!isset($_SESSION['user'])|| empty($_SESSION['user']))
  {
     header("location: index.php");
     exit;
  }


  include("PHPExcel-1.8/Classes/PHPExcel/IOFactory.php");
  $phpExcel= new PHPExcel();
  $phpExcel->setActiveSheetIndex(0);

  $phpExcel->getActiveSheet()->SetCellValue("A1","slno");
$phpExcel->getActiveSheet()->SetCellValue("B1","Date");
$phpExcel->getActiveSheet()->SetCellValue("C1","Abnormalities");
$phpExcel->getActiveSheet()->getColumnDimension("C")->setAutoSize(true);
$phpExcel->getActiveSheet()->SetCellValue("D1","Area");
$phpExcel->getActiveSheet()->SetCellValue("E1","Identified By");
$phpExcel->getActiveSheet()->getColumnDimension("E")->setAutoSize(true);
$phpExcel->getActiveSheet()->SetCellValue("F1","Corrective Action");
$phpExcel->getActiveSheet()->getColumnDimension("F")->setAutoSize(true);
$phpExcel->getActiveSheet()->SetCellValue("G1","State");
$phpExcel->getActiveSheet()->SetCellValue("H1","Cell Leader");
$phpExcel->getActiveSheet()->getColumnDimension("H")->setAutoSize(true);
$phpExcel->getActiveSheet()->getStyle("A1:H1")->getFont()->setBold(true);


$sql="SELECT `by`, `date`, `issue`, `suggestion`, `state`, `resource`, `incharge` FROM `dofi`";
$result=mysqli_query($conn,$sql);

if ($result->num_rows > 0) {
    // output data of each row
    $i=2;
    $slno=1;
    while($row = $result->fetch_assoc()) {


    		  $phpExcel->getActiveSheet()->SetCellValue("A$i","$slno");
    		$date1=$row["date"];
$phpExcel->getActiveSheet()->SetCellValue("B$i","$date1");
               $issue=$row["issue"];
$phpExcel->getActiveSheet()->SetCellValue("C$i","$issue");
				$resource=$row["resource"];
$phpExcel->getActiveSheet()->SetCellValue("D$i","$resource");
				$by=$row["by"];
$phpExcel->getActiveSheet()->SetCellValue("E$i","$by");
				$suggetion=$row["suggestion"];
$phpExcel->getActiveSheet()->SetCellValue("F$i","$suggetion");
		$state=$row["state"];
$phpExcel->getActiveSheet()->SetCellValue("G$i","$state");
				$incharge=$row["incharge"];
$phpExcel->getActiveSheet()->SetCellValue("H$i","$incharge");

    	
   $i++;   
   $slno++;
    }
}



$objWriter = new PHPExcel_Writer_Excel2007($phpExcel);
$date=date("F d, Y h:i:s");
$name="DOFI-".str_replace(" ","-",$date);
$name=str_replace(",","-",$name);
$name=str_replace(":","-",$name);
$objWriter->save("$name.xlsx");


echo "<br><br><br><center><a href='$name.xlsx' download>Download</a></center>";

?>