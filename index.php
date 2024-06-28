<?php
include 'config/database.php';

$sql = "SELECT * FROM clients";
$testeconexao = $mysqli->query($sql);

if (!$testeconexao) {
    echo "falha ao conectar:(" . $mysqli->connect_errno . ")" . $mysqli->connect_errno;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Clientes</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="container">
        <h2>Lista de Clientes</h2>
        <a class="botao" href="create.php">Cadastrar Novo Cliente</a>
        <table>
            <tr>
                <th>Foto</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Ações</th>
            </tr>
            <?php while($row = testeconexao->fetch_assoc()): ?>
            <tr>
                <td><img src="<?php echo $row['photo']; ?>" alt="<?php echo $row['name']; ?>" width="50"></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td>
                    <a class="botao" href="edit.php?id=<?php echo $row['id']; ?>">Editar</a>
                    <a class="botao" href="delete.php?id=<?php echo $row['id']; ?>" onclick = "return confirm ('Tem certeza que deseja excluir os dados?')">Excluir</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>

<?php $mysqli->close(); ?>
