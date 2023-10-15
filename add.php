<?php
include 'autoload.php';
?>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="js/ajaxMonitoramentoPaciente.js"></script>
	<title>Sistema de Monitoramento de Pacientes para Unidade de Saúde</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12 mt-5">
				<h1 class="text-center">Inserir Paciente</h1>
				<hr style="height: 1px;color: black;background-color: black;">
			</div>
		</div>
		<div class="row">
			<div class="col-md-5 mx-auto">
				<?php
				$model = new ModelGerenciador();
				$insert = $model->insert();
				?>
				<form action="" method="POST">
					<div class="form-group">
						<label for="">Nome</label>
						<input type="text" name="nome" class="form-control">
					</div>
					<div class="form-group">
					    <label for="">Sexo</label>
					    <select name="sexo" class="form-control">
					        <option value="M">Masculino</option>
					        <option value="F">Feminino</option>
					    </select>
					</div>
					<div class="form-group">
						<label for="">Idade</label>
						<input type="text" name="idade" class="form-control">
					</div>
					<div class="form-group">
						<label for="">Cidade</label>
						<input type="text" name="cidade" class="form-control">
					</div>
					<div class="form-group">
						<button type="submit" name="submit" class="btn btn-primary">Cadastrar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>