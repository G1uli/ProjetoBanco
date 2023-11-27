<head>
    <meta charset="UTF-8">
    <title>Adicionar Tarefa</title>
    <style>
        body {
            font-style: Arial;
            display: ;
            justify-content: ;
            align-items: ;
            background-color: ;
        }

        .container {
            text-align: center;
            border: 1px, solid;
            border-radius: 5px;
            padding: 10px;
            padding-top: 15px;
        }

        form {
            font-size: 24px;
            border: 5px, solid blue;
            background: #454544;
            color: #98d47d;
        }

        input[type="submit"] {
            background-color: gray;
            margin: 10px;
            width: 10px;
            width: 100px;
        }
        

        h1 {
            width:250px;
            height:50px;
            margin:10;
            padding:0;
            background: #454544;
        }

        input[type="text"] {
            background-color: white;
        }

        select {
            margin: 5px;
        }

    </style>

<?php 
    include '../conexao.php';
?>
</head>


<body>
<div>
    <h1>Vendas realizadas</h1>
</div>

<form method="post" action="adicionar.php">
    Produto:     <input type="text" name="produto" required><br>
    Quantidade:  <input type="text" name="quantidade" required><br>
    valor:       <input type="text" name="valor" required><br>
    <!---dreslei@upf.br--->
    
    <label for="cliente_id">Cliente:</label>
    <select name="cliente_id" id="cliente_id">
        <option value="">Selecione um cliente</option><br>
            <?php 
                $sql_cliente = 
                    "SELECT id, nome
                        FROM cliente";

                $result_cliente = $conexao->query($sql_cliente);

                while($row = $result_cliente->fetch_assoc()) {
                    $cliente_id = $row['id'];
                    $cliente_nome = $row['nome'];
                    echo "<option value='$cliente_id'>$cliente_nome</option>";
                    
                }
            ?>        
        </select><br>

        <label for="funcionario_id">Funcionário:</label>
        <select name="funcionario_id" id="funcionario_id">
        <option value="">Selecione um funcionario</option><br>
            <?php 
                $sql_funcionario = 
                    "SELECT id, nome
                        FROM funcionario";

                $result_funcionario = $conexao->query($sql_funcionario);

                while($row = $result_funcionario->fetch_assoc()) {
                    $funcionario_id = $row['id'];
                    $funcionario_nome = $row['nome'];
                    echo "<option value='$funcionario_id'>$funcionario_nome</option>";
                    
                }
            ?>        
        </select><br>
        <input type="submit" name="submit" value="Submit" />
    </form>
</body>


<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $produto = $_POST['produto'];
        $quantidade = $_POST['quantidade'];
        $valor = $_POST['valor'];
        $cliente_id = $_POST['cliente_id'];
        $funcionario_id = $_POST['funcionario_id'];

        $sql_vendas =
        "INSERT INTO
            vendas (produto, quantidade, valor, cliente, funcionario)
        
        VALUES 
            ('$produto', '$quantidade', '$valor', '$cliente_id', '$funcionario_id')";

        if ($conexao->query($sql_vendas) === TRUE) {
            header("Location: listar.php");
        } else {
            echo "Erro: " . $conexao->error;
        }
    }
    $conexao->close();
?>