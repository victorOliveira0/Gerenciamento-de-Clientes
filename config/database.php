<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "client_management";

$mysqli = new mysqli($servername, $username, $password, $dbname);

if ($mysqli->connect_errno) {
    echo "falha ao conectar:(" . $mysqli->connect_errno . ")" . $mysqli->connect_errno;
}

?>