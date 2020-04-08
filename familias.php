<?php 

class familia{

	private $vogais = array('a', 'e', 'i', 'o', 'u');
	private $ao = 'ão';


	public function escreve($letra){

		if (in_array($letra, $this->vogais)){

			echo 'Não pode ser vogal!!!';

		}
		else{

			foreach ($this->vogais as $key => $value) {
				

				echo json_encode(strtoupper($letra).$value);
				echo ',';

			}

			echo '<br/>';

			foreach ($this->vogais as $key => $value) {
				

				echo json_encode($letra.$value);
				echo ',';

			}

			echo json_encode($letra.utf8_encode($this->ao));

		}

	}
}

$familiaB = new familia();

$familiaB->escreve('z');

echo utf8_decode("São Gonçalo")

 ?>