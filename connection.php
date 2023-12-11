<?php

$dbhost = "localhost:3307";
$dbuser = "sManager";
$dbpass = "admin";
$dbname = "btl_database";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
?>








