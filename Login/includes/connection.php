<?php
$server = "localhost";
$username = "root";
$password = "Redone2024";
$database = "hms";
$connection = mysqli_connect("$server","$username","$password");
$select_db = mysqli_select_db($connection, $database);
if(!$select_db)
{
	echo("connection terminated");
}
?>