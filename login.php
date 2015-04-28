<?php
	session_start();
	if(isset($_SESSION['username'])){
		echo "You are already logged in. Go to your <a href = 'user.php' >Profile </a> Page!";
		return;
	}
	if(isset($_POST["submit"])){
		mysql_connect("localhost","root","");
		mysql_select_db("mess");
		$query = 'select * from login where username = "'.$_POST["username"].'" and password = "'.$_POST["password"].'" and role = "'.$_POST["role"].'";';
		$result = mysql_query($query);
		if(mysql_num_rows($result)){
			$_SESSION['username'] = $_POST['username'];
			$_SESSION['role'] = $_POST['role'];
			echo "Logged In with username ". $_SESSION['username'];
			if($_POST["role"] == 'user')
				header('Location: user.php');
			else
				header('Location: admin_home.php');
			return;
		}
		echo "Wrong Username or Password or role. Try again!";
	}
?>

<html>
	<head>
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	</head>

	<body>
		<div class = "container">
			<h1> Mess Extra Allotment </h1>
			<h2> Sign In </h2>
			<form action = "" method = "post" >
				<input type = "text" name = "username" placeholder = "Username">
				<br>
				<br>
				<input type = "password" name = "password" placeholder = "Password">
				<br><br>
				<input type = "radio" name = "role" value = "user">User
				<input type = "radio" name = "role" value = "admin">Admin
				<input type = "submit" name = "submit" value = "Login">
			</form>
		</div>
	</body>
</html>
