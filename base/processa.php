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


}
?>
