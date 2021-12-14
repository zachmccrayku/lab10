<?php

echo "<html><head><title>Add a User</title></head><body>";

$myconn = new mysqli("mysql.eecs.ku.edu", "HIDDEN", "HIDDEN", "HIDDEN");

if($myconn->connect_errno)
{
    printf("Connect failed: %s\n", $myconn->connect_error);
    exit();
}

$username = $_POST["username"];

$query = "INSERT INTO `Users` (`user_id`) VALUES ('$username');";

if($result = $myconn->query($query) && strlen($username) > 0)
{
    echo "<h1>Successfully subbmited user id</h1>";
}

else
{
    echo "<h1>Failed to add user</h1>";
}

echo "</body></html>";
$myconn->close();

?>