<?php 
session_start();

	include("connection.php");
	include("functions.php");
	

	$user_data = check_login($con);
	
?>

<!DOCTYPE html>
<html>
<head>
<title>Balance</title>
</head>
<body>
<style type="text/css">
	a{
		text-decoration: none;
		font-size: 12px;
		font-size: 15px;
		color: white;
		}
		button{
		padding: 10px;
		background-color: #a773b8;
		border: none;
		color: white;
		}
	</style>
<p>
Current Balance (after ticket charge and maintenance fees of Rs 200) : <?php echo $user_data['balance'] ?>

</p>
<button><a href="logout.php">Logout</a></button>
</body>
</html>
