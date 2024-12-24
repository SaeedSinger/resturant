
<?php

$dsn = 'mysql:host=localhost; dbname=food';
$username = 'root';
$password = '';
$option = array(
      PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES utf8',
      );

 try {
 	$conn = new PDO($dsn,$username,$password,$option);
 	$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//	echo"you are connected";
 	
 } catch (PDOException $e) {
 	echo "faild to connected" . $e->getMessage();

 	
 }
 
 /*
$hostname="localhost";
$user_name="root";
$password="";
$db="food";
$con=mysqli_connect($hostname,$user_name,$password,$db);

 */
?>