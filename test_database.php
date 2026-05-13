<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'lix-db';
$mysqli = new mysqli($host, $user, $password, $database);
// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
echo "Connected to MySQL successfully using MySQLi.";
?>