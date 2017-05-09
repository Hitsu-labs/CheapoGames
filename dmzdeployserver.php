#!/usr/bin/php

<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
include("logginfunctions.php");



function requestProcessor($request)
{
//So we have to setup a rabbitmq deployment message towards all of ourservers.

// Starting off with getting a type. We check if its a QA server
// Or if its the pro server. We also need QA to tell us what version
// Of the our project that our server is running.
//After things checks out then we use scp to send a copy of the sefver

switch ($request['type'])

{
	case "deploy":
		echo $request['version'];
	case "dmz":
		echo $request['version'];
		$output = shell_exec('bashdeploy/unpackman '.$request['version']);	
}
return "Something goofed, gotta check the ol cobwebs";
}
$server = new rabbitMQServer("testRabbitMQ.ini","deployServer");
$server->process_requests('requestProcessor');
exit();

?>
