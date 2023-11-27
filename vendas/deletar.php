<?php
include '../conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" ) {
    $id = $_GET["id"];

    $sql = "DELETE FROM vendas WHERE  id=$id";
    if ($conexao->query($sql) === TRUE) {
        header("Location: listar.php");
    } else {
        echo "ERRO ao deletar: " . $conexao->error;
    }

}

$conexao->close();
?>