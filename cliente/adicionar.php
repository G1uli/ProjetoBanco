
<head>
    <meta charset="UTF-8">
    <title>Adicionar cliente</title>
    <?php
    include '../base/header.php'
    ?>
</head>

<body>
<div>
    <h1>Clientes recentes</h1>
<div>
<form method="post" action="adicionar.php">
    Nome    <input type="text" name="nome" required><br>
    Telefone<input type="text" name="telefone" required><br>
    Endereço    <input type="text" name="endereco" required><br>
    <input type="submit" value="Adicionar">
</form>
</body>

<?php
    include '../conexao.php';



    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $endereco = $_POST['endereco'];

        $sql_cliente =
        "INSERT INTO
            cliente (nome,telefone, endereco)
        
        VALUES 
            ('$nome', '$telefone', '$endereco')";


    if ($conexao->query($sql_cliente) == TRUE) {
        header("Location: listar.php");
    } else {
        echo "Erro: " . $conexao->error;
    }



    }
    $conexao->close();
?>
