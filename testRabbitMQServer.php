#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
include("logginfunctions.php");
include("mysqlloggininfo.php");
($dbh = mysqli_connect($hostname, $username, $password, $database)) or die ("SQL connection rejected, try again");

function requestProcessor($request)
{
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
		$rcode=loggin($request['username'],$request['password'],$dbh);
		return $rcode;
	case "games":
		$rcode = gamesearch($request['game'],$dbh);
		return $rcode;
  
	case "profiler":
		$rcode = wishlistlogic($request['username'],$dbh);
		return $rcode;
	case "registration":
		if(registration ($request['username'],$request['email'],$request['password'],$dbh))
		{
	        	$rcode=0;
			return $rcode;
		}
		else
		{
			$rcode=1;
			return $rcode;
		}
  }
	return $rcode;
}
$server = new rabbitMQServer("testRabbitMQ.ini","testServer");
$server->process_requests('requestProcessor');
exit();
?>
