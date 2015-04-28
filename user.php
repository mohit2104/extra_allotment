<?php
	session_start();
	if(!isset($_SESSION['username'])){
		echo "<a href = 'login.php'>Login</a> First";
		return;
	}
	mysql_connect("localhost","root","");	
	mysql_select_db("mess");
	if(isset($_POST['book'])){
		$num = (rand()*rand())%1000000;
		$query = 'select * from student where username = "'.$_SESSION["username"].'";';
		$result = mysql_fetch_assoc(mysql_query($query));
		if( $result['extra'])	
			$query = 'update student SET extra = 0, code = "'.$num.'" where username = "'.$_SESSION['username'].'";';
		else
			$query = 'update student SET extra = 1, code = "'.$num.'" where username = "'.$_SESSION['username'].'";';
		mysql_query($query);	
	}
	$query = 'select * from student where username = "'.$_SESSION["username"].'";';
	$result = mysql_fetch_assoc(mysql_query($query));
	$query = 'select * from extra;';
	$result1 = mysql_fetch_assoc(mysql_query($query));
	$query = 'select * from mess_details where id = "'.$result["mess_id"].'";';
	$result2 = mysql_fetch_assoc(mysql_query($query));
	$start_date = new DateTime($result1['start_book']);
	$end_date = new DateTime($result1['end_book']);
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
			<div class = "container">
				<h2> Students Detial </h2>
				Name : <?php echo $result['name']; ?><br>
				Roll No : <?php echo $result['username']; ?><br>
				balance : <?php echo $result['balance']; ?><br>
			</div>
			<div class = "container">
				<h2> Mess Detials </h2>
				Caterer : <?php echo $result2['caterer']; ?><br>
				Location : <?php echo $result2['location']; ?><br>
				Floor : <?php echo $result2['floor']; ?><br>
			</div>
			<div class = "container">
				<h2> Extra's Detail </h2>
				Item : <?php echo $result1['item']; ?><br>
				Money : <?php echo $result1['money']; ?><br>
				<form action = "" method = "post" ><input type = "submit" name = 'book' value = '<?php if( $result['extra'] == 0 ) echo "Book"; else echo "Unbook"; ?>' 
					></form><br>
				<?php if($result['extra'] == 1) echo "Current Status : Booked with Code : ".$result['code']; ?>
			</div>
		</div>
	</body>
</html>
