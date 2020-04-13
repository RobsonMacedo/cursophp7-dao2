
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

			$row = $result[0];

			//print_r($row['id_usuarios']);	
		

			$this->setId_usuario($row['id_usuarios']);
			$this->setDeslogin($row['deslogin']);
			$this->setDessenha($row['dessenha']);
			$this->setDtCadastro($row['dtcadastro']);

			//return $this->getId_usuario();	

		}else{

			echo 'Nenhum registro encontrado com o id '.$id.'!!!';
		}
	}

	public function getLista(){ // carrega vários usuarios

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

			$row = $result[0];

			//print_r($row['id_usuarios']);	
		

			$this->setId_usuario($row['id_usuarios']);
			$this->setDeslogin($row['deslogin']);
			$this->setDessenha($row['dessenha']);
			$this->setDtCadastro($row['dtcadastro']);

			//return $this->getId_usuario();	

		}else{

			throw new Exception("Login e/ou Senha inválidos!!!", 1);
			
		}
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