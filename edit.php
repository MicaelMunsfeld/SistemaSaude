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
                <h1 class="text-center">Editar Paciente</h1>
                <hr class="my-4">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
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
                            if ($update) {
                                echo '<div class="alert alert-success" role="alert">Editado com sucesso!</div>';
                                header("Refresh: 2; URL=index.php");
                            } else {
                                echo '<div class="alert alert-danger" role="alert">Falha ao editar</div>';
                            }
                        } else {
                            echo '<div class="alert alert-warning" role="alert">Preencha todos os campos</div>';
                        }
                    }
                }
                ?>
                <div class="card">
                    <div class="card-header bg-info text-white">
                        Informações do Paciente
                     </div>
                    <div class="card-body">
		                <form action="" method="post">
		                    <div class="form-group">
		                        <label for="nome">Nome</label>
		                        <input type="text" name="nome" value="<?php echo $row['nome']; ?>" class="form-control" required>
		                    </div>
		                    <div class="form-group">
		                        <label for="sexo">Sexo</label>
		                        <select name="sexo" class="form-control" required>
		                            <option value="M" <?php if ($row['sexo'] == 'M') echo 'selected'; ?>>Masculino</option>
		                            <option value="F" <?php if ($row['sexo'] == 'F') echo 'selected'; ?>>Feminino</option>
		                        </select>
		                    </div>
		                    <div class="form-group">
		                        <label for="idade">Idade</label>
		                        <input type="number" name="idade" value="<?php echo $row['idade']; ?>" class="form-control" required>
		                    </div>
		                    <div class="form-group">
		                        <label for="cidade">Cidade</label>
		                        <input type="text" name="cidade" value="<?php echo $row['cidade']; ?>" class="form-control" required>
		                    </div>
		                    <div class="form-group">
		                        <button type="submit" name="update" class="btn btn-primary">Editar</button>
		                    </div>
		                </form>
		            </div>    
	            </div>
            </div>
        </div>
    </div>
</body>
</html>