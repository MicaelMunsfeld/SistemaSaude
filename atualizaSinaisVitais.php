<?php

include 'monitoramento.php';

$sinaisVitaisPacientes = getSinaisVitaisParaTodosPacientes();
$data = [];

foreach ($sinaisVitaisPacientes as &$paciente) {
	$status = determinarStatus($paciente['frequenciaCardiaca'], $paciente['sistolicaBP'], $paciente['diastolicaBP'], $paciente['temperatura'], $paciente['saturacaoOxigenio']);
	$paciente['status'] = $status;
	$data[] = $paciente;
}

// Envia os dados como resposta JSON.
header('Content-Type: application/json');
echo json_encode($sinaisVitaisPacientes);

?>