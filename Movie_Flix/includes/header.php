<?php
  require_once("includes/config.php");
  require_once("includes/classes/PreviewProvider.php");
  require_once("includes/classes/Entity.php");
  require_once("includes/classes/CategoryContainers.php");
  require_once("includes/classes/EntityProvider.php");
  require_once("includes/classes/ErrorMessage.php");
  require_once("includes/classes/SeasonProvider.php");
  require_once("includes/classes/Season.php");
  require_once("includes/classes/Video.php");
  require_once("includes/classes/VideoProvider.php");

  if(!isset($_SESSION["userLoggedIn"]))
  {
    header("Location: register.php");
  }

  $userLoggedIn = $_SESSION["userLoggedIn"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Movie_Flix</title>
    <link rel="stylesheet" type="text/css" href="./assets/style/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>    
    <script src="https://kit.fontawesome.com/747293a35c.js" crossorigin="anonymous"></script>
    <script src="./assets/js/scripts.js" crossorigin="anonymous"></script>
  
  </head>
    <body>
   <div class="wrapper">