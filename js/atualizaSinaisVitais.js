// Função para atualizar os sinais vitais com AJAX.
function atualizaSinaisVitais() {
  $.ajax({
    url: 'atualizaSinaisVitais.php',
    dataType: 'json',
    success: function(data) {
      if (data) {
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
          setColorBasedOnStatus(pressaoArterialElemento, paciente.status.pressaoArterial);
          setColorBasedOnStatus(temperaturaElemento, paciente.status.temperatura);
          setColorBasedOnStatus(saturacaoOxigenioElemento, paciente.status.saturacaoOxigenio);

          const dataAtual = new Date();
          const dataFormatada = `${dataAtual.toLocaleDateString()} ${dataAtual.toLocaleTimeString()}`;
          const historicoRegistro = `
            <div class="col-md-3">
              <div id="historico-paciente-${pacienteId}">
                <h3>Paciente ID: ${pacienteId}</h3>
                <p>Data e Hora: ${dataFormatada}</p>
                <p>Frequência Cardíaca: ${paciente.frequenciaCardiaca} bpm</p>
                <p>Pressão Arterial: ${paciente.sistolicaBP}/${paciente.diastolicaBP} mmHg</p>
                <p>Temperatura: ${paciente.temperatura} °C</p>
                <p>Saturação de Oxigênio: ${paciente.saturacaoOxigenio}%</p>
              </div>
            </div>
          `;

          $('#historico-container').append(historicoRegistro);
        });
      }
    }
  });
}

// Função para definir a cor do Status com base no próprio.
function setColorBasedOnStatus(elemento, status) {
  if (status === 'Normal') {
    elemento.css('color', '#00f700'); // Verde para "Normal"
  } else {
    elemento.css('color', 'red'); // Vermelho para "Alterado"
  }
}

// Chama a função para atualizar os sinais vitais a cada 10 segundos
setInterval(atualizaSinaisVitais, 10000);
