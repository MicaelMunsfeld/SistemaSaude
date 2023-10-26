<?php
session_start();
if (!isset($_SESSION['historico'])) {
    $_SESSION['historico'] = [];
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/atualizaSinaisVitais.js"></script>
    <title>Sistema de Monitoramento de Pacientes para Unidade de Saúde</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Histórico de Sinais Vitais</h1>
        <hr class="my-4">
        <div class="row p-3" id="historico-container">
            <?php
            if (isset($_GET['selectedPatientId'])) {
                $selectedPatientId = $_GET['selectedPatientId'];
                if (isset($_SESSION['historico'][$selectedPatientId])) {
                    $historicoPaciente = $_SESSION['historico'][$selectedPatientId];
                }
            }
            ?>
        </div>
    </div>
</body>
</html>
