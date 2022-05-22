<?php
ob_start(); //turning on the output buffering.
session_start();
date_default_timezone_set("Asia/Kolkata");
try{
    //connection with the Database
    //PDO - PHP Data Object
    $con = new PDO("mysql:dbname=starkflix;host=localhost", "root", "");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}
    catch(PDOException $e)
    {    
    exit("Connection Failed:" . $e->getMessage());
    }
?>