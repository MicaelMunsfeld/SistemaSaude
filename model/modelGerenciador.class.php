<?php

class ModelGerenciador {

    // Configurações de conexão com o banco de dados.
    private $server   = "localhost";
    private $username = "root";
    private $password;
    private $db       = "sistemaSaude";
    private $conn;


    // Construtor da classe.
    public function __construct(){
        try {
            $this->conn = new mysqli($this->server, $this->username, $this->password, $this->db);
        } catch (Exception $e) {
            echo "Falha na conexão" . $e->getMessage();
        }
    }


    // Método para inserir um paciente na tabela "tbpaciente".
    public function insert(){
        if (isset($_POST['submit'])) {
            if (isset($_POST['nome']) && isset($_POST['sexo']) && isset($_POST['idade']) && isset($_POST['cidade'])) {
                if (!empty($_POST['nome']) && !empty($_POST['sexo']) && !empty($_POST['idade']) && !empty($_POST['cidade'])) {
                    $nome = $_POST['nome'];
                    $sexo = $_POST['sexo'];
                    $idade = $_POST['idade'];
                    $cidade = $_POST['cidade'];
                    $query = "INSERT INTO tbpaciente (nome, sexo, idade, cidade) VALUES ('$nome', '$sexo', $idade, '$cidade')";
                    if ($sql = $this->conn->query($query)) {
                        echo "<script>alert('Paciente cadastrado!');</script>";
                        echo "<script>window.location.href = 'index.php';</script>";
                    } else {
                        echo "<script>alert('Erro');</script>";
                        echo "<script>window.location.href = 'index.php';</script>";
                    }
                } else {
                    echo "<script>alert('Campos vazios');</script>";
                    echo "<script>window.location.href = 'index.php';</script>";
                }
            }
        }
    }

    // Método para buscar todos os pacientes na tabela "tbpaciente".
    public function fetch(){
        $dados = array();
        $query = "SELECT * FROM tbpaciente";
        if ($sql = $this->conn->query($query)) {
            while ($row = $sql->fetch_assoc()) {
                $dados[] = $row;
            }
        }
        return $dados;
    }

    // Método para excluir um paciente da tabela "tbpaciente" com base no ID.
    public function delete($id){
        // Consulta SQL para excluir um registro com base no ID
        $query = "DELETE FROM tbpaciente where Id = '$id'";
        if ($sql = $this->conn->query($query)) {
            return true;
        } else {
            return false;
        }
    }

    // Método para buscar um paciente na tabela "tbpaciente" com base no ID.
    public function fetch_single($id){
        $dado = null;

        // Consulta SQL para buscar um registro com base no ID
        $query = "SELECT * FROM tbpaciente WHERE Id = '$id'";
        if ($sql = $this->conn->query($query)) {
            while ($row = $sql->fetch_assoc()) {
                $dado = $row;
            }
        }
        return $dado;
    }

    // Método para editar um paciente na tabela "tbpaciente".
    public function edit($id){
        $dado = null;
        $query = "SELECT * FROM tbpaciente WHERE Id = '$id'";
        if ($sql = $this->conn->query($query)) {
            while ($row = $sql->fetch_assoc()) {
                $dado = $row;
            }
        }
        return $dado;
    }

    // Método para atualizar um paciente na tabela "tbpaciente".
    public function update($dado){
        $query = "UPDATE tbpaciente SET nome='$dado[nome]', sexo='$dado[sexo]', idade=$dado[idade], cidade='$dado[cidade]' WHERE Id='$dado[Id]'";
        if ($sql = $this->conn->query($query)) {
            return true;
        } else {
            return false;
        }
    }
}

?>