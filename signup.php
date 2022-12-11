<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		
		// Remove white spaces at tails
		$user_name = trim($user_name);
		$password = trim($password);
		$email = trim($email);

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name)&& filter_var($email, FILTER_VALIDATE_EMAIL))
		{

			//save to database
			
			$query = "select * from users where email = '$email'";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0){
					echo '<script>alert("User with this email id already exists!")</script>';
				}
                        
				
			else{
					$user_id = random_num(20);
					//$balance = 10000;
					$query = "insert into users(user_id,user_name,password,email,balance) values ('$user_id','$user_name','$password','$email',10000)";
					mysqli_query($con, $query);
					header("Location: login.php");
					die;
				
			}
			}
	
		}else
		{
			echo '<script>alert("Please enter some valid information!")</script>';
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
	
</head>
<body>
<style type="text/css">
	
	#text,#email,#password{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 95%;
	}

	#button{

		padding: 10px;
		width: 100%;
		color: white;
		background-color: #8d569d;
		border: none;
		font-size: 20px;
	}

	#box{

		background-color: #f0efed;
		margin: auto;
		margin-top: 150px;
		width: 350px;
		padding: 20px;
		padding-bottom: 10px;
	}
	
	a{
		text-decoration: none;
		font-size: 12px;
		color: #803593;
	}
	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin-bottom: 15px">Sign Up</div>

			<input id="text" type="text" name="user_name" placeholder="User Name"><br><br>
			<input id="email" type="email" name="email" placeholder="Email"><br><br>
			<input id="password" type="password" name="password" placeholder="Password"><br><br>
			<input id="button" type="submit" value="Signup"><br><br>

			<a href="login.php"> Already have an account? Click to Login</a><br><br>
		</form>
	</div>
</body>
</html>
