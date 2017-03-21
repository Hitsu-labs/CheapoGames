<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

$client = new rabbitMQClient("testRabbitMQ.ini","testServer");
$request = array();
$request['type'] = "loggingin";
$request['swag'] = "this theory works yay :D";
$request['username'] = $_POST['user'];
$request['password'] = $_POST['password'];
$response = $client->send_request($request);
print_r($response);
if($response==1)
{
header("Location: logging.html");
}
else{
session_start();
$_SESSION['username'] = $request['username'];
$_SESSION['ID'] = $response[1];
echo " We're logged in";
header("Location: Hellouser.html");
}
?>



>?
