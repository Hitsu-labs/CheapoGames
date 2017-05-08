#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

$client = new rabbitMQClient("testRabbitMQ.ini","deployServer");
$request = array();
$request['type'] = "front";
$request['function'] = $argv[1];
shell_exec('bashdeploy/sendman.sh'.$argv[1].$argv[2]); 

$response = $client->send_request($request);
?>
