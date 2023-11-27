<?php
include '../conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];

    $sql_cliente = "UPDATE cliente SET nome='$nome', endereco='$endereco', telefone='$telefone' WHERE id=$id";
    var_dump($sql_cliente);
    if ($conexao->query($sql_cliente) === TRUE) {
        header("Location: listar.php");
    } else {
        echo "Erro ao atualizar: " . $conexao->error;
    }
} else {
    $id = $_GET['id'];
    $sql = "SELECT id, nome, endereco, telefone FROM cliente WHERE id=$id";
    $result = $conexao->query($sql);
    if ($result->num_rows > 0) {
        $gerenciar = $result->fetch_assoc();
    } else {
        echo "Tarefa não encontrada!";
        exit;
    }
}

$conexao->close();
?>
<head> 
<?php
    include '../base/header.php'
?>
</head>
<form method="post" action="editar.php">
    <input type="hidden" name="id" value="<?php echo $gerenciar['id']; ?>">
    Nome: <input type="text" name="nome" value="<?php echo $gerenciar['nome']; ?>">
    Endereco: <input type="text" name="endereco" value="<?php echo $gerenciar['endereco']; ?>">
    Telefone: <input type="text" name="telefone" value="<?php echo $gerenciar['telefone']; ?>">
    <input type="submit" value="Salvar">
</form>
