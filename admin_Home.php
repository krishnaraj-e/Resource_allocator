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
<title>Admin Dashboard</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<frameset rows="22%,*" frameborder="0" name="all">
  <frame src="admin_dashboard_head_nav.php" noresize="noresize" name="head" target="self">
    <frameset cols="10%,*" frameborder="0">
  	  <frame src="admin_side.php" noresize="noresize" name="sidenav">
      <frame src="admin_dashboard_body.php" name="body">
  </frameset>
  <frame src="admin_dashboard_body.php"name="body">

</frameset>
</html>
