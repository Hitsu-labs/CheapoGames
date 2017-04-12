#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
include("logginfunctions.php");



function requestProcessor($request)
{
	($dbh = mysqli_connect("localhost", "root","mayoPryd0e705*", "V_Games") or die ("SQL connection rejected try again"));
 	global $rcode;
 	echo "received request".PHP_EOL;
 	var_dump($request);
 	if(!isset($request['type']))
 	{
    		return "ERROR: unsupported message type";
  	}
  
//Switch case to handle our different type of requests. 
switch ($request['type'])
{   	 
	case "loggingin":
		$log=$request['username'] . " " . $request['password'] . " " . date("m/d/Y") . " " . date("h:m:si") . "\n";
		file_put_contents("log.txt",$log,FILE_APPEND);
		$rcode=loggin($request['username'],$request['password'],$dbh);
		return $rcode;
	case "gamesearch":
		$rcode = gamesearch($request['game'],$dbh);
		return $rcode;
  	case "profiler":
		$rcode = wishlistlogic($request['username'],$dbh);
		echo $rcode;
		return $rcode;
	case "registration":
		if(registration($request['username'],$request['email'],$request['password'],$dbh))
		{
	        	$rcode=0;
			echo $rcode;
			return $rcode;
		}
		else
		{
			$rcode=1;
			echo $rcode;
			return $rcode;
		}
	case "addtowishlist":
		$rcode = addtowishlist($user,$game,$dbh);
		return $rcode;
  }
	return array("returnCode" => '0', 'message'=>"Server recieved request and processed");
}
$server = new rabbitMQServer("testRabbitMQ.ini","testServer");
$server->process_requests('requestProcessor');
exit();
?>
