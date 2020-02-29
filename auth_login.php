<?php 
session_start(); 
 require('db_connect.php');

if (isset($_POST['name']) and isset($_POST['password'])){
	
// Assigning POST values to variables.
$username = $_POST['name'];
$password = $_POST['password'];

// CHECK FOR THE RECORD FROM TABLE
$query = "SELECT * FROM images WHERE username='$username' and password='$password'";
 
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);

if ($count == 1){
	$_SESSION['user_name']=$username;
	header("Location: welcome.php");
    exit;

//echo "Login Credentials verified";
//echo "<script type='text/javascript'>alert('Login Credentials verified')</script>";

}
else
{
echo "<script type='text/javascript'>alert('Invalid Login Credentials')</script>";
//echo "Invalid Login Credentials";
}
}
?>
