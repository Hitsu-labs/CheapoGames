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
$request['type'] = "profiler";
$request['username'] = $_SESSION['username'];
$response = $client->send_request($request);
$resultlen = count($response);

?>

<html>
<!This is the welcome message for the user>
Welcome, <?php echo $_SESSION['username']; ?> The following is your wishlist!

<p><?php for($i = 0; $i<$resultlen; $i++)
{
	echo $response[$i];
}
?> 
</p>
If no games are displayed please search a game to add to your wishlist ~ Please choose an option below <br>
<a href="profiler.php">Refresh Page</a><br>
<a href="searchengine">Search Here</a><br>
<a href="logout.php">Logout</a><br>
</html>


