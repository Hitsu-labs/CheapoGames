#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
<<<<<<< HEAD
//include("logginfunctions.php");
//include("mysqlloggininfo");
=======
include("logginfunctions.php");
include("mysqlloggininfo");
>>>>>>> 5bdac01306432697f69a8da76e8bd72e64b88653
($dbh = mysqli_connect($hostname, $username, $password, $database)) or die ("SQL connection rejected, try again");
function doLogin($username,$password)
{
    // lookup username in databas
    // check password
    return true;
    //return false if not valid
    
   if(rcode=0) {
	$string = "Response 
   }
}

function requestProcessor($request)
{
  $rcode;
  echo "received request".PHP_EOL;
  var_dump($request);
  if(!isset($request['type']))
  {
    return "ERROR: unsupported message type";
  }
  switch ($request['type'])
  {
    case "login":
      print($request['swag']);	
      return doLogin($request['username'],$request['password']);
    case "validate_session":
      return doValidate($request['sessionId']);
    case "loggingin":
<<<<<<< HEAD
      if(loggin($request['username'],$request['password'],$dbh))
	{
	$rcode=0;
	return $rcode;
	}
else 
{
	$rcode=1
}
/*    case "register":
      if(registration($user,$email,$pwd,$dbh))
{
	$rcode=2;
	return $rcode;
}
else
{
	$rcode=3;
}*/
=======
      return loggin($user,$pwd,$dbh);
    case "register":
      return registration($user,$email,$pwd,$dbh);
>>>>>>> 5bdac01306432697f69a8da76e8bd72e64b88653
  }
  return array($rcode);
}



$server = new rabbitMQServer("testRabbitMQ.ini","testServer");

$server->process_requests('requestProcessor');
exit();
?>

