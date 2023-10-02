<?php

include 'autoload.php';

if (isset($_REQUEST['Id'])) {
    $model = new ModelGerenciador();
    $id = $_REQUEST['Id'];
    $delete = $model->delete($id);

    if ($delete) {
        echo "<script>alert('Paciente deletado com sucesso!');</script>";
        echo "<script>window.location.href = 'index.php';</script>";
    } else {
        echo "<script>alert('Falha ao deletar o paciente');</script>";
        echo "<script>window.location.href = 'index.php';</script>";
    }
} else {
    echo "<script>alert('ID do paciente não fornecido');</script>";
    echo "<script>window.location.href = 'index.php';</script>";
}

?>