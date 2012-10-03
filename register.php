<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<title>GG Computers Australia</title>
  <link rel="STYLESHEET" type="text/css" href="style.css"/>
       <meta name="keywords" content="gg computers australia, repairs, computers, gg, pc, peter issa" />
	<meta name="description" content="Welcome to GG Computers Australia" />
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<meta name="Author" content="Peter Issa" /> 


</head>

<body>
  <div id="container">
	<div id="header">
		<h1>
			<img src="logo.png" alt="GGCA Logo."/> GG Computers Australia
		</h1>
	</div>
	<div id="navigation">
		<ul>
			<li><a href="home.php">Home</a></li>
			<li><a href="products.php">Products</a></li>
			<li><a hr```ef="aboutus.php">About Us</a></li>
			<li><a href="contactus.php">Contact Us</a></li>
			<li><a href="register.php">Register</a></li>
		</ul>

	</div>
	
<?php

	//define and initialise vars
	$fnameErr = $lnameErr = $ageErr = $emailErr = $passErr = $pass1Err = "";
	$fname = $lname = $age = $email = $pass = $pass1 = "";

	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		
		if(empty($_POST['fname']))
		{
			$fnameErr = "Please enter your first name.";
		}
		else{$fname = $_POST['fname'];} //If first name was entered
		
		
		if (empty($_POST['lname']))
		{
			$lnameErr = "Please enter your last name.";
		}
		else{$lname = $_POST['lname'];} //If lastname was entered
		
		
		
		if (empty($_POST['age']))
		{
			$ageErr = "Please enter your age.";
		}
		else if (filter_var(($age = $_POST['age']), FILTER_VALIDATE_INT, 
					array('options' => array('min_range' => 16, 
					'max_range' => 90))) === TRUE)

		{
			$ageErr = "You must be between 16 and 90 years of age.";
		}
		else
		{	
			$age = $_POST['age'];
		}

		if (empty($_POST['email']))
		{
			$emailErr = "Please enter your email address.";
		}
		else if (filter_var(($email = $_POST['email']), FILTER_VALIDATE_EMAIL)) 
		{
    			$email = $_POST['email'];
		}
		else 
		{
			$emailErr = "Please enter a valid email address: someone@example.com";
		}
		
		

		if (empty($_POST['pass']))
		{
			$passErr = "Please enter a password.";
		}
		else if (strlen($pass) > 5 // at least 6 chars
				&& (preg_match('[A-Z]',$pass) || preg_match('[a-z]',$pass))
				&& preg_match('[0-9]',$pass)) // at least one digit
			{ 			
				$pass = $_POST['pass']; //If password was entered
			}
		else 
		{
			$passErr = "Your password must be at least 6 characters long with at least 1 number and 1 letter.";
		}



		if (empty($_POST['pass1']))
		{
			$pass1Err = "Please re-type your password.";
		}
		else{$pass1 = $_POST['pass1'];} //If re-type password was entered
		
	
	}	
?>
		<div id="form">

		<form id="register" name="register" method="POST" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<br /><br />
			<b>To register, enter your details below, then click the submit button. 
				Required fields are denoted by an asterisk (*).</b>
			<br /><br />
 
			<p>
			<h2>First Name*:</h2> 
			<input type="text" name="fname" id="fname"
			value="<?php echo htmlspecialchars($fname);?>" />
			<span class="error"><?php echo $fnameErr;?></span>
			<br />  
			
			<h2>Last Name*:</h2> 
			<input type="text" name="lname" id="lname"
			value="<?php echo htmlspecialchars($lname);?>" />
			<span class="error"><?php echo $lnameErr;?></span>
			<br /><br />
			
			<p><i>To confirm you are old enough to use this site, please enter your age:</i></p>			
						
			<h2>Age*:</h2> 
			<input type="text" name="age" id="age"
			value="<?php echo htmlspecialchars($age);?>" />
			<span class="error"><?php echo $ageErr;?></span>
			<br /><br />

			<p><i>Please enter your postage details:</i></p>
			
			<h2>Address:</h2> 
			<input type="text" name="address" id="address" /> 
			
			<h2>City:</h2> 
			<input type="text" name="city" id="city" />

			<h2>State:</h2> 
			<select name="state" id="state"> 
					<option>ACT</option> 
					<option>NSW</option>
					<option>NT</option> 
					<option>QLD</option>
					<option>SA</option>
					<option>TAS</option>
					<option>VIC</option>
					<option>WA</option>
				</select>

			<h2>Postal Code:</h2> 
			<input type="text" name="postalcode" id="postalcode" />
			
			<h2>Country:</h2> 
			<select name="country" id="country">
					<option>Australia</option>
				</select>
			<br /><br />
			
			<h2>E-mail Address*:</h2> 
			<input type="text" name="email" id="email"
			value="<?php echo htmlspecialchars($email);?>" />
			<span class="error"><?php echo $emailErr;?></span>
			<br /><br /> 			

			<h2>Password*:</h2> 
			<input type="text" name="pass" id="pass"
			value="<?php echo htmlspecialchars($pass);?>" />
			<span class="error"><?php echo $passErr;?></span>
			<br />
			
			<h2>Re-type Password*:</h2> 
			<input type="text" name="pass1" id="pass1"
			value="<?php echo htmlspecialchars($pass1);?>" />
			<span class="error"><?php echo $pass1Err;?></span>
			<br /><br />
			
			<input type="submit" name="Submit" value="Submit" id="Submit" /> 

			<input type="reset" value="Clear" id="clear" />
			</p>
		
		</form>
		</div>  	
	
	
	<div id="footer0">
		<a href="sitemap.php">Site Map</a> | <a href="privacy.php">Privacy</a>  Copyright © Peter Issa 2012
	</div>
	
	<div id="footer1">
		<p>
    			<a href="http://validator.w3.org/check?uri=referer">
			<img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict" height="31" width="88" /></a>
			<a href="http://jigsaw.w3.org/css-validator/check/referer">
		   	<img style="border:0;width:88px;height:31px"
        		src="http://jigsaw.w3.org/css-validator/images/vcss-blue"
        		alt="Valid CSS!" /> </a>
		</p>
        </div>

</div>
</body>
</html>
 

















