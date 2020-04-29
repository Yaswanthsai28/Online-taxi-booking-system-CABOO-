<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Booking Details</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js">
	</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">

<style>
table {
  width:100%;
}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 15px;
  text-align: left;
}
table#t01 tr:nth-child(even) {
  background-color: #eee;
}
table#t01 tr:nth-child(odd) {
 background-color: #fff;
}
table#t01 th {
  background-color: black;
  color: white;
}
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


	<?php
// session_start();
$host = 'localhost'; 

         $user = 'root'; 

         $pass = ''; 

         $dbname = 'taxi'; 

         $conn = mysqli_connect($host, $user, $pass,$dbname);

         $un=$_SESSION['username'];
         $i="SELECT * FROM `bookdetails` where username='$un'";
         $res=mysqli_query($conn, $i);

?>
<h2 style="text-align:center;">BOOKING DETAILS</h2>
<table id="t01">
  <tr>
    <th>UserID</th>
    <th>Cabno</th> 
    <th>Date&Time</th> 
    <th>amount</th>
    <th>Status</th>
  </tr>
  <?php
  while($row = mysqli_fetch_assoc($res))
  {
  echo "<tr>";
  echo "<td>" . $row['username'] . "</td>";
  echo "<td>" . $row['cabno'] . "</td>";
  echo "<td>" . $row['datetime'] . "</td>";
  echo "<td>" . $row['amount'] . "</td>";
  echo "<td>" . $row['status'] . "</td>";
  echo "</tr>";
  }
 ?>
</table>

<footer>
  <div class="col-12">
    <h5 style="text-align:center;">&copy; CABBO.com</h5>
</footer>

</body>
</html>
