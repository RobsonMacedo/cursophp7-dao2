<?php 

//aqui vamos criar as funcoes que fazem consultas ao banco de dados

class Sql extends PDO{ // extend para usar o prepare, bindParam, etc ...

	private $conn;

	public function __construct(){

		$this->conn = new PDO('mysql:host=localhost;dbname=dbphp7', 'root', '');

	}

	public function setParams($statement, $params = array()){ // função para varios parametros passados 

		foreach ($params as $key => $value) {
					
					$this->setParam($statement, $key, $value);

				}

	}

	public function setParam($statement, $key, $value){ // função para um parametro somente 

		return $statement->bindParam($key, $value);

	}

	public function query($rawQuery, $params = array()){

		$stmt = $this->conn->prepare($rawQuery);

		$this->setParams($stmt, $params);

		$stmt->execute();

		return $stmt;

	}

	public function select($rawQuery, $params = array()){ // usa a função query para fazer o select

		$select = $this->query($rawQuery, $params); //fazemos assim pq o select retorna dados e usa o fetchAll, o que não acontece com o insert ou update por exemplo

		return $return = $select->fetchAll(PDO::FETCH_ASSOC);
	}

}

 ?>