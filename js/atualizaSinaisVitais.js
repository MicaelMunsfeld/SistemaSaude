/**
 * Função para atualizar os sinais vitais com AJAX.
 */ 
function atualizaSinaisVitais() {
  $.ajax({
    url: 'atualizaSinaisVitais.php',
    dataType: 'json',
    success: function(data) {
      if(data) {
        data.forEach(function(paciente) {
          const pacienteId = paciente.Id;
          const frequenciaCardiacaElemento = $('#frequencia-cardiaca-' + pacienteId);
          const pressaoArterialElemento = $('#pressao-arterial-' + pacienteId);
          const temperaturaElemento = $('#temperatura-' + pacienteId);
          const saturacaoOxigenioElemento = $('#saturacao-oxigenio-' + pacienteId);

          frequenciaCardiacaElemento.text(paciente.frequenciaCardiaca + ' bpm');
          pressaoArterialElemento.text(paciente.sistolicaBP + '/' + paciente.diastolicaBP + ' mmHg');
          temperaturaElemento.text(paciente.temperatura + ' °C');
          saturacaoOxigenioElemento.text(paciente.saturacaoOxigenio + '%');

          setColorBasedOnStatus(frequenciaCardiacaElemento, paciente.status.frequenciaCardiaca);
          setColorBasedOnStatus(pressaoArterialElemento   , paciente.status.pressaoArterial);
          setColorBasedOnStatus(temperaturaElemento       , paciente.status.temperatura);
          setColorBasedOnStatus(saturacaoOxigenioElemento , paciente.status.saturacaoOxigenio);
        });
      }
    }
  });
}

/**
 * Define a cor do Status de acordo com o própio. 
 */
function setColorBasedOnStatus(elemento, status) {
  if(status === 'Normal') {
    elemento.css('color', '#00f700'); // Verde para "Normal"
  } else {
    elemento.css('color', 'red'); // Vermelho para "Alterado"
  }
}

setInterval(atualizaSinaisVitais, 3500);