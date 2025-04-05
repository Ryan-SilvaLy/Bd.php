<?php
// Incluir o arquivo de conexão
include('conexao.php');

// Processando os dados, e mostrando os resultados após o processamento
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recuperar os dados do formulário
    $nomes = $_POST['nome'];
    $matriculas = $_POST['matricula'];
    $sexos = $_POST['sexo'];
    $salarios = $_POST['salario'];

    // Inicializando variáveis para os cálculos
    $somaSalariosHomens = 0;
    $somaSalariosMulheres = 0;
    $totalSalariosMulheres = 0;
    $totalSalariosHomens = 0;
    $primeiraMatricula = null;
    $ultimaMatricula = null;

    // Preparando a inserção no banco
    $sql = "INSERT INTO funcionarios (nome, matricula, sexo, salario) VALUES (:nome, :matricula, :sexo, :salario)";
    $stmt = $pdo->prepare($sql);

    // Loop de 50 vezes (ou até o total de entradas disponíveis)
    for ($i = 0; $i < count($nomes); $i++) {
        // A primeira e última matrícula
        if ($i == 0) {
            $primeiraMatricula = $matriculas[$i];
        }
        $ultimaMatricula = $matriculas[$i];

        // Somando salários de homens e mulheres
        if ($sexos[$i] == 'Masculino') {
            $somaSalariosHomens += $salarios[$i];
            $totalSalariosHomens++;
        } elseif ($sexos[$i] == 'Feminino') {
            $somaSalariosMulheres += $salarios[$i];
            $totalSalariosMulheres++;
        }

        // Inserir dados no banco
        $stmt->bindParam(':nome', $nomes[$i]);
        $stmt->bindParam(':matricula', $matriculas[$i]);
        $stmt->bindParam(':sexo', $sexos[$i]);
        $stmt->bindParam(':salario', $salarios[$i]);

        // Executar a inserção
        $stmt->execute();
    }

    // Calculando a média salarial das mulheres
    $mediaSalarialMulheres = $totalSalariosMulheres > 0 ? $somaSalariosMulheres / $totalSalariosMulheres : 0;

    // Exibindo os resultados em uma tabela
    // echo "<div class='resultado'>
    //         <h2>Resultados</h2>
    //         <table border='1' cellpadding='5' cellspacing='0' style='border-collapse: collapse;'>
    //             <thead>
    //                 <tr>
    //                     <th>Descrição</th>
    //                     <th>Valor</th>
    //                 </tr>
    //             </thead>
    //             <tbody>
    //                 <tr>
    //                     <td>Média salarial das mulheres</td>
    //                     <td>R$ " . number_format($mediaSalarialMulheres, 2, ',', '.') . "</td>
    //                 </tr>
    //                 <tr>
    //                     <td>Soma dos salários dos homens</td>
    //                     <td>R$ " . number_format($somaSalariosHomens, 2, ',', '.') . "</td>
    //                 </tr>
    //                 <tr>
    //                     <td>Primeira matrícula recebida</td>
    //                     <td>" . $primeiraMatricula . "</td>
    //                 </tr>
    //                 <tr>
    //                     <td>Última matrícula recebida</td>
    //                     <td>" . $ultimaMatricula . "</td>
    //                 </tr>
    //             </tbody>
    //         </table>
    //       </div>";

    // // Exibir os funcionários cadastrados
    // echo "<h3>Funcionários Cadastrados:</h3>";
    // echo "<table border='1' cellpadding='5' cellspacing='0' style='border-collapse: collapse;'>
    //         <thead>
    //             <tr>
    //                 <th>Nome</th>
    //                 <th>Matrícula</th>
    //                 <th>Sexo</th>
    //                 <th>Salário</th>
    //             </tr>
    //         </thead>
    //         <tbody>";

    // $sqlConsulta = "SELECT nome, matricula, sexo, salario FROM funcionarios";
    // $consulta = $pdo->query($sqlConsulta);
    // while ($funcionario = $consulta->fetch()) {
    //     echo "<tr>
    //             <td>" . htmlspecialchars($funcionario['nome']) . "</td>
    //             <td>" . htmlspecialchars($funcionario['matricula']) . "</td>
    //             <td>" . htmlspecialchars($funcionario['sexo']) . "</td>
    //             <td>R$ " . number_format($funcionario['salario'], 2, ',', '.') . "</td>
    //           </tr>";
    // }

    // echo "</tbody>
    //     </table>";
}
?>
