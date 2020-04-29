<?php
  session_start();

if (isset($_POST['submit']))
{

         $host = 'localhost';  
         $user = 'root';  
         $pass = '';  
         $dbname = 'taxi';  
         $conn = mysqli_connect($host, $user, $pass,$dbname); 

         $username = $_POST['username'];
        $cabno = $_POST['cabno']; 
        $datetime=$_POST['datetime'];
      $i = " UPDATE `bookdetails` SET status='CANCELLED' WHERE `username`='$username' AND `cabno`='$cabno' AND `datetime`='$datetime' ";
      mysqli_query($conn, $i);

      $message="Are you sure want to cancel your booking?";
 echo "<script type='text/javascript'>alert('$message');</script>";
     ?><script type="text/javascript">window.location.href="bookdetails.php";</script><?php

}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>BOOKING</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js">
  </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="style.css">
     <link rel="stylesheet" type="text/css" href="b.css">
 <style>
    .dropdown-menu {background-color: grey;}

.dropdown:hover .dropdown-content {display: block;}  
     </style>


</head>
<body style="box-sizing: border-box;">

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
 <div class="container-fluid">
  <a class="navbar-brand" href="#"><h2 style="font-family: Anurati;">CABOO</h2></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">

    <li class="nav-item">
      <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <?php echo $_SESSION['username']; ?>
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="index.html">HOME</a>
    <a class="dropdown-item" href="abt.html">ABOUT</a>
    <a class="dropdown-item" href="help.html">HELP</a>
        <a class="dropdown-item" href="book.php">BOOKING</a>
    <a class="dropdown-item" href="bookdetails.php">BOOKING DETAILS</a>
        <a class="dropdown-item" href="#">CANCELLATION</a>

  </div>
</div>
</li>
  <li class="nav-item">
        <a class="nav-link" href="login.html">LOGOUT</a>
      </li>
    </ul>
  </div>
</div>
 </nav>


 <div class="book">
 <div class="c p-5" >
  <h1 style="text-align: center;font-family: Times New Roman;">CANCELLATION</h1>
  <hr width=100% color=grey>

  <form method="post" action="">
  <div class="form-group row">
    <label for="inputusername3" class="col-sm-2 col-form-label">Username</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" name="username" id="inputusername3"  value="<?php echo $_SESSION['username']; ?>">
    </div>
  </div>
         
  <div class="form-group row">
                        <label for="inputcabno3" class="col-sm-2 col-form-label">Cab Number</label>
                        <div class="col-sm-8">
                          <input type="cabnumber" class="form-control" name="cabno" id="inputcabno3" placeholder="Cab Number" required>
                        </div>
                </div>       
   <div class="form-group row">
                        <label for="inputdate3" class="col-sm-2 col-form-label">Pick-up Date</label>
                        <div class="col-sm-8">
                          <input type="datetime-local" min="2019-09-27T00:00" class="form-control" name="datetime" id="inputdate3" placeholder="Pick-up Date" required>
                        </div>
                </div>

  <div class="form-group row">
    <div class="col-sm-10">
      <!-- <button type="submit" class="btn btn-primary"><a href="#">BOOK</a></button> -->
      <input type="submit" name="submit" value="Cancel">
  
    </div>
  </div>
 </form>
</div>
</div>
</body>
</html>