<?php
include '../conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $produto = $_POST['produto'];
    $quantidade = $_POST['quantidade'];
    $valor = $_POST['valor'];

    $sql = "UPDATE vendas SET produto='$produto', quantidade='$quantidade', valor='$valor'
    WHERE id=$id";
    
    if ($conexao->query($sql) === TRUE) {
        header("Location: listar.php");
    } else {
        echo "Erro ao atualizar: " . $conexao->error;
    }
} else {
    $id = $_GET['id'];
    $sql = "SELECT id, produto, quantidade, valor FROM vendas WHERE id=$id";
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
    Produto: <input type="text" name="produto" value="<?php echo $gerenciar['produto']; ?>">
    Quantidade: <input type="text" name="quantidade" value="<?php echo $gerenciar['quantidade']; ?>">
    Valor: <input type="text" name="valor" value="<?php echo $gerenciar['valor']; ?>">
    <input type="submit" value="Salvar">
</form>
