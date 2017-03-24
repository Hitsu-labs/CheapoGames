<?php

function registration ($user,$email,$pwd,$dbh)
{

	if(Userduplicate($user,$email,$dbh))
	{
		//Password get's hashed before making query
		$pwd = password_hash($pwd, PASSWORD_DEFAULT);
		$sqliquery ="INSERT INTO `Account` (`Username`, `Email`, `Password`) VALUES ('$user','$email','$pwd')";
		mysqli_query($dbh,$sqliquery) or die(mysqli_error());
		return true;
	}
	else
	{
		return false;
	}
}

//Logging into the user requires us to compare password hashes.
//After the hashes checks out create a session with the User's name and account ID
function loggin ($user,$pwd,$dbh)
{
       
	$sqliquery = "SELECT * FROM `Account` WHERE Username = '$user'";
	$templogindata = mysqli_query($dbh,$sqliquery) or die("lol it doesnt work.");
	$row = mysqli_fetch_assoc($templogindata);
	if($user == $row['Username'])
	{
		if(password_verify($pwd,$row['Password']))
		{
			$rcode = 0;
			echo $rcode;
			return $rcode;
		}
		else
		{
			$rcode = 1;
			echo $rcode;
			echo "Failed \n";
			echo $row['Password'] . " ";
			echo $pwd;
			return $rcode;
		}
	}
	else
	{
		$rcode = 1;
		echo $rcode;
		return $rcode;	
	}
}

//Checks if the user has a dupe or not
function Userduplicate($user,$email,$dbh)
{
	$usercheck= "SELECT * FROM `Account` WHERE Username ='$user'";
	$emailcheck= "SELECT * FROM `Account` WHERE Email = '$email'";
	$t= mysqli_query($dbh,$emailcheck);
	$t2= mysqli_query($dbh,$usercheck);
	$emailcount= mysqli_num_rows($t);
	$usercount= mysqli_num_rows($t2);

	if($emailcount>0 or $usercount>0)
	{
		return false;
	}
		return true;
}

//This function is used to search a game within the database
function gamesearch($game,$dbh)
{
	
	$gamecheck = "SELECT * FROM `Games` WHERE Game_Name LIKE '$game' LIMIT 1";
	$t = mysqli_query($dbh,$gamecheck);
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

//This is to view the Wishlist
function wishlistlogic($user,$dbh)
{
	$rcode = array();
	$gameids = array();
	$counter = 0;
	$user= "SELECT * FROM `Account` WHERE Username ='$user'";
	$templogindata = mysqli_query($dbh,$user) or die(mysqli_error());
	$row=mysqli_fetch_assoc($templogindata);
	$wishlistlogic = "SELECT * FROM `Wishlist` WHERE UserID = '$row[UserID]'";
	$wishlistdata = mysqli_query($dbh,$wishlistlogic);
	while($row = mysqli_fetch_array($wishlistdata))
	{
		$gameids[$counter] = $row['GameID'];
		$counter++;
		//Still thinking of the rest of logic... erm..
		//I can do a query in here for each game just return a huge ass array
		//But thats ugly, almost as ugly as not doing OOP or procedures..haha
	}
	$counter = count($gameids);
	//Nested loop query, holy crap.
	for ($i = 0; $i<$counter; $i++)
	{
		$templogindata = mysqli_query($dbh,"SELECT * FROM `Games` WHERE GameID = '$gameids[$i]'") or die(mysqli_error());
		while($row = mysqli_fetch_array($templogindata))
		{
			$rcode[$i] = $row['GameID'];
			$rcode[$i+1] = $row['Title'];
			$rcode[$i+2] = $row['Summary'];
			$rcode[$i+3] = $row['Game_URL'];
			$rcode[$i+4] = $row['Picture_URL'];
			$rcode[$i+5] = $row['Price'];	
		}
	}
	return $rcode;
}

//This function is to add to the wishlist
function addtowishlist($user,$game,$dbh)
{
	$user = "SELECT * FROM `Account` WHERE Username = '$user'";
	$templogindata = mysqli_query($dbh,$user) or die (mysqli_error());
	$row=mysqli_fetch_assoc($templogindata);
	$userid= $row['ID'];
	$user = "SELECT * FROM `Account` WHERE Username = '$game'";
	$templogindata = mysqli_query($dbh,$user);
	$row=mysqli_fetch_assoc($templogindata);
	$game = $row['GameID'];
	$wishlogic = "INSERT INTO `Wishlist` (`AccountID`, `GameID`) VALUES ('$userid','$game')";
	$templogindata = mysqli_query($dbh,$wishlogic);
	$rcode = 0;
	return $rcode;
}
?>
