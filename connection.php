<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "enter_your_password";
$dbname = "enter_your_db_name";


if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}

?>
