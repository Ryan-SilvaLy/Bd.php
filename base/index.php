<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Funcionários</title>

</head>
<body>
    <div class="container">
        <h1>Cadastro de Funcionários</h1>
        <form action="processa.php" method="POST">
            <label for="nome">Nome:</label>
            <input type="text" name="nome[]" required><br><br>

            <label for="matricula">Matrícula:</label>
            <input type="text" name="matricula[]" required><br><br>

            <label for="sexo">Sexo:</label>
            <select name="sexo[]" required>
                <option value="M">Masculino</option>
                <option value="F">Feminino</option>
            </select><br><br>

            <label for="salario">Salário:</label>
            <input type="number" name="salario[]" step="0.01" required><br><br>

            <input type="submit" value="Enviar">
        </form>
    </div>

    
</body>
</html>
