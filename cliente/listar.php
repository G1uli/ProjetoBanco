<?php  
    include '../conexao.php';

    $sql = "SELECT id, nome, telefone, endereco FROM cliente";
    $result = $conexao->query($sql);
?>
<head>
    <link rel="stylesheet" href="../../css/cliente.css">
    <meta charset="UTF-8">
    <title>Lista de clientes</title>
    <?php
    include '../base/footer.php'
    ?>
</head>
<h1>Gerenciamento</h1>
<a href="adicionar.php">Adicionar nova venda</a>
<table border="1">
    <thread> 
        <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Telefone</th>
        <th>Endereço</th>
        <th>Acões</th>
        </tr>
    </thread>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc() ) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["nome"] . "</td>";
                echo "<td>" . $row["telefone"] . "</td>";
                echo "<td>" . $row["endereco"] . "</td>";
                echo "<td><a href='editar.php?id=" . $row["id"] . "'>Editar</a> | <a href='deletar.php?id=" . $row["id"] . "'>Deletar</a></td>";
                echo "</tr>";
            }
        }   else {
            echo "<tr> <td colspan='5'>Sem tarefas</td></tr>";
        }
        ?>
    </tbody>
</table>

<?php 
$conexao->close();
?>
