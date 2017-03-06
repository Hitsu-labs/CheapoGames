<?php
/*This script handles registration requests. It relies on loggin functions again. aa */ 
include("logginfunctions.php")

($dbh = mysqli_connect ($hostname, $username, $password, $database)) or die ("SQL Connection rejected, try again");
echo "Registering your account";
$user = $_POST["username"];
$email = $_POST ["email"];
$pwd = $_POST["password"];

if(registration ($user,$email,$pwd,$dbh))
{
	echo "\n Registration complete";
	header("Location: index.html");
	exit;
}
else
{	echo" heyo";
	header("Location: index.html");
	exit;
	
}


?>
