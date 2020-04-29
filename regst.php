<?php  
 $host = 'localhost';  
         $user = 'root';  
         $pass = '';  
         $dbname = 'taxi';  
         $conn = mysqli_connect($host, $user, $pass,$dbname);  
         
         if(!$conn){  
            die('Could not connect: '.mysqli_connect_error());  
         }

         $em=$_POST['username'];
         $p=$_POST['password'];
         $p1=$_POST['password1'];  
  
if($p==$p1)
{          
$i=mysqli_query($conn,"INSERT INTO details VALUES('$em','$p')");
}
if ($i === TRUE) {
      $message="Hurray! You have Registred Successfully....✨🎇🎆🎉🎉🎉";
 echo "<script type='text/javascript'>alert('$message');</script>";
    ?><script type="text/javascript">window.location.href="login.html";
</script>
<?php
}
else if($p!=$p1){
    $message="Invalid password";
 echo "<script type='text/javascript'>alert('$message');</script>";
?> <script>
window.location.href="reg.html";
</script>    
<?php
}
else {
    $message="User already exists";
 echo "<script type='text/javascript'>alert('$message');</script>";
?> <script>
window.location.href="login.html";
</script>    
<?php
}

$conn->close();

?>