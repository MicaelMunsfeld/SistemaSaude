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
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }
        .alert {
            text-align: center;
        }
    </style>
</head>
<?php

include 'autoload.php';

if (isset($_REQUEST['Id'])) {
    $model = new ModelGerenciador();
    $id = $_REQUEST['Id'];
    $delete = $model->delete($id);
    if ($delete) {
        echo '<div class="alert alert-success" role="alert">Deletado com sucesso!</div>';
        header("Refresh: 2; URL=index.php");
    } else {
        echo '<div class="alert alert-danger" role="alert">Falha ao deletar</div>';
    }
} else {
    echo '<div class="alert alert-warning" role="alert">Preencha todos os campos</div>';
}

?>
</html>