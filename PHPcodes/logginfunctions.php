<?php

function registration ($user,$email,$pwd,$dbh)
{

//Password gets hashed here before inserting
if(Userduplicate($user,$email,$dbh)){
	$pwd = password_hash($pwd, PASSWORD_DEFAULT);

	$sqliquery ="INSERT INTO `Account` (`user`, `email`, `pwd`) VALUES ('$user','$email','$pwd')";

	mysqli_query($dbh,$sqliquery) or die(mysqli_error());
	}
	else{
		exit
	}
}
//Logging into the user requires us to compare password hashes.
//After the hashes checks out create a session with the User's name and account ID
//Just
function loggin ($user,$pwd,$dbh)
{

	$sqliquery = "SELECT 'accountid','username','pwd' FROM 'Account` WHERE 'username'= '$user' ";
	$templogindata = mysqli_query($dbh,$sqliquery) or die(mysqli_error());
	$row=mysqli_fetch_assoc($templogindata);
	if(password_verify($pwd,$row["pwd"])){
// After logging in (which I'll do at some point). We start the session and assign variables to the session. From there it should be easy....right? erm...
	session_start();
	$_SESSION["username"] = $user;
	$_SESSION["accountid"] = $row["accountid"];
	return true;
	}
	else
	{
	return FALSE;
	}
}
//Checks if the user has a dupe or not
function Userduplicate($user,$email,$dbh)
{
	$usercheck= "SELECT * FROM `Account` WHERE account ='$user'";
	$emailcheck= "SELECT * FROM `Account` WHERE email = '$email'";
	$emailcount= mysqli_num_rows($emailcheck);
	$usercount= mysqli_num_rows($usercheck);

	if($emailcount>0 or $usercount>0)
	{
		return false;

	}
	return true;
}

?>
