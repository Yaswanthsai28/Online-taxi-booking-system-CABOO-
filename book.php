<?php
  session_start();

  $conn = mysqli_connect("localhost", "root", "", "taxi");

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
    <a class="dropdown-item" href="bookdetails.php">BOOKING DETAILS</a>
        <a class="dropdown-item" href="cancel.php">CANCELLATION</a>

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
  <h1 style="text-align: center;font-family: Times New Roman;">BOOKING</h1>
  <hr width=100% color=grey>

  <form method="post" action="booking.php">
  <div class="form-group row">
    <label for="inputusername3" class="col-sm-2 col-form-label">Username</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" name="username" id="inputusername3"  value="<?php echo $_SESSION['username']; ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputphonenumber3" class="col-sm-2 col-form-label">Phone number</label>
    <div class="col-sm-8">
      <input type="number" min="6000000000" max="9999999999" class="form-control" name="phonenumber" id="inputphonenumber3" placeholder="Phonenumber" minlength="10" maxlength="10" required>
    </div>
  </div>
  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Cab Type</legend>
      <div class="col-sm-8">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="10" onclick="mul()">
          <label class="form-check-label" for="gridRadios1">
            MINI
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="20">
          <label class="form-check-label" for="gridRadios2">
            MICRO
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="30" >
          <label class="form-check-label" for="gridRadios3">
            PRIME
          </label>
        </div>
      </div>
    </div>
  </fieldset>

 <div class="form-group row">
                        <label for="inputlocation3" class="col-sm-2 col-form-label">Pick-up Location</label>
                        <div class="col-sm-8">
                          <!-- <input type="location" class="form-control pickup" name="pickup" id="inputlocation3" placeholder="Pick-up Location"> -->
                          <select name="from" >
                            <option value="">Pick-up Location</option>
                            <option value="Gopalapatnam">Gopalapatnam</option>
                            <option value="Complex">Complex</option>
                            <option value="NAD">NAD</option>
                            <option value="Pendurthi">Pendurthi</option>
                            <option value="Gajuwaka">Gajuwaka</option>
                            <option value="Maddilapalem">Maddilapalem</option>
                            <option value="Jagadhamba">Jagadhamba</option>
                            <option value="Tagarapuvalasa">Tagarapuvalasa</option>
                            <option value="Bheemli">Bheemli</option>
                            <option value="R.K.Beach">R.K.Beach</option>
                          </select>

                        </div>
                </div>

    <div class="form-group row">
                        <label for="inputlocation13" class="col-sm-2 col-form-label">Drop-off Location</label>
                        <div class="col-sm-8">
                          <!-- <input type="location1" class="form-control dropoff" name="dropoff" id="inputlocation13" placeholder="Drop-off Location"> -->
                           <select name="to">
                            <option value="">Drop-off Location</option>
                            <option value="Complex">Complex</option>
                            <option value="Gopalapatnam">Gopalapatnam</option>
                            <option value="NAD">NAD</option>
                            <option value="Pendurthi">Pendurthi</option>
                            <option value="Gajuwaka">Gajuwaka</option>
                            <option value="Maddilapalem">Maddilapalem</option>
                            <option value="Jagadhamba">Jagadhamba</option>
                            <option value="Tagarapuvalasa">Tagarapuvalasa</option>
                            <option value="Bheemli">Bheemli</option>
                            <option value="R.K.Beach">R.K.Beach</option>
                          </select>
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
      <input type="submit" name="submit" value="Payment">
  
    </div>
  </div>

 </form>
<!-- <footer>

	<div class="col-12">
		<h5 style="text-align:center;">&copy; CABOO.com</h5>
</footer> -->
</div>
</div>
</body>
</html>

<script>


  $('.gridRadios').click(()=>{
  });
</script> 