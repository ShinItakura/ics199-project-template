<?php
/** 
 * DB Connection Script
 * DON'T CHANGE ANYTHING IN THIS FILE!
 *
 **/
 
// See if this Env. Var. is set
// if so, we're running on Dokku
$env = getenv('DATABASE_URL');

// If env is not false, parse the DB URL String
// and update the connection vars
if ($env) {
    $url = parse_url($env);
    $host = $url['host'];
    $username = $url['user'];
    $password = $url['pass'];
    $dbname = substr($url['path'], 1);
} else {
    // running locally, set connection vars for
    // local environment
    $host = 'mysql';
    $username = 'root';
    // dbname and password come from db_credentials
    require 'db_credentials.php';
}

// dsn - data source name
$dsn = "mysql:host=$host;dbname=$dbname";
    
try {
    $dbc = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    echo "<p>An error occured while trying to connect to
        the database: $error_message </p>";
    exit();
}
?>