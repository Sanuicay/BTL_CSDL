<?php

$dbhost = "localhost:3307";
$dbuser = "root";
$dbpass = "";
$dbname = "btl_database";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
?>