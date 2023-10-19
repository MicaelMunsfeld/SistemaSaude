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
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <h1 class="text-center">Inserir Paciente</h1>
                <hr class="my-4">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-5">
                <?php
                $model = new ModelGerenciador();
                $insert = $model->insert();
                ?>
                <div class="card">
                    <div class="card-header bg-info text-white">
                        Informações do Paciente
                     </div>
                    <div class="card-body">
	                <form action="" method="POST">
	                    <div class="form-group">
	                        <label for="nome">Nome</label>
	                        <input type="text" name="nome" class="form-control" required>
	                    </div>
	                    <div class="form-group">
	                        <label for="sexo">Sexo</label>
	                        <select name="sexo" class="form-control" required>
	                            <option value="M">Masculino</option>
	                            <option value="F">Feminino</option>
	                        </select>
	                    </div>
	                    <div class="form-group">
	                        <label for="idade">Idade</label>
	                        <input type="number" name="idade" class="form-control" required>
	                    </div>
	                    <div class="form-group">
	                        <label for="cidade">Cidade</label>
	                        <input type="text" name="cidade" class="form-control" required>
	                    </div>
	                    <div class="form-group">
	                        <button type="submit" name="submit" class="btn btn-primary">Cadastrar</button>
	                    </div>
	                </form>
	            </div>
            </div>
        </div>
    </div>
</body>
</html>