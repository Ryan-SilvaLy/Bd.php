<!-- Aqui você exibirá os resultados após o processamento no PHP -->
<?php
    // Processando os dados, e mostrando os resultados apenas depois de completar o loop de 50 vezes.

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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

        // Loop de 50 vezes (ou até o total de entradas disponíveis)
        for ($i = 0; $i < count($nomes); $i++) {
            // A primeira e última matrícula
            if ($i == 0) {
                $primeiraMatricula = $matriculas[$i];
            }
            $ultimaMatricula = $matriculas[$i];

            // Somando salários de homens e mulheres
            if ($sexos[$i] == 'M') {
                $somaSalariosHomens += $salarios[$i];
                $totalSalariosHomens++;
            } elseif ($sexos[$i] == 'F') {
                $somaSalariosMulheres += $salarios[$i];
                $totalSalariosMulheres++;
            }
        }

        // Calculando a média salarial das mulheres
        $mediaSalarialMulheres = $totalSalariosMulheres > 0 ? $somaSalariosMulheres / $totalSalariosMulheres : 0;

        // Exibindo os resultados após o processamento do loop
        echo "<div class='resultado'>
                <h2>Resultados</h2>
                <p>Média salarial das mulheres: <span class='valor'>R$ " . number_format($mediaSalarialMulheres, 2, ',', '.') . "</span></p>
                <p>Soma dos salários dos homens: <span class='valor'>R$ " . number_format($somaSalariosHomens, 2, ',', '.') . "</span></p>
                <p>Primeira matrícula recebida: <span class='valor'>" . $primeiraMatricula . "</span></p>
                <p>Última matrícula recebida: <span class='valor'>" . $ultimaMatricula . "</span></p>
              </div>";
    }
    ?>