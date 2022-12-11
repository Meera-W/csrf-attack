<?php

session_start();

if(isset($_SESSION['user_id']))
{
	unset($_SESSION['user_id']);

}

if(isset($_SESSION['balance']))
{
	unset($_SESSION['balance']);

}

if (isset($_COOKIE['emailOfUser'])) {

    setcookie('emailOfUser',null, -3600); 
}

if (isset($_COOKIE['idOfUser'])) {
    
    setcookie('idOfUser', null, -3600); 
}

if (isset($_COOKIE['password'])) {
    
    setcookie('password', null, -3600); 
}
if (isset($_COOKIE['rememberme'])) {
    
  setcookie('rememberme',null, -3600); 
}

if (isset($_COOKIE['withoutrememberme'])) {
    
    setcookie('withoutrememberme',null, -3600); 
}

if (isset($_COOKIE['csrfToken'])) {
    setcookie('csrfToken',null, -3600); 
}
  
header("Location: login.php");
die;
?>
