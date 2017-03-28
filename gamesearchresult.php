<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

$client = new rabbitMQClient("testRabbitMQ.ini","testServer");
$request = array();
$request['type'] = 'gamesearch';
$request['game'] = $_POST['game'];
$response = $client->send_request($request);
print_r($response);
session_start();
$_SESSION['gamesearch'] = $resultlen[1];
?>

<html>
	
		 Game Search Results 
	<h1>Game<h1>
	<?php
	for($i = 0; $i<$resultlen; $i++)
	{

			echo $response[$i];
			print "hello moto";	
	}
	?>
<form action="wishlistclient.php">
<fieldset>
<input type="submit">
</fieldset>
</form>
</html>
