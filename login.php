<?php

	// $_POST["email"];
	
	//defineerime muutujad
	$email_error = "";
	$password_error = "";
	$create_email = "";
	$create_password = "";
	$email = "";
	$repassword = "";
	$create_password2 = "";
	$create_user = "";
	
	//kontrollin kas keegi vajutas nuppu
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		
		//kas e-post on tühi
		if(empty($_POST["email"])){
			//jah oli tühi
			$email_error = "E-mail is required";
		}
		//kas password on tühi
		if(empty($_POST["password"])){
			//jah oli tühi
			$password_error = "Password is required";
		}
	}
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		//kas create email on tühi
		if(empty($_POST["email"])){
			//jah oli tühi
			$create_email = "E-mail is required";
		}	
		if(empty($_POST["username"])){
			//username väli on tühi
			$create_user = "Username is required";
		}	
		//kas create password on tühi
		if(empty($_POST["password"])){
			//jah oli tühi
			$create_password = "Password is required";
		}	else{
				//kontrollib et parool oleks rohkem kui 8 sümbolit
			if(strlen($_POST["password"]) < 8 ){
			$create_password = "Must be longer than 8 symbols";
			}
			if($_POST["password"] !== $_POST["repassword"]){
				//kui parool ei võrdu kordusparooliga lükkab errori ette
				$create_password2 = "Your password does not match the password entered above";
			}
		}
	}


?>
<html>
<head>
	<style>.error {color: #FF0000;}</style>
	<title>Login page</title>
</head>
<body>
	
	<h3>Mõtlesin siis teha lehe kuhu inimesed saavad teha postitusi erinevate teemade alla ja teised saavad siis kommenteerida, põhimõtteliselt väga lihtsustatud reddit</h3>
	<h2>Login</h2>
	<p><span class="error">* required field.</span></p>
	<form action="login.php" method="post">
	<input name="email" type="email" placeholder="E-mail"> 
	<span class="error">* <?php echo $email_error?></span> <br><br>
	<input name="password" type="password" placeholder="password"> 
	<span class="error">* <?php echo $password_error?></span> <br><br>
	<input type="submit" value="Login"> <br><br>
	</form>
	
	<h2>Create user</h2>
	<p><span class="error">* required field.</span></p>
	<form action="login.php" method="post">
	<input name="username" type="text" placeholder="Username"> 
	<span class="error">* <?php echo $create_user?></span> <br><br>
	<input name="email" type="email" placeholder="E-mail"> 
	<span class="error">* <?php echo $create_email?></span> <br><br>
	<input name="password" type="password" placeholder="password"> 
	<span class="error">* <?php echo $create_password?></span> <br><br>
	<input name="repassword" type="password" placeholder="password again"> 
	<span class="error">* <?php echo $create_password2?> <br><br>
	<input type="submit" value="Create"> <br><br>
	</form>
	
</body>
</html>