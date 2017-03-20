<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
session_start();
$client = new rabbitMQClient("testRabbitMQ.ini","testServer");
$request = array();
$request['type'] = "profile";
$request['username'] = $_SESSION['username'];
$response = $client->send_request($request);
$resultlen = count($response);
?>


<html>
<title> Welcome, <?php echo $_SESSION['username']; ?> The following is your wishlist! <title>
<h1><?php for($i = 0; $i<$resultlen; $i++){
	echo $response[$i];
}?> </h1>
</html>