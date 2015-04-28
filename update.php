<?php
  session_start();
  if((!isset($_SESSION['username'])) ||  (!isset($_SESSION['role'])) || ($_SESSION['role'] != 'admin')) {
      echo "<a href = 'login.php'>Login</a> as admin First";
      return;
  }
  mysql_connect("localhost", "root", "");
  mysql_select_db("mess");
  if(isset($_POST['submit'])){
    $query = 'update extra SET item =  "'.$_POST["item"].'" , start_book = "'.$_POST["start"].'" , end_book = "'.$_POST["end"].'" , money = "'.$_POST["amount"].'" where id = 1;';
    mysql_query($query);
  }
  $query = 'select * from extra';
  $result = mysql_fetch_array(mysql_query(($query)));
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
    <link href="http://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/d004434a5ff76e7b97c8b07c01f34ca69e635d97/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
    <script src="http://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/d004434a5ff76e7b97c8b07c01f34ca69e635d97/src/js/bootstrap-datetimepicker.js"></script>
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
              <li><a href="#">Total Bookings</a></li>
              <li class = "active"><a href="update.php">Update Extras</a></li>
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
        <h1>Update the Details of Extra</h1>
        <form action = "" method = "post" >
          <div class='col-sm-12'>
            <div class = 'form-group'>
              <input class='input-group form-control center' type = 'text' name = 'item' Placeholder = "Item's Name" value = "<?php echo $result['item']; ?>" >
            </div>
          </div>
          <div class='col-sm-6'>
              <div class="form-group">
                  <div class='input-group date' id='datetimepicker2'>
                      <input name = "start" Placeholder = 'Start Time' type='text' class="form-control" value = "<?php echo $result['start_book']; ?>" />
                      <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                 </div>
              </div>
          </div>
          <div class='col-sm-6'>
              <div class="form-group">
                  <div class='input-group date' id='datetimepicker3'>
                      <input name = "end" Placeholder = 'End Time' type='text' class="form-control" value = "<?php echo $result['end_book']; ?>"/>
                      <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                  </div>
              </div>
          </div>
          <div class='col-sm-3'>
            <div class = 'form-group'>
              <input class='input-group form-control' type = 'text' name = 'amount' Placeholder = "Amount" value = "<?php echo $result['money']; ?>" >
            </div>
          </div>
          <p>
            <input name = "submit" type = "submit" value = "update" class="btn btn-lg btn-primary">
          </p>
        </form>  
      </div>
    </div> 
    <script type="text/javascript">
            $(function () {
                $('#datetimepicker2').datetimepicker({
                    format: 'YYYY-MM-DD hh:mm:ss'
                });
                 $('#datetimepicker3').datetimepicker({
                    format: 'YYYY-MM-DD hh:mm:ss'
                });
            });
          function set(){
            document.getElementsByTagName("input")[1].value = "<?php echo $result['start_book']; ?>";
            document.getElementsByTagName("input")[2].value = "<?php echo $result['end_book']; ?>";
          }
          setTimeout(set, 100 );
        </script>
  </body>
</html>
