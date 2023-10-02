<?php
include 'autoload.php';

// Função para inserir dados de sinais vitais aleatórios
function inserirDadosSinaisVitais($idPaciente) {
    $model = new ModelGerenciador();

    // Gerar valores aleatórios para sinais vitais
    $frequenciaCardiaca = rand(60, 100); // Valores de exemplo
    $temperatura = rand(3600, 3800) / 100; // Valores de exemplo (2 casas decimais)
    $saturacaoOxigenio = rand(90, 100); // Valores de exemplo

    $dataHoraLeitura = date("Y-m-d H:i:s"); // Data e hora atual

    // Inserir os dados na tabela
    $query = "INSERT INTO tbsinaisvitais (idPaciente, frequenciaCardiaca, temperatura, saturacaoOxigenio, dataHoraLeitura) VALUES ('$idPaciente', '$frequenciaCardiaca', '$temperatura', '$saturacaoOxigenio', '$dataHoraLeitura')";

    if ($model->conn->query($query)) {
        echo "Dados inseridos com sucesso!";
    } else {
        echo "Erro ao inserir dados: " . $model->conn->error;
    }
}

// Simulação de leitura a cada 20 segundos para todos os pacientes
while (true) {
    // Simulação de leitura a cada 20 segundos
    foreach ($pacientes as $paciente) {
        $idPaciente = $paciente['Id']; // Obtém o ID do paciente
        inserirDadosSinaisVitais($idPaciente); // Insere dados de sinais vitais para o paciente
    }
    sleep(20); // Espera por 20 segundos antes da próxima leitura
}

?>