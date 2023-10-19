<?php
include 'autoload.php';
include 'monitoramento.php';
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
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <h1 class="text-center">Sistema de Monitoramento de Pacientes para Unidade de Saúde</h1>
                <hr class="my-4">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a href="add.php" class="btn badge-success">Adicionar</a>
                <table class="table table-hover mt-3">
                    <thead>
                        <tr class="bg-custom text-white">
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Sexo</th>
                            <th>Idade</th>
                            <th>Cidade</th>
                            <th>Ações</th>
                            <th>Sinais Vitais
                                <div class="ml-2 legendaStatus verdePadrao" title="Indica que o Sinal Vital está dentro da faixa padrão"></div>
                                <div class="legendaStatus vermelho" title="Indica que o Sinal Vital está fora da faixa padrão"></div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $model = new ModelGerenciador();
                        $sinaisVitaisPacientes = getSinaisVitaisParaTodosPacientes();
                        $i = 1;
                        if (!empty($sinaisVitaisPacientes)) {
                            foreach ($sinaisVitaisPacientes as $paciente) {
                                ?>
                                <tr id="patient-<?php echo $paciente['Id']; ?>">
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $model->fetch_single($paciente['Id'])['nome']; ?></td>
                                    <td><?php echo $model->fetch_single($paciente['Id'])['sexo']; ?></td>
                                    <td><?php echo $model->fetch_single($paciente['Id'])['idade']; ?></td>
                                    <td><?php echo $model->fetch_single($paciente['Id'])['cidade']; ?></td>
                                    <td>
                                        <a href="read.php?Id=<?php echo $paciente['Id']; ?>" class="badge badge-info">
                                            <i class="fas fa-eye"></i> Visualizar
                                        </a>
                                        <a href="delete.php?Id=<?php echo $paciente['Id']; ?>" class="badge badge-danger">
                                            <i class="fas fa-trash"></i> Excluir
                                        </a>
                                        <a href="edit.php?Id=<?php echo $paciente['Id']; ?>" class="badge badge-warning	">
                                            <i class="fas fa-edit"></i> Alterar
                                        </a>
                                    </td>
                                    <td>
                                        <strong>Frequência Cardíaca:</strong>
                                        <span id="frequencia-cardiaca-<?php echo $paciente['Id']; ?>">
                                            <?php echo $paciente['frequenciaCardiaca']; ?> bpm
                                        </span>
                                        <br>
                                        <strong>Pressão Arterial:</strong>
                                        <span id="pressao-arterial-<?php echo $paciente['Id']; ?>">
                                            <?php echo $paciente['sistolicaBP']; ?>/<?php echo $paciente['diastolicaBP']; ?> mmHg
                                        </span>
                                        <br>
                                        <strong>Temperatura:</strong>
                                        <span id="temperatura-<?php echo $paciente['Id']; ?>">
                                            <?php echo $paciente['temperatura']; ?> °C
                                        </span>
                                        <br>
                                        <strong>Saturação de Oxigênio:</strong>
                                        <span id="saturacao-oxigenio-<?php echo $paciente['Id']; ?>">
                                            <?php echo $paciente['saturacaoOxigenio']; ?>%
                                        </span>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            echo "<tr><td colspan='7'>Não há registros</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>    
</html>