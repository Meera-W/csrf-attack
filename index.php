<?php 
session_start();

	include("connection.php");
	include("functions.php");
	//include("form.php");
	

	$user_data = check_login($con);
	

if ($_POST["token"] != $_COOKIE["csrfToken"]){
echo "Sorry, we protect against Cross-Site Request Forgeries. Try somewhere else!";
return; }

else{


		$source = $_POST['source'];
		$destination = $_POST['destination'];
		$no_of_tickets = $_POST['no_of_tickets'];
		$email = $_POST['email'];
	
		
		// Remove white spaces at tails
		$source = trim($source);
		$destination = trim($destination);
		$no_of_tickets = trim($no_of_tickets);
		$email = trim($email);
		
		
		if(!empty($source))
		{
                       //save to database
			
		        $query = "select * from users where email = '$email'";
		        $result = mysqli_query($con, $query);
		     
          		$total_price = $no_of_tickets * 500;
          		
		       //subtract ticket price from balance
		       $query = "UPDATE users SET balance=balance-$total_price where email='$email'";
		       mysqli_query($con, $query);
					
		        
		         
			if($result)
			{
				        $res_id = random_num(20);
					$query = "insert into ticket(res_id, source, destination, no_of_tickets, email, price_of_one, total_price) values ('$res_id','$source','$destination','$no_of_tickets','$email',500,'$total_price')";
					mysqli_query($con, $query);
					$email = $_COOKIE['emailOfUser'];
	//deduction of maintenance charge
	$query = "UPDATE users SET balance=balance-200 where email = '$email'";
	mysqli_query($con, $query);
			
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
	<title>My Website</title>
</head>
<body>
<style type="text/css">
		#container{
			margin: 20px 50px;
			padding: 20px 50px;
		}
		#people {
		  font-family: Arial, Helvetica, sans-serif;
		  border-collapse: collapse;
		  width: 75%;
		}

		#people td, #people th {
		  border: 1px solid #ddd;
		  padding: 8px;
		}

		#people tr:nth-child(even){background-color: #f0efed;}

		#people tr:hover {background-color: #ada0be;}

		#people th {
		  padding-top: 12px;
		  padding-bottom: 12px;
		  text-align: left;
		  background-color: #803593;
		  color: white;
		}
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
	<div id="container">
	<button><a href="logout.php">Logout</a></button>
	<button><a href="balance.php">Check Balance</a></button> 
	
	<h2>Welcome <?php echo $user_data['user_name']; ?>! Transaction successful.</h2>
	<h5>Rs 200 will be cut, by default as maintenance charge!<h5>
	<h6> Current Balance - <?php echo $user_data['balance']; ?>. To find out deductions after buying tickets + maintenance charges of site, click on the Check Balance button above. </h6>
	<p>
	Here's a list of your ticket details.</p><br>

	<table id="people">
	<tr>
		<th>ID</th>
		<th>Source</th> 
		<th>Destination</th>
		<th>Number of Tickets</th>
		<th>Email</th>
		<th>Price of One Ticket</th> 
		<th>Total Price</th> 
	</tr>
	<?php
		printTickets($con);
	?>
	</table>
	<div>
	
</body>
</html>
