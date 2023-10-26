<?php

class ModelGerenciador {

	private $server   = "localhost";
	private $username = "root";
	private $password;
	private $db       = "sistemaSaude";
	private $conn;


    /**
     * Construtor da classe.
     *
     * Inicializa a conexão com o banco de dados.
     *
     * @throws Exception Em caso de falha na conexão.
     */
    public function __construct() {
    	try {
    		$this->conn = new mysqli($this->server, $this->username, $this->password, $this->db);
    	} catch (Exception $e) {
    		throw new Exception("Falha na conexão: " . $e->getMessage());
    	}
    }


	/**
	 * Insere um novo paciente na tabela "tbpaciente".
	 *
	 * @return bool Retorna true se a inserção for bem-sucedida ou false em caso de erro.
	 *
	 * @throws Exception Em caso de campos vazios ou falha na inserção.
	 */
	public function insert() {
	    if (isset($_POST['submit'])) {
	        if (isset($_POST['nome']) && isset($_POST['sexo']) && isset($_POST['idade']) && isset($_POST['cidade'])) {
	            if (!empty($_POST['nome']) && !empty($_POST['sexo']) && !empty($_POST['idade']) && !empty($_POST['cidade'])) {
	                $nome   = $this->conn->real_escape_string($_POST['nome']);
	                $sexo   = $this->conn->real_escape_string($_POST['sexo']);
	                $idade  = intval($_POST['idade']);
	                $cidade = $this->conn->real_escape_string($_POST['cidade']);

	                $query = "INSERT INTO tbpaciente (nome, sexo, idade, cidade) VALUES (?, ?, ?, ?)";
	                $stmt  = $this->conn->prepare($query);
	                $stmt->bind_param("ssis", $nome, $sexo, $idade, $cidade);
	                $insert = $stmt->execute();
                    if ($insert) {
                        echo '<div class="alert alert-success" role="alert">Inserido com sucesso!</div>';
                            header("Refresh: 2; URL=index.php");
                    } else {
                        echo '<div class="alert alert-danger" role="alert">Falha ao incluir</div>';
                    }
                } else {
                    echo '<div class="alert alert-warning" role="alert">Preencha todos os campos</div>';
               }
	        }
	    }
	}

    /**
     * Busca todos os pacientes na tabela "tbpaciente".
     *
     * @return array Um array de pacientes.
     */
    public function fetch() {
    	$dados = [];
    	$query = "SELECT * FROM tbpaciente";
    	$result = $this->conn->query($query);
    	if($result) {
    		while ($row = $result->fetch_assoc()) {
    			$dados[] = $row;
    		}
    	}
    	return $dados;
    }

    /**
     * Exclui um paciente da tabela "tbpaciente" com base no ID.
     *
     * @param int $id O ID do paciente a ser excluído.
     *
     * @return bool Retorna true se a exclusão for bem-sucedida ou false em caso de erro.
     *
     * @throws Exception Em caso de erro na exclusão.
     */
    public function delete($id) {
    	$query = "DELETE FROM tbpaciente WHERE Id = ?";
    	$stmt = $this->conn->prepare($query);
    	$stmt->bind_param("i", $id);
    	if($stmt->execute()) {
    		return true;
    	}
    	throw new Exception("Erro ao excluir o paciente.");
    }

    /**
     * Busca um paciente na tabela "tbpaciente" com base no ID.
     *
     * @param int $id O ID do paciente a ser buscado.
     *
     * @return array|null Um array representando o paciente ou null se não encontrado.
     */
    public function fetch_single($id) {
    	$query = "SELECT * FROM tbpaciente WHERE Id = ?";
    	$stmt = $this->conn->prepare($query);
    	$stmt->bind_param("i", $id);
    	$stmt->execute();
    	$result = $stmt->get_result();
        return ($result->num_rows === 0) ? null : $result->fetch_assoc();
    }

    /**
     * Edita um paciente na tabela "tbpaciente".
     *
     * @param int $id O ID do paciente a ser editado.
     *
     * @return array|null Um array representando o paciente ou null se não encontrado.
     */
    public function edit($id) {
    	return $this->fetch_single($id);
    }

    /**
     * Atualiza um paciente na tabela "tbpaciente".
     *
     * @param array $dado Um array contendo os novos dados do paciente.
     *
     * @return bool Retorna true se a atualização for bem-sucedida ou false em caso de erro.
     *
     * @throws Exception Em caso de erro na atualização.
     */
    public function update($dado) {
    	$query = "UPDATE tbpaciente SET nome=?, sexo=?, idade=?, cidade=? WHERE Id = ?";
    	$stmt = $this->conn->prepare($query);
    	$stmt->bind_param("ssisi", $dado['nome'], $dado['sexo'], $dado['idade'], $dado['cidade'], $dado['Id']);
    	if($stmt->execute()) {
    		return true;
    	}
    	throw new Exception("Erro ao atualizar o paciente.");
    }
    
}

?>