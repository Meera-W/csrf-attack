<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "enter_your_password";
$dbname = "CSRF";


if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}

?>
