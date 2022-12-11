<?php

function check_remember_me($con)
{

	if(isset($_COOKIE['idOfUser']) && isset($_COOKIE['emailOfUser']) && isset($_COOKIE['password'])&& isset($_COOKIE['rememberme']))
	{
		$email = $_COOKIE['emailOfUser'];
		$query = "select * from users where email = '$email' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{
			header("Location: index.php");
			die;
		}
	}
}

function check_login($con)
{

//	if(isset($_SESSION['user_id']))
	if(isset($_COOKIE['idOfUser']) && isset($_COOKIE['emailOfUser']) && isset($_COOKIE['password'])||isset($_COOKIE['rememberme'])||isset($_COOKIE['withoutrememberme']))
	{

		$id = $_SESSION['user_id'];
		$query = "select * from users where user_id = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}

	//redirect to login
	header("Location: login.php");
	die;

}


function random_num($length)
{

	$text = "";
	if($length < 5)
	{
		$length = 5;
	}

	$len = rand(4,$length);

	for ($i=0; $i < $len; $i++) {
		# code...

		$text .= rand(0,9);
	}

	return $text;
}


function printTable($con)
{
	if (!$con) {
	die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "select id,user_name,email from users";
	$result = mysqli_query($con, $sql);

	if (mysqli_num_rows($result) > 0) {
	// output data of each row
		while($row = mysqli_fetch_assoc($result)) {
			echo"<tr>"."
				<td>".$row["id"]."</td>
				<td>".$row["user_name"]."</td>
				<td>".$row["email"]."</td> 
			</tr>";
		}
	} else {
	echo "0 results";
	}
	die;
}

function getPrice($con, $source, $destination){

if (!$con) {
	die("Connection failed: " . mysqli_connect_error());
	}

	//$email = $_COOKIE['emailOfUser'];

	$sql = "select * from train where source = '$source' and destination = '$destination'";
	$result = mysqli_query($con, $sql);

	if (mysqli_num_rows($result) > 0) {
	$price_of_one = mysqli_fetch_assoc($result);
	return $price_of_one;
	}

	else{
	header("Location: login.php");
	die;
}


}



function printTickets($con)
{
	if (!$con) {
	die("Connection failed: " . mysqli_connect_error());
	}

	$email = $_COOKIE['emailOfUser'];

	$sql = "select * from ticket where email = '$email' ";
	$result = mysqli_query($con, $sql);

	if (mysqli_num_rows($result) > 0) {
	// output data of each row
		while($row = mysqli_fetch_assoc($result)) {

			echo"<tr>"."
				<td>".$row["res_id"]."</td>
				<td>".$row["source"]."</td> 
				<td>".$row["destination"]."</td> 
				<td>".$row["no_of_tickets"]."</td>
		               <td>".$row["email"]."</td>
		               <td>".$row["price_of_one"]."</td>
		               <td>".$row["total_price"]."</td>
			</tr>";
		}
	} else {
	echo "0 results";
	}
	die;
}

?>
