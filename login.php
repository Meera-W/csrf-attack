<?php 

session_start();

	include("connection.php");
	include("functions.php");
	check_remember_me($con);				

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$password = $_POST['password'];
		$email = $_POST['email'];
		$rememberMe = $_POST["remember_me"];
		
		// Remove white spaces at tails
		$password = trim($password);
		$email = trim($email);
		
			
		if(!empty($email) && !empty($password) && filter_var($email, FILTER_VALIDATE_EMAIL))
		{

			//read from database
			$query = "select * from users where email = '$email' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
					
						if($rememberMe==='1' || $rememberMe ==='on')
						{
							$hour = time() + 60;
							//$value=true;
							setcookie('emailOfUser', $email, $hour);
							setcookie('idOfUser', $user_data['user_id'], $hour);
							setcookie('password', $password, $hour);
							setcookie('rememberme',TRUE,$hour);
							
						}
						else{
							setcookie('withoutrememberme',TRUE,time()+ 60);	
						}

						header("Location: form.php");
						die;
					}
				}
			}
			
			echo '<script>alert("Wrong Email or password!")</script>';
		}else
		{
			echo '<script>alert("Wrong Email or password!")</script>';
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
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
			<div style="font-size: 20px;margin-bottom: 15px">Login</div>

			<input id="email" type="email" name="email" placeholder="Email"><br><br>
			<input id="password" type="password" name="password" placeholder="Password"><br><br>
			<input id="remember_me" type="checkbox" name="remember_me"> Remember Me <br><br>
			<input id="button" type="submit" value="Login"><br><br>

			<a href="signup.php">Don't have an account? Click to Signup</a><br><br>
		</form>
	</div>
</body>
</html>
