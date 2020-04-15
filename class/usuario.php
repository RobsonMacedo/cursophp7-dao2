
<?php

class Usuario{

	private $id_usuarios;
	private $deslogin;
	private $dessenha;
	private $dtcadastro;


	public function getId_usuario(){
		
		return $this->id_usuarios;

	}

	public function setId_usuario($id){

		$this->id_usuarios = $id;

	}

	public function getDeslogin(){

		return $this->deslogin;

	}

	public function setDeslogin($id){

		$this->deslogin = $id;

	}

	public function getDessenha(){

		return $this->dessenha;

	}

	public function setDessenha($id){

		$this->dessenha = $id;

	}

	public function getDtCadastro(){

		return $this->dtcadastro;

	}

	public function setDtCadastro($id){

		$this->dtcadastro = $id;

	}

	public function loadById($id){ // não está funcionando

		$sql = new Sql();

		$result = $sql->select("SELECT * FROM tb_usuarios WHERE id_usuarios = :ID", array(
				':ID'=>$id
			)); 

		//var_dump($sql);
		//print_r($result); // está retornando vazio

		if (count($result) > 0){

			$this->setData($result[0]);

		}else{

			echo 'Nenhum registro encontrado com o id '.$id.'!!!';
		}
	}

	public static function getLista(){ // carrega vários usuarios

		$sql = new Sql();

		return ($sql->select('SELECT * FROM tb_usuarios'));


	}

	public static function search($login){

		$sql = new Sql();

		return $sql->select('SELECT * FROM tb_usuarios WHERE deslogin LIKE :LOGIN ORDER BY deslogin', array(
			":LOGIN"=>"%".$login."%"
		));

	}


	public function login($login, $pass){

		$sql = new Sql();

		$result = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN and dessenha = :PASS", array(
				':LOGIN'=>$login, 
				':PASS'=>$pass
			)); 

		//var_dump($sql);
		//print_r($result); // está retornando vazio

		if (count($result) > 0){

			$this->setData($result[0]);
			
		}else{

			throw new Exception("Login e/ou Senha inválidos!!!", 1);
			
		}
	}

	public function setData($data){

		$this->setId_usuario($data['id_usuarios']);
		$this->setDeslogin($data['deslogin']);
		$this->setDessenha($data['dessenha']);
		$this->setDtCadastro(new DateTime($data['dtcadastro']));
	}

	public function insert(){

		$sql = new Sql();
		$results = $sql->select('CALL sp_usuarios_insert(:LOGIN, :PASS)', array(
			':LOGIN'=>$this->getDeslogin(),
			':PASS'=>$this->getDessenha()
		));

		if (count($results) > 0){

			$this->setData($results[0]);

		}


	}

	public function insert2($login, $senha){

		$sql = new Sql();
		$results = $sql->query('INSERT INTO tb_usuarios(deslogin, dessenha) VALUES (:LOGIN, :PASS)', array(
				':LOGIN'=>$login,
				':PASS'=>$senha
			));

	}	

	public function insert3(){

			$sql = new Sql();
			$insert = $sql->query('INSERT INTO tb_usuarios(deslogin, dessenha) VALUES (:LOGIN, :PASS)', array(
				':LOGIN'=>$this->getDeslogin(),
				':PASS'=>$this->getDessenha()
			));

		 	return $sql->select('SELECT * FROM tb_usuarios WHERE id_usuarios = LAST_INSERT_ID()');
	}

	public function update($login, $pass){

		$this->setDeslogin($login);
		$this->setDessenha($pass);

		$sql = new Sql();
		$sql->query('UPDATE tb_usuarios SET deslogin = :LOGIN, dessenha = :PASS WHERE id_usuarios = :ID', array(
			':LOGIN'=>$this->getDeslogin(),
			':PASS'=>$this->getDessenha(),
			':ID'=>$this->getId_usuario()
		));

	}

	public function __toString(){
			
		return json_encode(array(
			'ID_Usuario'=>$this->getId_usuario(),
			'Deslogin'=>$this->getDeslogin(),
			'Dessenha'=>$this->getDessenha(),
			'DTcadastro'=>$this->getDtCadastro()
		));


	}	


}


 ?>