<?php  
include '../conexao.php';

$sql = "SELECT 
        id,
        produto, 
        quantidade, 
        valor, 
        cliente,
        funcionario from vendas";
$result = $conexao->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <link rel="stylesheet" >
    <meta charset="UTF-8">
    <title>Lista de Tarefas</title>
    <?php
    include '../base/footer.php'
    ?>
</head>
<body>
    <div>
<h1>Gerenciamento</h1>
    </div>
<a href="adicionar.php" id="tabela">Adicionar nova venda</a>
<table border="1">
    <thread id="tabela"> 
        <tr id="tab">
            <th id="id">Id</th>
            <th id="produto">Produto</th>
            <th id="quantidade">Quantidade</th>
            <th id="valor">valor</th>
            <th id="cliente">Cliente</th>
            <th id="funcionario">Funcionario</th>
        </tr>
    </thread>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["produto"] . "</td>";
                echo "<td>" . $row["quantidade"] . "</td>";
                echo "<td>" . $row["valor"] . "</td>";
                echo "<td>" . $row["cliente"] . "</td>";
                echo "<td>" . $row["funcionario"] . "</td>";
                echo "<td><a href='editar.php?id=" . $row["id"] . "'>Editar</a> | <a href='deletar.php?id=" . $row["id"] . "'>Deletar</a></td>";
                echo "</tr>";
            }
        }   else {
            echo "<tr> <td colspan='5'>Sem tarefas</td></tr>";
        }
        ?>
    </tbody>
</table>
</body>
<?php 
$conexao->close();
?>