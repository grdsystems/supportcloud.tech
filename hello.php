<?php

$dbServer ="localhost";
$username = "postgres";
$password = "*****";
$database = "dvdrental";

//connecting, selecting database

$db_handle = pg_connect("host=$dbServer user=$username password=$password dbname=$database");

if ($db_handle) {
    echo 'Connection attempt succeded';
} else {
    echo 'Connection attempt failed';
}

echo "<h3>Checking the query status</h3>";

$query = "SELECT first_name,last_name FROM actor";

$result = pg_exec($db_handle, $query);

if ($result) {

    echo "The query executed successfully.<br>";

    echo "<h3>Print First and last name:</h3>";

    for ($row = 0; $row < pg_numrows($result); $row++) {

        $firstname = pg_result($result, $row, 'first_name');

        echo $firstname ." ";

        $lastname = pg_result($result, $row, 'last_name');

        echo $lastname ."<br>";

    }

} else {

    echo "The query failed with the following error:<br>";

    echo pg_errormessage($db_handle);

}



pg_close($db_handle);

?>
