<?php
  session_start();
  if((!isset($_SESSION['username'])) ||  (!isset($_SESSION['role'])) || ($_SESSION['role'] != 'admin')) {
      echo "<a href = 'login.php'>Login</a> as admin First";
      return;
  }
  mysql_connect("localhost", "root", "");
  mysql_select_db("mess");
  $query = 'select * from student where extra = 1';
  $result = mysql_query($query);
  $query = 'select count(*) from student where extra = 1';
  $result1 = mysql_fetch_array(mysql_query(($query)));
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="dbms project on mess extra allotment">
    <meta name="author" content=" mohit and bipul">

    <title>Admin Panel - Mess authority</title>

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="navbar.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Admin Panel</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li ><a href="admin_home.php">Home</a></li>
              <li class="active"><a href="#">Total Bookings</a></li>
              <li><a href="update.php">Update Extras</a></li>
              <li><a href="verify.php">Verify Bookings</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="logout.php">Logout</a></li>
            </ul>
          </div>
        </div>
      </nav>

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1>Total Booking Details</h1>
        <p>Below are the Details on Today's Booking</p>
        <p>
        <a class="btn btn-lg btn-primary">Total Bookings : <?php echo $result1[0]; ?> &raquo;</a>
      </p>
      <table class = "table-striped" style = "width : 80%; font-style: georgia; font-size : 20px;">
        <thead>
          <th> Name </th> <th> Roll No </th> <th> Balance </th> <th> code </th>
        </thead>
        <?php 
          $count = 0;
          while( $row = mysql_fetch_assoc($result) ){
            if( $count > 2) break;
            $count = $count + 1;
          echo "
          <tr>
            <td> ".$row['name']." </td>
            <td> ".$row['username']." </td>
            <td> ". $row['balance']." </td> 
            <td> ". $row['code']." </td>
          </tr>
          ";
          }
        ?>
      </table>
      </div>
    </div> 
  </body>
</html>
