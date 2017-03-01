<?php

//Connecting to databse
include("logginfunctions.php");

($dbh = mysqli_connect ($hotstname, $username, $password, $database)) or die ("SQL connection rejected, try again");



?>
