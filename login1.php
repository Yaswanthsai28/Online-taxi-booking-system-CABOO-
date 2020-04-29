<?php
session_start();
$error="";
if(isset($_POST['submit'])){
 if(empty($_POST['username']) || empty($_POST['password'])){
 $error = "Username and Password should be filled";
   echo "<script type='text/javascript'>alert('$error');</script>";
   ?> <script>
window.location.href="login.html";
</script>    
<?php
 }
 else
 {
 $user=$_POST['username'];
 $pass=$_POST['password'];

 $conn = mysqli_connect("localhost", "root", "");
 
 $db = mysqli_select_db($conn, "taxi");
 
 $query = mysqli_query($conn, "SELECT * FROM details WHERE username='$user' AND password='$pass'");
 
 $rows = mysqli_num_rows($query);
 if($rows == 1){
 	$_SESSION['username'] =  $user;
 header("Location: book.php");
 }
 else
 {
 $error = "Username or Password is Invalid";
  echo "<script type='text/javascript'>alert('$error');</script>";
?> <script>
window.location.href="login.html";
</script>    
<?php
 }
 mysqli_close($conn); 
 }
}
 
?>
