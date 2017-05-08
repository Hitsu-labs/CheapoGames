#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

$client = new rabbitMQClient("testRabbitMQ.ini","deployServer");
$request = array();
$request['type'] = "deploy";
shell_exec('bashdeploy/packman.sh');
shell_exec('bashdeploy/sendman.sh');
$response = $client->send_request($request);
?>
