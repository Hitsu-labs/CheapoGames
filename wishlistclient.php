<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
session_start();
$client = new rabbitMQClient("testRabbitMQ.ini","testServer");
$request = array();
$request['type'] = "games";
$request['accountid']= $_SESSION['gamesearch'];
$request['username'] = $_SESSION['username'];
$response = $client->send_request($request);

if($response==1)
{

//test email case, this wont work because we wont have any internet

$to = $_SESSION['username'];
$to .="@gmail.com";
$subject = "Game Added to Your Wishlist!";
$message = "Hello";
$message .= $_SESSION['username'];
$message .= ", You've added";
$message .= $_SESSION['gamesearch'];
$message .= "Hope it goes down in price at some point! See you around!";
$header = "From: noreply@exmaple.com\r\n";
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-type: text/plain; charset=utf-8\r\n";
$header .= "X-Priority: 1\r\n";
mail($to,$subject,$message,$header);
header("Location: profiler.php");
}
?>
