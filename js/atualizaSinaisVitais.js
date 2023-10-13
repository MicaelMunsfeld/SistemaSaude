// Função para atualizar os sinais vitais com AJAX.
function atualizaSinaisVitais() {
	$.ajax({
		url     : 'atualizaSinaisVitais.php',
		dataType: 'json',
		success: function(data) {
			if (data) {
				data.forEach(function(paciente) {
					const pacienteId = paciente.Id;
					$('#frequencia-cardiaca-' + pacienteId).text(paciente.frequenciaCardiaca + ' bpm');
					$('#pressao-arterial-'    + pacienteId).text(paciente.sistolicaBP        + '/' + paciente.diastolicaBP + ' mmHg');
					$('#temperatura-'         + pacienteId).text(paciente.temperatura        + ' °C');
					$('#saturacao-oxigenio-'  + pacienteId).text(paciente.saturacaoOxigenio  + '%');

					if (paciente.status.frequenciaCardiaca === 'Normal') {
						$('#frequencia-cardiaca-' + pacienteId).css('color', '#00f700');
					} else {
						$('#frequencia-cardiaca-' + pacienteId).css('color', 'red');
					}

					if (paciente.status.pressaoArterial === 'Normal') {
						$('#pressao-arterial-' + pacienteId).css('color', '#00f700');
					} else {
						$('#pressao-arterial-' + pacienteId).css('color', 'red');
					}

					if (paciente.status.temperatura === 'Normal') {
						$('#temperatura-' + pacienteId).css('color', '#00f700');
					} else {
						$('#temperatura-' + pacienteId).css('color', 'red');
					}

					if (paciente.status.saturacaoOxigenio === 'Normal') {
						$('#saturacao-oxigenio-' + pacienteId).css('color', '#00f700');
					} else {
						$('#saturacao-oxigenio-' + pacienteId).css('color', 'red');
					}
				});
			}
		}
	});
}
setInterval(atualizaSinaisVitais, 8000);