<head>
    <meta charset="UTF-8">
    <title>Adicionar Tarefa</title>
    <?php
    include '../base/header.php'
    ?>
</head>
<body>
    <div>
    <h1>Funcionários</h1>
    <div>
    <div class="container">
<form method="post" action="adicionar.php">
    Nome     <input type="text" name="nome" required><br>
    Email    <input type="text" name="email" required><br>
    Telefone <input type="text" name="telefone" required><br>
    Dia     <input type="text" name="dias" required><br>
    <input type="submit" value="Adicionar">
    </div>
</form>
</body>

<?php
    include '../conexao.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $dias = $_POST['dias'];

        $sql_funcionario =
        "INSERT INTO
            funcionario (nome, email, telefone, dias)
        
        VALUES 
            ('$nome', '$email', '$telefone', '$dias')";


    if ($conexao->query($sql_funcionario) == TRUE) {
        header("Location: listar.php");
    } else {
        echo "Erro: " . $conexao->error;
    }



    }
    $conexao->close();
?>