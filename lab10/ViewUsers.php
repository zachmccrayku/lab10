<?php

echo "<html><head><style>table, th, td {border: 1px solid black;}</style><title>View Users</title></head><body>";

$myconn = new mysqli("myeecs.ku.edu", "HIDDEN", "HIDDEN", "HIDDEN");

if ($myconn->connect_errno) {
    echo "<h1>Unable to connect.</h1></body></html>";
    exit();
}

$query = "SELECT user_id FROM Users";

if($result = $myconn->query($query))
{
    echo "<table><thead><th>Users</th></thead><tbody>";
    while ($row = $result->fetch_assoc()) {
        printf("<tr><td>%s</td></tr>", $row["user_id"]);
    }
    echo "</tbody></table>";
    $result->free();
}

else
{
    echo "<h1>Failed to view users.</h1>";
}

echo "</body></html>";
$myconn->close();
?>