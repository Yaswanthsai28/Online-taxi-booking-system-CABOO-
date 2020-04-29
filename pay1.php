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
  $amount = $_POST['amount'];
  $datetime=$_POST['datetime'];
  $radio = $_POST['gridRadios'];

  $i="INSERT INTO bookdetails(`username`, `cabno`,`datetime`, `amount`,`status`) VALUES ('$username','$cabno','$datetime','$amount','BOOKED')";


$res = mysqli_query($conn, $i);


  if ($radio=="card")
  {
    ?><script type="text/javascript">window.location.href="payment.html";</script><?php
  }
  if ($radio=="cash")
  {
     $message="Hurray! Your Booking is Successfull....✨🎇🎆🎉🎉🎉";
 echo "<script type='text/javascript'>alert('$message');</script>";
     ?><script type="text/javascript">window.location.href="bookdetails.php";</script><?php
  }
}
?>
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PAYMENT</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="style.css">


    <style type="text/css" media="screen">
 body
 {
  background-image:linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 0.5)), url('p.jpg');
  background-size: cover;
background-position: center;
color: white;
 }    
  .form-group input[type="submit"]
{
width: 15%;
border: none;
outline: none;
height: 40px;
background: #1c8adb;
color: #fff;
font-size: 18px;
border-radius: 20px;
} 
    .dropdown-menu {background-color: grey;}

.dropdown:hover .dropdown-content {display: block;}  

    </style>

</head>
<body>
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
    <a class="dropdown-item" href="bookdetails.php">BOOKING DETAILS</a>
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

  <form method="post" action="">
 <div class="book">
 <div class="c p-5">
  <h1 style="text-align: center;font-family: Times New Roman;">PAYMENT CONFIRMATION</h1>
  <hr width=100% color=grey>

  <div class="form-group row">
    <label for="inputphonenumber3" class="col-sm-2 col-form-label">Username</label>
    <div class="col-sm-8">
      <input type="email" class="form-control" name="username" id="inputphonenumber3" value="<?php echo $_SESSION['username']; ?>">
    </div>
  </div>

  <div class="form-group row">
    <label for="inputphonenumber3" class="col-sm-2 col-form-label">Cab Number</label>
    <div class="col-sm-8">
      <input type="cabnumber" class="form-control cab" name="cabno" id="inputphonenumber3" >
    </div>
  </div>
  <div class="form-group row">
    <label for="inputphonenumber3" class="col-sm-2 col-form-label">Pickup</label>
    <div class="col-sm-8">
      <input type="location" class="form-control" name="pickup" id="inputphonenumber3" value="<?php echo $_SESSION['pickup']; ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputphonenumber3" class="col-sm-2 col-form-label">Dropoff</label>
    <div class="col-sm-8">
      <input type="location1" class="form-control" name="dropoff" id="inputphonenumber3"  value="<?php echo $_SESSION['dropoff']; ?>">
    </div>
  </div>
  <div class="form-group row">
                    <label for="inputdate3" class="col-sm-2 col-form-label">Pick-up Date</label>
                    <div class="col-sm-8">
                    <input type="datetime-local" class="form-control" name="datetime" id="inputdate3" value="<?php echo $_SESSION['datetime']; ?>">
                    </div>
                </div>
<div class="form-group row">
    <label for="inputphonenumber3" class="col-sm-2 col-form-label">Distance</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" name="distance" id="inputphonenumber3"  value="<?php echo $_SESSION['distance']; ?>" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputphonenumber3" class="col-sm-2 col-form-label">Amount</label>
    <div class="col-sm-8">
      <input type="amount" class="form-control" name="amount" id="inputphonenumber3" value="<?php echo $_SESSION['price']; ?>" required>
    </div>
  </div>

 <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Payment Method</legend>
      <div class="col-sm-8">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="cash" >
          <label class="form-check-label" for="gridRadios1">
            Cash
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="card">
          <label class="form-check-label" for="gridRadios2">
            Card
          </label>
        </div>
         <div class="form-group row">
    <div class="col-sm-12">
      <!-- <button type="submit" class="btn btn-primary"><a href="#">BOOK</a></button> -->
      <input type="submit" name="submit" value="BOOK">
  
    </div>
  </div>  
        </div>
        </div>
        </fieldset>   
        </form>
 </div>
</div>

</body>
</html>

<script type="text/javascript">
    var distance = parseInt(Math.random( )*60+10); 
    $('.cab').val(distance);
</script> 