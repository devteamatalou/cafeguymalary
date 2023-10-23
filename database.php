<?php
 ob_start();
 ini_set('display_errors', '1');

 $host = "localhost";
 $db_name = "airport_cafe";
 $user = "root";
 $password = "";

 $dns = "mysql:host=$host;dbname=$db_name;chartset=utf8";

 try
 {
	 $db = new PDO ($dns, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
	 //  echo "Connection to database succeed";
 }
 catch (PDOException $e)
 {
	 echo $e->getMessage();
 }
?>