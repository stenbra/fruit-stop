<?php 
/* db_connect.php
definerar variablar
*/
$host ="localhost";
$user ="dhg17";
$pass ="mysql2018";
$db = "fruit-stop";

try{
	$conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8",$user,$pass);
	// ställer PDO felmeddelanden
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	//print "Databaskontakten lyckades!";
	
}
catch(PDOException $e){
	print "Databaskontakten misslyckades: " .$e->getMessage();
}
?>
