<?php
include 'config/database.php';

$id = $_GET['id'];

$sql = "SELECT photo FROM clients WHERE id = $id";
$result = $mysqli->query($sql);
$row = $result->fetch_assoc();

if ($row['photo']) {
    unlink($row['photo']);
}

$sql = "DELETE FROM clients WHERE id = $id";

if ($mysqli->query($sql) === TRUE) {
    echo "Client deleted successfully";
} else {
    echo "Error: " . $mysqli->error;
}

$mysqli->close();

header("Location: index.php");
?>
