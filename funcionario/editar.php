<?php
include '../conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $dias = $_POST['dias'];

    $sql = "UPDATE funcionario SET nome='$nome', email='$email', telefone='$telefone', dias='$dias'
    WHERE id=$id";
    
    if ($conexao->query($sql) === TRUE) {
        header("Location: listar.php");
    } else {
        echo "Erro ao atualizar: " . $conexao->error;
    }
} else {
    $id = $_GET['id'];
    $sql = "SELECT id, nome, email, telefone, dias FROM funcionario WHERE id=$id";
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

<!DOCTYPE html>
<html lang="en">
<head>
<?php
    include '../base/header.php'
?>
</head>


<body>
<form method="post" action="editar.php">
    <input type="hidden" name="id" value="<?php echo $gerenciar['id']; ?>">
    Nome: <input type="text" name="nome" value="<?php echo $gerenciar['nome']; ?>">
    Email: <input type="text" name="email" value="<?php echo $gerenciar['email']; ?>">
    Telefone: <input type="text" name="telefone" value="<?php echo $gerenciar['telefone']; ?>">
    Dias: <input type="text" name="dias" value="<?php echo $gerenciar['dias']; ?>">
    <input type="submit" value="Salvar">
</form>
</body>