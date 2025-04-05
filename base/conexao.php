<?php
// Configurações do banco de dados
$host = 'localhost';    // endereço do servidor MySQL
$dbname = 'formulario_php';    // nome do banco de dados
$username = 'root';     // usuário do MySQL
$password = '';         // senha do MySQL

try {
    // Conectar ao banco de dados
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro de conexão: " . $e->getMessage();
    exit;
}

// Consultar os dados da tabela no banco de dados
$sql = "SELECT * FROM funcionarios";  // Alterar "funcionarios" pelo nome da sua tabela
$stmt = $pdo->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela de Funcionários</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Tabela de Funcionários</h1>

    <!-- Criar tabela para exibir os dados do banco -->
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Matrícula</th>
                <th>Sexo</th>
                <th>Salário</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Verificar se existem registros na tabela
            if ($stmt->rowCount() > 0) {
                // Exibir cada registro da tabela
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['nome']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['matricula']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['sexo']) . "</td>";
                    echo "<td>R$ " . number_format($row['salario'], 2, ',', '.') . "</td>";
                    echo "</tr>";
                }
            } else {
                // Se não houver resultados
                echo "<tr><td colspan='4'>Nenhum funcionário cadastrado.</td></tr>";
            }
            ?>
        </tbody>
    </table>

</body>
</html>