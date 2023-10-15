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
	<title>Editar Paciente</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12 mt-5">
				<h1 class="text-center">Editar Paciente</h1>
				<hr style="height: 1px;color: black;background-color: black;">
			</div>
		</div>
		<div class="row">
			<div class="col-md-5 mx-auto">
				<?php
				$model = new ModelGerenciador();
				$id = $_REQUEST['Id'];
				$row = $model->fetch_single($id);
				
				if (isset($_POST['update'])) {
					if (isset($_POST['nome']) && isset($_POST['sexo']) && isset($_POST['idade']) && isset($_POST['cidade'])) {
						if (!empty($_POST['nome']) && !empty($_POST['sexo']) && !empty($_POST['idade']) && !empty($_POST['cidade'])) {
							$dado['Id'] = $id;
							$dado['nome'] = $_POST['nome'];
							$dado['sexo'] = $_POST['sexo'];
							$dado['idade'] = $_POST['idade'];
							$dado['cidade'] = $_POST['cidade'];
							$update = $model->update($dado);
							if($update){
								echo "<script>alert('Editado com sucesso!');</script>";
								echo "<script>window.location.href = 'index.php';</script>";
							}else{
								echo "<script>alert('Falha ao editar');</script>";
								echo "<script>window.location.href = 'index.php';</script>";
							}
						}else{
							echo "<script>alert('Preencha todos os campos');</script>";
							header("Location: edit.php?Id=$id");
						}
					}
				}
				?>
				<form action="" method="post">
					<div class="form-group">
						<label for="">Nome</label>
						<input type="text" name="nome" value="<?php echo $row['nome']; ?>" class="form-control">
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
						<input type="text" name="idade" value="<?php echo $row['idade']; ?>" class="form-control">
					</div>
					<div class="form-group">
						<label for="">Cidade</label>
						<input type="text" name="cidade" value="<?php echo $row['cidade']; ?>" class="form-control">
					</div>
					<div class="form-group">
						<button type="submit" name="update" class="btn btn-primary">Editar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>