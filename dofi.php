<?php 
require_once 'config.php'; 
session_start();
$_SESSION['yearfortimetable']="";
 if(!isset($_SESSION['user'])|| empty($_SESSION['user']))
  {
     header("location: index.php");
     exit;
  }


 ?> 
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
.dropdown-submenu {
    position: relative;
}

.dropdown-submenu .dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: -1px;
}


* {
  outline:none;
  border:none;
  margin:0px;
  padding:0px;
  font-family:Courier, monospace;
  color:black;
}
body {
color:black;      
}
#paper {
  color:#FFF;
  
}
#margin {
  margin-left:12px;
  margin-bottom:20px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  -o-user-select: none;
  user-select: none; 
}
select
{
  color:#222;
    -webkit-border-radius:12px;
  border-radius:12px;
  -webkit-box-shadow: 0px 2px 14px #000;
  box-shadow: 0px 2px 14px #000;
  border-top:1px solid #FFF;
  border-bottom:1px solid #FFF;
}
#text {
  width:500px;
  overflow:hidden;
  background-color:#FFF;
  color:#222;
  font-family:Courier, monospace;
  font-weight:normal;
  
  resize:none;
  line-height:40px;
  padding-left:100px;
  padding-right:100px;
  padding-top:45px;
  padding-bottom:34px;
  background-image:url(https://static.tumblr.com/maopbtg/E9Bmgtoht/lines.png), url(https://static.tumblr.com/maopbtg/nBUmgtogx/paper.png);
  background-repeat:repeat-y, repeat;
  -webkit-border-radius:12px;
  border-radius:12px;
  -webkit-box-shadow: 0px 2px 14px #000;
  box-shadow: 0px 2px 14px #000;
  border-top:1px solid #FFF;
  border-bottom:1px solid #FFF;
}
#title {
  background-color:transparent;
  border-bottom:3px solid #FFF;
  color:#FFF;
  
  font-family:Courier, monospace;
  height:28px;
  font-weight:bold;
  width:220px;
}
#button {
  cursor:pointer;
  margin-top:20px;
  position:relative;
  top:-99px;
  left:480px;
    height:40px;
  padding-left:24px;
  padding-right:24px;
  font-family:Arial, Helvetica, sans-serif;
  font-weight:bold;
    color:#FFF;
  text-shadow: 0px -1px 0px #000000;
  -webkit-border-radius:8px;
  border-radius:8px;
  border-top:1px solid #FFF;
  -webkit-box-shadow: 0px 2px 14px #000;
  box-shadow: 0px 2px 14px #000;
  background-color: #62add6;
  background-image:url(https://static.tumblr.com/maopbtg/ZHLmgtok7/button.png);
  background-repeat:repeat-x;
}
#button:active {
  zoom: 1;
  filter: alpha(opacity=80);
  opacity: 0.8;
}
#button:focus {
  zoom: 1;
  filter: alpha(opacity=80);
  opacity: 0.8;
}
#wrapper {
  width:700px;
  height:auto;
  margin-left:auto;
  margin-right:auto;
  margin-top:24px;
  margin-bottom:100px;
}

</style>


<script>
function validateForm() {
    var x = document.forms["dofi"]["area"].value;
    var problem = document.forms["dofi"]["problem"].value;
    var suggetion = document.forms["dofi"]["suggetion"].value;
    if (x == "SELECT THE AREA") {
        alert("Select An Area.....!");
        return false;
    }
        if (problem == "") {
        alert("Please Describe The Problem.....!");
        return false;
    }
        if (suggetion == "") {
        alert("Please Give Your Suggetion....!");
        return false;
    }
}
</script>



</head>
<body>


<div id="wrapper">

  <form id="paper" method="POST" action="dofi_action.php" name="dofi" onsubmit="return validateForm()">
<h3 style="color:black"><font color="Blue">D</font>aily  <font color="Blue">O</font>bservation <font color="Blue">F</font>or  <font color="Blue">I</font>mprovement</h3>
    <div id="margin"> From: <input style="color:black" id="title" type="text" name="title" disabled="disabled" value=<?php echo $_SESSION['user']; ?>></div>
        <select name="area" style="color:black;width:500px">
               <option disabled="disabled" selected="selected">SELECT THE AREA</option>
               <option>VCS</option>
               <option>WT-LAB</option>
               <option>CR2</option>
               <option>CR3</option>
               <option>CR4</option>
               <option>PL-LAB</option>
               <option>MM-LAB</option>
               <option>CR5</option>
               <option>NETWORKING-LAB</option>
               <option>DB-LAB</option>
               <option>CR6</option>
               <option>LINUX-LAB</option>
    </select><br><br>
    <textarea placeholder="Describe The Abnormality" id="text" name="problem" rows="4" style="overflow: hidden; word-wrap: break-word; resize: none; height: 160px; "></textarea>  <br>
    <textarea placeholder="Suggetions" id="text" name="suggetion" rows="4" style="overflow: hidden; word-wrap: break-word; resize: none; height: 160px; "></textarea>
    <br>
    <center>
      </div>
    <input id="button" type="submit" value="Report">
    </center>
  </form>



<script>

$(document).ready(function(){
  $('#title').focus();
    $('#text').autosize();
});

$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
</script>

</body>
</html>
