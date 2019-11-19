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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome-<?php echo $_SESSION['user']; ?></title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   color: black;
   text-align: center;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 200px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

#mySidenav a {
    position: absolute;
    left: -80px;
    transition: 0.3s;
    padding: 15px;
    width: 100px;
    text-decoration: none;
    font-size: 20px;
    color: white;
    border-radius: 0 5px 5px 0;
}

#mySidenav a:hover {
    left: 0;
}

#about {
    top: 20px;
    background-color: #4CAF50;
}


#blog {
    top: 80px;
    background-color: #2196F3;
}

#projects {
    top: 140px;
    background-color: #f44336;
}
#trash {
    top: 176px;
    left: -13px;
    color: #f44336;
}
#duplicate
{
    top: 270px;
    left: -29px;
    color: #c44dff;

}
#projects3 {
    top: 230px;
    background-color: #c44dff;
}


#contact {
    top: 230px;
    background-color: #555;
}
#contact3 {
    top: 382px;
    background-color: #336699;
}
#timetable {
    top: 410px;
    left: -45px;
    color: #336699;
}

#help {
    top: 320px;
    background-color: #555;
}
#help2 {
    top: 340px;
    left: -63px;
    color: #555;
}

#home {
    top: 35px;
    left: 20px;
    color: #4CAF50;
    size:200px;
}
#Allocate {
    top: 98px;
    left: 5px;
    color: #2196F3;
    size:200px;
}
#home {
    top: 35px;
    left: 20px;
    color: #4CAF50;
    size:200px;
}
#home {
    top: 35px;
    left: 20px;
    color: #4CAF50;
    size:200px;
}

</style>
</head>
<body>


<div class="card" style="position:relative;top:100px;left:-150px">
  <button>
    <a href="select_resource_for_load_chart.php" target="body" title="View Load Chart">
<img src="load.png" height="100px" width="100px"> </a>
<br><font color="black">View Load Chart</font>
</button>
 </div>

<div class="card" style="position:relative;top:150px;left:-150px">
  <button>
    <a href="select_dept_for_allocation.php" target="body" title="Allocate Resource">
<img src="add.png" height="100px" width="100px"> </a>
<br><font color="black">Allocate Resource</font></button>
 </div>

<div class="card" style="position:relative;top:-180px;left:150px">
  <button>
    <a href="select_year_for_time_table.php" target="body" title="Time Table">
<img src="table.png" height="100px" width="100px"> </a>
<br><font color="black">Time Table</font></button>
 </div>

<div class="card" style="position:relative;top:-130px;left:150px">
  <button>
    <a href="select_dept_for_deallocation.php" target="body" title="De-Allocate Resource">
<img src="delete.png" height="100px" width="100px"> </a>
<br><font color="black">De-Allocate Resource</font></button>
 </div>





<div class="footer">
  <p>&copy;Created By PEGASUS|QC 2018</p>
</div>
</body>
</html>
