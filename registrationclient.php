<?php

require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

$client = new rabbitMQClient ("testRabbitMQ.ini", "testServer");
$request = array();
$request['type'] = "registration";
$request['username'] = $_POST['user'];
$request['password'] = $_POST['passwd'];
$request['email'] = $_POST['emailAddress'];
$response = $client->send_request($request);
print_r($response);
//$client->close();
if($response==0)
{
	echo "Registration completed";
	header( 'Location: logging.html');
	exit;
}
else
{
	echo "Registration failed. Make sure your email or username is unique!";
	header( 'Location: signup.html');
	exit;
}
exit;
?>
