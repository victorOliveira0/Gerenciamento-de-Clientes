<!DOCTYPE html>
<html>
<head>
    <title>Cadastrar Novo Cliente</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <h2>Cadastrar Novo Cliente</h2>
    <form action="store.php" method="post" enctype="multipart/form-data">
        <label for="name">Nome:</label>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="phone">Telefone:</label>
        <input type="text" id="phone" name="phone" required><br><br>
        
        <label for="photo">Foto:</label>
        <input type="file" id="photo" name="photo"><br><br>
        
        <input type="submit" value="Enviar" class="botao">
    </form>
</body>
</html>