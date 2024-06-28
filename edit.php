<?php
include 'config/database.php';

// Verifique se um ID foi passado na URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Obtenha os dados do cliente do banco de dados
    $sql = "SELECT * FROM clients WHERE id = $id";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        $client = $result->fetch_assoc();
    } else {
        echo "Cliente não encontrado.";
        exit;
    }
} else {
    echo "ID de cliente não fornecido.";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Cliente</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <h2>Editar Cliente</h2>
    <form action="update.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $client['id']; ?>">
        <label for="name">Nome:</label>
        <input type="text" name="name" value="<?php echo $client['name']; ?>" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $client['email']; ?>" required>
        <br>
        <label for="phone">Telefone:</label>
        <input type="text" name="phone" value="<?php echo $client['phone']; ?>" required>
        <br>
        <label for="photo">Foto:</label>
        <input type="file" name="photo">
        <br>
        <input type="submit" value="Atualizar">
    </form>
</body>
</html>
