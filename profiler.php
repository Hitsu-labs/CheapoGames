<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
session_start();
if(!isset($_SESSION['username']))
{
header("Location: logging.html");
}
$client = new rabbitMQClient("testRabbitMQ.ini","testServer");
$request = array();
$request['type'] = "profile";
$request['username'] = $_SESSION['username'];
$response = $client->send_request($request);
$resultlen = count($response);

?>


<html>
 Welcome, <?php echo $_SESSION['username']; ?> The following is your wishlist!
<p><?php for($i = 0; $i<$resultlen; $i++){
	echo $response[$i];
	
	}
?> </p>
If no games were displayed please search a game to add to your wishlist~

<button type="submit" formaction="search.html">

</html>
