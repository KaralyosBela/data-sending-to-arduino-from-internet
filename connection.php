<?php
$servername = "localhost";
$username = "root";
$password = "Karalyos1994";
$connection = new mysqli($servername, $username, $password);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}/* else {
    echo "Connection was succesfull!<br>";
}*/

$connection->select_db('users');
/*
if ($connection->select_db('users')) {
    echo "Succesful connection to the table: users.<br>";
}
*/
$connection->set_charset("utf8");

?>