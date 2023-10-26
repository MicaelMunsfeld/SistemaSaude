<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se o pacienteId e dados foram recebidos na requisição POST.
    if (isset($_POST['pacienteId'], $_POST['dados'])) {
        $pacienteId = $_POST['pacienteId'];
        $dados = $_POST['dados'];

        // Inicializa um array vazio para o histórico do paciente, se ainda não existir.
        if (!isset($_SESSION['historico'][$pacienteId])) {
            $_SESSION['historico'][$pacienteId] = [];
        }

        // Adiciona os novos dados ao histórico do paciente.
        $_SESSION['historico'][$pacienteId][] = $dados;

        // Limita o histórico a um número máximo de registros (opcional).
        $maxHistorico = 10;
        if (count($_SESSION['historico'][$pacienteId]) > $maxHistorico) {
            array_shift($_SESSION['historico'][$pacienteId]);
        }
    }
}
