<?php
include 'config/database.php';

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$photo = null;
$uploadDir = 'uploads/';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
    $photo = $uploadDir . uniqid() . '-' . basename($_FILES['photo']['name']);
    if (!move_uploaded_file($_FILES['photo']['tmp_name'], $photo)) {
        die("Failed to move uploaded file.");
    }
}

$sql = "INSERT INTO clients (name, email, phone, photo) VALUES ('$name', '$email', '$phone', '$photo')";

if ($mysqli->query($sql) === TRUE) {
    header("Location: success.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}

$mysqli->close();
?>
