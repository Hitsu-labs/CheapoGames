#!/usr/bin/php

<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
include("logginfunctions.php");

function deployprocessor($deployer)

{

//So we have to setup a rabbitmq deployment message towards all of ourservers.

// Starting off with getting a type. We check if its a QA server
// Or if its the pro server. We also need QA to tell us what version
// Of the our project that our server is running.
//After things checks out then we use scp to send a copy of the sefver

switch ($request['type'])

{
	case "QA":
		echo $request['version'];
		//can probably make a version function? 
		$output = shell_exec('./scpdeploy.sh notsure notsure');
		//Okay so now I have to make a script that is called scpdeploy this command will deploy
		//packages that are hosted on the deployment server
	case "Devops":
		//If its devops, the deployment server needs to prep it self for getting a SCP file.
		// So the server should return a "Sure" or whatever to let the devops environment to 
		//SCP it to the deployment server
	case "Production":
		//Same as QA.
		echo $request['version'];
		
}
return "Something goofed, gotta check the ol cobwebs";
}
$server = new rabbitMQServer("testrabbitMQ","testServer");
$server->process_requests('deployprocessor');
exit();

?>
