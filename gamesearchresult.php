<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

$client = new rabbitMQClient("testRabbitMQ.ini","testServer");
$request = array();
$request['type'] = "games";
$request['game'] = $_Post['game'];
$response = $client->send_request($request);
$resultlen = count($response);
?>

<html>
	<head>
		<title> Game Search Results </title>
	</head>
	<h1>Game<h1>
	<?php
	for($i = 0; $i<$resultlen; $i++)
	{
			if($i==4)
			{
				echo "img src="$response[$i]" alt="Game Image" style="width:587px;height:469px;""
			}
			echo $response[$i];
		
	}
	?>
</html>
