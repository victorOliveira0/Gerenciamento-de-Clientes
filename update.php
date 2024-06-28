<?php
include 'config/database.php';

$id = $_POST['id'];
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
        die("Falha ao mover o arquivo carregado.");
    }
}

if ($photo) {
    $sql = "UPDATE clients SET name='$name', email='$email', phone='$phone', photo='$photo' WHERE id=$id";
} else {
    $sql = "UPDATE clients SET name='$name', email='$email', phone='$phone' WHERE id=$id";
}

if ($mysqli->query($sql) === TRUE) {
    header("Location: index.php");
    exit();
} else {
    echo "Erro ao atualizar: " . $mysqli->error;
}

$mysqli->close();
?>
