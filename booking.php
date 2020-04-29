<?php 
session_start();

         $host = 'localhost'; 

         $user = 'root'; 

         $pass = ''; 

         $dbname = 'taxi'; 

         $conn = mysqli_connect($host, $user, $pass,$dbname); 



         $em=$_POST['username'];
         $p =$_POST['phonenumber'];
         $p1=$_POST['from'];
         $p2=$_POST['to'];
         $p4=$_POST['datetime']; 
         $type=$_POST['gridRadios'];

          // echo $price;


      
         $i="SELECT * FROM `distance` WHERE (pickup='$p1' AND dropoff='$p2') OR (pickup='$p2' AND dropoff='$p1')";
         $dist=mysqli_fetch_assoc(mysqli_query($conn,$i));
         $_SESSION['distance'] =  $dist["dis"];
         $did = $dist['id'];
         $dist =  $dist["dis"];
         // echo $dist;
          $_SESSION['price'] = $dist*$type;

          if($did!=0)
          { 

    $q2="INSERT INTO `bookings`(`username`, `phonenumber`, `did`, `datetime`) VALUES ('$em','$p','$did','$p4')";
    $res = mysqli_query($conn, $q2);
  }

if ($res) {

      $_SESSION['pickup'] =  $p1;
      $_SESSION['dropoff'] =  $p2;
      $_SESSION['datetime'] =  $p4;
      $message="Booking confirmed....✨🎇🎆🎉🎉🎉";

echo "<script type='text/javascript'>alert('$message');</script>";

    ?><script type="text/javascript">window.location.href="pay1.php";

</script>

<?php

}
else {
    $message="Incorrect details";
 echo "<script type='text/javascript'>alert('$message');</script>";
?> <script>
window.location.href="book.php";
</script>    
<?php
}

$conn->close();

?>
 