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
    <title>Sistema de Monitoramento de Pacientes para Unidade de Saúde</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-12 mt-5">
          <h1 class="text-center">Sistema de Monitoramento de Pacientes para Unidade de Saúde</h1>
          <hr style="height: 1px;color: black;background-color: black;">
        </div>
      </div>
      <div class="row">
        <div class="col-md-12"><a href="add.php" class="btn btn-primary">Adicionar</a>
          <table class="table table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Sexo</th>
                <th>Idade</th>
                <th>Cidade</th>
                <th>Ações</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $model = new ModelGerenciador();
                $rows = $model->fetch();
                $i = 1;
                if(!empty($rows)){
                  foreach($rows as $row){ 
              ?>
              <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $row['nome']; ?></td>
                <td><?php echo $row['sexo']; ?></td>
                <td><?php echo $row['idade']; ?></td>
                <td><?php echo $row['cidade']; ?></td>
                <td>
                  <a href="read.php?Id=<?php echo $row['Id']; ?>" class="badge badge-info">Visualizar</a>
                  <a href="delete.php?Id=<?php echo $row['Id']; ?>" class="badge badge-danger">Excluir</a>
                  <a href="edit.php?Id=<?php echo $row['Id']; ?>" class="badge badge-success">Alterar</a>
                </td>
              </tr>
              <?php
                }
              } else {
                echo "<tr><td colspan='6'>Não há registros</td></tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>