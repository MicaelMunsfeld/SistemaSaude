<?php

include 'autoload.php';

/**
 * Busca os sinais vitais do paciente(gerados de forma aleatória a partir do padrão pré-estabelecido).
 * 
 * @return array()
 */
function getSinaisVitais() {
    $frequenciaCardiaca = rand(40, 100); // Frequência cardíaca (bpm)
    $sistolicaBP        = rand(60, 150); // Pressão arterial sistólica (mmHg)
    $diastolicaBP       = rand(30, 100); // Pressão arterial diastólica (mmHg)
    $temperatura        = rand(35, 40); // Temperatura corporal (°C)
    $saturacaoOxigenio  = rand(90, 100); // Saturação de oxigênio (%)
    return [
    	'frequenciaCardiaca' => $frequenciaCardiaca,
    	'sistolicaBP'        => $sistolicaBP,
    	'diastolicaBP'       => $diastolicaBP,
    	'temperatura'        => $temperatura,
    	'saturacaoOxigenio'  => $saturacaoOxigenio
    ];
}

/**
 * Busca os sinais vitais de todos os pacientes a partir dos dados já existentes do paciente.
 * 
 * @return array()
 */
function getSinaisVitaisParaTodosPacientes() {
	$model = new ModelGerenciador();
	$pacientes = $model->fetch();
	$sinaisVitaisPacientes = [];
	foreach ($pacientes as $paciente) {
		$sinaisVitaisPaciente    = getSinaisVitais();
		$sinaisVitaisPacientes[] = [
			'Id' => $paciente['Id'],
			'frequenciaCardiaca' => $sinaisVitaisPaciente['frequenciaCardiaca'],
			'sistolicaBP'        => $sinaisVitaisPaciente['sistolicaBP'],
			'diastolicaBP'       => $sinaisVitaisPaciente['diastolicaBP'],
			'temperatura'        => $sinaisVitaisPaciente['temperatura'],
			'saturacaoOxigenio' => $sinaisVitaisPaciente['saturacaoOxigenio'],
		];
	}
	return $sinaisVitaisPacientes;
}

/**
 * Função para determinar o status de cada sinal vital.
 * 
 * @return string
 */
function determinarStatus($frequenciaCardiaca, $sistolicaBP, $diastolicaBP, $temperatura, $saturacaoOxigenio) {
	$status = [];
	if ($frequenciaCardiaca >= 60 && $frequenciaCardiaca <= 100) {
		$status['frequenciaCardiaca'] = 'Normal';
	} else {
		$status['frequenciaCardiaca'] = 'Alterado';
	}
	if ($sistolicaBP >= 90 && $sistolicaBP <= 120 && $diastolicaBP >= 60 && $diastolicaBP <= 80) {
		$status['pressaoArterial'] = 'Normal';
	} else {
		$status['pressaoArterial'] = 'Alterado';
	}
	if ($temperatura >= 36 && $temperatura <= 37.5) {
		$status['temperatura'] = 'Normal';
	} else {
		$status['temperatura'] = 'Alterado';
	}
	if ($saturacaoOxigenio >= 95 && $saturacaoOxigenio <= 100) {
		$status['saturacaoOxigenio'] = 'Normal';
	} else {
		$status['saturacaoOxigenio'] = 'Alterado';
	}
	return $status;
}

?>