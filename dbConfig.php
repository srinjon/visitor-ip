<?php
$dbHost="localhost";
$dbUsername="root";
$dbPassword="";
$dbName="wordpress";
$db=mysqli_connect($dbHost,$dbUsername,$dbPassword,$dbName);
if($db->connect_error){
    die("Connection failed ".$db->connect_error);
}
?>
