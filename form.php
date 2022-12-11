
<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
	
	//creating a random value and setting it in a CSRF Token.
	$random_token = rand();
        setcookie("csrfToken", $random_token, time() + 3600, '/'); 
	
        if($_SERVER['REQUEST_METHOD'] == "POST")
	{
	//something was posted - (note to self : name, not id here)
		$source = $_POST['source'];
		$destination = $_POST['destination'];
		$no_of_tickets = $_POST['no_of_tickets'];
		$email = $_POST['email'];
	
		
		// Remove white spaces at tails
		$source = trim($source);
		$destination = trim($destination);
		$no_of_tickets = trim($no_of_tickets);
		$email = trim($email);
		
		
		
		
		}
	
		
?> 
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Form</title>
   </head>
   <body>
      <center>
         <h1>Train Reservation</h1>
         <form method="POST" action="index.php">

  
  <p> Source : 
  <select name="source">  
  <option value="Mumbai">Mumbai</option>
  <option value="Amritsar">Amritsar</option>  
  <option value="Pune">Pune</option>  
  <option value="Chennai">Chennai</option>  
  <option value="Delhi">Delhi</option>
</select>      

</p>     
          
<p> Destination :
<select name="destination">  
  <option value="Mumbai">Mumbai</option>
  <option value="Amritsar">Amritsar</option>  
  <option value="Pune">Pune</option>  
  <option value="Chennai">Chennai</option>  
  <option value="Delhi">Delhi</option> 
</select>  
</p>
 
             
<p>
               <label for="No of Tickets">No of Tickets :</label>
               <input type="text" name="no_of_tickets" id="noOfTickets">
            </p>
 
             
 <p>
               <label for="emailAddress">Email Address :</label>
               <input type="text" name="email" id="emailAddress">
            </p> 
            
          <!-- On submission of form, input field token is also set to the same value of csrf token. This field is kept hidden but for presentation purposes, we've kept it visible. --> 
           <input name ="token" value="<?php echo $random_token;?>"/> 
            <input type="submit" value="Submit">
    
         </form>
      </center>
   </body>
</html>
