<?php
// Database configuration

$dbHost     = "94.138.203.35";
$dbUsername = "universite";
$dbPassword = "Universite5858";
$dbName     = "universite"; 


// Create connection
try{
  $conn = new PDO("mysql:host=$dbHost;dbname=$dbName","$dbUsername","$dbPassword");
  $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  
}catch(PDOException $e){
  die('Veritabanina baglanilamadi ! !');
}
?> 