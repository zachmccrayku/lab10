<?php
    $myconn = new mysqli("mysql.eecs.ku.edu", "HIDDEN", "HIDDEN", "HIDDEN");
    echo "<html><head><title>{$_GET['user']}s Posts</title><style>table, th, td { border: 1px solid black;}</style></head><body>";
    if($myconn->connect_errno)
    {
        echo "<h1>There was a problem connecting to the database</h1></body></html>";
        exit();
    }

    $query = $myconn->prepare("SELECT post FROM Posts WHERE author_id=?;");
    $query->bind_param("s", $_GET["user"]);

    if($result != $myconn->query($query) )
    {
        echo "<h1>Something went wrong. Please try again.</h1>";
    }
    
    else
    {
        $result = $myconn->get_results();
        echo "<table><thead><tr><th>Posts: from {$_GET["user"]}</th></tr></thead><tbody>";
        while($row = $result->fetch_assoc())
        {
            echo "<tr><td>{$row["post"]}</td></tr>";
        }
        echo "</tbody></table>";
        $result->free();
    }
$myconn->close();
echo "</body></html>";
    
?>