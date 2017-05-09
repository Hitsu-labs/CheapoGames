#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

$client = new rabbitMQClient("testRabbitMQ.ini","deployServer");
$request = array();
$request['type'] = "front";
$request['version'] = $argv[1];
$i=shell_exec('sudo sh bashdeploy/sendman.sh '.$argv[1].' '.$argv[2]); 
echo $i;
$response = $client->send_request($request);
?>
