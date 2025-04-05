<?php
    // Aqui você define a URL para o redirecionamento em PHP
    $redirectURL = "conexao.php";  // Substitua com a URL para o seu arquivo PHP
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/avaliacao/static/estilos.css?v=1.1">
    <title>Cadastro de Funcionários</title>
    <script>
        function redirecionar() {
            // Redireciona para o arquivo PHP com JavaScript
            window.location.href = "<?php echo $redirectURL; ?>";
        }
    </script>

</head>
<body>
    <div>
    <button onclick="redirecionar()">Ir para outro arquivo</button>


        <div class="container">
          <h1>Cadastro de Funcionários</h1>
          <form action="processa.php" method="POST">
            <label for="nome">Nome:</label>
            <input type="text" name="nome[]" required><br><br>

            <label for="matricula">Matrícula:</label>
            <input type="text" name="matricula[]" required><br><br>

            <label for="sexo">Sexo:</label>
            <select name="sexo[]" required>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
            </select><br><br>

            <label for="salario">Salário:</label>
            <input type="number" name="salario[]" step="0.01" required><br><br>

            <input type="submit" value="Enviar">
            

            
           </form>
         </div>


    </div>
    

    
</body>
</html>
 