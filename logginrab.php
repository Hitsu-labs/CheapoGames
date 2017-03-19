<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

$client = new rabbitMQClient("testRabbitMQ.ini","testServer");
$request = array();
$request['type'] = "loggingin";
$request['swag'] = "this theory works yay :D";
$request['username'] = $_Post['user'];
$request['password'] = $_Post['password'];
$response = $client->send_request($request);
print_r($response);
if($response==0)
{
session_start();
$_SESSION['username'] = $request['username'];
echo " We're logged in";
}
else{
echo 'nope';
}
?>




