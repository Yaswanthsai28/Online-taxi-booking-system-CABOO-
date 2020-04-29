<?php
session_start();

         $host = 'localhost'; 

         $user = 'root'; 

         $pass = ''; 

         $dbname = 'taxi'; 

         $conn = mysqli_connect($host, $user, $pass,$dbname);

         $p1=$_SESSION['pickup'];
         $p2=$_SESSION['dropoff'];

         $i="SELECT * FROM `distance` WHERE pickup='$p1' AND dropoff='$p2' OR pickup='$p2' AND dropoff='$p1";

         $res=mysqli_fetch_assoc(mysqli_query($conn,$i));

         // while($rows=mysqli_fetch_assoc($res))
         // {
         	$_SESSION['distance'] =  $rows["dis"];
         	// echo $
         // }
?>
