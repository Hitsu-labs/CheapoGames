<?php
//This PHP script handles logging in. It includes logginfunctions.
//Theres another script that will handle registration
//We're not assuming ajax stuff. So...yeah
//Connecting to databse
include("logginfunctions.php");

($dbh = mysqli_connect ($hotstname, $username, $password, $database)) or die ("SQL connection rejected, try again");
session_start();
/*We're assuming that if this loggin script is being ran. We should unset any variables. This is just in case that we forget to destroy the session. Which I did now that I think about it. Our loggin function will set the variables again, so its all good. Theoritcally. 
*/
session_unset();
$user = $_POST["username"];
$pwd = $_POST["password"];
echo "Lets see if we can get you logged in, $user";
if(loggin($user,$pwd,$dbh))
{
//We will just redirect to another page. Guess a homepage?
//Loggin function already sets the session variables of "username"
// and account id.
header("Location: homepage.php");
}
else
{
/*If the loggin fails, then we destroy the session and redirect
back to login page.
*/
header("Location: index.html");
session_destroy();
exit;
}
?>
