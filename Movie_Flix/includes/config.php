<?php
ob_start(); //Turnf on output buffer i.e connection
session_start();
date_default_timezone_set("Europe/London");

try{
    $con = new PDO("mysql:dbname=movies_flix;host=localhost","root","");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} 
catch( PDOException $e ){   
    exit("Connection failed: ".$e->getMessage());
}
?>