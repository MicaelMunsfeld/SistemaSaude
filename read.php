<?php include 'autoload.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Sistema de Monitoramento de Pacientes para Unidade de Saúde</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Detalhes do Paciente</h1>
        <hr class="my-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php
                $model = new ModelGerenciador();
                $id = $_REQUEST['Id'];
                $row = $model->fetch_single($id);
                if (!empty($row)) {
                    ?>
                    <div class="card">
                        <div class="card-header bg-info text-white">
                            Informações do Paciente
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Nome: <?php echo $row['nome']; ?></h5>
                            <p class="card-text">Sexo: <?php echo ($row['sexo'] == 'M') ? "Masculino</p>" : "Feminino"?>
                            <p class="card-text">Idade: <?php echo $row['idade']; ?></p>
                            <p class="card-text">Cidade: <?php echo $row['cidade']; ?></p>
                        </div>
                    </div>
                    <?php
                } else {
                    echo "<p class='mt-4'>Paciente não encontrado!</p>";
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>