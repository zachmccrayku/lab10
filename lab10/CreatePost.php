<?php

echo "<html><head><title>Create Your Post!</title></head><body>";

$myconn = new mysqli("mysql.eecs.ku.edu", "HIDDEN", "HIDDEN", "HIDDEN");

if($myconn->connect_eerno)
{
    echo "<p>There was an error connecting.</p>";
    exit();
}

$username = $_POST["username"];
$post = $_POST["post"];

$query = "INSERT INTO `Posts` (`content`, author_id) VALUES ('$username', '$post');";

if($result != $myconn->query($query) )
{
    echo "<h1>Something went wrong. Please try again.</h1>";
}

else
{
    echo "<h1>Success!</h1>";
}

echo "</body></html>";
$myconn->close();

?>