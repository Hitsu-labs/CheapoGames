<?php

function registration ($user,$email,$pwd,$dbh)
{

//Password gets hashed here before inserting
if(Userduplicate($user,$email,$dbh)){
	$pwd = password_hash($pwd, PASSWORD_DEFAULT);

	$sqliquery ="INSERT INTO `Account` (`Username`, `Email`, `Password`) VALUES ('$user','$email','$pwd')";

	mysqli_query($dbh,$sqliquery) or die(mysqli_error());
	return true;
	}
	else{
		return false;
	}
}
//Logging into the user requires us to compare password hashes.
//After the hashes checks out create a session with the User's name and account ID
//Just
function loggin ($user,$pwd,$dbh)
{


	$sqliquery = "SELECT 'ID','Username','Password' FROM 'Account` WHERE 'Username'= '$user' ";
	$templogindata = mysqli_query($dbh,$sqliquery) or die(mysqli_error());
	$row=mysqli_fetch_assoc($templogindata);
	if(password_verify($pwd,$row["Password"])){
// After logging in (which I'll do at some point). We start the session and assign variables to the session. From there it should be easy....right? erm...
	session_start();
	$_SESSION["username"] = $user;
	$_SESSION["accountid"] = $row["ID"];
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
//I really should have done this OOP style. Oh well. Might as well continue for consistency
	$usercheck= "SELECT * FROM `Account` WHERE Username ='$user'";
	$emailcheck= "SELECT * FROM `Account` WHERE Email = '$email'";
	$t= mysqli_query($dbh,$emailcheck);
	$t2= mysqli_query($dbh,$usecheck);
	$emailcount= mysqli_num_rows($t);
	$usercount= mysqli_num_rows($t2);

	if($emailcount>0 or $usercount>0)
	{
		return false;

	}
	return true;
}
function gamesearch($game,$dbh)
{
	$gamecheck = "SELECT * FROM `Games` WHERE Title LIKE `$game` LIMIT 1";
	$t= mysqli_query($dbh,$gamecheck);
	$gameresultcount= mysqli_num_rows($t);
	while ($row=mysqli_fetch_array($t))
	{
			$GameID = $row['GameID'];
			$Title = $row['Title'];
			$Summary = $row['Summary'];
			$Game_URL = $row['Game_URL'];
			$Picture_URL = $row['Picture_URL'];
			$Price = $row['Price'];
	}
	$rcode = array($GameID,$Title,$Summary,$Game_URL,$Picture_URL,$Price);
	return $rcode;
}

function wishlistlogic($user,$dbh)
{
	$user= "SELECT * FROM `Account` WHERE Username ='$user'";
	$templogindata = mysqli_query($dbh,$user) or die(mysqli_error());
	$row=mysqli_fetch_assoc($templogindata);
	$wishlistlogic = "SELECT * FROM `Wishlist` WHERE UserID = '$row['UserID']'";
	$wishlistdata = mysqli_query($dbh,$wishlistlogic);
	while($row = mysqli_fetch_array($wishlistdata))
	{
		//Still thinking of the rest of logic... erm..
		//I can do a query in here for each game just return a huge ass array
		//But thats ugly, almost as ugly as not doing OOP or procedures..haha
	}
	
}
?>
