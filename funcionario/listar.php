<?php  
include '../conexao.php';

$sql = "SELECT id, nome, email, telefone, dias FROM funcionario";
$result = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <link rel="stylesheet" >
    <meta charset="UTF-8">
    <title>Lista de funcionários</title>
    <?php
    include '../base/footer.php'
    ?>
</head>
<body>
    <div>
<h1>Gerenciamento</h1>
    </div>
<a href="adicionar.php" id="tabela">Adicionar novo funcionário</a>
<table border="1">
    <thread id="tabela"> 
        <tr id="tab">
            <th id="ID">ID</th>
            <th id="nome">Nome</th>
            <th id="email">email</th>
            <th id="tele">Telefone</th>
            <th id="trab">Dias de trabalho</th>
        </tr>
    </thread>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["nome"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["telefone"] . "</td>";
                echo "<td>" . $row["dias"] . "</td>";
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
