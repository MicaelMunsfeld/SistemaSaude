src="https://code.jquery.com/jquery-3.6.0.min.js";

$(document).ready(function() {
    // Intercepta o envio do formulário de adição de paciente
    $("#formAdicaoPaciente").submit(function(event) {
        event.preventDefault(); // Evita o envio padrão do formulário

        // Realiza uma requisição AJAX para inserir os sinais vitais
        $.ajax({
            type: "POST",
            url: "inserir_sinais_vitais.php", // Substitua pelo caminho correto para o seu arquivo PHP
            data: {
                nome: $("#nome").val(), // Exemplo: obtém o valor do campo "nome"
                sexo: $("#sexo").val(), // Exemplo: obtém o valor do campo "sexo"
                idade: $("#idade").val(), // Exemplo: obtém o valor do campo "idade"
                cidade: $("#cidade").val() // Exemplo: obtém o valor do campo "cidade"
            },
            success: function(response) {
                // Processa a resposta (pode ser uma mensagem de sucesso)
                alert("Paciente adicionado com sucesso!");

                // Limpa os campos do formulário após a adição
                $("#nome").val("");
                $("#sexo").val("");
                $("#idade").val("");
                $("#cidade").val();
            },
            error: function(error) {
                alert("Erro ao adicionar paciente.");
            }
        });
    });
});